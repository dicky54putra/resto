<div class="container">
    <div class="row" style="align-content: center;">
        <div class="col-lg-4">
            <h1 class="h3 mt-5">Halaman login</h1>
            <?= $this->session->flashdata('message') ?>
            <form action="<?= site_url('auth') ?>" method="post">
                <div class="form-group">
                    <label>username</label>
                    <input class="form-control" type="text" name="username" autocomplete="off">
                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>password </label>
                    <input class="form-control" type="password" name="password" autocomplete="off">
                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                </div>
                <button class="btn btn-primary btn-md" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>