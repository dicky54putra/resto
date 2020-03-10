<div class="container">
    <h3 class="h3 mt-3">List Makanan</h3>
    <a class="btn btn-sm btn-primary mb-3" href="<?= site_url('admin/tambah_masakan') ?>">Tambah masakan</a>
    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Nama Masakan</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($masakanall as $key) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $key['masakan_nama'] ?></td>
                <td><?= $key['masakan_harga'] ?></td>
                <td>
                    <a class="btn btn-sm btn-success" href="<?= site_url('admin/edit_masakan/') . $key['masakan_id'] ?>">Edit</a>
                    <a class="btn btn-sm btn-danger" href="" onclick="return confirm('Anda yakin?')">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>