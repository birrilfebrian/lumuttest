<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AuthMiddleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'loginForm'])->name('loginForm');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
Route::post('/akun', [HomeController::class, 'login'])->name('login');
Route::get('/post/{id}', [HomeController::class, 'show'])->name('post.show');


Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/account/store', [DashboardController::class, 'storeAccount'])->name('account.store');
    Route::post('/post/store', [DashboardController::class, 'storeAccount'])->name('post.store');
    Route::resource('accounts', AccountController::class);
    Route::resource('posts', PostController::class);
});
