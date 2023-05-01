<?php

if(isset($_POST['upload'])){
    $title = $_POST['title'];
    $proponent = $_POST['proponent'];
    $dateofapproval = $_POST['dateofapproval'];
    $sub_description = $_POST['description'];
    $description = str_replace("'", "\'", $sub_description); 
    $targetcompletion = $_POST['targetcompletion'];

    // // copy of proposal file = AR

    $AR_file_name = $_FILES['proposal']['name'];
    $AR_file_size = $_FILES['proposal']['size'];
    $AR_file_tmp = $_FILES['proposal']['tmp_name'];
    $AR_file_ex = pathinfo($AR_file_name, PATHINFO_EXTENSION);

    $AR_fileSizeRound = round($AR_file_size / 1024 / 1024);
    $AR_fileSize = $AR_fileSizeRound.' MB';

    $AR_file_ex_loc = strtolower($AR_file_ex);

    $AR_allow_ex = array("pdf");

    // accomplised hgdg file = hgdg

    $hgdg_file_name = $_FILES['hgdg']['name'];
    $hgdg_file_size = $_FILES['hgdg']['size'];
    $hgdg_file_tmp = $_FILES['hgdg']['tmp_name'];
    $hgdg_file_ex = pathinfo($hgdg_file_name, PATHINFO_EXTENSION);

    $hgdg_fileSizeRound = round($hgdg_file_size / 1024 / 1024);
    $hgdg_fileSize = $hgdg_fileSizeRound.' MB';

    $hgdg_file_ex_loc = strtolower($hgdg_file_ex);

    $hgdg_allow_ex = array("pdf");

    $title_checking = mysqli_query($db, "Select * from tbl_infactracture where fldTitle = '$title'");

    if (mysqli_num_rows($title_checking) > 0) {
        echo "<script>alert('Title already exists');window.location.href = 'infastracture.php';</script>";
    } else {
        if($title == "" && $proponent == "" && $dateofapproval == "" && $description == "" && $targetcompletion == "") {
            echo "<script>alert('All fields are required!');window.location.href = 'infastracture.php';</script>";
        } else {

            $AR_new_name = 'Accomplishment Report '.$title.'.'.$AR_file_ex_loc;
            $AR_video_path_sa_buhay_niya = 'files/IEC/'.$AR_new_name;
            move_uploaded_file($AR_file_tmp, $AR_video_path_sa_buhay_niya);

            $hgdg_new_name = 'Accomplishment HGDG '.$title.'.'.$hgdg_file_ex_loc;
            $hgdg_video_path_sa_buhay_niya = 'files/IEC/'.$hgdg_new_name;
            move_uploaded_file($hgdg_file_tmp, $hgdg_video_path_sa_buhay_niya);

            $random = random_int(100000, 999999);
            $UniqueID = 'INFAS'.$random;

            $insert_infastracture = "Insert into tbl_infactracture (fldUID, fldTitle, fldProponents, fldDateofApproval,fldDescription, fldType, fldTargetCompletion, fldCopyOfProposal, fldHGDG, fldStatus,fldFrom) VALUES ('$UniqueID','$title', '$proponent', '$dateofapproval', '$description', 'PROPOSAL', '$targetcompletion', '$AR_new_name', '$hgdg_new_name', 'unarchive', 'tbl_infactracture' )";

            $insert_infastracture_qry = mysqli_query($db, $insert_infastracture);

            echo "<script>alert('New data has been added successfully');window.location.href = 'infastracture.php';</script>";


            }
    }

}

?>

<div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">ADD INFASTRACTURE PROPOSAL</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="infastracture.php" method="post"  id="myAwesomeDropzone" enctype="multipart/form-data">
            <!-- class="dropzone" -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Title</label>
                            <input type="text" name="title" id="simpleinput" class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Proponent (Researcher)</label>
                            <input type="text" name="proponent" id="simpleinput" class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Date Of Approval</label>
                            <input type="text" class="form-control date" name="dateofapproval" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Target Completion</label>
                            <input type="text" class="form-control date" name="targetcompletion" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Description</label>
                            <input type="text" name="description" id="simpleinput" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Copy of Proposal</label>
                    <div class="col-6 fallback">
                        <input name="proposal" type="file" accept="pdf" multiple />
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
                <button name="upload" class="btn btn-primary">UPLOAD</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->