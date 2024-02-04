<div class="mt-3 d-flex justify-content-between">
  <h2>Sections list</h2>
  <a href="/admin/sections/create" class="btn btn-primary">Add new</a>
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
            <?php foreach ($sections as $section):?>
            <tr>
              <td><?=$section->id?></td>
              <td><?=$section->name?></td>
              <td>
                <a class="btn btn-info" href="/admin/sections/edit/<?=$section->id?>">Edit</a>
                <a class="btn btn-danger" href="/admin/sections/destroy/<?=$section->id?>">Delete</a>
            </td>   
            </tr>
            <?php endforeach?>
            
          </tbody>
        </table>
</div>