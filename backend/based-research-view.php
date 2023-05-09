<div id="views<?php echo $research_data['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-warning">
                <h4 class="modal-title" id="primary-header-modalLabel">List of Means Verification</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="backend/based-research-edit-process.php?id=<?php echo $research_data['fldID'] ?>" method="POST" id="myAwesomeDropzone" enctype="multipart/form-data">

            <?php
                $id = $research_data['fldID'];
                $edit_qry = mysqli_query($db, "Select * from tbl_basedresearch where fldID = '$id' ");
                $edit_qry_fetch = mysqli_fetch_array($edit_qry);
            ?>

                <div class="mb-3">
                    <input type="hidden" name="researchid" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldID']?>">
                </div>

            <div class="modal-body">

                <div class="col-8">
                    <h4>Proposal</h4>
                    <a class="btn btn-danger btn-sm form-control" href="files/based-research/<?php echo $research_data['fldProposal'] ?>" target="_blank">
                        <?php echo $research_data['fldProposal'] ?>
                    </a>
                </div>

                <div class="col-8">
                    <h4>Accomplished HGDG</h4>
                    <a class="btn btn-danger btn-sm form-control" href="files/based-research/<?php echo $research_data['fldHgdg'] ?>" target="_blank">
                        <?php echo $research_data['fldHgdg'] ?>
                    </a>
                </div>

                <div class="col-8">
                    <h4>Copy Paper</h4>
                    <a class="btn btn-danger btn-sm form-control" href="files/based-research/<?php echo $research_data['fldPaper'] ?>" target="_blank">
                        <?php echo $research_data['fldPaper'] ?>
                    </a>
                </div>

                <div class="col-8">
                    <h4>Accomplished PIMME Checklist</h4>
                    <a class="btn btn-danger btn-sm form-control" href="files/based-research/<?php echo $research_data['fldPIMME'] ?>" target="_blank">
                        <?php echo $research_data['fldPIMME'] ?>
                    </a>
                </div>

            </div>

            <br>
            <br>
            <br>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->