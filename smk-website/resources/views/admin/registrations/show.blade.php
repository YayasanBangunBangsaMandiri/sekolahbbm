@extends('layouts.admin')

@section('title', 'Detail Pendaftaran Siswa')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Detail Pendaftaran</h2>
                    <div class="flex space-x-2">
                        @if($registration->status === 'accepted')
                            <a href="{{ route('admin.registrations.download-letter', $registration->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25">
                                <i class="fas fa-download mr-2"></i> Download Surat Penerimaan
                            </a>
                        @endif
                        <a href="{{ route('admin.registrations.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">
                            Kembali
                        </a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                <div class="border border-gray-200 rounded-md p-4 mb-6">
                    <div class="flex flex-wrap -mx-2">
                        <div class="px-2 w-full md:w-1/3 mb-4">
                            <p class="text-sm font-medium text-gray-700">Nomor Pendaftaran</p>
                            <p class="text-lg font-semibold text-gray-900">REG-{{ str_pad($registration->id, 5, '0', STR_PAD_LEFT) }}</p>
                        </div>
                        <div class="px-2 w-full md:w-1/3 mb-4">
                            <p class="text-sm font-medium text-gray-700">Tanggal Pendaftaran</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $registration->created_at->format('d-m-Y') }}</p>
                        </div>
                        <div class="px-2 w-full md:w-1/3 mb-4">
                            <p class="text-sm font-medium text-gray-700">Status</p>
                            <div class="mt-1">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $registration->status == 'accepted' ? 'bg-green-100 text-green-800' : 
                                      ($registration->status == 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ $registration->status == 'pending' ? 'Menunggu' : 
                                      ($registration->status == 'accepted' ? 'Diterima' : 'Ditolak') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informasi Pribadi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm font-medium text-gray-700">Nama Lengkap</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $registration->student_name }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">NISN</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $registration->nisn }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Tempat Lahir</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $registration->place_of_birth }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Tanggal Lahir</p>
                            <p class="text-lg font-semibold text-gray-900">{{ \Carbon\Carbon::parse($registration->birthdate)->format('d-m-Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Jenis Kelamin</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $registration->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-sm font-medium text-gray-700">Alamat</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $registration->address }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informasi Kontak</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm font-medium text-gray-700">Email</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $registration->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Nomor Telepon</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $registration->phone }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Nama Orang Tua/Wali</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $registration->parent_name }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Nomor Telepon Orang Tua/Wali</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $registration->parent_phone }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informasi Akademik</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm font-medium text-gray-700">Asal Sekolah</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $registration->previous_school }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Jurusan yang Dipilih</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $registration->major->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 border-t border-gray-200 pt-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Update Status Pendaftaran</h3>
                    <form action="{{ route('admin.registrations.update-status', $registration->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="flex items-center space-x-4">
                            <div>
                                <select name="status" class="rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="pending" {{ $registration->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="accepted" {{ $registration->status == 'accepted' ? 'selected' : '' }}>Diterima</option>
                                    <option value="rejected" {{ $registration->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25">
                                    Update Status
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 