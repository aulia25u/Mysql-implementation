<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>

    <title>Dashboard - Client area</title>
    <?php include("member-header.php"); ?>

</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../images/img-04.png" alt="IMG">
                </div>
                <div class="login100-form">
                    <span class="login100-form-title">
                        <h3>Hey, <?php echo $_SESSION['username']; ?>!</h3>
                    </span>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" onclick="window.open('member.php');">
                            Member Panel
                        </button>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" onclick="window.location.href='account.php';">
                            Account setting
                        </button>
                    </div>
                    <br>
                    <div class="text-center p-t-10">
                        <a class="txt2" href="../logout.php">
                            <b>Logout</b>
                            <i class="fa fa-sign-out m-l-5" aria-hidden="true"></i>
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