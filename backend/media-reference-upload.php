<?php

$today = date('m-d-Y');

if(isset($_POST['mediaupload'])){
    $titles = $_POST['videotitle'];
    $title = str_replace("'", "\'", $titles);
    $descriptions = $_POST['videodescription'];
    $description = str_replace("'", "\'", $descriptions);

    $video_name = $_FILES['file']['name'];
    $video_size = $_FILES['file']['size'];
    $video_tmp = $_FILES['file']['tmp_name'];
    $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

    $fileSizeRound = round($video_size / 1024 / 1024);
    $fileSize = $fileSizeRound.' MB';

    $video_ex_loc = strtolower($video_ex);

    $allow_ex = array("mp4");

    $title_check = mysqli_query($db, "SELECT * FROM tbl_media WHERE fldTitle = '$title'");

    if (mysqli_num_rows($title_check) > 0) {
        echo "<script>alert('Invalid Title');window.location.href = 'media-reference.php';</script>";
    } else {
        if($title == "" && $description == ""){
            echo "<script>alert('All fields are required');window.location.href = 'media-reference.php';</script>";
        } else {
            if ($fileSizeRound < 100) {
    
                $new_name = $title.'.'.$video_ex_loc;
                $video_path_sa_buhay_niya = 'files/video/'.$new_name;
                move_uploaded_file($video_tmp, $video_path_sa_buhay_niya);

                $random = random_int(100000, 999999);
                $UniqueID = 'MR'.$random;
    
                $insert_mediareference = "INSERT INTO tbl_media (fldUID, fldTitle, fldDescription, fldDateUploaded, fldSize, fldFileName, fldStatus, fldFrom) VALUES ('$UniqueID', '$title', '$description', '$today', '$fileSize', '$new_name', 'unarchive', 'tbl_media')";
                $insert_mediareference_qry = mysqli_query($db, $insert_mediareference);
    
                echo "<script>alert('New video has been added successfully');window.location.href = 'media-reference.php';</script>";
            } else {
                echo "<script>alert('Too much love');window.location.href = 'media-reference.php';</script>";
            }
        }
    }
}

?>


<div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">Add Video</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="media-reference.php" method="post" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data">

            <div class="modal-body">

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Title</label><span class="text-danger"> *</span>
                    <input type="text" name="videotitle" id="simpleinput" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Description</label><span class="text-danger"> *</span>
                    <input type="text" name="videodescription" id="simpleinput" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Attach Video</label>
                    <div class="fallback">
                        <input name="file" type="file" accept="video/mp4,video/x-m4v,video/*" multiple />
                    </div>
                    <div class="dz-message needsclick">
                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                        <h3>Drop files here or click to upload.</h3>
                        <span class="text-muted font-13">(Accepted file type: .MP4)</span>
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