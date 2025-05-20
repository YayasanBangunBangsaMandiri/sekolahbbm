@extends('layouts.app')

@section('title', isset($category) ? 'Kategori: ' . ucfirst($category) : 'Blog')

@section('content')
<!-- Hero Section -->
<div class="bg-blue-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
            @if(isset($category))
                Kategori: {{ ucfirst($category) }}
            @else
                Blog & Berita
            @endif
        </h1>
        <p class="mt-6 max-w-3xl mx-auto text-xl text-blue-200">
            Informasi terbaru seputar kegiatan, prestasi, dan pengumuman SMK Nusantara
        </p>
    </div>
</div>

<!-- Blog Section -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:flex">
            <!-- Main Content -->
            <div class="lg:w-3/4 lg:pr-8">
                @if(count($posts) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($posts as $post)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            @if($post->featured_image)
                            <div class="h-48 overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                            </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-center">
                                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        {{ ucfirst($post->category) }}
                                    </span>
                                    <time datetime="{{ $post->created_at->format('Y-m-d') }}" class="ml-2 text-sm text-gray-500">
                                        {{ $post->created_at->format('d M Y') }}
                                    </time>
                                </div>
                                <a href="{{ route('blog.show', $post->slug) }}" class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900">{{ $post->title }}</p>
                                    <p class="mt-3 text-base text-gray-500 line-clamp-3">
                                        {{ Str::limit(strip_tags($post->content), 150) }}
                                    </p>
                                </a>
                                <div class="mt-4">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="text-blue-600 hover:text-blue-800">
                                        Baca selengkapnya &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-16 w-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">Tidak ada postingan</h3>
                        <p class="mt-1 text-sm text-gray-500">Belum ada postingan yang tersedia dalam kategori ini.</p>
                    </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="lg:w-1/4 mt-10 lg:mt-0">
                <div class="bg-gray-50 rounded-lg shadow-md p-6 sticky top-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Kategori</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('blog') }}" class="text-blue-600 hover:text-blue-800 font-medium {{ !isset($category) ? 'font-bold' : '' }}">
                                Semua Kategori
                            </a>
                        </li>
                        @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('blog.category', $cat->category) }}" class="text-blue-600 hover:text-blue-800 {{ isset($category) && $category == $cat->category ? 'font-bold' : '' }}">
                                {{ ucfirst($cat->category) }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    
                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Pencarian</h3>
                        <form action="{{ route('blog') }}" method="GET">
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="search" class="block w-full pr-10 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Cari artikel..." value="{{ request('search') }}">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 