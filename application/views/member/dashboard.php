<script src="<?= base_url('assets/'); ?>Chart.js/dist/Chart.min.js"></script>

<?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) : ?>
    <?= $this->session->flashdata('message'); ?>
    <?= validation_errors(
            '<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>',
            '</div>'
        ); ?>


    <div class="row">
        <div class="col-md-3 col-sm-3 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pengguna</span>
                    <span class="info-box-number"><?= $pengguna; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-file-text"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Soal</span>
                    <span class="info-box-number"><?= $soal; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-sticky-note-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Kelas</span>
                    <span class="info-box-number"><?= $kelas; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-tasks"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Mata Pelajaran</span>
                    <span class="info-box-number"><?= $mapel; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pengumuman</h3>
                    <div class="box-tools"><a href="#" data-target="#addpengumuman" data-toggle="modal" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Tambah</a></div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Pengumuman</th>
                                <th>Tujuan</th>
                                <th width="50">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengumuman as $data) : ?>
                                <tr>
                                    <td><?= htmlspecialchars_decode($data['pengumuman']); ?></td>
                                    <td><?= $data['nama_kelas']; ?></td>
                                    <td>
                                        <a onclick="return confirm('Anda yakin ingin menghapus ini ?');" href="<?= base_url('dashboard/hapus_pengumuman/') . $data['id']; ?>" class="btn btn-xs btn-flat btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="box">
                <div class="box-body">
                    <canvas id="soalMatapelajaran"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="box">
                <div class="box-body">
                    <canvas id="soaljawaban"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="box">
                <div class="box-body">
                    <canvas id="soalmapel"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        var soalmapel = document.getElementById('soalMatapelajaran').getContext('2d');
        var myChart = new Chart(soalmapel, {
            type: 'pie',
            data: {
                labels: ['Soal', 'Mata pelajaran'],
                datasets: [{
                    data: [<?= $soal ?>, <?= $mapel ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var soaljawaban = document.getElementById('soaljawaban').getContext('2d');
        var myChart = new Chart(soaljawaban, {
            type: 'line',
            data: {
                labels: ['Soal', 'Jawaban'],
                datasets: [{
                    data: [<?= $soal ?>, <?= $jawaban ?>],
                    label: 'Soal - Jawaban',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var soalmapel = document.getElementById('soalmapel').getContext('2d');
        var myChart = new Chart(soalmapel, {
            type: 'bar',
            data: {
                labels: ['Soal', 'Jawaban', 'Mata pelajaran'],
                datasets: [{
                    data: [<?= $soal ?>, <?= $jawaban ?>, <?= $mapel ?>],
                    label: 'Soal - Jawaban - mata pelajaran',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <!-- CK Editor -->
    <script src="http://localhost/web-based-test/assets//bower_components/ckeditor/ckeditor.js"></script>
    <div class="modal fade" id="addpengumuman">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Pengumuman</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('dashboard/simpan_pengumuman'); ?>" method="post">
                        <div class="form-group">
                            <label>Pengumuman</label>
                            <textarea name="pengumuman" id="pengumuman" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tujuan Kelas</label>
                            <select name="tujuan" id="tujuan" class="form-control">
                                <option value="">--pilih--</option>
                                <?php foreach ($kls as $data) : ?>
                                    <option value="<?= $data['id']; ?>"><?= $data['nama_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script>
        CKEDITOR.replace('pengumuman');
    </script>

<?php endif; ?>
<?php if ($this->session->userdata('role_id') != 1 || $this->session->userdata('role_id') != 2) :  ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pengumuman</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Pengumuman</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengumuman_siswa as $data) : ?>
                                <tr>
                                    <td><?= htmlspecialchars_decode($data['pengumuman']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>