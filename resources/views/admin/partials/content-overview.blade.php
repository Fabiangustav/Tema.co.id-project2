{{-- resources/views/admin/dashboard/partials/content-overview.blade.php --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="card modern-card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-grid me-2"></i>Content Management Overview
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-4" id="contentOverviewContainer">
                    <div class="col-lg-3 col-md-6">
                        <div class="overview-card" data-module="berita">
                            <div class="overview-icon bg-primary">
                                <i class="bi bi-newspaper"></i>
                            </div>
                            <div class="overview-content">
                                <h6>Berita Management</h6>
                                <p class="text-muted small">Kelola semua artikel berita</p>
                                <div class="overview-stats">
                                    <span class="badge bg-primary">{{ $totalBerita }} Posts</span>
                                    <span class="badge bg-success">{{ $publishedBerita }} Published</span>
                                </div>
                            </div>
                            <div class="overview-actions">
                                <div class="btn-group w-100">
                                    <a href="{{ route('admin.berita.index') }}" 
                                       class="btn btn-sm btn-outline-primary">Manage</a>
                                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-split" 
                                            data-bs-toggle="dropdown">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('admin.berita.create') }}">Add New</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.berita.index', ['status' => 'draft']) }}">Drafts</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Analytics</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="overview-card" data-module="blog">
                            <div class="overview-icon bg-success">
                                <i class="bi bi-journal-text"></i>
                            </div>
                            <div class="overview-content">
                                <h6>Blog Management</h6>
                                <p class="text-muted small">Kelola blog posts</p>
                                <div class="overview-stats">
                                    <span class="badge bg-success">{{ $totalBlog }} Posts</span>
                                    <span class="badge bg-info">{{ $draftBlog }} Drafts</span>
                                </div>
                            </div>
                            <div class="overview-actions">
                                <div class="btn-group w-100">
                                    <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-success">Manage</a>
                                    <button type="button" class="btn btn-sm btn-outline-success dropdown-toggle dropdown-toggle-split" 
                                            data-bs-toggle="dropdown">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('blog.index') }}">Add New</a></li>
                                        <li><a class="dropdown-item" href="{{ route('blog.index', ['status' => 'draft']) }}">Drafts</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Categories</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="overview-card" data-module="about-contact">
                            <div class="overview-icon bg-warning">
                                <i class="bi bi-building"></i>
                            </div>
                            <div class="overview-content">
                                <h6>About & Contact</h6>
                                <p class="text-muted small">Info perusahaan & kontak</p>
                                <div class="overview-stats">
                                    <span class="badge bg-warning">{{ $totalMessages }} Messages</span>
                                    <span class="badge bg-danger">{{ $newMessages }} New</span>
                                </div>
                            </div>
                            <div class="overview-actions">
                                <div class="btn-group w-100">
                                    <a href="{{ route('about.edit') }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <button type="button" class="btn btn-sm btn-outline-warning dropdown-toggle dropdown-toggle-split" 
                                            data-bs-toggle="dropdown">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('about.edit') }}">Edit About</a></li>
                                        <li><a class="dropdown-item" href="{{ route('kontak.index') }}">Messages</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="overview-card" data-module="regions">
                            <div class="overview-icon bg-info">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="overview-content">
                                <h6>Regional Management</h6>
                                <p class="text-muted small">Kelola wilayah operasional</p>
                                <div class="overview-stats">
                                    <span class="badge bg-info">{{ $totalRegions }} Regions</span>
                                    <span class="badge bg-success">{{ $activeRegions }} Active</span>
                                </div>
                            </div>
                            <div class="overview-actions">
                                <div class="btn-group w-100">
                                    <a href="{{ route('regions.index') }}" class="btn btn-sm btn-outline-info">Manage</a>
                                    <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle dropdown-toggle-split" 
                                            data-bs-toggle="dropdown">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('regions.create') }}">Add Region</a></li>
                                        <li><a class="dropdown-item" href="{{ route('regions.index', ['status' => 'inactive']) }}">Inactive</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Analytics</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>