<?php

use App\Core\Route\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/get/{get}', [HomeController::class, 'get']);
Route::post('/get/{get}', [HomeController::class, 'post']);