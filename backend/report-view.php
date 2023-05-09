<div id="view<?php echo $report_data['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-warning">
                <h4 class="modal-title" id="info-header-modalLabel">VIEW DETAILS PLAN and BUDGET</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
            <form action="backend/plan-edit-process.php?id=<?php echo $report_data['fldID'] ?>" method="GET">
                <?php
                    $id = $report_data['fldID'];
                    $edit_qry = mysqli_query($db, "Select * from tbl_report where fldID = '$id' ");
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
                    <input type="text" name="planacademic" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldDescription']?>" disabled>
                </div>

                <div class = "row">

                    <div class="col-6">
                            <h6>Approved Activity Proposal/ Letter/ Memorandum</h6>
                            <a class="btn btn-danger btn-sm form-control" href="files/report/<?php echo $report_data['fldFile1'] ?>" target="_blank">
                                <?php echo $report_data['fldFile1'] ?>
                            </a>
                    </div>

                    <div class="col-6">
                            <h6>Official Program</h6>
                            <a class="btn btn-danger btn-sm form-control" href="files/report/<?php echo $report_data['fldFile2'] ?>" target="_blank">
                                <?php echo $report_data['fldFile2'] ?>
                            </a>
                    </div>
                </div>

                <div class = "row">
                    <div class="col-6">
                            <h6>Highlights of the activity with Photos</h6>
                            <a class="btn btn-danger btn-sm form-control" href="files/report/<?php echo $report_data['fldFile3'] ?>" target="_blank">
                                <?php echo $report_data['fldFile3'] ?>
                            </a>
                    </div>

                    <div class="col-6">
                            <h6>Attendance Sheet</h6>
                            <a class="btn btn-danger btn-sm form-control" href="files/report/<?php echo $report_data['fldFile4'] ?>" target="_blank">
                                <?php echo $report_data['fldFile4'] ?>
                            </a>
                    </div>
                </div>

                <div class = "row">
                    <div class="col-6">
                            <h6>Copy of Invitation Letters to Speak/s</h6>
                            <a class="btn btn-danger btn-sm form-control" href="files/report/<?php echo $report_data['fldFile5'] ?>" target="_blank">
                                <?php echo $report_data['fldFile5'] ?>
                            </a>
                    </div>

                    <div class="col-6">
                            <h6>Summary of Overall Activity evaluation</h6>
                            <a class="btn btn-danger btn-sm form-control" href="files/report/<?php echo $report_data['fldFile6'] ?>" target="_blank">
                                <?php echo $report_data['fldFile6'] ?>
                            </a>
                    </div>
                </div>

                <div class = "row">
                    <div class="col-6">
                            <h6>Sample Copy of Accomplished evaluation</h6>
                            <a class="btn btn-danger btn-sm form-control" href="files/report/<?php echo $report_data['fldFile7'] ?>" target="_blank">
                                <?php echo $report_data['fldFile7'] ?>
                            </a>
                    </div>

                    <div class="col-6">
                            <h6>Copy of Signed Certificate for Resource Speaker</h6>
                            <a class="btn btn-danger btn-sm form-control" href="files/report/<?php echo $report_data['fldFile8'] ?>" target="_blank">
                                <?php echo $report_data['fldFile8'] ?>
                            </a>
                    </div>
                </div>
                

            </div>


            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  