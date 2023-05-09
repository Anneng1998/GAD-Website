<?php 
    include '../database/db.php';

    $id = $_GET['id'];

    if(isset($_POST['research-update'])){
        $title = $_POST['title'];
        $component = $_POST['component'];
        $duration = $_POST['duration'];
        $budget = $_POST['budget'];
        $fund = $_POST['funding'];
        $research = $_POST['research'];
        $from = $_POST['dfrom'];
        $to = $_POST['dto'];


        // Copy of Proposal

        $A_file_name = $_FILES['file1']['name'];
        $A_file_size = $_FILES['file1']['size'];
        $A_file_tmp = $_FILES['file1']['tmp_name'];
        $A_file_ex = pathinfo($A_file_name, PATHINFO_EXTENSION);

        $A_fileSizeRound = round($A_file_size / 1024 / 1024);
        $A_fileSize = $A_fileSizeRound.' MB';

        $A_file_ex_loc = strtolower($A_file_ex);

        $A_allow_ex = array("pdf");


        // Accomplished HGDG Design


        $B_file_name = $_FILES['file2']['name'];
        $B_file_size = $_FILES['file2']['size'];
        $B_file_tmp = $_FILES['file2']['tmp_name'];
        $B_file_ex = pathinfo($B_file_name, PATHINFO_EXTENSION);

        $B_fileSizeRound = round($B_file_size / 1024 / 1024);
        $B_fileSize = $B_fileSizeRound.' MB';

        $B_file_ex_loc = strtolower($B_file_ex);

        $B_allow_ex = array("pdf");



        // Copy of Paper


        $C_file_name = $_FILES['file3']['name'];
        $C_file_size = $_FILES['file3']['size'];
        $C_file_tmp = $_FILES['file3']['tmp_name'];
        $C_file_ex = pathinfo($C_file_name, PATHINFO_EXTENSION);

        $C_fileSizeRound = round($C_file_size / 1024 / 1024);
        $C_fileSize = $C_fileSizeRound.' MB';

        $C_file_ex_loc = strtolower($C_file_ex);

        $C_allow_ex = array("pdf");


        // Accomplished PIMME Checklist

        $D_file_name = $_FILES['file4']['name'];
        $D_file_size = $_FILES['file4']['size'];
        $D_file_tmp = $_FILES['file4']['tmp_name'];
        $D_file_ex = pathinfo($D_file_name, PATHINFO_EXTENSION);

        $D_fileSizeRound = round($D_file_size / 1024 / 1024);
        $D_fileSize = $D_fileSizeRound.' MB';

        $D_file_ex_loc = strtolower($D_file_ex);

        if($title == "" || $component == "" || $duration == "" || $budget == "" || $fund == "" || $research == ""){
            echo "<script>alert('Fill all fields correctly');window.location.href = 'extension.php';</script>";
        }else{

            $check_file_qry = "SELECT fldProposal, fldHgdg,fldPaper,fldPIMME FROM tbl_extensionWHERE fldID = '$id'";
            $check_file_sql = mysqli_query($db, $check_file_qry);
            $check_file_fetch = mysqli_fetch_array($check_file_sql);

            $A_new_name = 'Copy_of_Proposal'.'.'.$title.'.'.$A_file_ex_loc;
            $A_video_path_sa_buhay_niya = '../files/extension/'.$A_new_name;
            move_uploaded_file($A_file_tmp, $A_video_path_sa_buhay_niya);

            $B_new_name = 'Accomplished_HGDG_Design'.'.'.$title.'.'.$B_file_ex_loc;
            $B_video_path_sa_buhay_niya = '../files/extension/'.$B_new_name;
            move_uploaded_file($B_file_tmp, $B_video_path_sa_buhay_niya);

            $C_new_name = 'Copy of Paper'.'.'.$title.'.'.$C_file_ex_loc;
            $C_video_path_sa_buhay_niya = '../files/extension/'.$C_new_name;
            move_uploaded_file($C_file_tmp, $C_video_path_sa_buhay_niya);

            $D_new_name = 'Accomplished_PIMME_Checklist'.'.'.$title.'.'.$D_file_ex_loc;
            $D_video_path_sa_buhay_niya = '../../files/extension/'.$D_new_name;
            move_uploaded_file($D_file_tmp, $D_video_path_sa_buhay_niya);

            if ($A_file_name == '') {
                $A_new_name = $check_file_fetch['fldProposal'];
            } else {
                $A_new_name = 'Copy_of_Proposal'.'.'.$title.'.'.$A_file_ex_loc;
                $A_video_path_sa_buhay_niya = '../files/extension/'.$A_new_name;
                move_uploaded_file($A_file_tmp, $A_video_path_sa_buhay_niya);
            }

            if ($B_file_name == '') {
                $B_new_name = $check_file_fetch['fldHgdg'];
            } else {
                $B_new_name = 'Accomplished_HGDG_Design'.'.'.$title.'.'.$B_file_ex_loc;
                $B_video_path_sa_buhay_niya = '../files/extension/'.$B_new_name;
                move_uploaded_file($B_file_tmp, $B_video_path_sa_buhay_niya);
            }

            if ($C_file_name == '') {
                $C_new_name = $check_file_fetch['fldPaper'];
            } else {
                $C_new_name = 'Copy of Paper'.'.'.$title.'.'.$C_file_ex_loc;
                $C_video_path_sa_buhay_niya = '../files/extension/'.$C_new_name;
                move_uploaded_file($C_file_tmp, $C_video_path_sa_buhay_niya);
            }

            if ($D_file_name == '') {
                $D_new_name = $check_file_fetch['fldPIMME'];
            } else {
                $D_new_name = 'Accomplished_PIMME_Checklist'.'.'.$title.'.'.$D_file_ex_loc;
                $D_video_path_sa_buhay_niya = '../files/extension/'.$D_new_name;
                move_uploaded_file($D_file_tmp, $D_video_path_sa_buhay_niya);
            }

            $update_based = mysqli_query($db, "UPDATE tbl_extensionSET
            fldTitle = '$title',
            fldDescription = '$component',
            fldResearch = '$research',
            fldDFrom = '$from',
            fldDTo = '$to',
            fldDuration = '$duration',
            fldBudget = '$budget',
            fldFund = '$fund',
            fldProposal = '$A_new_name',
            fldHgdg = '$B_new_name',
            fldPaper = '$C_new_name',
            fldPIMME = '$D_new_name' where fldID = '$id'
            ") ;

            echo "<script>alert('Updated Successfully');window.location.href = '../extension.php';</script>";

        }
    }


?>