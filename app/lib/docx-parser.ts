import JSZip from 'jszip';
import { DOMParser } from '@xmldom/xmldom';

const W_NS = 'http://schemas.openxmlformats.org/wordprocessingml/2006/main';

export type ContentNode = { type: 'text'; text: string } | { type: 'link'; text: string };

export interface ParsedParagraph {
  type?: never;
  tag: 'h2' | 'h3' | 'h4' | 'p';
  listType?: 'bullet' | 'ordered';
  content: ContentNode[];
}

export interface TableCell {
  /** Each entry is the content nodes for one paragraph within the cell. */
  paragraphs: ContentNode[][];
}

export interface ParsedTable {
  type: 'table';
  numCols: number;
  rows: TableCell[][];
}

export type ParsedBlock = ParsedParagraph | ParsedTable;

function getWAttr(element: Element, attrName: string): string | null {
  return (
    element.getAttributeNS(W_NS, attrName) || element.getAttribute(`w:${attrName}`) || null
  );
}

function getFirstChild(parent: Element, ns: string, localName: string): Element | null {
  const children = parent.childNodes;
  for (let i = 0; i < children.length; i++) {
    const child = children[i] as Element;
    if (child.nodeType === 1 && child.localName === localName && child.namespaceURI === ns) {
      return child;
    }
  }
  return null;
}

/** Returns all direct children matching ns + localName. */
function getDirectChildren(parent: Element, ns: string, localName: string): Element[] {
  const result: Element[] = [];
  const children = parent.childNodes;
  for (let i = 0; i < children.length; i++) {
    const child = children[i] as Element;
    if (child.nodeType === 1 && child.localName === localName && child.namespaceURI === ns) {
      result.push(child);
    }
  }
  return result;
}

function getElementsByLocalName(parent: Element, ns: string, localName: string): Element[] {
  const result: Element[] = [];
  const all = parent.getElementsByTagNameNS(ns, localName);
  for (let i = 0; i < all.length; i++) {
    result.push(all[i] as Element);
  }
  return result;
}

function buildNumberingMap(numberingXml: string | undefined): Map<string, 'bullet' | 'ordered'> {
  const map = new Map<string, 'bullet' | 'ordered'>();
  if (!numberingXml) return map;

  const parser = new DOMParser();
  const doc = parser.parseFromString(numberingXml, 'text/xml');

  // Build abstractNumId -> type
  const abstractNumMap = new Map<string, 'bullet' | 'ordered'>();
  const abstractNums = getElementsByLocalName(doc.documentElement as Element, W_NS, 'abstractNum');

  for (const abstractNum of abstractNums) {
    const abstractNumId = getWAttr(abstractNum, 'abstractNumId') || '';
    // Look at level 0 numFmt
    const lvls = getElementsByLocalName(abstractNum, W_NS, 'lvl');
    for (const lvl of lvls) {
      const ilvl = getWAttr(lvl, 'ilvl') || '0';
      if (ilvl === '0') {
        const numFmt = getFirstChild(lvl, W_NS, 'numFmt');
        const val = numFmt ? getWAttr(numFmt, 'val') : null;
        abstractNumMap.set(abstractNumId, val === 'bullet' ? 'bullet' : 'ordered');
        break;
      }
    }
  }

  // Build numId -> type
  const nums = getElementsByLocalName(doc.documentElement as Element, W_NS, 'num');
  for (const num of nums) {
    const numId = getWAttr(num, 'numId') || '';
    const abstractNumIdEl = getFirstChild(num, W_NS, 'abstractNumId');
    const abstractNumId = abstractNumIdEl ? getWAttr(abstractNumIdEl, 'val') : null;
    if (abstractNumId && abstractNumMap.has(abstractNumId)) {
      map.set(numId, abstractNumMap.get(abstractNumId)!);
    }
  }

  return map;
}

