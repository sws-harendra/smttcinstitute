<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AdminController;

Route::post('/login', [AdminController::class, 'apiLogin']);

Route::get('/blogs', [BlogController::class, 'apiIndex']);
Route::post('/blogs', [BlogController::class, 'apiStore']);

Route::get('/slider', [SliderController::class, 'apiIndex']);
Route::post('/slider', [SliderController::class, 'apiStore']);
Route::delete('/slider/{id}', [SliderController::class, 'apiDestroy']);
