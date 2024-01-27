<form method="POST" action="/admin/categories/store" enctype="multipart/form-data">
<div class="mb-3">
  <label for="name" class="form-label">Category name</label>
  <input type="text"  name="name" class="form-control" id="name" placeholder="category name">
</div>

<div class="mb-3">
  <label for="section_id" class="form-label">Category section</label>
  <select name="section_id" class="form-select" id="section_id">
    <option value="">Choose...</option>

    <?php foreach ($sections as $section):?>
      <option value="<?=$section->id?>"><?=$section->name?></option>
    <?php endforeach ?>

  </select> 

</div>

<div class="mb-3 input-group">
      <input type="file" name="cover" class="form-controll" id="cover">
      <label for="cover" class="input-group-text">Chooser a file</label>
</div>

<div class="mb-3">
<button type="submit" class="btn btn-primary">Create category</button>
</div>
</form>