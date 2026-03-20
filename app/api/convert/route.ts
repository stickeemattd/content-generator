import { NextRequest, NextResponse } from 'next/server';
import { parseDocx } from '../../lib/docx-parser';
import { generateBlade } from '../../lib/blade-generator';

export async function POST(request: NextRequest) {
  try {
    const formData = await request.formData();
    const file = formData.get('file');

    if (!file || typeof file === 'string') {
      return NextResponse.json({ error: 'No file provided' }, { status: 400 });
    }

    if (!file.name.endsWith('.docx')) {
      return NextResponse.json({ error: 'File must be a .docx file' }, { status: 400 });
    }

    const buffer = await file.arrayBuffer();
    const paragraphs = await parseDocx(buffer);
    const content = generateBlade(paragraphs);

    return NextResponse.json({ content });
  } catch (error) {
    console.error('Conversion error:', error);
    const message = error instanceof Error ? error.message : 'Conversion failed';
    return NextResponse.json({ error: message }, { status: 500 });
  }
}
