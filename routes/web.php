<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\StaticController;
use  App\Http\Controllers\OffersController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\StripeController;


Route::get('/', [StaticController::class, 'index'] )->name('home.index') ;
Route::get('/request-sent', [StaticController::class, 'request_sent'] )->name('home.request-sent')->middleware('redirectIfDirectAccess') ;
Route::get('/about', [StaticController::class, 'about'] )->name('home.about')->middleware('redirectIfDirectAccess');
Route::resource('contacts', ContactsController::class );
Route::resource('offers', OffersController::class )->middleware('redirectIfDirectAccess');
Route::resource('reservations', ReservationsController::class )->middleware('redirectIfDirectAccess') ;

Route::get('reservations/{id}/approve', [ReservationsController::class, 'approve'])
    ->name('reservations.approve')
    ->middleware('auth'); // تأكد من حماية المسار

Route::get('reservations/{id}/reject', [ReservationsController::class, 'reject'])
    ->name('reservations.reject')
    ->middleware('auth'); // تأكد من حماية المسار

Route::get('admin/notifications', [ReservationsController::class, 'notifications'])
    ->name('admin.notifications')
    ->middleware('auth'); 
    
Route::post('admin/notifications/{id}/mark-as-read', [ReservationsController::class, 'markAsRead'])
    ->name('admin.notifications.markAsRead')
    ->middleware('auth'); 

Route::delete('admin/notifications/{id}', [ReservationsController::class, 'destroyNotifications'])
    ->name('admin.notifications.destroy')
    ->middleware('auth'); 

Route::get('payment/{offer_id}', [ReservationsController::class, 'paymentPage'])
    ->name('reservations.payment')
    ->middleware('auth');


Route::middleware('auth')->group(function(){
    Route::get('/my-account',[UserController::class,'index'])->name('user.index');
});

Route::middleware(['auth','auth.admin'])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});

Auth::routes();

Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
