<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
use App\Http\Controllers\MovieController;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);


Route::get('/openrouter', [OpenRouterController::class, 'chat']);

Route::get('/theloai/{id}', [MovieController::class, 'trang_the_loai'])->name('genre');

