<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
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

</head>
<body>
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login200">	
        		<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
				<br>
				<form action='http://35.187.255.23/phpmyadmin'>
					<button class='login100-form-btn' href='http://35.187.255.23/phpmyadmin'>
						PhpMyAdmin
					</button>
				</form>
				<form action='account.php'>
					<button class='login100-form-btn' href='account.php' >
						Account
					</button>
				</form>
   			 </div>
		</div>
	</div>
</body>
</html>