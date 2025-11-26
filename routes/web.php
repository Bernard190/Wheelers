<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

//car_detail controller
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarImageController;

Route::get('/home', [PageController::class, 'home'])->name('home');

Route::get('/news', [PageController::class, 'news'])->name('news');

Route::get('/cars', [PageController::class, 'cars'])->name('cars');

Route::get('/cars/{id}', [PageController::class, 'carDetail'])
        ->whereNumber('id')
        ->name('car.detail');

Route::get('/support', [PageController::class, 'support'])->name('support');

Route::get('/login', [PageController::class, 'login'])->name('login');


//car_detail controller
Route::resource('categories', CategoryController::class);
Route::resource('cars', CarController::class);
Route::resource('car_images', CarImageController::class);