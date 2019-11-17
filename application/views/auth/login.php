<div class="login-box">
    <div class="login-logo">
        <a href="#"><?= $nama['nama_sistem']; ?></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?= validation_errors(
            '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
            '</div>'
        ); ?>
        <?= $this->session->flashdata('message') ?>

        <form action="<?= base_url('auth'); ?>" method="post">
            <div class="form-group has-feedback">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="<?= base_url('auth/register'); ?>" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->