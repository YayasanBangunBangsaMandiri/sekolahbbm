@extends('layouts.app')

@section('title', $post->title)

@section('content')
<!-- Main Article -->
<article class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <header class="mb-10">
            <!-- Category & Date -->
            <div class="flex items-center text-sm mb-4">
                <a href="{{ route('blog.category', $post->category) }}" class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                    {{ ucfirst($post->category) }}
                </a>
                <time datetime="{{ $post->created_at->format('Y-m-d') }}" class="ml-3 text-gray-500">
                    {{ $post->created_at->format('d M Y') }}
                </time>
            </div>
            
            <!-- Title -->
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                {{ $post->title }}
            </h1>
            
            <!-- Author -->
            <div class="mt-4 flex items-center">
                <div class="flex-shrink-0">
                    <span class="sr-only">{{ $post->author->name }}</span>
                    <div class="h-10 w-10 rounded-full bg-blue-700 flex items-center justify-center text-white font-bold text-lg">
                        {{ substr($post->author->name, 0, 1) }}
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">{{ $post->author->name }}</p>
                    <div class="flex space-x-1 text-sm text-gray-500">
                        <span>{{ $post->author->role }}</span>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Featured Image -->
        @if($post->featured_image)
        <div class="mb-10">
            <img class="w-full h-auto rounded-lg shadow-lg object-cover" src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
        </div>
        @endif
        
        <!-- Content -->
        <div class="prose prose-blue prose-lg max-w-none">
            {!! $post->content !!}
        </div>
        
        <!-- Share Links -->
        <div class="mt-12">
            <div class="border-t border-gray-200 pt-8">
                <h2 class="text-sm font-bold text-gray-500 tracking-wide uppercase">Bagikan Artikel</h2>
                <div class="flex space-x-6 mt-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . route('blog.show', $post->slug)) }}" target="_blank" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">WhatsApp</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5-.5z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>

<!-- Related Posts -->
@if(count($relatedPosts) > 0)
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 mb-8">Artikel Terkait</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($relatedPosts as $relatedPost)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($relatedPost->featured_image)
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $relatedPost->featured_image) }}" alt="{{ $relatedPost->title }}">
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ ucfirst($relatedPost->category) }}
                        </span>
                        <time datetime="{{ $relatedPost->created_at->format('Y-m-d') }}" class="ml-2 text-sm text-gray-500">
                            {{ $relatedPost->created_at->format('d M Y') }}
                        </time>
                    </div>
                    <a href="{{ route('blog.show', $relatedPost->slug) }}" class="block mt-2">
                        <p class="text-xl font-semibold text-gray-900">{{ $relatedPost->title }}</p>
                        <p class="mt-3 text-base text-gray-500 line-clamp-2">
                            {{ Str::limit(strip_tags($relatedPost->content), 120) }}
                        </p>
                    </a>
                    <div class="mt-4">
                        <a href="{{ route('blog.show', $relatedPost->slug) }}" class="text-blue-600 hover:text-blue-800">
                            Baca selengkapnya &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- CTA Section -->
<div class="bg-blue-900">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
            <span class="block">Ingin mengetahui informasi lebih banyak?</span>
            <span class="block text-blue-300">Daftar sekarang atau hubungi kami.</span>
        </h2>
        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="{{ route('registration') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-900 bg-white hover:bg-blue-50">
                    Daftar Sekarang
                </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-700 hover:bg-blue-800">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 