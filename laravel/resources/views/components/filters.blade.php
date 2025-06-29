<div class="container-fluid d-flex justify-content-around">
  <div class="d-none d-md-flex justify-content-center align-items-center">
    <img src="{{ asset('images/icons/Cat.png') }}" alt="Cat" class="ps-5">
  </div>
  <form class="p-4 d-flex flex-column gap-3">
    <div>
      <h3 class="form-label">Genre</h3>
      <div class="d-flex flex-wrap gap-2">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreHorror" value="horror">
          <label class="form-check-label" for="genreHorror">Horror</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreComedy" value="comedy">
          <label class="form-check-label" for="genreComedy">Comedy</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreAction" value="action">
          <label class="form-check-label" for="genreAction">Action</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreDrama" value="drama">
          <label class="form-check-label" for="genreDrama">Drama</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreSciFi" value="sci-fi">
          <label class="form-check-label" for="genreSciFi">Sci-Fi</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreRomance" value="romance">
          <label class="form-check-label" for="genreRomance">Romance</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreThriller" value="thriller">
          <label class="form-check-label" for="genreThriller">Thriller</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreAnimation" value="animation">
          <label class="form-check-label" for="genreAnimation">Animation</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreFantasy" value="fantasy">
          <label class="form-check-label" for="genreFantasy">Fantasy</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="genreDocumentary" value="documentary">
          <label class="form-check-label" for="genreDocumentary">Documentary</label>
        </div>
      </div>
    </div>

    <div>
      <h3 class="form-label">Age Restricted</h3>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="ageRestricted">
        <label class="form-check-label" for="ageRestricted">Show age restricted movies too?</label>
      </div>
    </div>

    <div>
      <h3 class="form-label">Release Year</h3>
      <div class="row g-2">
        <div class="col">
          <input type="number" class="form-control" id="releaseYearFrom" placeholder="From">
        </div>
        <div class="col">
          <input type="number" class="form-control" id="releaseYearTo" placeholder="To">
        </div>
      </div>
    </div>

    <div>
      <h3 class="form-label">Min IMDB Rating</h3>
      <input type="number" class="form-control" id="imdbRating" step="0.1" min="0" max="10" placeholder="...">
    </div>

      <button type="button" id="search" class="btn nav-item text-grey bg-light">
          <i class="bi bi-search"></i>
      </button>

      <button type="submit" class="btn btn-sm custom-purple">Apply</button>
  </form>
</div>
