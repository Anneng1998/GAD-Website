<?php include 'database/db.php'; 

session_start();

if(isset($_POST['resetpass'])) {
   
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];

    if($npass == "" && $cpass == ""){
        echo "<script>alert('All fields are required');window.location.href = 'reset-password.php';</script>";
    } else {
        if($npass == $cpass){
            $email =  $_SESSION['email'];
            $id =  $_SESSION['id'];
            $md5Password = md5($npass);
            $update_pass_qry = mysqli_query($db,"UPDATE tbl_users SET fldPassword = '$md5Password' where fldIdNumber = '$id'" );
            echo "<script>alert('Change password successfully. You can now login');window.location.href = 'login.php';</script>";

        }else{
            echo "<script>alert('Password not match');window.location.href = 'reset-password.php';</script>";
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
        </style>
    </head>

    

    <body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

        <div class="auth-fluid">
 
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- title-->
                        <h4 class="mt-0">Reset Password</h4>

                        <!-- form -->
                        <form action="reset-password.php" method="POST">
                            <div class="mb-3">
                                <label for="sq_ans" class="form-label">New Password</label>
                                <input class="form-control" type="text" name="npass" id="npass"  required placeholder="Enter your security question answer">
                            </div>
                            <div class="mb-3">
                                <label for="sq_ans" class="form-label">Confirm Password</label>
                                <input class="form-control" type="text" name="cpass" id="cpass"  required placeholder="Enter your security question answer">
                            </div>
                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" name="resetpass" type="submit"><i class="mdi mdi-login"></i> Reset Password </button>
                            </div>
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Don't have an account? <a href="register.php" class="text-muted ms-1"><b>Register</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
        </div>


        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

    </body>

</html>