<?php 
    include '../database/db.php';

    $id = $_GET['id'];


    $delete_query = mysqli_query($db, "DELETE FROM tbl_users WHERE id = '$id'");

    echo "<script>alert('Video has been deleted successfully');window.location.href = '../setting.php';</script>";
?>