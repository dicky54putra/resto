<div class="container">
    <h3 class="mt-3 mb-3"><?= $title ?></h3>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= $action ?>" method="post">
                <div class="form-group">
                    <label for="">Nama user</label>
                    <input type="text" class="form-control" name="user_nama" value="<?= $nama ?>" autocomplete="off" <?= $disabled ?>>
                    <?= form_error('user_nama', '<small>', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="user_username" value="<?= $username ?>" autocomplete="off" <?= $disabled ?>>
                    <?= form_error('user_username', '<small>', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="user_password" value="<?= $password ?>" autocomplete="off" <?= $disabled ?>>
                    <?= form_error('user_password', '<small>', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="">Ulangi Password</label>
                    <input type="password" class="form-control" name="user_password2" value="<?= $password ?>" autocomplete="off" <?= $disabled ?>>
                    <?= form_error('user_password', '<small>', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="">Kategori user</label>
                    <select name="level" class="form-control">
                        <?php foreach ($level as $key) : ?>
                            <?php $selected = ($level_id == $key['level_id']) ? "selected" : ""; ?>
                            <option value="<?= $key['level_id'] ?>" <?= $selected ?>><?= $key['level_nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" style="width: 100px;" class="btn btn-primary">Save</button>
                    <a href="<?= site_url('user') ?>" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>