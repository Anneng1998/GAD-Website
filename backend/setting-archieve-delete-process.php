<?php 
    include '../database/db.php';

    $id = $_GET['id'];
    $from = $_GET['from'];
    
    if ($from == 'tbl_media') {

        $update_query = mysqli_query($db, "delete from tbl_media   WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_planbudget') {

        $update_query = mysqli_query($db, "delete from tbl_planbudget  WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_basedresearch') {

        $update_query = mysqli_query($db, "delete from tbl_basedresearch  WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_infactracture') {

        $update_query = mysqli_query($db, "delete from tbl_infactracture  WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_iec') {

        $update_query = mysqli_query($db, "delete from tbl_iec  WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_report') {

        $update_query = mysqli_query($db, "delete from tbl_report  WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_extension') {

        $update_query = mysqli_query($db, "delete from tbl_extension  WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_news') {

        $update_query = mysqli_query($db, "delete from tbl_news  WHERE fldUID = '$id'");

    } elseif ($from == 'tbl_events') {

        $update_query = mysqli_query($db, "delete from tbl_events  WHERE fldUID = '$id'");
    }

    echo "<script>alert('data has been restore successfully');window.location.href = '../setting.php';</script>";
?>