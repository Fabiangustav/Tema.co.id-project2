<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();

            // Relasi ke region (Wajib ada. Cascade delete supaya ikut terhapus)
            $table->foreignId('region_id')
                  ->constrained('regions')
                  ->cascadeOnDelete();

            // Identitas lokasi/kota
            $table->string('name');           // contoh: Semarang
            $table->string('slug')->unique(); // contoh: semarang
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            // Koordinat titik lokasi
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);

            // Status tampil
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes(); // opsional
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};

