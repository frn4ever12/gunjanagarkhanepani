<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficialController extends Controller
{
    public function index()
    {
        $officials = Official::orderBy('order')->paginate(15);
        return view('admin.officials.index', compact('officials'));
    }

    public function create()
    {
        return view('admin.officials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'photo' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'show_on_homepage' => 'boolean',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['photo'] = $request->file('photo')->store('officials', 'public');

        Official::create($validated);
        return redirect()->route('admin.officials.index')->with('success', 'Official created successfully.');
    }

    public function edit(Official $official)
    {
        return view('admin.officials.edit', compact('official'));
    }

    public function update(Request $request, Official $official)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'show_on_homepage' => 'boolean',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            if ($official->photo) {
                Storage::disk('public')->delete($official->photo);
            }
            $validated['photo'] = $request->file('photo')->store('officials', 'public');
        }

        $official->update($validated);
        return redirect()->route('admin.officials.index')->with('success', 'Official updated successfully.');
    }

    public function destroy(Official $official)
    {
        if ($official->photo) {
            Storage::disk('public')->delete($official->photo);
        }
        $official->delete();
        return redirect()->route('admin.officials.index')->with('success', 'Official deleted successfully.');
    }
}
