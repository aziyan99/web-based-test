  <!-- CK Editor -->
  <script src="<?= base_url('assets/') ?>/bower_components/ckeditor/ckeditor.js"></script>


  <?= $this->session->flashdata('message');  ?>
  <form action="<?= base_url('soal/simpanPembahasan'); ?>" method="post">
      <input type="hidden" name="id" value="<?= $pembahasan['id']; ?>">
      <input type="hidden" name="id_soal" value="<?= $pembahasan['id_soal']; ?>">
      <div class="box">
          <div class="box-header">
              <h3 class="box-title">##</h3>
              <div class="pull-right box-tools">
                  <a href="<?= base_url('soal'); ?>" class="btn btn-info btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
                  <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
              </div>
          </div>
          <div class="box-body">
              <div class="form-group">
                  <label for="soal">Soal</label>
                  <textarea name="pembahasan" id="soal" class="form-control" cols="30" rows="10"><?= $pembahasan['pembahasan']; ?></textarea>
              </div>
          </div>
  </form>
  <script>
      $(function() {
          CKEDITOR.replace('soal')
      })
  </script>