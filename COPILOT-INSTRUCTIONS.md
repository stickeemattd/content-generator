# Project: content-generator

## Overview

This is a Next.js app that converts `.docx` files into `.blade.php` files with appropriate HTML tags. The user uploads a Word document, provides a filename, and downloads the generated Blade template.

## Tech Stack

- Next.js (App Router)
- TypeScript
- Tailwind CSS

## Core Functionality

### User Interface

- A file upload input that accepts `.docx` files only.
- A text input where the user enters the output filename (e.g. `best-broadband-deals`). The downloaded file will be named `{input}.blade.php`.
- A download button that provides the generated `.blade.php` file.

### Document Parsing Rules

Scan through the uploaded `.docx` file and apply the following HTML tags based on formatting:

| Word Formatting         | HTML Tag        |
|-------------------------|-----------------|
| Font size 16            | `<h2>`          |
| Font size 14            | `<h3>`          |
| Font size 12            | `<h4>`          |
| Font size 11            | `<p>`           |
| Bullet list items       | `<ul>` + `<li>` |
| Numbered list items     | `<ol>` + `<li>` |
| Hyperlinked text        | `<a href="">`   |

### Tag Formatting Rules

- There must be **no whitespace or gaps** between the opening/closing tags and the text they wrap.
  - Correct: `<p>This is a paragraph.</p>`
  - Wrong: `<p> This is a paragraph. </p>`
- Hyperlinked text should be wrapped in `<a href="">` tags. Leave the `href` attribute empty — do not attempt to resolve or create URLs.
- Consecutive bullet items should be grouped inside a single `<ul>` element, each item in its own `<li>`.
- Consecutive numbered items should be grouped inside a single `<ol>` element, each item in its own `<li>`.
- If an <a> tag is used and is followed by a full stop or comma, there should be no space between the closing tag and the punctuation.
  - Correct: `<a>This is a paragraph</a>.`
  - Wrong: `<a>This is a paragraph</a> .`

### Table Parsing Rules

When a table is identified in the `.docx`, it must be converted into a structured Blade layout using Tailwind CSS grid classes. Refer to the example files in `/example-files` for further reference on how tables are built.

#### Outer Wrapper

Every table must be wrapped in a scrollable container:

```blade
<div class="overflow-x-auto">
    <div
        class="border-2 border-goco-dark-green mt-2 min-w-[1000px] lg:w-3/5 [&>div]:border-b
            [&>div]:border-goco-dark-green"
    >
        <!-- header row -->
        <!-- data rows -->
    </div>
</div>
```

#### Column Detection

Detect the number of columns in the table and set the grid class accordingly:

- 2 columns → `grid grid-cols-2`
- 3 columns → `grid grid-cols-3`
- 4 columns → `grid grid-cols-4`
- And so on for any number of columns.

#### Header Row

The first row of the table is treated as the header. It should be styled with a grey background and bold text:

```blade
<div class="grid grid-cols-{n} text-center [&_div]:bg-gray-200 [&_div]:p-1 font-semibold">
    <div>
        Column 1 Header
    </div>
    <div class="border-x border-goco-dark-green">
        Column 2 Header
    </div>
</div>
```

#### Data Rows

Each subsequent row follows the same grid structure. Each column gets its own `<div>`, and cell content is wrapped in `<p>` tags:

```blade
<div class="grid grid-cols-{n} [&_div]:p-1">
    <div>
        <p>Cell content for column 1</p>
    </div>
    <div class="border-x border-goco-dark-green">
        <p>Cell content for column 2</p>
    </div>
</div>
```

#### Key Rules for Tables

- Each column in a row must be its own `<div>`.
- Inner columns (not the first) should have `border-x border-goco-dark-green` to create vertical dividers.
- Individual content items within a cell should each be wrapped in their own `<p>` tag.
- The line length and word-breaking rules still apply within table content.

### Line Length Rules

- No individual line in the output file should exceed **120 characters**.
- When breaking long lines, **do not split words**. Break at the nearest space before the 120-character limit.

### Training Examples

- Refer to the files in the `/example-files` folder for examples of expected input/output. Use these as the ground truth for how the final `.blade.php` output should look.

## Project Conventions

- Use functional components with hooks.
- Prefer server components by default; add `"use client"` only when client-side interactivity is needed.
- API routes go in `src/app/api/`.
- Use named exports for components.
- Prefer `async/await` over `.then()` chains.
- Keep components small and composable.