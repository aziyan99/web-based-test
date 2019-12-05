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
                    <th>Mata Pelajaran</th>
                    <th width="150">Kelas</th>
                </tr>
            </thead>
            <tbody>
                <?php $x = 1; ?>
                <?php foreach ($mapel as $data) : ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td><?= $data['nama_mapel'] ?></td>
                        <td>
                            <form action="<?= base_url('soal/lihat'); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="hidden" name="id_mapel" value="<?= $data['id']; ?>">
                                            <select name="id_kelas" id="id_kelas" class="form-control">
                                                <?php foreach ($kelas as $data) : ?>
                                                    <option value="<?= $data['id']; ?>"><?= $data['nama_kelas']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <button type="submit" class="btn btn-primary btn-flat btn-sm">Lihat</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->