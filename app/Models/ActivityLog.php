<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = [
        'title',
        'description',
        'type',
        'user',
    ];

    public $timestamps = true;

    // Icon berdasarkan tipe
    public function getIconAttribute()
    {
        return match ($this->type) {
            'berita' => 'file-earmark-text',
            'blog'   => 'pencil-square',
            'region' => 'map',
            default  => 'circle',
        };
    }

    // Warna berdasarkan tipe
    public function getColorAttribute()
    {
        return match ($this->type) {
            'berita' => 'primary',
            'blog'   => 'success',
            'region' => 'danger',
            default  => 'secondary',
        };
    }
}
