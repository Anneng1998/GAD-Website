<?php

$today = date('m-d-Y');

if(isset($_POST['addevents'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $descriptions = str_replace("'", "\'", $description);
    
    $img_name = $_FILES['file']['name'];
    $img_size = $_FILES['file']['size'];
    $img_tmp = $_FILES['file']['tmp_name'];
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

    $fileSizeRound = round($img_size / 1024 / 1024);
    $fileSize = $fileSizeRound.' MB';

    $img_ex_loc = strtolower($img_ex);

    $allow_ex = array("mp4");


    if($title == "" && $descriptions == ""){
        echo "<script>alert('All fields are required');window.location.href = 'news.php';</script>";
    } else {

            $new_name = $title.'.'.$img_ex_loc;
            $img_path_sa_buhay_niya = 'files/events/'.$new_name;
            move_uploaded_file($img_tmp, $img_path_sa_buhay_niya);

            $random = random_int(100000, 999999);
            $UniqueID = 'N'.$random;

            echo $insert_events = "INSERT INTO tbl_events (fldUID, event_title, event_desc, date_created, images, statuss, fldFrom) VALUES ('$UniqueID', '$title', '$descriptions', '$today', '$new_name', 'unarchive', 'tbl_events')";
            $insert_qry = mysqli_query($db, $insert_events); 

            echo "<script>alert('New events has been added successfully');window.location.href = 'news.php';</script>";
        }
    }

?>




<div id="warning-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="warning-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-warning">
                <h4 class="modal-title" id="warning-header-modalLabel">ADD EVENTS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="news.php" method="post" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data">

            <div class="modal-body">

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Title</label><span class="text-danger"> *</span>
                    <input type="text" name="title" id="simpleinput" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Description</label> <span class="text-danger"> *</span>
                    <input type="text" name="description" id="simpleinput" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Attach Image</label>
                    <div class="fallback">
                        <input name="file" type="file" accept="image/png, image/gif, image/jpeg" multiple />
                    </div>
                        <span class="text-muted font-13">(Accepted file type: .JPG)</span>
                </div> 
                
            </div>

            <div class="modal-footer">
                <button name="addevents" class="btn btn-warning">ADD</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->