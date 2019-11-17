<?= $this->session->flashdata('message'); ?>
<div class="box">
    <div class="box-body">
        <a href="<?= base_url('role/add'); ?>" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
    </div>
</div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Hak Akses</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Akses</th>
                    <th>Nama Akses</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 1;
                foreach ($role as $r) : ?>
                    <tr>
                        <td><?= $x++; ?></td>
                        <td><?= $r['id']; ?></td>
                        <td><?= $r['role']; ?></td>
                        <td>
                            <a href="<?= base_url('role/edit/') . $r['id']; ?>" class="btn btn-flat btn-xs  btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a onclick="return confirm('Hapus ?' );" href="<?= base_url('role/delete/') . $r['id']; ?>" class="btn btn-flat btn-xs  btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->