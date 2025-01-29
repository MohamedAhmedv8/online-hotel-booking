<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomerOrderController;
use App\Http\Controllers\Customer\CustomerProfileController;

    // Customer
Route::group(['middleware'=>['customer:customer']],function(){
    Route::get('home', [CustomerHomeController::class, 'index'])->name('customer_home');
    Route::get('logout', [CustomerAuthController::class, 'logout'])->name('customer_logout');
    Route::get('edit-profile', [CustomerProfileController::class, 'index'])->name('customer-profile');
    Route::post('edit-profile-submit', [CustomerProfileController::class, 'profile_submit'])->name('customer_profile_submit');
    Route::get('customer/order/view', [CustomerOrderController::class, 'index'])->name('customer_order_view');
    Route::get('customer/invoice/{id}', [CustomerOrderController::class, 'invoice'])->name('customer_invoice');
    // Booking
    Route::post('/booking/submit', [BookingController::class, 'cart_submit'])->name('cart_submit');
    Route::get('/cart', [BookingController::class, 'cart_view'])->name('cart');
    Route::get('/cart/delete/{id}', [BookingController::class, 'cart_delete'])->name('cart_delete');
    Route::get('/checkout', [BookingController::class, 'checkout'])->name('checkout');
    Route::post('/payment', [BookingController::class, 'payment'])->name('payment');
    Route::get('/payment/paypal/{price}', [BookingController::class, 'paypal'])->name('paypal');
    Route::post('/payment/stripe/{price}', [BookingController::class, 'stripe'])->name('stripe');
});
Route::get('login', [CustomerAuthController::class, 'login'])->name('customer_login');
Route::get('signup', [CustomerAuthController::class, 'signup'])->name('customer_signup');
Route::post('signup-submit', [CustomerAuthController::class, 'signup_submit'])->name('customer_signup_submit');
Route::post('login_submit', [CustomerAuthController::class, 'login_submit'])->name('customer_login_submit');
Route::get('signup/verify/{email}/{token}', [CustomerAuthController::class, 'verify'])->name('customer_signup_verify');
Route::get('forget_password', [CustomerAuthController::class, 'forget_password'])->name('customer_forget_password');
Route::post('forget_password_submit', [CustomerAuthController::class, 'forget_password_submit'])->name('customer_forget_password_submit');
Route::get('reset-password/{email}/{token}', [CustomerAuthController::class, 'reset_password'])->name('customer_reset_password');
Route::post('reset_password_submit', [CustomerAuthController::class, 'reset_password_submit'])->name('customer_reset_password_submit');
