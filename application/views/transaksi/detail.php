<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    Order detail
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse ">
                        <thead class="thead-inverse">
                            <tr>
                                <th>No</th>
                                <th>Masakan</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Keterangan</th>
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
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <b>Total harga : Rp.<?= $total_harga['od_harga'] ?></b>
                    <?= $this->session->flashdata('message') ?>
                    <?php
                    $id = $order['order_id'];
                    $tr = $this->db->get_where('transaksi', ['order_id' => $id])->row_array();
                    if ($tr) {
                        $disabled = '';
                        $disabled2 = 'disabled';
                    } else {
                        $disabled = 'disabled';
                        $disabled2 = '';
                    }
                    ?>
                    <table class="mt-1">
                        <tr>
                            <form action="" method="post">
                                <td><input type="number" name="bayar" class="form-control" <?= $disabled2 ?>></td>
                                <td><button type="submit" class="btn btn-primary" <?= $disabled2 ?>> Bayar</button></td>
                            </form>
                        </tr>
                        <tr>
                            <td colspan="2"><?= form_error('bayar', '<small>', '</small>') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <a href="<?= site_url('transaksi') ?>" class="btn btn-success mt-3"> Kembali</a>
            <a href="<?= site_url('transaksi/struk/' . $id) ?>" target="_BLANK" class="btn btn-warning mt-3 <?= $disabled ?>"> Cetak</a>
        </div>
    </div>
</div>