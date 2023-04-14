<?php include 'database/db.php'; 

session_start();

if(isset($_POST['next'])) {
    $sq = $_POST['sq1'];
    $sqans = $_POST['sq_ans'];
    


    if (empty($sq) && empty($sqans)){
        echo "<script>alert('Complete all fields');window.location.href = 'forgetpass-sq.php';</script>"; 
    }else{
        $email =  $_SESSION['email'];
        $id =  $_SESSION['id'];
        $check_sq = "Select fldSQ, fldSQans from tbl_users where fldEmail = '$email'";
        $check_sq_qry = mysqli_query($db, $check_sq);
        $check_sq_fetch = mysqli_fetch_array($check_sq_qry);
        
        $itotanung = $check_sq_fetch['fldSQ'];
        $itosagot = $check_sq_fetch['fldSQans'];
        // echo $itotanung;
        if ($sq == $itotanung && $sqans == $itosagot){
            header("location: reset-password.php");
        }else{
            echo "<script>alert('Security Question is not match');window.location.href = 'forgetpass-sq.php';</script>"; 
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
                        <p class="text-muted mb-4">Please answer your security question. These question helps us to verify your identity.</p>

                        <!-- form -->
                        <form action="forgetpass-sq.php" method="POST">
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