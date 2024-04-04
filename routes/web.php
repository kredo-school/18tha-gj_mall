<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\ManagementController;

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
Auth::routes();

// Note: We might delete later
Route::get('/', function () {
    return view('welcome');
});

// Customer Register
Route::get('/customer/register', function () {
    return view('auth.register');
});

// Customer Login
Route::get('/customer/signIn', function () {
    return view('auth.login');
});

// Seller Login
Route::get('/seller/signIn', function () {
    return view('auth.sellerLogin');
});

// Admin Login
Route::get('/admin/signIn', function () {
    return view('auth.adminLogin');
});

// Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Search
Route::get('/search', function () {
    return view('customer.search');
});

// Product Detail / {product_id}
Route::get('/productDetail', function () {
    return view('customer.productDetail');
});

// Profile
Route::get('/customer/profile', function () {
    return view('customer.profile.profile');
});

Route::get('/customer/profile/editProfile', function () {
    return view('customer.profile.profileEdit');
});

Route::get('/customer/profile/orderHistory', function () {
    return view('customer.profile.orderHistory');
});

// Inquiry
Route::get('/inquiry', function () {
    return view('inquiry');
});

// Payment
Route::get('/customer/cart', function () {
    return view('customer.cart');
});

Route::get('/customer/transaction', function () {
    return view('customer.payment.transaction');
});

Route::get('/customer/transaction/confirmation', function () {
    return view('customer.payment.confirmation');
});

// Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// Route::get('/admin/managementUser', function () {
//     return view('admin.management.managementUser');
// });
Route::get('/admin/managementUser', [ManagementController::class, 'index'])->name('admin.managementUser');
Route::post('/admin/store', [ManagementController::class, 'store'])->name('admin.store');
Route::patch('/admin/edit', [ManagementController::class, 'update'])->name('admin.update');



Route::get('/admin/evaluation', function () {
    return view('admin.assessor.evaluation');
});

Route::get('/admin/delivery', function () {
    return view('admin.delivery.deliveryList');
});

Route::get('/admin/customerSupport', function () {
    return view('admin.inquiry.customerSupport');
});

// Seller
Route::get('/seller/dashboard', function () {
    return view('seller.dashboard');
});

// Seller Profile
Route::get('/seller/profile', function () {
    return view('seller.profile.sellerProfile');
});

Route::get('/seller/profile/editProfile', function () {
    return view('seller.profile.editProfile');
});

// Seller Product
Route::get('/seller/products/dashboard', function () {
    return view('seller.products.dashboard');
});

Route::get('/seller/products/create', function () {
    return view('seller.products.create');
});

Route::get('/seller/products/edit', function () {
    return view('seller.products.edit');
});

// Seller Ads
Route::get('/seller/ads/dashboard', function () {
    return view('seller.ads.dashboard');
});

Route::get('/seller/ads/create', function () {
    return view('seller.ads.create');
});

Route::get('/seller/ads/edit', function () {
    return view('seller.ads.edit');
});

// Seller Evaluation
Route::get('/seller/evaluation', function () {
    return view('seller.evaluation.show');
});

Route::get('/seller/delivery', function () {
    return view('seller.delivery.show');
});

Route::get('/seller/customerSupport', function () {
    return view('seller.inquiry.customerSupport');
});

