<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <br>
            <h3><?= $title ?></h3>
            <hr>
            <form action="<?= site_url('admin/tambah_user') ?>" method="post">
                <div class="form-group">
                    <label class="label">Nama user</label>
                    <input class="form-control" type="text" name="user_nama" autocomplete="off">
                    <?= form_error('user_nama', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label class="label">Username</label>
                    <input class="form-control" type="text" name="user_username" autocomplete="off">
                    <?= form_error('user_username', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label class="label">Password</label>
                    <input class="form-control" type="text" name="user_password" autocomplete="off">
                    <?= form_error('user_password', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label class="label">Username</label>
                    <input class="form-control" type="text" name="user_password2" autocomplete="off">
                    <?= form_error('user_password2', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>level</label>
                    <select name="level_id" class="form-control">
                        <?php foreach ($levelall as $key) : ?>
                            <option class="form-control" value="<?= $key['level_id'] ?>"><?= $key['level_nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
            </form>

        </div>
    </div>
</div>