<?php
include("../auth_session.php");
include("admin_auth.php");
include("../db.php");

// If User Submit The form
if (isset($_POST['submit1'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);

    // Chek Username availability
    $chekuser = "SELECT * FROM dbo.Accounts WHERE AccountName='$username'";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_query($conn, $chekuser , $params, $options);
    $row_chek = sqlsrv_num_rows($stmt);
    // Chek availability User Profile from user_desc
    if ($row_chek == 1) {
        $query  = "SELECT * FROM dbo.Accounts WHERE AccountName='$username'";
        $result = sqlsrv_query($conn, $query);
        while ($row = sqlsrv_fetch_array($result)) {
?>
        
        <script type="text/javascript">
            alert("Sisa Cash : <?= number_format($row["cash"]) ?> ");
            window.location = "update-cash.php";
        </script>

    <?php
        }
    }
    else{
        ?>
        <script type="text/javascript">
            alert("Account Not Found");
            window.location = "update-cash.php";
        </script>
        <?php
    }
}
    ?>

