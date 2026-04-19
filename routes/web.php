<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GetukController;

// Halaman utama Getuk
Route::get('/', [GetukController::class, 'index'])->name('getuk.index');

// Halaman produk Getuk
Route::get('/produk', [GetukController::class, 'produk'])->name('getuk.produk');
Route::get('/produk/{id}', [GetukController::class, 'detail'])->name('getuk.detail');

// Authentication
Route::get('/login', [GetukController::class, 'login'])->name('login');
Route::post('/login', [GetukController::class, 'loginProcess'])->name('login.process');
Route::get('/register', [GetukController::class, 'register'])->name('register');
Route::post('/register', [GetukController::class, 'registerProcess'])->name('register.process');
Route::get('/logout', [GetukController::class, 'logout'])->name('logout');

// User Profile
Route::get('/profile', [GetukController::class, 'profile'])->name('profile');
Route::post('/profile', [GetukController::class, 'profileUpdate'])->name('profile.update');
