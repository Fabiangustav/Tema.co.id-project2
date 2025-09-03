<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\{
    DashboardController,
    BeritaController,
    BlogController,
    SliderController,
    UserController,
    SettingController,
    AboutController,
    AuthController,
    KontakController,
};

// ====================
// Frontend Routes
// ====================

// Halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Halaman 404
Route::get('/404', function () {
    return view('404');
})->name('404');

// Halaman portofolio detail
Route::get('/portofolio-details', function () {
    return view('portofolio-details');
})->name('portofolio.details');

// Contact Routes (Public)
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact/{region}/{city}', [ContactController::class, 'show'])->name('contact.show');

// Public Resources
Route::resource('regions', RegionsController::class);

// ====================
// Admin Routes
// ====================
Route::prefix('admin')->name('admin.')->group(function () {

    // Auth
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Content Management
    Route::resource('berita', BeritaController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('users', UserController::class);
    Route::resource('kontak', KontakController::class);
    Route::resource('regions', RegionsController::class);

    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings/update', [SettingController::class, 'update'])->name('settings.update');
});
