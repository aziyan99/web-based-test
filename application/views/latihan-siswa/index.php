<?= $this->session->flashdata('message'); ?>
<?= $pesan; ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Semua yang kamu punya</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Mata Pelajaran</th>
                    <th width="50">Kerjakan</th>
                    <th width="50">Hasil</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mapel as $data) : ?>
                    <tr>
                        <td><?= $data['nama_mapel']; ?></td>
                        <td>
                            <form action="<?= base_url('latihan/mulai'); ?>" method="post">
                                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                <button class="btn btn-primary btn-xs bt-flat"> <i class="fa fa-external-link"></i></button>
                            </form>
                        </td>
                        <td>
                            <a href="<?= base_url('latihan/hasil/') . $data['id']; ?>"><i class="fa fa-file-text"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->