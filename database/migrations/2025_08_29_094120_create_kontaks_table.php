<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('name');                // Nama pengirim
            $table->string('email');               // Email pengirim
            $table->string('phone')->nullable();   // Nomor telepon (opsional)
            $table->string('subject');             // Subjek pesan
            $table->text('message');               // Isi pesan
            $table->string('region')->nullable();  // Wilayah/region
            $table->enum('priority', ['normal', 'high', 'urgent'])->default('normal'); 
            $table->boolean('is_read')->default(false); // Status pesan sudah dibaca/belum
            $table->timestamps();                  // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
