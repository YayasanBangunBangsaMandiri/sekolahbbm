<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Green School Bali') }} | @yield('title', 'Where Learning Meets Sustainability')</title>
        
        <!-- Meta Tags -->
        <meta name="description" content="@yield('meta_description', 'Green School Bali is an innovative learning environment with a sustainability-focused curriculum for pre-k through high school students.')">
        <meta name="keywords" content="@yield('meta_keywords', 'green school, sustainability education, bali, bamboo campus, environmental education')">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        
        <!-- Scripts -->
        @vite(['resources/scss/main.scss', 'resources/js/app.js'])
        
        <!-- AlpineJS -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js"></script>
        
        <!-- Additional Styles -->
        @stack('styles')
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-800">
        <div class="min-h-screen flex flex-col">
            <!-- Top Navigation -->
            @include('layouts.navigation')
            
            <!-- Page Banner -->
            @hasSection('banner')
                <div class="bg-green-700 text-white">
                    @yield('banner')
                </div>
            @endif
            
            <!-- Page Content -->
            <main class="flex-grow">
                @yield('content')
            </main>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
        
        <!-- Additional Scripts -->
        @stack('scripts')
    </body>
</html>
