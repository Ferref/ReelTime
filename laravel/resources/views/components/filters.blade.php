<div class="container-fluid d-flex justify-content-around">
  <div class="col-3 d-none d-md-flex justify-content-center align-items-center">
    <img src="{{ asset('images/icons/Cat.png') }}" alt="Cat" class="ps-5">
  </div>

  <form class="col-6 p-4 d-flex flex-column gap-4" method="GET" action="{{ route('home') }}">
    <div>
      <h3 class="form-label">Genre</h3>
      <div class="d-flex flex-wrap gap-2">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreHorror" name="genre[]" value="horror">
          <label class="form-check-label" for="genreHorror">Horror</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreComedy" name="genre[]" value="comedy">
          <label class="form-check-label" for="genreComedy">Comedy</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreAction" name="genre[]" value="action">
          <label class="form-check-label" for="genreAction">Action</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreDrama" name="genre[]" value="drama">
          <label class="form-check-label" for="genreDrama">Drama</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreSciFi" name="genre[]" value="sci-fi">
          <label class="form-check-label" for="genreSciFi">Sci-Fi</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreRomance" name="genre[]" value="romance">
          <label class="form-check-label" for="genreRomance">Romance</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreThriller" name="genre[]" value="thriller">
          <label class="form-check-label" for="genreThriller">Thriller</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreAnimation" name="genre[]" value="animation">
          <label class="form-check-label" for="genreAnimation">Animation</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreFantasy" name="genre[]" value="fantasy">
          <label class="form-check-label" for="genreFantasy">Fantasy</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreDocumentary" name="genre[]" value="documentary">
          <label class="form-check-label" for="genreDocumentary">Documentary</label>
        </div>
      </div>
    </div>

    <div>
      <h3 class="form-label">Age Restricted</h3>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="ageRestricted" name="age_restricted">
        <label class="form-check-label" for="ageRestricted">Show age restricted movies too?</label>
      </div>
    </div>

    <div>
      <h3 class="form-label">Release Year</h3>
      <div class="row g-2">
        <div class="col">
          <input type="number" class="form-control" id="releaseYearFrom" name="release_year_from" placeholder="From">
        </div>
        <div class="col">
          <input type="number" class="form-control" id="releaseYearTo" name="release_year_to" placeholder="To">
        </div>
      </div>
    </div>

    <div>
      <h3 class="form-label">Min IMDB Rating</h3>
      <input type="number" class="form-control" id="imdbRating" name="min_imdb_rating" step="0.1" min="0" max="10" placeholder="...">
    </div>

    <div>
      <h3 class="form-label mb-1">Sort by</h3>
      <select class="form-select form-select-sm" name="sort_by" id="sort_by">
        <option value="popularity.desc">Popularity Desc</option>
        <option value="popularity.asc">Popularity Asc</option>
        <option value="release_date.desc">Release Desc</option>
        <option value="release_date.asc">Release Asc</option>
        <option value="vote_average.desc">Rating Desc</option>
        <option value="vote_average.asc">Rating Asc</option>
      </select>
    </div>

    <button type="submit" id="search" class="btn nav-item text-grey bg-light">
      <i class="bi bi-search"></i>
    </button>
  </form>

  <div class="col-3 d-none d-md-flex justify-content-center align-items-center">
    <img src="{{ asset('images/icons/Popcorn.png') }}" alt="Cat" class="ps-5">
  </div>
</div>
