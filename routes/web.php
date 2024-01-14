<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AllOrderController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TrackingController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking');

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/book', [BookController::class, 'show'])->middleware('can:user', 'auth', 'verified')->name('book');
Route::post('/book', [BookController::class, 'create'])->middleware('can:user', 'auth', 'verified');

Route::get('/payment', [PaymentController::class, 'index'])->middleware('can:user', 'auth', 'verified')->name('payment');
Route::post('/payment', [PaymentController::class, 'payment'])->middleware('can:user', 'auth', 'verified');

Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('can:user', 'auth', 'verified')->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'create'])->middleware('can:user', 'auth', 'verified');

Route::get('/order', [OrderController::class, 'index'])->middleware('can:user', 'auth', 'verified')->name('order');
Route::get('/order/{id}', [OrderController::class, 'show'])->middleware('can:user', 'auth', 'verified')->name('orderdetails');
Route::delete('/order/{id}', [OrderController::class, 'destroy'])->middleware('can:user', 'auth', 'verified');
Route::post('/restore/{id}', [OrderController::class, 'restore'])->middleware('can:user', 'auth', 'verified');
Route::post('/delete/{id}', [OrderController::class, 'delete'])->middleware('can:user', 'auth', 'verified');

Route::get('/delivery', [StatusController::class, 'delivery'])->middleware('can:delivery', 'auth', 'verified')->name('delivery');
Route::get('/delivery/{id}', [StatusController::class, 'show'])->middleware('can:delivery', 'auth', 'verified')->name('deliveryupdate');
Route::post('/delivery/', [StatusController::class, 'update'])->middleware('can:delivery', 'auth', 'verified');

Route::get('/status', [StatusController::class, 'index'])->middleware('can:operator', 'auth', 'verified')->name('status');
Route::get('/edit/{id}', [EditController::class, 'show'])->middleware('can:operator', 'auth', 'verified')->name('statusupdate');
Route::post('/edit', [EditController::class, 'update'])->middleware('can:operator', 'auth', 'verified');

Route::get('/status/receive', [StatusController::class, 'receive'])->middleware('can:operator', 'auth', 'verified')->name('receive_item_status');
Route::post('/status/receive', [StatusController::class, 'updatereceive'])->middleware('can:operator', 'auth', 'verified');

Route::get('/status/dispatch', [StatusController::class, 'dispatch'])->middleware('can:operator', 'auth', 'verified')->name('dispatch_item_status');
Route::post('/status/dispatch', [StatusController::class, 'updatedispatch'])->middleware('can:operator', 'auth', 'verified');

Route::get('/status/deliver', [StatusController::class, 'deliver'])->middleware('can:operator', 'auth', 'verified')->name('deliver_item_status');
Route::post('/status/deliver', [StatusController::class, 'updatedeliver'])->middleware('can:operator', 'auth', 'verified');

Route::get('/allorder', [AllOrderController::class, 'index'])->middleware('can:admin', 'auth', 'verified')->name('allorder');
Route::get('/adminedit/{id}', [AllOrderController::class, 'show'])->middleware('can:admin', 'auth', 'verified')->name('orderAllDetails');
Route::post('/allorder', [AllOrderController::class, 'update'])->middleware('can:admin', 'auth', 'verified');

Route::get('/archiveorder', [AllOrderController::class, 'archive'])->middleware('can:admin', 'auth', 'verified')->name('archiveorder');

Route::get('/users', [AdminController::class, 'index'])->middleware('can:admin', 'auth', 'verified')->name('users');
Route::get('/users/create', [AdminController::class, 'create'])->middleware('can:admin', 'auth', 'verified')->name('createusers');
Route::post('/users/create', [AdminController::class, 'store'])->middleware('can:admin', 'auth', 'verified');
Route::get('/users/{id}', [AdminController::class, 'show'])->middleware('can:admin', 'auth', 'verified')->name('updateuserdetails');
Route::post('/users/', [AdminController::class, 'update'])->middleware('can:admin', 'auth', 'verified');
