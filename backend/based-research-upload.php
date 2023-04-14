<?php

$today = date('m-d-Y');

if(isset($_POST['mediaupload'])){
    $titles = $_POST['researchtitle'];
    $title = str_replace("'", "\'", $titles);
    $descriptions = $_POST['researchdescription'];
    $description = str_replace("'", "\'", $descriptions);
    // $researchtype = $_POST['researchtype'];

    // copy of proposal ito

    $CopyofProposal_file_name = $_FILES['file']['name'];
    $CopyofProposal_file_size = $_FILES['file']['size'];
    $CopyofProposal_file_tmp = $_FILES['file']['tmp_name'];
    $CopyofProposal_file_ex = pathinfo($CopyofProposal_file_name, PATHINFO_EXTENSION);

    $CopyofProposal_fileSizeRound = round($CopyofProposal_file_size / 1024 / 1024);
    $CopyofProposal_fileSize = $CopyofProposal_fileSizeRound.' MB';

    $CopyofProposal_file_ex_loc = strtolower($CopyofProposal_file_ex);

    $CopyofProposal_allow_ex = array("pdf");

    // HDGD checklist file

    $HDGDchecklist_file_name = $_FILES['hgdg']['name'];
    $HDGDchecklist_file_size = $_FILES['hgdg']['size'];
    $HDGDchecklist_file_tmp = $_FILES['hgdg']['tmp_name'];
    $HDGDchecklist_file_ex = pathinfo($HDGDchecklist_file_name, PATHINFO_EXTENSION);

    $HDGDchecklist_fileSizeRound = round($HDGDchecklist_file_size / 1024 / 1024);
    $HDGDchecklist_fileSize = $HDGDchecklist_fileSizeRound.' MB';

    $HDGDchecklist_file_ex_loc = strtolower($HDGDchecklist_file_ex);

    $HDGDchecklist_allow_ex = array("pdf");

    //checking ng title

    $CopyofProposal_title_check = mysqli_query($db, "SELECT * FROM tbl_basedresearch WHERE fldTitle = '$title'");
    $HDGDchecklist_title_check = mysqli_query($db, "SELECT * FROM tbl_basedresearch WHERE fldTitle = '$title'");


    if (mysqli_num_rows($CopyofProposal_title_check) > 0) {
        echo "<script>alert('Invalid Title');window.location.href = 'based-research.php';</script>";
    } elseif (mysqli_num_rows($HDGDchecklist_title_check) > 0) {
        echo "<script>alert('Invalid Title');window.location.href = 'based-research.php';</script>";
    } else {
        if($title == "" && $description == ""){
            echo "<script>alert('All fields are required');window.location.href = 'based-research.php';</script>";
        } else {
            if ($CopyofProposal_fileSizeRound < 100 && $HDGDchecklist_fileSizeRound < 100) {
    
                $CopyofProposal_new_name = $title.'.'.$CopyofProposal_file_ex_loc;
                $CopyofProposal_video_path_sa_buhay_niya = 'files/based-research-copy-of-proposal/'.$CopyofProposal_file_name;
                move_uploaded_file($CopyofProposal_file_tmp, $CopyofProposal_video_path_sa_buhay_niya);


                $HDGDchecklist_new_name = $title.'.'.$HDGDchecklist_file_ex_loc;
                $HDGDchecklist_video_path_sa_buhay_niya = 'files/based-research-hgdg/'.$HDGDchecklist_file_name;
                move_uploaded_file($HDGDchecklist_file_tmp, $HDGDchecklist_video_path_sa_buhay_niya);

                $random = random_int(100000, 999999);
                $UniqueID = 'BR'.$random;
    
                $insert_based_research = "INSERT INTO tbl_basedresearch (fldUID, fldTitle, fldDescription, fldResearch, fldDateCompletion, fldCopyofProposal, fldChecklist, fldStatus, fldFrom) VALUES ('$UniqueID', '$title', '$description', 'PROPOSAL', '$today', '$CopyofProposal_file_name','$HDGDchecklist_file_name', 'unarchive', 'tbl_basedresearch')";
                $insert_based_research_qry = mysqli_query($db, $insert_based_research);
    
                echo "<script>alert('New video has been added successfully');window.location.href = 'based-research.php';</script>";
            } else {
                echo "<script>alert('Too much love');window.location.href = 'based-research.php';</script>";
            }
        }
    }
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
                    <label for="simpleinput" class="form-label">Title</label>
                    <input type="text" name="researchtitle" id="simpleinput" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Description</label>
                    <input type="text" name="researchdescription" id="simpleinput" class="form-control">
                </div>

                <!-- <div class="mb-3">
                        <label for="example-select" class="form-label">Research</label>
                        <select class="form-select" name="researchtype" id="example-select">
                            <option value = "proposal">Proposal</option>
                            <option value = "completed">Completed Research</option>
                        </select>
                </div> -->

                <div class="mb-3">
                        <label for="example-select" class="form-label">Target Completion Date</label>
                        <input type="text" class="form-control date" name="completiondate" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                </div>

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Copy of Proposal</label>
                    <div class="col-6 fallback">
                        <input name="file" type="file" accept="pdf" multiple />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Accomplished HGDG Design</label>
                    <div class="col-6 fallback">
                        <input name="hgdg" type="file" accept="pdf" multiple />
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