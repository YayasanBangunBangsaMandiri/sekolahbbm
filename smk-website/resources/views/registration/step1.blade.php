@extends('layouts.app')

@section('title', 'Registration - Personal Information')

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
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">1</div>
                        <div class="text-sm mt-1 font-medium text-green-500">Personal Info</div>
                    </div>
                    <div class="flex-1 h-1 bg-gray-200 mx-2">
                        <div class="h-1 bg-green-500" style="width: 0%"></div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">2</div>
                        <div class="text-sm mt-1 font-medium text-gray-500">Contact Info</div>
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
            <form action="{{ route('registration.post.step1') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <h2 class="text-lg font-medium text-gray-900 border-b border-gray-200 pb-2 mb-4">Personal Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="student_name" class="block text-sm font-medium text-gray-700">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="student_name" id="student_name" value="{{ old('student_name', $registration['student_name'] ?? '') }}" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('student_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="nisn" class="block text-sm font-medium text-gray-700">NISN <span class="text-red-500">*</span></label>
                            <input type="text" name="nisn" id="nisn" value="{{ old('nisn', $registration['nisn'] ?? '') }}" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('nisn')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="place_of_birth" class="block text-sm font-medium text-gray-700">Place of Birth <span class="text-red-500">*</span></label>
                            <input type="text" name="place_of_birth" id="place_of_birth" value="{{ old('place_of_birth', $registration['place_of_birth'] ?? '') }}" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('place_of_birth')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="birthdate" class="block text-sm font-medium text-gray-700">Date of Birth <span class="text-red-500">*</span></label>
                            <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', $registration['birthdate'] ?? '') }}" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('birthdate')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender <span class="text-red-500">*</span></label>
                            <select name="gender" id="gender" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender', $registration['gender'] ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $registration['gender'] ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end">
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