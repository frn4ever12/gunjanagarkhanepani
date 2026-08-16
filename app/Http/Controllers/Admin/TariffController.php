<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TariffController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::orderBy('category')->orderBy('order')->paginate(15);
        return view('admin.tariffs.index', compact('tariffs'));
    }

    public function create()
    {
        return view('admin.tariffs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'unit' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'effective_date' => 'required|date',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request->file('attachment')->store('tariffs', 'public');
        }

        Tariff::create($validated);
        return redirect()->route('admin.tariffs.index')->with('success', 'Tariff created successfully.');
    }

    public function edit(Tariff $tariff)
    {
        return view('admin.tariffs.edit', compact('tariff'));
    }

    public function update(Request $request, Tariff $tariff)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'unit' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'effective_date' => 'required|date',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        if ($request->hasFile('attachment')) {
            if ($tariff->attachment) {
                Storage::disk('public')->delete($tariff->attachment);
            }
            $validated['attachment'] = $request->file('attachment')->store('tariffs', 'public');
        }

        $tariff->update($validated);
        return redirect()->route('admin.tariffs.index')->with('success', 'Tariff updated successfully.');
    }

    public function destroy(Tariff $tariff)
    {
        if ($tariff->attachment) {
            Storage::disk('public')->delete($tariff->attachment);
        }
        $tariff->delete();
        return redirect()->route('admin.tariffs.index')->with('success', 'Tariff deleted successfully.');
    }
}
