<?php include 'database/db.php'; 

session_start();

if(isset($_POST['login'])) {
    $email = $_POST['emailaddress'];
    $pass = md5($_POST['password']);

    if (empty($email) && empty($pass)){
        echo "<script>alert('Complete all fields');window.location.href = 'index.php';</script>";  
    }else{
        $check_account = "Select * from tbl_users where fldEmail = '$email' and fldPassword = '$pass'";
        $check_account_qry = mysqli_query($db, $check_account); //ichecheck kung tama yung query
        // $check_account_fetch = mysqli_fetch_array($check_account_qry); //kukunin yung laman ng query
        // $check_account_num = mysqli_num_rows($check_account_qry); //bibilangin niya yung data na nilabas

        if (mysqli_num_rows($check_account_qry) > 0){
    //         $user_status = $check_account_fetch['fldActivationStatus'];
    //         $id = $check_account_fetch['fldIdNumber'];
    //         if ($user_status == 'PENDING') {
    //             echo "<script>alert('Your account is still inactive');window.location.href = 'index.php';</script>";
    //         } else {
    //             // $_SESSION['status'] = 'ACTIVE';
    //             $_SESSION['email'] = $check_account_fetch['fldEmail'];
    //             $_SESSION['name'] = $check_account_fetch['fldName'];
    //             $_SESSION['id'] = $check_account_fetch['fldIdNumber'];

    //             // $account_update = mysqli_query($db, "UPDATE tbl_users SET fldStatus = 'ACTIVE' WHERE fldIdNumber = '$id'");

    //             header("location: dashboard.php");
    //         }

        }else{
            echo "<script>alert('Username and Password does not match');window.location.href = 'index.php';</script>";
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
                        <h4 class="mt-0">Log In</h4>
                        <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                        <!-- form -->
                        <form action="index.php" method="POST">
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" name="emailaddress" id="emailaddress" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
                            </div>
                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" name="login" type="submit"><i class="mdi mdi-login"></i> Log In </button>
                            </div>
                            <br>
                            <div class="mb-3 text-center">
                                <p class="text-muted">Forget Password?<a href="forgetpass.php" class="text-muted ms-1"><b>Click Here!</b></a></p>
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