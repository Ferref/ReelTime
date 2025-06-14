<form id="registration" name="reg-form" class="d-flex gap-3 flex-column">
  <div class="form-group">
    <label for="email" class="pb-1">Email</label>
    <input type="text" name="email" id="email" class="form-control" placeholder="Enter email"  required>
  </div>
  <div class="form-group">
    <label for="email" class="pb-1">Confirm Email</label>
    <input type="email" class="form-control" name="email_confirmed" placeholder="confirm email" required>
  </div>
  <div class="form-group">
    <label for="username" class="pb-1">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Enter username" required>
  </div>
    <div class="form-group">
    <label for="password" class="pb-1">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
  </div>
  <div class="form-group">
    <label for="password" class="pb-1">Confirm Password</label>
    <input type="password" name="password_confirmed" class="form-control" placeholder="Confirm Password" required>
  </div>
  <button type="submit" class="my-1 btn btn-success">Register</button>
</form>