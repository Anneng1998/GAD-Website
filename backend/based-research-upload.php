<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php

$today = date('m-d-Y');

if(isset($_POST['mediaupload'])){
    $titles = $_POST['title'];
    $title = str_replace("'", "\'", $titles);
    $component = $_POST['component'];
    $duration = $_POST['duration'];
    $budget = $_POST['budget'];
    $fund = $_POST['funding'];
    $research = $_POST['research']; 
    $from = $_POST['dfrom'];
    $to = $_POST['dto'];

    // copy of proposal 

    $Proposal_file_name = $_FILES['file1']['name'];
    $Proposal_file_size = $_FILES['file1']['size'];
    $Proposal_file_tmp = $_FILES['file1']['tmp_name'];
    $Proposal_file_ex = pathinfo($Proposal_file_name, PATHINFO_EXTENSION);

    $Proposal_fileSizeRound = round($Proposal_file_size / 1024 / 1024);
    $Proposal_fileSize = $Proposal_fileSizeRound.' MB';

    $Proposal_file_ex_loc = strtolower($Proposal_file_ex);

    $Proposal_allow_ex = array("pdf");

    // HDGD checklist file

    $HGDG_file_name = $_FILES['file2']['name'];
    $HGDG_file_size = $_FILES['file2']['size'];
    $HGDG_file_tmp = $_FILES['file2']['tmp_name'];
    $HGDG_file_ex = pathinfo($HGDG_file_name, PATHINFO_EXTENSION);

    $HGDG_fileSizeRound = round($HGDG_file_size / 1024 / 1024);
    $HGDG_fileSize = $HGDG_fileSizeRound.' MB';

    $HGDG_file_ex_loc = strtolower($HGDG_file_ex);

    $HGDG_allow_ex = array("pdf");

    // paper file

    $paper_file_name = $_FILES['file3']['name'];
    $paper_file_size = $_FILES['file3']['size'];
    $paper_file_tmp = $_FILES['file3']['tmp_name'];
    $paper_file_ex = pathinfo($paper_file_name, PATHINFO_EXTENSION);

    $paper_fileSizeRound = round($paper_file_size / 1024 / 1024);
    $paper_fileSize = $paper_fileSizeRound.' MB';

    $paper_file_ex_loc = strtolower($paper_file_ex);

    $paper_allow_ex = array("pdf");

    // PIMME file

    $PIMME_file_name = $_FILES['file4']['name'];
    $PIMME_file_size = $_FILES['file4']['size'];
    $PIMME_file_tmp = $_FILES['file4']['tmp_name'];
    $PIMME_file_ex = pathinfo($PIMME_file_name, PATHINFO_EXTENSION);

    $PIMME_fileSizeRound = round($PIMME_file_size / 1024 / 1024);
    $PIMME_fileSize = $PIMME_fileSizeRound.' MB';

    $PIMME_file_ex_loc = strtolower($PIMME_file_ex);

    $PIMME_allow_ex = array("pdf");


    if($title == "" || $component == "" || $duration == "" || $budget == "" || $fund == "" || $research == ""){
        echo "<script>alert('Fill all fields correctly');window.location.href = 'based-research.php';</script>";
    }else{
        $random = random_int(100000, 999999);
        $UniqueID = 'BR'.$random;

        $Proposal_new_name = 'Copy_of_Proposal'.'.'.$title.'.'.$Proposal_file_ex_loc;
        $Proposal_video_path_sa_buhay_niya = 'files/based-research/'.$Proposal_new_name;
        move_uploaded_file($Proposal_file_tmp, $Proposal_video_path_sa_buhay_niya);

        $HGDG_new_name = 'Accomplished_HGDG_Design'.'.'.$title.'.'.$HGDG_file_ex_loc;
        $HGDG_video_path_sa_buhay_niya = 'files/based-research/'.$HGDG_new_name;
        move_uploaded_file($HGDG_file_tmp, $HGDG_video_path_sa_buhay_niya);

        $paper_new_name = 'Copy of Paper'.'.'.$title.'.'.$paper_file_ex_loc;
        $paper_video_path_sa_buhay_niya = 'files/based-research/'.$paper_new_name;
        move_uploaded_file($paper_file_tmp, $paper_video_path_sa_buhay_niya);

        $PIMME_new_name = 'Accomplished_PIMME_Checklist'.'.'.$title.'.'.$PIMME_file_ex_loc;
        $PIMME_video_path_sa_buhay_niya = 'files/based-research/'.$PIMME_new_name;
        move_uploaded_file($PIMME_file_tmp, $PIMME_video_path_sa_buhay_niya);

        $insert_research = "INSERT INTO tbl_basedresearch (fldUID, fldTitle, fldDescription, fldResearch, fldDFrom, fldDTo, fldDuration, fldBudget, fldFund, fldProposal, fldHgdg, fldPaper, fldPIMME, fldStatus, fldFrom) VALUES ('$UniqueID', '$title', '$component', '$research', '$from', '$to', '$duration', '$budget', '$fund', '$Proposal_new_name', '$HGDG_new_name', '$paper_new_name', '$PIMME_new_name', 'unarchive', 'tbl_basedresearch')";

        $insert_research_qry = mysqli_query($db, $insert_research);

        echo "<script>alert('New data has been added successfully');window.location.href = 'based-research.php';</script>";
    }

    // //checking ng title

    // if ($research == 'COMPLETED') {
    //     echo 'true';
    // } else {
    //     echo 'false';
    // }

    // $CopyofProposal_title_check = mysqli_query($db, "SELECT * FROM tbl_basedresearch WHERE fldTitle = '$title'");
    // $HDGDchecklist_title_check = mysqli_query($db, "SELECT * FROM tbl_basedresearch WHERE fldTitle = '$title'");




    // if (mysqli_num_rows($CopyofProposal_title_check) > 0) {
    //     echo "<script>alert('Invalid Title');window.location.href = 'based-research.php';</script>";
    // } elseif (mysqli_num_rows($HDGDchecklist_title_check) > 0) {
    //     echo "<script>alert('Invalid Title');window.location.href = 'based-research.php';</script>";
    // } else {
    //     if($title == "" && $description == ""){
    //         echo "<script>alert('All fields are required');window.location.href = 'based-research.php';</script>";
    //     } else {
    //         if ($CopyofProposal_fileSizeRound < 100 && $HDGDchecklist_fileSizeRound < 100) {
    
    //             $CopyofProposal_new_name = $title.'.'.$CopyofProposal_file_ex_loc;
    //             $CopyofProposal_video_path_sa_buhay_niya = 'files/based-research-copy-of-proposal/'.$CopyofProposal_file_name;
    //             move_uploaded_file($CopyofProposal_file_tmp, $CopyofProposal_video_path_sa_buhay_niya);


    //             $HDGDchecklist_new_name = $title.'.'.$HDGDchecklist_file_ex_loc;
    //             $HDGDchecklist_video_path_sa_buhay_niya = 'files/based-research-hgdg/'.$HDGDchecklist_file_name;
    //             move_uploaded_file($HDGDchecklist_file_tmp, $HDGDchecklist_video_path_sa_buhay_niya);

    //             $random = random_int(100000, 999999);
    //             $UniqueID = 'BR'.$random;
    
    //             $insert_based_research = "INSERT INTO tbl_basedresearch (fldUID, fldTitle, fldDescription, fldResearch, fldDateCompletion, fldCopyofProposal, fldChecklist, fldStatus, fldFrom) VALUES ('$UniqueID', '$title', '$description', 'PROPOSAL', '$today', '$CopyofProposal_file_name','$HDGDchecklist_file_name', 'unarchive', 'tbl_basedresearch')";
    //             $insert_based_research_qry = mysqli_query($db, $insert_based_research);
    
    //             echo "<script>alert('New video has been added successfully');window.location.href = 'based-research.php';</script>";
    //         } else {
    //             echo "<script>alert('Too much love');window.location.href = 'based-research.php';</script>";
    //         }
    //     }
    // }
}

