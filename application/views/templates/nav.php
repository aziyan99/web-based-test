<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SI</b>M</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?php $data = $this->db->get('pengaturan')->row_array();
                                    echo $data['nama_sistem']; ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url('assets/img/profile/') . $img; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $name; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= base_url('assets/img/profile/') . $img; ?>" class="img-circle" alt="User Image">

                            <p>
                                <?= $name; ?>
                                <small>Member since <?= date('D, d M Y', $date_created); ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url('profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>