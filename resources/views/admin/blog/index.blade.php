@extends('layouts.admin') {{-- sesuaikan dengan layout kamu --}}
@section('title', 'Daftar blog')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>isi Blog</h2>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
           + Tambah Blog
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th>Created At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $index => $blog)
                        <tr>
                            <td>{{ $index + $blog->firstItem() }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->slug }}</td>
                            <td>
                                <span class="badge bg-{{ $berita->status == 'published' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($berita->status) }}
                                </span>
                            </td>
                            <td>
                                @if($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" width="80" class="img-thumbnail">
                                @else
                                    <small class="text-muted">Tidak ada</small>
                                @endif
                            </td>
                            <td>{{ $blog->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.blog.destroy', $blog->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada Blog</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- pagination --}}
            <div class="d-flex justify-content-center">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
