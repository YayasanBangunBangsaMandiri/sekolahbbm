@extends('layouts.app')

@section('title', 'Registration - Academic Information')

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
                        <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-bold">✓</div>
                        <div class="text-sm mt-1 font-medium text-green-500">Contact Info</div>
                    </div>
                    <div class="flex-1 h-1 bg-green-500 mx-2"></div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">3</div>
                        <div class="text-sm mt-1 font-medium text-green-500">Academic Info</div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('registration.post.step3') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <h2 class="text-lg font-medium text-gray-900 border-b border-gray-200 pb-2 mb-4">Academic Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="previous_school" class="block text-sm font-medium text-gray-700">Previous School (SMP/MTs) <span class="text-red-500">*</span></label>
                            <input type="text" name="previous_school" id="previous_school" value="{{ old('previous_school', $registration['previous_school'] ?? '') }}" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('previous_school')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="major_id" class="block text-sm font-medium text-gray-700">Choose Major <span class="text-red-500">*</span></label>
                            <select name="major_id" id="major_id" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                <option value="">Select Major</option>
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}" {{ old('major_id', $registration['major_id'] ?? '') == $major->id ? 'selected' : '' }}>{{ $major->name }}</option>
                                @endforeach
                            </select>
                            @error('major_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Persetujuan -->
                <div class="mt-6">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="agreement" name="agreement" type="checkbox" class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 rounded" required {{ old('agreement') ? 'checked' : '' }}>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="agreement" class="font-medium text-gray-700">I declare that the information I have provided is true <span class="text-red-500">*</span></label>
                            <p class="text-gray-500">By checking this box, I agree to provide my personal data for registration purposes.</p>
                        </div>
                    </div>
                    @error('agreement')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zm-1 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">
                                After completing this step, your registration will be sent for review. You will receive updates via email.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-between">
                    <a href="{{ route('registration.step2') }}" class="inline-flex items-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 4.293a1 1 0 010 1.414L6.414 9H16a1 1 0 110 2H6.414l3.293 3.293a1 1 0 11-1.414 1.414l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Previous Step
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Complete Registration
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 