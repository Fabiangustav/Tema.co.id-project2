@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard Admin</h1>
<p>Selamat datang di halaman admin.</p>





<div class="row">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Tentang Kami</h5>
                <a href="{{ route('admin.about.edit') }}" class="btn btn-primary">Edit Tentang Kami</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Berita</h5>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-primary">Kelola Berita</a>
            </div>
        </div>
    </div>
</div>
@endsection
