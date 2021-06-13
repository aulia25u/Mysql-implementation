<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
include("../db.php");
include("member_auth.php");

$current_active_user = $_SESSION["username"];
$mysqli_result = mysqli_query($con, "SELECT * FROM transaction_history WHERE username='$current_active_user'");
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
    <title>Cars View</title>

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
    include("dashboard-footer.php");
    ?>

</body>

</html>