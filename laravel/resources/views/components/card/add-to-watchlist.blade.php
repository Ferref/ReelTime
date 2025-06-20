<form action="{{ route('movie.towatchlist', $movie['id']) }}" method="POST" class="flex-fill me-2">
    @csrf
    <button type="submit" class="messageTrigger btn btn-outline-light w-100">To watchlist</button>
</form>