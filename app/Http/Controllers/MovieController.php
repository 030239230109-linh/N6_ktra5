<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MovieController;

class MovieController extends Controller
{
    //
    public function index()
{
    $genres = DB::table('genre')->get();
    $movies = DB::table('movie')
        ->where('popularity', '>', 450)
        ->where('vote_average', '>', 7)
        ->orderBy('release_date', 'desc')
        ->limit(12)
        ->get();

    return view('movie.index', compact('genres', 'movies'));
}
public function trang_the_loai($id)
{
    
    $genres = DB::table('genre')->get();


    $movies = DB::table('movie')
        ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie')
        ->where('movie_genre.id_genre', $id) // Lưu ý dấu gạch dưới nếu DB của bạn có nó
        ->select('movie.*')
        ->distinct()
        ->orderBy('movie.release_date', 'desc')
        ->limit(12)
        ->get();


    $genreName = DB::table('genre')->where('id', $id)->value('genre_name_vn');

    return view('movie.index', compact('genres', 'movies', 'genreName'));
}
}