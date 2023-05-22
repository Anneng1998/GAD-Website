<?php 
    include '../database/db.php';

    if(isset($_GET['updatenews'])){
        $id = $_GET['id'];
        $newtitle = $_GET['title'];
        $newdesc = $_GET['description'];
        $newlink = $_GET['link'];

        if($newtitle == "" && $newdesc == ""){
            echo "<script>alert('All fields are required');window.location.href = 'news.php';</script>";
        }else{
             $update_qry = mysqli_query($db, "UPDATE tbl_news SET news_title='$newtitle', news_desc='$newdesc', news_vid_link='$newlink' WHERE id = '$id'");
            echo "<script>alert('Updated Successfully');window.location.href = '../news.php';</script>";
        }
        
    }

?>