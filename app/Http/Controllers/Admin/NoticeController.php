<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::orderBy('priority', 'desc')->orderBy('publish_date', 'desc')->paginate(15);
        return view('admin.notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.notices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'publish_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:publish_date',
            'priority' => 'integer',
            'is_pinned' => 'boolean',
            'show_in_ticker' => 'boolean',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request->file('attachment')->store('notices', 'public');
        }

        Notice::create($validated);
        return redirect()->route('admin.notices.index')->with('success', 'Notice created successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('admin.notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'publish_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:publish_date',
            'priority' => 'integer',
            'is_pinned' => 'boolean',
            'show_in_ticker' => 'boolean',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('attachment')) {
            if ($notice->attachment) {
                Storage::disk('public')->delete($notice->attachment);
            }
            $validated['attachment'] = $request->file('attachment')->store('notices', 'public');
        }

        $notice->update($validated);
        return redirect()->route('admin.notices.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        if ($notice->attachment) {
            Storage::disk('public')->delete($notice->attachment);
        }
        $notice->delete();
        return redirect()->route('admin.notices.index')->with('success', 'Notice deleted successfully.');
    }
}
