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
    <title>Edit Profile</title>

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
                <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
            </div>

            <!-- Content Row -->
            <div class="row ml-1">
                <form>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">First Name</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Last Name</label>
                            <input type="text" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Gender</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>Man</option>
                                <option>Woman</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Age</label>
                            <input type="text" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <input type="text" class="form-control" id="input state">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="form-group ml-2">
                            <label for="inputState">Profile Picture</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
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