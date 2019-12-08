<?=  $this->session->flashdata('message'); ?>
<?= validation_errors('<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',' </div>'); ?>
<div class="row">
  <div class="col-md-6 col-lg-6 col-sm-6">
    <form action="<?= base_url('pengaturan_sekolah/administrasi_sekolah') ?>" method="post">
      <div class="box">
        <div class="box-header">
          <div class="box-toolbox pull-right">
            <a href="<?= base_url('pengaturan_sekolah'); ?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-arrow-left"></i>Kembali</a>
          <button type="submit" class="btn btn-primary btn-sm btn-flat btn-primary" id="btn_submit" disabled><i class="fa fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-primary btn-sm btn-flat btn-success" name="button" id="lock"><i class="fa fa-lock" id="lock_ic"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label>Nama Sekolah</label>
            <input type="hidden" name="id" value="<?= $sekolah['id']; ?>">
            <input type="text" id="nama_sekolah" name="nama_sekolah" class="form-control"  disabled value="<?= $sekolah['nama_sekolah']; ?>">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="8" cols="80" disabled><?= htmlspecialchars_decode($sekolah['alamat']); ?></textarea>
          </div>
        </div>
      </div>
      </div>
    </form>

  <div class="col-md-6 col-lg-6 col-sm-6">
  </div>

</div>
<script type="text/javascript">
  $('#lock').click(function(){
    $('#lock_ic').removeClass('fa-lock');
    $('#lock_ic').addClass('fa-unlock');
    $('#nama_sekolah').removeAttr('disabled');
    $('#alamat').removeAttr('disabled');
    $('#btn_submit').removeAttr('disabled');
  })
</script>
