<?php 
    include '../database/db.php';

    $id = $_GET['id'];

    $accept_query = mysqli_query($db, "Update tbl_users set fldActivationStatus = 'ACCEPT' where fldIdNumber = '$id'");

    echo "<script>alert('Successfully Accept');window.location.href = '../pendingreg.php';</script>";
?>