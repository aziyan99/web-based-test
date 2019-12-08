<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>
        <div class="box-tools"><a href="<?= base_url('hasil'); ?>" class="btn btn-info btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a></div>
    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th width="150">#</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $data) : ?>
                    <tr>
                        <td><?= $data['nama'] ?></td>
                        <td>
                            <form action="<?= base_url('hasil/detail'); ?>">
                                <input type="hidden" name="id_user" value="<?= $data['id']; ?>">
                                <input type="hidden" name="id_kelas" value="<?= $data['id_kelas']; ?>">
                                <input type="hidden" name="id_mapel" value="<?= $data['id_mata_pelajaran']; ?>">
                                <button class="btn btn-success btn-flat btn-xs"><i class="fa fa-eye"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>