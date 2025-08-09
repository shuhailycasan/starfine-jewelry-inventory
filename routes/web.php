<?php

use App\Http\Controllers\GoldPriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function () {
    Route::view('/dashboard', 'features.dashboard')->name('features.dashboard');

    Route::resource('products', ProductController::class);

    Route::view('/sales', 'features.sales')->name('features.sales');
    Route::view('/users', 'features.users')->name('features.users');

    Route::prefix('settings')->group(function () {
        Route::resource('gold-price', GoldPriceController::class);
    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
