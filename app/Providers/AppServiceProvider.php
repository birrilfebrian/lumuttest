<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    public function boot(): void
    {
        Route::middleware('auth')->group(function () {
            // Redirect jika belum login
            Route::get('/dashboard', function () {
                return view('index');
            });
        });

        // Atur halaman login jika user belum logi
    }
}
