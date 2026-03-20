'use client';

import { useState, useRef } from 'react';

export default function Home() {
  const [file, setFile] = useState<File | null>(null);
  const [filename, setFilename] = useState('');
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState<string | null>(null);
  const fileInputRef = useRef<HTMLInputElement>(null);

  const handleFileChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const selected = e.target.files?.[0] ?? null;
    setFile(selected);
    setError(null);
    if (selected && !filename) {
      setFilename(selected.name.replace(/\.docx$/i, ''));
    }
  };

  const handleConvert = async () => {
    if (!file) {
      setError('Please select a .docx file.');
      return;
    }
    if (!filename.trim()) {
      setError('Please enter an output filename.');
      return;
    }

    setLoading(true);
    setError(null);

    try {
      const formData = new FormData();
      formData.append('file', file);
      formData.append('filename', filename.trim());

      const res = await fetch('/api/convert', { method: 'POST', body: formData });
      const data = await res.json();

      if (!res.ok) {
        setError(data.error ?? 'Conversion failed.');
        return;
      }

      const blob = new Blob([data.content], { type: 'text/plain' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = `${filename.trim()}.blade.php`;
      a.click();
      URL.revokeObjectURL(url);
    } catch {
      setError('An unexpected error occurred. Please try again.');
    } finally {
      setLoading(false);
    }
  };

  const handleDrop = (e: React.DragEvent<HTMLLabelElement>) => {
    e.preventDefault();
    const dropped = e.dataTransfer.files[0];
    if (dropped?.name.endsWith('.docx')) {
      setFile(dropped);
      setError(null);
      if (!filename) setFilename(dropped.name.replace(/\.docx$/i, ''));
    } else {
      setError('Only .docx files are supported.');
    }
  };

  return (
    <div className="flex min-h-screen items-center justify-center bg-zinc-50 p-4">
      <main className="w-full max-w-lg rounded-2xl bg-white p-8 shadow-sm">
        <h1 className="mb-1 text-2xl font-semibold text-zinc-900">Content Generator</h1>
        <p className="mb-8 text-sm text-zinc-500">
          Upload a .docx file to generate a .blade.php template.
        </p>

        {/* File upload */}
        <div className="mb-5">
          <label className="mb-1.5 block text-sm font-medium text-zinc-700">
            Word document
          </label>
          <label
            className={`flex cursor-pointer flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed px-4 py-8 transition-colors ${
              file
                ? 'border-zinc-400 bg-zinc-50'
                : 'border-zinc-200 bg-zinc-50 hover:border-zinc-400'
            }`}
            onDrop={handleDrop}
            onDragOver={e => e.preventDefault()}
          >
            {file ? (
              <svg
                className="h-8 w-8 text-green-500"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth={1.5}
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
            ) : (
              <svg
                className="h-8 w-8 text-zinc-400"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth={1.5}
                  d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                />
              </svg>
            )}
            {file ? (
              <span className="text-sm font-medium text-zinc-700">{file.name}</span>
            ) : (
              <span className="text-sm text-zinc-500">
                Drag & drop or <span className="font-medium text-zinc-700">click to browse</span>
              </span>
            )}
            <input
              ref={fileInputRef}
              type="file"
              accept=".docx"
              className="hidden"
              onChange={handleFileChange}
            />
          </label>
        </div>

        {/* Filename input */}
        <div className="mb-6">
          <label className="mb-1.5 block text-sm font-medium text-zinc-700" htmlFor="filename">
            Output filename
          </label>
          <div className="flex items-center rounded-xl border border-zinc-200 bg-white focus-within:border-zinc-400 focus-within:ring-1 focus-within:ring-zinc-400">
            <input
              id="filename"
              type="text"
              value={filename}
              onChange={e => setFilename(e.target.value)}
              placeholder="e.g. best-broadband-deals"
              className="flex-1 rounded-xl bg-transparent px-3 py-2.5 text-sm text-zinc-900 outline-none placeholder:text-zinc-400"
            />
            <span className="pr-3 text-sm text-zinc-400">.blade.php</span>
          </div>
        </div>

        {/* Error */}
        {error && (
          <div className="mb-4 rounded-lg bg-red-50 px-4 py-3 text-sm text-red-700">{error}</div>
        )}

        {/* Submit */}
        <button
          onClick={handleConvert}
          disabled={loading}
          className="w-full rounded-xl bg-zinc-900 px-4 py-3 text-sm font-semibold text-white transition-colors hover:bg-zinc-700 disabled:cursor-not-allowed disabled:opacity-50"
        >
          {loading ? 'Converting…' : 'Convert & Download'}
        </button>
      </main>
    </div>
  );
}
