<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Pengguna</h3>
    </div>
    <div class="box-body">
        <?= validation_errors(); ?>
        <form action="<?= base_url('users/edit/'); ?>" method="post" class="form">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="form-group">
                <label for="role_id">Hak Akses</label>
                <select class="form-control" name="role_id" id="role_id">
                    <?php foreach ($role as $r) :  ?>
                        <option value="<?= $r['id']; ?>" <?php if ($r['id'] == $role_id) echo 'selected'; ?>><?= $r['role']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" class="form-control" name="name" value="<?= $nama; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>" required>
            </div>
            <button class="btn btn-sm btn-primary" type="submit">Ubah</button>
        </form>
    </div>
</div>