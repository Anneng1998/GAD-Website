<div id="viewhgdg<?php echo $research_data['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             
            <?php
                $id = $research_data['fldID'];

                $fileview_qry = mysqli_query($db, "Select * from tbl_basedresearch where fldID = '$id' ");
                $fileview_qry_fetch = mysqli_fetch_array($fileview_qry);
            ?>

            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="info-header-modalLabel"><?php echo $fileview_qry_fetch['fldChecklist']  ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body w-100 p-3 mw-100">
                <embed  src="files/based-research-hgdg/<?php echo $fileview_qry_fetch['fldChecklist'] ?>" width="100%" height="100%" controls>
                </embed >
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->