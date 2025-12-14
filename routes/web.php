<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;

//car_detail controller
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarImageController;

Route::get('/home/id', [PageController::class, 'homeID'])->name('home');
Route::get('/home/en', [PageController::class, 'homeEn'])->name('home');

Route::get('/news/id', [PageController::class, 'newsID'])->name('news');
Route::get('/news/en', [PageController::class, 'newsEn'])->name('news');

Route::get('/cars', [PageController::class, 'cars'])->name('cars');

Route::get('/cars/{id}', [PageController::class, 'carDetail'])
        ->whereNumber('id')
        ->name('car.detail');

Route::get('/support/id', [PageController::class, 'supportID'])->name('support');
Route::get('/support/en', [PageController::class, 'supportEn'])->name('support');

Route::get('/login/id', [PageController::class, 'loginID'])->name('login');
Route::get('/login/en', [PageController::class, 'loginEn'])->name('login');

//car_detail controller
Route::resource('categories', CategoryController::class);
Route::resource('cars', CarController::class);
Route::resource('car_images', CarImageController::class);