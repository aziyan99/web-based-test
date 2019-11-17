<?= $this->session->flashdata('message'); ?>
<div class="row">
    <div class="conttainer">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $this->db->count_all('users'); ?></h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="box">
    <div class="box-body">
        <a href="<?= base_url('users/add'); ?>" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
    </div>
</div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Pengguna</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 1;
                foreach ($user as $usr) : ?>
                    <tr>
                        <td><?= $x++; ?></td>
                        <td><?= $usr['nama']; ?></td>
                        <td><?= $usr['email']; ?></td>
                        <td><img src="<?= base_url('assets/img/profile/') . $usr['img']; ?>" class="user-image" width="40" alt="Profile"></td>
                        <td>
                            <a href="<?= base_url('users/detail/') . $usr['id']; ?>" class="btn btn-flat btn-xs  btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="<?= base_url('users/edit/') . $usr['id']; ?>" class="btn btn-flat btn-xs  btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a onclick="return confirm('Hapus ?' );" href="<?= base_url('users/delete/') . $usr['id']; ?>" class="btn btn-flat btn-xs  btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->