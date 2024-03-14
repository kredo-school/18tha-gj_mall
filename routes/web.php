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

Route::get('/seller/evaluation/show', function () {
    return view('seller.evaluation.show');
});

Route::get('/admin/assessor/evaluation', function () {
    return view('admin.assessor.evaluation');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/seller/profile/showEdit', function () {
    return view('seller.profile.showEdit');
});

Route::get('/seller/products/dashboard', function () {
    return view('seller.products.dashboard');
});

Route::get('/seller/products/create', function () {
    return view('seller.products.create');
});

Route::get('/seller/products/edit', function () {
    return view('seller.products.edit');
});

Route::get('/customer/profile/showedit', function () {
    return view('customer.profile');
});


Route::get('/customer/payment', function () {
    return view('customer.payment');
});

Route::get('/customer/orderHistory', function () {
    return view('customer.orderHistory');
});
