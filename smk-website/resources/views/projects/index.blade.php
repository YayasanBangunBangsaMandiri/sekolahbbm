@extends('layouts.app')

@section('title', 'Student Projects')

@section('banner')
    <div class="py-16 px-4">
        <div class="container mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Student Projects</h1>
            <p class="text-xl max-w-3xl">Innovative sustainability solutions created by our students</p>
        </div>
    </div>
@endsection

@section('content')
    <!-- Projects List -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="mb-12">
                <h2 class="text-3xl font-bold mb-6 text-green-800">Student Projects</h2>
                <p class="text-gray-700 max-w-4xl">
                    At Green School Bali, our students engage in hands-on projects that address real-world sustainability challenges.
                    These projects demonstrate their creativity, innovation, and commitment to making our world more sustainable.
                </p>
            </div>
            
            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @if(isset($projects) && $projects->count() > 0)
                    @foreach($projects as $project)
                        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all">
                            <img src="{{ asset($project->featured_image ?? 'images/project-placeholder.jpg') }}" 
                                alt="{{ $project->title }}" 
                                class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $project->title }}</h3>
                                <div class="flex items-center mb-3 text-sm text-gray-500">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">{{ $project->category }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $project->created_at->format('M d, Y') }}</span>
                                </div>
                                <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 120) }}</p>
                                <a href="{{ route('projects.show', $project->id) }}" 
                                    class="inline-flex items-center text-green-600 font-medium hover:text-green-800">
                                    View Project
                                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-500">No projects available at the moment. Please check back later.</p>
                    </div>
                @endif
            </div>
            
            <!-- Pagination -->
            @if(isset($projects) && $projects->hasPages())
                <div class="mt-8">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-green-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Want to Learn More About Our Student Projects?</h2>
            <p class="max-w-2xl mx-auto mb-8 text-green-100">
                Visit our campus to see these projects in person and learn how our students are making a difference.
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