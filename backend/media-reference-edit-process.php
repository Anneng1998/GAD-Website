<?php 
    include '../database/db.php';

    

    if(isset($_GET['update-video'])){
        $id = $_GET['videoid'];
        $newtitle = $_GET['videotitle'];
        $newdesc = $_GET['videodescription'];

        if($newtitle == "" && $newdesc == ""){
            echo "<script>alert('All fields are required');window.location.href = 'media-reference.php';</script>";
        }else{
            $update_qry = mysqli_query($db, "UPDATE tbl_media SET fldTitle='$newtitle', fldDescription='$newdesc' WHERE fldID = '$id'");
            echo "<script>alert('Updated Successfully');window.location.href = '../media-reference.php';</script>";
        }
        
    }

?>