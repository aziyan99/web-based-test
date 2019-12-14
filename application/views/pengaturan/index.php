<?= $this->session->flashdata('message'); ?>

<div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
        <a href="<?= base_url('pengaturan/backupDatabase'); ?>" class="btn btn-flat btn-primary"> <i class="fa fa-database"></i> Backup Database</a>
        <a href="#" class="btn btn-flat btn-primary" data-target="#file" data-toggle="modal"> <i class="fa fa-folder-open"></i> File Manager</a>
    </div>

</div>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Informasi Sistem</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Sistem</th>
                    <td><?= $pengaturan['nama_sistem']; ?></td>
                </tr>
            </thead>

        </table>
        <br>
        <a href="<?= base_url('pengaturan/edit'); ?>" class="btn btn-sm btn-primary"> <i class="fa fa-pencil"></i> Edit</a>

    </div>

</div>


<div class="modal modal-default fade" id="file">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Peringatan</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    Kamu akan dialihkan ke halaman baru, username: <b>admin</b>, kata sandi: <b>admin@123</b><br>
                    Selalu gunakan tombol <i><b>Logout</b></i> ketika anda keluar!
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Batal</button>
                <a href="<?= base_url('filemanager'); ?>" target="_blank" class="btn btn-primary btn-flat"><i class="fa fa-external-link"></i> Pergi</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->