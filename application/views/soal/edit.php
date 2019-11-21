<!-- CK Editor -->
<script src="<?= base_url('assets/') ?>/bower_components/ckeditor/ckeditor.js"></script>


<?= $this->session->flashdata('message');  ?>
<form action="<?= base_url('soal/simpanUbah'); ?>" method="post">
    <input type="hidden" name="id" value="<?= $soal['id']; ?>">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">##</h3>
            <div class="pull-right box-tools">
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="soal">Soal</label>
                <textarea name="soal" id="soal" class="form-control" cols="30" rows="10"><?= $soal['soal']; ?></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label for="jawaban_a">Jawaban a</label>
                        <input type="text" name="jawaban_a" id="jawaban_a" class="form-control" value="<?= $soal['jawaban_a']; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label for="jawaban_b">Jawaban b</label>
                        <input type="text" name="jawaban_b" id="jawaban_b" class="form-control" value="<?= $soal['jawaban_b']; ?>">
                    </div>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-6 col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label for="jawaban_c">Jawaban c</label>
                        <input type="text" name="jawaban_c" id="jawaban_c" class="form-control" value="<?= $soal['jawaban_c']; ?>">
                    </div>
                </div>
                <div class=" col-md-6 col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label for="jawaban_d">Jawaban d</label>
                        <input type="text" name="jawaban_d" id="jawaban_d" class="form-control" value="<?= $soal['jawaban_d']; ?>">
                    </div>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-6 col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label for="jawaban_e">Jawaban e</label>
                        <input type="text" name="jawaban_e" id="jawaban_e" class="form-control" value="<?= $soal['jawaban_e']; ?>">
                    </div>
                </div>
                <div class=" col-md-6 col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label for="jawaban_yang_benar">Jawaban yang benar</label>
                        <select name="jawaban_yang_benar" id="jawaban_yang_benar" class="form-control">
                            <option value="<?= $soal['jawaban_yang_benar']; ?>"><?= $soal['jawaban_yang_benar']; ?></option>
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