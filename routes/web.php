<?php

use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\SellerLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Products\EvaluationController;
use App\Http\Controllers\Products\SellerEvaluationController;
use App\Http\Controllers\Inquiries\CustomerSupportController;
use App\Http\Controllers\Users\FavoriteController;
use App\Http\Controllers\Orders\CartController;
use App\Http\Controllers\Inquiries\InquiryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Users\ReviewController;
use App\Http\Controllers\Orders\PaymentController;
use App\Http\Controllers\Orders\SellerDeliveryController;
use App\Http\Controllers\Products\AdController;
use App\Http\Controllers\Users\AdminController;
use App\Http\Controllers\Users\CustomerController;
use App\Http\Controllers\Users\SellerController;
use App\Http\Controllers\Orders\DeliveryController;
use App\Http\Middleware\LogPageViews;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


// Note: We might delete later
// Route::get('/', function () {
//     return view('welcome');
// });

// Seller
Route::get('signIn/seller', [SellerLoginController::class, 'showLoginPage'])->name('seller.showLoginPage');
Route::post('signIn/seller', [SellerLoginController::class, 'signIn'])->name('seller.signIn');

// Admin
Route::get('signIn/admin', [AdminLoginController::class, 'showLoginPage'])->name('admin.showLoginPage');
Route::post('signIn/admin', [AdminLoginController::class, 'signIn'])->name('admin.signIn');

Route::group(['middleware' => LogPageViews::class], function () {

    Auth::routes();

    // Google Login only for customer
    Route::get('/login/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/login/callback', [GoogleLoginController::class, 'handleGoogleCallback']);

    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // LiveChat
    Route::get('/livechat/{product_id}/{user_id}', [MessageController::class, 'index'])->name('livechat');

    //Search
    Route::get('/search', [HomeController::class, 'search'])->name('search');

    // Product Detail / {product_id}
    Route::get('/productDetail/{id}', [ProductController::class, 'showProductDetail'])->name('productDetail');

    // Inquiry
    Route::get('/inquiry', [InquiryController::class, 'index'])->name('inquiry');
    Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');

    Route::get('/profile/{seller_id}', [SellerController::class, 'showProfile'])->name('seller.profile');

    // Payment
    Route::get('/customer/cart', function () {
        return view('customer.cart');
    });

    Route::group(['middleware' => 'customer'], function () {
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

            // Cart
            Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
            Route::get('/back', [CartController::class, 'back'])->name('back');
            Route::get('/cart/update', [CartController::class, 'update']);
            Route::get('/deleteItem/{id}', [CartController::class, 'destroy'])->name('cart.deleteItem');
            Route::post('/payment/transaction', [CartController::class, 'checkOut'])->name('transaction');
            Route::post('/cart/{product_id}', [CartController::class, 'addToCart'])->name('addToCart');
            Route::patch('/cart/{product_id}', [CartController::class, 'updateQty'])->name('updateQty');

            // Payment
            Route::get('/payment/show-transaction', [PaymentController::class, 'showTransaction'])->name('showTransaction');
            Route::post('/payment/transaction/confirmation', [PaymentController::class, 'confirmation'])->name('confirmation');
            Route::patch('/payment/transaction/{address_id}/editAddress', [PaymentController::class, 'editAddress'])->name('editAddress');
            Route::patch('/payment/transaction/{payment_id}/editPayment', [PaymentController::class, 'editPayment'])->name('editPayment');
            Route::get('/payment/payment/confirmation', [PaymentController::class, 'paymentConfirmation'])->name('payment.confirmation');
        });

        // Favorite
        Route::group(['prefix' => 'favorite', 'as' => 'favorite.'], function () {
            Route::post('/{product_id}/store', [FavoriteController::class, 'store'])->name('store');
            Route::delete('/{product_id}/destroy', [FavoriteController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'review', 'as' => 'review.'], function () {
            Route::post('/{order_line_id}/{product_id}/store', [ReviewController::class, 'store'])->name('store');
            Route::patch('/{review_id}/{order_line_id}/{product_id}/update', [ReviewController::class, 'update'])->name('update');
            Route::delete('/{review_id}/destory', [ReviewController::class, 'destroy'])->name('destroy');
        });
    });
});



