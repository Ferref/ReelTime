<nav class="navbar navbar-expand-lg navbar-dark custom-dark position-fixed top-0 start-0 end-0 z-2">
  <div class="container-fluid position-relative">

    <a class="navbar-brand position-absolute start-0 top-0 ps-3 z-3" href="{{ route('home') }}">
      MyMovies
    </a>

    <button class="navbar-toggler ms-auto z-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
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
        </ul>

    </div>

    <a id="logout" class="d-none d-lg-block nav-link position-absolute end-0 top-1 pe-3 z-3" href="{{ route('logout') }}">
      Logout
    </a>

    <!-- <form class="d-none d-xl-flex d-flex position-absolute end-0 top-0 ps-3 z-3 px-3" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-light" type="submit">Search</button>
    </form> -->

  </div>
</nav>
