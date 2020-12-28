<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Transaction</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- Call Sidebar & Topbar -->
       <?php
            //include auth_session.php file on all user panel pages
            include("header.php");
        ?>
        
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Transaction Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Buyer</th>
                                            <th>Brand</th>
                                            <th>Type</th>
                                            <th>Year</th>
                                            <th>Sale Date</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Aulia Rahman</td>
                                            <td>Lamborghini</td>
                                            <td>Aventador</td>
                                            <td>2019</td>
                                            <td>2020/0412/31</td>
                                            <td>$9,320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Hanif Kukuh R</td>
                                            <td>Ford</td>
                                            <td>Mustang</td>
                                            <td>2019</td>
                                            <td>2020/0412/31</td>
                                            <td>$9,320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Izzu Zantya F</td>
                                            <td>Space X</td>
                                            <td>Falcon 9 heavy</td>
                                            <td>2019</td>
                                            <td>2020/0412/31</td>
                                            <td>$20,320,800</td>
                                        </tr>
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
            include("footer.php");
        ?>

</body>

</html>