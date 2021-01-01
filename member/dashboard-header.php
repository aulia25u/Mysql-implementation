        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-address-card"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Member<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider ">

            <!-- Heading -->
            <div class="sidebar-heading">
                Member Panel
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="member.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Market Panel
            </div>

            <li class="nav-item ">
                <a class="nav-link" href="market.php">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Car Market</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="Transaction.php">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>My Transaction</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Account Panel
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="profile.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>My Profile</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="edit-profile.php">
                    <i class="fas fa-fw fa-user-edit"></i>
                    <span>Edit Profile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModal"">
                    <i class=" fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <!-- Get Name Admin From admin_description  -->
                                <?php
                                include('../db.php');
                                $current_active_user = $_SESSION["username"];
                                $qname    = "SELECT * FROM users INNER JOIN user_description ON users.id=user_description.id WHERE username='$current_active_user'";
                                $rname = mysqli_query($con, $qname);
                                while ($rowname = mysqli_fetch_assoc($rname)) {
                                    echo '<span class="mr-2 d-none d-lg-inline text-gray-600 big">' . $rowname['user_name'] . '</span>';
                                }
                                $rows = mysqli_num_rows($rname);
                                if ($rows == 0) {
                                    echo '<span class="mr-2 d-none d-lg-inline text-gray-600 big">' . $_SESSION["username"] . '</span>';
                                }
                                ?>

                                <img class="img-profile rounded-circle" src="../images/img-01.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-dark-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="account.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-dark-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->