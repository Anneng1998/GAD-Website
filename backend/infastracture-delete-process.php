<?php 
    include '../database/db.php';

    $id = $_GET['id'];


    $archive_query = mysqli_query($db, "Update tbl_infactracture set fldStatus = 'archive' where fldID = '$id'");

    echo "<script>alert('Data has been archive successfully');window.location.href = '../infastracture.php';</script>";
?>