<nav class="navbar navbar-expand-lg navbar-dark custom-dark position-fixed top-0 start-0 end-0 z-2">
  <div class="container-fluid position-relative">

    <a class="navbar-brand position-absolute start-0 top-0 ps-3 z-3" href="{{ route('home') }}">
      ReelTime
    </a>

    <button id="navbar-toggler-btn" class="navbar-toggler ms-auto z-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center z-2" id="navbarNav">
        <ul class="navbar-nav w-100 d-flex justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('watchlater') }}">Watch Later</a>
            </li>
            <li class="nav-item d-block d-lg-none">
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>

            @if($routeName = Route::currentRouteName() === 'livechat')
              <li id="searchfilter-link" class="d-none nav-item">
                  @include('components.search')
              </li>
              @else
              <li id="searchfilter-link" class="nav-item">
                  @include('components.search')
              </li>
            @endif

            <li class="nav-item">
              <a class="nav-link" href="{{ route('livechat') }}">Live chat</a>
            </li>
        </ul>

    </div>

    <a class="text-grey d-none d-lg-block nav-link position-absolute end-0 top-1 pe-3 z-3" href="{{ route('logout') }}">
      Logout
    </a>



  </div>
</nav>


@stack('scripts')
  @vite(['resources/js/search-panel.js', 'resources/js/filter-toggle.js'])
@endstack