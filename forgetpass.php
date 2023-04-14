<?php 

include 'database/db.php';

session_start();

if(isset($_POST['next'])) {
    $email = $_POST['emailaddress'];

    if (empty($email)){
        echo "<script>alert('Email Address Required!');window.location.href = 'forgetpass.php';</script>";  
    }else{
        $check_account = "Select * from tbl_users where fldEmail = '$email'";
        $check_account_qry = mysqli_query($db, $check_account); 
        $check_account_fetch = mysqli_fetch_array($check_account_qry); 
        $check_account_num = mysqli_num_rows($check_account_qry); 

        // echo $check_account_num;
        if ($check_account_num == 1){

            $_SESSION['email'] = $check_account_fetch['fldEmail'];
            $_SESSION['id'] = $check_account_fetch['fldIdNumber'];
            header("location: forgetpass-sq.php");
        
        }else{
            // echo 'mali';
            echo "<script>alert('You enter email address is invalid!');window.location.href = 'forgetpass.php';</script>";

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
                        <h4 class="mt-0">Forget Password</h4>
                        <p class="text-muted mb-4">Enter your email address associated with your account.</p>

                        <!-- form -->
                        <form action="forgetpass.php" method="POST">
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" name="emailaddress" id="emailaddress" required="" placeholder="Enter your email">
                            </div>
                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" name="next" type="submit"><i class="mdi mdi-login"></i> Next </button>
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