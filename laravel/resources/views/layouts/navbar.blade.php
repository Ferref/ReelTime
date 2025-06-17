<nav class="navbar navbar-expand-lg position-fixed container-fluid m-0 top-0 z-3 navbar-dark custom-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MyMovies</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="w-100 d-flex justify-content-center">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
