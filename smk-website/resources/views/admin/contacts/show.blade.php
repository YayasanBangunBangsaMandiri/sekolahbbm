@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">Detail Pesan</h3>
        <a href="{{ route('admin.contacts.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
            Kembali
        </a>
    </div>

    <div class="mt-8">
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Pengirim</h4>
                        <p class="mt-2 text-lg">{{ $contact->name }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Email</h4>
                        <p class="mt-2 text-lg">{{ $contact->email }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Tanggal</h4>
                        <p class="mt-2">{{ $contact->created_at->format('d M Y H:i') }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Status</h4>
                        <p class="mt-2">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $contact->status === 'read' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $contact->status === 'read' ? 'Sudah Dibaca' : 'Belum Dibaca' }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <h4 class="text-sm font-medium text-gray-500">Subjek</h4>
                    <p class="mt-2 text-lg">{{ $contact->subject }}</p>
                </div>

                <div class="mt-6">
                    <h4 class="text-sm font-medium text-gray-500">Pesan</h4>
                    <div class="mt-2 prose max-w-none">
                        {{ $contact->message }}
                    </div>
                </div>

                <div class="mt-6 flex justify-between">
                    <form action="{{ route('admin.contacts.status', $contact->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Tandai sebagai {{ $contact->status === 'read' ? 'Belum Dibaca' : 'Sudah Dibaca' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 