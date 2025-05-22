@extends('layouts.app')

@section('title', 'Blog')

@section('banner')
    <div class="py-16 px-4">
        <div class="container mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Green School Blog</h1>
            <p class="text-xl max-w-3xl">Insights and stories from our sustainable education journey</p>
        </div>
    </div>
@endsection

@section('content')
    <!-- Blog Posts -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="mb-12">
                <h2 class="text-3xl font-bold mb-6 text-green-800">Latest Articles</h2>
                <p class="text-gray-700 max-w-4xl">
                    Explore our collection of articles about sustainability, education, and our unique approach to learning.
                </p>
            </div>

            <!-- Categories -->
            <div class="mb-8">
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('blog') }}" class="px-4 py-2 rounded-full {{ !request('category') ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        All
                    </a>
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <a href="{{ route('blog', ['category' => $category->category]) }}" 
                               class="px-4 py-2 rounded-full {{ request('category') == $category->category ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                                {{ ucfirst($category->category) }}
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Posts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @if(isset($posts) && $posts->count() > 0)
                    @foreach($posts as $post)
                        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all">
                            <img src="{{ asset($post->featured_image ?? 'images/post-placeholder.jpg') }}" 
                                alt="{{ $post->title }}" 
                                class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="flex items-center mb-3 text-sm text-gray-500">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">{{ ucfirst($post->category) }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $post->published_at->format('M d, Y') }}</span>
                                </div>
                                <h3 class="text-xl font-bold mb-2">{{ $post->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ $post->excerpt }}</p>
                                <a href="{{ route('news.show', $post->slug) }}" 
                                    class="inline-flex items-center text-green-600 font-medium hover:text-green-800">
                                    Read More
                                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-500">No blog posts available at the moment. Please check back later.</p>
                    </div>
                @endif
            </div>
            
            <!-- Pagination -->
            @if(isset($posts) && $posts->hasPages())
                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-green-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Join Our Green School Community</h2>
            <p class="max-w-2xl mx-auto mb-8 text-green-100">
                Stay updated with our latest news, events, and insights by subscribing to our newsletter.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="px-8 py-3 bg-white text-green-800 hover:bg-green-100 rounded-md font-medium transition duration-300">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
@endsection 