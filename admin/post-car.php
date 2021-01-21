<?php
include("../auth_session.php");
include("admin_auth.php");
include("../db.php");

// If User Submit The form
if (isset($_POST['submit'])) {

    $carname = $_POST['carname'];
    $manifacture = $_POST['manifacture'];
    $pdate = $_POST['pdate'];
    $price = $_POST['price'];
    $unit = $_POST['unit'];
    $admin = $_POST['admin'];
    $query = "INSERT INTO car_description SET car_name = '$carname', car_manifacture = '$manifacture', car_production_date = '$pdate' , car_price  = '$price' , car_stock = '$unit', input_admin = '$admin' ";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
?>
    <script type="text/javascript">
        alert("Input Car Successfull.");
        window.location = "input-car.php";
    </script>
<?php

}
?>