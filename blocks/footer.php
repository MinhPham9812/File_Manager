</div>
    <?php
        if(empty($_GET['type'])):
    ?>
    <footer>
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <a href="#" class="btn btn-outline-primary btn-sm"><i class="fa fa-check-square" aria-hidden="true"></i> Select All</a>
                        <a href="#" class="btn btn-outline-primary btn-sm"><i class="fa fa-window-close" aria-hidden="true"></i> Unselect All</a>
                        <a href="#" class="btn btn-outline-primary btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                        <a href="#" class="btn btn-outline-primary btn-sm">Zip</a>
                        <a href="#" class="btn btn-outline-primary btn-sm">Tar</a>
                        <a href="#" class="btn btn-outline-primary btn-sm">Copy</a>
                    </div>
                    <div class="col-3">
                        <p class="text-right">Copyright &copy; <?php echo date('Y'); ?></p>
                    </div>
                </div>
            </div>
        </footer>
    <?php endif; ?>
        <?php $parentDir = Load::getParentDir(); ?>
        <div class="modal fade" id="new_item" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="?module=create_item&type=action&path=<?php echo $parentDir; ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="label-block">Item Type: </label>
                            <div class="form-check form-check-inline">
                                <label for="item_folder">
                                    <input type="radio" id="item_folder" name="item_type" value="folder" checked> Folder
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label for="item_file">
                                    <input type="radio" id="item_file" name="item_type" value="file"> File
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="label-block">Name: </label>
                            <input type="text" name="item_name" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/v/bs5/dt-2.1.3/datatables.min.js"></script>
        <script type="text/javascript" src="assets/js/custom.js?ver=<?php echo rand(); ?>"></script>
    </body>
</html>