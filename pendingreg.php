<?php 
    include 'include/header.php';
    include 'include/sidebar.php';
    include 'include/navbar.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Pending Registration</h4>
        </div>
    </div>
</div>
<table id="alternative-page-datatable" class="table dt-responsive nowrap">
    <thead>
        <tr>
            <th>ID Number</th>
            <th>Name</th>
            <th>Emal</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
    </thead>    
    <tbody>
        <?php
            $user_query = mysqli_query($db, "Select * from tbl_users where fldActivationStatus = 'PENDING' order by id");
            foreach ($user_query as $user_data){
        ?>
        <tr>
            <td><?php echo $user_data['fldIdNumber'] ?></td>
            <td><?php echo $user_data['fldName'] ?></td>
            <td><?php echo $user_data['fldEmail'] ?></td>
            <td><?php echo $user_data['fldDepartment'] ?></td>
            <td>
                <button class="btn btn-success shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#accept<?php echo $user_data['fldIdNumber'] ?>"><i class=""></i>ACCEPT</button>
                <button class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#reject<?php echo $user_data['fldIdNumber'] ?>"><i class=""></i>REJECT</button>
            </td>
        </tr>
        <?php
            include 'backend/pendingreg-reject.php';
            include 'backend/pendingreg-accept.php';
            }
        ?>
    </tbody>
</table>
                        
<?php 
    include 'include/footer.php';
?>