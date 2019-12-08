<?= $this->session->flashdata('message'); ?>
<div>
    <div class="box box-default">
        <div class="box-header with-border">
            <i class="fa fa-bullhorn"></i>

            <h3 class="box-title">Info</h3>

            <div class="box-tools">
                <a href="<?= base_url('latihan'); ?>" class="btn btn-info btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
                <a href="<?= base_url('latihan/generate/') . $this->uri->segment(3); ?>" target="_blank" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body text-center">
            <p>
                <table class="table table-hover table-striped text-center">
                    <tr>
                        <th>Jawaban yang benar</th>
                        <th>Jawaban yang salah</th>
                    </tr>
                    <tr>
                        <td><?= count($benar); ?></td>
                        <td><?= count($salah); ?></td>
                    </tr>
                </table>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id Soal</th>
                                <th>Jawaban kamu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jawaban as $data) : ?>
                                <tr>
                                    <td><?= $data['id_soal']; ?></td>
                                    <td><?= $data['jawaban']; ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="data2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id Soal</th>
                                <th>Jawaban yang benar</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($soal as $data) : ?>
                                <tr>
                                    <td><?= $data['id']; ?></td>
                                    <td><?= $data['jawaban_yang_benar']; ?></td>
                                    <td>
                                        <a href="<?= base_url('latihan/detail/') . $data['id']; ?>"> <i class="fa fa-external-link"></i> </a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#data2').DataTable();
    });
</script>