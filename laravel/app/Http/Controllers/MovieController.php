<?php

namespace App\Http\Controllers;

use App\Models\UserMovie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    protected string $apiKey;
    protected int $moviesPerPage;
    protected string $source;

    public function __construct()
    {
        $this->apiKey = env('THEMOVIE_API_KEY');
        $this->moviesPerPage = 18;
        $this->source = 'https://api.themoviedb.org/3/';
    }

    public function getMovies(Request $request)
    {
        $validated = $request->validate([
            'page' => 'integer|min:1|max:500',
            'sort_by' => 'string|nullable',
            'query' => 'string|nullable',
            'genre' => 'array|nullable',
            'release_year_from' => 'integer|nullable',
            'release_year_to' => 'integer|nullable',
            'min_imdb' => 'integer|nullable',
            'include_adult' => 'boolean|nullable|default:false'
        ]);

        $page = $validated['page'] ?? 1;
        $sortBy = $validated['sort_by'] ?? 'popularity.desc';

        $keywordId = null;
        $joinedQuery = null;

        if (!empty($validated['query'])) {
            $joinedQuery = implode('+', explode(' ', trim($validated['query'])));

            $searchKeywordResponse = Http::get("{$this->source}search/keyword", [
                'api_key' => $this->apiKey,
                'query' => $joinedQuery,
            ]);

            $queryResults = $searchKeywordResponse->json()['results'] ?? [];
            $keywordId = $queryResults[0]['id'] ?? null;
        }

        $params = [
            'api_key' => $this->apiKey,
            'page' => $page,
            'sort_by' => $sortBy,
        ];

        if ($joinedQuery) {
            $params['query'] = $joinedQuery;
        }

        if ($keywordId) {
            $params['with_keywords'] = $keywordId;
        }

        if (!empty($validated['genre'])) {
            $params['with_genres'] = $validated['genre'];
        }

        if (!empty($validated['release_year_from'])) {
            $params['primary_release_date.gte'] = $validated['release_year_from'] . '-01-01';
        }

        if (!empty($validated['release_year_to'])) {
            $params['primary_release_date.lte'] = $validated['release_year_to'] . '-12-31';
        }

        if (!empty($validated['min_imdb'])) {
            $params['vote_average.gte'] = $validated['min_imdb'];
        }

        if (array_key_exists('include_adult', $validated)) {
            $params['include_adult'] = $validated['include_adult'];
        }

        $url = "{$this->source}discover/movie";
        $response = Http::get($url, $params);

        $movies = $response->json();
        $movies['results'] = collect($movies['results'] ?? [])
            ->whereNotNull('poster_path')
            ->values();

        return view('home', compact('movies', 'page'));
    }

    public function getMovieDetails($id)
    {
        $url = "{$this->source}movie/{$id}";

        $response = Http::get($url, [
            'api_key' => $this->apiKey,
        ]);

        if ($response->failed()) {
            abort(404, 'Movie not found');
        }

        $details = $response->json();

        return view('details', compact('details'));
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
        $ids = $user->UserMovies->pluck('watchlist_id');

        $validated = $request->validate([
            'page' => 'integer|min:1|max:500',
            'sort_by' => 'string|nullable'
        ]);

        $page = floor(($validated['page'] ?? 0) / $this->moviesPerPage) + 1;
        $sortBy = $validated['sort_by'] ?? 'popularity.desc';

        $movies = $ids->map(function ($tmdbId) use ($sortBy) {
            $resp = Http::get("{$this->source}movie/{$tmdbId}", [
                'api_key' => $this->apiKey,
                'sort_by' => $sortBy,
            ]);

            return $resp->successful() ? $resp->json() : null;
        })->filter();

        // If no result found suggest 3 random movies with messageBox
        $emptyList = false;
        if ($movies->isEmpty()) {
            $emptyList = true;

            $url = "{$this->source}discover/movie";
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