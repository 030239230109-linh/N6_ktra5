<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OpenRouterController;

use App\Http\Controllers\MovieController;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);


Route::get('/openrouter', [OpenRouterController::class, 'chat']);

Route::get('/theloai/{id}', [MovieController::class, 'trang_the_loai'])->name('genre');

use App\Http\Controllers\MovieController3;


// Trang danh sách
Route::get('/movies', [MovieController3::class, 'index3'])->name('movies.index3');

// Trang chi tiết
Route::get('/movies/{id}', [MovieController3::class, 'show'])->name('movies.show');

// Route Xóa (Phải là DELETE để khớp với @method('DELETE') trong View)
Route::delete('/movies/{id}', [MovieController3::class, 'destroy'])->name('movies.destroy');
// Route hiển thị form thêm
Route::get('/movie/create', [MovieController3::class, 'create'])->name('movies.create');

// Route xử lý lưu dữ liệu (phương thức POST)
Route::post('/movie/store', [MovieController3::class, 'store'])->name('movies.store');

Route::get('/openrouter', [OpenRouterController3::class, 'chat']);

use App\Http\Controllers\MovieController1;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/movie/{id}', [MovieController1::class, 'show'])->name('movie.detail');
Route::post('/timkiem', [MovieController1::class, 'search'])->name('movie.search');

