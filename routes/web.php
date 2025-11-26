<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/home', [PageController::class, 'home'])->name('home');

Route::get('/news', [PageController::class, 'news'])->name('news');

Route::get('/cars', [PageController::class, 'cars'])->name('cars');

Route::get('/cars/{id}', [PageController::class, 'carDetail'])
        ->whereNumber('id')
        ->name('car.detail');

Route::get('/support', [PageController::class, 'support'])->name('support');

Route::get('/login', [PageController::class, 'login'])->name('login');
