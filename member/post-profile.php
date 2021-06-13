<?php
include("../auth_session.php");
include("member_auth.php");
include("../db.php");

// Get Username From Session
$current_active_user = $_SESSION["username"];

// Get ID From table Users With condition Username From session
$query = mysqli_query($con, "SELECT * FROM users where username='$current_active_user'") or die(mysqli_error($con));
$row = mysqli_fetch_array($query);
// Inisialisai ID
$id = $row['id'];

// If User Submit The form
if (isset($_POST['submit'])) {

    // Chek Row From table User_desc With condition Id = Id from table Users
    $qname    = "SELECT * FROM user_description WHERE id='$id'";
    $rname = mysqli_query($con, $qname);
    // Get row From Table User_desc
    $rows = mysqli_num_rows($rname);

    // Chek availability User Profile from user_desc

    if ($rows == 1) {
        $fullname = $_POST['fname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $query = "UPDATE user_description SET user_name = '$fullname', user_gender = '$gender', user_age = '$age' , user_addres = '$address' WHERE id = '$id'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
?>
        <script type="text/javascript">
            alert("Profile Update Successfull.");
            window.location = "profile.php";
        </script>
    <?php

    }
    // If User profile From user_desc not available
    else {
        $fullname = $_POST['fname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $query = "INSERT INTO user_description SET id = '$id',user_name = '$fullname', user_gender = '$gender', user_age = $age, user_addres = '$address'";
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