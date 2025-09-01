@extends('layouts.admin')

@section('title', 'View Contact Message')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card modern-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-envelope-open me-2"></i>Contact Message Details
                        </h5>
                        <div class="d-flex gap-2">
                            <span class="badge bg-{{ isset($kontak) && $kontak->is_read ? 'success' : 'warning' }} fs-6">
                                {{ isset($kontak) && $kontak->is_read ? 'Read' : 'Unread' }}
                            </span>
                            @if(isset($kontak) && isset($kontak->priority))
                                <span class="badge bg-{{ $kontak->priority == 'urgent' ? 'danger' : ($kontak->priority == 'high' ? 'warning' : 'secondary') }} fs-6">
                                    {{ ucfirst($kontak->priority ?? 'Normal') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Message Header --}}
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">FROM</label>
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <div class="avatar-circle bg-primary text-white">
                                            {{ substr(isset($kontak) ? $kontak->name : 'N', 0, 2) }}
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ isset($kontak) ? $kontak->name : 'Sample Name' }}</h6>
                                        <small class="text-muted">
                                            <a href="mailto:{{ isset($kontak) ? $kontak->email : 'sample@email.com' }}" class="text-decoration-none">
                                                {{ isset($kontak) ? $kontak->email : 'sample@email.com' }}
                                            </a>
                                        </small>
                                        @if(isset($kontak) && $kontak->phone)
                                            <br>
                                            <small class="text-muted">
                                                <a href="tel:{{ $kontak->phone }}" class="text-decoration-none">
                                                    <i class="bi bi-telephone"></i> {{ $kontak->phone }}
                                                </a>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i> 
                                {{ isset($kontak) ? $kontak->created_at->format('d M Y, H:i') : now()->format('d M Y, H:i') }}
                            </small>
                            @if(isset($kontak) && isset($kontak->region))
                                <br>
                                <span class="badge bg-info mt-1">
                                    <i class="bi bi-geo-alt"></i> {{ $kontak->region }}
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Subject --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted">SUBJECT</label>
                        <h5 class="mb-0">{{ isset($kontak) ? $kontak->subject : 'Sample Subject' }}</h5>
                    </div>

                    {{-- Message Content --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted">MESSAGE</label>
                        <div class="message-content p-3 bg-light rounded">
                            {!! nl2br(e(isset($kontak) ? $kontak->message : 'Sample message content would appear here.')) !!}
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <hr class="my-4">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-2">
                            <a href="{{ route('kontak.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Back to List
                            </a>
                            @if(isset($kontak) && !$kontak->is_read)
                                <form action="{{ route('kontak.update', $id ?? 1) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="mark_as_read" value="1">
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-check"></i> Mark as Read
                                    </button>
                                </form>
                            @endif
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('kontak.edit', $id ?? 1) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <button type="button" class="btn btn-danger" onclick="deleteMessage()">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this contact message?</p>
                <p class="text-muted small">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('kontak.destroy', $id ?? 1) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.avatar-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 0.875rem;
}

.message-content {
    min-height: 100px;
    line-height: 1.6;
    font-size: 1rem;
}

.form-label {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.5rem;
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

@section('scripts')
<script>
function deleteMessage() {
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endsection