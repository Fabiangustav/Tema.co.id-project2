@extends('layouts.admin')

@section('title', 'Contact Updated')

@section('content')
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="card-title">Contact Updated Successfully</h3>
        </div>
        <div class="card-body">
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill me-2"></i>
                The contact message has been updated successfully.
            </div>

            <div class="mt-4">
                <h4>Updated Details</h4>
                <dl class="row">
                    <dt class="col-sm-3">Name</dt>
                    <dd class="col-sm-9">{{ $kontak->name }}</dd>

                    <dt class="col-sm-3">Email</dt>
                    <dd class="col-sm-9">{{ $kontak->email }}</dd>

                    <dt class="col-sm-3">Subject</dt>
                    <dd class="col-sm-9">{{ $kontak->subject }}</dd>

                    <dt class="col-sm-3">Region</dt>
                    <dd class="col-sm-9">{{ $kontak->region }}</dd>

                    <dt class="col-sm-3">Status</dt>
                    <dd class="col-sm-9">
                        <span class="badge bg-{{ $kontak->is_read ? 'success' : 'warning' }}">
                            {{ $kontak->is_read ? 'Read' : 'Unread' }}
                        </span>
                    </dd>

                    <dt class="col-sm-3">Message</dt>
                    <dd class="col-sm-9">{{ $kontak->message }}</dd>
                </dl>
            </div>

            <div class="text-end mt-4">
                <a href="{{ route('admin.kontak.index') }}" class="btn btn-secondary me-2">
                    <i class="bi bi-list"></i> Back to List
                </a>
                <a href="{{ route('admin.kontak.edit', $kontak) }}" class="btn btn-primary">
                    <i class="bi bi-pencil"></i> Edit Again
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card-header {
        background-color: #f8f9fa;
    }
    
    .badge {
        font-size: 0.9rem;
        padding: 0.5em 1em;
    }

    dt {
        font-weight: 600;
        color: #495057;
    }

    dd {
        margin-bottom: 1rem;
    }
</style>
@endsection