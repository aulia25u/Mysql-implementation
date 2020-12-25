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

<?php
error_reporting(0);
include('db.php');
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
  	$error .="<p>Invalid email address please type a valid email address!</p>";
	}else{
	$sel_query = "SELECT * FROM `users` WHERE email='".$email."'";
	$results = mysqli_query($con,$sel_query);
	$row = mysqli_num_rows($results);
	if ($row==""){
		$error .= "<center><br><h3>No user is registered with this email address!</h3></center><br>";
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
		}else{
	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	$expDate = date("Y-m-d H:i:s",$expFormat);
	$key = md5(2418*2+$email);
	$addKey = substr(md5(uniqid(rand(),1)),3,10);
	$key = $key . $addKey;
// Insert Temp Table
mysqli_query($con,
"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

$output='<p>Dear '.$email.',</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="http://35.187.255.23/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">http://35.187.255.23/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';   	
$output.='<p>Thanks,</p>';
$body = $output; 
$subject = "Password Recovery";

$email_to = $email;
$fromserver = "auliarahman235@gmail.com"; 
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com"; // Enter your host here
$mail->SMTPAuth = true;
$mail->Username = "auliarahman235@gmail.com"; // Enter your email here
$mail->Password = ""; //Enter your passwrod here
$mail->Port = 587;
$mail->IsHTML(true);
$mail->From = "auliarahman235@gmail.com";
$mail->FromName = "Tubes BasDat";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<div class='login100-form'>
<br><center><h3>An email has been sent, please check your email to recover password.</h3></center><br/><br>
<form action='login.php'>
	  <button class='login100-form-btn' href='login.php' >
		 Back To Login
	  </button>
	  </form><br>
</div>";
	}

		}	
}else{
?>
    <form class="login100-form validate-form" method="post" name="reset">
	<span class="login100-form-title">
						Member Recovery
					</span>
       
      <div class="wrap-input100 validate-input" data-validate = "Email is required">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" value="Reset Password" name="submit">
						Recovery
						</button>
					</div>
					
					<div class="text-center p-t-12">
						<a class="txt2" href="login.php">
							Login Here
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>	
					<br>
  </form>

<?php } ?>
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