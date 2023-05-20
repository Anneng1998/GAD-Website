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
               
            </div>
            <h4 class="page-title">DASHBOARD</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 


<div class="row" style="padding: 15px;">
    <div class="col-3">
        <div class="card bg-success text-white mb-0" style="height: 113px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label style="text-align: center;">Academic Employee</label>
                    </div>
                    <?php 
                    
                    $count_query = mysqli_query($db, "SELECT COUNT(*) as total FROM employee_information WHERE stake_status = 'ACADEMIC'");
                    $count_view = mysqli_fetch_array($count_query);
                    
                    ?>
                    <div class="col-6">
                        <label style="text-align: center;font-size: -webkit-xxx-large;"><?php echo $count_view['total']; ?></label>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div>

    <div class="col-3">
        <div class="card bg-danger text-white mb-0" style="height: 113px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label>Non-Academic Employee</label>
                    </div>
                    <?php 
                    
                    $count_query = mysqli_query($db, "SELECT COUNT(*) as total FROM employee_information WHERE stake_status = 'NON-ACADEMIC'");
                    $count_view = mysqli_fetch_array($count_query);
                    
                    ?>
                    <div class="col-6">
                        <label style="text-align: center;font-size: -webkit-xxx-large;"><?php echo $count_view['total']; ?></label>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div>

    <div class="col-3">
        <div class="card bg-warning text-white mb-0" style="height: 113px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label>Student</label>
                    </div>
                    <?php 
                    
                    $count_query = mysqli_query($db, "SELECT COUNT(*) as total FROM employee_information WHERE stake_status = 'STUDENT'");
                    $count_view = mysqli_fetch_array($count_query);
                    
                    ?>
                    <div class="col-6">
                        <label style="text-align: center;font-size: -webkit-xxx-large;"><?php echo $count_view['total']; ?></label>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div>

    <div class="col-3">
        <div class="card bg-primary text-white mb-0" style="height: 113px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label>External Clients</label>
                    </div>
                    <?php 
                    
                    $count_query = mysqli_query($db, "SELECT COUNT(*) as total FROM employee_information WHERE stake_status = 'ACADEMIC'");
                    $count_view = mysqli_fetch_array($count_query);
                    
                    ?>
                    <div class="col-6">
                        <label style="text-align: center;font-size: -webkit-xxx-large;"><?php echo $count_view['total']; ?></label>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div>
</div>



<?php include 'include/footer.php'?>

