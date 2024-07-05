<?php

use App\Core\Route\Route;
use App\Http\Controllers\HomeController;

Route::get('/get/{get}', [HomeController::class, 'index']);
Route::post('/post/{post}', [HomeController::class, 'post']);