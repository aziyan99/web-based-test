<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Safeco</b>LTE</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <?= validation_errors(
            '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
            '</div>'
        ); ?>

        <form action="<?= base_url('auth/register'); ?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password1" placeholder="Kata Sandi">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password2" placeholder="Ulangi Kata Sandi">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="<?= base_url('auth'); ?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>