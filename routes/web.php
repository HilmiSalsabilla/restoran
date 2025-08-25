<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Foods\FoodsController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Admins\AdminsController;
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

// Halaman publik
Route::get('/', [Controller::class, 'index']);
Route::get('/about', [Controller::class, 'about'])->name('about');
Route::get('/services', [Controller::class, 'services'])->name('services');
Route::get('/contact', [Controller::class, 'contact'])->name('contact');

Route::prefix('foods')->group(function () {
    //food details
    Route::get('food-details/{id}', [FoodsController::class, 'foodDetails'])->name('food.details');
    Route::post('food-details/{id}', [FoodsController::class, 'cart'])->name('food.cart');
    //cart
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

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminsController::class, 'viewLogin'])->name('view.login')->middleware('checkforauth');
    Route::post('login', [AdminsController::class, 'checkLogin'])->name('check.login');

    Route::middleware('auth:admin')->group(function() {
        Route::get('index', [AdminsController::class, 'index'])->name('admins.dashboard');
        Route::post('logout', [AdminsController::class, 'logout'])->name('admin.logout');
        //admins
        Route::get('all-admins', [AdminsController::class, 'allAdmins'])->name('admins.all');
        Route::get('create-admins', [AdminsController::class, 'createAdmins'])->name('admins.create');
        Route::post('create-admins', [AdminsController::class, 'storeAdmins'])->name('admins.store');
        //orders
        Route::get('all-orders', [AdminsController::class, 'allOrders'])->name('orders.all');
        Route::get('edit-orders/{id}', [AdminsController::class, 'editOrders'])->name('orders.edit');
        Route::post('edit-orders/{id}', [AdminsController::class, 'updateOrders'])->name('orders.update');
        Route::get('delete-orders/{id}', [AdminsController::class, 'deleteOrders'])->name('orders.delete');
        //bookings
        Route::get('all-bookings', [AdminsController::class, 'allBookings'])->name('bookings.all');
        Route::get('edit-bookings/{id}', [AdminsController::class, 'editBookings'])->name('bookings.edit');
        Route::post('edit-bookings/{id}', [AdminsController::class, 'updateBookings'])->name('bookings.update');
        Route::get('delete-bookings/{id}', [AdminsController::class, 'deleteBookings'])->name('bookings.delete');

    });
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
