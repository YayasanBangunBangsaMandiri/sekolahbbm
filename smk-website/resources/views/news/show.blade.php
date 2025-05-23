@extends('layouts.app')

@section('title', $post->title)

@section('content')
<!-- Article Header -->
<div class="bg-blue-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <div class="flex items-center justify-center space-x-2 text-blue-200 mb-4">
                <span>{{ $post->created_at->format('d M Y') }}</span>
                @if($post->category)
                    <span>•</span>
                    <a href="{{ route('news.category', $post->category) }}" class="hover:text-white">
                        {{ $post->category }}
                    </a>
                @endif
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                {{ $post->title }}
            </h1>
            @if($post->author)
                <div class="text-blue-200">
                    Oleh {{ $post->author->name }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Article Content -->
<div class="bg-white py-12">
    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($post->featured_image)
            <div class="mb-8 rounded-lg overflow-hidden">
                <img src="{{ asset('storage/' . $post->featured_image) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-auto">
            </div>
        @endif

        <div class="prose prose-lg max-w-none">
            {!! $post->content !!}
        </div>

        @if($post->tags && $post->tags->count() > 0)
            <div class="mt-8 pt-8 border-t border-gray-200">
                <div class="flex items-center flex-wrap gap-2">
                    <span class="text-gray-600">Tags:</span>
                    @foreach($post->tags as $tag)
                        <a href="{{ route('news.tag', $tag->slug) }}" 
                           class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800 hover:bg-blue-200">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </article>

    <!-- Related Posts -->
    @if($relatedPosts->count() > 0)
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Berita Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPosts as $relatedPost)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        @if($relatedPost->featured_image)
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/' . $relatedPost->featured_image) }}" 
                                     alt="{{ $relatedPost->title }}" 
                                     class="w-full h-48 object-cover">
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-2">
                                <a href="{{ route('news.show', $relatedPost->slug) }}" 
                                   class="text-gray-900 hover:text-blue-600">
                                    {{ $relatedPost->title }}
                                </a>
                            </h3>
                            <p class="text-gray-600 text-sm">
                                {{ $relatedPost->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection 