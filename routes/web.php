<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Owner routes
Route::get('/owner/dashboard', [MenuController::class, 'index'])->name('owner.dashboard');
Route::post('/owner/menu', [MenuController::class, 'store']);
Route::delete('/owner/menu/{id}', [MenuController::class, 'destroy']);

// User routes
Route::get('/user/dashboard', [MenuController::class, 'userMenu'])->name('user.dashboard');
Route::post('/cart/add', [CartController::class, 'add']);
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/checkout', [OrderController::class, 'checkout']);
Route::get('/receipt', [OrderController::class, 'receipt'])->name('receipt');

// Rider routes
Route::get('/rider/dashboard', [RiderController::class, 'index'])->name('rider.dashboard');

// Admin routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
});