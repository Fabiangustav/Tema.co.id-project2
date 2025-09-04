@extends('layouts.admin')

@section('title', 'Edit Region')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Edit Region: {{ $region->name }}</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.regions.update', $region) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Region Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ old('name', $region->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="code" class="form-label">Region Code</label>
                            <input type="text" name="code" id="code" class="form-control"
                                   value="{{ old('code', $region->code) }}" required>
                        </div>

                        <div class="mb-3 form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="is_active"
                                   name="is_active" {{ $region->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.regions.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save"></i> Update Region
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
.card-header {
    border-radius: 0.375rem 0.375rem 0 0;
}
</style>
@endsection
