@extends('layouts.app')

@section('title', 'Applicant Login')

@section('content')
<!-- Hero Section -->
<div class="bg-blue-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
            Track Your Application
        </h1>
        <p class="mt-6 max-w-3xl mx-auto text-xl text-blue-200">
            Log in to check the status of your application to Green School Bali
        </p>
    </div>
</div>

<!-- Login Form -->
<div class="py-12 bg-white">
    <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('applicant.authenticate') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
                    <div class="mt-1">
                        <input id="nisn" name="nisn" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('nisn') }}">
                    </div>
                    @error('nisn')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Check Application Status
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Don't have an application yet?
                    <a href="{{ route('registration') }}" class="font-medium text-green-600 hover:text-green-500">
                        Apply now
                    </a>
                </p>
            </div>
        </div>

        <div class="mt-8 bg-gray-50 p-6 rounded-lg">
            <h3 class="text-md font-medium text-gray-900 mb-4">Need Help?</h3>
            <p class="text-sm text-gray-600 mb-3">
                If you're having trouble logging in to check your application status:
            </p>
            <ul class="list-disc pl-5 text-sm text-gray-600 space-y-2">
                <li>Ensure you're using the same NISN and email from your application.</li>
                <li>Check your email for any confirmation messages we may have sent.</li>
                <li>Contact our admissions office at admissions@greenschoolbali.com for assistance.</li>
            </ul>
        </div>
    </div>
</div>
@endsection 