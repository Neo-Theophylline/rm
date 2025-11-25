<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\BillBackendController;
use App\Http\Controllers\backend\UserBackendController;
use App\Http\Controllers\backend\OptionBackendController;
use App\Http\Controllers\backend\ProductBackendController;

Route::get('/', function () {
    return view('pages.frontend.home');
});

Route::get('/h', function () {
    return view('pages.backend.home.index');
});
Route::get('/useredit', function () {
    return view('pages.backend.user.edit');
});
Route::get('/usershow', function () {
    return view('pages.backend.user.show');
}); 
Route::get('/productedit', function () {
    return view('pages.backend.product.edit');
});
Route::get('/productshow', function () {
    return view('pages.backend.product.show');
});
Route::get('/optionedit', function () {
    return view('pages.backend.option.edit');
});
Route::get('/billshow', function () {
    return view('pages.backend.bill.show');
});

Route::resource('user', UserBackendController::class);
Route::resource('product', ProductBackendController::class);
Route::resource('option', OptionBackendController::class);
Route::resource('bill', BillBackendController::class);