<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; 

class MovieController3 extends Controller
{
    public function index3()
    {
        // Phải đảm bảo dòng này chạy
        $movies = Movie::all(); 
        // Kiểm tra xem view() trỏ đúng thư mục chưa (movie hay movies?)
        return view('movie.index3', compact('movies')); 
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
    public function create() {
    return view('movie.create');
}

public function store(Request $request) {
    // 1. Kiểm tra dữ liệu (Validation)
    $request->validate([
        'movie_name'    => 'required',
        'movie_name_vn' => 'required',
        'release_date'  => 'required|date_format:Y-m-d',
        'overview_vn'   => 'required',
        'image'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'required'    => 'Trường này bắt buộc phải nhập.',
        'date_format' => 'Định dạng ngày phải là yyyy-mm-dd.',
        'image'       => 'Tệp tải lên phải là hình ảnh.',
        'mimes'       => 'Ảnh chỉ chấp nhận định dạng: jpeg, png, jpg, gif.',
    ]);

    // 2. Xử lý lưu ảnh vào thư mục public/storage/images
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('storage/images'), $fileName);
        $imagePath = 'storage/images/' . $fileName;
    }

    // 3. Lưu vào Database
    $movie = new \App\Models\Movie();
    $movie->movie_name = $request->movie_name;
    $movie->movie_name_vn = $request->movie_name_vn;
    $movie->release_date = $request->release_date;
    $movie->overview_vn = $request->overview_vn;
    $movie->image = $imagePath ?? null;
    $movie->status = 1;
    $movie->save();

    return redirect()->route('movies.index')->with('success', 'Thêm phim thành công!');
}
}