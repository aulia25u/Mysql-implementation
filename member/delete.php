<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
include("member_auth.php");

function delete_account()
{
    // require db file
    require('../db.php');
    // catch current active user
    // $current_active_user = $_SESSION["username"];
    // if user has been deleted succesfully
    // if (mysqli_query($con, "SELECT FROM admins INNER JOIN admin_description ON admin_description.id=admins.id WHERE username='$current_active_user'")) {
    //     // delete current active user
    //     unset($_SESSION['username']);

    //     return true;
    // }
    $current_active_user = $_SESSION["username"];
    $qname    = "SELECT * FROM users INNER JOIN user_description ON users.id=user_description.id WHERE username='$current_active_user'";
    $rname = mysqli_query($con, $qname);
    $rows = mysqli_num_rows($rname);

    // Chek if user already fill in profile or not......
    // If not......
    if ($rows == 0) {
        if (mysqli_query($con, "DELETE FROM users WHERE username='$current_active_user'")) {
            // delete current active user
            unset($_SESSION['username']);
            return true;
        }
    }
    // if yes.......
    else {
        while ($rowname = mysqli_fetch_assoc($rname)) {
            $id = $rowname["id"];
            if (mysqli_query($con, "DELETE FROM user_description WHERE id='$id'") && mysqli_query($con, "DELETE FROM users WHERE id='$id'")) {
                // delete current active user
                unset($_SESSION['username']);
                return true;
            }
        }
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

                                    header("Location: success-delete.php");
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