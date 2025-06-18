<div class="card mx-2 p-3 custom-dark col-11 col-md-5 col-xl-3">
  <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
  <div class="card-body d-flex flex-column justify-content-between">
    <h3 class="mx-auto card-title my-3">{{ $movie['title'] }}</h3>
    <p class="card-text">{{ $movie['overview'] }}</p>
    <div class="d-flex w-100">
      <a href="{{ route('movie.details', $movie['id']) }}" class="btn btn-outline-light w-50 me-2">Movie details</a>
        @if(request()->routeIs('watchlater'))
          @include('components.card.RemoveFromWatchlist', ['movie' => $movie])
        @else
          @include('components.card.AddToWatchlist', ['movie' => $movie])
        @endif
    </div>
  </div>
</div>