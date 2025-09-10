@extends('layouts.app')

@section('content')
<section class="blog-detail section">
    <div class="container">
        <h1>{{ $blog->title }}</h1>
        <p><small>{{ $blog->created_at->format('d M Y') }}</small></p>
        <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('img/default.jpg') }}"
             alt="{{ $blog->title }}" style="max-width:100%; height:auto;">

        <div class="mt-4">
            {!! $blog->content !!}
        </div>
    </div>
</section>
@endsection
