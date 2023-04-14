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
            <h4 class="page-title">EXTENSION</h4>
        </div>
    </div>
</div>     
<!-- end page title -->


<?php 
include 'backend/based-research-upload.php';
include 'include/footer.php';

?>

