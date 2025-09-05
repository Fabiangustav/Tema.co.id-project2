{{-- resources/views/admin/dashboard/partials/recent-activity.blade.php --}}
<div class="col-lg-12">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center px-4 py-3 rounded-top-4">
            <div class="d-flex align-items-center">
                <i class="bi bi-activity me-2 fs-5"></i>
                <h5 class="mb-0 fw-bold">Recent Activity</h5>
            </div>
            <div class="d-flex gap-2">
                <select class="form-select form-select-sm border-0 shadow-sm" style="width: auto;">
                    <option value="all">Semua</option>
                    <option value="berita">Berita</option>
                    <option value="blog">Blog</option>
                    <option value="region">Regions</option>
                </select>
                <button class="btn btn-sm btn-light text-primary shadow-sm" id="refreshActivityBtn">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>
        </div>

        <!-- Body -->
        <div class="card-body p-4" style="max-height: 400px; overflow-y: auto;">
            <div class="activity-timeline" id="activityTimeline">
                @forelse($recentActivities as $activity)
                    <div class="activity-item d-flex align-items-start mb-4 p-3 rounded-3 shadow-sm border bg-light"
                         data-activity-id="{{ $activity['id'] ?? '' }}">
                        <div class="activity-icon rounded-circle bg-{{ $activity['type'] ?? 'primary' }}
                                    d-flex align-items-center justify-content-center me-3 flex-shrink-0"
                             style="width: 55px; height: 55px;">
                            <i class="bi bi-{{ $activity['icon'] ?? 'circle' }} text-white fs-5"></i>
                        </div>
                        <div class="activity-content flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <h6 class="fw-semibold mb-1">{{ $activity['title'] ?? 'Activity' }}</h6>
                                <span class="badge bg-light text-muted small">
                                    {{ $activity['created_at'] ?? 'Just now' }}
                                </span>
                            </div>
                            <p class="text-muted small mb-2">{{ $activity['description'] ?? 'No description' }}</p>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i> Detail
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-4">
                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                        Belum ada aktivitas terbaru
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer bg-light text-center py-3 rounded-bottom-4">
            <button class="btn btn-sm btn-outline-primary shadow-sm" id="loadMoreActivities">
                <i class="bi bi-chevron-down"></i> Lihat Lebih Banyak
            </button>
        </div>
    </div>
</div>
