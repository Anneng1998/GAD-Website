<div id="edit<?php echo $research_data['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-warning">
                <h4 class="modal-title" id="primary-header-modalLabel">EDIT GAD BASED RESEARCH</h4>
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

            <div class="mb-3">
                    <label for="simpleinput" class="form-label">Project Title</label><span class="text-danger"> *</span>
                    <input type="text" name="title" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldTitle']?>" required>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Component Project Title</label><span class="text-danger"> *</span>
                    <input type="text" name="component" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldDescription']?>" required>
                </div>

                <div class="row">

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Duration</label><span class="text-danger"> *</span>
                            <input type="text" class="form-control date" name="duration" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" value="<?php echo $edit_qry_fetch['fldDuration']?>" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Total Budget Requested</label><span class="text-danger"> *</span>
                            <input type="number" name="budget" id="simpleinput" class="form-control" value="<?php echo $edit_qry_fetch['fldBudget']?>" required>
                        </div>
                    </div>

                    <div class = "col-6">
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Funding Scheme</label><span class="text-danger"> *</span>
                            <select class="form-select" name="funding" id="example-select">
                                <option value= "<?php echo $edit_qry_fetch['fldFund']?>"><?php echo $edit_qry_fetch['fldFund']?></option>
                                <option value = "CRG">CRG Faculty Funding</option>
                                <option value = "FSRCP">FSRCP Faculty Funding with Student</option>
                            </select>
                        </div>
                    </div>

                    <div class = "col-6">
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Research</label><span class="text-danger"> *</span>
                            <select class="form-select" name="research" id="example-select">
                                <option value= "<?php echo $edit_qry_fetch['fldResearch']?>"><?php echo $edit_qry_fetch['fldResearch']?></option>
                                <option value = "PROPOSAL">Proposal Research</option>
                                <option value = "ONGOING">Ongoing Research</option>
                                <option value = "COMPLETED">Completed Research</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr style="height: 5px;">

                <div class="row">
                    <div class="col-6">
                        <h6>Copy of Proposal</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/based-research/<?php echo $research_data['fldProposal'] ?>" target="_blank">
                            <?php echo $research_data['fldProposal'] ?>
                        </a>
                    </div>

                    <div class="col-6">
                        <h6>Accomplished HGDG Design</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/based-research/<?php echo $research_data['fldHgdg'] ?>" target="_blank">
                            <?php echo $research_data['fldHgdg'] ?>
                        </a>
                    </div>

                    <div class="col-6">
                        <h6>Copy of Paper</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/based-research/<?php echo $research_data['fldPaper'] ?>" target="_blank">
                            <?php echo $research_data['fldPaper'] ?>
                        </a>
                    </div>

                    <div class="col-6">
                        <h6>Accomplished PIMME Checklist</h6>
                        <a class="btn btn-danger btn-sm form-control" href="files/based-research/<?php echo $research_data['fldPIMME'] ?>" target="_blank">
                            <?php echo $research_data['fldPIMME'] ?>
                        </a>
                    </div>
                    
                </div>

                <hr style="height: 5px;"> 

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Copy of Proposal</label>
                    <div class="col-6 fallback">
                        <input name="file1" type="file" accept="pdf" multiple />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Accomplished HGDG Design</label>
                    <div class="col-6 fallback">
                        <input name="file2" type="file" accept="pdf" multiple />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Copy of Paper</label>
                    <div class="col-6 fallback">
                        <input name="file3" type="file" accept="pdf" multiple />
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Accomplished PIMME Checklist</label>
                    <div class="col-6 fallback">
                        <input name="file4" type="file" accept="pdf" multiple />
                    </div>
                </div>

            <div class="modal-footer">
                <button name="research-update" class="btn btn-primary">UPDATE</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->