<form class="flex-row" role="search">
    <div id="fast-search-panel" class="d-inline-flex">
        <button type="button" id="search" class="btn nav-item text-grey">
            <i class="bi bi-search"></i> Search
        </button>
        <div id="search-box" class="d-none d-inline-flex gap-3">
            <div>
                <input id="search-input" list="movie-suggestions" class="form-control me-2" type="search" placeholder="Search by title" aria-label="Search" />
                <datalist id="movie-suggestions"></datalist>
            </div>
            <button class="btn custom-purple">Go</button>
        </div>
    </div>
    <button type="button" id="filter-switch" class="btn nav-item text-grey">
        <i class="bi bi-filter"></i> Search Filter
    </button>
</form>

<div id="filter-box" class="d-none z-3 position-absolute text-dark start-0 container-fluid d-flex justify-content-center flex-column">
<div class="blur container-fluid vh-100 position-absolute start-0 z-0">AAAA</div>
<button type="button" class="z-3 btn-close btn-close-white mt-4 me-0" aria-label="Close"></button>
    <div class="filter-inner d-flex justify-content-between custom-dark container col-12 col-md-9 py-3">
        @include('components.filters')
    </div>
</div>


            