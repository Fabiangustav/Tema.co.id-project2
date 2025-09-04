<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();

            // Nama wilayah & kode unik (slug/short code)
            $table->string('name');
            $table->string('code')->unique();   // contoh: jawa-tengah, jkt, etc.

            // Koordinat pusat region (boleh null kalau belum diisi)
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Status untuk show/hide di frontend
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes(); // opsional, berguna untuk arsip tanpa benar2 menghapus
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};

