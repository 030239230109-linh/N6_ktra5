<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController1 extends Controller
{
    public function index()
    {
        $title = 'Trang Chủ Movie';

        $genre = DB::table('genre')->get();

        $movies = DB::table('movie')
            ->where('popularity', '>', 450)
            ->where('vote_average', '>', 7)
            ->orderBy('release_date', 'desc')
            ->limit(12)
            ->get();

        return view('movie.index', compact('title', 'genre', 'movies'));
    }

    public function trang_the_loai($id)
    {
        $title = 'Phim theo thể loại';

        $genre = DB::table('genre')->get();

        $movies = DB::table('movie')
            ->join('movie_genre', 'movie.id', '=', 'movie_genre.movie_id')
            ->where('movie_genre.genre_id', $id)
            ->orderBy('movie.release_date', 'desc')
            ->limit(12)
            ->select('movie.*')
            ->get();

        return view('movie.index', compact('title', 'genre', 'movies'));
    }

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