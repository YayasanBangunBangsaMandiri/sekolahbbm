@extends('layouts.app')

@section('title', $gallery->title)

@section('content')
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('gallery') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                <svg class="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali ke Galeri
            </a>
        </div>

        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="p-6 md:p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $gallery->title }}</h1>
                <div class="flex items-center text-sm mb-6">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-2">
                        {{ ucfirst($gallery->category) }}
                    </span>
                    <span class="text-gray-500">
                        Diupload pada {{ $gallery->created_at->format('d M Y') }}
                    </span>
                </div>

                <div class="mb-8">
                    <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/' . $gallery->media_url) }}" 
                             alt="{{ $gallery->title }}" 
                             class="object-cover"
                             onerror="this.src='{{ asset('images/placeholder.jpg') }}';">
                    </div>
                </div>

                @if($gallery->description)
                <div class="prose prose-blue max-w-none">
                    <p>{{ $gallery->description }}</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Related Images -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Galeri Lainnya</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($relatedGalleries as $relatedGallery)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <a href="{{ route('gallery.show', $relatedGallery->id) }}" class="block hover:opacity-90 transition-opacity">
                        <div class="h-40 overflow-hidden">
                            <img src="{{ asset('storage/' . $relatedGallery->media_url) }}" 
                                 alt="{{ $relatedGallery->title }}" 
                                 class="w-full h-full object-cover"
                                 onerror="this.src='{{ asset('images/placeholder.jpg') }}';">
                        </div>
                    </a>
                    <div class="p-4">
                        <a href="{{ route('gallery.show', $relatedGallery->id) }}" class="block">
                            <h3 class="text-lg font-semibold text-gray-900 hover:text-blue-600 line-clamp-1">{{ $relatedGallery->title }}</h3>
                        </a>
                        <div class="flex items-center mt-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ ucfirst($relatedGallery->category) }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection 