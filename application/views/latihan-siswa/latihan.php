<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend'); ?>/font-awesome/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="<?= base_url('assets/frontend'); ?>/js/jquery.js"></script>
    <script src="<?= base_url('assets/frontend'); ?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets/frontend'); ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/frontend'); ?>/js/sweetalert.js"></script>

    <title><?= $pengaturan['nama_sistem']; ?></title>
    <style media="screen">
        body {
            font-family: Roboto, sans-serif;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><?= $pengaturan['nama_sistem']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><?= $pengaturan['nama_sekolah']; ?> <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-8 mt-4">
                <?php foreach ($soal as $data) : ?>
                    <div class="card mt-3" id="hide" aria-hidden="true">
                        <div class="card-body">
                            <p>
                                <?php
                                    $soal_encode = htmlspecialchars_decode($data['soal']);
                                    echo $soal_encode;
                                    ?>
                            </p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 mt-2">a. <?= $data['jawaban_a']; ?></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mt-2">b. <?= $data['jawaban_b']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 mt-2">c. <?= $data['jawaban_c']; ?></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mt-2">d. <?= $data['jawaban_d']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 mt-2">e. <?= $data['jawaban_e']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 mt-3">
                                    <div class="form-group">
                                        <select class="form-control" name="jawaban" id="jwb<?= $data['id']; ?>">
                                            <option value="" class="text-muted" selected disabled>Pilih Jawaban</option>
                                            <option value="a">a</option>
                                            <option value="b">b</option>
                                            <option value="c">c</option>
                                            <option value="d">d</option>
                                            <option value="e">e</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 mt-3">
                                    <button id="btn<?= $data['id']; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-4 mt-4">
                <div class="card mt-3">
                    <div class="card-header">
                        Selesai
                    </div>
                    <div class="card-body">
                        <button id="selesai" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($soal as $data) : ?>
        <script type="text/javascript">
            $("#btn<?= $data['id']; ?>").click(function() {
                var id_soal = "<?= $data['id']; ?>";
                var id_kelas = "<?= $data['id_kelas']; ?>"
                var id_mapel = "<?= $data['id_mata_pelajaran']; ?>"
                var jawaban = $("#jwb<?= $data['id']; ?>").val();
                if (jawaban === null) {
                    swal('Gagal', 'Mohon pilih jawaban anda', 'warning');
                } else {
                    $.ajax({
                        url: "<?= base_url('latihan/simpan/') . $data['id']; ?>",
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            id_soal: id_soal,
                            id_kelas: id_kelas,
                            id_mata_pelajaran: id_mapel,
                            jawaban: jawaban
                        },
                        success: function(msg) {
                            $('#jwb<?= $data['id']; ?>').replaceWith('<input class="form-control" value="' + jawaban + '" readonly/>');
                            $('#btn' + id_soal + '').replaceWith('<i class="fa fa-check"></i>');
                        }
                    });
                }
            });
        </script>
    <?php endforeach; ?>
    <script>
        $('#selesai').click(function() {
            $.ajax({
                method: "GET",
                url: "<?= base_url('latihan/verifikasi') ?>",
                dataType: "JSON",
                success: function(msg) {
                    swal("Terima Kasih", "Selamat anda telah selesai :)", "success")
                        .then((value) => {
                            window.location.href = "<?= base_url('latihan'); ?>"
                        });
                }
            });
        })
    </script>
</body>

</html>