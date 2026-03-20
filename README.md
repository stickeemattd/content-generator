# Content Generator

This project converts Microsoft Word `.docx` files into Laravel Blade content templates.

It is built for a workflow where content is drafted in Word, uploaded through a small web UI, and downloaded as a `.blade.php` file that fits an existing Blade page structure.

## What It Does

The app:

- accepts a `.docx` upload in the browser
- parses the document structure on the server
- converts paragraphs into Blade-friendly HTML
- groups Word lists into `<ul>` or `<ol>`
- converts Word tables into a predefined Tailwind-based table layout
- wraps the output in a Blade template using:

```php
@extends('gocompare.templates.app')

@section('content')
    <section class="standard-page">
        <div>
            <!-- generated content -->
        </div>
    </section>
@endsection
```

## How To Use It

1. Install dependencies:

```bash
npm install
```

2. Start the development server:

```bash
npm run dev
```

3. Open `http://localhost:3000`

4. Upload a Word `.docx` file

5. Enter the output filename you want

6. Click `Convert & Download`

The app will download a generated file named like `your-filename.blade.php`.

## How Conversion Works

The converter reads the `.docx` XML directly and turns the document into block-level content.

Current behavior:

- paragraphs become `<p>`
- larger paragraph font sizes are mapped to headings:
  - `16px+` becomes `<h2>`
  - `14px+` becomes `<h3>`
  - `12px+` becomes `<h4>`
- numbered lists become `<ol>`
- bulleted lists become `<ul>`
- tables are rendered into a fixed responsive `<div>` grid layout with Tailwind classes
- hyperlink text is preserved as `<a href="">...</a>`

## Important Limitations

This README is based on the current implementation, so these limitations are worth knowing before you use it heavily:

- for this to work consistently, we need Goco Content Writers to confirm to a spec we send
- only `.docx` files are supported
- link text is preserved, but link URLs are not currently carried through; generated links use empty `href` values
- inline formatting such as bold, italic, underline, and custom classes is not preserved
- heading detection is based on font size, not Word heading styles alone
- table output is opinionated and tailored to one Blade/Tailwind markup style
- the generated file should be reviewed before committing to production

## Typical Use Case

We convert a significant amount of page content for Goco on their broadband and mobile sites.

Instead of manually rebuilding headings, paragraphs, lists, and tables by hand, this tool gives you a structured first pass that can then be cleaned up or enhanced.

## Project Structure

- [`app/page.tsx`](/home/matt/Public/code/comparisondev/content-generator/app/page.tsx) provides the upload UI
- [`app/api/convert/route.ts`](/home/matt/Public/code/comparisondev/content-generator/app/api/convert/route.ts) handles the conversion request
- [`app/lib/docx-parser.ts`](/home/matt/Public/code/comparisondev/content-generator/app/lib/docx-parser.ts) parses the Word document into blocks
- [`app/lib/blade-generator.ts`](/home/matt/Public/code/comparisondev/content-generator/app/lib/blade-generator.ts) renders parsed blocks into Blade-compatible output
- [`app/example-files`](/home/matt/Public/code/comparisondev/content-generator/app/example-files) contains example Blade files used to train coplit on what to build

## Scripts

```bash
npm run dev
npm run build
npm run start
npm run lint
```

## Tech Stack

- Next.js
- React
- TypeScript
- `jszip` for reading `.docx` archives
- `@xmldom/xmldom` for parsing Word XML

## Notes For Future Improvement

Useful next steps if this project grows:

- preserve real hyperlink destinations by differentiating between internal and external examples
- add support for both app.layout and static.layout blades
- make the Blade wrapper configurable
- add automated tests for sample `.docx` inputs
