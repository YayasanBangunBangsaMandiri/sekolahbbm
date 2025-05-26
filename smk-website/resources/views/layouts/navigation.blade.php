<nav x-data="{ open: false, dropdownOpen: false }" class="bg-white border-b border-gray-100 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="Green School Bali Logo" class="h-8 md:h-10">
                        <span class="ml-2 text-green-800 font-semibold hidden md:block">Green School Bali</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-3 sm:ms-4 md:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        Home
                    </x-nav-link>
                    
                    <!-- Programs & Projects Dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" type="button" class="flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                            Programs & Projects
                            <svg class="ml-1 h-4 w-4" :class="{ 'transform rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" class="absolute left-0 w-48 mt-2 origin-top-left bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                <a href="{{ route('programs') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Programs</a>
                                <a href="{{ route('projects') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Student Projects</a>
                            </div>
                        </div>
                    </div>

                    <!-- News & Gallery Dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" type="button" class="flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                            News & Gallery
                            <svg class="ml-1 h-4 w-4" :class="{ 'transform rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" class="absolute left-0 w-48 mt-2 origin-top-left bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                <a href="{{ route('news') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">News & Events</a>
                                <a href="{{ route('gallery') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gallery</a>
                            </div>
                        </div>
                    </div>

                    <x-nav-link :href="route('application')" :active="request()->routeIs('application')">
                        Application
                    </x-nav-link>

                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                        Contact Us
                    </x-nav-link>

                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                        About Us
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden md:flex items-center ms-4">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            @role('admin')
                            <x-dropdown-link :href="route('admin.dashboard')">
                                Admin Panel
                            </x-dropdown-link>
                            @endrole
                            <x-dropdown-link :href="route('admin.profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-green-800">Log in</a>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                Home
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                About Us
            </x-responsive-nav-link>
            <!-- Dropdown Responsive -->
            <div x-data="{ open: false }">
                <button @click="open = !open" type="button" class="w-full text-left block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                    Programs & Projects
                    <svg class="inline ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" class="pl-6">
                    <x-responsive-nav-link :href="route('programs')" :active="request()->routeIs('programs*')">
                        Programs
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('projects')" :active="request()->routeIs('projects*')">
                        Student Projects
                    </x-responsive-nav-link>
                </div>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" type="button" class="w-full text-left block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                    News & Gallery
                    <svg class="inline ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" class="pl-6">
                    <x-responsive-nav-link :href="route('news')" :active="request()->routeIs('news*')">
                        News & Events
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('gallery')" :active="request()->routeIs('gallery*')">
                        Gallery
                    </x-responsive-nav-link>
                </div>
            </div>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                Contact Us
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('application')" :active="request()->routeIs('application')">
                Application
            </x-responsive-nav-link>
        </div>
        <!-- Responsive Settings Options -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                @role('admin')
                <x-responsive-nav-link :href="route('admin.dashboard')">
                    Admin Panel
                </x-responsive-nav-link>
                @endrole
                <x-responsive-nav-link :href="route('admin.profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @else
        <div class="py-3 border-t border-gray-200">
            <x-responsive-nav-link :href="route('login')">
                Log in
            </x-responsive-nav-link>
        </div>
        @endauth
    </div>
</nav>
