@extends('admin.layouts.app')

@section('title', 'Kelola Berita & Blog')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Kelola Berita & Blog</h1>
    
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-newspaper me-1"></i>
                Daftar Berita & Blog
            </div>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Tambah Baru
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="postsTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tipe</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $index => $post)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <span class="badge {{ $post->type == 'news' ? 'bg-info' : 'bg-primary' }}">
                                        {{ ucfirst($post->type) }}
                                    </span>
                                </td>
                                <td>{{ $post->category }}</td>
                                <td>{{ $post->author->name ?? '-' }}</td>
                                <td>{{ $post->created_at->format('d M Y') }}</td>
                                <td>
                                    <span class="badge {{ $post->status == 'published' ? 'bg-success' : 'bg-warning' }}">
                                        {{ ucfirst($post->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" 
                                           class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ $post->type == 'news' ? route('news.show', $post->slug) : route('blog.show', $post->slug) }}" 
                                           class="btn btn-info btn-sm" 
                                           target="_blank">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" 
                                              method="POST" 
                                              class="d-inline" 
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#postsTable').DataTable({
            "pageLength": 25,
            "order": [[5, "desc"]], // Sort by date column by default
            "columnDefs": [
                { "orderable": false, "targets": [7] } // Disable sorting on action column
            ]
        });
    });
</script>
@endpush
@endsection 