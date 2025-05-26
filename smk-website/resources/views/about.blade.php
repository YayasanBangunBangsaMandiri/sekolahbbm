@extends('layouts.app')

@section('title', 'About Us')

@section('banner')
    <div class="py-16 px-4">
        <div class="container mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">About Green School Bali</h1>
            <p class="text-xl max-w-3xl">A community of learners making our world sustainable</p>
        </div>
    </div>
@endsection

@section('content')
    <!-- Vision and Mission -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6 text-green-800">Our Vision & Mission</h2>
                    <div class="space-y-4">
                        <div class="bg-green-50 p-6 rounded-lg border-l-4 border-green-600">
                            <h3 class="font-bold text-xl mb-2 text-green-800">Vision</h3>
                            <p class="text-gray-700">A community of learners making our world sustainable.</p>
                        </div>
                        <div class="bg-green-50 p-6 rounded-lg border-l-4 border-green-600">
                            <h3 class="font-bold text-xl mb-2 text-green-800">Mission</h3>
                            <p class="text-gray-700">We educate for sustainability through community-integrated, entrepreneurial learning, in a wall-less, natural environment. Our holistic curriculum empowers and inspires our students to be changemakers.</p>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('images/about/vision-mission.jpg') }}" alt="Green School Campus" class="rounded-lg shadow-lg w-full h-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- Our History -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-12 text-center text-green-800">Our History</h2>
            
            <div class="max-w-4xl mx-auto space-y-16">
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="md:w-1/3">
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <img src="{{ asset('images/about/history-2008.jpg') }}" alt="Green School Founding in 2008" class="rounded w-full h-auto">
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <h3 class="text-2xl font-bold text-green-700 mb-3">2008: The Beginning</h3>
                        <p class="text-gray-700">Green School was founded in 2008 by John and Cynthia Hardy with a vision to create a natural, holistic learning environment where children could develop as green leaders. The first campus opened with 90 students and a mission to educate for sustainability through community-integrated, entrepreneurial learning.</p>
                    </div>
                </div>
                
                <div class="flex flex-col md:flex-row-reverse gap-8 items-center">
                    <div class="md:w-1/3">
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <img src="{{ asset('images/about/history-2012.jpg') }}" alt="Green School Recognition in 2012" class="rounded w-full h-auto">
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <h3 class="text-2xl font-bold text-green-700 mb-3">2012: Global Recognition</h3>
                        <p class="text-gray-700">By 2012, Green School had gained international recognition for its innovative approach to education. The school's remarkable bamboo structures and sustainability-focused curriculum attracted attention from educators worldwide, including a TED Talk by John Hardy that has been viewed millions of times.</p>
                    </div>
                </div>
                
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="md:w-1/3">
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <img src="{{ asset('images/about/history-present.jpg') }}" alt="Green School Today" class="rounded w-full h-auto">
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <h3 class="text-2xl font-bold text-green-700 mb-3">Today: Global Impact</h3>
                        <p class="text-gray-700">Today, Green School Bali serves as the flagship campus of a growing network of schools around the world. With additional locations in New Zealand, South Africa, and more on the way, the Green School movement continues to expand its mission of educating changemakers who will help build a sustainable world.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sustainability Values -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-6 text-center text-green-800">Our Sustainability Values</h2>
            <p class="text-center text-gray-700 mb-12 max-w-3xl mx-auto">At the core of Green School are values that promote environmental stewardship, community connection, and holistic learning that prepares students to be leaders in building a sustainable world.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-lg p-8 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-green-800">Integrity</h3>
                    <p class="text-gray-600">We are honest, ethical and strive to always do the right thing, even when it's difficult. We stay true to our mission and values in all that we do.</p>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-8 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-green-800">Community</h3>
                    <p class="text-gray-600">We believe in the power of community to create change. We foster connections with each other, the local Balinese community, and the natural world around us.</p>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-8 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-green-800">Responsibility</h3>
                    <p class="text-gray-600">We take responsibility for our actions and their impact on the environment. We teach students to be mindful of their ecological footprint.</p>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-8 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-green-800">Innovation</h3>
                    <p class="text-gray-600">We embrace creativity and new ideas. We believe in finding solutions to challenging problems through innovation and entrepreneurial thinking.</p>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-8 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.758a1 1 0 01-.293.707l-4 4C.817 14.769 2.156 18 4.828 18h10.343c2.673 0 4.012-3.231 2.122-5.121l-4-4A1 1 0 0113 8.172V4.414l.707-.707A1 1 0 0013 2H7zm2 6.172V4h2v4.172a3 3 0 00.879 2.12l1.027 1.028a4 4 0 00-2.171.102l-.47.156a4 4 0 01-2.53 0l-.563-.187a1.993 1.993 0 00-.114-.035l1.063-1.063A3 3 0 009 8.172z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-green-800">Natural Connection</h3>
                    <p class="text-gray-600">We value and nurture our connection to the natural world. Our wall-less campus integrates nature into every aspect of learning.</p>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-8 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-green-800">Lifelong Learning</h3>
                    <p class="text-gray-600">We foster a love of learning that extends beyond the classroom. We encourage students to be curious, ask questions, and pursue knowledge throughout their lives.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Team -->
    @if(isset($leadership) && $leadership->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-12 text-center text-green-800">Tim Pimpinan</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($leadership as $leader)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="aspect-w-4 aspect-h-3">
                        @if($leader->photo_url)
                            <img src="{{ Storage::url('staff-photos/' . $leader->photo_url) }}" 
                                 alt="{{ $leader->name }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-900">{{ $leader->name }}</h3>
                        <p class="text-green-700 mb-4 font-medium">{{ $leader->position }}</p>
                        <div class="text-gray-600 mb-4 text-sm line-clamp-3">
                            {{ $leader->bio }}
                        </div>
                        <a href="{{ route('staff.show', $leader->id) }}" 
                           class="text-green-600 hover:text-green-800 font-medium inline-flex items-center">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Teachers -->
    @if(isset($teachers) && $teachers->count() > 0)
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-12 text-center text-green-800">Tim Pengajar</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($teachers as $teacher)
                <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="aspect-w-1 aspect-h-1">
                        @if($teacher->photo_url)
                            <img src="{{ Storage::url($teacher->photo_url) }}" 
                                 alt="{{ $teacher->name }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2 text-gray-900">{{ $teacher->name }}</h3>
                        <p class="text-green-700 mb-3 font-medium">{{ $teacher->position }}</p>
                        <div class="text-gray-600 mb-4 text-sm line-clamp-3">
                            {{ $teacher->bio }}
                        </div>
                        <a href="{{ route('staff.show', $teacher->id) }}" 
                           class="text-green-600 hover:text-green-800 font-medium inline-flex items-center">
                            <span>Detail</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Staff -->
    @if(isset($staff) && $staff->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-12 text-center text-green-800">Tim Staff</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($staff as $member)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="aspect-w-1 aspect-h-1">
                        @if($member->photo_url)
                            <img src="{{ Storage::url($member->photo_url) }}" 
                                 alt="{{ $member->name }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2 text-gray-900">{{ $member->name }}</h3>
                        <p class="text-green-700 mb-3 font-medium">{{ $member->position }}</p>
                        <div class="text-gray-600 mb-4 text-sm line-clamp-3">
                            {{ $member->bio }}
                        </div>
                        <a href="{{ route('staff.show', $member->id) }}" 
                           class="text-green-600 hover:text-green-800 font-medium inline-flex items-center">
                            <span>Detail</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Call to Action -->
    <section class="py-20 bg-green-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Join Our Green School Community</h2>
            <p class="max-w-2xl mx-auto mb-8 text-green-100">
                Experience the transformative power of our sustainable education model. Schedule a visit to our beautiful bamboo campus in Bali.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="px-8 py-3 bg-white text-green-800 hover:bg-green-100 rounded-md font-medium transition duration-300">
                    Contact Us
                </a>
                <a href="#" class="px-8 py-3 bg-transparent border-2 border-white hover:bg-white hover:text-green-800 rounded-md font-medium transition duration-300">
                    Book a Tour
                </a>
            </div>
        </div>
    </section>
@endsection 