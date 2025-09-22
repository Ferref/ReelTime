<div id="filter-box" class="d-none container-fluid position-fixed z-3 text-dark d-flex justify-content-center align-items-center w-100 h-100">
    <div class="blur position-absolute h-100 container-fluid z-1 d-block"></div>
    <div class="filter-inner d-flex justify-content-between custom-dark container col-12 col-md-9 position-absolute z-3 h-100">
        <div class="container-fluid position-relative d-flex">
            <form class="p-4" method="GET" action="{{ route('home') }}">
                <div class="row align-items-center mb-4">
                <div class="col-3 d-none d-xl-flex justify-content-center align-items-center">
                    <img src="{{ asset('images/icons/Cat.png') }}" alt="Cat" class="w-100 me-5">
                </div>
                <div class="col-12 col-xl-6">
                    <h4 class="form-label">Title (or keywords)</h4>
                    <input type="text" class="form-control" id="advanced-search-input" name="title-query-input" placeholder="...">
                </div>
                <div class="col-3 d-none d-xl-flex justify-content-center align-items-center">
                    <img src="{{ asset('images/icons/Popcorn.png') }}" alt="Popcorn" class="w-100 ps-5">
                </div>
                </div>
                <div class="row g-4 justify-content-between position-relative d-flex h-50">
                    <div class="col-12">
                        <h4 class="form-label">Genre</h4>
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
                <div class="col-12 col-md-2">
                    <h4 class="form-label">Age Restricted</h4>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="includeAdult" name="include_adult">
                    <label class="form-check-label" for="includeAdult">Include 18+</label>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <h4 class="form-label">Release Year</h4>
                    <div class="row g-2">
                    <div class="col">
                        <input type="number" class="form-control" id="releaseYearFrom" name="release_year_from" placeholder="From">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" id="releaseYearTo" name="release_year_to" placeholder="To">
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <h4 class="form-label d-flex">Min IMDB</h4>
                    <input type="number" class="form-control" id="imdbRating" name="min_imdb_rating" step="0.1" min="0" max="10" placeholder="...">
                </div>
                <div class="col-12 col-md-2">
                    <h4 class="form-label mb-1">Sort by</h4>
                    <select class="form-select form-select-sm" name="sort_by" id="sort_by">
                    <option value="popularity.desc">Popularity ↓</option>
                    <option value="popularity.asc">Popularity ↑</option>
                    <option value="release_date.desc">Release ↓</option>
                    <option value="release_date.asc">Release ↑</option>
                    <option value="vote_average.desc">Rating ↓</option>
                    <option value="vote_average.asc">Rating ↑</option>
                    </select>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" id="search" class="btn nav-item text-grey custom-purple">
                    <i class="bi bi-search"></i>
                    </button>
                    <button type="button" class="btn nav-item text-grey bg-danger text-white btn-custom-close" aria-label="Close">Close</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>