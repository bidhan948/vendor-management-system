<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware'=>'is_admin'],function(){
        Route::resource('/category',App\Http\Controllers\CategoryController::class);
        Route::resource('transction',App\Http\Controllers\TransctionController::class);
        Route::resource('category.product',App\Http\Controllers\ProductController::class);
        Route::resource('product',App\Http\Controllers\MultiCategoryProduct::class);
        Route::resource('Product',App\Http\Controllers\ProductAddLoss::class);
        Route::resource('transctionreport',App\Http\Controllers\TransctionReportController::class);
    });
});
