<?php
    $dept = $call_name_fetch['fldDepartment'];
?>

<!-- Begin page -->
<div class="wrapper">
<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- LOGO -->
    <a class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="img/gad_logo.png" alt="" height="50">  CvSU CCC  GAD UNIT
        </span>
        <span class="logo-sm">
            <img src="img/gad_logo.png" alt="" height="50"> CvSU CCC  GAD UNIT
        </span>
    </a>

    <!-- LOGO -->
    <a class="logo text-center logo-dark">
        <span class="logo-lg">
            CvSU CCC  GAD UNIT
        </span>
        <span class="logo-sm">
            <img src="img/gad_logo.png" alt="" height="50">   CvSU CCC  GAD UNIT
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <?php
        // echo $dept; 
        if ($dept == 'administrator'){
            include 'sidebar/admin.php';
        }elseif ($dept == 'registar'){
            include 'sidebar/registrar.php';
        }elseif ($dept == 'rde'){
            include 'sidebar/rde.php';
        }elseif ($dept == 'hr'){
            include 'sidebar/hr.php';
        }else{
            include 'sidebar/others.php';
        }
        ?>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->