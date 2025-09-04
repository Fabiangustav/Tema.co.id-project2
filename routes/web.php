<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegionsController;
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
Route::get('/', fn() => view('home'))->name('home');

// Halaman 404
Route::get('/404', fn() => view('404'))->name('404');

// Halaman portofolio detail
Route::get('/portofolio-details', fn() => view('portofolio-details'))->name('portofolio.details');

// Contact Routes (Public)
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact/{region}/{city}', [ContactController::class, 'show'])->name('contact.show');

// Public Resources
Route::resource('regions', RegionsController::class)->only(['index', 'show']);

// ====================
// Admin Routes
// ====================
Route::prefix('admin')->name('admin.')->group(function () {

    Route::resource('berita', BeritaController::class);

    // Auth Routes (Guest only) pakai guard admin
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.post');
    });

    // Protected Admin Routes (Auth required) pakai guard admin
    Route::middleware('auth:admin')->group(function () {

        // Logout
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        // Redirect /admin langsung ke dashboard
        Route::get('/', function () {
            return redirect()->route('admin.dashboard.index');
        })->name('dashboard');

        // Content Management - Resources
        Route::resource('blog', BlogController::class);
        Route::resource('users', UserController::class);
        Route::resource('kontak', KontakController::class)->only(['index', 'show', 'destroy']);

        // Admin Regions (separate from public regions)
        Route::resource('regions', RegionsController::class);

        // Settings
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

        // Slider
        Route::get('slider', [SliderController::class, 'index'])->name('slider.index');
    });
});

