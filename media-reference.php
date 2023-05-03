<?php 
    include 'include/header.php';
    include 'include/sidebar.php';
    include 'include/navbar.php';
?>

<!-- <style>
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
<div class="card d-block" style="box-shadow: 1px 2px 5px #333;"> -->

 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary-header-modal">UPLOAD</button>
            </div>
            <h4 class="page-title">ADVOCACY VIDEO</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<table id="alternative-page-datatable" class="table dt-responsive nowrap">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date Uploaded</th>
            <th>Size</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $media_query = mysqli_query($db, "Select * from tbl_media where fldStatus = 'unarchive' order by fldID");
            foreach ($media_query as $videodata){
        ?>
        <tr>
            <td><?php echo $videodata['fldTitle'] ?></td>
            <td>
                <?php 
                    $see = '<a class="seebtn" data-bs-toggle="modal" data-bs-target="#seemore'.$videodata['fldID'].'"> See More</a>';

                    $desc = $videodata['fldDescription'];
                    echo mb_strimwidth($desc, 0, 100, $see);
                ?>
            </td>
            <td><?php echo $videodata['fldDateUploaded'] ?></td>
            <td><?php echo $videodata['fldSize'] ?></td>
            <td>
                <button class="btn btn-info shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#preview<?php echo $videodata['fldID'] ?>"><i class="dripicons-preview"></i></button>
                <button class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#delete<?php echo $videodata['fldID'] ?>"><i class="dripicons-trash"></i></button>
                <button class="btn btn-warning shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $videodata['fldID'] ?>"><i class="dripicons-document-edit"></i></button>
                <a href="download.php?id=<?php echo $videodata['fldID'] ?>" class="btn btn-success shadow btn-xs sharp me-1"><i class="dripicons-download"></i></a>
            </td>
        </tr>
        <?php
            include 'backend/media-reference-preview.php';
            include 'backend/media-reference-delete.php';
            include 'backend/media-reference-seemore.php';
            include 'backend/media-reference-edit.php';
            }
        ?>
    </tbody>
</table>

<?php 
include 'backend/media-reference-upload.php';
include 'include/footer.php';

?>

