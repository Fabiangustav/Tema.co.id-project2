@extends('layouts.admin') {{-- sesuaikan dengan layout kamu --}}
@section('title', 'Daftar Berita')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Berita</h2>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
            + Tambah Berita
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
                    @forelse($beritas as $index => $berita)
                        <tr>
                            <td>{{ $index + $beritas->firstItem() }}</td>
                            <td>{{ $berita->title }}</td>
                            <td>{{ $berita->slug }}</td>
                            <td>
                                <span class="badge bg-{{ $berita->status == 'published' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($berita->status) }}
                                </span>
                            </td>
                            <td>
                                @if($berita->image)
                                    <img src="{{ asset('storage/' . $berita->image) }}" width="80" class="img-thumbnail">
                                @else
                                    <small class="text-muted">Tidak ada</small>
                                @endif
                            </td>
                            <td>{{ $berita->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.berita.destroy', $berita->id) }}" 
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
                            <td colspan="7" class="text-center">Belum ada berita</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- pagination --}}
            <div class="d-flex justify-content-center">
                {{ $beritas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
