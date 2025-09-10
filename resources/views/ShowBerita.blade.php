@extends('layouts.app')

@section('title', $berita->title)

@section('meta')
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($berita->content), 150) }}">
@endsection

@section('content')
    <div class="container my-5">
        <article class="blog-detail">
            <!-- Judul -->
            <h1 class="mb-3">{{ $berita->title }}</h1>

            <!-- Meta: tanggal & author -->
            <div class="mb-3 text-muted">
                <i class="fa fa-calendar"></i> {{ $berita->created_at->translatedFormat('d F Y') }}
                &nbsp; | &nbsp;
                <i class="fa fa-user"></i> {{ $berita->author->name ?? 'Admin' }}
            </div>

            <!-- Gambar -->
            <div class="mb-4">
                <img src="{{ $berita->image ? asset('storage/' . $berita->image) : asset('img/default.jpg') }}"
                    alt="{{ $berita->title }}" class="img-fluid rounded shadow">
            </div>

            <!-- Konten -->
            <div class="content">
                {!! $berita->content !!}
            </div>

            <!-- Share -->
            <div class="share mt-4">
                <h5>Bagikan:</h5>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                    target="_blank">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->title) }}"
                    target="_blank">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="https://wa.me/?text={{ urlencode($berita->title . ' ' . request()->fullUrl()) }}" target="_blank">
                    <i class="fa fa-whatsapp"></i>
                </a>
            </div>
        </article>
    </div>
@endsection
