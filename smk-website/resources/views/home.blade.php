@extends('layouts.app')

@section('title', 'Where Learning Meets Sustainability')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('images/hero-background.jpg') }}')">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative container mx-auto px-4 h-full flex items-center">
            <div class="max-w-3xl text-white">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Welcome to Green School Bali</h1>
                <p class="text-xl md:text-2xl mb-8">A community of learners making our world sustainable</p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('programs') }}" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-md font-medium transition duration-300">
                        Explore Programs
                    </a>
                    <a href="{{ route('about') }}" class="px-6 py-3 bg-transparent border-2 border-white hover:bg-white hover:text-green-900 text-white rounded-md font-medium transition duration-300">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- About Preview Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Our Philosophy</h2>
                <p class="text-gray-600">
                    Green School is a place where students are empowered to be changemakers for a sustainable world. 
                    We nurture a community of joyful lifelong learners and inspire them to realize their greatest potential.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-lg p-8 text-center">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182-.389-.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182-.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Sustainability</h3>
                    <p class="text-gray-600">We educate for sustainability through an integrated, holistic curriculum.</p>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-8 text-center">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                    </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Education</h3>
                    <p class="text-gray-600">We cultivate inquisitive learning and independent thinking through a natural, holistic approach.</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-8 text-center">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                    </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Community</h3>
                    <p class="text-gray-600">We build a community of learners who model sustainability in all that we do.</p>
                </div>
                                </div>

            <div class="text-center mt-12">
                <a href="{{ route('about') }}" class="inline-flex items-center text-green-600 font-medium hover:text-green-800 transition-colors">
                    Learn more about our approach
                    <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Programs -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Our Programs</h2>
                <p class="text-gray-600">
                    Discover our unique curriculum that integrates sustainability into every aspect of learning.
                                </p>
                            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @if(isset($featuredPrograms) && $featuredPrograms->count() > 0)
                    @foreach($featuredPrograms as $program)
                        <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform hover:scale-105">
                            <img src="{{ asset($program->featured_image ?? 'images/program-placeholder.jpg') }}" alt="{{ $program->name }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $program->name }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($program->description, 100) }}</p>
                                <a href="{{ route('programs.show', $program->slug) }}" class="inline-flex items-center text-green-600 font-medium hover:text-green-800">
                                    Learn more
                                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Placeholders if no programs available -->
                    @for($i = 0; $i < 3; $i++)
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('images/program-placeholder.jpg') }}" alt="Program" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ ['Early Years', 'Primary School', 'Middle/High School'][$i] }}</h3>
                                <p class="text-gray-600 mb-4">Our {{ ['Early Years', 'Primary School', 'Middle/High School'][$i] }} program focuses on holistic development through sustainability-focused education.</p>
                                <a href="{{ route('programs') }}" class="inline-flex items-center text-green-600 font-medium hover:text-green-800">
                                    Learn more
                                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endfor
                @endif
                                </div>

            <div class="text-center mt-12">
                <a href="{{ route('programs') }}" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-md font-medium transition duration-300">
                    View All Programs
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    @if(isset($featuredProjects) && $featuredProjects->count() > 0)
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Student Projects</h2>
                <p class="text-gray-600">
                    Discover how our students are making a difference through innovative sustainability projects.
                                </p>
                            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredProjects as $project)
                    <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset($project->featured_image ?? 'images/project-placeholder.jpg') }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($project->description, 80) }}</p>
                            <a href="{{ route('projects.show', $project->id) }}" class="text-green-600 hover:text-green-800 text-sm font-medium">Read more →</a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('projects') }}" class="inline-flex items-center text-green-600 font-medium hover:text-green-800 transition-colors">
                    View all student projects
                    <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Latest News -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Latest News & Events</h2>
                <p class="text-gray-600">
                    Stay updated with the latest happenings at Green School Bali.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @if(isset($featuredPosts) && $featuredPosts->count() > 0)
                    @foreach($featuredPosts as $post)
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset($post->featured_image ?? 'images/news-placeholder.jpg') }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-2">
                                    <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : now()->format('M d, Y') }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ ucfirst($post->category) }}</span>
                                </div>
                                <h3 class="text-xl font-bold mb-2">{{ $post->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}</p>
                                <a href="{{ route('news.show', $post->slug) }}" class="inline-flex items-center text-green-600 font-medium hover:text-green-800">
                                    Read more
                                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Placeholders if no news available -->
                    @for($i = 0; $i < 3; $i++)
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('images/news-placeholder.jpg') }}" alt="News" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-2">
                                    <span>{{ now()->subDays($i)->format('M d, Y') }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ ['News', 'Event', 'Achievement'][$i] }}</span>
                                </div>
                                <h3 class="text-xl font-bold mb-2">{{ ['Sustainability Week 2023', 'Annual Green Festival', 'Student Innovation Awards'][$i] }}</h3>
                                <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, diam quis aliquam ultricies.</p>
                                <a href="{{ route('news') }}" class="inline-flex items-center text-green-600 font-medium hover:text-green-800">
                                    Read more
                                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endfor
                @endif
                </div>

            <div class="text-center mt-12">
                <a href="{{ route('news') }}" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-md font-medium transition duration-300">
                    View All News & Events
                </a>
                    </div>
                </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-green-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Join Our Green School Community?</h2>
            <p class="max-w-2xl mx-auto mb-8 text-green-100">
                Whether you're interested in enrolling your child, joining our team, or supporting our mission, we'd love to connect with you.
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
