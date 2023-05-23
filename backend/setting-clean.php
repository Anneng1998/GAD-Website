<div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="info-header-modalLabel">Delete Multiple Items</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                Are you sure you want to permanent delete all of this items
                <!-- </?php echo $data['fldUID'];?> 
                </?php echo $data['fldFrom'];?> -->
            </div>

            <div class="modal-footer">
                <a href="backend/setting-clean-process.php?id=<?php echo $data['fldUID'] ?>&&from=<?php echo $data['fldFrom'] ?>" class="btn btn-danger shadow btn-xs sharp me-1">DELETE ALL</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  