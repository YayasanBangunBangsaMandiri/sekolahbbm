@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<!-- Hero Section -->
<div class="bg-blue-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
            Galeri SMK Nusantara
        </h1>
        <p class="mt-6 max-w-3xl mx-auto text-xl text-blue-200">
            Dokumentasi kegiatan dan prestasi siswa SMK Nusantara
        </p>
    </div>
</div>

<!-- Gallery Section -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter dan Pencarian -->
        <div class="mb-8">
            <form action="{{ route('gallery') }}" method="GET" class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/4">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="category" id="category" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category }}" {{ request('category') == $category->category ? 'selected' : '' }}>
                                {{ ucfirst($category->category) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full md:w-2/4">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                    <div class="relative rounded-md shadow-sm">
                        <input type="text" name="search" id="search" value="{{ request('search') }}" class="focus:ring-blue-500 focus:border-blue-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md" placeholder="Cari gambar...">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/4 md:self-end">
                    <button type="submit" class="w-full inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        @if($galleries->isEmpty())
            <div class="text-center py-12">
                <svg class="mx-auto h-16 w-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">Tidak ada gambar</h3>
                <p class="mt-1 text-sm text-gray-500">Belum ada gambar dalam galeri.</p>
            </div>
        @else
            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($galleries as $gallery)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <a href="{{ route('gallery.show', $gallery->id) }}" class="block hover:opacity-90 transition-opacity">
                        <div class="h-56 overflow-hidden">
                            <img src="{{ asset('storage/' . $gallery->media_url) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
                        </div>
                    </a>
                    <div class="p-4">
                        <a href="{{ route('gallery.show', $gallery->id) }}" class="block">
                            <h3 class="text-lg font-semibold text-gray-900 hover:text-blue-600">{{ $gallery->title }}</h3>
                        </a>
                        <div class="flex items-center mt-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ ucfirst($gallery->category) }}
                            </span>
                            <span class="text-gray-500 text-sm ml-2">
                                {{ $gallery->created_at->format('d M Y') }}
                            </span>
                        </div>
                        @if($gallery->description)
                            <p class="mt-2 text-sm text-gray-500 line-clamp-2">{{ $gallery->description }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
</div>
@endsection 