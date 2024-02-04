<div class="mt-3 d-flex justify-content-between">
  <h2>Roles Management</h2>
  <a href="/admin/roles/create"><button class="btn btn-primary">Add New</button></a>
</div>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Role name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($roles as $role):?>
      <tr>
        <td><?=$role->id?></td>
        <td><?=$role->name?></td>
        <td><a href="/admin/roles/edit/<?=$role->id?>"><button class="btn btn-warning">Edit</button></a>

          <form action="/admin/roles/destroy/<?=$role->id?>" method="POST" style="display: inline-block;">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="id" value="<?=$role->id?>">
              <input type="submit" class="btn btn-xs btn-danger" value="delete">
          </form>
        </td>
      </tr>
      <?php endforeach?>
    </tbody>
  </table>

</div>