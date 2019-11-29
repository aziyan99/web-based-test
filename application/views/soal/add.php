<!-- CK Editor -->
<script src="<?= base_url('assets/') ?>/bower_components/ckeditor/ckeditor.js"></script>

<?= validation_errors(
    '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>',
    '</div>'
); ?>

<form action="<?= base_url('soal/tambah'); ?>" method="post">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">##</h3>
            <div class="pull-right box-tools">
                <a href="<?= base_url('soal'); ?>" class="btn btn-info btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
              <div class="col-md-6 col-lg-6 col-xs-6">
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <select class="form-control" id="kelas" name="kelas">
                    <?php  foreach ($kelas as $data): ?>
                      <option value="<?= $data['id']; ?>"><?= $data['nama_kelas'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xs-6">
                <div class="form-group">
                  <label for="mata_pelajaran">Mata Peajaran</label>
                  <select class="form-control" id="mata_pelajaran" name="mata_pelajaran">
                    <?php foreach ($mata_pelajaran as $data): ?>
                      <option value="<?= $data['id']; ?>" ><?= $data['nama_mapel'];  ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
                <label for="soal">Soal</label>
                <textarea name="soal" id="soal" class="form-control" cols="30" rows="10"><?= set_value('soal'); ?></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label for="jawaban_a">Jawaban a</label>
                        <input type="text" name="jawaban_a" id="jawaban_a" class="form-control" value="<?= set_value('jawaban_a'); ?>">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label for="jawaban_b">Jawaban b</label>
                        <input type="text" name="jawaban_b" id="jawaban_b" class="form-control" value="<?= set_value('jawaban_b'); ?>">
                    </div>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-6 col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label for="jawaban_c">Jawaban c</label>
                        <input type="text" name="jawaban_c" id="jawaban_c" class="form-control" value="<?= set_value('jawaban_c'); ?>">
                    </div>
                </div>
                <div class=" col-md-6 col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label for="jawaban_d">Jawaban d</label>
                        <input type="text" name="jawaban_d" id="jawaban_d" class="form-control" value="<?= set_value('jawaban_d'); ?>">
                    </div>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-6 col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label for="jawaban_e">Jawaban e</label>
                        <input type="text" name="jawaban_e" id="jawaban_e" class="form-control" value="<?= set_value('jawaban_e'); ?>">
                    </div>
                </div>
                <div class=" col-md-6 col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label for="jawaban_yang_benar">Jawaban yang benar</label>
                        <select name="jawaban_yang_benar" id="jawaban_yang_benar" class="form-control">
                            <option value="">--pilih--</option>
                            <option value="a">a</option>
                            <option value="b">b</option>
                            <option value="c">c</option>
                            <option value="d">d</option>
                            <option value="e">e</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
</form>
<script>
    $(function() {
        CKEDITOR.replace('soal')
    })
</script>
