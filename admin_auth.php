<?php
include("db.php");
$current_active_user = $_SESSION["username"];
$query    = "SELECT * FROM admins  WHERE username='$current_active_user'";
$result = mysqli_query($con, $query);
$rows = mysqli_num_rows($result);
if ($rows == 1) {
} else {
    header("location:403.php");
}
