<?= $this->session->flashdata('message'); ?>
<div class="box">
    <div class="box-body">
        <a href="<?= base_url('users/add'); ?>" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
        <a href="#" id="admin" class="btn btn-flat btn-primary"><i class="fa fa-users"></i> Admin</a>
        <a href="#" id="tenaga_pengajar" class="btn btn-flat btn-primary"><i class="fa fa-users"></i> Tenaga Pengajar</a>
        <a href="#" id="siswa" class="btn btn-flat btn-primary"><i class="fa fa-users"></i> Siswa</a>
        <a href="#" id="semua" class="btn btn-flat btn-primary"><i class="fa fa-users"></i> Semua pengguna</a>
    </div>
</div>




<div class="box" id="semua_data">
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



<div class="box" id="admin_data">
    <div class="box-header">
        <h3 class="box-title">Data Admin</h3>
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
                foreach ($admin as $usr) : ?>
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

<div class="box" id="tenagaPengajar_data">
    <div class="box-header">
        <h3 class="box-title">Data Tenaga Pengajar</h3>
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
                foreach ($tenaga_pengajar as $usr) : ?>
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


<div class="box" id="siswa_data">
    <div class="box-header">
        <h3 class="box-title">Data Siswa</h3>
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
                foreach ($siswa as $usr) : ?>
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


<script>
    $(document).ready(function() {
        $('#semua_data').hide();
        $('#admin_data').hide();
        $('#tenagaPengajar_data').hide();
        $('#siswa_data').hide();
        $('#admin').click(function() {
            $('#semua_data').hide();
            $('#siswa_data').hide();
            $('#tenagaPengajar_data').hide();
            $('#admin_data').fadeIn("slow");
        });
        $('#tenaga_pengajar').click(function() {
            $('#semua_data').hide();
            $('#siswa_data').hide();
            $('#admin_data').hide();
            $('#tenagaPengajar_data').fadeIn("slow");
        });
        $('#siswa').click(function() {
            $('#semua_data').hide();
            $('#tenagaPengajar_data').hide();
            $('#admin_data').hide();
            $('#siswa_data').fadeIn("slow");
        });
        $('#semua').click(function() {
            $('#tenagaPengajar_data').hide();
            $('#admin_data').hide();
            $('#siswa_data').hide();
            $('#semua_data').fadeIn("slow");
        });
    });
</script>