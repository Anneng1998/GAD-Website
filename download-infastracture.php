<?php

    include 'database/db.php';

    $id = $_GET['id'];

    $filename_sql = mysqli_query($db, "SELECT * FROM tbl_infactracture WHERE fldID = '$id'");
    $filename_fetch = mysqli_fetch_array($filename_sql);

    echo $filename_1 = "file/infastracture/".$filename_fetch['fldHGDG'];
    echo $filename_2 = "file/infastracture/".$filename_fetch['fldCopyOfProposal'];
    // $title = $filename_fetch['fldTitle'];

    // $files = array($filename_1, $filename_2);

    // # create new zip opbject
    // $zip = new ZipArchive();

    // # create a temp file & open it
    // $tmp_file = tempnam('.','');
    // $zip->open($tmp_file, ZipArchive::CREATE);

    // # loop through each file
    // foreach($files as $file){

    //     # download file
    //     $download_file = file_get_contents($file);

    //     #add it to the zip
    //     $zip->addFromString(basename($file),$download_file);

    // }

    // # close zip
    // $zip->close();

    // # send the file to the browser as a download
    // header('Content-disposition: attachment; filename='.$title.'.zip');
    // header('Content-type: application/zip');
    // readfile($tmp_file);

    // // gagana kaya hahaha