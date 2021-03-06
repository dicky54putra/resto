<div class="container">
    <?= $this->session->flashdata('message') ?>
    <div class="row mb-3 mt-3">
        <div class="col-lg-8">
            <a href="<?= site_url('masakan/insert') ?>" class="btn btn-primary">Tambah Makanan</a>
            <a href="<?= site_url('masakan') ?>" class="btn btn-success">refresh</a>
        </div>
        <div class="col-lg-4">
            <table style="width: 100%;">
                <tr>
                    <form action="" method="post">
                        <td>
                            <div class="form-group">
                                <input type="text" name="keyword" class="form-control" autocomplete="off">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning">Search</button>
                            </div>
                        </td>
                    </form>
                </tr>
            </table>
        </div>
    </div>
    <table class="table table-striped table-inverse">
        <thead class="thead-inverse">
            <tr>
                <th>no</th>
                <th>Nama masakan</th>
                <th>Harga</th>
                <th>kategori</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($masakanall as $key) : ?>
                <tr>
                    <td scope="row"><?= $no++ ?></td>
                    <td><?= $key['masakan_nama'] ?></td>
                    <td><?= $key['masakan_harga'] ?></td>
                    <td><?= $key['mk_nama'] ?></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="<?= site_url('masakan/update/') . $key['masakan_id'] ?>">Edit</a>
                        <a class="btn btn-danger btn-sm" href="<?= site_url('masakan/delete/') . $key['masakan_id'] ?>" onclick="return confirm('Anda yakin menghapusnya?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>