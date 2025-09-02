<?php
// app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Blog;
use App\Models\Slider;
use App\Models\Contact;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Get cached dashboard data or compute if not cached
        $dashboardData = Cache::remember('admin.dashboard.data', 300, function () {
            return $this->getDashboardData();
        });

        return view('admin.dashboard.index', $dashboardData);
    }

    /**
     * Get all dashboard data
     */
    private function getDashboardData()
    {
        return [
            // Basic statistics
            'totalBerita' => Berita::count(),
            'totalBlog' => Blog::count(),
            'totalSlider' => Slider::count(),
            'totalMessages' => Contact::count(),

            // Content Status
            'publishedBerita' => Berita::where('status', 'published')->count(),
            'draftBlog' => Blog::where('status', 'draft')->count(),
            'newMessages' => Contact::where('is_read', false)->count(),

            // Recent Activities
            'recentActivities' => $this->getRecentActivities(),

            // Analytics
            'monthlyStats' => $this->getMonthlyStats(),
        ];


    }


    private function getRecentActivities($limit = 5)
    {
        return collect([
            [
                'type' => 'success',
                'icon' => 'plus-circle',
                'title' => 'Berita baru ditambahkan',
                'description' => 'Berita terbaru telah dipublikasi',
                'created_at' => Carbon::now()->subHours(2)->diffForHumans(),
                'user' => 'Admin'
            ],
            [
                'type' => 'primary',
                'icon' => 'pencil',
                'title' => 'Blog post diupdate',
                'description' => 'Blog post telah diperbarui',
                'created_at' => Carbon::now()->subHours(4)->diffForHumans(),
                'user' => 'Editor'
            ],
            [
                'type' => 'warning',
                'icon' => 'image',
                'title' => 'Slider diperbarui',
                'description' => 'Banner baru ditambahkan',
                'created_at' => Carbon::now()->subDay()->diffForHumans(),
                'user' => 'Admin'
            ]
        ]);
    }

    private function getMonthlyStats()
    {
        $currentMonth = Carbon::now()->startOfMonth();
        $lastMonth = Carbon::now()->subMonth()->startOfMonth();

        return [
            'berita' => [
                'current' => Berita::where('created_at', '>=', $currentMonth)->count(),
                'previous' => Berita::whereBetween('created_at', [$lastMonth, $currentMonth])->count(),
            ],
            'blog' => [
                'current' => Blog::where('created_at', '>=', $currentMonth)->count(),
                'previous' => Blog::whereBetween('created_at', [$lastMonth, $currentMonth])->count(),
            ],
            'messages' => [
                'current' => Contact::where('created_at', '>=', $currentMonth)->count(),
                'previous' => Contact::whereBetween('created_at', [$lastMonth, $currentMonth])->count(),
            ],
        ];
    }

    /**
     * Refresh dashboard cache
     */
    public function refreshCache()
    {
        Cache::forget('admin.dashboard.data');
        return response()->json([
            'success' => true,
            'message' => 'Dashboard cache refreshed successfully'
        ]);
    }
}
