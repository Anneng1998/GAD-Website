
<?php
    include 'database/db.php';

    if (isset($_POST['register'])) {
        $idNumber = $_POST['idnumber'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $repassword = $_POST['repassword'];
        $dept = $_POST['dept'];
        $sq1 = $_POST['sq1'];
        $sq_ans = $_POST['sq_ans'];

        $id_length = strlen($idNumber);

        // echo $pass;
        // echo $repass;

        $check_id = mysqli_query($db,"Select * from tbl_users where fldIdNumber = '$idNumber' ");

        if (mysqli_num_rows($check_id) > 0) {
            echo "<script>alert('Identification Number already exists');window.location.href = 'register.php';</script>";
        }elseif ($idNumber == '' || $fname == '' || $email == '' || $pass == '' || $repass = '' || $depart = '') {
            echo "<script>alert('All fields are required');window.location.href = 'register.php';</script>";
        }
        elseif ($id_length != 9) {
            echo "<script>alert('ID Number must be 9 Digits');window.location.href = 'register.php';</script>";
        } 
        elseif ($pass != $repassword) {
            echo "<script>alert('NOT MATCH');windows.location.href = 'register.php';</script>";
            
        // echo "pass: $pass";
        // echo "repass: $repassword";
            // if ($pass == $repass) {
            //     $md5Password = md5($pass);

            //     $validate_email = mysqli_query($db, "SELECT * FROM tbl_users WHERE fldEmail = '$email'");
            //     $validate_num = mysqli_num_rows($validate_email);

            //     if ($validate_num > 0) {
            //         echo "<script>alert('Email Address already use');window.location.href = 'register.php';</script>";
            //     } else {
                    
            //         $submit_data = mysqli_query($db, "INSERT INTO tbl_users (fldIdNumber, fldName, fldEmail, fldPassword, fldDepartment, fldStatus) VALUES ('$idNumber','$fname','$email','$md5Password','$dept', 'INACTIVE')");


            //         echo "<script>alert('Data has been save successfully');window.location.href = 'index.php';</script>";
            //     }
            // } else {
            //     echo "<script>alert('Password not match');window.location.href = 'register.php';</script>";
            // }
        }
        else {
            $md5Password = md5($pass);
                $validate_email = mysqli_query($db, "SELECT * FROM tbl_users WHERE fldEmail = '$email'");
                $validate_num = mysqli_num_rows($validate_email);

                if ($validate_num > 0) {
                    echo "<script>alert('Email Address already use');window.location.href = 'register.php';</script>";
                } else {
                    
                    $submit_data = mysqli_query($db, "INSERT INTO tbl_users (fldIdNumber, fldName, fldEmail, fldPassword, fldDepartment, fldActivationStatus, fldSQ, fldSQans) VALUES ('$idNumber','$fname','$email','$md5Password','$dept', 'PENDING','$sq1','$sq_ans')");


                    echo "<script>alert('Data has been save successfully');window.location.href = 'index.php';</script>";
        
                }
            }
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>GAD_RMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

        <style>
            .auth-fluid{
                background: #727cf5;
            }
            div.auth-fluid-form-box{
                padding: 10px 32px !important;
            }
        </style>
    </head>

    <body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">
                        <!-- title-->
                        <h4 class="mt-0">Register</h4>
                        <!-- form -->
                        <form action="register.php" method="POST">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Identification Number</label>
                                <input class="form-control" type="text" name="idnumber" maxlength="9" id="idnumber" placeholder="Enter your identification number" required>
                            </div>
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Department</label>
                                <select class="form-control select2" data-toggle="select2" name="dept">
                                    <option value="administrator">Administrator</option>
                                    <option value="registar">Registrar</option>
                                    <option value="rde">RDE</option>
                                    <option value="hr">HR</option>
                                    <option value="gad">GAD</option>
                                    <option value="it">IT</option>
                                    <option value="educ">EDUC</option>
                                    <option value="bm">BM</option>
                                    <option value="das">DAS</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input class="form-control" type="text" name="fname" id="fullname" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" name="email" id="emailaddress" required placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="sq1" class="form-label">Security Question</label>
                                <select class="form-control select2" data-toggle="select2" name="sq1">
                                    <option value="">Select Security Question</option>
                                    <?php
                                        $question_sql = mysqli_query($db, "SELECT * FROM tbl_sq");
                                        foreach ($question_sql as $data_qa) {
                                    ?>
                                    <option value="<?php echo $data_qa['fld_sq'] ?>"><?php echo $data_qa['fld_sq'] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sq_ans" class="form-label">Security Question Answer</label>
                                <input class="form-control" type="text" name="sq_ans" id="sq_ans"  required placeholder="Enter your security question answer">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" required id="password" placeholder="Enter your password">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input class="form-control" type="password" name="repassword" required id="repassword" placeholder="Enter confrim password">
                            </div>
                            <div class="mb-0 d-grid text-center">
                                <button class="btn btn-primary" type="submit" name="register"><i class="mdi mdi-account-circle"></i> Sign Up </button>
                            </div>
                            <!-- social-->
                        </form>
                        <!-- end form-->
                        <br><br><br><br><br><br>
                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Already have account? <a href="index.php" class="text-muted ms-1"><b>Log In</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

    </body>

</html>