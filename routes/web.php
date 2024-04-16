<?php



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\Orders\CartController;
use App\Http\Controllers\Products\AdController;
use App\Http\Controllers\Users\AdminController;
use App\Http\Controllers\Users\ReviewController;
use App\Http\Controllers\Users\SellerController;

use App\Http\Controllers\Users\CustomerController;
use App\Http\Controllers\Users\FavoriteController;

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\SellerLoginController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Inquiries\InquiryController;
use App\Http\Controllers\Products\EvaluationController;
use App\Http\Controllers\Inquiries\CustomerSupportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

Auth::routes();

// Note: We might delete later
Route::get('/', function () {
    return view('welcome');
});

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home');
//Search
Route::get('/search', [HomeController::class, 'search'])->name('search');
// Product Detail / {product_id}

Route::get('/productDetail/{id}', [ProductController::class, 'showProductDetail'])->name('productDetail');
Route::get('/productDetail', function () {
    return view('customer.productDetail');
});

// Inquiry
Route::get('/inquiry', [InquiryController::class, 'index'])->name('inquiry');
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');

Route::get('/profile/{seller_id}', [SellerController::class, 'showProfile'])->name('seller.profile');

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

    // Order History
    Route::get('profile/orderHistory/{id}', [CustomerController::class, 'showOrderHistory'])->name('showOrderHistory');

    // Profile
    Route::get('profile/{id}', [CustomerController::class, 'showProfile'])->name('profile');

    Route::get('profile/editProfile/{id}', [CustomerController::class, 'showEditProfile'])->name('showEditProfile');
    Route::patch('profile/update/{customer_id}/{address_id}/{payment_id}', [CustomerController::class, 'update'])->name('updateProfile');

    Route::get('profile', function () {
        return view('customer.profile.profile');
    });

    Route::get('profile/editProfile', function () {
        return view('customer.profile.profileEdit');
    });

    Route::get('profile/orderHistory', function () {
        return view('customer.profile.orderHistory');
    });

    // Cart
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
    Route::get('/back', [CartController::class, 'back'])->name('back');
    Route::get('/cart/update', [CartController::class, 'update']);
    Route::get('/deleteItem/{id}', [CartController::class, 'destroy'])->name('cart.deleteItem');
    Route::post('/payment/transaction', [CartController::class, 'checkOut'])->name('transaction');
});

Route::group(['prefix' => 'seller', 'as' => 'seller.'], function () {
    // Seller
    Route::get('signIn', [SellerLoginController::class, 'showLoginPage']);
    Route::post('signIn', [SellerLoginController::class, 'signIn'])->name('signIn');

    Route::get('/dashboard', function () {
        return view('seller.dashboard');
    })->name('dashboard');

    // Seller Profile
    Route::get('profile', function () {
        return view('seller.profile.sellerProfile');
    });

    Route::get('profile/editProfile', [SellerController::class, 'show'])
        ->name('profile.editProfile');

    Route::patch('profile/updateProfile', [SellerController::class, 'update'])
        ->name('profile.updateProfile');

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

    Route::delete('products/{i_id}/{p_id}/image/destroy', [ProductController::class, 'imageDestroy'])
        ->name('products.image.destroy');

    // Seller Ads
    Route::get('/ads/dashboard', [AdController::class, 'show'])
        ->name('ads.dashboard');

    Route::get('ads/create', [AdController::class, 'create'])
        ->name('ads.create');

    Route::post('ads/store', [AdController::class, 'store'])
        ->name('ads.store');

    Route::get('ads/{id}/edit', [AdController::class, 'edit'])
        ->name('ads.edit');

    Route::patch('ads/{id}/update', [AdController::class, 'update'])
        ->name('ads.update');

    Route::patch('ads/{id}/delete', [AdController::class, 'delete'])
        ->name('ads.delete');

    Route::delete('ads/{id}/destroy', [AdController::class, 'destroy'])
        ->name('ads.destroy');

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

    // Management User
    Route::get('/managementUser', [AdminController::class, 'index'])->name('managementUser'); //admin.managementUser
    Route::post('/store', [AdminController::class, 'store'])->name('store'); // admin.store
    Route::patch('/{id}/update', [AdminController::class, 'update'])->name('update'); //admin.update
    Route::delete('/{id}/destroy', [AdminController::class, 'destroy'])->name('destroy'); //admin.destroy

    // Customer Support
    Route::get('/customerSupport', [CustomerSupportController::class, 'index'])->name('customerSupport'); //admin.customerSupport
    Route::patch('/customerSupport/{id}/update', [CustomerSupportController::class, 'update'])->name('customerSupport.update'); //admin.customerSupport.update
    Route::delete('customerSupport/{id}/destroy', [CustomerSupportController::class, 'destroy'])->name('customerSupport.destroy'); //admin.customerSupport.destroy

    // Evaluation
    Route::get('/evaluation', [EvaluationController::class, 'index'])->name('evaluation'); //admin.evaluation
    Route::patch('/evaluation/{id}/update', [EvaluationController::class, 'update'])->name('evaluation.update'); //admin.evaluation.update

});

// Favorite
Route::group(['prefix' => 'favorite', 'as' => 'favorite.'], function() {
    Route::post('/{product_id}/store', [FavoriteController::class, 'store'])->name('store');
    Route::delete('/{product_id}/destroy', [FavoriteController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'review', 'as' => 'review.'], function() {
    Route::post('/{order_line_id}/{product_id}/store', [ReviewController::class, 'store'])->name('store');
    Route::patch('/{review_id}/{order_line_id}/{product_id}/update', [ReviewController::class, 'update'])->name('update');
    Route::delete('/{review_id}/destory', [ReviewController::class, 'destroy'])->name('destroy');
});
