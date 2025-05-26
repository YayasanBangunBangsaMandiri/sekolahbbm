@extends('layouts.app')

@section('title', 'Registration Completed')

@section('content')
<!-- Hero Section -->
<div class="bg-green-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
            Registration Completed
        </h1>
        <p class="mt-6 max-w-3xl mx-auto text-xl text-green-200">
            Thank you for registering with Green School Bali
        </p>
    </div>
</div>

<!-- Confirmation Content -->
<div class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
            <!-- Success Message -->
            <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-8">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">
                            Your registration has been successfully submitted! We will review your application and notify you via email.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Registration Summary -->
            <div class="mb-6">
                <h2 class="text-lg font-medium text-gray-900 border-b border-gray-200 pb-2 mb-4">Registration Summary</h2>
                
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Registration ID</dt>
                        <dd class="mt-1 text-sm text-gray-900">REG-{{ str_pad(rand(1, 9999), 5, '0', STR_PAD_LEFT) }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Registration Date</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ now()->format('d F Y') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                Pending Review
                            </span>
                        </dd>
                    </div>
                </dl>
            </div>

            <!-- Personal Information -->
            <div class="mb-6">
                <h3 class="text-md font-medium text-gray-900 border-b border-gray-200 pb-2 mb-2">Personal Information</h3>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $registration['student_name'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">NISN</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $registration['nisn'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Date of Birth</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $registration['birthdate'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Place of Birth</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $registration['place_of_birth'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Gender</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $registration['gender'] == 'male' ? 'Male' : 'Female' }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Contact Information -->
            <div class="mb-6">
                <h3 class="text-md font-medium text-gray-900 border-b border-gray-200 pb-2 mb-2">Contact Information</h3>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3">
                    <div class="col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Address</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $registration['address'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $registration['email'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Phone</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $registration['phone'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Parent/Guardian</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $registration['parent_name'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Parent/Guardian Phone</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $registration['parent_phone'] }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Academic Information -->
            <div class="mb-6">
                <h3 class="text-md font-medium text-gray-900 border-b border-gray-200 pb-2 mb-2">Academic Information</h3>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Previous School</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $registration['previous_school'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Selected Major</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $major->name }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Next Steps -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Next Steps</h3>
                <ol class="list-decimal list-inside space-y-3 text-gray-600">
                    <li>Our admissions team will review your application within 5-7 working days.</li>
                    <li>You will receive an email with a confirmation of your application status.</li>
                    <li>If accepted, you'll receive information about the next steps in the enrollment process.</li>
                    <li>For any questions, please contact our admissions office at admissions@greenschoolbali.com.</li>
                </ol>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Return to Homepage
                </a>
                <a href="{{ route('applicant.login') }}" class="ml-4 inline-flex justify-center py-2 px-4 border border-green-500 shadow-sm text-sm font-medium rounded-md text-green-600 bg-white hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Track Your Application
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 