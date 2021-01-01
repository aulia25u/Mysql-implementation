<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");

function change_pass()
{
    // require db file
    require('../db.php');
    // catch current active user
    $current_active_user = $_SESSION["username"];
    // catch current user pass from db
    $user_pass_db = mysqli_fetch_assoc(mysqli_query($con, "SELECT password FROM users WHERE username='$current_active_user'"))['password'];
    // catch both old and new user password
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];

    // if old pass from user input is equal to user pass from db
    if ((md5($old_pass) === $user_pass_db) && ($old_pass !== $new_pass)) {
        // hash the new pass
        $new_pass = md5($new_pass);
        // change the password and return true
        return mysqli_query($con, "UPDATE users SET password = '$new_pass' WHERE username = '$current_active_user'");
    }

    // return false if otherwise
    return false;
}
?>
<!DOCTYPE html>
<html>

<head>

    <title>Login - Client area</title>
    <?php include("member-header.php"); ?>

</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../images/img-01.png" alt="IMG">
                </div>

                <form action="" class="login100-form validate-form" method="post" name="login">
                    <span class="login100-form-title">
                        Change Password
                    </span>

                    <?php
                    if (isset($_POST['old_pass']) && isset($_POST['new_pass']))
                        if (change_pass()) echo
                            "<div class='login100-form'>
								<center><b><font color='green'>password successfuly changed</font></b></center><br>
							</div>";
                        else echo
                            "<div class='login100-form'>
								<center><b><font color='red'>password failed to be changed</font></b></center><br>
							</div>";
                    ?>

                    <div class="wrap-input100 validate-input" data-validate="Old Pssword Is Required">
                        <input class="input100" type="password" name="old_pass" placeholder="Curent Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="new_pass" placeholder="New Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Change
                        </button>
                    </div>
                    <br>
                    <div class="text-center p-t-12">
                        <a class="txt2" href="account.php">
                            <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                            Back To Account
                        </a>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>

    <?php include("member-footer.php"); ?>

</body>

</html>