@extends('layouts.app') {{-- ganti sesuai layout utama kamu --}}

@section('title', $blog->title)

@section('content')
    <div class="container py-5">
        <h1>{{ $blog->title }}</h1>
        <p class="text-muted">Dipublikasikan {{ $blog->created_at->format('d M Y') }}</p>

        <div class="mb-3">
            <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('img/default.jpg') }}"
                 alt="{{ $blog->title }}" class="img-fluid rounded">
        </div>

        <div>
            {!! $blog->content !!}
        </div>
    </div>
@endsection
