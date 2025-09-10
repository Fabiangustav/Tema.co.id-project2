<div class="dashboard-header mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        {{-- Judul Dashboard --}}
        <h1 class="dashboard-title text-primary m-0 fw-bold">
            Dashboard Admin
        </h1>

        {{-- Dropdown Tambah --}}
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle d-flex align-items-center"
                    type="button" id="addMenu" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-plus-circle me-2"></i> Tambah
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow rounded-3 border-0" aria-labelledby="addMenu">
                <li>
                    <a class="dropdown-item" href="{{ route('admin.berita.create') }}">
                        <i class="bi bi-newspaper me-2"></i> Berita Baru
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('admin.blog.create') }}">
                        <i class="bi bi-journal-text me-2"></i> Blog Post
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i> Keluar
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>