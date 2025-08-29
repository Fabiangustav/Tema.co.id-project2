@extends('admin.layout')

@section('title', 'Kelola Berita')

@section('content')
  <h1>Daftar Berita</h1>
  <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Judul</th>
        <th>Isi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($berita as $item)
        <tr>
          <td>{{ $item->judul }}</td>
          <td>{{ Str::limit($item->isi, 100) }}</td>
          <td>
            <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $berita->links() }}
@endsection
