<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function getMovies(Request $request){
        $apiKey = env('THEMOVIE_API_KEY');
        $page = request()->query('page', 1);

        $response = Http::get('https://api.themoviedb.org/3/discover/movie', [
            'api_key' => $apiKey,
            'sort_by' => 'popularity.desc',
            'page' => $page
        ]);

        $movies = $response->json();

        return view('home', compact('movies'));
    }
}
