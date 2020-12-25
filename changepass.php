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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Client area</title>
    <link rel="stylesheet" href="style.css"/>
	<script>
	function myalert() {
	  alert("Sorry this feature is not complete");
	}
</script>
</head>
<body>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

    <form class="login100-form validate-form" method="post" name="login">
	<span class="login100-form-title">
						Change Password
					</span>
       
	   <div class="wrap-input100 validate-input" data-validate = "Old Pssword Is Required">
						<input class="input100" type="password" name="password" placeholder="Curent Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
	   
      <div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="newpassword" placeholder="New Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" onclick="myalert()">
							Change
						</button>
					</div>
					<br>
					<div class="text-center p-t-12">
							<a class="txt2" href="account.php">
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
								Back To Account
							</a>
						</div>	
					<br>
  </form>
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