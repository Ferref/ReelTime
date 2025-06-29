<div class="paging container-fluid w-100 py-3">
    <div class="row align-items-center justify-content-between g-3">

        <div class="col-12 col-md-auto">
            <div class="paging-panel d-flex gap-3 custom-dark px-4 py-2 rounded justify-content-center align-items-center">
                <a href="{{ route('home', ['page' => max($page - 1, 1), 'sort_by' => request('sort_by')]) }}" class="text-decoration-none">
                    <i class="bi bi-skip-backward-fill fs-4 text-white"></i>
                </a>
                <span class="page-number fs-4 text-white">{{ $page }}</span>
                <a href="{{ route('home', ['page' => max($page + 1, 1), 'sort_by' => request('sort_by')]) }}" class="text-decoration-none">
                    <i class="bi bi-skip-forward-fill fs-4 text-white"></i>
                </a>
            </div>
        </div>

        <div class="col-12 col-md-auto ">
            <form method="GET" action="{{ route('home') }}" class="d-flex flex-wrap align-items-center justify-content-center gap-2">
                <label for="sort_by" class="form-label mb-0">Sort by</label>
                <select class="form-select form-select-sm w-auto" name="sort_by" id="sort_by">
                    <option value="popularity.desc">Popularity Desc</option>
                    <option value="popularity.asc">Popularity Asc</option>
                    <option value="release_date.desc">Release Desc</option>
                    <option value="release_date.asc">Release Asc</option>
                    <option value="vote_average.desc">Rating Desc</option>
                    <option value="vote_average.asc">Rating Asc</option>
                </select>
                <button type="submit" class="btn btn-sm custom-purple">Apply</button>
            </form>
        </div>

    </div>
</div>
