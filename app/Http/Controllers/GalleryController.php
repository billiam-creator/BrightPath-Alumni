<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // 🔒 Dashboard: list gallery images
    public function index()
    {
        $images = Gallery::latest()->get();
        return view('dashboard.gallery.index', compact('images'));
    }

    // 🔒 Dashboard: show form to upload
    public function create()
    {
        return view('dashboard.gallery.create');
    }

    // 🔒 Dashboard: store uploaded image
    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $filePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'caption' => $request->caption,
            'image_path' => $filePath,
        ]);

        return redirect()->route('dashboard.gallery.index')->with('success', 'Image uploaded successfully.');
    }

    // 🔒 Dashboard: show edit form
    public function edit(Gallery $gallery)
    {
        return view('dashboard.gallery.edit', compact('gallery'));
    }

    // 🔒 Dashboard: update image
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $data = ['caption' => $request->caption];

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($data);

        return redirect()->route('dashboard.gallery.index')->with('success', 'Image updated successfully.');
    }

    // 🔒 Dashboard: delete image
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('dashboard.gallery.index')->with('success', 'Image deleted successfully.');
    }

    // ✅ Public Gallery View
    public function showPublicGallery()
    {
        $images = Gallery::latest()->get();
        return view('gallery', compact('images'));
    }
}
