<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['author', 'category'])
            ->latest()
            ->paginate(25);
            
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'type' => 'required|in:news,blog',
                'category_option' => 'required|in:existing,new',
                'category_id' => 'required_if:category_option,existing|exists:categories,id',
                'new_category' => 'required_if:category_option,new|string|max:255|nullable',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tags' => 'nullable|string',
                'status' => 'required|in:draft,published',
            ]);

            // Generate slug
            $slug = Str::slug($validated['title']);
            $count = Post::where('slug', 'like', $slug . '%')->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }

            // Handle featured image
            $imagePath = null;
            if ($request->hasFile('featured_image')) {
                $file = $request->file('featured_image');
                $filename = $file->hashName(); // Gunakan hashName() untuk nama yang unik
                $path = $file->storeAs('posts', $filename, 'public');
                $imagePath = $path; // Path akan disimpan sebagai 'posts/filename.jpg'
            }

            // Generate excerpt
            $excerpt = Str::limit(strip_tags($validated['content']), 150);

            // Handle category
            $categoryId = null;
            $category = null;
            $categoryName = 'uncategorized';
            
            if ($validated['category_option'] === 'new' && !empty($validated['new_category'])) {
                $category = Category::create([
                    'name' => $validated['new_category'],
                    'slug' => Str::slug($validated['new_category']),
                ]);
                $categoryId = $category->id;
                $categoryName = $category->name;
            } else if ($validated['category_option'] === 'existing' && !empty($validated['category_id'])) {
                $categoryId = $validated['category_id'];
                $category = Category::find($categoryId);
                $categoryName = $category ? $category->name : 'uncategorized';
            }

            // Create post
            $post = Post::create([
                'title' => $validated['title'],
                'slug' => $slug,
                'content' => $validated['content'],
                'excerpt' => $excerpt,
                'type' => $validated['type'],
                'category_id' => $categoryId,
                'category' => $categoryName,
                'featured_image' => $imagePath,
                'status' => $validated['status'],
                'author_id' => Auth::id(),
                'published_at' => $validated['status'] === 'published' ? now() : null,
            ]);

            // Handle tags
            if (!empty($validated['tags'])) {
                $tags = array_map('trim', explode(',', $validated['tags']));
                $post->syncTags($tags);
            }

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post berhasil dibuat',
                    'redirect' => route('admin.posts.index')
                ]);
            }

            return redirect()
                ->route('admin.posts.index')
                ->with('success', 'Post berhasil dibuat.');

        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menyimpan post'
                ], 422);
            }

            return back()
                ->withInput()
                ->withErrors(['error' => 'Gagal menyimpan post']);
        }
    }

    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();
        $currentTags = $post->tags->pluck('name')->implode(',');
        return view('admin.posts.edit', compact('post', 'categories', 'currentTags'));
    }

    public function update(Request $request, Post $post)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'type' => 'required|in:news,blog',
                'category_option' => 'required|in:existing,new',
                'category_id' => 'required_if:category_option,existing|exists:categories,id',
                'new_category' => 'required_if:category_option,new|string|max:255|nullable',
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
                $file = $request->file('featured_image');
                $filename = $file->hashName(); // Gunakan hashName() untuk nama yang unik
                $path = $file->storeAs('posts', $filename, 'public');
                $imagePath = $path; // Path akan disimpan sebagai 'posts/filename.jpg'
            }

            // Handle category
            $categoryId = null;
            $category = null;
            $categoryName = 'uncategorized';
            
            if ($request->category_option === 'new' && $request->filled('new_category')) {
                $category = Category::create([
                    'name' => $request->new_category,
                    'slug' => Str::slug($request->new_category),
                ]);
                $categoryId = $category->id;
                $categoryName = $category->name;
            } else if (isset($request->category_id)) {
                $categoryId = $request->category_id;
                $category = Category::find($categoryId);
                $categoryName = $category ? $category->name : 'uncategorized';
            }

            // Generate excerpt from content
            $excerpt = Str::limit(strip_tags($request->content), 150);

            $post->update([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'excerpt' => $excerpt,
                'type' => $validated['type'],
                'category_id' => $categoryId,
                'category' => $categoryName,
                'featured_image' => $imagePath,
                'status' => $validated['status'],
                'published_at' => $validated['status'] === 'published' && !$post->published_at ? now() : $post->published_at,
            ]);

            // Handle tags
            if (isset($validated['tags'])) {
                $tags = array_map('trim', explode(',', $validated['tags']));
                $post->syncTags($tags);
            }

            return redirect()
                ->route('admin.posts.index')
                ->with('success', 'Post berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Post $post)
    {
        try {
            // Delete featured image if exists
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }

            $post->delete();

            return redirect()
                ->route('admin.posts.index')
                ->with('success', 'Post berhasil dihapus.');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
} 