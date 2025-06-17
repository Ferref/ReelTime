<div class="card mx-2 p-3 custom-dark" style="width: 18rem;">
  <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
  <div class="card-body d-flex flex-column justify-content-between">
    <h3 class="mx-auto card-title my-3">{{ $movie['title'] }}</h3>
    <p class="card-text">{{ $movie['overview'] }}</p>
    <a href="#" class="btn custom-btn">Movie details</a>
  </div>
</div>
