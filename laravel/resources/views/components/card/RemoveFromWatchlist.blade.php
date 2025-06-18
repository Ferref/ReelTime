<form action="{{ route('movie.removefromwatchlist', $movie['id']) }}" method="POST" class="flex-fill me-2">
    @csrf
    @method('delete')
    <button type="submit" class="remove messageTrigger btn btn-outline-light w-100">Remove</button>
</form>