@extends('layouts.admin')

@section('title', 'Edit Tentang Kami')

@section('content')
<h2>Edit Tentang Kami</h2>

<form method="POST" action="{{ route('admin.about.update') }}">
    @csrf
    <div class="mb-3">
        <textarea name="content" class="form-control" rows="10">{{ old('content', $about->content ?? '') }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
