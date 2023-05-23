<?php 
    include '../database/db.php';

    $id = $_GET['id'];

    $accept_query = mysqli_query($db, "Update tbl_users set fldActivationStatus = 'REJECT' where fldIdNumber = '$id'");

    echo "<script>alert('Rejected Successfully');window.location.href = '../pendingreg.php';</script>";
?>