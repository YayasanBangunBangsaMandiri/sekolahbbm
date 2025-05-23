<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SMK') }} Admin - @yield('title', 'Dashboard')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/scss/main.scss', 'resources/js/app.js'])
    
    <!-- Tambahan CSS -->
    @stack('styles')
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-100">
            <!-- Sidebar -->
            <div :class="{'block': sidebarOpen, 'hidden': !sidebarOpen}" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
            
            <div :class="{'translate-x-0 ease-out': sidebarOpen, '-translate-x-full ease-in': !sidebarOpen}" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-blue-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-8">
                    <div class="flex items-center">
                        <span class="text-white text-2xl mx-2 font-semibold">SMK Admin</span>
                    </div>
                </div>

                <nav class="mt-10" x-data="{ dashboardOpen: false, contentOpen: false, usersOpen: false }">
                    <a class="flex items-center mt-4 py-2 px-6 text-gray-100 hover:bg-blue-800 hover:bg-opacity-50 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-blue-800 bg-opacity-50' : '' }}" href="{{ route('admin.dashboard') }}">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        <span class="mx-3">Dashboard</span>
                    </a>

                    <!-- Content Management -->
                    <div class="mt-4">
                        <button @click="contentOpen = !contentOpen" class="flex w-full items-center py-2 px-6 text-gray-100 hover:bg-blue-800 hover:bg-opacity-50 rounded {{ request()->routeIs('admin.posts.*') || request()->routeIs('admin.gallery.*') || request()->routeIs('admin.majors.*') || request()->routeIs('admin.staff.*') ? 'bg-blue-800 bg-opacity-50' : '' }}">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span class="mx-3">Konten</span>
                            <span class="ml-auto">
                                <svg class="h-4 w-4 transition-transform" :class="{'rotate-180': contentOpen}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>
                        <div x-show="contentOpen" x-transition class="pl-10">
                            <a class="flex items-center py-2 px-6 text-gray-100 hover:bg-blue-800 hover:bg-opacity-50 rounded {{ request()->routeIs('admin.posts.*') ? 'bg-blue-800 bg-opacity-50' : '' }}" href="{{ route('admin.posts.index') }}">
                                <span class="mx-3">Berita & Blog</span>
                            </a>
                            <a class="flex items-center py-2 px-6 text-gray-100 hover:bg-blue-800 hover:bg-opacity-50 rounded {{ request()->routeIs('admin.gallery.*') ? 'bg-blue-800 bg-opacity-50' : '' }}" href="{{ route('admin.gallery.index') }}">
                                <span class="mx-3">Galeri</span>
                            </a>
                            <a class="flex items-center py-2 px-6 text-gray-100 hover:bg-blue-800 hover:bg-opacity-50 rounded {{ request()->routeIs('admin.majors.*') ? 'bg-blue-800 bg-opacity-50' : '' }}" href="{{ route('admin.majors.index') }}">
                                <span class="mx-3">Jurusan</span>
                            </a>
                            <a class="flex items-center py-2 px-6 text-gray-100 hover:bg-blue-800 hover:bg-opacity-50 rounded {{ request()->routeIs('admin.staff.*') ? 'bg-blue-800 bg-opacity-50' : '' }}" href="{{ route('admin.staff.index') }}">
                                <span class="mx-3">Staff & Guru</span>
                            </a>
                        </div>
                    </div>

                    <!-- Registrations -->
                    <a class="flex items-center mt-4 py-2 px-6 text-gray-100 hover:bg-blue-800 hover:bg-opacity-50 rounded {{ request()->routeIs('admin.registrations.*') ? 'bg-blue-800 bg-opacity-50' : '' }}" href="{{ route('admin.registrations.index') }}">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span class="mx-3">Pendaftaran</span>
                    </a>

                    <!-- User Management -->
                    <a class="flex items-center mt-4 py-2 px-6 text-gray-100 hover:bg-blue-800 hover:bg-opacity-50 rounded {{ request()->routeIs('admin.users.*') ? 'bg-blue-800 bg-opacity-50' : '' }}" href="{{ route('admin.users.index') }}">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="mx-3">Pengguna</span>
                    </a>

                    <!-- Profile Settings -->
                    <a class="flex items-center mt-4 py-2 px-6 text-gray-100 hover:bg-blue-800 hover:bg-opacity-50 rounded {{ request()->routeIs('profile.edit') ? 'bg-blue-800 bg-opacity-50' : '' }}" href="{{ route('profile.edit') }}">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="mx-3">Pengaturan Profil</span>
                    </a>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="flex items-center mt-4 py-2 px-6 text-gray-100 hover:bg-blue-800 hover:bg-opacity-50 rounded" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="mx-3">Logout</span>
                        </a>
                    </form>
                </nav>
            </div>

            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Header -->
                <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-blue-800">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center">
                        <div x-data="{ dropdownOpen: false }" class="relative">
                            <button @click="dropdownOpen = ! dropdownOpen" class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                                <div class="h-full w-full flex items-center justify-center bg-blue-800 text-white font-bold">
                                    {{ auth()->user()->name[0] }}
                                </div>
                            </button>

                            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                            <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-700 hover:text-white">Profil</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-700 hover:text-white">Logout</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Main Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    
    <!-- Tambahan JS -->
    @stack('scripts')
</body>
</html> 