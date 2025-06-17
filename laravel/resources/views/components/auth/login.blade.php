<form id="login" name="login-form" method="POST" action="{{ route('login') }}" class="d-none d-flex gap-3 flex-column">
  @csrf
  <div class="img-container w-100 d-flex justify-content-center">
      <img id="avatar" src="{{ asset('images/icons/avatar.png') }}" class="avatar" alt="avatar icon">
  </div>
  <div class="form-group">
    <label for="username" class="pb-3">Username</label>
    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
  </div>
  <div class="form-group">
    <label for="password" class="pb-3">Password</label>
    <input type="password" name="password" class="form-control mb-2" placeholder="Confirm Password" required>
  </div>
  <button type="submit" class="my-2 btn btn-primary w-100">Login</button>
</form>