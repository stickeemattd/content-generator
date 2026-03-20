import type { ParsedParagraph, ParsedTable, ParsedBlock, ContentNode } from './docx-parser';

const MAX_LINE = 120;
const I1 = '    ';   // 4 spaces
const I2 = '        '; // 8 spaces
const I3 = '            '; // 12 spaces - element level (h2, p, ul, ol, table outer)
const I4 = '                '; // 16 spaces - p content / li items / table inner div
const I5 = '                    '; // 20 spaces - li content / table row divs
const I6 = '                        '; // 24 spaces - table cell divs
const I7 = '                            '; // 28 spaces - table cell content

/**
 * Wrap plain text to fit within availableWidth characters per line.
 * Returns an array of lines, never splitting words.
 */
function wrapText(text: string, availableWidth: number): string[] {
  const words = text.split(/\s+/).filter(w => w.length > 0);
  if (words.length === 0) return [];

  const lines: string[] = [];
  let current = '';

  for (const word of words) {
    if (current === '') {
      current = word;
    } else if (current.length + 1 + word.length <= availableWidth) {
      current += ' ' + word;
    } else {
      lines.push(current);
      current = word;
    }
  }
  if (current) lines.push(current);
  return lines;
}

/**
 * Render content nodes as indented lines, handling inline <a> tags.
 * Punctuation (.,;:!?) immediately following a link is attached directly
 * to the </a> tag with no intervening space.
 */
function renderContentNodes(
  content: ContentNode[],
  indent: string,
  availableWidth: number
): string[] {
  const lines: string[] = [];
  let i = 0;

  while (i < content.length) {
    const node = content[i];

    if (node.type === 'text') {
      const trimmed = node.text.trim();
      if (trimmed) {
        const wrapped = wrapText(trimmed, availableWidth);
        for (const l of wrapped) lines.push(`${indent}${l}`);
      }
      i++;
    } else {
      // Link node — peek at the next text node for leading punctuation
      let trailingPunct = '';
      const next = content[i + 1];

      if (next?.type === 'text') {
        const nextTrimmed = next.text.trimStart();
        const match = nextTrimmed.match(/^([.,;:!?]+)([\s\S]*)/);
        if (match) {
          trailingPunct = match[1];
          // Emit the link with punctuation attached, then handle the remainder
          lines.push(`${indent}<a href="">${node.text}</a>${trailingPunct}`);
          i++;
          const remainder = match[2].trim();
          if (remainder) {
            const wrapped = wrapText(remainder, availableWidth);
            for (const l of wrapped) lines.push(`${indent}${l}`);
          }
          i++; // skip the consumed text node
          continue;
        }
      }

      lines.push(`${indent}<a href="">${node.text}</a>`);
      i++;
    }
  }

  return lines;
}

/**
 * Generate lines for a block-level element (h2/h3/h4/p) with proper
 * indentation and 120-char line wrapping.
 */
function generateBlockElement(para: ParsedParagraph): string[] {
  const { tag, content } = para;
  const hasLinks = content.some(n => n.type === 'link');

  if (tag === 'h2' || tag === 'h3' || tag === 'h4') {
    const text = content.map(n => n.text).join('');
    return [`${I3}<${tag}>${text}</${tag}>`];
  }

  // <p> handling
  if (!hasLinks) {
    const text = content.map(n => n.text).join('');
    const singleLine = `${I3}<p>${text}</p>`;
    if (singleLine.length <= MAX_LINE) return [singleLine];

    // Multiline: wrap text at I4 indent
    const wrapped = wrapText(text, MAX_LINE - I4.length);
    return [`${I3}<p>`, ...wrapped.map(l => `${I4}${l}`), `${I3}</p>`];
  }

  // <p> with inline links — always multiline
  return [
    `${I3}<p>`,
    ...renderContentNodes(content, I4, MAX_LINE - I4.length),
    `${I3}</p>`,
  ];
}

/**
 * Generate lines for a single <li> item.
 */
function generateListItem(para: ParsedParagraph): string[] {
  const { content } = para;
  const hasLinks = content.some(n => n.type === 'link');

  if (!hasLinks) {
    const text = content.map(n => n.text).join('');
    const singleLine = `${I4}<li>${text}</li>`;
    if (singleLine.length <= MAX_LINE) return [singleLine];

    const wrapped = wrapText(text, MAX_LINE - I5.length);
    return [`${I4}<li>`, ...wrapped.map(l => `${I5}${l}`), `${I4}</li>`];
  }

  // <li> with inline links — multiline
  return [
    `${I4}<li>`,
    ...renderContentNodes(content, I5, MAX_LINE - I5.length),
    `${I4}</li>`,
  ];
}

/**
 * Generate lines for a <ul> or <ol> block containing a run of list items.
 */
function generateList(listTag: 'ul' | 'ol', items: ParsedParagraph[]): string[] {
  const lines: string[] = [`${I3}<${listTag}>`];
  for (const item of items) {
    lines.push(...generateListItem(item));
  }
  lines.push(`${I3}</${listTag}>`);
  return lines;
}

/**
 * Whether a column index gets the border-x divider class.
 * For even column counts: odd indices get the border.
 * For odd column counts: even indices get the border.
 * This ensures clean single-line dividers between every pair of columns.
 */
function hasBorderX(colIndex: number, numCols: number): boolean {
  return numCols % 2 === 0 ? colIndex % 2 === 1 : colIndex % 2 === 0;
}

