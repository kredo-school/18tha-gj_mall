<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\SellerLoginController;
use App\Http\Controllers\Users\AdminController;
use App\Http\Controllers\Users\SellerController;
use App\Http\Controllers\Products\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Inquiry
Route::get('/inquiry', function () {
    return view('inquiry');
});

// Payment
Route::get('/customer/cart', function () {
    return view('customer.cart');
});

Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
    // Customer Register
    Route::get('register', function () {
        return view('auth.register');
    });

    // Customer Login
    Route::get('signIn', function () {
        return view('auth.login');
    });

    // Profile
    Route::get('profile', function () {
        return view('customer.profile.profile');
    });

    Route::get('profile/editProfile', function () {
        return view('customer.profile.profileEdit');
    });

    Route::get('profile/orderHistory', function () {
        return view('customer.profile.orderHistory');
    });

    Route::get('transaction', function () {
        return view('customer.payment.transaction');
    });

    Route::get('transaction/confirmation', function () {
        return view('customer.payment.confirmation');
    });
});

Route::group(['prefix' => 'seller', 'as' => 'seller.'], function () {
    Route::get('signIn', [SellerLoginController::class, 'showLoginPage']);
    Route::post('signIn', [SellerLoginController::class, 'signIn'])->name('signIn');

    // Seller
    Route::get('/dashboard', function () {
        return view('seller.dashboard');
    })->name('dashboard');

    // Seller Profile
    Route::get('profile', function () {
        return view('seller.profile.sellerProfile');
    });

    Route::get('profile/editProfile', function () {
        return view('seller.profile.editProfile');
    });

    // Seller Product
    Route::get('products/dashboard', [ProductController::class, 'show'])
        ->name('products.dashboard');

    Route::get('/products/create',  [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('products/store',  [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('products/{id}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::patch('products/{id}/update', [ProductController::class, 'update'])
        ->name('products.update');

    Route::get('products/{id}/delete', [ProductController::class, 'delete'])
        ->name('products.delete');

    Route::delete('products/{id}/destroy', [ProductController::class, 'destroy'])
        ->name('products.destroy');

    Route::delete('products/{image_id}/{product_id}/image/destroy', [ProductController::class, 'imageDestroy'])
        ->name('products.image.destroy');

    // Seller Ads
    Route::get('ads/dashboard', function () {
        return view('seller.ads.dashboard');
    });

    Route::get('ads/create', function () {
        return view('seller.ads.create');
    });

    Route::get('ads/edit', function () {
        return view('seller.ads.edit');
    });

    // Seller Evaluation
    Route::get('evaluation', function () {
        return view('seller.evaluation.show');
    });

    Route::get('delivery', function () {
        return view('seller.delivery.show');
    });

    Route::get('customerSupport', function () {
        return view('seller.inquiry.customerSupport');
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('signIn', [AdminLoginController::class, 'showLoginPage']);
    Route::post('signIn', [AdminLoginController::class, 'signIn'])->name('signIn');

    Route::get('dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');

    Route::get('managementUser', function () {
        return view('admin.management.managementUser');
    });

    Route::get('evaluation', function () {
        return view('admin.assessor.evaluation');
    });

    Route::get('delivery', function () {
        return view('admin.delivery.deliveryList');
    });

    Route::get('customerSupport', function () {
        return view('admin.inquiry.customerSupport');
    });
});
