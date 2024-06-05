<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\StripeController;

Auth::routes();

Route::get('/', [StaticController::class, 'index'] )->name('home.index') ;
Route::get('/request-sent', [StaticController::class, 'request_sent'] )->name('home.request-sent')->middleware('redirectIfDirectAccess');
Route::get('/about', [StaticController::class, 'about'] )->name('home.about');
Route::resource('contacts', ContactsController::class );
Route::resource('offers', OffersController::class )->middleware('redirectIfDirectAccess');
Route::resource('reservations', ReservationsController::class )->middleware('redirectIfDirectAccess');

Route::post('reservations/{id}/approve', [ReservationsController::class, 'approve'])
    ->name('reservations.approve')
    ->middleware('auth');

Route::delete('reservations/{id}/reject', [ReservationsController::class, 'reject'])
    ->name('reservations.reject')
    ->middleware('auth');

Route::get('/payment/{reservation_id}', [ReservationsController::class, 'paymentPage'])
    ->name('reservations.paymentPage')
    ->middleware('auth')->middleware('redirectIfDirectAccess');

Route::middleware(['auth'])->group(function(){
    Route::get('/my-account',[UserController::class,'index'])->name('user.index');
    Route::get('/user/notifications',[UserController::class,'notifications'])->name('user.notifications');
});

Route::middleware(['auth','auth.admin'])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});

Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');

Route::get('/notifications', [ReservationsController::class, 'reservation_notifications'])->name('notifications')->middleware('redirectIfDirectAccess');
Route::get('/notifications/check', [ReservationsController::class, 'check']);

Route::post('notifications/reservation_notifications/{id}/mark-as-read', [ReservationsController::class, 'markAsRead'])
    ->name('notifications.markAsRead')
    ->middleware('auth'); 
Route::delete('notifications/reservation_notifications/{id}', [ReservationsController::class, 'destroyNotifications'])
    ->name('notifications.destroy')
    ->middleware('auth'); 
