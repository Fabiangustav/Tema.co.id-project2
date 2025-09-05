<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">

        {{-- Brand / Title --}}
        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
            Admin Panel
        </a>

        {{-- User Dropdown --}}
        <div class="dropdown">
            <button class="btn btn-outline-light d-flex align-items-center" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-2"></i> {{ auth()->user()->name ?? 'Admin' }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li>
                    <a class="dropdown-item" href="{{ route('admin.berita.index', ['id' => auth()->id()]) }}">
                        <i class="bi bi-person me-2"></i> Profile
                </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('admin.settings.index') }}">
                        <i class="bi bi-gear me-2"></i> Settings
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
