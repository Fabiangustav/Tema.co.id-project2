<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Panel')</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.sliders.index') }}">Slider</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.berita.index') }}">Berita</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.blog.index') }}">Blog</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.kontak.index') }}">Kontak</a></li>
    </ul>
  </nav>

  <div class="container mt-4">
    @yield('content')
  </div>
</body>
</html>
