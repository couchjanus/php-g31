<form method="POST" action="/admin/brands/store">
<div class="mb-3">
  <label for="name" class="form-label">Brand name</label>
  <input type="text"  name="name" class="form-control" id="name" placeholder="Brand name">
</div>
<div class="mb-3">
  <label for="description" class="form-label">Brand description</label>
  <textarea class="form-control" name="description" id="description" rows="3"></textarea>
</div>
<div class="mb-3">
<button type="submit" class="btn btn-primary">Create brand</button>
</div>
</form>