Route::group(['middleware' => 'seller'], function () {
    Route::group(['prefix' => 'seller', 'as' => 'seller.'], function () {
        Route::get('/dashboard',  [SellerController::class, 'index'])->name('dashboard');

        Route::get('profile/editProfile', [SellerController::class, 'show'])
            ->name('profile.editProfile');

        Route::patch('profile/updateProfile', [SellerController::class, 'update'])
            ->name('profile.updateProfile');

        // Seller Product
        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::get('/dashboard', [ProductController::class, 'show'])
                ->name('dashboard');

            Route::get('/search',  [ProductController::class, 'search'])
                ->name('search');

            Route::get('/create',  [ProductController::class, 'create'])
                ->name('create');

            Route::post('/store',  [ProductController::class, 'store'])
                ->name('store');

            Route::get('/{id}/edit', [ProductController::class, 'edit'])
                ->name('edit');

            Route::patch('/{id}/update', [ProductController::class, 'update'])
                ->name('update');

            Route::get('/{id}/delete', [ProductController::class, 'delete'])
                ->name('delete');

            Route::delete('/{id}/destroy', [ProductController::class, 'destroy'])
                ->name('destroy');

            Route::delete('/{i_id}/{p_id}/image/destroy', [ProductController::class, 'imageDestroy'])
                ->name('image.destroy');
        });

        // Seller Ads
        Route::group(['prefix' => 'ads', 'as' => 'ads.'], function () {
            Route::get('/dashboard', [AdController::class, 'show'])
                ->name('dashboard');

            Route::get('/create', [AdController::class, 'create'])
                ->name('create');

            Route::post('/store', [AdController::class, 'store'])
                ->name('store');

            Route::get('/{id}/edit', [AdController::class, 'edit'])
                ->name('edit');

            Route::patch('/{id}/update', [AdController::class, 'update'])
                ->name('update');

            Route::patch('/{id}/delete', [AdController::class, 'delete'])
                ->name('delete');

            Route::delete('/{id}/destroy', [AdController::class, 'destroy'])
                ->name('destroy');
        });

        Route::get('evaluation', [SellerEvaluationController::class, 'search'])
            ->name('evaluation.search');

        Route::group(['prefix' => 'delivery', 'as' => 'delivery.'], function () {
            Route::get('/', [SellerDeliveryController::class, 'show'])
                ->name('show');

            Route::get('/', [SellerDeliveryController::class, 'search'])
                ->name('search');

            Route::get('/{id}', [SellerDeliveryController::class, 'showDetail'])
                ->name('showDetail');

            Route::patch('/{id}/update', [SellerDeliveryController::class, 'update'])
                ->name('update');
        });

        // Live Chat Delete
        Route::delete('/{customer_id}/{seller_id}/{product_id}/delete', [MessageController::class, 'delete'])
                ->name('message.delete');
    });
});

Route::group(['middleware' => 'admin'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');

        // Management User
        Route::get('/managementUser', [AdminController::class, 'index'])->name('managementUser'); 
        Route::get('/managementUser', [AdminController::class, 'search'])->name('managementUser.search'); 
        Route::post('/store', [AdminController::class, 'store'])->name('store'); 
        Route::patch('/{id}/update', [AdminController::class, 'update'])->name('update'); 
        Route::delete('/{id}/destroy', [AdminController::class, 'destroy'])->name('destroy');

        // Customer Support
        Route::get('/customerSupport', [CustomerSupportController::class, 'index'])->name('customerSupport'); 
        Route::get('/customerSupport', [CustomerSupportController::class, 'search'])->name('customerSupport.search');         
        Route::patch('/customerSupport/{id}/update', [CustomerSupportController::class, 'update'])->name('customerSupport.update'); 
        Route::delete('customerSupport/{id}/destroy', [CustomerSupportController::class, 'destroy'])->name('customerSupport.destroy');

        // Delivery Order List
        Route::get('delivery', [DeliveryController::class, 'show'])->name('delivery.show'); 
        Route::get('delivery', [DeliveryController::class, 'search'])->name('delivery.search'); 
        Route::get('delivery/{id}', [DeliveryController::class, 'showDetail'])->name('delivery.showDetail'); 
        Route::patch('delivery/{id}/update', [DeliveryController::class, 'update'])->name('delivery.update'); 

        // Evaluation
        Route::get('/evaluation', [EvaluationController::class, 'index'])->name('evaluation'); 
        Route::get('/evaluation', [EvaluationController::class, 'search'])->name('evaluation.search');
        Route::patch('/evaluation/{id}/update', [EvaluationController::class, 'update'])->name('evaluation.update'); 

    });
});
