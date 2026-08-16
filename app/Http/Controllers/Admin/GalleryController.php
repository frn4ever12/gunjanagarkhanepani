<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = GalleryAlbum::withCount('images')->active()->orderBy('order')->get();
        return view('admin.gallery.index', compact('albums'));
    }

    public function createAlbum()
    {
        return view('admin.gallery.create-album');
    }

    public function storeAlbum(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . time();

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('gallery', 'public');
        }

        GalleryAlbum::create($validated);
        return redirect()->route('admin.gallery.index')->with('success', 'Album created successfully.');
    }

    public function editAlbum(GalleryAlbum $album)
    {
        return view('admin.gallery.edit-album', compact('album'));
    }

    public function updateAlbum(Request $request, GalleryAlbum $album)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($album->cover_image) {
                Storage::disk('public')->delete($album->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('gallery', 'public');
        }

        $album->update($validated);
        return redirect()->route('admin.gallery.index')->with('success', 'Album updated successfully.');
    }

    public function destroyAlbum(GalleryAlbum $album)
    {
        foreach ($album->images as $image) {
            if ($image->image) {
                Storage::disk('public')->delete($image->image);
            }
            $image->delete();
        }
        if ($album->cover_image) {
            Storage::disk('public')->delete($album->cover_image);
        }
        $album->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Album deleted successfully.');
    }

    public function uploadImages(GalleryAlbum $album)
    {
        return view('admin.gallery.upload-images', compact('album'));
    }

    public function storeImages(Request $request, GalleryAlbum $album)
    {
        $validated = $request->validate([
            'images.*' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'titles.*' => 'nullable|string|max:255',
            'descriptions.*' => 'nullable|string',
        ]);

        foreach ($request->file('images') as $index => $image) {
            GalleryImage::create([
                'album_id' => $album->id,
                'title' => $request->titles[$index] ?? $image->getClientOriginalName(),
                'description' => $request->descriptions[$index] ?? null,
                'image' => $image->store('gallery/' . $album->id, 'public'),
                'order' => GalleryImage::where('album_id', $album->id)->count() + 1,
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Images uploaded successfully.');
    }

    public function destroyImage(GalleryImage $image)
    {
        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }
        $image->delete();
        return back()->with('success', 'Image deleted successfully.');
    }
}
