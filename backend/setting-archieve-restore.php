<div id="restore<?php echo $data['fldUID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="info-header-modalLabel">Warning</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                Are you sure you want to restore this data?
            </div>

            <div class="modal-footer">
                <!-- <form action="backend/setting-archive-restore-process.php?id=<?php //echo $data['fldUID'] ?>&&from=<?php //echo $data['fldFrom'] ?>" method="post">
                    <a name="unarchieve" class="btn btn-danger shadow btn-xs sharp me-1">RESTORE</a>
                </form> -->
                <a href="backend/setting-archive-restore-process.php?id=<?php echo $data['fldUID'] ?>&&from=<?php echo $data['fldFrom'] ?>" class="btn btn-danger shadow btn-xs sharp me-1">RESTORE</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  