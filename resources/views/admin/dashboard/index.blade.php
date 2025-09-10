@extends('layouts.admin')

@section('title', 'Dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/statistics.css') }}">
    <link rel="stylesheet" href="{{ asset('css/activity-timeline.css') }}">
@endsection

@section('content')
    {{-- Dashboard Header --}}
    @include('admin.partials.header')

    {{-- Quick Actions --}}
    @include('admin.partials.quick-actions')

    {{-- Recent Activity --}}
    <div class="row mb-4">
        @include('admin.partials.recent-activity', [
            'recentActivities' => $recentActivities ?? [],
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
        'activeRegions' => $activeRegions ?? 6,
    ])
@endsection

@section('scripts')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/statistics.js') }}"></script>
    <script src="{{ asset('js/activity-timeline.js') }}"></script>
@endsection
