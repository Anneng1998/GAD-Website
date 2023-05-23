<?php

$today = date('m-d-Y');

if(isset($_POST['planupload'])){
    $title = $_POST['plantitle'];
    $descriptions = $_POST['planacademic'];

    $plan_excel = $_FILES['file']['name'];
    $plan_size = $_FILES['file']['size'];
    $plan_tmp = $_FILES['file']['tmp_name'];
    $plan_ex = pathinfo($plan_excel, PATHINFO_EXTENSION);

    $fileSizeRound = round($plan_size / 1024 / 1024);
    $fileSize = $fileSizeRound.' MB';

    $plan_ex_loc = strtolower($plan_ex);

    $allow_ex = array("xlsx");

    $title_check = mysqli_query($db, "SELECT * FROM tbl_planbudget WHERE fldTitle = '$title'");

    if (mysqli_num_rows($title_check) > 0) {
        echo "<script>alert('Invalid Title');window.location.href = 'plan.php';</script>";
    } else {
        if($title == "" && $descriptions == ""){
            echo "<script>alert('All fields are required');window.location.href = 'plan.php';</script>";
        } else {
            if ($fileSizeRound < 100) {
    
                $new_name = $title.'.'.$plan_ex_loc;
                $video_path_sa_buhay_niya = 'files/plan-budget-excel/'.$new_name;
                move_uploaded_file($plan_tmp, $video_path_sa_buhay_niya);

                $random = random_int(100000, 999999);
                $UniqueID = 'PB'.$random;
    
                $insert_plan = "INSERT INTO tbl_planbudget (fldUID, fldTitle, fldAcademic, fldDateUploaded, fldFile, fldStatus, fldFrom) VALUES ('$UniqueID', '$title', '$descriptions', '$today', '$new_name', 'unarchive', 'tbl_planbudget')";
                $insert_plan_qry = mysqli_query($db, $insert_plan);
    
                echo "<script>alert('New video has been added successfully');window.location.href = 'plan.php';</script>";
            } else {
                echo "<script>alert('Error in uplaoding');window.location.href = 'plan.php';</script>";
            }
        }
    }
}

?>


<div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">ADD DETAILS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="plan.php" method="post" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data">

            <div class="modal-body">

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Title</label><span class="text-danger"> *</span>
                    <input type="text" name="plantitle" id="simpleinput" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Academic Year</label> <span class="text-danger"> *</span>
                    <input type="text" name="planacademic" id="simpleinput" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Attach File</label> <span class="text-danger"> *</span>
                    <div class="fallback">
                        <input name="file" type="file" accept="xlsx" multiple />
                    </div>
                    <div class="dz-message needsclick">
                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                        <h3>Drop files here or click to upload.</h3>
                        <span class="text-muted font-13">(Accepted file type: EXCEL or XLS File Only)</span>
                    </div>
                </div>

                
                
            </div>

            <div class="modal-footer">
                <button name="planupload" class="btn btn-primary">UPLOAD</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->