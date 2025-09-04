{{-- resources/views/admin/dashboard/partials/statistics.blade.php --}}
<div class="row mb-4" id="statisticsContainer">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stat-card" data-stat="berita">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-icon bg-primary">
                            <i class="bi bi-newspaper"></i>
                        </div>
                        <h3 class="stat-number" data-target="{{ $totalBerita }}">0</h3>
                        <p class="stat-label">Total Berita</p>
                        <span class="badge stat-badge bg-success">
                            <i class="bi bi-arrow-up"></i> +12.5%
                        </span>
                    </div>
                    <div class="progress-circle" data-progress="80">
                        <svg class="progress-ring" width="60" height="60">
                            <circle class="progress-ring-circle" stroke="#4facfe" stroke-width="4" 
                                    fill="transparent" r="26" cx="30" cy="30"></circle>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stat-card" data-stat="blog">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-icon bg-success">
                            <i class="bi bi-journal-text"></i>
                        </div>
                        <h3 class="stat-number" data-target="{{ $totalBlog }}">0</h3>
                        <p class="stat-label">Blog Posts</p>
                        <span class="badge stat-badge bg-info">
                            <i class="bi bi-arrow-up"></i> +8.3%
                        </span>
                    </div>
                    <div class="progress-circle" data-progress="65">
                        <svg class="progress-ring" width="60" height="60">
                            <circle class="progress-ring-circle" stroke="#00ff88" stroke-width="4" 
                                    fill="transparent" r="26" cx="30" cy="30"></circle>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stat-card" data-stat="regions">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-icon bg-info">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h3 class="stat-number" data-target="{{ $totalRegions }}">0</h3>
                        <p class="stat-label">Active Regions</p>
                        <span class="badge stat-badge bg-success">
                            <i class="bi bi-arrow-up"></i> +2 baru
                        </span>
                    </div>
                    <div class="progress-circle" data-progress="75">
                        <svg class="progress-ring" width="60" height="60">
                            <circle class="progress-ring-circle" stroke="#a55eea" stroke-width="4" 
                                    fill="transparent" r="26" cx="30" cy="30"></circle>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>