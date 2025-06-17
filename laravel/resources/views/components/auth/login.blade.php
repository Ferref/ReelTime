<form id="login" name="login-form" method="POST" action="{{ route('login') }}" class="d-none d-flex gap-3 flex-column">
  @csrf
  <img id="star" src="{{ asset('images/icons/movies-svgrepo-com.svg') }}" class="star" alt="movies icon">
  <div class="form-group">
    <label for="username" class="pb-1">Username</label>
    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
  </div>
  <div class="form-group">
    <label for="password" class="pb-1">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Confirm Password" required>
  </div>
  <button type="submit" class="my-1 btn btn-primary w-100">Login</button>
</form>