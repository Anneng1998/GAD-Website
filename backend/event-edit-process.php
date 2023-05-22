<?php 
    include '../database/db.php';

    $id = $_GET['id'];

    if(isset($_POST['updatenews'])){
        $newtitle = $_POST['title'];
        $description = $_POST['description'];
        $newdesc = str_replace("'", "\'", $description);

        // $D_file_name = $_FILES['file']['name'];
        // $D_file_size = $_FILES['file']['size'];
        // $D_file_tmp = $_FILES['file']['tmp_name'];
        // $D_file_ex = pathinfo($D_file_name, PATHINFO_EXTENSION);

        // $D_fileSizeRound = round($D_file_size / 1024 / 1024);
        // $D_fileSize = $D_fileSizeRound.' MB';

        // $D_file_ex_loc = strtolower($D_file_ex);



        if($newtitle == "" && $newdesc == ""){
            echo "<script>alert('All fields are required');window.location.href = 'news.php';</script>";
        }else{

            // $check_file_qry = "SELECT images FROM tbl_events WHERE id = '$id'";
            // $check_file_sql = mysqli_query($db, $check_file_qry);
            // $check_file_fetch = mysqli_fetch_array($check_file_sql);

            // $D_new_name = 'Accomplished_PIMME_Checklist'.'.'.$newtitle.'.'.$D_file_ex_loc;
            // $D_video_path_sa_buhay_niya = '../../files/events/'.$D_new_name;
            // move_uploaded_file($D_file_tmp, $D_video_path_sa_buhay_niya);

            // if ($D_file_name == '') {
            //     $D_new_name = $check_file_fetch['images'];
            // } else {
            //     $D_new_name = 'Accomplished_PIMME_Checklist'.'.'.$newtitle.'.'.$D_file_ex_loc;
            //     $D_video_path_sa_buhay_niya = '../files/events/'.$D_new_name;
            //     move_uploaded_file($D_file_tmp, $D_video_path_sa_buhay_niya);
            // }

            $update_qry = mysqli_query($db, "UPDATE tbl_events SET event_title='$newtitle', event_desc='$newdesc' WHERE id = '$id'");
            echo "<script>alert('Updated Successfully');window.location.href = '../news.php';</script>";
        }
        
    }

?>