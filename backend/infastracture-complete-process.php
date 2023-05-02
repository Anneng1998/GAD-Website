<?php

include '../database/db.php';

$id = $_GET['id'];
$title = $_GET['title'];


if(isset($_POST['complete'])){
    $datecompleted = $_POST['datecompleted'];

    $file_name = $_FILES['report']['name'];
    $file_size = $_FILES['report']['size'];
    $file_tmp = $_FILES['report']['tmp_name'];
    $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);

    $fileSizeRound = round($file_size / 1024 / 1024);
    $fileSize = $fileSizeRound.' MB';

    $file_ex_loc = strtolower($file_ex);

    $allow_ex = array("pdf");

    if ($datecompleted == ""){
        echo "<script>alert('All fields are required!');window.location.href = 'infastracture.php';</script>";
    }else{
        $new_name = 'Accomplished_Report_'.$title.'.'.$file_ex_loc;
        $video_path_sa_buhay_niya = 'files/infastracture/'.$new_name;
        move_uploaded_file($file_tmp, $video_path_sa_buhay_niya);

        $update_infastracture = mysqli_query($db, "UPDATE tbl_infactracture SET fldDateCompleted = '$datecompleted', fldReport = '$new_name', fldType = 'COMPLETED' where fldID = '$id'");

        // echo '$update_infastracture';

        // $update_infastracture_qry = mysqli_query($db, $update_infastracture);

        echo "<script>alert('Data has been successfully update');window.location.href = '../infastracture.php';</script>";
    }

}


?>