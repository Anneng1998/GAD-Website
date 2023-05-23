<?php

$today = date('m-d-Y');

if(isset($_POST['upload'])){
    $categories = $_POST['categories'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $units = $_POST['units'];
    $date = $_POST['date'];

    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);

    $fileSizeRound = round($file_size / 1024 / 1024);
    $fileSize = $fileSizeRound.' MB';

    $file_ex_loc = strtolower($file_ex);

    $allow_ex = array("pdf");

    if($categories == "" || $title == "" || $description == "" || $units == "" || $date == ""){
        echo "<script>alert('Fill all fields correctly');window.location.href = 'iec.php';</script>";
    } else {

        $new_name = $title.'.'.$file_ex_loc;
        $video_path_sa_buhay_niya = 'files/IEC/'.$new_name;
        move_uploaded_file($file_tmp, $video_path_sa_buhay_niya);

        $random = random_int(100000, 999999);
        $UniqueID = 'IEC'.$random;

        $insert_iec = "INSERT INTO tbl_iec (fldUID, fldCategories, fldtitle, fldDescription, fldUnits, fldDate, fldFile, fldStatus, fldFrom) VALUES('$UniqueID','$categories', '$title', '$description', '$units', '$today', '$new_name', 'unarchive', 'tbl_iec')";
        
        // echo $insert_iec;

        $insert_iec_qry = mysqli_query($db, $insert_iec);

        // echo $insert_iec_qry;

        echo "<script>alert('New data has been added successfully');window.location.href = 'iec.php';</script>";
    }

}

?>

<div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">UPLOAD IEC MATERIALS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="iec.php" method="post" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data">

            <div class="modal-body">

                <div class="mb-3">
                        <label for="example-select" class="form-label">Categories</label><span class="text-danger"> *</span>
                        <select class="form-select" name="categories" id="example-select">
                            <option value= "">SELECT</option>
                            <option value = "Newsletter">Newsletter</option>
                            <option value = "Student Fact Sheet">Student Fact Sheet</option>
                            <option value = "Employee Fact Sheet">Employee Fact Sheet</option>
                            <option value = "GAD Related Laws and Mandates">GAD Related Laws and Mandates</option>
                            <option value = "Others">Others</option>
                        </select>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Title</label><span class="text-danger"> *</span>
                    <input type="text" name="title" id="simpleinput" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Description</label><span class="text-danger"> *</span>
                    <input type="text" name="description" id="simpleinput" class="form-control" required>
                </div>

                <div class="mb-3">
                        <label for="example-select" class="form-label">Assigned Units</label><span class="text-danger"> *</span>
                        <select class="form-select" name="units" id="example-select">
                            <option value= "">SELECT</option>
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
                        <!-- <label for="example-select" class="form-label">Date Uploaded</label><span class="text-danger"> *</span> -->
                        <input type="hidden" class="form-control date" name="date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Attach File</label><span class="text-danger"> *</span>
                    <div class="fallback">
                        <input name="file" type="file" accept="pdf, image/png, image/jpeg" multiple />
                        <label>PDF, DOCS, PNG, JPG, MP4, and ZIP file Only</label>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" name="upload" class="btn btn-primary">UPLOAD</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->