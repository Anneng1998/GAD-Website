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
                    
                    $count_query = mysqli_query($db, "SELECT COUNT(*) as total FROM employee_information WHERE stake_status = 'RDE'");
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
</div> 
    <table class="table table-dark mb-0">
        <thead>
            <tr>
                <th>Faculty</th>
                <th>Female</th>
                <th>Male</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ph. D</td>
                <?php
                $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'FEMALE' and b.educational = 'Ph. D'");
                $phd_view = mysqli_fetch_array($count_phdf);
                $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'MALE' and b.educational = 'Ph. D'");
                $phd_view1 = mysqli_fetch_array($count_phdm);
                $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and b.educational = 'Ph. D'");
                $phd_view2 = mysqli_fetch_array($count_phdt);
                ?>
                <td><?php echo $phd_view['FemalePHD']; ?></td>
                <td><?php echo $phd_view1['MalePHD']; ?></td>
                <td><?php echo $phd_view2['total']; ?></td>
            </tr>
            <tr>
                <td>Ph. D Units</td>
                <?php
                $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'FEMALE' and b.educational = 'Ph. D Units'");
                $phd_view = mysqli_fetch_array($count_phdf);
                $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'MALE' and b.educational = 'Ph. D Units'");
                $phd_view1 = mysqli_fetch_array($count_phdm);
                $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and b.educational = 'Ph. D Units'");
                $phd_view2 = mysqli_fetch_array($count_phdt);
                ?>
                <td><?php echo $phd_view['FemalePHD']; ?></td>
                <td><?php echo $phd_view1['MalePHD']; ?></td>
                <td><?php echo $phd_view2['total']; ?></td>
            </tr>
            <tr>
                <td>MA / MS</td>
                <?php
                $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'FEMALE' and b.educational = 'MA/MS'");
                $phd_view = mysqli_fetch_array($count_phdf);
                $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'MALE' and b.educational = 'MA/MS'");
                $phd_view1 = mysqli_fetch_array($count_phdm);
                $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and b.educational = 'MA/MS'");
                $phd_view2 = mysqli_fetch_array($count_phdt);
                ?>
                <td><?php echo $phd_view['FemalePHD']; ?></td>
                <td><?php echo $phd_view1['MalePHD']; ?></td>
                <td><?php echo $phd_view2['total']; ?></td>
            </tr>
            <tr>
                <td>MA / MS Units</td>
                <?php
                $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'FEMALE' and b.educational = 'MA/MS Units'");
                $phd_view = mysqli_fetch_array($count_phdf);
                $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'MALE' and b.educational = 'MA/MS Units'");
                $phd_view1 = mysqli_fetch_array($count_phdm);
                $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and b.educational = 'MA/MS Units'");
                $phd_view2 = mysqli_fetch_array($count_phdt);
                ?>
                <td><?php echo $phd_view['FemalePHD']; ?></td>
                <td><?php echo $phd_view1['MalePHD']; ?></td>
                <td><?php echo $phd_view2['total']; ?></td>
            </tr>
            <tr>
                <td>BS / BA</td>
                <?php
                $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'FEMALE' and b.educational = 'BS/BA'");
                $phd_view = mysqli_fetch_array($count_phdf);
                $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'MALE' and b.educational = 'BS/BA'");
                $phd_view1 = mysqli_fetch_array($count_phdm);
                $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and b.educational = 'BS/BA'");
                $phd_view2 = mysqli_fetch_array($count_phdt);
                ?>
                <td><?php echo $phd_view['FemalePHD']; ?></td>
                <td><?php echo $phd_view1['MalePHD']; ?></td>
                <td><?php echo $phd_view2['total']; ?></td>
            </tr>
            <tr>
                <td>Total</td>
                <?php
                $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'FEMALE'");
                $phd_view = mysqli_fetch_array($count_phdf);
                $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'MALE'");
                $phd_view1 = mysqli_fetch_array($count_phdm);
                $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC'");
                $phd_view2 = mysqli_fetch_array($count_phdt);
                ?>
                <td><?php echo $phd_view['FemalePHD']; ?></td>
                <td><?php echo $phd_view1['MalePHD']; ?></td>
                <td><?php echo $phd_view2['total']; ?></td>
            </tr>
        </tbody>
    </table> 



<?php include 'include/footer.php'?>

