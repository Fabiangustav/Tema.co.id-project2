<?php
// app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\User;
use App\Models\ActivityLog; // ✅ tambahkan
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Paksa clear cache dulu
        Cache::forget('admin.dashboard.data');

        // Simpan cache baru selama 1 menit (60 detik)
        $dashboardData = Cache::remember('admin.dashboard.data', 60, function () {
            return $this->getDashboardData();
        });

        // Kirim ke view
        return view('admin.dashboard.index', $dashboardData);
    }

    private function getDashboardData()
    {
        return [
            'publishedBerita'  => Berita::count(),
            'draftBlog'        => Blog::count(),
            'newMessages'      => Contact::where('is_read', false)->count(),

            // ✅ ambil 5 activity log terbaru
            'recentActivities' => ActivityLog::latest()->get(),

            'monthlyStats'     => $this->getMonthlyStats(),
        ];
    }

    private function getMonthlyStats()
    {
        $currentMonth = Carbon::now()->startOfMonth();
        $lastMonth = Carbon::now()->subMonth()->startOfMonth();

        return [
            'berita' => [
                'current'  => Berita::where('created_at', '>=', $currentMonth)->count(),
                'previous' => Berita::whereBetween('created_at', [$lastMonth, $currentMonth])->count(),
            ],
            'blog' => [
                'current'  => Blog::where('created_at', '>=', $currentMonth)->count(),
                'previous' => Blog::whereBetween('created_at', [$lastMonth, $currentMonth])->count(),
            ],
            'messages' => [
                'current'  => Contact::where('created_at', '>=', $currentMonth)->count(),
                'previous' => Contact::whereBetween('created_at', [$lastMonth, $currentMonth])->count(),
            ],
        ];
    }

    public function refreshCache()
    {
        Cache::forget('admin.dashboard.data');
        return response()->json([
            'success' => true,
            'message' => 'Dashboard cache refreshed successfully'
        ]);
    }
}
