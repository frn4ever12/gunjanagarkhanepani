<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportantLink;
use Illuminate\Http\Request;

class ImportantLinkController extends Controller
{
    public function index()
    {
        $links = ImportantLink::orderBy('order')->paginate(15);
        return view('admin.important-links.index', compact('links'));
    }

    public function create()
    {
        return view('admin.important-links.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon' => 'nullable|string|max:50',
            'opens_in_new_tab' => 'boolean',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        ImportantLink::create($validated);
        return redirect()->route('admin.important-links.index')->with('success', 'Important link created successfully.');
    }

    public function edit(ImportantLink $link)
    {
        return view('admin.important-links.edit', compact('link'));
    }

    public function update(Request $request, ImportantLink $link)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon' => 'nullable|string|max:50',
            'opens_in_new_tab' => 'boolean',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $link->update($validated);
        return redirect()->route('admin.important-links.index')->with('success', 'Important link updated successfully.');
    }

    public function destroy(ImportantLink $link)
    {
        $link->delete();
        return redirect()->route('admin.important-links.index')->with('success', 'Important link deleted successfully.');
    }
}
