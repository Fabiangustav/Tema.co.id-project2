{{-- resources/views/admin/dashboard/partials/content-overview.blade.php --}}
<div class="row mb-5">
    <div class="col-12 mb-4 text-center">
        <h4 class="fw-bold">Content Management Overview</h4>
        <p class="text-muted">Ringkasan modul yang tersedia di panel admin</p>
    </div>

    {{-- ==================== BERITA ==================== --}}
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card text-white bg-primary h-100 shadow-sm rounded-3">
            <div class="card-body text-center">
                <i class="bi bi-newspaper display-5 mb-3"></i>
                <h6>Berita Management</h6>
                <p class="small">Kelola semua artikel berita</p>
                <div class="mb-2">
                    <span class="badge bg-light text-dark">{{ $totalBerita }} Posts</span>
                    <span class="badge bg-success">{{ $publishedBerita }} Published</span>
                </div>
                <div>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-light btn-sm">Manage</a>
                    <a href="{{ route('admin.berita.create') }}" class="btn btn-outline-light btn-sm">+ Add</a>
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== BLOG ==================== --}}
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card text-white bg-primary h-100 shadow-sm rounded-3">
            <div class="card-body text-center">
                <i class="bi bi-journal-text display-5 mb-3"></i>
                <h6>Blog Management</h6>
                <p class="small">Kelola blog posts</p>
                <div class="mb-2">
                    <span class="badge bg-light text-dark">{{ $totalBlog }} Posts</span>
                    <span class="badge bg-info">{{ $draftBlog }} Drafts</span>
                </div>
                <div>
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-light btn-sm">Manage</a>
                    <a href="{{ route('admin.blog.create') }}" class="btn btn-outline-light btn-sm">+ Add</a>
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== ABOUT & CONTACT ==================== --}}
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card text-white bg-primary h-100 shadow-sm rounded-3">
            <div class="card-body text-center">
                <i class="bi bi-building display-5 mb-3"></i>
                <h6>About & Contact</h6>
                <p class="small">Info perusahaan & pesan masuk</p>
                <div class="mb-2">
                    <span class="badge bg-light text-dark">{{ $totalMessages }} Messages</span>
                    <span class="badge bg-danger">{{ $newMessages }} New</span>
                </div>
                <div>
                    <a href="{{ route('admin.kontak.index') }}" class="btn btn-light btn-sm">Messages</a>
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== REGIONS ==================== --}}
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card text-white bg-primary h-100 shadow-sm rounded-3">
            <div class="card-body text-center">
                <i class="bi bi-geo-alt display-5 mb-3"></i>
                <h6>Regional Management</h6>
                <p class="small">Kelola wilayah operasional</p>
                <div class="mb-2">
                    <span class="badge bg-light text-dark">{{ $totalRegions }} Regions</span>
                    <span class="badge bg-success">{{ $activeRegions }} Active</span>
                </div>
                <div>
                    <a href="#" class="btn btn-light btn-sm">Manage</a>
                </div>
            </div>
        </div>
    </div>
</div>
