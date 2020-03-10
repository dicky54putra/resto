<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h3 class="h3 mt-3">Halaman order</h3>
            <?= $this->session->flashdata('message') ?>
            <form action="" method="post">
                <div class="form-group">
                    <label> Nomer Meja</label>
                    <input type="number" name="no_meja" class="form-control">
                    <?= form_error('no_meja', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label> Tanggal</label>
                    <?php $date = date('d/M/Y') ?>
                    <input name="order_tanggal" type="text" class="form-control" value="<?= $date ?>" disabled>
                </div>
                <div class="form-group">
                    <label> User</label>
                    <input name="user_id" type="text" class="form-control" value="<?= $user['user_nama'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label> Keterangan</label>
                    <input name="order_keterangan" type="number" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-md">Order</button>
                </div>
            </form>
        </div>
    </div>
</div>