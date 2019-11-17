<?= validation_errors(
    '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
    '</div>'
); ?>

<?= $this->session->flashdata('message'); ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit gambar profile</h3>
    </div>
    <div class="box-body">
        <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/profile/') . $img; ?>" alt="User profile picture">

        <?php echo form_open_multipart('profile/image'); ?>
        <div class="form-group">
            <label for="image">Upload gambar</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
    </div>
</div>