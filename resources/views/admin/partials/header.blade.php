{{-- resources/views/admin/dashboard/partials/header.blade.php --}}
<div class="dashboard-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="dashboard-title">Dashboard Admin</h1>
            <p class="dashboard-subtitle text-muted">Selamat datang kembali! Berikut ringkasan aktivitas terbaru.</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary btn-sm" id="exportBtn">
                <i class="bi bi-download me-1"></i>Export
            </button>
            <div class="dropdown">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" 
                        data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-plus me-1"></i>Tambah Baru
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-newspaper me-2"></i>Berita Baru</a></li>
                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-journal-text me-2"></i>Blog Post</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-images me-2"></i>Slider Image</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>