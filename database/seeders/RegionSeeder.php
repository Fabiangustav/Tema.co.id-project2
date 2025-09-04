<?php

namespace Database\Seeders; // <--- wajib ada

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        Region::query()->upsert([
            ['name' => 'Jawa Tengah', 'code' => 'jawa-tengah', 'latitude' => -7.1509750, 'longitude' => 110.1402590, 'is_active' => true],
            ['name' => 'DKI Jakarta',  'code' => 'jakarta', 'latitude' => -6.2000000, 'longitude' => 106.8166660, 'is_active' => true],
        ], ['code']);
    }
}
