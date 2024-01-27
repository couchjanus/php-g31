<form method="POST" action="/admin/brands/update">
<input type="hidden" name="id" class="form-control"value="<?=$brand->id?>">
<div class="mb-3">
  <label for="name" class="form-label">Brand name</label>
  <input type="text"  name="name" class="form-control" id="name" value="<?=$brand->name?>">
</div>
<div class="mb-3">
  <label for="description" class="form-label">Brand description</label>
  <textarea class="form-control" name="description" id="description" rows="3"><?=$brand->description?></textarea>
</div>
<div class="mb-3">
<button type="submit" class="btn btn-primary">Update brand</button>
</div>
</form>