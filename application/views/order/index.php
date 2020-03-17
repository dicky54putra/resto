<div class="container">
    <h1><?= $title ?></h1>
    <p>List Meja</p>
    <div class="row mt-3">
        <?php foreach ($mejaall as $key) : ?>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 mt-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                    Meja Nomor <?= $key['meja_no'] ?>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= site_url('order/tambah_order') ?>" method="post">
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <input type="hidden" name="meja_no" value="<?= $key['meja_no'] ?>">
                                        <input type="hidden" name="meja_id" value="<?= $key['meja_id'] ?>">
                                        <input type="hidden" name="user_id" value="<?= $user ?>">
                                        <label for="">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    $('#exampleModal').on('show.bs.modal', event => {
                        var button = $(event.relatedTarget);
                        var modal = $(this);
                        // Use above variables to manipulate the DOM

                    });
                </script>
            </div>
        <?php endforeach ?>
    </div>
</div>