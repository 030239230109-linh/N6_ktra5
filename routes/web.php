<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController1;

Route::get('/', [MovieController1::class, 'index']);
Route::get('/theloai/{id}', [MovieController1::class, 'trang_the_loai']);
Route::get('/movie/{id}', [MovieController1::class, 'show'])->name('movie.show');
Route::post('/timkiem', [MovieController1::class, 'search'])->name('movie.search');