<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('blogs', function (Blueprint $table) {
        // Hapus foreign key dulu
        $table->dropForeign(['author_id']);
        // Baru hapus kolom
        $table->dropColumn('author_id');
    });
}

public function down()
{
    Schema::table('blogs', function (Blueprint $table) {
        $table->unsignedBigInteger('author_id')->nullable();

        // Kalau mau restore foreign key ke users (opsional)
        $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
    });
}

};
