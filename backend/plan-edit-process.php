<?php 
    include '../database/db.php';

    

    if(isset($_GET['update-plan'])){
        $id = $_GET['planid'];
        $newtitle = $_GET['plantitle'];
        $newdesc = $_GET['planacademic'];

        if($newtitle == "" && $newdesc == ""){
            echo "<script>alert('All fields are required');window.location.href = 'plan.php';</script>";
        }else{
            $update_qry = mysqli_query($db, "UPDATE tbl_planbudget SET fldTitle='$newtitle', fldAcademic='$newdesc' WHERE fldID = '$id'");
            echo "<script>alert('Updated Successfully');window.location.href = '../plan.php';</script>";
        }
        
    }

?>