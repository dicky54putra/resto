<div class="container">
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    </div>

    <script>
        $(".alert").alert();
    </script>
    <div class="form-group inline mt-3 mb-3">
        <a href="<?= site_url('masakan/insert') ?>" class="btn btn-primary">Tambah Makanan</a>
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
                        <a class="btn btn-success btn-sm" href="#">Edit</a>
                        <a class="btn btn-danger btn-sm" href="#" onclick="return confirm('Anda yakin menghapusnya?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>