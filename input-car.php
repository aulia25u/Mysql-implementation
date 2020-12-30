<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("admin_auth.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Car Input</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Call Sidebar & Topbar -->
        <?php
        //include auth_session.php file on all user panel pages
        include("header.php");
        ?>
        <!-- End Call Sidebar & Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Input Car</h1>
            </div>

            <!-- Content Row -->
            <div class="row ml-1 col-20">
                <form>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Car Name</label>
                            <input type="text" class="form-control" id="carname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Manifacture</label>
                            <input type="text" class="form-control" id="manifacture">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Production Date</label>
                            <input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputprice">Price</label>
                            <input type="text" class="form-control" id="inputprice">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="datearrived">Car Arrived</label>
                            <input type="text" class="form-control" id="datearrived" placeholder="YYYY/MM/DD">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputunit">Unit</label>
                            <input type="text" class="form-control" id="inputunit">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- End of Content Wrapper -->

    <?php
    //include auth_session.php file on all user panel pages
    include("footer.php");
    ?>

</body>

</html>