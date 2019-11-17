<?= validation_errors(
    '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
    '</div>'
); ?>

<div class="box">
    <div class="box-header with-border">
        <i class="fa fa-bullhorn"></i>

        <h3 class="box-title">Mohon Di Baca!</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="callout callout-info">
            <h4>Edit Profile</h4>

            <p>Ketika anda mengubah data profile anda, maka anda akan langsung keluar dari sistem mohon untuk login dengan data yang baru anda ubah</p>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Profile</h3>
    </div>
    <div class="box-body">
        <form action="<?= base_url('profile/edit'); ?>" class="form" method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $profile['id']; ?>">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $profile['nama']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?= $profile['email']; ?>">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            <button type="reset" class="btn btn-sm btn-warning">Reset</button>
        </form>
    </div>
</div>