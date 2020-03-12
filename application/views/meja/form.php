<div class="container">
    <h3 class="mt-3 mb-3"><?= $title ?></h3>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= $action ?>" method="post">
                <div class="form-group">
                    <label for="">Nama meja</label>
                    <input type="text" class="form-control" name="meja_nama" value="<?= $nama ?>" autocomplete="off">
                    <?= form_error('meja_nama', '<small>', '</small>') ?>
                </div>
                <div class="form-group">
                    <button type="submit" style="width: 100px;" class="btn btn-primary">Save</button>
                    <a href="<?= site_url('masakan_kategori') ?>" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>