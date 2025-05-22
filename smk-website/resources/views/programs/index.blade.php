@extends('layouts.app')

@section('title', 'Educational Programs')

@section('banner')
    <div class="py-16 px-4">
        <div class="container mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Educational Programs</h1>
            <p class="text-xl max-w-3xl">Sustainability-focused education for a brighter future</p>
        </div>
    </div>
@endsection

@section('content')
    <!-- Programs List -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="mb-12">
                <h2 class="text-3xl font-bold mb-6 text-green-800">Our Programs</h2>
                <p class="text-gray-700 max-w-4xl">
                    At Green School Bali, we offer a variety of educational programs designed to foster sustainability, 
                    creativity, and critical thinking. Our curriculum integrates environmental education into every aspect 
                    of learning, preparing students to be future changemakers.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                @if(isset($programs) && $programs->count() > 0)
                    @foreach($programs as $program)
                        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                            <img src="{{ asset($program->featured_image ?? 'images/program-placeholder.jpg') }}" 
                                alt="{{ $program->name }}" 
                                class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $program->name }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($program->description, 120) }}</p>
                                <a href="{{ route('programs.show', $program->slug) }}" 
                                    class="inline-flex items-center text-green-600 font-medium hover:text-green-800">
                                    Learn more
                                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-500">No programs available at the moment. Please check back later.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-green-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Interested in Our Programs?</h2>
            <p class="max-w-2xl mx-auto mb-8 text-green-100">
                Contact us to learn more about enrollment, curriculum, or to schedule a visit to our beautiful campus.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="px-8 py-3 bg-white text-green-800 hover:bg-green-100 rounded-md font-medium transition duration-300">
                    Contact Us
                </a>
                <a href="{{ route('registration') }}" class="px-8 py-3 bg-transparent border-2 border-white hover:bg-white hover:text-green-800 rounded-md font-medium transition duration-300">
                    Apply Now
                </a>
            </div>
        </div>
    </section>
@endsection 