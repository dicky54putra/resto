<!doctype html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/dist/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">Resto</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <nav class="navbar-nav justify-content-center">
                    <a class="nav-link" href="<?= site_url('masakan') ?>">Masakan</a>
                    <a class="nav-link" href="<?= site_url('masakan_kategori') ?>">Kategori masakan</a>
                    <a class="nav-link" href="<?= site_url('user') ?>">User</a>
                    <a class="nav-link" href="<?= site_url('meja') ?>">Meja</a>
                    <a class="nav-link" href="<?= site_url('order') ?>">Order</a>
                    <a class="nav-link" href="<?= site_url('transaksi') ?>">Transaksi</a>
                    <a class="nav-link" href="<?= site_url('profil') ?>">profil</a>
                </nav>
            </div>
        </div>
    </nav>