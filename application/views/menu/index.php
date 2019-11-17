<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Menu</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Icon</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 1;
                foreach ($menu as $m) : ?>
                    <tr>
                        <td><?= $x++; ?></td>
                        <td><?= $m['title']; ?></td>
                        <td><?= $m['icon']; ?>-<i class="<?= $m['icon']; ?>"></i></td>
                        <td><?= $m['url']; ?></td>
                        <td><?= $m['is_active']; ?></td>
                        <td>
                            <a href="<?= base_url('menu/edit/' . $m['id']); ?>" class="btn btn-flat btn-xs  btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="" class="btn btn-flat btn-xs  btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->