function buildStyleFontSizeMap(stylesXml: string | undefined): Map<string, number> {
  const map = new Map<string, number>();
  if (!stylesXml) return map;

  const parser = new DOMParser();
  const doc = parser.parseFromString(stylesXml, 'text/xml');

  // Collect raw sz values per style (before inheritance resolution)
  const rawSzMap = new Map<string, number>();
  const basedOnMap = new Map<string, string>();

  const styles = getElementsByLocalName(doc.documentElement as Element, W_NS, 'style');
  for (const style of styles) {
    const styleType = getWAttr(style, 'type') || '';
    if (styleType !== 'paragraph') continue;

    const styleId = getWAttr(style, 'styleId') || '';
    if (!styleId) continue;

    const basedOnEl = getFirstChild(style, W_NS, 'basedOn');
    if (basedOnEl) {
      const parentId = getWAttr(basedOnEl, 'val') || '';
      if (parentId) basedOnMap.set(styleId, parentId);
    }

    const rPr = getFirstChild(style, W_NS, 'rPr');
    if (rPr) {
      const sz = getFirstChild(rPr, W_NS, 'sz');
      if (sz) {
        const val = getWAttr(sz, 'val');
        if (val) rawSzMap.set(styleId, parseInt(val) / 2);
      }
    }
  }

  // Resolve inheritance (up to 5 levels)
  for (const [styleId] of rawSzMap) {
    map.set(styleId, rawSzMap.get(styleId)!);
  }
  // For styles without direct sz, walk up basedOn chain
  for (const [styleId] of basedOnMap) {
    if (map.has(styleId)) continue;
    let current = styleId;
    for (let depth = 0; depth < 5; depth++) {
      const parent = basedOnMap.get(current);
      if (!parent) break;
      if (rawSzMap.has(parent)) {
        map.set(styleId, rawSzMap.get(parent)!);
        break;
      }
      current = parent;
    }
  }

  return map;
}

function getSzFromRPr(rPr: Element | null): number | null {
  if (!rPr) return null;
  const sz = getFirstChild(rPr, W_NS, 'sz');
  if (!sz) return null;
  const val = getWAttr(sz, 'val');
  return val ? parseInt(val) / 2 : null;
}

function getEffectiveFontSize(
  para: Element,
  styleMap: Map<string, number>
): number {
  const pPr = getFirstChild(para, W_NS, 'pPr');

  // 1. Paragraph-level rPr sz (paragraph mark formatting - most authoritative)
  if (pPr) {
    const pRPr = getFirstChild(pPr, W_NS, 'rPr');
    const sz = getSzFromRPr(pRPr);
    if (sz) return sz;
  }

  // 2. Check runs for explicit sz
  const runs = getElementsByLocalName(para, W_NS, 'r');
  for (const run of runs) {
    const rPr = getFirstChild(run, W_NS, 'rPr');
    const sz = getSzFromRPr(rPr);
    if (sz) return sz;
  }

  // 3. Look up style
  if (pPr) {
    const pStyle = getFirstChild(pPr, W_NS, 'pStyle');
    if (pStyle) {
      const styleId = getWAttr(pStyle, 'val');
      if (styleId && styleMap.has(styleId)) {
        return styleMap.get(styleId)!;
      }
      // Also try common heading style name patterns
      if (styleId) {
        const lower = styleId.toLowerCase();
        if (lower === 'heading1' || lower === 'heading 1') return 16;
        if (lower === 'heading2' || lower === 'heading 2') return 16;
        if (lower === 'heading3' || lower === 'heading 3') return 14;
        if (lower === 'heading4' || lower === 'heading 4') return 12;
      }
    }
  }

  return 11;
}

function fontSizeToTag(size: number): 'h2' | 'h3' | 'h4' | 'p' {
  if (size >= 16) return 'h2';
  if (size >= 14) return 'h3';
  if (size >= 12) return 'h4';
  return 'p';
}

function getRunText(run: Element): string {
  const texts = getElementsByLocalName(run, W_NS, 't');
  return texts.map(t => t.textContent || '').join('');
}

