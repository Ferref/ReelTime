<div class="card" style="width: 18rem;">
  <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
  <div class="card-body">
    <h5 class="card-title">{{ $movie['title'] }}</h5>
    <p class="card-text">{{ $movie['overview'] }}</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
