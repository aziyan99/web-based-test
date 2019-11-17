<?= validation_errors(
    '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
    '</div>'
); ?>

<?= $this->session->flashdata('message'); ?>

<div class="box">
    <div class="box-header with-border">
        <i class="fa fa-bullhorn"></i>

        <h3 class="box-title">Mohon Di Baca!</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="callout callout-info">
            <h4>Edit Profile</h4>

            <p>Ketika anda mengubah kata sandi anda, maka anda akan langsung keluar dari sistem mohon untuk login dengan data yang baru anda ubah</p>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Ubah Kata Sandi</h3>
    </div>
    <div class="box-body">
        <form action="<?= base_url('profile/password'); ?>" method="post" class="form">
            <div class="form-group">
                <label for="password1">Kata sandi baru</label>
                <input type="text" name="password1" id="password1" class="form-control">
            </div>
            <div class="form-group">
                <label for="password2">Ulangi kata sandi baru</label>
                <input type="text" name="password2" id="password2" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Kata sandi Lama</label>
                <input type="text" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
    </div>
</div>