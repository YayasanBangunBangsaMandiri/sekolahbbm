@extends('layouts.app')

@section('title', 'Berita & Pengumuman')

@section('content')
<!-- Hero Section -->
<div class="bg-blue-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
            Berita & Pengumuman
        </h1>
        <p class="mt-6 max-w-3xl mx-auto text-xl text-blue-200">
            Informasi terbaru seputar kegiatan dan pengumuman penting
        </p>
    </div>
</div>

<!-- News Grid -->
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($posts->isEmpty())
            <div class="text-center py-12">
                <h3 class="text-lg font-medium text-gray-900">Belum ada berita</h3>
                <p class="mt-2 text-sm text-gray-500">Berita dan pengumuman akan ditampilkan di sini.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 ease-in-out hover:shadow-lg">
                    <div class="aspect-w-16 aspect-h-9">
                        @if($post->featured_image)
                            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-48 object-cover"
                                 onerror="this.onerror=null; this.src='{{ asset('images/no-image.jpg') }}';">
                        @else
                            <img src="{{ asset('images/no-image.jpg') }}" 
                                 alt="No image available" 
                                 class="w-full h-48 object-cover">
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="text-sm text-gray-500">
                                {{ $post->created_at->format('d M Y') }}
                            </span>
                            @if($post->category)
                                <span class="mx-2 text-gray-300">•</span>
                                <a href="{{ route('news.category', $post->category) }}" 
                                   class="text-sm text-blue-600 hover:text-blue-800">
                                    {{ $post->category }}
                                </a>
                            @endif
                        </div>
                        <h3 class="text-xl font-semibold mb-2">
                            <a href="{{ route('news.show', $post->slug) }}" 
                               class="text-gray-900 hover:text-blue-600">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ Str::limit(strip_tags($post->content), 150) }}
                        </p>
                        <a href="{{ route('news.show', $post->slug) }}" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-800">
                            Baca selengkapnya
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</div>
@endsection 