<!DOCTYPE html>
<html>

<head>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin area</title>
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>
                <?php
                require('db.php');
                session_start();
                // Redirect User When Already Login
                if (isset($_SESSION['username'])) {
                    header("Location: admin");
                    exit();
                }
                // When form submitted, check and create user session.
                if (isset($_POST['username'])) {
                    $username = stripslashes($_REQUEST['username']);    // removes backslashes
                    $username = mysqli_real_escape_string($con, $username);
                    $password = stripslashes($_REQUEST['password']);
                    $password = mysqli_real_escape_string($con, $password);
                    // Check user is exist in the database
                    $query    = "SELECT * FROM `admins` WHERE username='$username' AND password='" . md5($password) . "'";
                    $result = mysqli_query($con, $query) or die($mysqli->error);
                    $rows = mysqli_num_rows($result);
                    if ($rows == 1) {
                        if ($_SESSION['username'] = $username) {
                            $_SESSION['auth'] = true;
                            $_SESSION['start'] = time();
                            $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
                            // Redirect to user dashboard page
                            header("Location: admin");
                        }
                    } else {
                        echo "<div class='login100-form'>
			                    <br>
                                <center><h3>Incorrect Username/password.</h3></center><br/>
                                <br>
                                <form action='index.php'>
                                <button class='login100-form-btn' href='index.php' >
                                    Login Again
                                </button>
                                </form>
                                <br><br><br>
                            </div>";
                    }
                } else {
                ?>
                <form class="login100-form validate-form" method="post" name="login">
                    <span class="login100-form-title">
                        <font color="green">Admin</font> Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Username Is Required">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <br>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" value="Login" name="submit">
                            Login
                        </button>
                    </div>
                    <br>
                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>