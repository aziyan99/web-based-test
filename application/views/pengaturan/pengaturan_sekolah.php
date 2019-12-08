<?= $this->session->flashdata('message'); ?>
<div class="box">
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Nama Pengaturan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Kelas</td>
                <td>
                  <a href="<?= base_url('pengaturan_sekolah/kelas'); ?>" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-gear"></i> </a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Mata Pelajaran</td>
                <td>
                  <a href="<?= base_url('pengaturan_sekolah/mata_pelajaran'); ?>" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-gear"></i> </a>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Administrasi Sekolah</td>
                <td>
                  <a href="<?= base_url('pengaturan_sekolah/administrasi_sekolah'); ?>" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-gear"></i> </a>
                </td>
              </tr>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
