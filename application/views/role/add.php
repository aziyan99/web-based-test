<?= validation_errors(
    '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
    '</div>'
); ?>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Data Hak Akses</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?= base_url('role/add'); ?>" method="post" class="form">
            <div class="form-group">
                <label for="role">Nama Hak Akses</label>
                <input type="text" name="role" id="role" class="form-control" value="<?= set_value('role'); ?>">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->