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
    KontakController
};

// Frontend Routes
Route::get('/', function () { 
    return view('home'); 
})->name('home');

Route::get('/404', function () { 
    return view('404'); 
});

Route::get('/portofolio-details', function () { 
    return view('portofolio-details'); 
});

// Contact Routes (Public)
Route::get('/contact', [ContactController::class, 'index'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Public Resources (jika diperlukan)
Route::resource('regions', RegionsController::class);

// Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    
    // Admin Auth Routes
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard (setelah login)
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Content Management Resources
    Route::resource('berita', BeritaController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('users', UserController::class);
    Route::resource('kontak', KontakController::class);
    
    // About Management
    Route::get('about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('about/update', [AboutController::class, 'update'])->name('about.update');
    
    // Settings Management
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings/update', [SettingController::class, 'update'])->name('settings.update');
});