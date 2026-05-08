<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // ─── Dashboard ────────────────────────────────────────────────────────────

    public function index()
    {
        $images = Gallery::latest()->get();
        return view('dashboard.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('dashboard.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        Gallery::create([
            'caption'    => $request->caption,
            'image_path' => $request->file('image')->store('gallery', 'public'),
        ]);

        return redirect()->route('dashboard.gallery.index')
            ->with('success', 'Photo uploaded successfully.');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('dashboard.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $gallery = Gallery::findOrFail($id);
        $data = ['caption' => $request->caption];

        if ($request->hasFile('image')) {
            // Delete old image from storage
            if ($gallery->image_path) {
                Storage::disk('public')->delete($gallery->image_path);
            }
            $data['image_path'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($data);

        return redirect()->route('dashboard.gallery.index')
            ->with('success', 'Photo updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('dashboard.gallery.index')
            ->with('success', 'Photo deleted successfully.');
    }

    // ─── Public ───────────────────────────────────────────────────────────────

    public function showPublicGallery()
    {
        $images = Gallery::latest()->get();
        return view('gallery', compact('images'));
    }
}
