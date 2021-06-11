<?php
//error_reporting(0);
//include auth_session.php file on all user panel pages
include("../auth_session.php");
include("admin_auth.php");
include("../db.php");
?>
<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <title>View Accounts</title>

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
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">View Accounts</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Account Name</th>
                                    <th>Level Code</th>
                                    <th>Cash</th>
                                    <th>Last Login</th>
                                    <th>Last Logout</th>
                                    <th>Register Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query  = "SELECT * FROM dbo.Accounts";
                                $result = sqlsrv_query($conn, $query);
                                $i = 1;
                                while ($row = sqlsrv_fetch_array($result)) {
                                    //Chek Status Level Player
                                    if($row["AccountLevelCode"] == 99){
                                        $row["accountlevel1"]="<font color=Green>Admin</font>";
                                    } 
                                    else{
                                        $row["accountlevel1"]="Player";
                                    }
                                    //Chek Kondisi Table Date 
                                    if(!empty($row['LastLoginDate']) and ($row['LastLogoutDate']) and ($row['RegisterDate']) ){
                                        $newLogin = $row['LastLoginDate']->format('d/m/Y H:i:s');
                                        $newLogout = $row['LastLogoutDate']->format('d/m/Y H:i:s');
                                        $newRegis = $row['RegisterDate']->format('d/m/Y');
                                    }else{
                                        $newLogin = "NULL";
                                        $newLogout ="NULL";
                                        $newRegis = "NULL";
                                    }
                                    echo '<tr>
                                    <td>' . $i++ .'</td>
                                    <td>' . $row['AccountName'] . '</td>
                                    <td>' . $row['accountlevel1'] . '</td>
                                    <td>' . number_format($row['cash']) . '</td>
                                    <td>' . $newLogin. '</td>
                                    <td>' . $newLogout . '</td>
                                    <td>' . $newRegis. '</td>
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
    include("admin-footer.php");
    ?>

</body>

</html>