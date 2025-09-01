<?php
@extends('admin')
<title>Admin Panel - @yield('title')</title>
...
@yield('content')
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a href="{{ route('dashboard') }}" class="navbar-brand px-3">Admin Panel</a>
        <a href="{{ url('/') }}" class="btn btn-sm btn-outline-light">Lihat Website</a>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
?>