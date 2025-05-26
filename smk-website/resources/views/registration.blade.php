@extends('layouts.app')

@section('title', 'Pendaftaran Siswa Baru')

@section('content')
<!-- Hero Section -->
<div class="bg-blue-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
            Pendaftaran Siswa Baru
        </h1>
        <p class="mt-6 max-w-3xl mx-auto text-xl text-blue-200">
            Bergabunglah dengan SMK Nusantara dan mulai perjalanan karirmu
        </p>
    </div>
</div>

<!-- Form Pendaftaran -->
<div class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
            @if(session('success'))
                <div class="mb-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Pendaftaran Berhasil!</strong>
                    <p class="block sm:inline">{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ route('registration.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Informasi Pribadi -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900 border-b border-gray-200 pb-2 mb-4">Informasi Pribadi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="student_name" class="block text-sm font-medium text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="student_name" id="student_name" value="{{ old('student_name') }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('student_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="nisn" class="block text-sm font-medium text-gray-700">NISN <span class="text-red-500">*</span></label>
                            <input type="text" name="nisn" id="nisn" value="{{ old('nisn') }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('nisn')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="place_of_birth" class="block text-sm font-medium text-gray-700">Tempat Lahir <span class="text-red-500">*</span></label>
                            <input type="text" name="place_of_birth" id="place_of_birth" value="{{ old('place_of_birth') }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('place_of_birth')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="birthdate" class="block text-sm font-medium text-gray-700">Tanggal Lahir <span class="text-red-500">*</span></label>
                            <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate') }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('birthdate')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin <span class="text-red-500">*</span></label>
                            <select name="gender" id="gender" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('gender')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700">Alamat Lengkap <span class="text-red-500">*</span></label>
                            <textarea name="address" id="address" rows="3" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>{{ old('address') }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Informasi Kontak -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900 border-b border-gray-200 pb-2 mb-4">Informasi Kontak</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon <span class="text-red-500">*</span></label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="parent_name" class="block text-sm font-medium text-gray-700">Nama Orang Tua/Wali <span class="text-red-500">*</span></label>
                            <input type="text" name="parent_name" id="parent_name" value="{{ old('parent_name') }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('parent_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="parent_phone" class="block text-sm font-medium text-gray-700">Nomor Telepon Orang Tua/Wali <span class="text-red-500">*</span></label>
                            <input type="text" name="parent_phone" id="parent_phone" value="{{ old('parent_phone') }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('parent_phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Informasi Akademik -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900 border-b border-gray-200 pb-2 mb-4">Informasi Akademik</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="previous_school" class="block text-sm font-medium text-gray-700">Asal Sekolah (SMP/MTs) <span class="text-red-500">*</span></label>
                            <input type="text" name="previous_school" id="previous_school" value="{{ old('previous_school') }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            @error('previous_school')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="major_id" class="block text-sm font-medium text-gray-700">Jurusan yang Dipilih <span class="text-red-500">*</span></label>
                            <select name="major_id" id="major_id" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                <option value="">Pilih Jurusan</option>
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>{{ $major->name }}</option>
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
                            <input id="agreement" name="agreement" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="agreement" class="font-medium text-gray-700">Saya menyatakan bahwa data yang saya berikan adalah benar <span class="text-red-500">*</span></label>
                            <p class="text-gray-500">Dengan mencentang kotak ini, saya menyetujui untuk memberikan data pribadi saya untuk keperluan pendaftaran.</p>
                        </div>
                    </div>
                    @error('agreement')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Pertanyaan Umum</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Informasi Pendaftaran
            </p>
        </div>

        <div class="mt-10 max-w-3xl mx-auto">
            <dl class="space-y-6">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <dt class="text-lg leading-6 font-medium text-gray-900 px-4 py-5 sm:px-6">
                        Kapan pendaftaran dibuka?
                    </dt>
                    <dd class="mt-2 px-4 py-5 sm:px-6 bg-gray-50">
                        <p class="text-base text-gray-500">
                            Pendaftaran siswa baru dibuka mulai bulan Januari hingga Juni setiap tahunnya. Untuk informasi lebih lanjut, silakan hubungi bagian administrasi sekolah.
                        </p>
                    </dd>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <dt class="text-lg leading-6 font-medium text-gray-900 px-4 py-5 sm:px-6">
                        Apa saja persyaratan pendaftaran?
                    </dt>
                    <dd class="mt-2 px-4 py-5 sm:px-6 bg-gray-50">
                        <p class="text-base text-gray-500">
                            Persyaratan pendaftaran meliputi:
                        </p>
                        <ul class="mt-2 list-disc pl-5 text-base text-gray-500">
                            <li>Fotokopi ijazah SMP/MTs (menyusul jika belum ada)</li>
                            <li>Fotokopi SKHUN SMP/MTs (menyusul jika belum ada)</li>
                            <li>Fotokopi akta kelahiran</li>
                            <li>Fotokopi kartu keluarga</li>
                            <li>Pas foto berwarna ukuran 3x4 (4 lembar)</li>
                        </ul>
                    </dd>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <dt class="text-lg leading-6 font-medium text-gray-900 px-4 py-5 sm:px-6">
                        Bagaimana proses seleksi pendaftaran?
                    </dt>
                    <dd class="mt-2 px-4 py-5 sm:px-6 bg-gray-50">
                        <p class="text-base text-gray-500">
                            Proses seleksi dilakukan berdasarkan:
                        </p>
                        <ul class="mt-2 list-disc pl-5 text-base text-gray-500">
                            <li>Nilai rapor SMP/MTs kelas 7-9</li>
                            <li>Hasil tes potensi akademik</li>
                            <li>Wawancara</li>
                        </ul>
                    </dd>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <dt class="text-lg leading-6 font-medium text-gray-900 px-4 py-5 sm:px-6">
                        Kapan pengumuman hasil seleksi?
                    </dt>
                    <dd class="mt-2 px-4 py-5 sm:px-6 bg-gray-50">
                        <p class="text-base text-gray-500">
                            Pengumuman hasil seleksi akan disampaikan melalui email dan website resmi sekolah maksimal 2 minggu setelah proses seleksi dilakukan.
                        </p>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection 