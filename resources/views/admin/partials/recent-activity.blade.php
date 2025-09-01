{{-- resources/views/admin/dashboard/partials/recent-activity.blade.php --}}
<div class="col-lg-8">
    <div class="card modern-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-activity me-2"></i>Recent Activity
            </h5>
            <button class="btn btn-sm btn-outline-primary" id="refreshActivityBtn">
                <i class="bi bi-arrow-clockwise"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="activity-timeline" id="activityTimeline">
                @forelse($recentActivities as $activity)
                    <div class="activity-item" data-activity-id="{{ $activity['id'] ?? '' }}">
                        <div class="activity-icon bg-{{ $activity['type'] ?? 'primary' }}">
                            <i class="bi bi-{{ $activity['icon'] ?? 'circle' }}"></i>
                        </div>
                        <div class="activity-content">
                            <h6>{{ $activity['title'] ?? 'Activity' }}</h6>
                            <p class="text-muted">{{ $activity['description'] ?? 'No description' }}</p>
                            <small class="text-muted">{{ $activity['created_at'] ?? 'Just now' }}</small>
                        </div>
                    </div>
                @empty
                    <div class="activity-item" data-activity-id="demo-1">
                        <div class="activity-icon bg-success">
                            <i class="bi bi-plus-circle"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Berita baru ditambahkan</h6>
                            <p class="text-muted">"Tips Menggunakan AI dalam Bisnis" telah dipublikasi</p>
                            <small class="text-muted">2 jam yang lalu</small>
                        </div>
                    </div>
                    
                    <div class="activity-item" data-activity-id="demo-2">
                        <div class="activity-icon bg-primary">
                            <i class="bi bi-pencil"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Blog post diupdate</h6>
                            <p class="text-muted">"Panduan SEO 2025" telah diperbarui</p>
                            <small class="text-muted">4 jam yang lalu</small>
                        </div>
                    </div>
                    
                    <div class="activity-item" data-activity-id="demo-3">
                        <div class="activity-icon bg-warning">
                            <i class="bi bi-image"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Slider diperbarui</h6>
                            <p class="text-muted">Banner promosi baru ditambahkan</p>
                            <small class="text-muted">1 hari yang lalu</small>
                        </div>
                    </div>

                    <div class="activity-item" data-activity-id="demo-4">
                        <div class="activity-icon bg-info">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Region baru ditambahkan</h6>
                            <p class="text-muted">Wilayah Jawa Tengah telah diaktifkan</p>
                            <small class="text-muted">2 hari yang lalu</small>
                        </div>
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-3">
                <button class="btn btn-sm btn-outline-secondary" id="loadMoreActivities">
                    Lihat Lebih Banyak
                </button>
            </div>
        </div>
    </div>
</div>