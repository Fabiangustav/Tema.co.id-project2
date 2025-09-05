<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top w-100 m-0">
    <div class="container-fluid px-3">
        {{-- Brand --}}
        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
            Admin Panel
        </a>

        {{-- User Dropdown --}}
        <div class="dropdown ms-auto">
            <button class="btn btn-outline-light d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-2"></i> {{ auth()->user()->name ?? 'Admin' }}
            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow">
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
