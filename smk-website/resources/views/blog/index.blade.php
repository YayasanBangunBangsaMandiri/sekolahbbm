@extends('layouts.app')

@section('title', isset($category) ? "Kategori: $category" : 'Blog')

@section('content')
<div class="bg-white py-10">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                @if(isset($category))
                    Artikel Kategori: {{ ucfirst($category) }}
                @else
                    Artikel & Berita Terbaru
                @endif
            </h1>
            <p class="mt-3 text-gray-600">Informasi dan artikel tentang kegiatan SMK Nusantara</p>
        </div>

        <div class="flex flex-wrap -mx-4">
            <!-- Main Content -->
            <div class="w-full lg:w-3/4 px-4">
                <!-- Category Filter -->
                <div class="mb-6 flex flex-wrap">
                    <span class="mr-2 mb-2 font-medium text-gray-600">Kategori:</span>
                    <a href="{{ route('blog') }}" class="mr-2 mb-2 px-3 py-1 text-sm font-medium rounded-full {{ !isset($category) ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                        Semua
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('blog.category', $cat->category) }}" class="mr-2 mb-2 px-3 py-1 text-sm font-medium rounded-full {{ isset($category) && $category == $cat->category ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                            {{ ucfirst($cat->category) }}
                        </a>
                    @endforeach
                </div>

                @if($posts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($posts as $post)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                                <div class="h-48 overflow-hidden">
                                    @if($post->featured_image)
                                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-blue-100">
                                            <span class="text-blue-500"><i class="fas fa-newspaper fa-3x"></i></span>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-5">
                                    <div class="flex items-center mb-3">
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium py-1 px-2 rounded">
                                            {{ ucfirst($post->category) }}
                                        </span>
                                        <span class="text-gray-500 text-sm ml-2">{{ $post->created_at->format('d M Y') }}</span>
                                    </div>
                                    <a href="{{ route('blog.show', $post->slug) }}" class="block">
                                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h3>
                                        <p class="text-gray-600 line-clamp-3 mb-3">
                                            {{ Str::limit(strip_tags($post->content), 120) }}
                                        </p>
                                    </a>
                                    <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800">
                                        Baca selengkapnya
                                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="text-center py-10">
                        <div class="text-gray-500 mb-3">
                            <i class="fas fa-search fa-3x"></i>
                        </div>
                        <h3 class="text-xl font-medium text-gray-800 mb-1">Tidak ada artikel ditemukan</h3>
                        <p class="text-gray-600">
                            @if(isset($category))
                                Belum ada artikel dalam kategori ini.
                            @else
                                Belum ada artikel yang dipublish.
                            @endif
                        </p>
                    </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="w-full lg:w-1/4 px-4 mt-8 lg:mt-0">
                <div class="bg-gray-50 rounded-lg p-6 shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Kategori</h3>
                    <ul class="space-y-2">
                        @foreach($categories as $cat)
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

                <div class="mt-6 bg-blue-50 rounded-lg p-6 shadow-sm border border-blue-100">
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