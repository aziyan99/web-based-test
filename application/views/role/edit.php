<?= $this->session->flashdata('message') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Ubah Nama Hak Akses</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?= base_url('role/simpan'); ?>" method="post" class="form">
            <div class="form-group">
                <label for="role">Nama Hak Akses</label>
                <input type="hidden" name="id" value="<?= $role['id']; ?>">
                <input type="text" name="role" id="role" class="form-control" value="<?= $role['role']; ?>">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->