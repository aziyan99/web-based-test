<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>
        <div class="box-tools"><a href="<?= base_url('hasil'); ?>" class="btn btn-info btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a></div>
    </div>
    <div class="box-body">
        <table class="table table-hover table-striped">
            <tr>
                <td>Nama</td>
                <td><?= $siswa['nama']; ?></td>
            </tr>
            <tr>
                <td>Jawaban yang benar</td>
                <td><?= count($benar); ?></td>
            </tr>
            <tr>
                <td>Jawaban yang salah</td>
                <td><?= count($salah); ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="box">

    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>id soal</th>
                    <th width="150">Jawaban</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jawaban as $data) : ?>
                    <tr>
                        <td><?= $data['id_soal'] ?></td>
                        <td>
                            <?= $data['jawaban']; ?>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>