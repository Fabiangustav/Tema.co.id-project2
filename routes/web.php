<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\KontakController;

// Halaman statis
Route::get('/', function () {
    return view('home');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
});


Route::get('/404', function () {
    return view('404');
});

Route::get('/portofolio-details', function () {
    return view('portofolio-details');
});

// Halaman contact (dynamic pakai controller)
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Kalau kamu butuh versi dynamic pakai parameter
Route::get('/contact/{region}/{city?}', [ContactController::class, 'show'])->name('contact.show');

// Group Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('berita', BeritaController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('kontak', KontakController::class);

    // About
    Route::get('/about/edit', [App\Http\Controllers\Admin\AboutController::class, 'edit'])->name('about.edit');
    Route::post('/about/update', [App\Http\Controllers\Admin\AboutController::class, 'update'])->name('about.update');
});

