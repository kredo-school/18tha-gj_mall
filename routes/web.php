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
Auth::routes();

// Note: We might delete later
Route::get('/', function () {
    return view('welcome');
});

// Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Search
Route::get('/search', function () { return view('customer.search'); });
// Product Detail / {product_id}
Route::get('/productDetail', function () { return view('customer.productDetail'); });
// Inquiry
Route::get('/inquiry', function () { return view('inquiry'); });

// Payment
Route::get('/customer/cart', function () { return view('customer.cart'); });

Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
    // Customer Register
    Route::get('register', function () { return view('auth.register'); });

    // Customer Login
    Route::get('signIn', function () { return view('auth.login'); });

    // Profile
    Route::get('profile', function () { return view('customer.profile.profile'); });
  
    Route::get('profile/editProfile', function () {
        return view('customer.profile.profileEdit');
    });
    
    Route::get('profile/orderHistory', function () {
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

Route::get('/admin/managementUser', function () {
    return view('admin.management.managementUser');
});

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
    Route::get('dashboard', [SellerController::class, 'showDashboard'] )->name('dashboard');

    // Seller Profile
    Route::get('profile', function () {
        return view('seller.profile.sellerProfile');
    });

    Route::get('profile/editProfile', function () {
        return view('seller.profile.editProfile');
    });

    // Seller Product
    Route::get('products/dashboard', function () {
        return view('seller.products.dashboard');
    });

    Route::get('products/create', function () {
        return view('seller.products.create');
    });

    Route::get('products/edit', function () {
        return view('seller.products.edit');
    });

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