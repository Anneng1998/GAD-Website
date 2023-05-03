<?php

    include '../database/db.php';

    $id = $_GET['id'];

    $filename_sql = mysqli_query($db, "SELECT * FROM tbl_report WHERE fldID = '$id'");
    $filename_fetch = mysqli_fetch_array($filename_sql);

    $filename_1 = "../files/report/".$filename_fetch['fldFile1'];
    $filename_2 = "../files/report/".$filename_fetch['fldFile2'];
    $filename_3 = "../files/report/".$filename_fetch['fldFile3'];
    $filename_4 = "../files/report/".$filename_fetch['fldFile4'];
    $filename_5 = "../files/report/".$filename_fetch['fldFile5'];
    $filename_6 = "../files/report/".$filename_fetch['fldFile6'];
    $filename_7 = "../files/report/".$filename_fetch['fldFile7'];
    $filename_8 = "../files/report/".$filename_fetch['fldFile8'];
    $title = $filename_fetch['fldTitle'];

    $files = array($filename_1, $filename_2, $filename_3, $filename_4, $filename_5, $filename_6, $filename_7, $filename_8);

    # create new zip opbject
    $zip = new ZipArchive();

    # create a temp file & open it
    $tmp_file = tempnam('.','');
    $zip->open($tmp_file, ZipArchive::CREATE);

    # loop through each file
    foreach($files as $file){

        # download file
        $download_file = file_get_contents($file);

        #add it to the zip
        $zip->addFromString(basename($file),$download_file);

    }

    # close zip
    $zip->close();

    # send the file to the browser as a download
    header('Content-disposition: attachment; filename='.$title.'.zip');
    header('Content-type: application/zip');
    readfile($tmp_file);
