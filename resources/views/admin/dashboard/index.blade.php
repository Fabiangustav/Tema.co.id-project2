@extends('layouts.admin') {{-- panggil layout sekali saja --}} {{-- panggil layout sekali saja --}}
@section('title', 'Dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/statistics.css') }}">
    <link rel="stylesheet" href="{{ asset('css/activity-timeline.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        {{-- Dashboard Header --}}
        @include('admin.partials.header')

        {{-- Statistics Cards --}}
        @include('admin.partials.statistics', [
            'totalBerita' => $totalBerita ?? 145,
            'totalBlog' => $totalBlog ?? 89,
            'totalSlider' => $totalSlider ?? 12,
            'totalRegions' => $totalRegions ?? 8
        ])

        {{-- Quick Actions --}}
        @include('admin.partials.quick-actions')

        {{-- Main Content Row --}}
        <div class="row mb-4">
            {{-- Recent Activity --}}
            @include('admin.partials.recent-activity', [
                'recentActivities' => $recentActivities ?? []
            ])
        </div>

        {{-- Content Management Overview --}}
        @include('admin.partials.content-overview', [
            'totalBerita' => $totalBerita ?? 145,
            'publishedBerita' => $publishedBerita ?? 120,
            'totalBlog' => $totalBlog ?? 89,
            'draftBlog' => $draftBlog ?? 12,
            'totalMessages' => $totalMessages ?? 24,
            'newMessages' => $newMessages ?? 5,
            'totalRegions' => $totalRegions ?? 8,
            'activeRegions' => $activeRegions ?? 6
        ])
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/statistics.js') }}"></script>
    <script src="{{ asset('js/activity-timeline.js') }}"></script>
@endsection
