<?php
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
    <title>View Characters</title>

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
                    <h6 class="m-0 font-weight-bold text-primary">View Characters</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Character Name</th>
                                    <th>Level Code</th>
                                    <th>Account Name</th>
                                    <th>Class</th>
                                    <th>Create Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query  = "SELECT * FROM dbo.Characters";
                                $result = sqlsrv_query($connn, $query);
                                $i = 1;
                                while ($row = sqlsrv_fetch_array($result)) {
                                    if($row["AccountLevelCode"] == 99){
                                        $row["accountlevel1"]="<font color=Green>Admin</font>";
                                    } 
                                    else{
                                        $row["accountlevel1"]="Player";
                                    }
                                    echo '<tr>
                                    <td>' . $i++ .'</td>
                                    <td>' . $row['CharacterName'] . '</td>
                                    <td>' . $row['accountlevel1'] . '</td>
                                    <td>' . $row['AccountName'] . '</td>
                                    <td>' . $row['CharacterClassCode'] . '</td>
                                    <td>' . $row['CreateDate']->format('d/m/Y'). '</td>
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