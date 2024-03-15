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



Route::get('/seller/evaluation/show', function () {
    return view('seller.evaluation.show');
});

Route::get('/seller/delivery', function () {
    return view('seller.delivery.showList');
});


// Admin Page
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/delivery', function () {
    return view('admin.delivery.deliveryList');
});

Route::get('/admin/assessor/evaluation', function () {
    return view('admin.assessor.evaluation');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/seller/profile/showedit', function () {
    return view('seller.profile.showedit');
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
    return view('customer.profile.profile');
});

Route::get('/customer/payment', function () {
    return view('customer.profile.payment');
});

Route::get('/customer/orderHistory', function () {
    return view('customer.profile.orderHistory');
});

Route::get('/customer/payment/paymentConfirmation', function () {
    return view('customer.payment.paymentConfirmation');
});

Route::get('/inquiry', function () {
    return view('inquiry');
});

Route::get('/search', function () {
    return view('customer.search');
});

