<?php 
    include '../database/db.php';

    $id = $_GET['id'];

    $archive_query = mysqli_query($db, "Delete from employee_information where fldID = '$id'");

    echo "<script>alert('Data has been deleted successfully');window.location.href = '../stakeholder-hr-list.php';</script>";
?>