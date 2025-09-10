<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegionsController;
use App\Models\Berita;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Admin\{
    DashboardController,
    BeritaController,
    BlogController,
    SliderController,
    UserController,
    SettingController,
    
    AuthController,
    KontakController,


};

// ====================
// Frontend Routes
// ====================

// Halaman utama


// Halaman 404
Route::get('/404', fn() => view('404'))->name('404');

// Halaman berita detail
Route::get('/ShowBerita', fn() => view('ShowBerita'))->name('ShowBerita');

// Public Resources
Route::resource('regions', RegionsController::class)->only(['index', 'show']);

// ====================
// Admin Routes
// ====================
Route::prefix('admin')->name('admin.')->group(function () {


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
        Route::get('admin', function () {
            return redirect()->route('admin.dashboard.index');
        })->name('dashboard');

        // Content Management - Resources
        Route::resource('berita', BeritaController::class);
        Route::resource('blog', BlogController::class);
        Route::resource('users', UserController::class);
        Route::resource('kontak', KontakController::class)->only(['index', 'show', 'destroy']);

        // Admin Regions (separate from public regions)
        Route::resource('regions', RegionsController::class);

        // Settings
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

    });
    // users
    Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
});

// berita prefix
Route::get('/', [HomeController::class, 'index'])->name('home');
// detail berita (opsional kalau mau baca lebih lanjut tentang berita tertentu)
Route::get('/berita/{slug}', [HomeController::class,'show'])->name('berita.show');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('ShowBlog');
Route::get('/contact/{region}/{city?}', [ContactController::class, 'show'])->name('contact.show');
