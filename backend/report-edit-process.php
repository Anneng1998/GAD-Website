<?php

include '../database/db.php';

$id = $_GET['id'];

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $sub_description = $_POST['description'];
    $descriptions = str_replace("'", "\'", $sub_description); 

    // // Approved Activity Proposal/ Letter/ Memorandum = A

    $A_file_name = $_FILES['file1']['name'];
    $A_file_size = $_FILES['file1']['size'];
    $A_file_tmp = $_FILES['file1']['tmp_name'];
    $A_file_ex = pathinfo($A_file_name, PATHINFO_EXTENSION);

    $A_fileSizeRound = round($A_file_size / 1024 / 1024);
    $A_fileSize = $A_fileSizeRound.' MB';

    $A_file_ex_loc = strtolower($A_file_ex);

    $A_allow_ex = array("pdf");

    // // Official Program = B

    $B_file_name = $_FILES['file2']['name'];
    $B_file_size = $_FILES['file2']['size'];
    $B_file_tmp = $_FILES['file2']['tmp_name'];
    $B_file_ex = pathinfo($B_file_name, PATHINFO_EXTENSION);

    $B_fileSizeRound = round($B_file_size / 1024 / 1024);
    $B_fileSize = $B_fileSizeRound.' MB';

    $B_file_ex_loc = strtolower($B_file_ex);

    $B_allow_ex = array("pdf");

    // // Highlights of the activity with Photos = C

    $C_file_name = $_FILES['file3']['name'];
    $C_file_size = $_FILES['file3']['size'];
    $C_file_tmp = $_FILES['file3']['tmp_name'];
    $C_file_ex = pathinfo($C_file_name, PATHINFO_EXTENSION);

    $C_fileSizeRound = round($C_file_size / 1024 / 1024);
    $C_fileSize = $C_fileSizeRound.' MB';

    $C_file_ex_loc = strtolower($C_file_ex);

    $C_allow_ex = array("pdf");

    // // Attendance Sheet = D

    $D_file_name = $_FILES['file4']['name'];
    $D_file_size = $_FILES['file4']['size'];
    $D_file_tmp = $_FILES['file4']['tmp_name'];
    $D_file_ex = pathinfo($D_file_name, PATHINFO_EXTENSION);

    $D_fileSizeRound = round($D_file_size / 1024 / 1024);
    $D_fileSize = $D_fileSizeRound.' MB';

    $D_file_ex_loc = strtolower($D_file_ex);

    $D_allow_ex = array("pdf");

    // // Copy of Invitation Letters to Speak/s = E

    $E_file_name = $_FILES['file5']['name'];
    $E_file_size = $_FILES['file5']['size'];
    $E_file_tmp = $_FILES['file5']['tmp_name'];
    $E_file_ex = pathinfo($E_file_name, PATHINFO_EXTENSION);

    $E_fileSizeRound = round($E_file_size / 1024 / 1024);
    $E_fileSize = $E_fileSizeRound.' MB';

    $E_file_ex_loc = strtolower($E_file_ex);

    $E_allow_ex = array("pdf");

    // // Summary of Overall Activity evaluation = F

    $F_file_name = $_FILES['file6']['name'];
    $F_file_size = $_FILES['file6']['size'];
    $F_file_tmp = $_FILES['file6']['tmp_name'];
    $F_file_ex = pathinfo($F_file_name, PATHINFO_EXTENSION);

    $F_fileSizeRound = round($F_file_size / 1024 / 1024);
    $F_fileSize = $F_fileSizeRound.' MB';

    $F_file_ex_loc = strtolower($F_file_ex);

    $F_allow_ex = array("pdf");

    // // Sample Copy of Accomplished evaluation = G

    $G_file_name = $_FILES['file7']['name'];
    $G_file_size = $_FILES['file7']['size'];
    $G_file_tmp = $_FILES['file7']['tmp_name'];
    $G_file_ex = pathinfo($G_file_name, PATHINFO_EXTENSION);

    $G_fileSizeRound = round($G_file_size / 1024 / 1024);
    $G_fileSize = $G_fileSizeRound.' MB';

    $G_file_ex_loc = strtolower($G_file_ex);

    $G_allow_ex = array("pdf");

    // // Copy of Signed Certificate for Resource Speaker = H

    $H_file_name = $_FILES['file8']['name'];
    $H_file_size = $_FILES['file8']['size'];
    $H_file_tmp = $_FILES['file8']['tmp_name'];
    $H_file_ex = pathinfo($H_file_name, PATHINFO_EXTENSION);

    $H_fileSizeRound = round($H_file_size / 1024 / 1024);
    $H_fileSize = $H_fileSizeRound.' MB';

    $H_file_ex_loc = strtolower($H_file_ex);

    $H_allow_ex = array("pdf");


    $title_checking = mysqli_query($db, "Select * from tbl_report where fldTitle = '$title'");
    if (mysqli_num_rows($title_checking) > 0) {
        echo "<script>alert('Title already exists');window.location.href = 'report.php';</script>";
    } else {
        if($title == "" && $descriptions == "" ) {
            echo "<script>alert('All fields are required!');window.location.href = 'report.php';</script>";
        } else {

            $A_new_name = 'Approved_Activity'.'.'.$title.'.'.$A_file_ex_loc;
            $A_video_path_sa_buhay_niya = 'files/report/'.$A_new_name;
            move_uploaded_file($A_file_tmp, $A_video_path_sa_buhay_niya);

            $B_new_name = 'Official_Program'.'.'.$title.'.'.$B_file_ex_loc;
            $B_video_path_sa_buhay_niya = 'files/report/'.$B_new_name;
            move_uploaded_file($B_file_tmp, $B_video_path_sa_buhay_niya);

            $C_new_name = 'Highlights'.'.'.$title.'.'.$C_file_ex_loc;
            $C_video_path_sa_buhay_niya = 'files/report/'.$C_new_name;
            move_uploaded_file($C_file_tmp, $C_video_path_sa_buhay_niya);

            $D_new_name = 'Attendance_Sheet'.'.'.$title.'.'.$D_file_ex_loc;
            $D_video_path_sa_buhay_niya = 'files/report/'.$D_new_name;
            move_uploaded_file($D_file_tmp, $D_video_path_sa_buhay_niya);

            $E_new_name = 'Invitation'.'.'.$title.'.'.$E_file_ex_loc;
            $E_video_path_sa_buhay_niya = 'files/report/'.$E_new_name;
            move_uploaded_file($E_file_tmp, $E_video_path_sa_buhay_niya);

            $F_new_name = 'Overall_Activity'.'.'.$title.'.'.$F_file_ex_loc;
            $F_video_path_sa_buhay_niya = 'files/report/'.$F_new_name;
            move_uploaded_file($F_file_tmp, $F_video_path_sa_buhay_niya);

            $G_new_name = 'Accomplished_Evaluation'.'.'.$title.'.'.$G_file_ex_loc;
            $G_video_path_sa_buhay_niya = 'files/report/'.$G_new_name;
            move_uploaded_file($G_file_tmp, $G_video_path_sa_buhay_niya);

            $H_new_name = 'Signed_Certificate'.'.'.$title.'.'.$H_file_ex_loc;
            $H_video_path_sa_buhay_niya = 'files/report/'.$H_new_name;
            move_uploaded_file($H_file_tmp, $H_video_path_sa_buhay_niya);

            $random = random_int(100000, 999999);
            $UniqueID = 'REPORT'.$random;

            $report_insert = "INSERT INTO tbl_report (fldUID, fldTitle, fldDescription, fldFile1, fldFile2, fldFile3, fldFile4, fldFile5, fldFile6, fldFile7, fldFile8, fldStatus, fldFrom) VALUES ('$UniqueID', '$title', '$descriptions', '$A_new_name', '$B_new_name', '$C_new_name', '$D_new_name', '$E_new_name', '$F_new_name', '$G_new_name', '$H_new_name', 'unarchive', 'tbl_report')";

            $insert_report_qry = mysqli_query($db, $report_insert);

            echo "<script>alert('New data has been added successfully');window.location.href = 'report.php';</script>";

        }
    }
}

?>