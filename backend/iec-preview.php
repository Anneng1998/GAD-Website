<div id="preview<?php echo $iec_data['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">PREVIEW IEC MATERIALS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="backend/iec-edit-process.php?id=<?php echo $iec_data['fldID'] ?>" method="GET">

            <div class="modal-body">

                <?php
                    $id = $iec_data['fldID'];
                    $edit_qry = mysqli_query($db, "Select * from tbl_iec where fldID = '$id' ");
                    $edit_qry_fetch = mysqli_fetch_array($edit_qry);
                ?>

                <div class="mb-3">
                    <input type="hidden" name="iecid" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldID']?>">
                </div>

                <div class="mb-3">
                        <label for="example-select" class="form-label">Categories</label>
                        <!-- <input type="text" name="planacademic" id="simpleinput" class="form-control" value=""> -->
                        <select class="form-select" name="categories" id="example-select" value="" disabled>
                            <option value= "<?php echo $edit_qry_fetch['fldCategories']?>"><?php echo $edit_qry_fetch['fldCategories']?></option>
                            <option value = "Newsletter">Newsletter</option>
                            <option value = "Student Fact Sheet">Student Fact Sheet</option>
                            <option value = "Employee Fact Sheet">Employee Fact Sheet</option>
                            <option value = "GAD Related Laws and Mandates">GAD Related Laws and Mandates</option>
                            <option value = "Others">Others</option>
                        </select>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Title</label>
                    <input type="text" name="title" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldtitle']?>" disabled>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Description</label>
                    <input type="text" name="description" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldDescription']?>" disabled>
                </div>

                <div class="mb-3">
                        <label for="example-select" class="form-label">Assigned Units</label>
                        <select class="form-select" name="units" id="example-select" disabled>
                            <option value= "<?php echo $edit_qry_fetch['fldUnits']?>"><?php echo $edit_qry_fetch['fldUnits']?></option>
                            <option value = "GAD">GAD</option>
                            <option value = "DIT">DIT</option>
                            <option value = "DAS">DAS</option>
                            <option value = "DEPTEL">DEPTEL</option>
                            <option value = "HM">HM</option>
                            <option value = "BM">BM</option>
                            <option value = "RDE">RDE</option>
                        </select>
                </div>

                <div class="mb-3">
                        <label for="example-select" class="form-label">Date Uploaded</label>
                        <input type="text" class="form-control date" name="date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" value="<?php echo $edit_qry_fetch['fldDate']?>" disabled>
                </div>

                <div class="col-6">
                    <h6>Proposal</h6>
                    <a class="btn btn-danger btn-sm form-control" href="files/iec/<?php echo $iec_data['fldFile'] ?>" target="_blank">
                        <?php echo $iec_data['fldFile'] ?>
                    </a>
                </div>
                
            </div>

            <div class="modal-footer">
                <!-- <button type="submit" name="iec-update" class="btn btn-primary">UPDATE</button> -->
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->