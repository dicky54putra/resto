<div class="container">
    <h3 class="h3 mt-3">List User</h3>
    <a class="btn btn-sm btn-primary mb-3" href="<?= site_url('admin/tambah_user') ?>">Tambah user</a>
    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Nama user</th>
            <th>username</th>
            <th>level</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($userall as $key) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $key['user_nama'] ?></td>
                <td><?= $key['user_username'] ?></td>
                <td><?= $key['level_nama'] ?></td>
                <td>
                    <a class="btn btn-sm btn-success" href="<?= site_url('admin/edit_user/') . $key['user_id'] ?>">Edit</a>
                    <a class="btn btn-sm btn-danger" href="" onclick="return confirm('Anda yakin?')">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>