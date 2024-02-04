
<div class="container">
  <div>

    <div class="row g-5">
      
      <div class="col-auto">
        <h4 class="mb-3">Edit user</h4>
        <form class="needs-validation" novalidate method="POST" action="/admin/users/update" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?=$user->id?>">
          
          <div class="row g-3">
          
            <div class="col-sm-6">
              <label for="username" class="form-label">User name</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="username" name="name" value="<?=$user->name?>" required>
              <div class="invalid-feedback">
                  user name is required.
                </div>
              </div>
            </div>
            
            <div class="col-sm-6">
              <label for="email" class="form-label">User Email:</label>
              <div class="input-group has-validation">
                <input type="email" class="form-control" id="email" name="email"  value="<?=$user->email?>" required>
                <div class="invalid-feedback">
                  Valid email is required.
                </div>
              </div>
            </div>
            
            
            <div class="col-md-6">
              <label for="role" class="form-label">Role</label>
              <select class="form-select" id="role" required name="role_id">
                <option value="">Choose...</option>
                <?php foreach($roles as $role):?>
                <option value="<?=$role->id?>" <?php echo ($role->id == $user->role_id ? "selected" : "")?>><?=$role->name?></option>
                <?php endforeach?>
              </select>
              <div class="invalid-feedback">
                Please select a valid role.
              </div>
          </div>

          </div>


          <h4 class="mb-3">Status</h4>
          <div class="form-check">
            <input type="checkbox" name="status" class="form-check-input" id="status" <?php echo ($user->status == 1)? 'checked': '';?>>
            <label class="form-check-label" for="status">(Check if active)</label>
          </div>

          

          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>

  
</div>