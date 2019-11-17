<?= $this->session->flashdata('message'); ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Informasi Sistem</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Sistem</th>
                    <td><?= $pengaturan['nama_sistem']; ?></td>
                </tr>
            </thead>

        </table>
        <br>
        <a href="<?= base_url('pengaturan/edit'); ?>" class="btn btn-sm btn-primary"> <i class="fa fa-pencil"></i> Edit</a>

    </div>

</div>