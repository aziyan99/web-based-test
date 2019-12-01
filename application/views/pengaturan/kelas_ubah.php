<div class="row">
  <div class="col-md-7 col-lg-7 col-sm-7">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Semua Kelas</h3>
        <div class="pull-right box-tools">
            <a href="<?= base_url('pengaturan_sekolah/kelas'); ?>" class="btn btn-info btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Kelas</th>
                    <th width="100">Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach($kelas as $data): ?>
                <tr>
                  <td><?= $data['nama_kelas']; ?></td>
                  <td>
                    <a href="<?= base_url('pengaturan_sekolah/kelas/ubah/') . $data['id']; ?>" class="btn btn-warning btn-xs btn-flat"><i class="glyphicon glyphicon-pencil"></i> </a>
                    <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="<?= base_url('pengaturan_sekolah/hapus_kelas/'). $data['id'];?>" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-remove"></i> </a>
                  </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>


  </div>

  <div class="col-md-5 col-lg-5 col-sm-5">
    <form action="<?= base_url('pengaturan_sekolah/simpan_kelas'); ?>" method="post">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Ubah Kelas</h3>
        <div class="pull-right box-tools">
            <button type="submit" class="btn btn-primary btn-flat" id="btn_s"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label>Nama Kelas</label>
          <input type="hidden" name="id" value="<?= $kelas_where['id']; ?>">
          <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="<?= $kelas_where['nama_kelas']; ?>">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
