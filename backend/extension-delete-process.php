<?php 
    include '../database/db.php';

    $id = $_GET['id'];

    $archive_query = mysqli_query($db, "Update tbl_extesion set fldStatus = 'archive' where fldID = '$id'");

    echo "<script>alert('Data has been archive successfully');window.location.href = '../extension.php';</script>";
?>