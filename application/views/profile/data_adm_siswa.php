<?= $this->session->flashdata('message'); ?>
<?= $pesan; ?>
<div class="row">
  <div class="col-md-6 col-lg-6 col-sm-6">
    <form action="<?= base_url('data_diri/simpan') ?>" method="post">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Pribadi</h3>
          <div class="box-toolbox pull-right">
            <button type="submit" class="btn btn-primary btn-sm btn-flat btn-primary" id="btn_submit" disabled><i class="fa fa-save"></i> Simpan</button>
            <a href="#" class="btn btn-flat btn-info btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
            <button type="button" class="btn btn-primary btn-sm btn-flat btn-success" name="button" id="lock"><i class="fa fa-lock" id="lock_ic"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label>Nis</label>
            <input type="hidden" name="id" value="<?= $adm['id']; ?>">
            <input type="text" id="nis" name="nis" class="form-control" disabled value="<?= $adm['nis']; ?>">
          </div>
          <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="id_kelas" id="kelas" disabled>
              <?php foreach ($kelas as $data) :  ?>
                <option value="<?= $data['id']; ?>" <?php if ($data['id'] == $adm['id_kelas']) echo 'selected'; ?>><?= $data['nama_kelas']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="ttl">Tanggal, bulan, dan tahun lahir</label>
            <input type="date" name="ttl" id="ttl" class="form-control" disabled>
          </div>
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <textarea name="tempat_lahir" id="tempat_lahir" class="form-control" cols="30" rows="10" disabled></textarea>
          </div>
        </div>
      </div>
  </div>
  </form>

  <div class="col-md-6 col-lg-6 col-sm-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Keluarga</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="nama_ayah">Nama Ayah</label>
          <input type="text" id="nama_ayah" name="nama_ayah" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="nama_ayah">Nama Ibu</label>
          <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" disabled>
        </div>
      </div>
    </div>
  </div>

</div>
<script type="text/javascript">
  $('#lock').click(function() {
    $('#lock_ic').removeClass('fa-lock');
    $('#lock_ic').addClass('fa-unlock');
    $('#nis').removeAttr('disabled');
    $('#kelas').removeAttr('disabled');
    $('#btn_submit').removeAttr('disabled');
  })
</script>