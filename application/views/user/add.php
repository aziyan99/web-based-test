<?= validation_errors(
    '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
    '</div>'
); ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Pengguna</h3>
    </div>
    <div class="box-body">
        <form action="<?= base_url('users/add'); ?>" class="form" method="post">
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <input type="text" name="password1" class="form-control" placeholder="Kata Sandi">
            </div>
            <div class="form-group">
                <input type="text" name="password2" class="form-control" placeholder="Ulangi Kata Sandi">
            </div>
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            <button class="btn btn-sm btn-warning" type="reset">Reset</button>
        </form>
    </div>
</div>