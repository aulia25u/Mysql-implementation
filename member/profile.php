<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
include('../db.php');
include("member_auth.php");

$current_active_user = $_SESSION["username"];
$query    = "SELECT * FROM users INNER JOIN user_description ON users.id=user_description.id WHERE username='$current_active_user'";
$result = mysqli_query($con, $query);

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <title>My Profile</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Call Sidebar & Topbar -->
        <?php
        //include auth_session.php file on all user panel pages
        include("dashboard-header.php");
        ?>
        <!-- End Call Sidebar & Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="card mb-3" style="max-width: 900px;">
                    <div class="row no-gutters">
                        <div class="col-md-4 ml-4 mb-4 mt-3">
                            <br>
                            <img src="../images/img-01.png" class="card-img">
                        </div>
                        <div class="col-md-16 mt-3 mb-3 ml-0">
                            <div class="card-body">
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                    <h5 class="card-title">' . $row['user_name'] . '</h5>
                                    <hr class="sidebar-divider"
                                    <p class="card-text"> Email        : ' . $row['email'] . '</p>
                                    <p class="card-text"> Gender       : ' . $row['user_gender'] . '</p>
                                    <p class="card-text"> Age          : ' . $row['user_age'] . ' year</p>
                                    <p class="card-text"> Address      : ' . $row['user_addres'] . '</p>
                                    <p class="card-text"> Member since : ' . $row['create_datetime'] . '</p>
                                ';
                                }
                                $rows = mysqli_num_rows($result);
                                if ($rows == 0) {
                                    echo 'Please Update Your Profile';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Content Wrapper -->

    <?php
    //include auth_session.php file on all user panel pages
    include("dashboard-footer.php");
    ?>

</body>

</html>