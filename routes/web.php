<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
use App\Http\Controllers\MovieController3;


Route::get('/', [App\Http\Controllers\MovieController3::class, 'index']);
// Trang danh sách
Route::get('/movies', [MovieController3::class, 'index'])->name('movies.index');

// Trang chi tiết
Route::get('/movies/{id}', [MovieController3::class, 'show'])->name('movies.show');

// Route Xóa (Phải là DELETE để khớp với @method('DELETE') trong View)
Route::delete('/movies/{id}', [MovieController3::class, 'destroy'])->name('movies.destroy');

Route::get('/openrouter', [OpenRouterController3::class, 'chat']);
