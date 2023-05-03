<?php 
    include '../database/db.php';

    $id = $_GET['id'];

    // // $id variable
    // // id yung naka set na variable sa link

    // echo $id;

    // now nakuha na ung ID pwede ka na mag delete query

    // $delete_query = mysqli_query($db, "DELETE FROM tbl_planbudget WHERE fldID = '$id'");

    $archieve_query = mysqli_query ($db, "Update tbl_report set fldStatus = 'archive' where fldID = '$id'");

    echo "<script>alert('Data has been archieve successfully');window.location.href = '../report.php';</script>";
?>