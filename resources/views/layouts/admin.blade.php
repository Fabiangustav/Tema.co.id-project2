<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> {{-- Penting untuk responsive --}}
    <title>Admin Panel - @yield('title')</title>

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> {{-- pastikan nama file benar --}}

    @stack('styles') {{-- untuk inject CSS tambahan dari child views --}}
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="{{ route('blog.store') }}" class="navbar-brand px-3">Admin Panel</a>
            <a href="{{ url('/') }}" class="btn btn-sm btn-outline-light">Lihat Website</a>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoQlAqV0C3bbz2nD9n60TObc3P1F5z7f7dfV9S9Cq9kfsT4"
        crossorigin="anonymous"></script>

    @stack('scripts') {{-- untuk inject JS tambahan dari child views --}}
</body>
</html>
