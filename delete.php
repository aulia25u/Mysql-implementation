<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");

function delete_account()
{
	// require db file
	require('db.php');
	// catch current active user
	$current_active_user = $_SESSION["username"];
	// if user has been deleted succesfully
	if (mysqli_query($con, "DELETE FROM users WHERE username='$current_active_user'")) {
		// delete current active user
		unset($_SESSION['username']);

		return true;
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Account - Client area</title>
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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
					<img src="images/img-05.png" alt="IMG">
				</div>
				<div class="login100-form">
					<span class="login100-form-title">
						<h4>Are you sure to delete "<?php echo $_SESSION['username']; ?>" account ? <br> </h4>
					</span>
					<form action="" method="post">
						<div class="container-login100-form-btn">
							<?php
							if (isset($_POST["delete_btn"])) {
								if (delete_account()) {
									header("Location: login.php");
								}
							}
							?>
							<button class="login100-form-btn" name="delete_btn" value="true">
								Yes, I do
							</button>
						</div>
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" onclick="window.location.href='account.php';">
								Never mind
							</button>
						</div>
					</form>
					<br><br>
				</div>
			</div>
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
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>