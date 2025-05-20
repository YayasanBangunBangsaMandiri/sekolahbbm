@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<!-- Hero Section -->
<div class="bg-blue-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
            Tentang SMK Nusantara
        </h1>
        <p class="mt-6 max-w-3xl mx-auto text-xl text-blue-200">
            Sekolah kejuruan unggul yang menyiapkan generasi muda untuk tantangan masa depan
        </p>
    </div>
</div>

<!-- Sejarah Section -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Sejarah</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Perjalanan SMK Nusantara
            </p>
        </div>

        <div class="mt-10">
            <div class="prose prose-blue prose-lg text-gray-500 mx-auto">
                <p>
                    SMK Nusantara didirikan pada tahun 2005 oleh sekelompok pendidik dan pengusaha yang memiliki 
                    visi untuk menciptakan lembaga pendidikan kejuruan yang mampu menghasilkan lulusan siap kerja 
                    dan berdaya saing tinggi.
                </p>
                <p>
                    Pada awal berdirinya, SMK Nusantara hanya memiliki dua jurusan, yaitu Teknik Komputer dan Jaringan (TKJ) 
                    dan Akuntansi. Seiring dengan perkembangan teknologi dan kebutuhan industri, SMK Nusantara terus 
                    berkembang dan menambah program keahlian baru.
                </p>
                <p>
                    Saat ini, SMK Nusantara telah menjadi salah satu sekolah kejuruan terkemuka dengan lima program keahlian 
                    yang relevan dengan kebutuhan dunia kerja. Kami telah menghasilkan ribuan lulusan yang berhasil 
                    mengembangkan karir mereka di berbagai bidang, baik di dalam negeri maupun luar negeri.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Visi Misi Section -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Visi & Misi</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Arah dan Tujuan Kami
            </p>
        </div>

        <div class="mt-10">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6 bg-blue-900 text-white">
                    <h3 class="text-lg leading-6 font-medium">
                        Visi
                    </h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <p class="text-lg text-gray-700">
                        "Menjadi lembaga pendidikan kejuruan unggul yang menghasilkan lulusan kompeten, berkarakter, 
                        dan mampu bersaing di tingkat nasional dan internasional."
                    </p>
                </div>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6 bg-blue-900 text-white">
                    <h3 class="text-lg leading-6 font-medium">
                        Misi
                    </h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <ul class="space-y-4 text-gray-700">
                        <li class="flex">
                            <svg class="h-6 w-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Menyelenggarakan pendidikan kejuruan yang berkualitas dengan mengintegrasikan nilai-nilai karakter.</span>
                        </li>
                        <li class="flex">
                            <svg class="h-6 w-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Mengembangkan kurikulum yang selaras dengan kebutuhan dunia usaha dan industri.</span>
                        </li>
                        <li class="flex">
                            <svg class="h-6 w-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Meningkatkan kompetensi pendidik dan tenaga kependidikan sesuai perkembangan ilmu pengetahuan dan teknologi.</span>
                        </li>
                        <li class="flex">
                            <svg class="h-6 w-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Membangun kemitraan yang kuat dengan dunia usaha dan industri untuk mendukung pembelajaran dan penyaluran lulusan.</span>
                        </li>
                        <li class="flex">
                            <svg class="h-6 w-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Menciptakan lingkungan pembelajaran yang kondusif untuk mengembangkan potensi siswa secara optimal.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Manajemen Section -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Manajemen</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Tim Pimpinan Sekolah
            </p>
        </div>

        <div class="mt-10">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3">
                @foreach($managementStaff as $staff)
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <img class="h-48 w-48 rounded-full mx-auto object-cover" src="{{ asset('storage/' . $staff->photo_url) }}" alt="{{ $staff->name }}">
                        <div class="mt-4 text-center">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $staff->name }}</h3>
                            <p class="text-sm text-blue-600">{{ $staff->position }}</p>
                            <p class="mt-2 text-sm text-gray-500">{{ $staff->bio }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Fasilitas Section -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Fasilitas</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Sarana dan Prasarana
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                SMK Nusantara dilengkapi dengan berbagai fasilitas modern untuk mendukung proses pembelajaran
            </p>
        </div>

        <div class="mt-10">
            <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                <div class="relative">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-16">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Laboratorium Komputer</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Dilengkapi dengan komputer terbaru dan berbagai software yang dibutuhkan oleh dunia industri.
                        </p>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div class="ml-16">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Perpustakaan Digital</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Koleksi buku fisik dan digital untuk mendukung pembelajaran dan penelitian.
                        </p>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                        </svg>
                    </div>
                    <div class="ml-16">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Workshop Praktik</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Workshop yang dilengkapi dengan peralatan industri untuk praktik siswa sesuai jurusan masing-masing.
                        </p>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <div class="ml-16">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Jaringan Internet</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Koneksi internet berkecepatan tinggi di seluruh area sekolah untuk mendukung pembelajaran digital.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-blue-900">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
            <span class="block">Tertarik bergabung dengan SMK Nusantara?</span>
            <span class="block text-blue-300">Daftar sekarang dan mulai perjalanan karirmu.</span>
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