<?php 
    include 'include/header.php';
    include 'include/sidebar.php';
    include 'include/navbar.php';
?>


 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary-header-modal">UPLOAD</button>
            </div>
            <h4 class="page-title">GAD PLAN AND BUDGET</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<table id="alternative-page-datatable" class="table dt-responsive nowrap">
    <thead>
        <tr>
            <th>Title</th>
            <th>Acdemic Year</th>
            <th>Date Uploaded</th>
            <th>Attached File</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
            $plan_query = mysqli_query($db, "Select * from tbl_planbudget where fldStatus = 'unarchive' order by fldID");
            foreach ($plan_query as $plan_data){
        ?>
        <tr>
            <td><?php echo $plan_data['fldTitle'] ?></td>
            <td><?php echo $plan_data['fldAcademic'] ?></td>
            <td><?php echo $plan_data['fldDateUploaded'] ?></td>
            <td>
                <?php
                    $view = '<a class="view" data-bs-toggle="modal" data-bs-target="#view'.$plan_data['fldID'].'"> Download</a>';

                    $desc = $plan_data['fldFile'];
                    echo mb_strimwidth($desc, 0, 0, $view);    
                ?>  
            </td>
            <td>
                <button class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#delete<?php echo $plan_data['fldID'] ?>"><i class="dripicons-trash"></i></button>
                <button class="btn btn-warning shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $plan_data['fldID'] ?>"><i class="dripicons-document-edit"></i></button>
                <button class="btn btn-info shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#view<?php echo $plan_data['fldID'] ?>"><i class="dripicons-preview"></i></button>
                <button class="btn btn-success shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#download<?php echo $plan_data['fldID'] ?>"><i class="dripicons-download"></i></button>
            </td>
        </tr>
        <?php
            include 'backend/plan-delete.php';
            include 'backend/plan-edit.php';
            }
        ?>
    </tbody>
</table>

<?php 
include 'backend/plan-upload.php';
include 'include/footer.php';

?>

