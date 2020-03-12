<div class="container">
    <h3 class="mt-3 mb-3"><?= $title ?></h3>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= $action ?>" method="post">
                <div class="form-group">
                    <label for="">Nama masakan</label>
                    <input type="text" class="form-control" name="masakan_nama" value="<?= $nama ?>" autocomplete="off">
                    <?= form_error('masakan_nama', '<small>', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="">Harga masakan</label>
                    <input type="number" class="form-control" name="masakan_harga" value="<?= $harga ?>" autocomplete="off">
                    <?= form_error('masakan_harga', '<small>', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="">Kategori masakan</label>
                    <select name="mk" class="form-control">
                        <?php foreach ($mk as $key) : ?>
                            <?php $selected = ($mk_id == $key['mk_id']) ? "selected" : ""; ?>
                            <option value="<?= $key['mk_id'] ?>" <?= $selected ?>><?= $key['mk_nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <div class="radio">
                        <label for=""><input type="radio" name="masakan_status" <?= $status == 1 ? "checked" : "" ?> value="1"> Ready</label> &nbsp;
                        <label for=""><input type="radio" name="masakan_status" <?= $status == 0 ? "checked" : "" ?> value="0"> Not Ready</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" style="width: 100px;" class="btn btn-primary">Save</button>
                    <a href="<?= site_url('masakan') ?>" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>