<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\BillBackendController;
use App\Http\Controllers\backend\UserBackendController;
use App\Http\Controllers\backend\OptionBackendController;
use App\Http\Controllers\Frontend\HomeFrontendController;
use App\Http\Controllers\backend\ProductBackendController;
use App\Http\Controllers\Auth\LoginController;


// =========================
// AUTH
// =========================
Route::get('/login',  [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// =========================
// PROTECTED (Frontend & Backend)
// =========================
Route::middleware('authUser')->group(function () {

    // FRONTEND HOME (waiter)
    Route::get('/', [HomeFrontendController::class, 'index'])->name('home.frontend');

    // BACKEND
    Route::get('/dashboard', function () {
        return view('pages.backend.home.index');
    })->name('dashboard');

    Route::resource('user', UserBackendController::class);
    Route::resource('product', ProductBackendController::class);
    Route::resource('option', OptionBackendController::class);
    Route::resource('bill', BillBackendController::class);

    Route::get('/h', fn() => view('pages.backend.home.index'));
});
