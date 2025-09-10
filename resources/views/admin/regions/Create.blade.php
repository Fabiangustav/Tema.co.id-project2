@extends('layouts.admin')

@section('title', 'Tambah Region')

@section('content')
<div class="container">
    <h1>Tambah Region Baru</h1>
    <form action="{{ route('admin.regions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Region</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Nama kota</label>
            <input type="text" name="code" id="code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Alamat</label>
            <input type="text" name="code" id="code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Kontak</label>
            <input type="text" name="code" id="code" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
