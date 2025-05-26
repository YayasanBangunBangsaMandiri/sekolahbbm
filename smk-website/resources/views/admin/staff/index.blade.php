@extends('layouts.admin')

@section('title', 'Manajemen Staff')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">Manajemen Staff</h3>
        <a href="{{ route('admin.staff.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            <i class="fas fa-plus mr-2"></i>Tambah Staff
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter Section -->
    <div class="mt-8 bg-white rounded-lg shadow p-6">
        <div class="flex flex-wrap gap-4">
            <button class="filter-btn active px-4 py-2 rounded-md bg-blue-600 text-white" data-type="all">
                Semua
            </button>
            <button class="filter-btn px-4 py-2 rounded-md bg-gray-200 hover:bg-blue-600 hover:text-white" data-type="leadership">
                Pimpinan
            </button>
            <button class="filter-btn px-4 py-2 rounded-md bg-gray-200 hover:bg-blue-600 hover:text-white" data-type="teacher">
                Guru
            </button>
            <button class="filter-btn px-4 py-2 rounded-md bg-gray-200 hover:bg-blue-600 hover:text-white" data-type="staff">
                Staff
            </button>
        </div>
    </div>

    <!-- Staff Table -->
    <div class="mt-8">
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Foto
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jabatan
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tipe
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Urutan
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(['leadership' => 'Pimpinan', 'teacher' => 'Guru', 'staff' => 'Staff'] as $type => $label)
                            @if(isset($staff[$type]))
                                @foreach($staff[$type] as $member)
                                    <tr class="staff-row" data-type="{{ $type }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($member->photo)
                                                <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" 
                                                    class="h-10 w-10 rounded-full object-cover">
                                            @else
                                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <i class="fas fa-user text-gray-400"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $member->name }}</div>
                                            @if($member->email)
                                                <div class="text-sm text-gray-500">{{ $member->email }}</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $member->position }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $type === 'leadership' ? 'bg-purple-100 text-purple-800' : 
                                                   ($type === 'teacher' ? 'bg-green-100 text-green-800' : 
                                                    'bg-blue-100 text-blue-800') }}">
                                                {{ $label }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $member->order ?? '0' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button type="button" 
                                                    onclick="showStaffDetail({{ json_encode($member) }})"
                                                    class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <i class="fas fa-eye"></i> Detail
                                            </button>
                                            <a href="{{ route('admin.staff.edit', $member->id) }}" 
                                               class="text-blue-600 hover:text-blue-900 mr-3">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.staff.destroy', $member->id) }}" 
                                                  method="POST" 
                                                  class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus staff ini?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Staff Detail Modal -->
<div id="staffDetailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="flex flex-col items-center">
            <div class="mb-4">
                <img id="modalStaffPhoto" src="" alt="Staff Photo" 
                     class="w-32 h-32 rounded-full object-cover border-4 border-gray-200">
            </div>
            <h3 id="modalStaffName" class="text-2xl font-bold text-gray-900 mb-2"></h3>
            <p id="modalStaffPosition" class="text-lg text-green-600 mb-4"></p>
            
            <div class="w-full space-y-4">
                <div class="border-t pt-4">
                    <h4 class="text-lg font-semibold mb-2">Informasi Kontak</h4>
                    <p id="modalStaffEmail" class="text-gray-600"></p>
                    <p id="modalStaffPhone" class="text-gray-600"></p>
                </div>
                
                <div class="border-t pt-4">
                    <h4 class="text-lg font-semibold mb-2">Biografi</h4>
                    <p id="modalStaffBio" class="text-gray-600"></p>
                </div>
                
                <div class="border-t pt-4">
                    <h4 class="text-lg font-semibold mb-2">Detail Tambahan</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-500">Tipe Staff</p>
                            <p id="modalStaffType" class="font-medium"></p>
                        </div>
                        <div>
                            <p class="text-gray-500">Urutan Tampil</p>
                            <p id="modalStaffOrder" class="font-medium"></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-6">
                <button onclick="closeStaffDetail()" 
                        class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const staffRows = document.querySelectorAll('.staff-row');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-200');
            });

            button.classList.add('active', 'bg-blue-600', 'text-white');
            button.classList.remove('bg-gray-200');

            const type = button.dataset.type;

            staffRows.forEach(row => {
                if (type === 'all' || row.dataset.type === type) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
});

function showStaffDetail(staff) {
    const modal = document.getElementById('staffDetailModal');
    const photoEl = document.getElementById('modalStaffPhoto');
    const nameEl = document.getElementById('modalStaffName');
    const positionEl = document.getElementById('modalStaffPosition');
    const emailEl = document.getElementById('modalStaffEmail');
    const phoneEl = document.getElementById('modalStaffPhone');
    const bioEl = document.getElementById('modalStaffBio');
    const typeEl = document.getElementById('modalStaffType');
    const orderEl = document.getElementById('modalStaffOrder');

    // Set values
    photoEl.src = staff.photo ? '/storage/' + staff.photo : '/images/staff-placeholder.jpg';
    nameEl.textContent = staff.name;
    positionEl.textContent = staff.position;
    emailEl.textContent = staff.email || 'Email tidak tersedia';
    phoneEl.textContent = staff.phone || 'Nomor telepon tidak tersedia';
    bioEl.textContent = staff.bio || 'Biografi tidak tersedia';
    
    // Set type with proper label
    const typeLabels = {
        'leadership': 'Pimpinan',
        'teacher': 'Guru',
        'staff': 'Staff'
    };
    typeEl.textContent = typeLabels[staff.type] || staff.type;
    
    orderEl.textContent = staff.order || '0';

    modal.classList.remove('hidden');
}

function closeStaffDetail() {
    document.getElementById('staffDetailModal').classList.add('hidden');
}
</script>
@endpush
@endsection 