<?php

$today = date('m-d-Y');

if(isset($_POST['addnews'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $descriptions = str_replace("'", "\'", $description);
    $link = $_POST['link'];

    $img_name = $_FILES['file']['name'];
    $img_size = $_FILES['file']['size'];
    $img_tmp = $_FILES['file']['tmp_name'];
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

    $fileSizeRound = round($img_size / 1024 / 1024);
    $fileSize = $fileSizeRound.' MB';

    $img_ex_loc = strtolower($img_ex);

    $allow_ex = array("jpg");


    if($title == "" && $descriptions == ""){
        echo "<script>alert('All fields are required');window.location.href = 'news.php';</script>";
    } else {

            $new_name = $title.'.'.$img_ex_loc;
            $img_path_sa_buhay_niya = 'files/news/'.$new_name;
            move_uploaded_file($img_tmp, $img_path_sa_buhay_niya);

            $random = random_int(100000, 999999);
            $UniqueID = 'N'.$random;

            $insert_news = "INSERT INTO tbl_news (fldUID, news_title, news_date, news_desc, imagess, news_vid_link, statuss, fldFrom) VALUES ('$UniqueID', '$title', '$today', '$descriptions', '$new_name', '$link', 'unarchive', 'tbl_news')";
            $insert_qry = mysqli_query($db, $insert_news); 

            echo "<script>alert('New news has been added successfully');window.location.href = 'news.php';</script>";
        }
    }

?>

<div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">ADD NEWS</h4>
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

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Link(Optional)</label>
                    <input type="text" name="link" id="simpleinput" class="form-control">
                </div>
                
            </div>

            <div class="modal-footer">
                <button name="addnews" class="btn btn-primary">ADD</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->