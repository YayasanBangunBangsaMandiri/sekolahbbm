@extends('layouts.app')

@section('title', $post->title)

@section('meta')
    <meta name="description" content="{{ $post->excerpt }}">
    @if($post->meta_keywords)
        <meta name="keywords" content="{{ $post->meta_keywords }}">
    @endif
@endsection

@section('content')
    <!-- Article Header -->
    <div class="bg-green-800 text-white py-16 px-4">
        <div class="container mx-auto max-w-4xl">
            <div class="mb-4">
                <span class="inline-block bg-white text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                    {{ ucfirst($post->category) }}
                </span>
                <span class="ml-4 text-green-200">{{ $post->published_at->format('F j, Y') }}</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $post->title }}</h1>
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ asset('images/logo.png') }}" alt="Green School">
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium">{{ $post->user->name ?? 'Green School Team' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Article Content -->
    <div class="py-12 bg-white">
        <div class="container mx-auto max-w-4xl px-4">
            @if($post->featured_image)
                <div class="mb-10">
                    <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto rounded-lg shadow-md">
                </div>
            @endif

            <div class="prose prose-lg max-w-none">
                {!! $post->content !!}
            </div>

            @if(isset($tags) && $tags->count() > 0)
                <div class="mt-10 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($tags as $tag)
                            <a href="{{ route('news.tag', $tag->slug) }}" class="px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-full text-sm text-gray-700">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Related Articles -->
    @if(isset($relatedPosts) && $relatedPosts->count() > 0)
        <div class="py-12 bg-gray-50">
            <div class="container mx-auto max-w-6xl px-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Related Articles</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $relatedPost)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset($relatedPost->featured_image ?? 'images/post-placeholder.jpg') }}" 
                                alt="{{ $relatedPost->title }}" 
                                class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $relatedPost->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($relatedPost->excerpt, 100) }}</p>
                                <a href="{{ route('news.show', $relatedPost->slug) }}" 
                                    class="inline-flex items-center text-green-600 font-medium hover:text-green-800">
                                    Read More
                                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Call to Action -->
    <div class="py-16 bg-green-800 text-white">
        <div class="container mx-auto max-w-4xl px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Want to Learn More?</h2>
            <p class="mb-8 text-green-100 max-w-2xl mx-auto">
                Visit our campus to experience Green School's unique approach to education firsthand.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="px-8 py-3 bg-white text-green-800 hover:bg-green-100 rounded-md font-medium transition duration-300">
                    Contact Us
                </a>
                <a href="{{ route('blog') }}" class="px-8 py-3 bg-transparent border-2 border-white hover:bg-white hover:text-green-800 rounded-md font-medium transition duration-300">
                    Back to Blog
                </a>
            </div>
        </div>
    </div>
@endsection 