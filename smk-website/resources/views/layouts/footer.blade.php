<footer class="bg-gray-800 text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo dan Tentang -->
            <div>
                <h2 class="text-xl font-bold mb-4">SMK Nusantara</h2>
                <p class="text-gray-300 mb-4">
                    Mendidik generasi muda untuk menjadi tenaga profesional yang kompeten, 
                    berkarakter, dan siap bersaing di dunia kerja global.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white">
                        <span class="sr-only">Facebook</span>
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white">
                        <span class="sr-only">Twitter</span>
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white">
                        <span class="sr-only">Instagram</span>
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white">
                        <span class="sr-only">YouTube</span>
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            
            <!-- Tautan Cepat -->
            <div>
                <h3 class="text-lg font-bold mb-4">Tautan Cepat</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Beranda</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-gray-300 hover:text-white">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="{{ route('majors') }}" class="text-gray-300 hover:text-white">Program Keahlian</a>
                    </li>
                    <li>
                        <a href="{{ route('gallery') }}" class="text-gray-300 hover:text-white">Galeri</a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}" class="text-gray-300 hover:text-white">Berita</a>
                    </li>
                    <li>
                        <a href="{{ route('registration') }}" class="text-gray-300 hover:text-white">Pendaftaran</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-gray-300 hover:text-white">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
            
            <!-- Program Keahlian -->
            <div>
                <h3 class="text-lg font-bold mb-4">Program Keahlian</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('majors.show', 'rpl') }}" class="text-gray-300 hover:text-white">Rekayasa Perangkat Lunak</a>
                    </li>
                    <li>
                        <a href="{{ route('majors.show', 'tkj') }}" class="text-gray-300 hover:text-white">Teknik Komputer Jaringan</a>
                    </li>
                    <li>
                        <a href="{{ route('majors.show', 'mm') }}" class="text-gray-300 hover:text-white">Multimedia</a>
                    </li>
                    <li>
                        <a href="{{ route('majors.show', 'akl') }}" class="text-gray-300 hover:text-white">Akuntansi dan Keuangan</a>
                    </li>
                </ul>
            </div>
            
            <!-- Kontak -->
            <div>
                <h3 class="text-lg font-bold mb-4">Hubungi Kami</h3>
                <ul class="space-y-2 text-gray-300">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <span>Jl. Pendidikan No. 123, Kota Nusantara, 12345</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        <span>+62 123 4567 890</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        <span>info@smknusantara.sch.id</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Copyright -->
    <div class="bg-gray-900 py-4">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400">
                    &copy; {{ date('Y') }} SMK Nusantara. All rights reserved.
                </p>
                <p class="text-gray-400 mt-2 md:mt-0">
                    Designed & Developed by <span class="text-blue-400">Team IT SMK Nusantara</span>
                </p>
            </div>
        </div>
    </div>
</footer> 