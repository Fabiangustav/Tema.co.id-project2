<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Berita;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // share $beritas ke semua view yang butuh
        View::composer('components.berita', function ($view) {
            $view->with('beritas', Berita::where('status', 'published')->latest());
        });
    }
}

