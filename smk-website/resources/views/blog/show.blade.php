@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="bg-white py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            <!-- Main Content -->
            <div class="w-full lg:w-3/4 px-4">
                <!-- Breadcrumb -->
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="{{ route('blog') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Blog</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 line-clamp-1">{{ $post->title }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <article class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                    <!-- Featured Image -->
                    @if($post->featured_image)
                    <div class="h-80 overflow-hidden">
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                    </div>
                    @endif

                    <div class="p-6">
                        <!-- Post Header -->
                        <div class="mb-6">
                            <div class="flex items-center mb-3">
                                <a href="{{ route('blog.category', $post->category) }}" class="bg-blue-100 text-blue-800 text-sm font-medium py-1 px-2 rounded">
                                    {{ ucfirst($post->category) }}
                                </a>
                                <span class="text-gray-500 text-sm ml-3">{{ $post->created_at->format('d M Y') }}</span>
                            </div>
                            <h1 class="text-3xl font-bold text-gray-800 mb-3">{{ $post->title }}</h1>
                        </div>
                        
                        <!-- Post Content -->
                        <div class="prose max-w-none">
                            {!! $post->content !!}
                        </div>
                        
                        <!-- Post Footer -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <span class="text-gray-600">Bagikan:</span>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="ml-2 text-blue-600 hover:text-blue-800">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}" target="_blank" class="ml-2 text-blue-400 hover:text-blue-600">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . route('blog.show', $post->slug)) }}" target="_blank" class="ml-2 text-green-600 hover:text-green-800">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                                <a href="{{ route('blog') }}" class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800">
                                    <svg class="mr-1 w-5 h-5 transform rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    Kembali ke Blog
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Related Posts -->
                @if($relatedPosts->count() > 0)
                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Artikel Terkait</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedPosts as $related)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                            <div class="h-40 overflow-hidden">
                                @if($related->featured_image)
                                    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-blue-100">
                                        <span class="text-blue-500"><i class="fas fa-newspaper fa-2x"></i></span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-4">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium py-1 px-2 rounded">
                                    {{ ucfirst($related->category) }}
                                </span>
                                <a href="{{ route('blog.show', $related->slug) }}" class="block mt-2">
                                    <h4 class="text-lg font-semibold text-gray-800 line-clamp-2">{{ $related->title }}</h4>
                                </a>
                                <p class="text-gray-600 text-sm mt-2">{{ $related->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="w-full lg:w-1/4 px-4 mt-8 lg:mt-0">
                <div class="bg-gray-50 rounded-lg p-6 shadow-sm border border-gray-200 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Kategori</h3>
                    <ul class="space-y-2">
                        @foreach($categories ?? [] as $cat)
                            <li>
                                <a href="{{ route('blog.category', $cat->category) }}" class="flex items-center text-gray-700 hover:text-blue-700">
                                    <span class="mr-2">
                                        <i class="fas fa-angle-right text-xs text-blue-500"></i>
                                    </span>
                                    {{ ucfirst($cat->category) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="bg-blue-50 rounded-lg p-6 shadow-sm border border-blue-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Informasi PPDB</h3>
                    <p class="text-gray-600 mb-4">Pendaftaran peserta didik baru SMK Nusantara sedang dibuka!</p>
                    <a href="{{ route('registration') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 