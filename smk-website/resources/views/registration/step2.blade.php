@extends('layouts.app')

@section('title', 'Registration - Contact Information')

@section('content')
<!-- Hero Section -->
<div class="bg-blue-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
            Student Registration
        </h1>
        <p class="mt-6 max-w-3xl mx-auto text-xl text-blue-200">
            Join Green School Bali and begin your sustainable education journey
        </p>
    </div>
</div>

<!-- Registration Form -->
<div class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
            <!-- Progress Steps -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-bold">✓</div>
                        <div class="text-sm mt-1 font-medium text-green-500">Personal Info</div>
                    </div>
                    <div class="flex-1 h-1 bg-green-500 mx-2"></div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">2</div>
                        <div class="text-sm mt-1 font-medium text-green-500">Contact Info</div>
                    </div>
                    <div class="flex-1 h-1 bg-gray-200 mx-2">
                        <div class="h-1 bg-green-500" style="width: 0%"></div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">3</div>
                        <div class="text-sm mt-1 font-medium text-gray-500">Academic Info</div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('registration.post.step2') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <h2 class="text-lg font-medium text-gray-900 border-b border-gray-200 pb-2 mb-4">Contact Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700">Complete Address <span class="text-red-500">*</span></label>
                            <textarea name="address" id="address" rows="3" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>{{ old('address', $registration['address'] ?? '') }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email', $registration['email'] ?? '') }}" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number <span class="text-red-500">*</span></label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $registration['phone'] ?? '') }}" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="parent_name" class="block text-sm font-medium text-gray-700">Parent/Guardian Name <span class="text-red-500">*</span></label>
                            <input type="text" name="parent_name" id="parent_name" value="{{ old('parent_name', $registration['parent_name'] ?? '') }}" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('parent_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="parent_phone" class="block text-sm font-medium text-gray-700">Parent/Guardian Phone Number <span class="text-red-500">*</span></label>
                            <input type="text" name="parent_phone" id="parent_phone" value="{{ old('parent_phone', $registration['parent_phone'] ?? '') }}" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('parent_phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-between">
                    <a href="{{ route('registration.step1') }}" class="inline-flex items-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 4.293a1 1 0 010 1.414L6.414 9H16a1 1 0 110 2H6.414l3.293 3.293a1 1 0 11-1.414 1.414l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Previous Step
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Next Step
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 