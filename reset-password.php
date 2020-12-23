<!DOCTYPE html>
<html>
<head>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <meta charset="utf-8"/>
    <title>Recovery Password</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-02.png" alt="IMG">
				</div>

    <script>
      function goBack() {
      window.history.back();
      }
    </script>
<?php
error_reporting(0);
include('db.php');
if (isset($_GET["key"]) && isset($_GET["email"])
&& isset($_GET["action"]) && ($_GET["action"]=="reset")
&& !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($con,"
SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';");
$row = mysqli_num_rows($query);
if ($row==""){
$error .= "
  <div class='login100-form'>
    <center>
      <h3>Invalid Link</h3><br>
        The link is invalid/expired. Either you did not copy the correct link from the email, 
        or you have already used the key in which case it is deactivated.
        <br><br>
</center>
";
	}else{
	$row = mysqli_fetch_assoc($query);
	$expDate = $row['expDate'];
	if ($expDate >= $curDate){
	?>
    <br />
	<form class="login100-form validate-form" method="post" action="" name="update">
  <span class="login100-form-title">
			Member Recovery
	</span>
	<input type="hidden" name="action" value="update" />
  <div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass1" id="pass1" maxlength="15" required placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
     <div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass2" id="pass2" maxlength="15" required placeholder="Re-Enter New Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
	<input type="hidden" name="email" value="<?php echo $email;?>"/>
  <br>
	<input class="login100-form-btn" type="submit" id="reset" value="Reset Password" /><br>
	</form>
<?php
}else{
$error .= "<h3>Link Expired</h3>
The link is expired. You are trying to use the expired link which as valid only 24 hours (1 days after request).<br /><br />";
				}
		}
if($error!=""){
	echo "<div class='login100-form'>".$error." <br>
	<form action='recovery.php'>
	  <button class='login100-form-btn' href='recovery.php' >
		  Back To Recovery
	  </button>
	  </form><br>
</div>";
	}			
} // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!=$pass2){
		$error .= "<center><h3>Password do not match, both password should be same.<br /><br /></h3></center>";
		}
	if($error!=""){
    echo "<div class='login100-form'>".$error." <br>
    <button class='login100-form-btn' onclick='goBack()'>Go Back</button>
  </div>";
		}else{

$pass1 = md5($pass1);
mysqli_query($con,"UPDATE `users` SET `password`='".$pass1."' WHERE `email`='".$email."';");	

mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");		
	
echo "
<div class='login100-form'>
<center><h3>Congratulations! Your password has been updated successfully.</h3>
<br><br>
	<form action='login.php'>
	  <button class='login100-form-btn' href='login.php' >
		  Login
	  </button>
	  </form><br>
</div></center>
";
		}		
}
?>
</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>