@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Contact Messages</h2>
        <div>
            <button class="btn btn-outline-secondary" id="markAllRead">
                <i class="bi bi-check-all"></i> Mark All as Read
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Region</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $contact)
                            <tr class="{{ !$contact->is_read ? 'table-active' : '' }}">
                                <td>{{ $contact->name }}</td>
                                <td>
                                    <a href="mailto:{{ $contact->email }}">
                                        {{ $contact->email }}
                                    </a>
                                </td>
                                <td>{{ $contact->subject }}</td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $contact->region }}
                                    </span>
                                </td>
                                <td>
                                    @if($contact->is_read)
                                        <span class="badge bg-success">Read</span>
                                    @else
                                        <span class="badge bg-warning">Unread</span>
                                    @endif
                                </td>
                                <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" 
                                                class="btn btn-sm btn-primary view-message" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#messageModal"
                                                data-contact="{{ $contact->id }}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <form action="{{ route('kontak.destroy', $contact) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No messages found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Message Modal -->
<div class="modal fade" id="messageModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="fw-bold">From:</label>
                    <p id="modalName"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Email:</label>
                    <p id="modalEmail"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Subject:</label>
                    <p id="modalSubject"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Message:</label>
                    <p id="modalMessage"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Handle message view in modal
    $('.view-message').click(function() {
        const contactId = $(this).data('contact');
        $.get(`/admin/kontak/${contactId}`, function(data) {
            $('#modalName').text(data.name);
            $('#modalEmail').text(data.email);
            $('#modalSubject').text(data.subject);
            $('#modalMessage').text(data.message);
            
            // Mark as read
            if (!data.is_read) {
                $.post(`/admin/kontak/${contactId}/read`);
                location.reload();
            }
        });
    });

    // Handle mark all as read
    $('#markAllRead').click(function() {
        $.post('/admin/kontak/mark-all-read', function() {
            location.reload();
        });
    });

    // Auto-close alerts
    setTimeout(function() {
        $('.alert').alert('close');
    }, 3000);
});
</script>
@endsection