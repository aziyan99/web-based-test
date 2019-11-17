<?= $this->session->flashdata('message'); ?>
<div class="box">
    <div class="box-body">
        <a href="<?= base_url('access/add'); ?>" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
    </div>
</div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Hak Akses Menu</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Hak Akses</th>
                    <th>Nama Menu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 1;
                foreach ($access as $acc) : ?>
                    <tr>
                        <td><?= $x++; ?></td>
                        <td><?= $acc['role']; ?></td>
                        <td><?= $acc['title']; ?></td>
                        <td>
                            <a onclick="return confirm('Hapus ?' );" href="<?= base_url('access/delete/') . $acc['id']; ?>" class="btn btn-flat btn-xs  btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->