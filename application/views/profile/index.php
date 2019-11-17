    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/profile/') . $img; ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?= $profile['nama']; ?></h3>

            <p class="text-muted text-center">Member since <?= date('D, d M Y', $date_created); ?></p>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Nama</b> <a class="pull-right"><?= $profile['nama']; ?></a>
                </li>
                <li class="list-group-item">
                    <b>Email</b> <a class="pull-right"><?= $profile['email']; ?></a>
                </li>
                <li class="list-group-item">
                    <b>Password</b> <a class="pull-right"><?= $profile['password']; ?></a>
                </li>
            </ul>

            <a href="<?= base_url('profile/edit'); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit Profile</a>
            <a href="<?= base_url('profile/password'); ?>" class="btn btn-primary"><i class="fa fa-key"></i> Edit Kata Sandi</a>
            <a href="<?= base_url('profile/image'); ?>" class="btn btn-primary"><i class="fa fa-file-image-o"></i> Edit Gambar</a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->