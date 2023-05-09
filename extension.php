<?php 
    include 'include/header.php';
    include 'include/sidebar.php';
    include 'include/navbar.php';
?>

<style>
    body > div.wrapper > div.content-page > div > div.card.d-block > div.row > div > div {
        padding: 0 15px;
    }
    #alternative-page-datatable_wrapper {
        padding: 0 15px;
    }
</style>

<br><br>
<div class="card d-block" style="box-shadow: 1px 2px 5px #333;">

 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary-header-modal">UPLOAD</button>
            </div>
            <h4 class="page-title">EXTENSION</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<table id="alternative-page-datatable" class="table dt-responsive nowrap">
    <thead>
        <tr>
            <th>Project Title</th>
            <th>Component Project Title</th>
            <th>Total Budget Requested</th>
            <th>Duration</th>
            <th>Funding Scheme</th>
            <th>Research</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $media_query = mysqli_query($db, "Select * from tbl_extension where fldStatus = 'unarchive' order by fldID");
            foreach ($media_query as $extension_data){
        ?>
        <tr>
            <td><?php echo $extension_data['fldTitle'] ?></td>
            <td><?php echo $extension_data['fldDescription'] ?></td>
            <td><?php echo $extension_data['fldBudget'] ?></td>
            <td><?php echo $extension_data['fldDuration'] ?></td>
            <td><?php echo $extension_data['fldFund'] ?></td>
            <td><?php echo $extension_data['fldResearch'] ?></td>
            <td>
                <button class="btn btn-info shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#views<?php echo $extension_data['fldID'] ?>"><i class="dripicons-preview"></i></button>
                <button class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#delete<?php echo $extension_data['fldID'] ?>"><i class="dripicons-trash"></i></button>
                <button class="btn btn-warning shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $extension_data['fldID'] ?>"><i class="dripicons-document-edit"></i></button>
                <a href="download/download-extension.php?id=<?php echo $extension_data['fldID'] ?>" class="btn btn-success shadow btn-xs sharp me-1"><i class="dripicons-download"></i></a>
            </td>
        </tr>
        <?php
            include 'backend/extension-view.php';
            include 'backend/extension-delete.php';
            include 'backend/extension-edit.php';
            
            
            }
        ?>
    </tbody>
</table>

<?php 
include 'backend/extension-upload.php';
include 'include/footer.php';
?>

