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

    #academic {
        box-shadow: 1px 2px 5px #333;
        padding: 20px;
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
        <div class="col-3" >
            <div class="card bg-success text-white mb-0" id="button1" onclick="button_one()" style="height: 113px;">
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
            <div class="card bg-danger text-white mb-0" id="button2" onclick="button_two()" style="height: 113px;">
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
            <div class="card bg-warning text-white mb-0" id="button3" onclick="button_four()" style="height: 113px;">
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
            <div class="card bg-primary text-white mb-0" id="button4" onclick="button_three()" style="height: 113px;">
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



<!-- start academic -->
<div id="academic">
    <div class="card d-block display">

        <div class="row">
            <div class="col-6">
                <table class="table table-success mb-0">
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
                        <!-- <tr>
                            <td>Total</td>
                            <//?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'FEMALE'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'MALE'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><//?php echo $phd_view['FemalePHD']; ?></td>
                            <td><//?php echo $phd_view1['MalePHD']; ?></td>
                            <td><//?php echo $phd_view2['total']; ?></td>
                        </tr> -->
                    </tbody>
                </table> 
            </div>
            <div class="col-6">
            <table class="table table-success mb-0">
                    <thead>
                        <tr>
                            <th>Faculty</th>
                            <th>Count</th>
                            <th>Male</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Instructor</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'FEMALE' and b.designation = 'Instructor'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'MALE' and b.designation = 'Instructor'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and b.designation = 'Instructor'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>Assistant Processor</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'FEMALE' and b.designation = 'Assistant'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'MALE' and b.designation = 'Assistant'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and b.designation = 'Assistant'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>Associate Professor</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'FEMALE' and b.designation = 'Associate'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'MALE' and b.designation = 'Associate'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and b.designation = 'Associate'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>Professor</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'FEMALE' and b.designation = 'Professor'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'MALE' and b.designation = 'Professor'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and b.designation = 'Professor'");
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
            </div>
        </div>

        <br><br>

        <div class="row">
            <div class="col-6">
                <table class="table table-success mb-0">
                    <thead>
                        <tr>
                            <th>Faculty</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Female</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'Female'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                        </tr>
                        <tr>
                            <td>Male</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'Male'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Male']; ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <?php
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                    </tbody>
                </table> 
            </div>
            <div class="col-6">
                <table class="table table-success mb-0">
                    <thead>
                        <tr>
                            <th>Faculty</th>
                            <th>Female</th>
                            <th>Male</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PWD</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'Female' and disability = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'Male' and disability = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                        <tr>
                            <td>Single Parent</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'Female' and single_parent = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'Male' and single_parent = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                        <tr>
                            <td>4P's Member</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'Female' and fourps = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'ACADEMIC' and a.sex = 'Male' and fourps = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>

    </div>
