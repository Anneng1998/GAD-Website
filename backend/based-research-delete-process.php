<?php 
    include '../database/db.php';

    $id = $_GET['id'];

    // // $id variable
    // // id yung naka set na variable sa link

    // echo $id;

    // now nakuha na ung ID pwede ka na mag delete query

    // $delete_query = mysqli_query($db, "DELETE FROM tbl_basedresearch WHERE fldID = '$id'");

    $archive_query = mysqli_query($db, "Update tbl_basedresearch set fldStatus = 'archive' where fldID = '$id'");

    echo "<script>alert('Data has been archive successfully');window.location.href = '../based-research.php';</script>";
?>