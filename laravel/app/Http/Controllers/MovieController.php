<?php

namespace App\Http\Controllers;

use App\Models\UserMovie;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected string $apiKey;
    protected string $moviesPerPage;
    protected string $source;

    public function __construct() {
        $this->apiKey = env('THEMOVIE_API_KEY');
        $this->moviesPerPage = 18;
        $this->source = "https://api.themoviedb.org/3/";
    }


    public function getMovies(Request $request){
        $validated = $request->validate([
            'page' => 'integer|min:1|max:500',
            'sort_by' => 'string|nullable',
            'keyword' => 'string|nullable',
            'genre' => 'string|nullable',
            'release_year_from' => 'int|nullable',
            'release_year_to' => 'int|nullable',
            'min_imdb' => 'int|nullable',

        ]);

        $page = $validated['page'] ?? 1;
        $sortBy = $validated['sort_by'] ?? 'popularity.desc';
        
        $baseUrl = '';

        // dd($request);
        
        if($request->has('keyword')){
            $baseUrl = 'https://api.themoviedb.org/3/search/movie';
        }
        else {
            $baseUrl = 'https://api.themoviedb.org/3/discover/movie';
        }

        $params = [
            'api_key' => $this->apiKey,
            'sort_by' => $sortBy,
            'page' => $page,
        ];

        if ($request->has('keyword')) {
            $params['query'] = $request->input('keyword');
        }

        $response = Http::get($baseUrl, $params);

        $movies = $response->json();
        $movies['results'] = collect($movies['results'] ?? [])
            ->whereNotNull('poster_path')
            ->values();

        return view('home', compact('movies', 'page'));
    }

    public function getMovieDetails($id){
        $url = "https://api.themoviedb.org/3/movie/{$id}";

        $response = Http::get($url, [
            'api_key' => $this->apiKey,
        ]);

        if($response->failed()){
            abort(404, "Movie not found");
        }

        $details = $response->json();

        return view("details", compact('details'));
    }

    public function toWatchlist(Request $request, $id)
    {
        try {
            if (!is_numeric($id)) {
                return response()->json(['message' => 'Invalid movie ID.'], 422);
            }

            $user = $request->user();

            $entry = UserMovie::firstOrCreate([
                'user_id' => $user->id,
                'watchlist_id' => $id,
            ]);

            if (!$entry->wasRecentlyCreated) {
                return response()->json(['message' => 'Movie is already in your watchlist']);
            }

            return response()->json(['message' => 'Movie added to watchlist']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function getWatchlater(Request $request)
    {
        $user = Auth::user();
        $ids  = $user->UserMovies->pluck('watchlist_id');

        $validated = $request->validate([
            'page' => 'integer|min:1|max:500',
            'sort_by' => 'string|nullable'
        ]);

        $page = floor(($validated['page'] ?? 0) / $this->moviesPerPage) + 1;
        $sortBy = $validated['sort_by'] ?? 'popularity.desc';

        $movies = $ids->map(function($tmdbId) use($page, $sortBy){
            $resp = Http::get("https://api.themoviedb.org/3/movie/{$tmdbId}", [
                'api_key' => $this->apiKey,
                'sort_by' => $sortBy,
            ]);

            return $resp->successful()
                ? $resp->json()
                : null;
        })->filter();

        // If no result found suggest 3 random movies with messageBox
        $emptyList = false;
        if(count($movies) === 0){
            $emptyList = true;

            $url = 'https://api.themoviedb.org/3/discover/movie';
            $response = Http::get($url, [
                'api_key' => $this->apiKey,
                'sort_by' => 'popularity.desc',
                'page' => rand(1, 500)
            ]);

            $fallbackMovies = $response->json()['results'] ?? [];
            $movies = array_slice($fallbackMovies, 0, 3);
        }
        
        return view('watchlater', compact('movies', 'emptyList'));
    }

    public function removeFromWatchlist(int $id)
    {
        $deleted = UserMovie::where('user_id', Auth::id())
            ->where('watchlist_id', $id)
            ->delete();

        return response()->json(
            ['message' => $deleted ? 'Movie removed' : 'Not found'],
            $deleted ? 200 : 404
        );
    }

}
