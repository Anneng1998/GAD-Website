<?php 
    include 'include/header.php';
    include 'include/sidebar.php';
    include 'include/navbar.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary-header-modal">ADD REPORT</button>
            </div>
            <h4 class="page-title">REPORT</h4>
        </div>
    </div>
</div>
 

<table id="alternative-page-datatable" class="table dt-responsive nowrap">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
            $report_query = mysqli_query($db, "Select * from tbl_report where fldStatus = 'unarchive' order by fldID");
            foreach ($report_query as $report_data){
        ?>

        <tr>
           <td><?php echo $report_data['fldTitle'] ?></td>
           <td>
                <?php 
                    $see = '<a class="seebtn" data-bs-toggle="modal" data-bs-target="#seemore'.$report_data['fldID'].'"> See More</a>';
                    $desc = $report_data['fldDescription'];
                    echo mb_strimwidth($desc, 0, 100, $see);
                ?>
           </td>
           <td>
                <a class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=""><i class="dripicons-trash"></i></a>
                <a class="btn btn-warning shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=""><i class="dripicons-document-edit"></i></a>
                <a class="btn btn-info shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=""><i class="dripicons-preview"></i></a>
                <a href="download/download-report.php?id=<?php echo $report_data['fldID'] ?>" class="btn btn-success shadow btn-xs sharp me-1"><i class="dripicons-download"></i><a>
           </td>
        </tr>
            <?php
                }
            ?>
    </tbody>
</table>

<?php 
include 'backend/report-add.php';
include 'include/footer.php';

?>

