<?php 
    include '../database/db.php';

    

    if(isset($_GET['research-update'])){
        $id = $_GET['researchid'];
        $newtitle = $_GET['researchtitle'];
        $newdesc = $_GET['researchdescription'];
        $newtype = $_GET['researchtype'];
        $newdate = $_GET['completiondate'];

        if($newtitle == "" && $newdesc == ""){
            echo "<script>alert('All fields are required');window.location.href = 'based-research.php';</script>";
        }else{
            $update_qry = mysqli_query($db, "UPDATE tbl_basedresearch SET fldTitle='$newtitle', fldDescription='$newdesc', fldResearch='$newtype', fldDateCompletion='$newdate' WHERE fldID = '$id'");
            echo "<script>alert('Updated Successfully');window.location.href = '../based-research.php';</script>";
        }
        
    }

?>