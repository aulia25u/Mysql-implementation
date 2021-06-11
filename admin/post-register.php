<?php
include("../auth_session.php");
include("admin_auth.php");
include("../db.php");

// If User Submit The form
if (isset($_POST['submit'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    $password = stripslashes($_REQUEST['password']);

    // Chek Username availability
    $chekuser = "SELECT * FROM dbo.Accounts WHERE AccountName='$username'";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_query($conn, $chekuser , $params, $options);
    $row_chek = sqlsrv_num_rows($stmt);
    // Chek availability User Profile from user_desc
    if ($row_chek == 1) {
?>
        <script type="text/javascript">
            alert("Username Has Allready Used.");
            window.location = "register.php";
        </script>

    <?php
    }
    // If User profile From admin_desc not available
    else {
        $sql = "exec DNMembership.dbo.__CreateAccount '$username','$password'";
        $result = sqlsrv_query($conn, $sql);
        if ($result) {
    ?>
        <script type="text/javascript">
            alert("Account Create Successfull.");
            window.location = "register.php";
        </script>
<?php
         }
    }
}
?>