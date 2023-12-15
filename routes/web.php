<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AllOrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'addData']);

Route::get('/payment', [PaymentController::class, 'index'])->middleware('auth', 'verified')->name('payment');
Route::post('/payment', [PaymentController::class, 'addData']);

Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('auth', 'verified');
Route::post('/checkout', [CheckoutController::class, 'create']);

Route::get('/order', [OrderController::class, 'index'])->middleware('auth', 'verified')->name('order');

Route::get('/tracking', [TrackingController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/status', [StatusController::class, 'index'])->middleware('can:operator', 'auth', 'verified')->name('status');
Route::get('/edit/{id}', [EditController::class, 'show'])->middleware('can:operator', 'auth', 'verified');
Route::post('/edit', [EditController::class, 'update'])->middleware('can:operator', 'auth', 'verified');

Route::get('/allorder', [AllOrderController::class, 'index'])->middleware('can:admin', 'auth', 'verified')->name('allorder');
Route::get('/adminedit/{id}', [AllOrderController::class, 'show'])->middleware('can:admin', 'auth', 'verified');
Route::post('/allorder', [AllOrderController::class, 'update']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('can:admin', 'auth', 'verified')->name('admin');
Route::get('/admin/users/create', [AdminController::class, 'create'])->middleware('can:admin', 'auth', 'verified');
