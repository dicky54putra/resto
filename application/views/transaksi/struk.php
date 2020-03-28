    <table align="center">
        <tr>
            <td colspan="5">
                <center>
                    <h4>eRESTO | Kang DICKY</h4>
                    <p>jalan Sekuro-Guyangan Km.3 Kawak Pakis aji Jepara</p>
                    <p>Hp : 085200404996</p>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                ===============================================
            </td>
        </tr>
        <tr>
            <th width="110">TANGGAL</th>
            <th width="10">:</th>
            <td colspan="3"><?= $tr['transaksi_tanggal'] ?></td>
        </tr>
        <tr>
            <th>NOMOR MEJA</th>
            <th>:</th>
            <td colspan="3"><?= $tr['meja_no'] ?></td>
        </tr>
        <tr>
            <th>KASIR / STAFF</th>
            <th>:</th>
            <td colspan="3"><?= $tr['user_nama'] ?></td>
        </tr>
        <tr>
            <td colspan="5">
                ===============================================
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <p class="font-20">Pesanan :</p>
            </td>
        </tr>
        <tr>
            <th colspan="2" align="left">Pesanan</th>
            <th>Harga</th>
            <th>
                <p align="right">Jumlah Pesanan</p>
            </th>
            <th>
                <p align="right">Jumlah Harga</p>
            </th>
        </tr>
        <?php foreach ($od as $key) { ?>
            <tr>
                <td colspan="2"><?= $key['masakan_nama'] ?></td>
                <td width="60">Rp.<?= $key['masakan_harga'] ?></td>
                <td align="right">x <?= $key['od_jumlah'] ?></td>
                <td align="right">Rp.<?= $key['od_harga'] ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="5">
                ===============================================
            </td>
        </tr>
        <tr>
            <td colspan="4" align="right">Total Transaksi :</td>
            <td align="right">Rp. <?= $tr['transaksi_total_bayar'] ?></td>
        </tr>
        <tr>
            <td colspan="4" align="right">Uang Customer :</td>
            <td align="right">Rp. <?= $tr['uang_bayar'] ?></td>
        </tr>
        <tr>
            <td colspan="4" align="right">Kembalian :</td>
            <td align="right">Rp. <?= $tr['uang_kembali'] ?></td>
        </tr>
        <tr>
            <td colspan="5">
                ===============================================
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <center>
                    <p>Terima kasih</p>
                </center>
            </td>
        </tr>

    </table>

    <script>
        window.print();
    </script>