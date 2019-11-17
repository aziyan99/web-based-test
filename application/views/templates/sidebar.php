 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
         <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="sidebar-menu" data-widget="tree">
             <li class="header">MAIN NAVIGATION</li>
             <?php
                $role = $this->session->userdata('role_id');
                $QueryMenu = "   SELECT * FROM `menu` JOIN `user_access_menu` 
                            ON `menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role 
                            ORDER BY `user_access_menu`.`menu_id` ASC
                ";
                $menu = $this->db->query($QueryMenu)->result_array();
                ?>
             <?php foreach ($menu as $m) : ?>
                 <?php if ($m['url'] == $this->uri->segment(1)) : ?>
                     <li class="active">
                     <?php else : ?>
                     <li>
                     <?php endif; ?>
                     <a href="<?= base_url($m['url']); ?>">
                         <i class="<?= $m['icon']; ?>"></i> <span><?= $m['title']; ?></span>
                     </a>
                 </li>
             <?php endforeach; ?>
         </ul>
     </section>
     <!-- /.sidebar -->
 </aside>
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <?= $head; ?>
         </h1>
     </section>

     <!-- Main content -->
     <section class="content">