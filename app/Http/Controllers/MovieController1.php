<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController1 extends Controller
{

    public function show($id)
    {
        $title = 'Chi tiết phim';

        $genre = DB::table('genre')->get();

        $movie = DB::table('movie')
            ->where('id', $id)
            ->first();

        if (!$movie) {
            abort(404);
        }

        return view('movie.detail', compact('title', 'genre', 'movie'));
    }

    public function search(Request $request)
    {
        $title = 'Kết quả tìm kiếm';

        $genre = DB::table('genre')->get();

        $keyword = $request->keyword;

        $movies = DB::select(
            "select * from movie where movie_name_vn like ?",
            ["%" . $keyword . "%"]
        );

        return view('movie.search', compact('title', 'genre', 'movies', 'keyword'));
    }
}