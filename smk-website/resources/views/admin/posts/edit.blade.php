@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h3 class="text-gray-700 text-3xl font-medium">Edit Post</h3>

    <div class="mt-8">
        <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="bg-white shadow rounded-lg p-6">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tipe</label>
                        <select name="type" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="news" {{ old('type', $post->type) == 'news' ? 'selected' : '' }}>Berita</option>
                            <option value="blog" {{ old('type', $post->type) == 'blog' ? 'selected' : '' }}>Blog</option>
                        </select>
                        @error('type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-data="{ showNewCategory: false }">
                        <label class="block text-sm font-medium text-gray-700">Kategori</label>
                        <div class="mt-2 space-y-4">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="category_option" value="existing" x-on:click="showNewCategory = false" checked
                                        class="form-radio text-blue-600">
                                    <span class="ml-2">Pilih Kategori yang Ada</span>
                                </label>
                            </div>
                            <div x-show="!showNewCategory">
                                <select name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="category_option" value="new" x-on:click="showNewCategory = true"
                                        class="form-radio text-blue-600">
                                    <span class="ml-2">Buat Kategori Baru</span>
                                </label>
                            </div>
                            <div x-show="showNewCategory">
                                <input type="text" name="new_category" placeholder="Nama Kategori Baru"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('new_category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Konten</label>
                        <textarea name="content" id="editor" rows="10" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Gambar Utama</label>
                        @if($post->featured_image)
                            <div class="mt-2">
                                <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="h-32 w-auto">
                            </div>
                        @endif
                        <input type="file" name="featured_image" accept="image/*"
                            class="mt-1 block w-full">
                        <p class="mt-1 text-sm text-gray-500">Biarkan kosong jika tidak ingin mengubah gambar</p>
                        @error('featured_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tags</label>
                        <input type="text" name="tags" value="{{ old('tags', $currentTags) }}" placeholder="Pisahkan dengan koma"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <p class="mt-1 text-sm text-gray-500">Pisahkan tag dengan koma, contoh: sekolah, pendidikan, prestasi</p>
                        @error('tags')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
@endsection 