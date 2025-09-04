@extends('layouts.admin')

@section('title', 'Buat Blog Baru')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <!-- Header -->
            <div class="text-center mb-4">
                <h3 class="fw-bold text-primary">Tambah Blog Baru</h3>
                <p class="text-muted">Lengkapi data blog yang akan ditambahkan</p>
            </div>

            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <!-- Judul Blog -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Judul Blog <span class="text-danger">*</span></label>
                        <input type="text" name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" placeholder="Masukkan judul blog..." required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar Utama -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Gambar Utama</label>
                        <input type="file" name="image"
                               class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Slug URL <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" name="slug"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   value="{{ old('slug') }}" placeholder="url-friendly-slug" required>
                            <button type="button" class="btn btn-outline-primary">Generate dari Judul</button>
                        </div>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Slug akan digunakan sebagai URL blog</small>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>

                    <!-- Konten Blog -->
                    <div class="col-12">
                        <label class="form-label fw-semibold">Konten Blog <span class="text-danger">*</span></label>
                        <textarea name="content"
                                  class="form-control @error('content') is-invalid @enderror"
                                  rows="5" placeholder="Tulis konten blog di sini..." required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Tombol -->
                <div class="text-end mt-4">
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary px-4">Batal</a>
                    <button type="submit" class="btn btn-primary px-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
