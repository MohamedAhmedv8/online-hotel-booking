<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\RoomController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\PhotoController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\Frontend\VideoController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PrivacyController;
use App\Http\Controllers\Frontend\SubscriberController;


// Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/post/{id}', [BlogController::class, 'show'])->name('post');
Route::get('/photo-gallery', [PhotoController::class, 'index'])->name('photo_gallery');
Route::get('/video-gallery', [VideoController::class, 'index'])->name('video_gallery');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/terms-and-conditions', [TermsController::class, 'index'])->name('terms');
Route::get('/privacy-policy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send-email', [ContactController::class, 'send_email'])->name('contact_send_email');
Route::post('/subscriber/send-email', [SubscriberController::class, 'send_email'])->name('subscriber_send_email');
Route::get('/subscriber/verify/{email}/{token}', [SubscriberController::class, 'verify'])->name('subscriber_verify');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/room-details/{id}', [RoomController::class, 'room_details'])->name('room_details');
