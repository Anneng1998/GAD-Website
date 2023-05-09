<?php 
    include 'include/header.php';
    include 'include/sidebar.php';
    include 'include/navbar.php';
?>

<div class="row">
    <div class="col-sm-3 mb-2 mb-sm-0">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active show" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                aria-selected="true">
                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                <span class="d-none d-md-block">Account Maintenance</span>
            </a>
            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                aria-selected="false">
                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                <span class="d-none d-md-block">Archive Data</span>
            </a>
            <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                aria-selected="false">
                <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                <span class="d-none d-md-block">Back up and Restore</span>
            </a>
        </div>
    </div> <!-- end col-->

    <!--  Account Maintenance -->
    <div class="col-sm-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <br><br>
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>ID Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                    $user_qry = mysqli_query($db, "Select * from tbl_users where fldActivationStatus = 'ACCEPT' order by id");
                    foreach ($user_qry as $data) {
                    ?>

                    <tbody>
                        <tr>
                            <td><?php echo $data['fldIdNumber'] ?></td>
                            <td><?php echo $data['fldName'] ?></td>
                            <td><?php echo $data['fldEmail'] ?></td>
                            <td><?php echo $data['fldDepartment'] ?></td>
                            <td>
                                <button class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal"  data-bs-target="#delete<?php echo $data['id'] ?>"><i class="dripicons-trash"></i></button>
                                <button class="btn btn-info shadow btn-xs sharp me-1" data-bs-toggle="modal"  data-bs-target="#view<?php echo $data['id'] ?>"><i class="dripicons-lock"></i></button>
                            </td>
                        </tr>
                    </tbody>

                    <?php
                        include 'backend/setting-account-delete.php';
                        include 'backend/setting-account-view.php';
                        }
                    ?>

                </table>
            </div>

            <!-- END Account Maintenance -->

            <!-- Archive Data -->

            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

            <div class="page-title-box">
                <div class="page-title-right">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary-header-modal">CLEAN</button>
                </div>
            </div>
            <br><br><br><br>

                <table id="state-saving-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                        $media_query = mysqli_query($db, "SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_media where fldStatus = 'archive' UNION ALL SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_planbudget where fldStatus = 'archive' UNION ALL SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_basedresearch where fldStatus = 'archive' UNION ALL SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_iec where fldStatus = 'archive' UNION ALL SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_infactracture where fldStatus = 'archive' UNION ALL SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_report where fldStatus = 'archive' UNION ALL SELECT fldTitle, fldUID, fldStatus, fldFrom FROM tbl_extension where fldStatus = 'archive' ");
                        foreach ($media_query as $data){
                    ?>

                    <tbody>
                        <tr>
                            <td><?php echo $data['fldTitle'] ?></td>
                            <td>
                                <a class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=""><i class="dripicons-trash"></i></a>
                                <a class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#restore<?php echo $data['fldUID'] ?>"><i class="dripicons-export"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php 
                        include 'backend/setting-archieve-restore.php';
                        }
                    ?>
                </table>
            </div>

            <!-- END Archive Data -->

            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
            <h2>Table 3</h2>
                <table id="row-callback-datatable" class="table w-100 nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> <!-- end tab-content-->
    </div> <!-- end col-->
</div>
<!-- end row-->
<?php 
    include 'include/footer.php';
?>