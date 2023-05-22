<?php
    include 'database/db.php';

    session_start();

    $name = $_SESSION['id'];
    $call_name_qry = "Select * from tbl_users where fldIdNumber = '$name'";
    $call_qry = mysqli_query($db, $call_name_qry);
    $call_name_fetch = mysqli_fetch_array($call_qry);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CvSU-CCC GAD Unit</title>
        <link rel="icon" type="images/x-icon" href="img/gad_logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- third party css -->
        <link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
        <link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
        <link href="assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css">
        <link href="assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css">
        <!-- third party css end -->

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

        <style>
            .seebtn {
                cursor: pointer;
                color: blue;
            }
            body[data-leftbar-compact-mode=condensed]:not(.authentication-bg) .logo span.logo-sm {
                display: none;
            }
        </style>

    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
