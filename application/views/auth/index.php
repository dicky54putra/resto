<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-3 col-xs-3 col-md-3"></div>
        <div class="col-lg-4 col-sm-6  col-xs-6 col-md-6">
            <br><br><br><br><br>
            <?= $this->session->flashdata('message'); ?>
            <h1 class="center"><?= $title ?></h1>
            <hr>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" autocomplete="off">
                    <?= form_error('username', '<small>', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" autocomplete="off">
                    <?= form_error('password', '<small>', '</small>') ?>
                </div>
                <button class="btn btn-primary" type="submit">Login</button>
            </form>
        </div>
        <div class="col-lg-4 col-sm-3 col-xs-3 col-md-3"></div>
    </div>
</div>