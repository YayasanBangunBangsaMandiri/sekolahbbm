@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<div class="relative bg-blue-900 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-blue-900 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <div class="pt-10 mx-auto max-w-7xl px-4 sm:pt-12 sm:px-6 md:pt-16 lg:pt-20 lg:px-8 xl:pt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                        <span class="block">SMK NUSANTARA</span>
                        <span class="block text-blue-300">Siap Kerja, Mandiri, Kreatif</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Menjadi sekolah kejuruan terdepan yang menghasilkan lulusan berkompeten, 
                        berkarakter, dan siap bersaing di dunia kerja global.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="{{ route('registration') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-900 bg-white hover:bg-gray-100 md:py-4 md:text-lg md:px-10">
                                Daftar Sekarang
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="{{ route('majors') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-700 hover:bg-blue-800 md:py-4 md:text-lg md:px-10">
                                Lihat Jurusan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" alt="Siswa SMK">
    </div>
</div>

<!-- Jurusan Section -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Jurusan</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Program Keahlian
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                Kami menyediakan berbagai program keahlian yang sesuai dengan kebutuhan industri saat ini.
            </p>
        </div>

        <div class="mt-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($majors as $major)
                <div class="bg-gray-50 rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <i class="{{ $major->icon }}"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $major->name }}</h3>
                    <p class="mt-2 text-base text-gray-500">{{ $major->description }}</p>
                    <div class="mt-4">
                        <a href="{{ route('majors.show', $major->code) }}" class="text-blue-600 hover:text-blue-800">
                            Selengkapnya &rarr;
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Keunggulan Section -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Keunggulan</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Mengapa Memilih SMK Nusantara?
            </p>
        </div>

        <div class="mt-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Link and Match dengan Industri</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Kurikulum yang selaras dengan kebutuhan industri dan bekerjasama dengan perusahaan terkemuka.
                    </p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Fasilitas Lengkap</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Laboratorium dan workshop dilengkapi dengan peralatan modern sesuai dengan standar industri.
                    </p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Guru Berpengalaman</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Tenaga pengajar profesional yang berpengalaman di bidangnya dan memiliki sertifikasi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Berita Terbaru Section -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Berita</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Informasi Terbaru
            </p>
        </div>

        <div class="mt-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestPosts as $post)
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
            <div class="text-center mt-10">
                <a href="{{ route('blog') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </div>
</div>

<!-- CTA Pendaftaran -->
<div class="bg-blue-900">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
            <span class="block">Siap untuk masa depan?</span>
            <span class="block text-blue-300">Daftar sekarang dan jadi bagian dari SMK Nusantara.</span>
        </h2>
        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="{{ route('registration') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-900 bg-white hover:bg-blue-50">
                    Pendaftaran Siswa Baru
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