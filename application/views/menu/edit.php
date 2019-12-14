<?= validation_errors(
	'<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
	'</div>'
); ?>


<div class="box">
	<div class="box-header">
		<h3></h3>
		<div class="pull-right box-tools">
			<a href="<?= base_url('menu'); ?>" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
		</div>
	</div>
	<div class="box-body">
		<form action="<?= base_url('menu/simpanEdit'); ?>" class="form" method="post">
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
				<label>Link Menu</label>
				<input type="text" class="form-control" name="url" value="<?= $menu['url']; ?>">
			</div>
			<div class="form-group">
				<label>Status Menu</label>
				<select name="is_active" class="form-control">
					<option value="<?= $menu['is_active'] ?>">
						<?php if ($menu['is_active'] == 1) : echo 'Aktif';
						else : echo 'Tidak Aktif';
						endif; ?>
					</option>
					<option value="1">Aktif</option>
					<option value="0">Tidak Aktif</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Simpan</button>
			<button type="reset" class="btn btn-warning"> <i class="fa fa-refresh"></i> Reset</button>
		</form>
	</div>

</div>