<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Gallery::with('creator')->latest();
        
        // Filter berdasarkan kategori
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        
        // Filter berdasarkan pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        $galleries = $query->paginate(12);
        $categories = Gallery::select('category')->distinct()->get();
        
        // Jika ini request dari admin, tampilkan view admin
        if ($request->is('admin*')) {
            return view('admin.gallery.index', compact('galleries', 'categories'));
        }
        
        // Jika tidak, tampilkan view publik
        return view('gallery.index', compact('galleries', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'media' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB limit
            'category' => 'required|string|max:255',
        ]);
        
        // Upload media
        $mediaPath = $request->file('media')->store('gallery', 'public');
        
        // Tentukan tipe media berdasarkan ekstensi
        $mediaType = 'image'; // Default to image for now
        
        Gallery::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'media_url' => $mediaPath,
            'media_type' => $mediaType,
            'category' => $validated['category'],
            'created_by' => Auth::id(),
        ]);
        
        return redirect()->route('admin.gallery.index')
                        ->with('success', 'Galeri berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::with('creator')->findOrFail($id);
        
        // Ambil galeri terkait (dari kategori yang sama)
        $relatedGalleries = Gallery::where('id', '!=', $gallery->id)
                                  ->where('category', $gallery->category)
                                  ->latest()
                                  ->take(4)
                                  ->get();
        
        return view('gallery.show', compact('gallery', 'relatedGalleries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB limit
            'category' => 'required|string|max:255',
        ]);
        
        $mediaPath = $gallery->media_url;
        
        // Jika ada file media baru
        if ($request->hasFile('media')) {
            // Hapus file lama
            if ($gallery->media_url) {
                Storage::disk('public')->delete($gallery->media_url);
            }
            
            // Upload file baru
            $mediaPath = $request->file('media')->store('gallery', 'public');
        }
        
        $gallery->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'media_url' => $mediaPath,
            'category' => $validated['category'],
        ]);
        
        return redirect()->route('admin.gallery.index')
                        ->with('success', 'Galeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        
        // Hapus file media
        if ($gallery->media_url) {
            Storage::disk('public')->delete($gallery->media_url);
        }
        
        $gallery->delete();
        
        return redirect()->route('admin.gallery.index')
                        ->with('success', 'Galeri berhasil dihapus.');
    }
}
