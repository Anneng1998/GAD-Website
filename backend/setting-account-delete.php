<div id="delete<?php echo $data['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="info-header-modalLabel">Warning</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                Are you sure you want to delete this Account?
                <!-- <?php echo $data['id'];?> -->
            </div>

            <div class="modal-footer">
                <form action="backend/setting-account-delete-process.php?id=<?php echo $data['id'] ?>" method="post">
                    <button name="delete-video" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  