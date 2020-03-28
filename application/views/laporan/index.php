<div class="container">
    <h1 class="mt-2"><?= $title ?></h1>
    <div class="row mt-3">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tglawal">Tanggal Awal</label>
                                <input type="date" class="form-control" name="tglawal" id="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tglakhir">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="tglakhir" id="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
                <a href="http://" class="btn btn-success mt-3">Cetak pdf</a>
            </div>
        </div>

        <div class="col-lg-12 table-responsive">
            <table class="table table-striped table-inverse " <?= $hidden ?>>
                <thead class="thead-inverse">
                    <tr>
                        <th>No</th>
                        <th>No meja</th>
                        <th>Kasir</th>
                        <th>Tanggal</th>
                        <th>jumlah Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($laporan as $key) : ?>
                        <tr>
                            <td scope="row"><?= $no++ ?></td>
                            <td>Meja <?= $key['meja_no'] ?></td>
                            <td><?= $key['user_nama'] ?></td>
                            <td><?= $key['transaksi_tanggal'] ?></td>
                            <td>Rp.<?= $key['transaksi_total_bayar'] ?>,-</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total pemasukan : </th>
                        <th>Rp.<?= $total['transaksi_total_bayar'] ?>,-</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>