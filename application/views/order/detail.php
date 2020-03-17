<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    Order
                </div>
                <div class="card-body">
                    <h4 class="card-title">Meja no <?= $meja_no ?></h4>
                    <p><?= $keterangan ?></p>
                    <hr>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Masakan</label>
                            <select class="form-control" name="masakan">
                                <?php foreach ($masakan as $key) : ?>
                                    <option value="<?= $key['masakan_id'] ?>"><?= $key['masakan_nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input class="form-control" type="hidden" name="order_id" value="<?= $order_id ?>">
                            <input class="form-control" type="number" name="jumlah">
                            <?= form_error('jumlah', '<small>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea class="form-control" name="keterangan" cols="30" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Pesan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    Order detail
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>No</th>
                                <th>Masakan</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($od as $key) : ?>
                                <tr>
                                    <td scope="row"><?= $no++ ?></td>
                                    <td><?= $key['masakan_nama'] ?></td>
                                    <td><?= $key['od_jumlah'] ?></td>
                                    <td><?= $key['od_harga'] ?></td>
                                    <td><?= $key['od_keterangan'] ?></td>
                                    <td>
                                        <a href="<?= site_url('order/detail/' . $meja_no . "/" . $key['od_id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <b>Total harga : <?= $total_harga['od_harga'] ?></b>
                </div>
            </div>
            <a href="<?= site_url('order') ?>" class="btn btn-success mt-3"> Kembali</a>
        </div>
    </div>
</div>