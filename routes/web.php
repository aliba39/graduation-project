<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\StaticController;
use  App\Http\Controllers\OffersController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactsController;

/*use App\Http\Controllers\EmailController;
use  App\Http\Controllers\ReportsController;
*/

Route::get('/', [StaticController::class, 'index'] )->name('home.index') ;
Route::get('/request-sent', [StaticController::class, 'request_sent'] )->name('home.request-sent')->middleware('redirectIfDirectAccess') ;
Route::get('/about', [StaticController::class, 'about'] )->name('home.about')->middleware('redirectIfDirectAccess');
Route::resource('contacts', ContactsController::class );
Route::resource('offers', OffersController::class )->middleware('redirectIfDirectAccess');
Route::resource('reservations', ReservationsController::class )->middleware('redirectIfDirectAccess');

Route::middleware('auth')->group(function(){
    Route::get('/my-account',[UserController::class,'index'])->name('user.index');
});

Route::middleware(['auth','auth.admin'])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});
/* Route::get('/email_form', [StaticController::class, 'email_form'])->name('home.email_form');

Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email'); */

Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
