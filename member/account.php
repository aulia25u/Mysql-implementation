<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
include("member_auth.php");
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
                <div class="login100-form">
                    <span class="login100-form-title">
                        <h3>Account Setting</h3>
                    </span>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" onclick="window.location.href='changepass.php';">
                            Change Password
                        </button>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" onclick="window.location.href='delete.php';">
                            Delete Account
                        </button>
                    </div>
                    <br>
                    <div class="text-center p-t-12">
                        <a class="txt2" href="index.php">
                            <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                            Back To Home
                        </a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <?php include("member-footer.php"); ?>

</body>

</html>