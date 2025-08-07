<?php

use App\Http\Controllers\StoreSettingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function(){
    Route::view('/dashboard','features.dashboard')->name('features.dashboard');

    Route::view('/products','features.products')->name('features.products');
    Route::resource('products', ProductController::class);

    Route::view('/sales','features.sales')->name('features.sales');
    Route::view('/users','features.users')->name('features.users');

    Route::view('/store-settings','features.store_setting')->name('features.store_setting');
    Route::resource('store_setting',StoreSettingController::class);

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
