<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");

function delete_account()
{
    // require db file
    require('../db.php');
    // catch current active user
    $current_active_user = $_SESSION["username"];
    // if user has been deleted succesfully
    if (mysqli_query($con, "DELETE FROM users WHERE username='$current_active_user'")) {
        // delete current active user
        unset($_SESSION['username']);

        return true;
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <title>Delete Account - Client area</title>
    <?php include("member-header.php"); ?>

</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../images/img-05.png" alt="IMG">
                </div>
                <div class="login100-form">
                    <span class="login100-form-title">
                        <h4>Are you sure to delete "<?php echo "<font color='red'>" . $_SESSION['username'] . "</font>"; ?>"
                            account ? <br> </h4>
                    </span>
                    <form action="" method="post">
                        <div class="container-login100-form-btn">
                            <?php
                            if (isset($_POST["delete_btn"])) {
                                if (delete_account()) {
                                    echo
                                        "<div class='login100-form'>
									<center><b><font color='green'>Your Account Successfuly Delete</font></b></center><br>
								</div>";
                                }
                            }
                            ?>
                            <button class="login200-form-btn" name="delete_btn" value="true">
                                Yes, I do
                            </button>
                        </div>
                    </form>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" onclick="window.location.href='account.php';">
                            Never mind
                        </button>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include("member-footer.php"); ?>

</body>

</html>