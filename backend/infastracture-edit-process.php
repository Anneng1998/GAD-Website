<?php
include '../database/db.php';

$id = $_GET['id'];

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $proponent = $_POST['proponent'];
    $dateofapproval = $_POST['dateofapproval'];
    $targetcompletion = $_POST['targetcompletion'];
    $description = $_POST['description'];    

    
    if($title == "" && $proponent == "" && $dateofapproval == "" && $targetcompletion == "" && $description == ""){
        echo "<script>alert('All fields are required!');window.location.href = 'infastracture.php';</script>";
    }else{


        $check_file_qry = "SELECT fldCopyOfProposal, fldHGDG FROM tbl_infactracture WHERE fldID = '$id'";
        $check_file_sql = mysqli_query($db, $check_file_qry);
        $check_file_fetch = mysqli_fetch_array($check_file_sql);


        // // copy of proposal file = AR
        $AR_file_name = $_FILES['proposal']['name'];
        $AR_file_size = $_FILES['proposal']['size'];
        $AR_file_tmp = $_FILES['proposal']['tmp_name'];
        $AR_file_ex = pathinfo($AR_file_name, PATHINFO_EXTENSION);
        $AR_fileSizeRound = round($AR_file_size / 1024 / 1024);
        $AR_fileSize = $AR_fileSizeRound.' MB';

        $AR_file_ex_loc = strtolower($AR_file_ex);

        $AR_allow_ex = array("pdf");

        $hgdg_file_name = $_FILES['hgdg']['name'];
        $hgdg_file_size = $_FILES['hgdg']['size'];
        $hgdg_file_tmp = $_FILES['hgdg']['tmp_name'];
        $hgdg_file_ex = pathinfo($hgdg_file_name, PATHINFO_EXTENSION);
        $hgdg_fileSizeRound = round($hgdg_file_size / 1024 / 1024);
        $hgdg_fileSize = $hgdg_fileSizeRound.' MB';

        $hgdg_file_ex_loc = strtolower($hgdg_file_ex);

        $hgdg_allow_ex = array("pdf");

        if ($AR_file_name == '' && $hgdg_file_name != '') {
            $AR_new_name = $check_file_fetch['fldCopyOfProposal'];
            $hgdg_new_name = 'Accomplishment_HGDG'.'.'.$title.'.'.$hgdg_file_ex_loc;
            $hgdg_video_path_sa_buhay_niya = '../files/infastracture/'.$hgdg_new_name;
            move_uploaded_file($hgdg_file_tmp, $hgdg_video_path_sa_buhay_niya);
        } elseif ($AR_file_name != '' && $hgdg_file_name == '') {
            $hgdg_new_name = $check_file_fetch['fldHGDG'];
            $AR_new_name = 'Copy_of_Proposal'.'.'.$title.'.'.$AR_file_ex_loc;
            $AR_video_path_sa_buhay_niya = '../files/infastracture/'.$AR_new_name;
            move_uploaded_file($AR_file_tmp, $AR_video_path_sa_buhay_niya);
        } elseif ($AR_file_name == '' && $hgdg_file_name == '') {
            // good
            $hgdg_new_name = $check_file_fetch['fldHGDG'];
            $AR_new_name = $check_file_fetch['fldReport'];
        }

        $update_query = mysqli_query($db, "UPDATE tbl_infactracture SET 
        fldTitle = '$title',	
        fldProponents = '$proponent',
        fldDateofApproval = '$dateofapproval',
        fldDescription = '$description',
        fldTargetCompletion	= '$targetcompletion',
        fldCopyOfProposal = '$AR_new_name',
        fldHGDG = '$hgdg_new_name' where fldID = '$id'"); 

        echo "<script>alert('Data has been update');window.location.href = '../infastracture.php';</script>";
    }
    
}

?>