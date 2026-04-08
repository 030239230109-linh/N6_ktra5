<?php


use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
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
=======
use App\Http\Controllers\MovieController1;

Route::get('/', [MovieController1::class, 'index']);
Route::get('/theloai/{id}', [MovieController1::class, 'trang_the_loai']);
Route::get('/movie/{id}', [MovieController1::class, 'show'])->name('movie.show');
Route::post('/timkiem', [MovieController1::class, 'search'])->name('movie.search');
>>>>>>> 7c374f3448cdfea4ca8034b3b31609c22c2f9396
