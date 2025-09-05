<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dropdown Test</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
        padding: 50px;
        background: #f5f6fa;
    }

    .dropdown-menu {
        background-color: #fff;
        border-radius: 12px;
        border: 1px solid #e0e0e0;
        padding: 0.5rem 0;
    }

    .dropdown-menu .dropdown-item {
        color: #1976d2;
        font-weight: 500;
        transition: 0.2s;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #e3f2fd;
        color: #0d47a1;
    }

    .dropdown-menu .dropdown-divider {
        margin: 0.4rem 0;
    }
  </style>
</head>
<body>

<div class="dashboard-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="dashboard-title text-primary">Dashboard Admin</h1>
        </div>

        <!-- Dropdown button -->
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-plus-circle me-1"></i> Tambah
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow rounded-3">
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-newspaper me-2"></i> Berita Baru
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-journal-text me-2"></i> Blog Post
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-box-arrow-right me-2"></i> Keluar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
