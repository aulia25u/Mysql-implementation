<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
include("admin_auth.php");
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Top-Up</title>
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .split {
            height: 100%;
            width: 100%;
            position: relative;
        }

        /* Control the left side */
        .left {
            width: 30%;
            text-align: center;
        }

        /* Control the right side */
        .right {

            width: 70%;
        }

        .centered {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translate(-50%, -0%);
            text-align: center;
        }

        /* Hide horizontal scrollbar */
    </style>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Call Sidebar & Topbar -->
        <?php
        //include auth_session.php file on all user panel pages
        include("admin-header.php");
        ?>
        <!-- End Call Sidebar & Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row ml-1 mb-5">
                <div class="split left">
                    <div class="centered">
                        <!-- Section Chek Cash -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800"> Chek Account Cash</h1>
                        </div>
                        <form class="login100-form validate-form" method="post" action="post-chekcash.php"
                            enctype="multipart/form-data">
                            <div class="wrap-input100 validate-input" data-validate="Username Is Required">
                                <input class="input100" type="text" name="username" placeholder="Username">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit1" value="chekcash" name="submit1">
                                    Chek Cash
                                </button>
                            </div>
                        </form>
                        <hr>
                        <!-- Section Update Cash -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Account Cash Top-Up</h1>
                        </div>
                        <form class="login100-form validate-form" method="post" action="post-topup.php"
                            enctype="multipart/form-data">
                            <div class="wrap-input100 validate-input" data-validate="Username Is Required">
                                <input class="input100" type="text" name="username" placeholder="Username">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <input class="input100" type="text" name="cash" placeholder="Cash">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit" value="topup" name="submit">
                                    Top-Up
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="split right">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Top-Up History</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Account</th>
                                            <th>Top-Up</th>
                                            <th>Balance</th>
                                            <th>Time</th>
                                            <th>Admin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Gett All Rows User Online
                                        $history = "SELECT *FROM cash_history";
                                        $rows = mysqli_query($con, $history); 
                                        while (mysqli_fetch_array($rows)) {
                                        foreach ($rows as $transaction)
                                            echo '<tr>
                                                    <td>' . $transaction['id'] . '</td>
                                                    <td>' . $transaction['account'] . '</td>
                                                    <td>' . number_format($transaction['cash']). '</td>
                                                    <td>' . number_format($transaction['balance']). '</td>
                                                    <td>' . $transaction['time']. '</td>
                                                    <td>' . $transaction['admin'] . '</td>
                                                </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
    include("admin-footer.php");
    ?>

</body>

</html>