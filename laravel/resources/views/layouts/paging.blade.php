<div class="paging container-fluid">
  <div class="d-flex justify-content-center align-items-center w-100">
    <div class="paging-panel d-flex gap-3 custom-dark px-4 rounded justify-content-center">
      <a href="{{ route('home', ['page' => max($page - 1, 1)]) }}" class="text-decoration-none">
        <i class="bi step bi-skip-backward-fill fs-4 text-white"></i>
      </a>
      <span class="page-number fs-4 text-white">{{ $page }}</span>
      <a href="{{ route('home', ['page' => $page + 1]) }}" class="text-decoration-none">
        <i class="bi step bi-skip-forward-fill fs-4 text-white"></i>
      </a>

    </div>
  </div>
</div>
