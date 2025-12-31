<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\backend\BillBackendController;
use App\Http\Controllers\backend\UserBackendController;
use App\Http\Controllers\backend\TableBackendController;
use App\Http\Controllers\Frontend\MenuFrontendController;
use App\Http\Controllers\backend\ProductBackendController;
use App\Http\Controllers\Frontend\TableFrontendController;
use App\Http\Controllers\backend\ProductVariantBackendController;


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
    Route::get('/menus/{cart}', [MenuFrontendController::class, 'index'])->name('pages.frontend.menu.index');

    Route::get('/', [TableFrontendController::class, 'index'])->name('choose.table');
    Route::post('/choose-table/{table}', [TableFrontendController::class, 'select'])->name('choose.table.select');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update-qty', [CartController::class, 'updateQty'])->name('cart.updateQty');
    Route::post('/cart/action', [CartController::class, 'ajaxAction'])->name('cart.ajax');
    Route::post('/cart/order', [CartController::class, 'order'])->name('cart.order');




    // BACKEND
    Route::get('/dashboard', function () {
        return view('pages.backend.home.index');
    })->name('dashboard');

    Route::resource('user', UserBackendController::class);
    Route::resource('product', ProductBackendController::class);
    Route::resource('bill', BillBackendController::class);
    Route::resource('table', TableBackendController::class);
    Route::resource('product.variants', ProductVariantBackendController::class)
    ->only(['index','edit', 'store', 'destroy']);
    Route::resource(
    'product.variants',
    \App\Http\Controllers\backend\ProductVariantBackendController::class
);


    Route::get('/h', fn() => view('pages.backend.home.index'));
});
