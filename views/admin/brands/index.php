<h1>Brands list</h1>

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
            <?php foreach ($brands as $brand):?>
            <tr>
              <td><?=$brand->id?></td>
              <td><?=$brand->name?></td>
              <td>
                <a class="btn btn-info" href="/admin/brands/edit/<?=$brand->id?>">Edit</a>
                <a class="btn btn-danger" href="/admin/brands/destroy/<?=$brand->id?>">Delete</a>
            </td>   
            </tr>
            <?php endforeach?>
            
          </tbody>
        </table>
</div>