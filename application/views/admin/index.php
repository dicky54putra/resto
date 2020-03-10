<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/dist/bootstrap.css') ?>">
</head>

<body>
    <h3>Kasir Restoran</h3>
    <h3><?= $user['user_nama'] ?></h3>
    <hr>
    <a href="<?= site_url('auth/logout') ?>">logout</a>

    <hr>
    <a href="<?= site_url('admin/tambah_masakan') ?>">Tambah masakan</a>
    <table border="1">
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
                    <a href="">Edit</a> |
                    <a href="">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <hr>
    <a href="<?= site_url('admin/tambah_user') ?>">Tambah_user</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Username</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($userall as $key) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $key['user_nama'] ?></td>
                <td><?= $key['user_password'] ?></td>
                <td>
                    <a href="">Edit</a> |
                    <a href="" onclick="return('anda yakin?')">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>