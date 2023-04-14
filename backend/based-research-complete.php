<div id="done<?php echo $research_data['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="info-header-modalLabel">Warning</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                Are you sure to complete this project?
            </div>

            <div class="modal-footer">
                <form action="" method="post">
                <button class="btn btn-info shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#next<?php echo $research_data['fldID'] ?>">Complete</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  