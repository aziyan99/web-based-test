<?= validation_errors(
    '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
    '</div>'
); ?>

<?= $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Menu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id Menu</th>
                            <th>Nama Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <td><?= $m['id']; ?></td>
                                <td><?= $m['title']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-sm-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Hak Akses</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id Hak Akses</th>
                            <th>Nama Hak Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($role as $r) : ?>
                            <tr>
                                <td><?= $r['id']; ?></td>
                                <td><?= $r['role']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>


<div class="box">
    <div class="box-header with-border">
        <i class="fa fa-bullhorn"></i>

        <h3 class="box-title">Mohon Di Baca!</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="callout callout-info">
            <h4>Cara menambah hak akses menu</h4>

            <p>Pilih salah satu id role atau id hak akses yang akan akan beri hak akses ke menu kemudian anda pilih id menu nya</p>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Hak Akses Menu</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?= base_url('access/add'); ?>" method="post" class="form">
            <div class="form-group">
                <label for="role_id">ID Role atau ID Hak Akses</label>
                <input type="text" name="role_id" id="role_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="menu_id">ID Menu</label>
                <input type="text" name="menu_id" id="menu_id" class="form-control">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->