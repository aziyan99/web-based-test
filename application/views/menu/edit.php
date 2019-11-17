<?= validation_errors(
	'<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
	'</div>'
); ?>


<div class="box">
	<div class="box-header">
		<h3>Edit Menu</h3>
	</div>
	<div class="box-body">
		<form action="<?= base_url('menu/edit'); ?>" class="form">
			<input type="hidden" value="<?= $menu['id']; ?>" name="id">
			<div class="form-group">
				<label>Nama Menu</label>
				<input type="text" class="form-control" name="title" value="<?= $menu['title']; ?>">
			</div>
			<div class="form-group">
				<label>Icon Menu</label>
				<input type="text" class="form-control" name="icon" value="<?= $menu['icon']; ?>">
			</div>
			<div class="form-group">
				<label>Url Menu</label>
				<input type="text" class="form-control" name="url" value="<?= $menu['url']; ?>">
			</div>
			<div class="form-group">
				<label>Status Menu</label>
				<input type="text" class="form-control" name="is_active" value="<?= $menu['is_active']; ?>">
			</div>
			<button type="submit" class="btn btn-primary">Save</button>
			<button type="reset" class="btn btn-warning">Reset</button>
		</form>
	</div>
	
</div>