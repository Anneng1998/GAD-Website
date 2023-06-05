<?php 
    include '../database/db.php';

    $id = $_GET['id'];

    // // $id variable
    // // id yung naka set na variable sa link

    // echo $id;

    // now nakuha na ung ID pwede ka na mag delete query

    // $delete_query = mysqli_query($db, "DELETE FROM tbl_media WHERE fldID = '$id'");

    $archieve_query = mysqli_query($db, "Update tbl_media set fldStatus = 'archive' where fldID = '$id'");

    echo "<script>alert('Video has been archive successfully');window.location.href = '../media-reference.php';</script>";
?>