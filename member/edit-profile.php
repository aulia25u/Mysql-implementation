<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
include("member_auth.php");
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Profile</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body id="page-top">
    <div id="wrapper">

        <!-- Call Sidebar & Topbar -->
        <?php
        //include auth_session.php file on all user panel pages
        include("dashboard-header.php");
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
                <form method="post" action="post-profile.php" enctype="multipart/form-data">
                    <div class="form-row ">
                        <div class="form-group col-md-12">
                            <label for="inputName">Full Name</label>
                            <input type="text" class="form-control" id="inputName" name="fname" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputGender">Gender</label>
                            <select class="form-control" id="inputGender" name="gender" required>
                                <option selected>Choose...</option>
                                <option>Man</option>
                                <option>Woman</option>

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputAge">Age</label>
                            <input type="number" class="form-control" id="inputAge" name="age" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" name="address" required>
                    </div>
                    <!-- <div class="form-row">
                        <div class="form-group ml-2">
                            <label for="inputState">Profile Picture</label>
                            <input type="file" class="form-control-file" id="photo" name="image" onchange="PreviewImage();">
                        </div>
                    </div> -->
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>

                </form>

            </div>
        </div>
    </div>

    <!-- End of Content Wrapper -->
    <?php
    include("dashboard-footer.php");
    ?>

</body>

</html>