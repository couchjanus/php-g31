<div class="mt-3 d-flex justify-content-between">
  <h2>Categories list</h2>
  <a href="/admin/categories/create" class="btn btn-primary">Add new</a>
</div>


<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Actions</th> 
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categories as $category):?>
            <tr>
              <td><?=$category->id?></td>
              <td><?=$category->name?></td>
              <td>
                <a class="btn btn-info" href="/admin/categories/edit/<?=$category->id?>">Edit</a>
                <a class="btn btn-danger" href="/admin/categories/destroy/<?=$category->id?>">Delete</a>
            </td>   
            </tr>
            <?php endforeach?>
            
          </tbody>
        </table>
</div>