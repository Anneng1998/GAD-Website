<?php 
    include '../database/db.php';

        // 1
    $delete_sql1 = mysqli_query($db, "SELECT fldUID FROM tbl_media where fldStatus = 'archive'");
    foreach ($delete_sql1 as $del1) {
        $fldID = $del1['fldUID'];

        $delete_process = mysqli_query($db, "DELETE FROM tbl_media WHERE fldUID = '$fldID'");
    }

    // 2
    $delete_sql2 = mysqli_query($db, "SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_planbudget where fldStatus = 'archive'");
    foreach ($delete_sql2 as $del2) {
        $fldID = $del2['fldUID'];

        $delete_process = mysqli_query($db, "DELETE FROM tbl_planbudget WHERE fldUID = '$fldID'");
    }

    // 3
    $delete_sql3 = mysqli_query($db, "SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_basedresearch where fldStatus = 'archive' ");
    foreach ($delete_sql3 as $del3) {
        $fldID = $del3['fldUID'];

        $delete_process = mysqli_query($db, "DELETE FROM tbl_basedresearch WHERE fldUID = '$fldID'");
    }

    // 4
    $delete_sql4 = mysqli_query($db, "SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_iec where fldStatus = 'archive'");
    foreach ($delete_sql4 as $del4) {
        $fldID = $del4['fldUID'];

        $delete_process = mysqli_query($db, "DELETE FROM tbl_iec WHERE fldUID = '$fldID'");
    }

    // 5
    $delete_sql5 = mysqli_query($db, "SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_infactracture where fldStatus = 'archive'");
    foreach ($delete_sql5 as $del5) {
        $fldID = $del5['fldUID'];

        $delete_process = mysqli_query($db, "DELETE FROM tbl_infactracture WHERE fldUID = '$fldID'");
    }

    // 6
    $delete_sql6 = mysqli_query($db, "SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_report where fldStatus = 'archive'");
    foreach ($delete_sql6 as $del6) {
        $fldID = $del6['fldUID'];

        $delete_process = mysqli_query($db, "DELETE FROM tbl_report WHERE fldUID = '$fldID'");
    }

    // 7
    $delete_sql7 = mysqli_query($db, "SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_extension where fldStatus = 'archive'");
    foreach ($delete_sql7 as $del7) {
        $fldID = $del7['fldUID'];

        $delete_process = mysqli_query($db, "DELETE FROM tbl_extension WHERE fldUID = '$fldID'");
    }

    // 8
    $delete_sql8 = mysqli_query($db, "SELECT news_title, fldUID, statuss, fldFrom FROM tbl_news where statuss = 'archive'");
    foreach ($delete_sql8 as $del8) {
        $fldID = $del8['fldUID'];

        $delete_process = mysqli_query($db, "DELETE FROM tbl_news WHERE fldUID = '$fldID'");
    }

    // 9
    $delete_sql9 = mysqli_query($db, "SELECT event_title, fldUID, statuss, fldFrom FROM tbl_events where statuss = 'archive'");
    foreach ($delete_sql9 as $del9) {
        $fldID = $del9['fldUID'];

        $delete_process = mysqli_query($db, "DELETE FROM tbl_events WHERE fldUID = '$fldID'");
    }

    echo "<script>alert('Data has been clean');window.location.href = '../setting.php';</script>";


?>