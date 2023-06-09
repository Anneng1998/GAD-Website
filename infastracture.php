<?php 
    include 'include/header.php';
    include 'include/sidebar.php';
    include 'include/navbar.php';
?>

<style>
    body > div.wrapper > div.content-page > div > div.card.d-block > div:nth-child(2) > div.col-sm-2.mb-2.mb-sm-0 {
        padding: 0 21px;
    }
    #v-pills-home > div.page-title-box {
        padding: 0 15px;
    }
    body > div.wrapper > div.content-page > div > div.card.d-block > div:nth-child(2) > div.col-sm-10 {
        padding: 14px 21px;
    }
</style>

<br><br>
<div class="card d-block" style="box-shadow: 1px 2px 5px #333;">

 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title px-3">INFRASTRUCTURE</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<div class="row">
    <div class="col-sm-2 mb-2 mb-sm-0">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active show" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                aria-selected="true">
                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                <span class="d-none d-md-block">PROPOSAL INFRASTRUCTURE</span>
            </a>
            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                aria-selected="false">
                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                <span class="d-none d-md-block">COMPLETED INFRASTRUCTURE</span>
            </a>
        </div>
    </div> <!-- end col-->

<!-- proposal infastracture -->

    <div class="col-sm-10">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <!-- <p class="mb-0">TEST1</p> -->
                <div class="page-title-box">
                    <div class="page-title-right">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"        data-bs-target="#primary-header-modal">ADD</button>
                    </div>
                    <h4 class="page-title">List of PROPOSAL INFRASTRUCTURE</h4>
                </div>
                <table id="basic-datatable" class="table dt-responsive nowrap w-90">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Proponents</th>
                            <th>Date of Approval</th>
                            <th>Description</th>
                            <th>Target Completion Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $infastracture_query = mysqli_query($db, "Select * from tbl_infactracture where fldStatus = 'unarchive' and fldType = 'PROPOSAL' order by fldID");
                            foreach ($infastracture_query as $infastracture_data){
                        ?>
                        <tr>
                            <td><?php echo $infastracture_data['fldTitle'] ?></td>
                            <td><?php echo $infastracture_data['fldProponents'] ?></td>
                            <td><?php echo $infastracture_data['fldDateofApproval'] ?></td>
                            <td>
                                <?php 
                                    $see = '<a class="seebtn" data-bs-toggle="modal" data-bs-target="#seemore'.$infastracture_data['fldID'].'"> See More</a>';
                                    $desc = $infastracture_data['fldDescription'];
                                    echo mb_strimwidth($desc, 0, 100, $see);
                                ?>
                            </td>
                            <td><?php echo $infastracture_data['fldTargetCompletion'] ?></td>
                            <td>
                                <button class="btn btn-info shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#view<?php echo $infastracture_data['fldID'] ?>"><i class="dripicons-preview"></i></button>

                                <a class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#delete<?php echo $infastracture_data['fldID'] ?>"><i class="dripicons-trash"></i></a>

                                <a class="btn btn-warning shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#update<?php echo $infastracture_data['fldID'] ?>"><i class="dripicons-document-edit"></i></a>

                                <a href="download/download-infastracture.php?id=<?php echo $infastracture_data['fldID'] ?>" class="btn btn-success shadow btn-xs sharp me-1"><i class="dripicons-download"></i><a>

                                <a class="btn btn-info shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#done<?php echo $infastracture_data['fldID'] ?>"><i class="dripicons-checkmark"></i></a>
                            </td>
                        </tr>
                        <?php
                            include 'backend/infastracture-complete.php';
                            include 'backend/infastracture-edit.php';
                            include 'backend/infastracture-delete.php';
                            include 'backend/infastracture-view.php';
                            include 'backend/infastracture-seemore.php';
                            }
                        ?>
                    </tbody>
                </table>
            </div>

<!-- completed infastractur -->

            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div class="page-title-box">
                    <div class="page-title-right">
                        
                    </div>
                    <h4 class="page-title">List of COMPLETED INFRASTRUCTURE</h4>
                </div>
                <table id="b-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Proponents</th>
                            <th>Date Completed</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $infastracture_query = mysqli_query($db, "Select * from tbl_infactracture where fldStatus = 'unarchive' and fldType = 'COMPLETED' order by fldID");
                            foreach ($infastracture_query as $infastracture_data){
                        ?>
                        <tr>
                            <td><?php echo $infastracture_data['fldTitle'] ?></td>
                            <td><?php echo $infastracture_data['fldProponents'] ?></td>
                            <td><?php echo $infastracture_data['fldDateCompleted'] ?></td>
                            <td>
                                <?php 
                                    $see = '<a class="seebtn" data-bs-toggle="modal" data-bs-target="#cseemore'.$infastracture_data['fldID'].'"> See More</a>';
                                    $desc = $infastracture_data['fldDescription'];
                                    echo mb_strimwidth($desc, 0, 100, $see);
                                ?>
                            </td>
                            <td>
                                <a class="btn btn-info shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#cview<?php echo $infastracture_data['fldID'] ?>"><i class="dripicons-preview"></i></a>
                                <a href="download/download-infastracture-complete.php?id=<?php echo $infastracture_data['fldID'] ?>" class="btn btn-success shadow btn-xs sharp me-1"><i class="dripicons-download"></i><a>
                            </td>
                        </tr>
                        <?php
                            include 'backend/infastracture-complete.php';
                            include 'backend/infastracture-complete-view.php';
                            include 'backend/infastracture-complete-seemore.php';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- end tab-content-->
    </div> <!-- end col-->
</div>
<!-- end row-->
</div>


<?php 
include 'backend/infastracture-add.php';
include 'include/footer.php';

?>

