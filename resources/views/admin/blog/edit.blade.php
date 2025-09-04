@extends('layouts.admin') {{-- sesuaikan dengan layout utama kamu --}}
@section('title', 'Edit Blog')

@section('content')
<div class="container mt-4">
    <h2>Edit Blog</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" name="title" id="title"
                           value="{{ old('title', $blog->title) }}"
                           class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Konten</label>
                    <textarea name="content" id="content" rows="5"
                              class="form-control @error('content') is-invalid @enderror">{{ old('content', $blog->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="draft" {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    @if($blog->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $blog->image) }}" width="120" class="img-thumbnail">
                        </div>
                    @endif
                    <input type="file" name="image" id="image"
                           class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
