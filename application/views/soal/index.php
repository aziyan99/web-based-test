<?= $this->session->flashdata('message'); ?>
<div class="box">
    <div class="box-body">
        <a href="<?= base_url('soal/tambah'); ?>" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
    </div>
</div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Soal dan Pembahasan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Soal</th>
                    <th width="100">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $x = 1; ?>
                <?php foreach ($soal as $data) : ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td>
                            <?php
                                $soalB = htmlspecialchars_decode($data['soal']);
                                $soal = word_limiter($soalB, 4);
                                echo $soal;
                                ?>
                        </td>
                        <td>
                            <a href="<?= base_url('soal/detail/') . $data['id']; ?>" class="btn btn-flat btn-xs  btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="<?= base_url('soal/ubah/') . $data['id']; ?>" class="btn btn-flat btn-xs  btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a onclick="return confirm('Hapus soal ini ?' );" href="<?= base_url('soal/hapus/') . $data['id']; ?>" class="btn btn-flat btn-xs  btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->