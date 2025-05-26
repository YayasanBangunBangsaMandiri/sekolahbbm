@extends('layouts.admin')

@section('title', 'Tambah Berita/Blog')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h3 class="text-gray-700 text-3xl font-medium">Tambah Berita/Blog</h3>

    @if($errors->any())
        <div class="mt-4 p-4 bg-red-100 text-red-700 rounded-md">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mt-8">
        <form id="postForm" method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="bg-white shadow rounded-lg p-6">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" value="{{ old('title') }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('title') border-red-500 @enderror">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Tipe <span class="text-red-500">*</span>
                        </label>
                        <select name="type" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('type') border-red-500 @enderror">
                            <option value="">Pilih Tipe</option>
                            <option value="news" {{ old('type') == 'news' ? 'selected' : '' }}>Berita</option>
                            <option value="blog" {{ old('type') == 'blog' ? 'selected' : '' }}>Blog</option>
                        </select>
                        @error('type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-data="{ showNewCategory: false }">
                        <label class="block text-sm font-medium text-gray-700">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2 space-y-4">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="category_option" value="existing" x-on:click="showNewCategory = false" checked
                                        class="form-radio text-blue-600">
                                    <span class="ml-2">Pilih Kategori yang Ada</span>
                                </label>
                            </div>
                            <div x-show="!showNewCategory">
                                <select name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('category_id') border-red-500 @enderror">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('new_category') border-red-500 @enderror">
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
                        <label class="block text-sm font-medium text-gray-700">
                            Konten <span class="text-red-500">*</span>
                        </label>
                        <input type="hidden" id="content-input" name="content" required>
                        <div id="editor" class="mt-1 block w-full min-h-[300px] rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('content') border-red-500 @enderror">{{ old('content') }}</div>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Gambar Utama</label>
                        <input type="file" name="featured_image" accept="image/*"
                            class="mt-1 block w-full @error('featured_image') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Format yang diizinkan: JPEG, PNG, JPG, GIF (Max. 2MB)</p>
                        @error('featured_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tags</label>
                        <input type="text" name="tags" value="{{ old('tags') }}" placeholder="Pisahkan dengan koma"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('tags') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Contoh: sekolah, pendidikan, prestasi</p>
                        @error('tags')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('status') border-red-500 @enderror">
                            <option value="">Pilih Status</option>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', 'published') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    let editor;

    // Initialize Alpine.js data
    document.addEventListener('alpine:init', () => {
        Alpine.data('categoryForm', () => ({
            showNewCategory: {{ old('category_option') == 'new' ? 'true' : 'false' }},
            init() {
                // Set initial state based on old input
                if (this.showNewCategory) {
                    document.querySelector('input[name="category_option"][value="new"]').checked = true;
                }
            }
        }));
    });

    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo'],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                ]
            }
        })
        .then(newEditor => {
            editor = newEditor;
            console.log('CKEditor initialized successfully');
            
            // Set initial content if exists
            const initialContent = document.querySelector('#content-input').value;
            if (initialContent) {
                editor.setData(initialContent);
            }
            
            // Listen for CKEditor changes and update hidden input
            editor.model.document.on('change:data', () => {
                document.querySelector('#content-input').value = editor.getData();
            });
        })
        .catch(error => {
            console.error('CKEditor initialization error:', error);
            // Show error message to user
            const editorElement = document.querySelector('#editor');
            editorElement.innerHTML = '<div class="p-4 bg-red-100 text-red-700">Error initializing editor. Please refresh the page.</div>';
        });

    // Form submission handling
    document.getElementById('postForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        try {
            // Client-side validation
            const content = editor.getData();
            if (!content.trim()) {
                alert('Konten tidak boleh kosong');
                return;
            }

            // Category validation
            const categoryOption = document.querySelector('input[name="category_option"]:checked').value;
            if (categoryOption === 'existing') {
                const categoryId = document.querySelector('select[name="category_id"]').value;
                if (!categoryId) {
                    alert('Silakan pilih kategori');
                    return;
                }
            } else if (categoryOption === 'new') {
                const newCategory = document.querySelector('input[name="new_category"]').value.trim();
                if (!newCategory) {
                    alert('Silakan isi nama kategori baru');
                    return;
                }
            }
            
            // Get form data
            const formData = new FormData(this);
            formData.set('content', content);
            
            // Submit the form
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();
            console.log('Response status:', response.status);
            console.log('Response data:', data);
            
            if (!response.ok) {
                if (response.status === 422 && data.errors) {
                    let errorMessages = [];
                    Object.keys(data.errors).forEach(key => {
                        const messages = data.errors[key];
                        if (Array.isArray(messages)) {
                            messages.forEach(message => errorMessages.push(message));
                        } else {
                            errorMessages.push(messages);
                        }
                    });
                    
                    // Show errors in a more user-friendly way
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'mt-4 p-4 bg-red-100 text-red-700 rounded-md';
                    errorDiv.innerHTML = `
                        <h4 class="font-bold mb-2">Validasi gagal:</h4>
                        <ul class="list-disc list-inside">
                            ${errorMessages.map(msg => `<li>${msg}</li>`).join('')}
                        </ul>
                    `;
                    
                    // Remove any existing error messages
                    const existingError = document.querySelector('.validation-errors');
                    if (existingError) {
                        existingError.remove();
                    }
                    
                    // Add the new error messages before the form
                    errorDiv.classList.add('validation-errors');
                    const form = document.getElementById('postForm');
                    form.parentNode.insertBefore(errorDiv, form);
                    
                    // Scroll to error messages
                    errorDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan saat menyimpan data');
                }
                return;
            }

            if (data.success) {
                window.location.href = data.redirect;
            } else {
                throw new Error(data.message || 'Unknown error');
            }
            
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        }
    });
</script>
@endpush
@endsection 