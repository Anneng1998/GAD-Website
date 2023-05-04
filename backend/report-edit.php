<div id="edit<?php echo $report_data['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">EDIT REPORT DETAILS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="report.php" method="GET">

            <div class="modal-body">

                <?php
                    $id = $report_data['fldID'];
                    $edit_qry = mysqli_query($db, "Select * from tbl_report where fldID = '$id' ");
                    $edit_qry_fetch = mysqli_fetch_array($edit_qry);
                ?>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Title</label><span class="text-danger"> *</span>
                    <input type="text" name="title" id="simpleinput" class="form-control" value = "<?php echo $edit_qry_fetch['fldTitle']?>" required>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Description</label> <span class="text-danger"> *</span>
                    <input type="text" name="description" id="simpleinput" class="form-control" value = "<?php echo $edit_qry_fetch['fldDescription']?>" required>
                </div>

                <span class="text-danger"> List of Means of Verification</span>

                <div class="row">
                    <div class="col-6">
                        <h6>Approved Activity Proposal</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/infastracture/<?php echo $report_data['fldFile1'] ?>" target="_blank">
                            <?php echo $report_data['fldFile1'] ?>
                        </a>
                    </div>
                    <div class="col-6">
                        <h6>Official Program</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/infastracture/<?php echo $report_data['fldFile2'] ?>" target="_blank">
                            <?php echo $report_data['fldFile2'] ?>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h6>Highlights of the Activity</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/infastracture/<?php echo $report_data['fldFile3'] ?>" target="_blank">
                            <?php echo $report_data['fldFile3'] ?>
                        </a>
                    </div>
                    <div class="col-6">
                        <h6>Attendance Sheet</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/infastracture/<?php echo $report_data['fldFile4'] ?>" target="_blank">
                            <?php echo $report_data['fldFile4'] ?>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h6>Copy of Invitation</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/infastracture/<?php echo $report_data['fldFile5'] ?>" target="_blank">
                            <?php echo $report_data['fldFile5'] ?>
                        </a>
                    </div>
                    <div class="col-6">
                        <h6>Overall Activity</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/infastracture/<?php echo $report_data['fldFile6'] ?>" target="_blank">
                            <?php echo $report_data['fldFile6'] ?>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h6>Accomplished evaluation</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/infastracture/<?php echo $report_data['fldFile7'] ?>" target="_blank">
                            <?php echo $report_data['fldFile7'] ?>
                        </a>
                    </div>
                    <div class="col-6">
                        <h6>Overall Activity</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/infastracture/<?php echo $report_data['fldFile8'] ?>" target="_blank">
                            <?php echo $report_data['fldFile8'] ?>
                        </a>
                    </div>
                </div>

                <hr style="height: 5px;">

                <div class="mb-3">
                        <!-- <label for="example-select" class="form-label">Date Uploaded</label><span class="text-danger"> *</span> -->
                        <input type="hidden" class="form-control date" name="date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                </div>

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Approved Activity Proposal/ Letter/ Memorandum</label>
                    <div class="col-6 fallback">
                        <input name="file1" type="file" accept="pdf" multiple />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Official Program</label>
                    <div class="col-6 fallback">
                        <input name="file2" type="file" accept="pdf" multiple />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Highlights of the activity with Photos</label>
                    <div class="col-6 fallback">
                        <input name="file3" type="file" accept="pdf" multiple />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Attendance Sheet</label>
                    <div class="col-6 fallback">
                        <input name="file4" type="file" accept="pdf" multiple />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Copy of Invitation Letters to Speak/s</label>
                    <div class="col-6 fallback">
                        <input name="file5" type="file" accept="pdf" multiple />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Summary of Overall Activity evaluation</label>
                    <div class="col-6 fallback">
                        <input name="file6" type="file" accept="pdf" multiple />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Sample Copy of Accomplished evaluation</label>
                    <div class="col-6 fallback">
                        <input name="file7" type="file" accept="pdf" multiple />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Copy of Signed Certificate for Resource Speaker</label>
                    <div class="col-6 fallback">
                        <input name="file8" type="file" accept="pdf" multiple />
                    </div>
                </div>

                
                
            </div>

            <div class="modal-footer">
                <button name="update" class="btn btn-primary">UPDATE</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->