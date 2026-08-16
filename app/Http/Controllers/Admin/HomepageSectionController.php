<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSection;
use Illuminate\Http\Request;

class HomepageSectionController extends Controller
{
    public function index()
    {
        $sections = HomepageSection::orderBy('order')->get();
        return view('admin.homepage.index', compact('sections'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            if (str_starts_with($key, 'section_')) {
                $sectionId = str_replace('section_', '', $key);
                $section = HomepageSection::find($sectionId);
                
                if ($section) {
                    $section->update([
                        'is_enabled' => $value === '1',
                        'order' => $request->input("order_{$sectionId}", $section->order),
                    ]);
                }
            }
        }

        return redirect()->route('admin.homepage.index')->with('success', 'Homepage sections updated successfully.');
    }
}
