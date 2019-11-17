<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Detail Pengguna</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Nama</th>
                        <th><?= $name; ?></th>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th><?= $email; ?></th>
                    </tr>
                    <tr>
                        <th>Kata Sandi</th>
                        <th><?= $password; ?></th>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <th> <img src="<?= base_url('assets/img/profile/') . $img; ?>"></th>
                    </tr>
                    <tr>
                        <th>Tanggal Daftar</th>
                        <th><?= date('D, d M Y', $date_created); ?></th>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>