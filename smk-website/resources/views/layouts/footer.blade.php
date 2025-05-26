<footer class="bg-green-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo & About -->
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('images/logo-white.png') }}" alt="Green School Bali Logo" class="h-12">
                </div>
                <p class="text-sm text-gray-300 mb-4">
                    Green School Bali is a pioneering sustainability-focused school on a beautiful bamboo campus in the heart of Bali.
                </p>
                <div class="flex space-x-4 mt-4">
                    <a href="https://facebook.com/greenschoolbali" target="_blank" class="text-white hover:text-green-300">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://instagram.com/greenschoolbali" target="_blank" class="text-white hover:text-green-300">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://youtube.com/greenschoolbali" target="_blank" class="text-white hover:text-green-300">
                        <span class="sr-only">YouTube</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-span-1">
                <h3 class="text-lg font-semibold mb-4 text-green-300">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ route('about') }}" class="hover:text-green-300">About Us</a>
                    </li>
                    <li>
                        <a href="{{ route('programs') }}" class="hover:text-green-300">Programs</a>
                    </li>
                    <li>
                        <a href="{{ route('projects') }}" class="hover:text-green-300">Student Projects</a>
                    </li>
                    <li>
                        <a href="{{ route('news') }}" class="hover:text-green-300">News & Events</a>
                    </li>
                    <li>
                        <a href="{{ route('gallery') }}" class="hover:text-green-300">Gallery</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:text-green-300">Contact Us</a>
                    </li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="col-span-1">
                <h3 class="text-lg font-semibold mb-4 text-green-300">Contact Info</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 mr-2 text-green-300 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Jl. Raya Sibang Kaja, Banjar Saren, Abiansemal, Badung, Bali 80352, Indonesia</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <a href="mailto:admissions@greenschool.org" class="hover:text-green-300">admissions@greenschool.org</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <a href="tel:+62361469875" class="hover:text-green-300">+62 361 469 875</a>
                    </li>
                </ul>
            </div>
            
            <!-- Newsletter -->
            <div class="col-span-1">
                <h3 class="text-lg font-semibold mb-4 text-green-300">Newsletter</h3>
                <p class="text-sm mb-4">Subscribe to our newsletter for updates, events and news.</p>
                <form class="space-y-2">
                    <div>
                        <input type="email" placeholder="Your Email" class="w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent">
                    </div>
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm text-gray-400">© {{ date('Y') }} Green School Bali. All rights reserved.</p>
            <div class="mt-4 md:mt-0 text-sm text-gray-400">
                <a href="#" class="hover:text-green-300 mr-4">Privacy Policy</a>
                <a href="#" class="hover:text-green-300">Terms of Service</a>
            </div>
        </div>
    </div>
</footer> 