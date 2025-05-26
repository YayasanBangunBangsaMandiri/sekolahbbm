@extends('layouts.app')

@section('title', 'Staff & Guru')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">Staff & Guru</h1>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                Kenali para pendidik dan staff yang mendedikasikan diri untuk pendidikan berkualitas
            </p>
        </div>

        <!-- Leadership Section -->
        @if($leadership->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Pimpinan Sekolah</h2>
            <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($leadership as $leader)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="aspect-w-3 aspect-h-4">
                        @if($leader->photo_url)
                            <img class="w-full h-full object-cover" src="{{ Storage::url($leader->photo_url) }}" alt="{{ $leader->name }}">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <svg class="h-20 w-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900">{{ $leader->name }}</h3>
                        <p class="mt-1 text-gray-600">{{ $leader->position }}</p>
                        @if($leader->bio)
                            <p class="mt-3 text-gray-600">{{ $leader->bio }}</p>
                        @endif
                        @if($leader->email || $leader->phone)
                            <div class="mt-4 space-y-2">
                                @if($leader->email)
                                    <p class="flex items-center text-gray-600">
                                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        {{ $leader->email }}
                                    </p>
                                @endif
                                @if($leader->phone)
                                    <p class="flex items-center text-gray-600">
                                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        {{ $leader->phone }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Teachers Section -->
        @if($teachers->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Guru</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($teachers as $teacher)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="aspect-w-3 aspect-h-4">
                        @if($teacher->photo_url)
                            <img class="w-full h-full object-cover" src="{{ Storage::url($teacher->photo_url) }}" alt="{{ $teacher->name }}">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $teacher->name }}</h3>
                        <p class="mt-1 text-sm text-gray-600">{{ $teacher->position }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Staff Section -->
        @if($staff->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Staff</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($staff as $member)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="aspect-w-3 aspect-h-4">
                        @if($member->photo_url)
                            <img class="w-full h-full object-cover" src="{{ Storage::url($member->photo_url) }}" alt="{{ $member->name }}">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $member->name }}</h3>
                        <p class="mt-1 text-sm text-gray-600">{{ $member->position }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection 