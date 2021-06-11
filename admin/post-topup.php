<?php
include("../auth_session.php");
include("admin_auth.php");
include("../db.php");

// If User Submit The form
if (isset($_POST['submit'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    $cash = stripslashes($_REQUEST['cash']);

    // Chek Username availability
    $chekuser = "SELECT * FROM dbo.Accounts WHERE AccountName='$username'";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_query($conn, $chekuser , $params, $options);
    $row_chek = sqlsrv_num_rows($stmt);

    // Get Cash
    if ($row_chek == 1) {
        $getcash  = "SELECT * FROM dbo.Accounts WHERE AccountName='$username'";
        $result = sqlsrv_query($conn, $getcash);
        $row = sqlsrv_fetch_array($result);
        
        // Combine OLD cash With New Cash
        $newcash = $row['cash'] + $cash;
        
        // Query Top-UP
        $updatecash = "UPDATE dbo.Accounts SET cash = '$newcash' Where AccountName='$username'";
        $update = sqlsrv_query($conn, $updatecash);
        while ($rows = sqlsrv_fetch_array($update)){}

        $admin = $_SESSION['username'];
        $account = $username;
        $topup = $cash;
        $balance = $newcash;
        $run = mysqli_query($con, "INSERT INTO `cash_history` (`account`, `cash`, `balance`, `time`, `admin`) VALUES ('$account', '$topup', '$balance', current_timestamp(), '$admin')");
        while ($hehe = mysqli_fetch_array($run)){}
    }else{
        echo'
        <script type="text/javascript">
        alert("Account Not Found Top-Up Failed");
        window.location = "update-cash.php";
        </script>
        ';
    }
    // Chek Username availability
    $query = "SELECT * FROM dbo.Accounts WHERE AccountName='$username'";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_query($conn, $chekuser , $params, $options);
    $row_chek = sqlsrv_num_rows($stmt);
         if ($row_chek == 1) {
            $query  = "SELECT * FROM dbo.Accounts WHERE AccountName='$username'";
            $result = sqlsrv_query($conn, $query);
            while ($row = sqlsrv_fetch_array($result)) {
?>
            <script type="text/javascript">
                var newLine = "\r\n"
                var msg = "Top-Up Cash Successfully..."
                msg += newLine;
                msg += "New Balance : <?=number_format($row["cash"]) ?>";
                alert(msg);
                window.location = "update-cash.php";
            </script>
    <?php
        }
    }
}
?>
