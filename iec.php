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
            <h4 class="page-title">IEC MATERIALS</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<table id="alternative-page-datatable" class="table dt-responsive nowrap">
    <thead>
        <tr>
            <th>Categories</th>
            <th>Title</th>
            <th>Description</th>
            <th>Assigned Units</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $iec_query = mysqli_query($db, "Select * from tbl_iec where fldStatus = 'unarchive' order by fldID");
            foreach ($iec_query as $iec_data){
        ?>
        <tr>
           
            <td><?php echo $iec_data['fldCategories'] ?></td>
            <td><?php echo $iec_data['fldtitle'] ?></td>
            <td>
                <?php 
                    $see = '<a class="seebtn" data-bs-toggle="modal" data-bs-target="#seemore'.$iec_data['fldID'].'"> See More</a>';
                    $desc = $iec_data['fldDescription'];
                    echo mb_strimwidth($desc, 0, 100, $see);
                ?>
            </td>
            <td><?php echo $iec_data['fldUnits'] ?></td>
            <td><?php echo $iec_data['fldDate'] ?></td>
            <!-- <td>

                    // $view = '<a class="view" data-bs-toggle="modal" data-bs-target="#view'.$iec_data['fldID'].'"> View</a>';

                    // $desc = $iec_data['fldFile'];
                    // echo mb_strimwidth($desc, 0, 0, $view);    
                ?> -->
            <!-- </td> --> 
            <td>
                    <button class="btn btn-info shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#preview<?php echo $iec_data['fldID'] ?>"><i class="dripicons-preview"></i></button>
                    <button class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#delete<?php echo $iec_data['fldID'] ?>"><i class="dripicons-trash"></i></button>
                    <button class="btn btn-warning shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $iec_data['fldID'] ?>"><i class="dripicons-document-edit"></i></button>
                    <a href="#" class="btn btn-success shadow btn-xs sharp me-1"><i class="dripicons-download"></i></a>
                    
            </td>
        </tr>
        <?php
            include 'backend/iec-edit.php';
            include 'backend/iec-delete.php';
            include 'backend/iec-view.php';
            include 'backend/iec-preview.php';
            }
        ?>
    </tbody>
</table>

<?php 
include 'backend/iec-upload.php';
include 'include/footer.php';
?>

