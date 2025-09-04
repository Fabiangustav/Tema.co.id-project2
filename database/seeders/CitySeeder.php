<?php

namespace Database\Seeders; // <--- wajib ada

use App\Models\City;
use App\Models\Region;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $jateng  = Region::where('code', 'jawa-tengah')->first();
        $jakarta = Region::where('code', 'jakarta')->first();

        City::query()->upsert([
            ['region_id' => $jateng->id,  'name' => 'Semarang', 'slug' => 'semarang', 'address' => 'Semarang', 'latitude' => -6.9666670, 'longitude' => 110.4166640, 'is_active' => true],
            ['region_id' => $jakarta->id, 'name' => 'Jakarta Pusat', 'slug' => 'jakarta-pusat', 'address' => 'Jakarta', 'latitude' => -6.1864860, 'longitude' => 106.8340910, 'is_active' => true],
        ], ['slug']);
    }
}