</div>
<!-- start non academic -->
<div id="nonacademic">
    <div class="card d-block" id="nonacademic" style="box-shadow: 1px 2px 5px #333; padding: 20px;">

        <div class="row">
            <div class="col-6">
                <table class="table table-danger mb-0">
                    <thead>
                        <tr>
                            <th>Non-Academic Employee</th>
                            <th>Female</th>
                            <th>Male</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ph. D</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'FEMALE' and b.educational = 'Ph. D'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'MALE' and b.educational = 'Ph. D'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and b.educational = 'Ph. D'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>Ph. D Units</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'FEMALE' and b.educational = 'Ph. D Units'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'MALE' and b.educational = 'Ph. D Units'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and b.educational = 'Ph. D Units'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>MA / MS</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'FEMALE' and b.educational = 'MA/MS'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'MALE' and b.educational = 'MA/MS'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and b.educational = 'MA/MS'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>MA / MS Units</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'FEMALE' and b.educational = 'MA/MS Units'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'MALE' and b.educational = 'MA/MS Units'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and b.educational = 'MA/MS Units'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>BS / BA</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'FEMALE' and b.educational = 'BS/BA'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'MALE' and b.educational = 'BS/BA'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and b.educational = 'BS/BA'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <!-- <tr>
                            <td>Total</td>
                            <//?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'FEMALE'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'MALE'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><//?php echo $phd_view['FemalePHD']; ?></td>
                            <td><//?php echo $phd_view1['MalePHD']; ?></td>
                            <td><//?php echo $phd_view2['total']; ?></td>
                        </tr> -->
                    </tbody>
                </table> 
            </div>
            <div class="col-6">
                <table class="table table-danger mb-0">
                    <thead>
                        <tr>
                            <th>Non-Academic Employee</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Female</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'Female'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                        </tr>
                        <tr>
                            <td>Male</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'Male'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Male']; ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <?php
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                    </tbody>
                </table> 
                <br><br>
                <table class="table table-danger mb-0">
                    <thead>
                        <tr>
                            <th>Non-Academic Employee</th>
                            <th>Female</th>
                            <th>Male</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PWD</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'Female' and disability = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'Male' and disability = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                        <tr>
                            <td>Single Parent</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'Female' and single_parent = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'Male' and single_parent = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                        <tr>
                            <td>4P's Member</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'Female' and fourps = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'NON-ACADEMIC' and a.sex = 'Male' and fourps = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
<!-- start RDE -->
<div id="rde">
    <div class="card d-block" style="box-shadow: 1px 2px 5px #333; padding: 20px; ">

        <div class="row">
            <div class="col-6">
                <table class="table table-primary mb-0">
                    <thead>
                        <tr>
                            <th>External Clients</th>
                            <th>Female</th>
                            <th>Male</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ph. D</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'FEMALE' and b.educational = 'Ph. D'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'MALE' and b.educational = 'Ph. D'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and b.educational = 'Ph. D'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>Ph. D Units</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'FEMALE' and b.educational = 'Ph. D Units'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'MALE' and b.educational = 'Ph. D Units'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and b.educational = 'Ph. D Units'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>MA / MS</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'FEMALE' and b.educational = 'MA/MS'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'MALE' and b.educational = 'MA/MS'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and b.educational = 'MA/MS'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>MA / MS Units</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'FEMALE' and b.educational = 'MA/MS Units'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'MALE' and b.educational = 'MA/MS Units'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and b.educational = 'MA/MS Units'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>BS / BA</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'FEMALE' and b.educational = 'BS/BA'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'MALE' and b.educational = 'BS/BA'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and b.educational = 'BS/BA'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <!-- <tr>
                            <td>Total</td>
                            <//?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'FEMALE'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'MALE'");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><//?php echo $phd_view['FemalePHD']; ?></td>
                            <td><//?php echo $phd_view1['MalePHD']; ?></td>
                            <td><//?php echo $phd_view2['total']; ?></td>
                        </tr> -->
                    </tbody>
                </table> 
            </div>
            <div class="col-6">
                <table class="table table-primary mb-0">
                    <thead>
                        <tr>
                            <th>External Clients</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Female</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Female'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                        </tr>
                        <tr>
                            <td>Male</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Male'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Male']; ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <?php
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN educational_information b ON b.fldID = a.fldID where a.stake_status = 'RDE'");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                    </tbody>
                </table> 
                <br><br>
                <table class="table table-primary mb-0">
                    <thead>
                        <tr>
                            <th>External Clients</th>
                            <th>Female</th>
                            <th>Male</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PWD</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Female' and disability = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Male' and disability = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                        <tr>
                            <td>Single Parent</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Female' and single_parent = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Male' and single_parent = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                        <tr>
                            <td>4P's Member</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Female' and fourps = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Male' and fourps = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                    </tbody>
                </table> 

            </div>
        </div>
    </div>
</div>

