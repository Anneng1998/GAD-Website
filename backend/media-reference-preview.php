<div id="preview<?php echo $videodata['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="info-header-modalLabel">Video Preview</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <?php
                $id = $videodata['fldID'];

                $videoview_qry = mysqli_query($db, "Select * from tbl_media where fldID = '$id' ");
                $videoview_qry_fetch = mysqli_fetch_array($videoview_qry);
            ?>
            <div class="modal-body">
                <video width="100%" controls>
                    <source src="files/video/<?php echo $videoview_qry_fetch['fldFileName'] ?>" type="video/mp4">
                </video>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->