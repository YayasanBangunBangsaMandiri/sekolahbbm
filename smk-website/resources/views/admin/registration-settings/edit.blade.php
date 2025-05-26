@extends('layouts.admin')

@section('title', 'Pengaturan Pendaftaran')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h3 class="text-gray-700 text-3xl font-medium">Pengaturan Pendaftaran</h3>

    <div class="mt-8">
        <form method="POST" action="{{ route('admin.registration-settings.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white shadow rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Mulai Pendaftaran</label>
                        <input type="datetime-local" name="registration_start" 
                            value="{{ old('registration_start', $setting->registration_start?->format('Y-m-d\TH:i')) }}" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('registration_start')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Selesai Pendaftaran</label>
                        <input type="datetime-local" name="registration_end" 
                            value="{{ old('registration_end', $setting->registration_end?->format('Y-m-d\TH:i')) }}" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('registration_end')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_registration_open" value="1" 
                                {{ old('is_registration_open', $setting->is_registration_open) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-600">Aktifkan Pendaftaran</span>
                        </label>
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Pesan Ketika Pendaftaran Ditutup</label>
                        <textarea name="registration_closed_message" rows="3" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('registration_closed_message', $setting->registration_closed_message) }}</textarea>
                        @error('registration_closed_message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Simpan Pengaturan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 