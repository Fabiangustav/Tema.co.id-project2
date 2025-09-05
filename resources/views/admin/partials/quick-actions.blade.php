<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

{{-- resources/views/admin/dashboard/partials/quick-actions.blade.php --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow rounded-4 border-0">
            <div class="card-header bg-primary text-white rounded-top-4">
                <h5 class="mb-0">
                    <i class="bi bi-lightning-charge-fill me-2"></i> Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-4 text-center" id="quickActionsContainer">

                    {{-- Tambah Berita --}}
                    <div class="col-md-3 col-6">
                        <a href="{{ route('admin.berita.create') }}" class="quick-action-btn d-block p-3 rounded-4 bg-light shadow-sm h-100">
                            <div class="quick-action-icon bg-primary text-white mx-auto mb-2 rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
                                <i class="bi bi-newspaper fs-4"></i>
                            </div>
                            <span class="fw-semibold text-dark">Tambah Berita</span>
                        </a>
                    </div>

                    {{-- Buat Blog --}}
                    <div class="col-md-3 col-6">
                        <a href="{{ route('admin.blog.create') }}" class="quick-action-btn d-block p-3 rounded-4 bg-light shadow-sm h-100">
                            <div class="quick-action-icon bg-success text-white mx-auto mb-2 rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
                                <i class="bi bi-pencil-square fs-4"></i>
                            </div>
                            <span class="fw-semibold text-dark">Buat Blog</span>
                        </a>
                    </div>

                    {{-- Edit Blog --}}
                    <div class="col-md-3 col-6">
                        <a href="{{ route('admin.blog.index') }}" class="quick-action-btn d-block p-3 rounded-4 bg-light shadow-sm h-100">
                            <div class="quick-action-icon bg-info text-white mx-auto mb-2 rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
                                <i class="bi bi-pencil fs-4"></i>
                            </div>
                            <span class="fw-semibold text-dark">Edit Blog</span>
                        </a>
                    </div>

                    {{-- Regions --}}
                    <div class="col-md-3 col-6">
                        <a href="{{ route('admin.regions.index') }}" class="quick-action-btn d-block p-3 rounded-4 bg-light shadow-sm h-100">
                            <div class="quick-action-icon bg-danger text-white mx-auto mb-2 rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
                                <i class="bi bi-map fs-4"></i>
                            </div>
                            <span class="fw-semibold text-dark">Regions</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
