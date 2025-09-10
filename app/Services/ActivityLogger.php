<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log;

class ActivityLogger
{
    public static function log($title, $description, $type = null)
    {
        try {
            // pastikan type dikonversi ke string (hindari array/object)
            if (is_array($type) || is_object($type)) {
                $type = json_encode($type);
            }
            $type = (string) ($type ?? '');

            // buat record, return model atau false
            return ActivityLog::create([
                'title'       => $title,
                'description' => $description,
                'type'        => $type,
            ]);
        } catch (\Throwable $e) {
            // catat di laravel.log agar kita bisa lihat kenapa gagal
            Log::error('ActivityLogger::log failed: '.$e->getMessage(), [
                'title' => $title,
                'description' => $description,
                'type' => $type,
                'exception' => $e,
            ]);
            return false;
        }
    }
}
