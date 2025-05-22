@extends('layouts.app')

@section('title', 'Application Status')

@section('content')
<!-- Hero Section -->
<div class="bg-green-900 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl md:text-5xl">
            Your Application Status
        </h1>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        <!-- Application Status Card -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
            <div class="bg-green-800 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-medium text-white">Application Status</h2>
                    <div>
                        @if($registration->status == 'pending')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Under Review
                            </span>
                        @elseif($registration->status == 'accepted')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Accepted
                            </span>
                        @elseif($registration->status == 'rejected')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Not Accepted
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="p-6 border-b">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider">Registration ID</h3>
                        <p class="mt-1 text-sm text-gray-900">REG-{{ str_pad($registration->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <div>
                        <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider">Application Date</h3>
                        <p class="mt-1 text-sm text-gray-900">{{ $registration->created_at->format('d F Y') }}</p>
                    </div>
                    <div>
                        <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider">Selected Major</h3>
                        <p class="mt-1 text-sm text-gray-900">{{ $registration->major->name }}</p>
                    </div>
                </div>
            </div>
            
            <div class="p-6">
                @if($registration->status == 'pending')
                    <div class="bg-yellow-50 p-4 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zm-1 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-yellow-800">Application Under Review</h3>
                                <div class="mt-2 text-sm text-yellow-700">
                                    <p>
                                        Your application is currently being reviewed by our admissions team. This process typically takes 5-7 working days. You will be notified via email once a decision has been made.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($registration->status == 'accepted')
                    <div class="bg-green-50 p-4 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-green-800">Application Accepted</h3>
                                <div class="mt-2 text-sm text-green-700">
                                    <p>
                                        Congratulations! Your application to Green School Bali has been accepted. Please check your email for further instructions on the next steps, including enrollment details and payment information.
                                    </p>
                                </div>
                                <div class="mt-4">
                                    <a href="#" class="text-sm font-medium text-green-600 hover:text-green-500">
                                        Download Acceptance Letter <span aria-hidden="true">&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($registration->status == 'rejected')
                    <div class="bg-red-50 p-4 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Application Not Accepted</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <p>
                                        We regret to inform you that your application was not accepted at this time. Please check your email for more information. If you have any questions, feel free to contact our admissions office.
                                    </p>
                                </div>
                                <div class="mt-4">
                                    <a href="mailto:admissions@greenschoolbali.com" class="text-sm font-medium text-red-600 hover:text-red-500">
                                        Contact Admissions <span aria-hidden="true">&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Application Timeline -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
            <div class="px-6 py-5 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Application Timeline</h3>
            </div>
            <div class="p-6">
                <div class="flow-root">
                    <ul class="-mb-8">
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Application <span class="font-medium text-gray-900">submitted</span></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            {{ $registration->created_at->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="relative pb-8">
                                @if($registration->status == 'pending')
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                @endif
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full {{ $registration->status == 'pending' ? 'bg-yellow-500' : ($registration->status == 'accepted' || $registration->status == 'rejected' ? 'bg-green-500' : 'bg-gray-200') }} flex items-center justify-center ring-8 ring-white">
                                            @if($registration->status == 'pending' || $registration->status == 'accepted' || $registration->status == 'rejected')
                                                <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zm-1 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Application <span class="font-medium text-gray-900">under review</span></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            {{ $registration->created_at->addDays(1)->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="relative">
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full {{ $registration->status == 'accepted' || $registration->status == 'rejected' ? 'bg-green-500' : 'bg-gray-200' }} flex items-center justify-center ring-8 ring-white">
                                            @if($registration->status == 'accepted')
                                                <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                            @elseif($registration->status == 'rejected')
                                                <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Final <span class="font-medium text-gray-900">decision</span></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            @if($registration->status == 'accepted' || $registration->status == 'rejected')
                                                {{ $registration->updated_at->format('M d, Y') }}
                                            @else
                                                Pending
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Profile Information -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
            <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900">Personal Information</h3>
                <a href="{{ route('applicant.logout') }}" class="inline-flex items-center text-sm text-red-600 hover:text-red-500">
                    Sign Out
                    <svg class="ml-1 h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Full Name</h4>
                        <p class="mt-1 text-sm text-gray-900">{{ $registration->student_name }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">NISN</h4>
                        <p class="mt-1 text-sm text-gray-900">{{ $registration->nisn }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Email</h4>
                        <p class="mt-1 text-sm text-gray-900">{{ $registration->email }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Phone</h4>
                        <p class="mt-1 text-sm text-gray-900">{{ $registration->phone }}</p>
                    </div>
                </div>
                
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <form action="{{ route('applicant.update-profile') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <textarea id="address" name="address" rows="3" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $registration->address }}</textarea>
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="text" name="phone" id="phone" value="{{ $registration->phone }}" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            
                            <div>
                                <label for="parent_phone" class="block text-sm font-medium text-gray-700">Parent/Guardian Phone</label>
                                <input type="text" name="parent_phone" id="parent_phone" value="{{ $registration->parent_phone }}" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        
                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Update Information
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 