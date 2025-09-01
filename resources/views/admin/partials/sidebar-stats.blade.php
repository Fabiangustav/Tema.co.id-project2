{{-- resources/views/admin/dashboard/partials/sidebar-stats.blade.php --}}
<div class="col-lg-4">
    {{-- Regional Performance --}}
    <div class="card modern-card mb-4">
        <div class="card-header">
            <h6 class="mb-0">
                <i class="bi bi-geo me-2"></i>Regional Performance
            </h6>
        </div>
        <div class="card-body" id="regionalPerformance">
            @php
                $regions = [
                    ['name' => 'West Java', 'progress' => 85, 'color' => 'success'],
                    ['name' => 'NTB', 'progress' => 67, 'color' => 'warning'],
                    ['name' => 'Jakarta', 'progress' => 95, 'color' => 'primary'],
                    ['name' => 'Bali', 'progress' => 45, 'color' => 'danger']
                ];
            @endphp
            
            @foreach($regions as $index => $region)
                <div class="region-item mb-3" data-region="{{ $region['name'] }}">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small">{{ $region['name'] }}</span>
                        <span class="small text-{{ $region['color'] }}" 
                              data-progress="{{ $region['progress'] }}">{{ $region['progress'] }}%</span>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-{{ $region['color'] }} region-progress-bar" 
                             data-target="{{ $region['progress'] }}"
                             style="width: 0%"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- System Status --}}
    <div class="card modern-card">
        <div class="card-header">
            <h6 class="mb-0">
                <i class="bi bi-speedometer me-2"></i>System Status
                <span class="badge bg-success ms-2" id="systemStatusBadge">Online</span>
            </h6>
        </div>
        <div class="card-body" id="systemStatus">
            <div class="system-stat mb-3" data-stat="server-load">
                <div class="d-flex justify-content-between mb-1">
                    <span class="small">Server Load</span>
                    <span class="small text-success system-value" data-value="45">45%</span>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success system-progress-bar" 
                         data-target="45" style="width: 0%"></div>
                </div>
            </div>
            
            <div class="system-stat mb-3" data-stat="memory-usage">
                <div class="d-flex justify-content-between mb-1">
                    <span class="small">Memory Usage</span>
                    <span class="small text-warning system-value" data-value="67">67%</span>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-warning system-progress-bar" 
                         data-target="67" style="width: 0%"></div>
                </div>
            </div>
            
            <div class="system-stat" data-stat="storage">
                <div class="d-flex justify-content-between mb-1">
                    <span class="small">Storage</span>
                    <span class="small text-info system-value" data-value="23">23%</span>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-info system-progress-bar" 
                         data-target="23" style="width: 0%"></div>
                </div>
            </div>
            
            <div class="mt-3 pt-3 border-top">
                <div class="row text-center">
                    <div class="col-6">
                        <h6 class="text-success mb-0" id="uptimeValue" data-target="99.8">0%</h6>
                        <small class="text-muted">Uptime</small>
                    </div>
                    <div class="col-6">
                        <h6 class="text-primary mb-0" id="responseValue" data-target="1.2">0s</h6>
                        <small class="text-muted">Response</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>