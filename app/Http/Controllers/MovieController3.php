<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; 

class MovieController3 extends Controller
{
    public function index()
    {
        // Phải đảm bảo dòng này chạy
        $movies = Movie::all(); 
        // Kiểm tra xem view() trỏ đúng thư mục chưa (movie hay movies?)
        return view('movie.index', compact('movies')); 
    }

    public function show($id) 
    {
        $movie = Movie::findOrFail($id);
        return view('movie.show', compact('movie'));
    }

    public function destroy($id) 
    {
        $movie = Movie::findOrFail($id);
        $movie->status = 0; // Xóa mềm
        $movie->save();

    
        return redirect()->route('movies.index')->with('success', 'Đã xóa!');
    }
} // Chỉ có 1 dấu đóng ngoặc Class ở cuối file