function parseParagraphContent(para: Element): ContentNode[] {
  const nodes: ContentNode[] = [];
  const children = para.childNodes;

  for (let i = 0; i < children.length; i++) {
    const child = children[i] as Element;
    if (child.nodeType !== 1) continue;

    if (child.localName === 'r' && child.namespaceURI === W_NS) {
      const text = getRunText(child);
      if (text) {
        if (nodes.length > 0 && nodes[nodes.length - 1].type === 'text') {
          (nodes[nodes.length - 1] as { type: 'text'; text: string }).text += text;
        } else {
          nodes.push({ type: 'text', text });
        }
      }
    } else if (child.localName === 'hyperlink' && child.namespaceURI === W_NS) {
      const runs = getElementsByLocalName(child, W_NS, 'r');
      const linkText = runs.map(getRunText).join('');
      if (linkText) {
        nodes.push({ type: 'link', text: linkText });
      }
    } else if (child.localName === 'ins' && child.namespaceURI === W_NS) {
      // Tracked insertion — include its text
      const runs = getElementsByLocalName(child, W_NS, 'r');
      const text = runs.map(getRunText).join('');
      if (text) {
        if (nodes.length > 0 && nodes[nodes.length - 1].type === 'text') {
          (nodes[nodes.length - 1] as { type: 'text'; text: string }).text += text;
        } else {
          nodes.push({ type: 'text', text });
        }
      }
    }
  }

  return nodes;
}

function parseParagraphBlock(
  para: Element,
  numberingMap: Map<string, 'bullet' | 'ordered'>,
  styleMap: Map<string, number>
): ParsedParagraph | null {
  const pPr = getFirstChild(para, W_NS, 'pPr');

  // Detect list item
  let listType: 'bullet' | 'ordered' | undefined;
  if (pPr) {
    const numPr = getFirstChild(pPr, W_NS, 'numPr');
    if (numPr) {
      const numIdEl = getFirstChild(numPr, W_NS, 'numId');
      const numId = numIdEl ? getWAttr(numIdEl, 'val') : null;
      if (numId && numId !== '0') {
        listType = numberingMap.get(numId) ?? 'bullet';
      }
    }
  }

  const fontSize = getEffectiveFontSize(para, styleMap);
  const tag = fontSizeToTag(fontSize);
  const content = parseParagraphContent(para);

  // Skip empty paragraphs
  const hasContent = content.some(n => n.text.trim().length > 0);
  if (!hasContent) return null;

  return { tag, listType, content };
}

function parseTable(tbl: Element): ParsedTable {
  const rows: TableCell[][] = [];

  for (const tr of getDirectChildren(tbl, W_NS, 'tr')) {
    const cells: TableCell[] = [];

    for (const tc of getDirectChildren(tr, W_NS, 'tc')) {
      const paragraphs: ContentNode[][] = [];

      for (const p of getDirectChildren(tc, W_NS, 'p')) {
        const content = parseParagraphContent(p);
        if (content.some(n => n.text.trim().length > 0)) {
          paragraphs.push(content);
        }
      }

      cells.push({ paragraphs });
    }

    if (cells.length > 0) rows.push(cells);
  }

  const numCols = rows.length > 0 ? Math.max(...rows.map(r => r.length)) : 0;
  return { type: 'table', numCols, rows };
}

export async function parseDocx(buffer: ArrayBuffer): Promise<ParsedBlock[]> {
  const zip = await JSZip.loadAsync(buffer);

  const documentXml = await zip.file('word/document.xml')?.async('string');
  if (!documentXml) throw new Error('Invalid docx: missing word/document.xml');

  const numberingXml = await zip.file('word/numbering.xml')?.async('string');
  const stylesXml = await zip.file('word/styles.xml')?.async('string');

  const numberingMap = buildNumberingMap(numberingXml);
  const styleMap = buildStyleFontSizeMap(stylesXml);

  const parser = new DOMParser();
  const doc = parser.parseFromString(documentXml, 'text/xml');
  const body = doc.getElementsByTagNameNS(W_NS, 'body')[0] as Element;

  const result: ParsedBlock[] = [];

  // Iterate direct children of body so tables are captured at the right position
  const children = body.childNodes;
  for (let i = 0; i < children.length; i++) {
    const child = children[i] as Element;
    if (child.nodeType !== 1) continue;

    if (child.localName === 'p' && child.namespaceURI === W_NS) {
      const block = parseParagraphBlock(child, numberingMap, styleMap);
      if (block) result.push(block);
    } else if (child.localName === 'tbl' && child.namespaceURI === W_NS) {
      const table = parseTable(child);
      if (table.numCols > 0 && table.rows.length > 0) result.push(table);
    }
  }

  return result;
}

