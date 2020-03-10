<div class="container">
    <h3 class="h3 mt-3"><?= $title ?></h3>
    <hr>
    <form action="<?= site_url('admin/tambah_masakan') ?>" method="post">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>nama masakan</label>
                    <input class="form-control" type="text" name="masakan_nama" autocomplete="off" value="<?= $masakan_nama ?>">
                    <?= form_error('masakan_nama', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>harga </label>
                    <input class="form-control" type="number" name="masakan_harga" autocomplete="off" value="<?= $masakan_harga ?>">
                    <?= form_error('masakan_harga', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group inline">
                    <button class="btn btn-md btn-primary" type="submit">Simpan</button>
                    <a href="<?= site_url('admin/masakan') ?>" class="btn btn-md btn-success" type="submit">Kembali</a>
                </div>
            </div>
        </div>
    </form>
</div>