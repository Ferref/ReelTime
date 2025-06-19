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

    public function __construct() {
        $this->apiKey = env('THEMOVIE_API_KEY');
    }

    public function getMovies(Request $request){

        $page = request()->query('page', 1);

        $url = 'https://api.themoviedb.org/3/discover/movie';
        $response = Http::get($url, [
            'api_key' => $this->apiKey,
            'sort_by' => 'popularity.desc',
            'page' => $page
        ]);

        $movies = $response->json();

        return view('home', compact('movies'));
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

    public function getWatchlater()
    {
        $user = Auth::user();
        $ids  = $user->UserMovies->pluck('watchlist_id');

        $movies = $ids->map(function($tmdbId){
            $resp = Http::get("https://api.themoviedb.org/3/movie/{$tmdbId}", [
                'api_key' => $this->apiKey,
            ]);

            return $resp->successful()
                ? $resp->json()
                : null;
        })->filter();

        return view('watchlater', compact('movies'));
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
