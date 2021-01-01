<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
include("../db.php");
include("member_auth.php");

// Get All Unit member have
$current_active_user = $_SESSION["username"];
$users    = "SELECT * FROM transaction INNER JOIN transaction_history ON transaction.transaction_id=transaction_history.transaction_id WHERE username='$current_active_user' ";
$result1 = mysqli_query($con, $users);

$unit = 0;
while ($num = mysqli_fetch_assoc($result1)) {
    $unit += $num['car_unit'];
}

// Get All Unit member have
$current_active_user = $_SESSION["username"];
$users    = "SELECT * FROM transaction INNER JOIN transaction_history ON transaction.transaction_id=transaction_history.transaction_id WHERE username='$current_active_user' ";
$result2 = mysqli_query($con, $users);
$num_trans = mysqli_num_rows($result2);
?>
<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Member Dashboard</title>

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
        include("dashboard-header.php");
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <!-- Car Brand Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        My Car Brands</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$Brand</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fas fa-car fa-2x text-dark-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Cars Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        My Total Cars</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $unit ?> Unit</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-car-side fa-2x text-dark-300"></i>
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
                                        My transaction</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $num_trans ?> Transaction</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-dark-300"></i>
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
                                        My Username</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?= $_SESSION["username"] ?>
                                    </div>
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
                    <h6 class="m-0 font-weight-bold text-primary">My Transaction</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Car Name</th>
                                    <th>Car Manifacture</th>
                                    <th>Unit</th>
                                    <th>Total Price</th>
                                    <th>Transaction Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $current_active_user = $_SESSION["username"];
                                $query    = "SELECT * FROM transaction INNER JOIN transaction_history ON transaction.transaction_id=transaction_history.transaction_id WHERE username='$current_active_user' ";

                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>
                                    <td>' . $row['car_name'] . '</td>
                                    <td>$Car Manifacture</td>
                                    <td>' . $row['car_unit'] . '</td>
                                    <td>$Total Price</td>
                                    <td>' . $row['transaction_date'] . '</td>
                                    
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
    include("dashboard-footer.php");
    ?>

</body>

</html>