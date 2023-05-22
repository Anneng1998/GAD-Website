<?php 
    include '../database/db.php';

    $id = $_GET['id'];


    $archieve_query = mysqli_query($db, "Update tbl_events set statuss = 'archive' where id = '$id'");

    echo "<script>alert('Video has been archieve successfully');window.location.href = '../news.php';</script>";
?>