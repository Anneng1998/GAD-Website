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
            <h4 class="page-title">GAD BASED RESEARCH</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<table id="alternative-page-datatable" class="table dt-responsive nowrap">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Research</th>
            <th>Target Date Completion</th>
            <th>Copy Paper</th>
            <th>Accomplished Paper</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $media_query = mysqli_query($db, "Select * from tbl_basedresearch where fldStatus = 'unarchive' order by fldID");
            foreach ($media_query as $research_data){
        ?>
        <tr>
            <td><?php echo $research_data['fldTitle'] ?></td>
            <td>
                <?php 
                    $see = '<a class="seebtn" data-bs-toggle="modal" data-bs-target="#seemore'.$research_data['fldID'].'"> See More</a>';

                    $desc = $research_data['fldDescription'];
                    echo mb_strimwidth($desc, 0, 100, $see);
                ?>
            </td>
            <td><?php echo $research_data['fldResearch'] ?></td>
            <td><?php echo $research_data['fldDateCompletion'] ?></td>
            <td>
                <?php
                    $view = '<a class="view" data-bs-toggle="modal" data-bs-target="#view'.$research_data['fldID'].'"> View</a>';

                    $desc = $research_data['fldCopyofProposal'];
                    echo mb_strimwidth($desc, 0, 0, $view);    
                ?>  
            </td>
            <td>
                <?php
                    $viewhgdg = '<a class="viewhgdg" data-bs-toggle="modal" data-bs-target="#viewhgdg'.$research_data['fldID'].'"> View</a>';

                    $desc = $research_data['fldChecklist'];
                    echo mb_strimwidth($desc, 0, 0, $viewhgdg);    
                ?> 
            </td>
            <td>
                <button class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#delete<?php echo $research_data['fldID'] ?>"><i class="dripicons-trash"></i></button>
                <button class="btn btn-warning shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $research_data['fldID'] ?>"><i class="dripicons-document-edit"></i></button>
                <a href="#" class="btn btn-success shadow btn-xs sharp me-1"><i class="dripicons-download"></i></a>
                <button class="btn btn-info shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#complete<?php echo $research_data['fldID'] ?>"><i class="dripicons-checkmark"></i></button>
            </td>
        </tr>
        <?php
            include 'backend/based-research-complete.php';
            include 'backend/based-research-complete-form.php';
            include 'backend/based-research-proposal-view.php';
            include 'backend/based-research-hdgd-view.php';
            include 'backend/based-research-delete.php';
            include 'backend/based-research-seemore.php';
            include 'backend/based-research-edit.php';
            
            }
        ?>
    </tbody>
</table>

<?php 
include 'backend/based-research-upload.php';
include 'include/footer.php';

?>

