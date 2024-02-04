<div class="mt-3 d-flex justify-content-between">
  <h2>Users Management</h2>
  <a href="/admin/users/create"><button class="btn btn-primary">Add New</button></a>
</div>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">User name</th>
        <th scope="col">User email</th>
        <th scope="col">User status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user):?>
      <tr>
        <td><?=$user->id?></td>
        <td><?=$user->name?></td>
        <td><?=$user->email?></td>
        <td><?=$user->status?></td>
        <td>
          <a href="/admin/users/edit/<?=$user->id?>"><button class="btn btn-warning">Edit</button></a>
          <form action="/admin/users/destroy/<?=$user->id?>" method="POST" style="display: inline-block;">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="id" value="<?=$user->id?>">
              <input type="submit" class="btn btn-xs btn-danger" value="delete">
          </form>
        </td>
      </tr>
      <?php endforeach?>
    </tbody>
  </table>
</div>