<?php

$today = date('m-d-Y');

if(isset($_POST['addnews'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $descriptions = str_replace("'", "\'", $description);
    $link = $_POST['link'];

    if($title == "" && $descriptions == ""){
        echo "<script>alert('All fields are required');window.location.href = 'news.php';</script>";
    } else {
            $random = random_int(100000, 999999);
            $UniqueID = 'N'.$random;

            $insert_news = "INSERT INTO tbl_news (fldUID, news_title, news_date, news_desc, news_vid_link, statuss, fldFrom) VALUES ('$UniqueID', '$title', '$today', '$descriptions', '$link', 'unarchive', 'tbl_news')";
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