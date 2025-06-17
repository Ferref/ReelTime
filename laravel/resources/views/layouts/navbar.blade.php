<nav class="navbar navbar-expand-lg navbar-dark custom-dark position-fixed top-0 start-0 end-0 z-2">
  <div class="container-fluid position-relative">

    <a class="navbar-brand position-absolute start-0 top-0 ps-3 z-3" href="#">
      MyMovies
    </a>

    <button class="navbar-toggler ms-auto z-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center z-2" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">Logout</a>
      </ul>
    </div>
  </div>
</nav>