<!-- start student -->
<div id="student">
    <div class="card d-block" style="box-shadow: 1px 2px 5px #333; padding: 20px; ">

        <div class="row">
            <div class="col-6">
                <table class="table table-warning mb-0">
                    <thead>
                        <tr>
                            <th>Program</th>
                            <th>Female</th>
                            <th>Male</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>BS Hospitality Management</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and a.sex = 'Female' and b.program = 'c1';");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and a.sex = 'Male' and b.program = 'c1';");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and b.program = 'c1';");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>BS Business Management</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and a.sex = 'Female' and b.program = 'c2';");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and a.sex = 'Male' and b.program = 'c2';");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and b.program = 'c2';");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>BS in Computer Science</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and a.sex = 'Female' and b.program = 'c3';");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and a.sex = 'Male' and b.program = 'c3';");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and b.program = 'c3';");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>Bachelor of Early Childhood Education</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and a.sex = 'Female' and b.program = 'c4';");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and a.sex = 'Male' and b.program = 'c4';");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and b.program = 'c4';");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>Bachelor of Secondary Education</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and a.sex = 'Female' and b.program = 'c5';");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and a.sex = 'Male' and b.program = 'c5';");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and b.program = 'c5';");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                        <tr>
                            <td>BBS Information Technology</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as FemalePHD from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and a.sex = 'Female' and b.program = 'c6';");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdm = mysqli_query($db, "select count(*) as MalePHD from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and a.sex = 'Male' and b.program = 'c6';");
                            $phd_view1 = mysqli_fetch_array($count_phdm);
                            $count_phdt = mysqli_query($db, "select count(*) as total from employee_information a INNER JOIN student_education_information b ON b.fldID = a.fldID where a.stake_status = 'STUDENT' and b.program = 'c6';");
                            $phd_view2 = mysqli_fetch_array($count_phdt);
                            ?>
                            <td><?php echo $phd_view['FemalePHD']; ?></td>
                            <td><?php echo $phd_view1['MalePHD']; ?></td>
                            <td><?php echo $phd_view2['total']; ?></td>
                        </tr>
                    </tbody>
                </table> 
            </div>
            <div class="col-6">
                <table class="table table-warning mb-0">
                    <thead>
                        <tr>
                            <th>External Clients</th>
                            <th>Female</th>
                            <th>Male</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PWD</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Female' and disability = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Male' and disability = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                        <tr>
                            <td>Single Parent</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Female' and single_parent = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Male' and single_parent = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                        <tr>
                            <td>4P's Member</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Female' and fourps = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Male' and fourps = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                        <tr>
                            <td>Working Student</td>
                            <?php
                            $count_phdf = mysqli_query($db, "select count(*) as Female from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Female' and working_student = 'YES'");
                            $phd_view = mysqli_fetch_array($count_phdf);
                            $count_phdf = mysqli_query($db, "select count(*) as Male from employee_information a INNER JOIN other_information b ON b.fldID = a.fldID where a.stake_status = 'RDE' and a.sex = 'Male' and working_student = 'YES'");
                            $phd_view2 = mysqli_fetch_array($count_phdf);
                            ?>
                            <td><?php echo $phd_view['Female']; ?></td>
                            <td><?php echo $phd_view2['Male']; ?></td>
                        </tr>
                    </tbody>
                </table> 

            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php'?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script>
    $(document).ready(function(){
        $('#academic').hide();
        $('#nonacademic').hide();
        $('#rde').hide();
        $('#student').hide();
    });

    function button_one() {
        $("#academic").show();
        $('#nonacademic').hide();
        $('#rde').hide();
        $('#student').hide();
    }

    function button_two() {
        $("#academic").hide();
        $('#nonacademic').show();
        $('#rde').hide();
        $('#student').hide();
    }

    function button_three() {
        $("#academic").hide();
        $('#nonacademic').hide();
        $('#rde').show();
        $('#student').hide();
    }

    function button_four() {
        $("#academic").hide();
        $('#nonacademic').hide();
        $('#rde').hide();
        $('#student').show();
    }
</script> 