@extends('layouts.app')

@section('title', $staff->name)

@section('content')
<div class="bg-white">
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-5xl mx-auto">
            <!-- Back Button -->
            <a href="{{ url()->previous() }}" class="inline-flex items-center text-gray-600 mb-8 hover:text-gray-900">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Left Column - Photo -->
                <div class="md:col-span-1">
                    <div class="aspect-w-3 aspect-h-4 rounded-lg overflow-hidden shadow-lg">
                        @if($staff->photo_url)
                            <img src="{{ Storage::url($staff->photo_url) }}" 
                                alt="{{ $staff->name }}" 
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right Column - Information -->
                <div class="md:col-span-2">
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $staff->name }}</h1>
                    <p class="text-2xl text-green-600 mb-8 font-medium">{{ $staff->position }}</p>

                    <!-- Contact Information -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Informasi Kontak</h2>
                        <div class="space-y-3">
                            @if($staff->email)
                            <p class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="break-all">{{ $staff->email }}</span>
                            </p>
                            @endif
                            @if($staff->phone)
                            <p class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <span>{{ $staff->phone }}</span>
                            </p>
                            @endif
                        </div>
                    </div>

                    <!-- Biography -->
                    @if($staff->bio)
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Biografi</h2>
                        <div class="prose max-w-none text-gray-600 whitespace-pre-line">
                            {{ $staff->bio }}
                        </div>
                    </div>
                    @endif

                    <!-- Additional Information -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Informasi Tambahan</h2>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <p class="text-gray-500">Departemen</p>
                                <p class="font-medium text-gray-900">
                                    @switch($staff->type)
                                        @case('leadership')
                                            Pimpinan
                                            @break
                                        @case('teacher')
                                            Guru
                                            @break
                                        @case('staff')
                                            Staff
                                            @break
                                        @default
                                            {{ $staff->type }}
                                    @endswitch
                                </p>
                            </div>
                            @if($staff->experience)
                            <div>
                                <p class="text-gray-500">Pengalaman</p>
                                <p class="font-medium text-gray-900">{{ $staff->experience }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 