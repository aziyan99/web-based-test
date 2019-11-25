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
                            <a href="<?= base_url('role/ubah/') . $r['id']; ?>" class="btn btn-flat btn-xs  btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="#" class="btn btn-flat btn-xs  btn-danger" data-toggle="modal" data-target="#hapus<?= $r['id']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<?php foreach ($role as $r) :  ?>
    <div class="modal modal-danger fade" id="hapus<?= $r['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi hapus</h4>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus hak akses ini ? Semua pengguna dengan hak akses ini akan terhapus, dan tidak punya akses ke sistem lagi</p>
                </div>
                <form action="<?= base_url('role/delete'); ?>" method="post">
                    <input type="hidden" name="id" value="<?= $r['id']; ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline">Hapus</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
<?php endforeach;  ?>