<?php
// Enter your host name, database username, password, and database name.
// If you have not set database password on localhost then set empty.
$con = mysqli_connect("localhost", "academia_tubes", "Mbl21sync", "academia_login");
// $con = mysqli_connect("localhost", "root", "", "academia_tubes");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
