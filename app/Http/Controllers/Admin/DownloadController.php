<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\DownloadCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::with('category')->orderBy('order')->paginate(15);
        return view('admin.downloads.index', compact('downloads'));
    }

    public function create()
    {
        $categories = DownloadCategory::active()->get();
        return view('admin.downloads.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:download_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,zip|max:10240',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $file = $request->file('file');
        $validated['file'] = $file->store('downloads', 'public');
        $validated['file_type'] = $file->getClientOriginalExtension();
        $validated['file_size'] = $file->getSize();

        Download::create($validated);
        return redirect()->route('admin.downloads.index')->with('success', 'Download created successfully.');
    }

    public function edit(Download $download)
    {
        $categories = DownloadCategory::active()->get();
        return view('admin.downloads.edit', compact('download', 'categories'));
    }

    public function update(Request $request, Download $download)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:download_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,zip|max:10240',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        if ($request->hasFile('file')) {
            if ($download->file) {
                Storage::disk('public')->delete($download->file);
            }
            $file = $request->file('file');
            $validated['file'] = $file->store('downloads', 'public');
            $validated['file_type'] = $file->getClientOriginalExtension();
            $validated['file_size'] = $file->getSize();
        }

        $download->update($validated);
        return redirect()->route('admin.downloads.index')->with('success', 'Download updated successfully.');
    }

    public function destroy(Download $download)
    {
        if ($download->file) {
            Storage::disk('public')->delete($download->file);
        }
        $download->delete();
        return redirect()->route('admin.downloads.index')->with('success', 'Download deleted successfully.');
    }
}