?>



<div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">ADD GAD BASED RESEARCH</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="based-research.php" method="post" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data">

            <div class="modal-body">

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Project Title</label><span class="text-danger"> *</span>
                    <input type="text" name="title" id="simpleinput" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Component Project Title</label><span class="text-danger"> *</span>
                    <input type="text" name="component" id="simpleinput" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Duration</label><span class="text-danger"> *</span>
                    <div class ="row">
                        <div class="col-6">
                            <label for="simpleinput" class="form-label">From</label>
                            <input type="text" name="Dfrom" id="simpleinput" class="form-control" required>
                        </div>
                        <div class="col-6">
                        <label for="simpleinput" class="form-label">To</label>
                            <input type="text" name="Dto" id="simpleinput" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Date of Approved</label><span class="text-danger"> *</span>
                            <input type="text" class="form-control date" name="duration" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Total Budget Requested</label><span class="text-danger"> *</span>
                            <input type="number" name="budget" id="simpleinput" class="form-control">
                        </div>
                    </div>

                    <div class = "col-6">
                        <div class="mb-3">
                            <label class="form-label">Funding Scheme</label><span class="text-danger"> *</span>
                            <select class="form-select" name="funding">
                                <option value= "">SELECT</option>
                                <option value = "CRG">CRG Faculty Funding</option>
                                <option value = "FSRCP">FSRCP Faculty Funding with Student</option>
                            </select>
                        </div>
                    </div>

                    <div class = "col-6">
                        <div class="mb-3">
                            <label for="select" class="form-label">Research</label><span class="text-danger"> *</span>
                            <select class="form-select test" name="research" id="testid">
                                <option value= "">SELECT</option>
                                <option value = "PROPOSAL">Proposal Research</option>
                                <option value = "ONGOING">Ongoing Research</option>
                                <option value = "COMPLETED">Completed Research</option>
                            </select>
                        </div>
                    </div>
                    
                </div>


                <div id="show1"> 
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-6 col-form-label">Copy of Proposal</label>
                        <div class="col-6 fallback">
                            <input name="file1" type="file" accept="pdf" multiple />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-6 col-form-label">Accomplished HGDG Design Checklist</label>
                        <div class="col-6 fallback">
                            <input name="file2" type="file" accept="pdf" multiple />
                        </div>
                    </div>
                </div>

                <div id="show2"> 
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
                </div>

            </div>

            <div class="modal-footer">
                <button name="mediaupload" class="btn btn-primary">UPLOAD</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
    $(document).ready(function() {
        $('#show1').hide();
        $('#show2').hide();
        $("#testid").change(function() {

            var test = $('.test option:selected').val();
                    
            if (test == "COMPLETED") {
                $('#show2').show();
                $('#show1').hide();
                // console.log(test);
            } else if (test != "COMPLETED") {
                $('#show1').show();
                $('#show2').hide();
                // console.log(test);
            }
        });
    })
</script>