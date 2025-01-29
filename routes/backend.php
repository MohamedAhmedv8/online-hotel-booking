<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminAvailableRoomController;



// Admin
Route::group(['middleware'=>['admin:admin']],function(){
    Route::get('admin/home', [AdminHomeController::class, 'index'])->name('admin_home');
    Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
    Route::get('admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin-profile');
    Route::post('admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');
    //Slide
    Route::get('admin/slide/view', [AdminSlideController::class, 'index'])->name('admin_slide_view');
    Route::get('admin/slide/add', [AdminSlideController::class, 'create'])->name('admin_slide_create');
    Route::post('admin/slide/store', [AdminSlideController::class, 'store'])->name('admin_slide_store');
    Route::get('admin/slide/edit/{id}', [AdminSlideController::class, 'edit'])->name('admin_slide_edit');
    Route::post('admin/slide/update/{id}', [AdminSlideController::class, 'update'])->name('admin_slide_update');
    Route::get('admin/slide/delete/{id}', [AdminSlideController::class, 'delete'])->name('admin_slide_delete');
    // Feature
    Route::get('admin/feature/view', [AdminFeatureController::class, 'index'])->name('admin_feature_view');
    Route::get('admin/feature/add', [AdminFeatureController::class, 'create'])->name('admin_feature_create');
    Route::post('admin/feature/store', [AdminFeatureController::class, 'store'])->name('admin_feature_store');
    Route::get('admin/feature/edit/{id}', [AdminFeatureController::class, 'edit'])->name('admin_feature_edit');
    Route::post('admin/feature/update/{id}', [AdminFeatureController::class, 'update'])->name('admin_feature_update');
    Route::get('admin/feature/delete/{id}', [AdminFeatureController::class, 'delete'])->name('admin_feature_delete');
    // Testimonial
    Route::get('admin/testimonial/view', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_view');
    Route::get('admin/testimonial/add', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_create');
    Route::post('admin/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store');
    Route::get('admin/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('admin/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
    Route::get('admin/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');
    // Post
    Route::get('admin/post/view', [AdminPostController::class, 'index'])->name('admin_post_view');
    Route::get('admin/post/add', [AdminPostController::class, 'create'])->name('admin_post_create');
    Route::post('admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
    Route::get('admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
    Route::post('admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
    Route::get('admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete');
    // setting Admin
    Route::get('admin/setting', [AdminSettingController::class, 'index'])->name('admin_settings');
    Route::post('admin/setting/update', [AdminSettingController::class, 'update'])->name('admin_setting_update');
    // Admin - Customer
    Route::get('admin/customer-list', [AdminCustomerController::class, 'index'])->name('admin_customer_list_view');
    Route::get('admin/customer/change-status/{id}', [AdminCustomerController::class, 'change_status'])->name('admin_customer_change_status');
    Route::get('admin/order/view', [AdminOrderController::class, 'index'])->name('admin_orders');
    Route::get('admin/order/invoice/{id}', [AdminOrderController::class, 'invoice'])->name('admin_invoice');
    Route::get('admin/order/delete/{id}', [AdminOrderController::class, 'delete'])->name('admin_order_delete');
    // admin_available_rooms
    Route::get('admin/available-rooms', [AdminAvailableRoomController::class, 'index'])->name('admin_available_rooms');
    Route::post('admin/available-rooms/submit', [AdminAvailableRoomController::class, 'show'])->name('admin_available_rooms_submit');
    // Photo
    Route::get('admin/photo/view', [AdminPhotoController::class, 'index'])->name('admin_photo_view');
    Route::get('admin/photo/add', [AdminPhotoController::class, 'create'])->name('admin_photo_create');
    Route::post('admin/photo/store', [AdminPhotoController::class, 'store'])->name('admin_photo_store');
    Route::get('admin/photo/edit/{id}', [AdminPhotoController::class, 'edit'])->name('admin_photo_edit');
    Route::post('admin/photo/update/{id}', [AdminPhotoController::class, 'update'])->name('admin_photo_update');
    Route::get('admin/photo/delete/{id}', [AdminPhotoController::class, 'delete'])->name('admin_photo_delete');
    // Video
    Route::get('admin/video/view', [AdminVideoController::class, 'index'])->name('admin_video_view');
    Route::get('admin/video/add', [AdminVideoController::class, 'create'])->name('admin_video_create');
    Route::post('admin/video/store', [AdminVideoController::class, 'store'])->name('admin_video_store');
    Route::get('admin/video/edit/{id}', [AdminVideoController::class, 'edit'])->name('admin_video_edit');
    Route::post('admin/video/update/{id}', [AdminVideoController::class, 'update'])->name('admin_video_update');
    Route::get('admin/video/delete/{id}', [AdminVideoController::class, 'delete'])->name('admin_video_delete');
    // FaQ
    Route::get('admin/faq/view', [AdminFaqController::class, 'index'])->name('admin_faq_view');
    Route::get('admin/faq/add', [AdminFaqController::class, 'create'])->name('admin_faq_create');
    Route::post('admin/faq/store', [AdminFaqController::class, 'store'])->name('admin_faq_store');
    Route::get('admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
    Route::get('admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');
    // Amenity
    Route::get('admin/amenity/view', [AdminAmenityController::class, 'index'])->name('admin_amenity_view');
    Route::get('admin/amenity/add', [AdminAmenityController::class, 'create'])->name('admin_amenity_create');
    Route::post('admin/amenity/store', [AdminAmenityController::class, 'store'])->name('admin_amenity_store');
    Route::get('admin/amenity/edit/{id}', [AdminAmenityController::class, 'edit'])->name('admin_amenity_edit');
    Route::post('admin/amenity/update/{id}', [AdminAmenityController::class, 'update'])->name('admin_amenity_update');
    Route::get('admin/amenity/delete/{id}', [AdminAmenityController::class, 'delete'])->name('admin_amenity_delete');
    // Room
    Route::get('admin/room/view', [AdminRoomController::class, 'index'])->name('admin_room_view');
    Route::get('admin/room/add', [AdminRoomController::class, 'create'])->name('admin_room_create');
    Route::post('admin/room/store', [AdminRoomController::class, 'store'])->name('admin_room_store');
    Route::get('admin/room/edit/{id}', [AdminRoomController::class, 'edit'])->name('admin_room_edit');
    Route::post('admin/room/update/{id}', [AdminRoomController::class, 'update'])->name('admin_room_update');
    Route::get('admin/room/delete/{id}', [AdminRoomController::class, 'delete'])->name('admin_room_delete');
    Route::get('admin/room/gallery/{id}', [AdminRoomController::class, 'gallery'])->name('admin_room_gallery');
    Route::post('admin/room/gallery/store/{id}', [AdminRoomController::class, 'gallery_store'])->name('admin_room_gallery_store');
    Route::get('admin/room/gallery/delete/{id}', [AdminRoomController::class, 'gallery_delete'])->name('admin_room_photo_delete');
    // Pages: About
    Route::get('admin/page/about', [AdminPageController::class, 'about'])->name('admin_page_about');
    Route::post('admin/page/about/update', [AdminPageController::class, 'about_update'])->name('admin_page_about_update');
    // Terms
    Route::get('admin/page/terms', [AdminPageController::class, 'terms'])->name('admin_page_terms');
    Route::post('admin/page/terms/update', [AdminPageController::class, 'terms_update'])->name('admin_page_terms_update');
    // privacy
    Route::get('admin/page/privacy', [AdminPageController::class, 'privacy'])->name('admin_page_privacy');
    Route::post('admin/page/privacy/update', [AdminPageController::class, 'privacy_update'])->name('admin_page_privacy_update');
    // contact
    Route::get('admin/page/contact', [AdminPageController::class, 'contact'])->name('admin_page_contact');
    Route::post('admin/page/contact/update', [AdminPageController::class, 'contact_update'])->name('admin_page_contact_update');
    // Photo Gallery
    Route::get('admin/page/photo-gallery', [AdminPageController::class, 'photo_gallery'])->name('admin_page_photo_gallery');
    Route::post('admin/page/photo-gallery/update', [AdminPageController::class, 'photo_gallery_update'])->name('admin_page_photo_gallery_update');
    // Video Gallery
    Route::get('admin/page/video-gallery', [AdminPageController::class, 'video_gallery'])->name('admin_page_video_gallery');
    Route::post('admin/page/video-gallery/update', [AdminPageController::class, 'video_gallery_update'])->name('admin_page_video_gallery_update');
    // FAQ
    Route::get('admin/page/faq', [AdminPageController::class, 'faq'])->name('admin_page_faq');
    Route::post('admin/page/faq/update', [AdminPageController::class, 'faq_update'])->name('admin_page_faq_update');
    // Blog
    Route::get('admin/page/blog', [AdminPageController::class, 'blog'])->name('admin_page_blog');
    Route::post('admin/page/blog/update', [AdminPageController::class, 'blog_update'])->name('admin_page_blog_update');
    // Room
    Route::get('admin/page/room', [AdminPageController::class, 'room'])->name('admin_page_room');
    Route::post('admin/page/room/update', [AdminPageController::class, 'room_update'])->name('admin_page_room_update');
    // Cart
    Route::get('admin/page/cart', [AdminPageController::class, 'cart'])->name('admin_page_cart');
    Route::post('admin/page/cart/update', [AdminPageController::class, 'cart_update'])->name('admin_page_cart_update');
    // Checkout
    Route::get('admin/page/checkout', [AdminPageController::class, 'checkout'])->name('admin_page_checkout');
    Route::post('admin/page/checkout/update', [AdminPageController::class, 'checkout_update'])->name('admin_page_checkout_update');
    // Payment
    Route::get('admin/page/payment', [AdminPageController::class, 'payment'])->name('admin_page_payment');
    Route::post('admin/page/payment/update', [AdminPageController::class, 'payment_update'])->name('admin_page_payment_update');
    // Sign-up
    Route::get('admin/page/signup', [AdminPageController::class, 'signup'])->name('admin_page_signup');
    Route::post('admin/page/signup/update', [AdminPageController::class, 'signup_update'])->name('admin_page_signup_update');
    // Login
    Route::get('admin/page/login', [AdminPageController::class, 'login'])->name('admin_page_login');
    Route::post('admin/page/login/update', [AdminPageController::class, 'login_update'])->name('admin_page_login_update');
    // Subscribers
    Route::get('admin/subscribers', [AdminSubscriberController::class, 'subscribers_list'])->name('admin_subscribers_list');
    Route::get('admin/subscribers/send-email', [AdminSubscriberController::class, 'send_email'])->name('admin_subscribers_send_email');
    Route::post('admin/subscribers/send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('admin_subscribers_send_email_submit');

});
Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('admin/login_submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('admin/forget_password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('admin/forget_password_submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::post('admin/reset_password_submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');
Route::get('admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');






































