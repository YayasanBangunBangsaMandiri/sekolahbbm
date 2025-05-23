@extends('layouts.admin')

@section('title', 'Pengaturan Surat')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h3 class="text-gray-700 text-3xl font-medium">Pengaturan Surat</h3>

    <div class="mt-8">
        <form method="POST" action="{{ route('admin.letter-settings.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Kop Surat Settings -->
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h4 class="text-lg font-medium mb-4">Pengaturan Kop Surat</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Yayasan</label>
                        <input type="text" name="foundation_name" value="{{ old('foundation_name', $setting->foundation_name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Sekolah (Kop)</label>
                        <input type="text" name="school_name_kop" value="{{ old('school_name_kop', $setting->school_name_kop) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tagline Sekolah</label>
                        <input type="text" name="school_tagline" value="{{ old('school_tagline', $setting->school_tagline) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Website Sekolah</label>
                        <input type="text" name="school_website" value="{{ old('school_website', $setting->school_website) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">SK Sekolah</label>
                        <input type="text" name="school_decree" value="{{ old('school_decree', $setting->school_decree) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Warna Header</label>
                        <input type="color" name="letter_header_color" value="{{ old('letter_header_color', $setting->letter_header_color) }}" class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <!-- School Information -->
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h4 class="text-lg font-medium mb-4">Informasi Sekolah</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Sekolah</label>
                        <input type="text" name="school_name" value="{{ old('school_name', $setting->school_name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat Sekolah</label>
                        <input type="text" name="school_address" value="{{ old('school_address', $setting->school_address) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" name="school_phone" value="{{ old('school_phone', $setting->school_phone) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="school_email" value="{{ old('school_email', $setting->school_email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <!-- Principal Information -->
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h4 class="text-lg font-medium mb-4">Informasi Kepala Sekolah</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Kepala Sekolah</label>
                        <input type="text" name="principal_name" value="{{ old('principal_name', $setting->principal_name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" name="principal_nip" value="{{ old('principal_nip', $setting->principal_nip) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <!-- Page Settings -->
            <div class="bg-white shadow rounded-lg p-6">
                <h4 class="text-lg font-medium mb-4">Pengaturan Halaman</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ukuran Kertas</label>
                        <select name="paper_size" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="A4" {{ $setting->paper_size == 'A4' ? 'selected' : '' }}>A4</option>
                            <option value="Letter" {{ $setting->paper_size == 'Letter' ? 'selected' : '' }}>Letter</option>
                            <option value="Legal" {{ $setting->paper_size == 'Legal' ? 'selected' : '' }}>Legal</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Orientasi</label>
                        <select name="paper_orientation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="portrait" {{ $setting->paper_orientation == 'portrait' ? 'selected' : '' }}>Portrait</option>
                            <option value="landscape" {{ $setting->paper_orientation == 'landscape' ? 'selected' : '' }}>Landscape</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Margin Atas (mm)</label>
                        <input type="number" name="letter_margin_top" value="{{ old('letter_margin_top', $setting->letter_margin_top) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Margin Bawah (mm)</label>
                        <input type="number" name="letter_margin_bottom" value="{{ old('letter_margin_bottom', $setting->letter_margin_bottom) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Margin Kiri (mm)</label>
                        <input type="number" name="letter_margin_left" value="{{ old('letter_margin_left', $setting->letter_margin_left) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Margin Kanan (mm)</label>
                        <input type="number" name="letter_margin_right" value="{{ old('letter_margin_right', $setting->letter_margin_right) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 