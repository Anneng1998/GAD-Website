<div id="seemore<?php echo $videodata['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="info-header-modalLabel">Description</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <?php
                    $id = $videodata['fldID'];
                    $see_msg_query = mysqli_query($db, "Select fldDescription from tbl_media where fldID = '$id'");
                    $see_msg_query_fetch = mysqli_fetch_array($see_msg_query);
                ?>

                <p>
                    <?php echo $see_msg_query_fetch['fldDescription'] ?>
                </p>

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  