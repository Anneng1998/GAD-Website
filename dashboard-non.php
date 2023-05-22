<div class="card d-block" style="box-shadow: 1px 2px 5px #333; padding: 20px;">

<div class="row">
    <div class="col-6">
        <table class="table table-danger mb-0">
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
    </div>
</div>

<br><br>

<div class="row">
    <div class="col-6">
        <table class="table table-danger mb-0">
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
    </div>
    <div class="col-6">
        <table class="table table-danger mb-0">
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