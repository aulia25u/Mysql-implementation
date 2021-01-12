<?php
include("../auth_session.php");
include("admin_auth.php");
include("../db.php");

// Get Username From Session
$current_active_user = $_SESSION["username"];

// Get ID From table Users With condition Username From session
$query = mysqli_query($con, "SELECT * FROM admins where username='$current_active_user'") or die(mysqli_error($con));
$row = mysqli_fetch_array($query);
// Inisialisai ID
$id = $row['id'];

// If User Submit The form
if (isset($_POST['submit'])) {

    // Chek Row From table User_desc With condition Id = Id from table Users
    $qname    = "SELECT * FROM admin_description WHERE id='$id'";
    $rname = mysqli_query($con, $qname);
    // Get row From Table User_desc
    $rows = mysqli_num_rows($rname);

    // Chek availability User Profile from user_desc

    if ($rows == 1) {
        $fullname = $_POST['fname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $query = "UPDATE admin_description SET admin_name = '$fullname', admin_gender = '$gender', admin_age = '$age' , admin_addres = '$address' WHERE id = '$id'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
?>
        <script type="text/javascript">
            alert("Profile Update Successfull.");
            window.location = "profile.php";
        </script>
    <?php

    }
    // If User profile From admin_desc not available
    else {
        $fullname = $_POST['fname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $query = "INSERT INTO admin_description SET id = '$id', admin_name = '$fullname', admin_gender = '$gender', admin_age = $age, admin_addres = '$address'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
    ?>
        <script type="text/javascript">
            alert("Profile Update Successfull.");
            window.location = "profile.php";
        </script>
<?php

    }
}
?>