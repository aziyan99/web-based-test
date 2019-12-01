<?= $this->session->flashdata('message'); ?>
<div class="row">
  <div class="col-md-7 col-lg-7 col-sm-7">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Semua Mata Pelajaran</h3>
        <div class="pull-right box-tools">
            <a href="<?= base_url('pengaturan_sekolah/mata_pelajaran'); ?>" class="btn btn-info btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama mata pelajaran</th>
                    <th width="100">Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach($mapel as $data): ?>
                <tr>
                  <td><?= $data['nama_mapel']; ?></td>
                  <td>
                    <a href="<?= base_url('pengaturan_sekolah/ubah_mata_pelajaran/') .$data['id']; ?>" class="btn btn-warning btn-xs btn-flat"><i class="glyphicon glyphicon-pencil"></i> </a>
                    <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="<?= base_url('pengaturan_sekolah/hapus_mata_pelajaran/') . $data['id']; ?>" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-remove"></i> </a>
                  </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>


  </div>

  <div class="col-md-5 col-lg-5 col-sm-5">
    <form action="<?= base_url('pengaturan_sekolah/ubah_mapel'); ?>" method="post">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Ubah Mata pelajaran</h3>
        <div class="pull-right box-tools">
            <button type="submit" class="btn btn-primary btn-flat" id="btn_s"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label>Nama Mata Pelajaran</label>
          <input type="hidden" name="id" value="<?= $mapel_where['id']; ?>">
          <input type="text" name="nama_mapel" id="nama_mapel" class="form-control" value="<?= $mapel_where['nama_mapel'] ?>">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
