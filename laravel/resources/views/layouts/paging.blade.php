@if(isset($page))
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

        </div>
    </div>
@endif
