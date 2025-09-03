{{-- resources/views/admin/dashboard/partials/quick-actions.blade.php --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="card modern-card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-lightning me-2"></i>Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-3" id="quickActionsContainer">

                    {{-- Tambah Berita --}}
                    <div class="col-md-2 col-6">
                        <a href="{{ route('admin.berita.create') }}" class="quick-action-btn" 
                           data-action="create-berita">
                            <div class="quick-action-icon bg-primary">
                                <i class="bi bi-plus-square"></i>
                            </div>
                            <span>Tambah Berita</span>
                        </a>
                    </div>

                    {{-- Buat Blog (sementara arahkan juga ke berita atau nanti bikin BlogController) --}}
                    <div class="col-md-2 col-6">
                        <a href="{{ route('admin.berita.create') }}" class="quick-action-btn" data-action="create-blog">
                            <div class="quick-action-icon bg-success">
                                <i class="bi bi-journal-plus"></i>
                            </div>
                            <span>Buat Blog</span>
                        </a>
                    </div>

                    {{-- Kelola Slider --}}
                    <div class="col-md-2 col-6">
                        <a href="{{ route('admin.berita.index') }}" class="quick-action-btn" 
                           data-action="manage-slider">
                            <div class="quick-action-icon bg-warning">
                                <i class="bi bi-images"></i>
                            </div>
                            <span>Kelola Slider</span>
                        </a>
                    </div>

                    {{-- Edit About --}}
                    <div class="col-md-2 col-6">
                        <a href="{{ route('admin.blog.index') }}" class="quick-action-btn" 
                           data-action="edit-about">
                            <div class="quick-action-icon bg-info">
                                <i class="bi bi-building"></i>
                            </div>
                            <span>Edit About</span>
                        </a>
                    </div>

                    {{-- Kontak --}}
                    <div class="col-md-2 col-6">
                        <a href="{{ route('admin.kontak.index') }}" class="quick-action-btn" 
                           data-action="manage-contact">
                            <div class="quick-action-icon bg-secondary">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <span>Kontak</span>
                        </a>
                    </div>

                    {{-- Regions --}}
                    <div class="col-md-2 col-6">
                        <a href="{{ route('admin.regions.index') }}" class="quick-action-btn" data-action="manage-regions">
                            <div class="quick-action-icon bg-danger">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <span>Regions</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
