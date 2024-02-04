<div class="container">

    <div class="row g-5">
     
      <div class="col-auto">
        <h4 class="mb-3">Create New Role</h4>
        <form class="needs-validation" novalidate method="POST" action="/admin/roles/store" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-12">
              <label for="rolename" class="form-label">Role name</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="rolename" name="name" placeholder="role name" required>
              <div class="invalid-feedback">
                  role name is required.
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Create</button>
        </form>
      </div>
    </div>
  
</div>