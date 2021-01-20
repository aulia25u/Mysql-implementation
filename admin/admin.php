<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
include("../db.php");
include("admin_auth.php");

// Get All Row Users
$users    = "SELECT * FROM users";
$result = mysqli_query($con, $users);
$num_user = mysqli_num_rows($result);

// Get All Row Car Brands
$brands    = "SELECT * FROM car_description";
$result1 = mysqli_query($con, $brands);
$num_brand = mysqli_num_rows($result1);

// Get All Unit of Cars 
$units = "SELECT * FROM car_description";
$result2 = mysqli_query($con, $units);

$unit = 0;
while ($num = mysqli_fetch_assoc($result2)) {
    $unit += $num['car_stock'];
}

// Get All Row Transaction
$totaltrans   = "SELECT * FROM transaction_history";
$result3 = mysqli_query($con, $totaltrans);
$num_transaction = mysqli_num_rows($result3);

// Get All Row Admins
$admins    = "SELECT * FROM admins";
$result4 = mysqli_query($con, $admins);
$num_admins = mysqli_num_rows($result4);

$mysqli_result = mysqli_query($con, "SELECT * FROM transaction_history ");
while ($transactions[] = mysqli_fetch_assoc($mysqli_result)) {
}
array_pop($transactions);

?>
<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
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
                                        Total Cars</div>
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
                                        transaction</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $num_transaction ?> Transaction</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-dark-300"></i>
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
                                        transaction</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        $car_prices = array_map(function ($transaction) {
                                            return $transaction['car_price'];
                                        }, $transactions);
                                        $car_price_sum = array_sum($car_prices);
                                        echo 'Rp. ' . number_format($car_price_sum);
                                        ?>
                                    </div>
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
                                        Total User & Admin</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $num_user ?> User + <?= $num_admins ?> Admin</div>
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
                    <h6 class="m-0 font-weight-bold text-primary">ALL Transaction</h6>
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
                                foreach ($transactions as $transaction)
                                    echo '<tr>
                                            <td>' . $transaction['car_name'] . '</td>
                                            <td>' . $transaction['car_manifacture'] . '</td>
                                            <td>' . $transaction['total_carbuy'] . '</td>
                                            <td>Rp. ' . number_format($transaction['car_price']) . '</td>
                                            <td>' . $transaction['transaction_date'] . '</td>
                                        </tr>';
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