/** Tailwind width class for the inner table wrapper based on column count. */
function tableWidthClass(numCols: number): string {
  return numCols < 3 ? 'lg:w-3/5' : 'lg:w-4/5';
}

/**
 * Generate lines for a cell's content nodes.
 * Single paragraph: text (or link-bearing content) directly in the div.
 * Multiple paragraphs: each wrapped in a <p> tag.
 */
function generateCellContent(
  paragraphs: ContentNode[][],
  cellTag: string
): string[] {
  const lines: string[] = [cellTag];

  if (paragraphs.length === 1) {
    // Single paragraph — text directly at I7 indent
    const content = paragraphs[0];
    const hasLinks = content.some(n => n.type === 'link');

    if (!hasLinks) {
      const text = content.map(n => n.text).join('').trim();
      // Check if it fits inline: cellTag + text + </div>
      const closingTag = '</div>';
      const inline = cellTag + text + closingTag;
      if (inline.length <= MAX_LINE) {
        return [inline];
      }
      const wrapped = wrapText(text, MAX_LINE - I7.length);
      for (const l of wrapped) lines.push(`${I7}${l}`);
    } else {
      for (const l of renderContentNodes(content, I7, MAX_LINE - I7.length)) {
        lines.push(l);
      }
    }
  } else {
    // Multiple paragraphs — each in its own <p>
    for (const content of paragraphs) {
      const hasLinks = content.some(n => n.type === 'link');
      if (!hasLinks) {
        const text = content.map(n => n.text).join('').trim();
        if (!text) continue;
        const singleLine = `${I7}<p>${text}</p>`;
        if (singleLine.length <= MAX_LINE) {
          lines.push(singleLine);
        } else {
          const wrapped = wrapText(text, MAX_LINE - I7.length - 3 - 4); // subtract <p></p>
          lines.push(`${I7}<p>`);
          // indent an extra level for wrapped p content
          const I8 = I7 + '    ';
          for (const l of wrapped) lines.push(`${I8}${l}`);
          lines.push(`${I7}</p>`);
        }
      } else {
        lines.push(`${I7}<p>`);
        const I8 = I7 + '    ';
        for (const l of renderContentNodes(content, I8, MAX_LINE - I8.length)) {
          lines.push(l);
        }
        lines.push(`${I7}</p>`);
      }
    }
  }

  lines.push(`${I6}</div>`);
  return lines;
}

/**
 * Generate lines for a complete table.
 */
function generateTable(table: ParsedTable): string[] {
  const { numCols, rows } = table;
  const widthClass = tableWidthClass(numCols);
  const colClass = `grid-cols-${numCols}`;

  const lines: string[] = [
    `${I3}<div class="overflow-x-auto">`,
    `${I4}<div`,
    `${I4}    class="border-2 border-goco-dark-green mt-2 min-w-250 ${widthClass} [&>div]:border-b`,
    `${I4}        [&>div]:border-goco-dark-green"`,
    `${I4}>`,
  ];

  rows.forEach((row, rowIndex) => {
    const isHeader = rowIndex === 0;
    const rowClass = isHeader
      ? `${I5}<div class="${colClass} text-center [&_div]:bg-gray-200 [&_div]:p-1 font-semibold">`
      : `${I5}<div class="${colClass} text-center [&_div]:p-1">`;

    lines.push(rowClass);

    row.forEach((cell, colIndex) => {
      const borderClass = hasBorderX(colIndex, numCols)
        ? ' class="border-x border-goco-dark-green"'
        : '';
      const cellOpenTag = `${I6}<div${borderClass}>`;
      lines.push(...generateCellContent(cell.paragraphs, cellOpenTag));
    });

    lines.push(`${I5}</div>`);
  });

  lines.push(`${I4}</div>`);
  lines.push(`${I3}</div>`);

  return lines;
}

/**
 * Group paragraphs into blocks and generate the content lines.
 */
function generateContent(blocks: ParsedBlock[]): string[] {
  const lines: string[] = [];
  let i = 0;

  while (i < blocks.length) {
    const block = blocks[i];

    if ('type' in block && block.type === 'table') {
      lines.push(...generateTable(block));
      i++;
    } else {
      const para = block as ParsedParagraph;
      if (para.listType) {
        // Collect consecutive items of the same list type
        const listType = para.listType;
        const listTag: 'ul' | 'ol' = listType === 'bullet' ? 'ul' : 'ol';
        const items: ParsedParagraph[] = [];

        while (
          i < blocks.length &&
          !('type' in blocks[i]) &&
          (blocks[i] as ParsedParagraph).listType === listType
        ) {
          items.push(blocks[i] as ParsedParagraph);
          i++;
        }

        lines.push(...generateList(listTag, items));
      } else {
        lines.push(...generateBlockElement(para));
        i++;
      }
    }
  }

  return lines;
}

/**
 * Generate a complete .blade.php file from parsed paragraphs.
 */
export function generateBlade(blocks: ParsedBlock[]): string {
  const contentLines = generateContent(blocks);

  const output: string[] = [
    `@extends('gocompare.templates.app')`,
    '',
    `@section('content')`,
    `${I1}<section class="standard-page">`,
    `${I2}<div>`,
    ...contentLines,
    `${I2}</div>`,
    `${I1}</section>`,
    '@endsection',
    '',
  ];

  return output.join('\n');
}
