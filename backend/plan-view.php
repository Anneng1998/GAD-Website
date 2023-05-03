<div id="view<?php echo $plan_data['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-warning">
                <h4 class="modal-title" id="info-header-modalLabel">VIEW DETAILS PLAN and BUDGET</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
            <form action="backend/plan-edit-process.php?id=<?php echo $plan_data['fldID'] ?>" method="GET">
                <?php
                    $id = $plan_data['fldID'];
                    $edit_qry = mysqli_query($db, "Select * from tbl_planbudget where fldID = '$id' ");
                    $edit_qry_fetch = mysqli_fetch_array($edit_qry);
                ?>

                <div class="mb-3">
                    <input type="hidden" name="planid" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldID']?>">
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Title</label>
                    <input type="text" name="plantitle" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldTitle']?>" disabled>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Description</label>
                    <input type="text" name="planacademic" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldAcademic']?>" disabled>
                </div>

                <div class="col-6">
                        <h6>File</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/plan-budget-excel/<?php echo $plan_data['fldFile'] ?>" target="_blank">
                            <?php echo $plan_data['fldFile'] ?>
                        </a>
                </div>

            </div>

            <div class="modal-footer">
                    <!-- <button name="update-plan" class="btn btn-warning">UPDATE</button>  -->
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  