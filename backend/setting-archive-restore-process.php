<?php 
    include '../database/db.php';

    $id = $_GET['id'];
    $from = $_GET['from'];
    
    if ($from == 'tbl_media') {

        $update_query = mysqli_query($db, "update tbl_media set fldStatus = 'unarchive'  WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_planbudget') {

        $update_query = mysqli_query($db, "update tbl_planbudget set fldStatus = 'unarchive' WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_basedresearch') {

        $update_query = mysqli_query($db, "update tbl_basedresearch set fldStatus = 'unarchive' WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_infactracture') {

        $update_query = mysqli_query($db, "update tbl_infactracture set fldStatus = 'unarchive' WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_iec') {

        $update_query = mysqli_query($db, "update tbl_iec set fldStatus = 'unarchive' WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_report') {

        $update_query = mysqli_query($db, "update tbl_report set fldStatus = 'unarchive' WHERE fldUID = '$id'");

    }

    echo "<script>alert('data has been restore successfully');window.location.href = '../setting.php';</script>";
?>