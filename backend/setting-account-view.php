<div id="view<?php echo $data['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="setting.php" method="POST">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="info-header-modalLabel">Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>

                    <?php
                        $id = $data['id'];

                        if(isset($_POST['changebtn'])){
                            
                            $pass = $_POST['password'];
                            $cpass = $_POST['cpassword'];

                            if($pass == "" && $cpass == ""){
                                echo "<script>alert('All fields are required');window.location.href = 'setting.php';</script>";
                            } else {
                                if($pass == $cpass){
                                    $md5Password = md5($pass);
                                    $update_pass_qry = mysqli_query($db,"UPDATE tbl_users SET fldPassword = '$md5Password' where id = '$id'");
                                    echo "<script>alert('Data has been updated successfully');window.location.href = 'setting.php';</script>";

                                }else{
                                    echo "<script>alert('Password not match');window.location.href = 'setting.php';</script>";
                                }
                            }
                        }
                    ?> 

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password"  name="password" class="form-control" placeholder="Enter your password">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                        <label for="password" class="form-label">Confirm Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Enter your password">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button name="changebtn" class="btn btn-info">Change</button>
                </div>
            </div><!-- /.modal-content -->
        <form action="register.php" method="POST">
    </div><!-- /.modal-dialog -->
</div>