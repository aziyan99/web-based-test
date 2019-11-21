<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>
        <div class="box-tools"><a href="<?= base_url('soal'); ?>" class="btn btn-info btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a></div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?= htmlspecialchars_decode($soal['soal']); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 text-right">a.</div>
            <div class="col-lg-5 col-md-5 col-sm-5"><?= $soal['jawaban_a']; ?></div>
            <div class="col-lg-1 col-md-1 col-sm-1 text-right">b.</div>
            <div class="col-lg-5 col-md-5 col-sm-5"><?= $soal['jawaban_b']; ?></div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 text-right">c.</div>
            <div class="col-lg-5 col-md-5 col-sm-5"><?= $soal['jawaban_c']; ?></div>
            <div class="col-lg-1 col-md-1 col-sm-1 text-right">d.</div>
            <div class="col-lg-5 col-md-5 col-sm-5"><?= $soal['jawaban_d']; ?></div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 text-right">e.</div>
            <div class="col-lg-5 col-md-5 col-sm-5"><?= $soal['jawaban_e']; ?></div>
            <div class="col-lg-1 col-md-1 col-sm-1 text-right"></div>
            <div class="col-lg-5 col-md-5 col-sm-5"></div>
        </div>
        <br>
        <br>

        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 text-right">Jawaban yang benar:</div>
            <div class="col-lg-7 col-md-7 col-sm-7"><?= $soal['jawaban_yang_benar']; ?></div>

        </div>
    </div>
</div>