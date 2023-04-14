<?php 
    include '../database/db.php';

    

    if(isset($_GET['iec-update'])){
        $id = $_GET['iecid'];
        $newcategory = $_GET['categories'];
        $newtitle = $_GET['title'];
        $newdecs = $_GET['description'];
        $newunits = $_GET['units'];
        $newdate = $_GET['date'];

        if($newcategory == "" && $newtitle == "" && $newdecs == "" && $newunits == "" && $newdate == ""){
            echo "<script>alert('All fields are required');window.location.href = 'iec.php';</script>";
        }else{
            $update_qry = mysqli_query($db, "UPDATE tbl_iec SET fldCategories = '$newcategory', fldtitle = '$newtitle', 	fldDescription = '$newdecs', fldUnits = '$newunits', fldDate = '$newdate' WHERE fldID = '$id'");
            echo "<script>alert('Updated Successfully');window.location.href = '../iec.php';</script>";
        }
        
    }

?>