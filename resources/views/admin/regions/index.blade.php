@extends('layouts.admin')

@section('title', 'Manage Regions')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Region Management</h2>
        <a href="{{ route('admin.regions.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Region
        </a>
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
                            <th>Code</th>
                            <th>Cities/Areas</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($regions as $region)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-geo-alt text-info me-2"></i>
                                        {{ $region->name }}
                                    </div>
                                </td>
                                <td><code>{{ $region->code }}</code></td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $region->cities_count }} Cities
                                    </span>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" 
                                               class="form-check-input toggle-status" 
                                               data-region-id="{{ $region->id }}"
                                               {{ $region->is_active ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>{{ $region->updated_at->format('d M Y H:i') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.regions.edit', $region) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{ route('admin.regions.show', $region) }}" 
                                           class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.regions.destroy', $region) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Are you sure? This will also delete all associated cities.')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No regions found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $regions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Handle status toggle
    $('.toggle-status').change(function() {
        const regionId = $(this).data('region-id');
        const isActive = $(this).prop('checked');

        $.ajax({
            url: `/admin/regions/${regionId}/toggle-status`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                is_active: isActive
            },
            success: function(response) {
                toastr.success('Region status updated successfully');
            },
            error: function() {
                toastr.error('Failed to update region status');
                // Revert toggle if failed
                $(this).prop('checked', !isActive);
            }
        });
    });

    // Auto-close alerts
    setTimeout(function() {
        $('.alert').alert('close');
    }, 3000);
});
</script>
@endsection

@section('styles')
<style>
.table td {
    vertical-align: middle;
}

.form-switch {
    margin-bottom: 0;
}

.form-check-input:checked {
    background-color: #198754;
    border-color: #198754;
}
</style>
@endsection