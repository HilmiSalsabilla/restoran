<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Foods\FoodsController;
use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Halaman utama diarahkan ke dashboard (FoodsController)
Route::get('/', [Controller::class, 'index']);
Route::get('/dashboard', [Controller::class, 'index']);
Route::get('/about', [Controller::class, 'about'])->name('about');

Route::prefix('foods')->group(function () {
    Route::get('food-details/{id}', [FoodsController::class, 'foodDetails'])->name('food.details');
    //cart
    Route::post('food-details/{id}', [FoodsController::class, 'cart'])->name('food.cart');
    Route::get('cart', [FoodsController::class, 'displayCartItems'])->name('food.display.cart');
    Route::get('delete-cart/{id}', [FoodsController::class, 'deleteCartItems'])->name('food.delete.cart');
    //checkout
    Route::post('prepare-checkout', [FoodsController::class, 'prepareCheckout'])->name('prepare.checkout');
    //insert user info
    Route::get('checkout', [FoodsController::class, 'checkout'])->name('foods.checkout');
    Route::post('checkout', [FoodsController::class, 'storeCheckout'])->name('foods.checkout.store');
    //payment
    Route::get('pay', [FoodsController::class, 'payWithPaypal'])->name('foods.pay');
    Route::get('success', [FoodsController::class, 'success'])->name('foods.success');
    //booking tables
    Route::post('booking', [FoodsController::class, 'bookingTables'])->name('foods.booking.table');
    //menu
    Route::get('menu', [FoodsController::class, 'menu'])->name('foods.menu');
});

Route::prefix('users')->group(function () {
    Route::get('all-bookings', [UsersController::class, 'getBookings'])->name('users.bookings');
    Route::get('all-orders', [UsersController::class, 'getOrders'])->name('users.orders');
    //reviews
    Route::get('write-review', [UsersController::class, 'viewReview'])->name('users.review.create');
    Route::post('write-review', [UsersController::class, 'submitReview'])->name('users.review.store');
});

// Dashboard dengan middleware auth + verified
Route::get('/dashboard', [Controller::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
