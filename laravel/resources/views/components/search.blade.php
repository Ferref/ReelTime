<form class="flex-row" role="search" method="GET" action="{{ route('home') }}">
    <div id="fast-search-panel" class="d-inline-flex justify-content-center align-items-center">
        <button type="button" id="search" class="btn nav-item text-grey">
            <i class="bi bi-search"></i> Search
        </button>
        <div id="search-box" class="d-none d-inline-flex gap-3">
            <div>
                <input name="query" id="search-input" list="movie-suggestions" class="form-control me-2" type="search" placeholder="Search by keyword(s)" aria-label="Search" />
                <datalist id="movie-suggestions"></datalist>
            </div>
            <button class="btn custom-purple">Go</button>
        </div>
    </div>
    <button type="button" id="filter-switch" class="btn nav-item text-grey">
        <i class="bi bi-filter"></i> Search Filter
    </button>
</form>