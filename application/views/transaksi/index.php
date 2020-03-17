<div class="container">
    <h1><?= $title ?></h1>
    <p>List Meja</p>
    <div class="row mt-3">
        <?php foreach ($mejaall as $key) : ?>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 mt-2">
                <!-- Button trigger modal -->
                <a class="btn btn-success btn-lg" href="<?= site_url('transaksi/detail/' . $key['meja_no']) ?>"> Meja Nomor <?= $key['meja_no'] ?></a>
            </div>
        <?php endforeach ?>
    </div>
</div>