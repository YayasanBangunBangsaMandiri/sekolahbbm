<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')
            ->latest()
            ->paginate(25);
            
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:news,blog',
            'category' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        $slug = Str::slug($request->title);
        
        // Check if slug exists
        $count = Post::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('posts', 'public');
        }

        $post = Post::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'content' => $validated['content'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'featured_image' => $imagePath,
            'status' => $validated['status'],
            'author_id' => Auth::id(),
        ]);

        // Handle tags
        if (!empty($validated['tags'])) {
            $tags = array_map('trim', explode(',', $validated['tags']));
            $post->syncTags($tags);
        }

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post berhasil dibuat.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:news,blog',
            'category' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        $imagePath = $post->featured_image;
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $imagePath = $request->file('featured_image')->store('posts', 'public');
        }

        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'featured_image' => $imagePath,
            'status' => $validated['status'],
        ]);

        // Handle tags
        if (isset($validated['tags'])) {
            $tags = array_map('trim', explode(',', $validated['tags']));
            $post->syncTags($tags);
        }

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        // Delete featured image if exists
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post berhasil dihapus.');
    }
} 