<div id="edit<?php echo $research_data['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-warning">
                <h4 class="modal-title" id="primary-header-modalLabel">EDIT GAD BASED RESEARCH</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="backend/based-research-edit-process.php?id=<?php echo $research_data['fldID'] ?>" method="GET">

            <?php
                $id = $research_data['fldID'];
                $edit_qry = mysqli_query($db, "Select * from tbl_basedresearch where fldID = '$id' ");
                $edit_qry_fetch = mysqli_fetch_array($edit_qry);
            ?>

                <div class="mb-3">
                    <input type="hidden" name="researchid" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldID']?>">
                </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Title</label>
                    <input type="text" name="researchtitle" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldTitle']?>">
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Description</label>
                    <input type="text" name="researchdescription" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldDescription']?>">
                </div>

                <div class="mb-3">
                        <label for="example-select" class="form-label">Research</label>
                        <select class="form-select" name="researchtype" id="example-select">
                            <option value = "proposal">Proposal</option>
                            <option value = "completed">Completed Research</option>
                        </select>
                </div>

                <div class="mb-3">
                        <label for="example-select" class="form-label">Target Completion Date</label>
                        <input type="text" class="form-control date" name="completiondate" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                </div>

            <div class="modal-footer">
                <button name="research-update" class="btn btn-primary">UPDATE</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->