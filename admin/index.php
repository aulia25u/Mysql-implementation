<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
include("admin_auth.php");
?>
<!DOCTYPE html>

<head>

    <title>Dashboard - Admin area</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

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
                        <button class="login100-form-btn" onclick="window.open('admin.php');">
                            Admin Panel
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

    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="../js/main.js"></script>


</body>

</html>