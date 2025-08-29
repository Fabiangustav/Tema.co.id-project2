<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::create('about', function (Blueprint $table) {
    $table->id();
    $table->text('content')->nullable();
    $table->timestamps();
});

