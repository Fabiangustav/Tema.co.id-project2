@extends('layouts.admin')

@section('title', 'Edit Contact Message')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card modern-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-pencil-square me-2"></i>Edit Contact Message
                        </h5>
                        <span class="badge bg-{{ isset($kontak) && $kontak->is_read ? 'success' : 'warning' }}">
                            {{ isset($kontak) && $kontak->is_read ? 'Read' : 'Unread' }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('kontak.update', $id ?? 1) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name', isset($kontak) ? $kontak->name : '') }}"
                                       required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" 
                                       name="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email', isset($kontak) ? $kontak->email : '') }}"
                                       required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" 
                                       name="phone" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       value="{{ old('phone', isset($kontak) ? $kontak->phone : '') }}">
                                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Region</label>
                                <select name="region" class="form-select @error('region') is-invalid @enderror">
                                    <option value="">Select Region</option>
                                    <option value="West Java" {{ old('region', isset($kontak) ? $kontak->region : '') == 'West Java' ? 'selected' : '' }}>West Java</option>
                                    <option value="NTB" {{ old('region', isset($kontak) ? $kontak->region : '') == 'NTB' ? 'selected' : '' }}>NTB</option>
                                    <option value="Central Java" {{ old('region', isset($kontak) ? $kontak->region : '') == 'Central Java' ? 'selected' : '' }}>Central Java</option>
                                    <option value="East Java" {{ old('region', isset($kontak) ? $kontak->region : '') == 'East Java' ? 'selected' : '' }}>East Java</option>
                                </select>
                                @error('region')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subject <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="subject" 
                                   class="form-control @error('subject') is-invalid @enderror" 
                                   value="{{ old('subject', isset($kontak) ? $kontak->subject : '') }}"
                                   required>
                            @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message <span class="text-danger">*</span></label>
                            <textarea name="message" 
                                      class="form-control @error('message') is-invalid @enderror" 
                                      rows="6"
                                      required>{{ old('message', isset($kontak) ? $kontak->message : '') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Priority</label>
                                <select name="priority" class="form-select">
                                    <option value="normal" {{ old('priority', isset($kontak) ? $kontak->priority : 'normal') == 'normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="high" {{ old('priority', isset($kontak) ? $kontak->priority : '') == 'high' ? 'selected' : '' }}>High</option>
                                    <option value="urgent" {{ old('priority', isset($kontak) ? $kontak->priority : '') == 'urgent' ? 'selected' : '' }}>Urgent</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="is_read" class="form-select">
                                    <option value="0" {{ old('is_read', isset($kontak) ? $kontak->is_read : 0) == 0 ? 'selected' : '' }}>Unread</option>
                                    <option value="1" {{ old('is_read', isset($kontak) ? $kontak->is_read : 0) == 1 ? 'selected' : '' }}>Read</option>
                                </select>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('kontak.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Update Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.form-label {
    font-weight: 600;
    color: #495057;
}

.text-danger {
    font-size: 0.875rem;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.modern-card {
    border: none;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.badge {
    font-size: 0.875rem;
    padding: 0.5em 0.75em;
}
</style>
@endsection