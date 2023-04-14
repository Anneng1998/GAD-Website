<div id="edit<?php echo $videodata['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-warning">
                <h4 class="modal-title" id="info-header-modalLabel">Edit Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
            <form action="backend/media-reference-edit-process.php?id=<?php echo $videodata['fldID'] ?>" method="GET">
                <?php
                    $id = $videodata['fldID'];
                    $edit_qry = mysqli_query($db, "Select * from tbl_media where fldID = '$id' ");
                    $edit_qry_fetch = mysqli_fetch_array($edit_qry);
                ?>

                <div class="mb-3">
                    <input type="hidden" name="videoid" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldID']?>">
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Title</label>
                    <input type="text" name="videotitle" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldTitle']?>">
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Description</label>
                    <input type="text" name="videodescription" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldDescription']?>">
                </div>

            </div>

            <div class="modal-footer">
                    <button name="update-video" class="btn btn-warning">UPDATE</button> 
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  