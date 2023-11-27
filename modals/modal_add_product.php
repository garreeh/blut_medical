<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">ADD SCANNED FILE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <?php include "../controllers/add_products_process.php" ?>

                <div class="modal-body">

                    <div class="row">


                        <div class="col-sm-12">
                            <div class="form-group">

                                <input type="file" class="input-sm form-control-sm form-control" name="fileToUpload" id="fileToUpload">
                           

                            </div>
                        </div>
            
                        <input type="hidden" name="client_id_file" value="<?php echo $clientid; ?>">


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="add_product" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

