<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    /**
     * Simpan log baru (dipanggil dari controller lain)
     */
    public static function storeLog($title, $description, $type = 'info')
    {
        ActivityLog::create([
            'title'       => $title,
            'description' => $description,
            'type'        => $type,
            'user'        => auth()->check() ? auth()->user()->name : 'admin',
        ]);
    }

    /**
     * Tampilkan semua log (opsional, kalau mau dilihat di dashboard)
     */
    public function index()
    {
        $logs = ActivityLog::latest()->paginate(10);
        return view('admin.partials.recent-activity', compact('logs'));
    }
}
