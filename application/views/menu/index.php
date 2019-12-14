<?= $this->session->flashdata('message'); ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Menu</h3>
        <div class="pull-right box-tools">
            <a href="#" class="btn btn-primary btn-flat" data-target="#add" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Icon</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 1;
                foreach ($menu as $m) : ?>
                    <tr>
                        <td><?= $x++; ?></td>
                        <td><?= $m['title']; ?></td>
                        <td><?= $m['icon']; ?>-<i class="<?= $m['icon']; ?>"></i></td>
                        <td><?= $m['url']; ?></td>
                        <td>
                            <?php if ($m['is_active'] != 1) : ?>
                                <span class="badge">Tidak Aktif</span>
                            <?php else : ?>
                                <span class="badge">Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('menu/ubah/') . $m['id']; ?>" class="btn btn-flat btn-xs  btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a onclick="return confirm('Anda yakin ingin menghapus menu ini ?');" href="<?= base_url('menu/delete/') . $m['id']; ?>" class="btn btn-flat btn-xs  btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<div class="modal modal-default fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Menu</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu/save'); ?>" method="post">
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Icon Menu</label>
                        <input type="text" name="icon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Link Menu</label>
                        <input type="text" name="url" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status Menu</label>
                        <select name="is_active" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Batal</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->