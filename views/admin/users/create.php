<div class="container">
  <div class="row g-5">
    <h4 class="mb-3">Create New user</h4>
    <form class="needs-validation" novalidate method="POST" action="/admin/users/store" enctype="multipart/form-data">
        <div class="row g-3">
            <div class="col-sm-6">
              <label for="username" class="form-label">user name</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="username" name="name" placeholder="user name" required>
                <p class="invalid-feedback">user name is required.</p>
              </div>
            </div>
            <div class="col-sm-6">
              <label for="email" class="form-label">User Email:</label>
              <div class="input-group has-validation">
                <input type="email" class="form-control" id="email" name="email" placeholder="User email" required>
                <p class="invalid-feedback">Valid email is required.</p>
              </div>
            </div>
            <hr class="my-4">
            <div class="col-sm-6">
              <label for="password" class="form-label">User Password</label>
              <div class="input-group has-validation">
                <input type="password" class="form-control" id="password" name="password" placeholder="user password" required>
                <p class="invalid-feedback">User password is required.</p>
              </div>
            </div>
            <div class="col-md-6">
              <label for="role" class="form-label">Role</label>
              <select class="form-select" id="role" required name="role_id">
                <option value="">Choose...</option>
                <?php foreach($roles as $role):?>
                  <option value="<?=$role->id?>"><?=$role->name?></option>
                <?php endforeach?>
              </select>
              <p class="invalid-feedback">Please select a valid role.</p>
            </div>
        </div>

        <hr class="my-4">
        <h4 class="mb-3">Status</h4>
        <div class="form-check">
            <input type="checkbox" name="status" class="form-check-input" id="status">
            <label class="form-check-label" for="status">(Check if active)</label>
        </div>

        <hr class="my-4">
        <button class="w-100 btn btn-primary btn-lg" type="submit">Create</button>
    </form>
  </div>
</div>