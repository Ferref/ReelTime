<form class="d-flex flex-row" role="search">
    <button type="button" id="search" class="btn nav-item text-grey">
        <i class="bi bi-search"></i>
    </button>
    <div id="search-box" class="d-none">
        <div class="d-inline-flex">
            <input id="search-input" list="movie-suggestions" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <datalist id="movie-suggestions"></datalist>
        </div>
    </div>
    <button type="button" id="filter-switch" class="btn nav-item text-grey">
        <i class="bi bi-filter"></i>
    </button>
</form>

<div id="filter-box" class="z-3 position-absolute mt-5 text-dark start-0 container-fluid">
    <div class="filter-inner w-100 d-flex justify-content-center custom-dark">
        @include('components.filters')
    </div>
</div>

            