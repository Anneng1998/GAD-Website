<div id="accept<?php echo $user_data['fldIdNumber'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-success">
                <h4 class="modal-title" id="info-header-modalLabel">Warning</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                Are you sure to accept this user to access the site?
            </div>

            <div class="modal-footer">
                <form action="backend/pendingreg-accept-process.php?id=<?php echo $user_data['fldIdNumber'] ?>" method="post">
                    <button name="delete-video" class="btn btn-success">ACCEPT</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  