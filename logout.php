<?php 
    include 'database/db.php';
    session_start();

    // $id = $_SESSION['id'];
    // $account_update = mysqli_query($db, "UPDATE tbl_users SET fldStatus = 'INACTIVE' WHERE fldIdNumber = '$id'");

    unset($_SESSION['email']);
    unset($_SESSION['role']);
    unset($_SESSION['id']);


    header('location: index.php');

?>