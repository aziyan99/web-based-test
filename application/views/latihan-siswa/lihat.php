<div class="box">
    <div class="box-header">
        <div class="box-tools"><a href="<?= base_url('latihan'); ?>" class="btn btn-info btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a></div>
    </div>
    <div class="box-body">
        <p>
            <?= htmlspecialchars_decode($soal['soal']); ?>
        </p>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6">
                a. <?= $soal['jawaban_a']; ?>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6">
                b. <?= $soal['jawaban_b'] ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6">
                c. <?= $soal['jawaban_c']; ?>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6">
                d. <?= $soal['jawaban_d']; ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6">
                e. <?= $soal['jawaban_e']; ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6">
                Jawaban yang benar: <?= $soal['jawaban_yang_benar']; ?>
            </div>
        </div>
    </div>
</div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Pembahasan</h3>
    </div>
    <div class="box-body">
        <p>
            <?= htmlspecialchars_decode($pembahasan['pembahasan']); ?>
        </p>
    </div>
</div>