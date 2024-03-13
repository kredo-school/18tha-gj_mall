<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/seller/evaluation', function () {
    return view('seller.evaluation');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/seller/profile/showedit', function () {
    return view('seller.profile.showedit');
});

Route::get('/seller/products/dashboard', function () {
    return view('seller.products.dashboard');
});

Route::get('/customer/profile/showedit', function () {
    return view('customer.profile');
});

Route::get('/customer/payment', function () {
    return view('customer.payment');
});

Route::get('/seller/ads/create', function () {
    return view('seller.ads.create');
});

Route::get('/seller/ads/edit', function () {
    return view('seller.ads.edit');
});

