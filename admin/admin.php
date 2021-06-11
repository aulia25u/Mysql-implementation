<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
include("../db.php");
include("admin_auth.php");

// Gett All User Online
$online = "SELECT * FROM dbo.DNauth where CertifyingStep = 2";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query($conn, $online , $params, $options);
$row_online = sqlsrv_num_rows($stmt);

// Gett All Account
$account = "SELECT AccountID FROM dbo.Accounts";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query($conn, $account , $params, $options);
$row_account = sqlsrv_num_rows($stmt);

// Gett All Characters
$characters = "SELECT AccountID FROM dbo.Characters";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query($conn, $characters , $params, $options);
$row_characters = sqlsrv_num_rows($stmt);

// Get All Row Admins
$admins    = "SELECT * FROM admins";
$result4 = mysqli_query($con, $admins);
$num_admins = mysqli_num_rows($result4);

?>
<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Call Sidebar & Topbar -->
        <?php
        //include auth_session.php file on all user panel pages
        include("admin-header.php");
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Content Row -->
            <div class="row">
                <!-- Total Cars Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Online</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row_online ?> Players</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-dark-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transaction Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Users</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row_account ?> Accounts</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-dark-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transaction Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Characters</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?= $row_characters?> Characters</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-dark-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total User Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Admins</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$num_admins ?> Admins</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-dark-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users Online</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>No</th>
                                    <th>Character Name</th>
                                    <th>Access Time</th>
                                    <th>Account Name</th>
                                    <th>Account Level</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                // Gett All Rows User Online
                                $online = "SELECT charactername, accesstime, accountlevel, accountname FROM dbo.DNauth where CertifyingStep = 2";
                                $getUserOnline = sqlsrv_query($conn, $online); 
                                while ($UsersOnline[] = sqlsrv_fetch_array($getUserOnline)) {
                                foreach ($UsersOnline as $transaction)
                                if($transaction["accountlevel"] == 99){
                                    $transaction["accountlevel1"]="<font color=green>Admin</font>";
                                } 
                                else{
                                    $transaction["accountlevel1"]="<font color=black>Player</font>";
                                }
                                $status = "<font color=green>Online</font>";
                                    echo '<tr>
                                            <td>' . $i++ . '</td>
                                            <td>' . $transaction['charactername'] . '</td>
                                            <td>' . $transaction['accesstime']->format('d/m/Y H:i:s') . '</td>
                                            <td>' . $transaction['accountname'] . '</td>
                                            <td>' . $transaction['accountlevel1'] . '</td>
                                            <td>' . $status . '</td>
                                        </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    //include auth_session.php file on all user panel pages
    include("admin-footer.php");
    ?>

</body>

</html>