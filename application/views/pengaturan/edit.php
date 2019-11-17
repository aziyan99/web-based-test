<?= validation_errors(
    '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
    '</div>'
); ?>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Ubah nama sistem</h3>
    </div>
    <div class="box-body">
        <form action="<?= base_url('pengaturan/edit') ?>" class="form" method="post">
            <div class="form-group">
                <label for="nama_sistem">Nama sistem</label>
                <input type="text" class="form-control" name="nama_sistem" id="nama_sistem" value="<?= $pengaturan['nama_sistem']; ?>">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
    </div>
</div>