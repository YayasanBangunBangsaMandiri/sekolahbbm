<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('type', 'news')
            ->latest()
            ->paginate(9);
        return view('news.index', compact('posts'));
    }

    /**
     * Display a listing of blog posts.
     */
    public function blog()
    {
        $posts = Post::where('type', 'blog')
            ->latest()
            ->paginate(9);
        return view('blog.index', compact('posts'));
    }

    /**
     * Display posts by category.
     */
    public function category($category)
    {
        $posts = Post::whereHas('categories', function($query) use ($category) {
            $query->where('slug', $category);
        })->latest()->paginate(9);
        
        return view('news.category', compact('posts', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        
        Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category' => $validated['category'],
            'slug' => $slug,
            'featured_image' => $imagePath,
            'author_id' => Auth::id(),
        ]);
        
        return redirect()->route('admin.posts.index')
                        ->with('success', 'Post berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::where('type', $post->type)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        if ($post->type === 'blog') {
            return view('blog.show', compact('post', 'relatedPosts'));
        }

        return view('news.show', compact('post', 'relatedPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'category' => $validated['category'],
            'featured_image' => $imagePath,
        ]);
        
        return redirect()->route('admin.posts.index')
                        ->with('success', 'Post berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        
        // Delete image if exists
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }
        
        $post->delete();
        
        return redirect()->route('admin.posts.index')
                        ->with('success', 'Post berhasil dihapus.');
    }

    public function tag($tag)
    {
        $posts = Post::whereHas('tags', function($query) use ($tag) {
            $query->where('slug', $tag);
        })->latest()->paginate(9);
        
        return view('news.tag', compact('posts', 'tag'));
    }
}
