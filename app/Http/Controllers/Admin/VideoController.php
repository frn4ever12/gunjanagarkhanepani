<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('order')->paginate(15);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'required|url|max:255',
            'video_type' => 'required|in:youtube,vimeo',
            'thumbnail' => 'nullable|url|max:255',
            'category' => 'nullable|string|max:255',
            'is_published' => 'boolean',
            'order' => 'integer',
        ]);

        Video::create($validated);
        return redirect()->route('admin.videos.index')->with('success', 'Video created successfully.');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'required|url|max:255',
            'video_type' => 'required|in:youtube,vimeo',
            'thumbnail' => 'nullable|url|max:255',
            'category' => 'nullable|string|max:255',
            'is_published' => 'boolean',
            'order' => 'integer',
        ]);

        $video->update($validated);
        return redirect()->route('admin.videos.index')->with('success', 'Video updated successfully.');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('admin.videos.index')->with('success', 'Video deleted successfully.');
    }
}
