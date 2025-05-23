@extends('admin.layouts.app')

@section('title', 'Edit Berita/Blog')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Berita/Blog</h1>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Form Edit Berita/Blog
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title', $post->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe</label>
                            <select class="form-select @error('type') is-invalid @enderror" 
                                    id="type" name="type" required>
                                <option value="news" {{ old('type', $post->type) == 'news' ? 'selected' : '' }}>Berita</option>
                                <option value="blog" {{ old('type', $post->type) == 'blog' ? 'selected' : '' }}>Blog</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <input type="text" class="form-control @error('category') is-invalid @enderror" 
                                   id="category" name="category" value="{{ old('category', $post->category) }}">
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="featured_image" class="form-label">Gambar Utama</label>
                    @if($post->featured_image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                 alt="Current featured image" 
                                 class="img-thumbnail" 
                                 style="max-height: 200px">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                           id="featured_image" name="featured_image" accept="image/*">
                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                    @error('featured_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Konten</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" 
                              id="content" name="content" rows="10" required>{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Tags (pisahkan dengan koma)</label>
                    <input type="text" class="form-control @error('tags') is-invalid @enderror" 
                           id="tags" name="tags" value="{{ old('tags', $post->tags->pluck('name')->implode(', ')) }}">
                    @error('tags')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" 
                            id="status" name="status" required>
                        <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
@endsection 