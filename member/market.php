<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
include("member_auth.php");
include("../db.php");
?>
<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cars Markets</title>

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

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Car Market Live</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Manifacture</th>
                                    <th>Production</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Last Sale</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query    = "SELECT * FROM car_description INNER JOIN car_stock ON car_description.car_name=car_stock.car_name";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>
                                    <td>' . $row['car_name'] . '</td>
                                    <td>' . $row['car_manifacture'] . '</td>
                                    <td>' . $row['car_production_date'] . '</td>
                                    <td>Rp. ' . number_format($row['car_price']) . '</td>
                                    <td>' . $row['car_stock'] . '</td>
                                    <td>' . $row['out_date'] . '</td>
                                    <td><center><button>Buy</button></center></td>
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