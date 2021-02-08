<?php

include "includes/connection.php";

ob_start();
session_start();

if(!empty($_SESSION['u_mail'])){

  header('LOCATION: profile.php');

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Our Times</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/img/img-01.png" alt="IMG">
				</div>

				<form method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Welcome To Our Times<br>Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input id="myInput" class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div>
					<input style="margin-left: 10px;" type="checkbox" onclick="myFunction()">
					<span style="margin-left: 5px;color: #666666;">Show Password
					</span>
					</div>
					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" name="login-btn" value="Login">
					</div>

					<!-- Collection data from the input field -->

					<?php

					if(isset($_POST['login-btn'])){

						$i_email	= mysqli_real_escape_string($db,$_POST['email']);
						$i_pass		= mysqli_real_escape_string($db,$_POST['pass']);

						// Hash the pass bcz we stored password in database using hash

						$i_hash		= sha1($i_pass);

						// Read from the database to check if there is any information available for this user

						$query1 = "SELECT * FROM user WHERE u_mail='$i_email'";

						$send1 = mysqli_query($db,$query1);

						$chk = mysqli_num_rows($send1);

						if($chk > 0){
							
					// Read all the info for this user

                    while($response1 = mysqli_fetch_assoc($send1)){

                	$_SESSION['u_id'] = $response1['u_id'];
                	$_SESSION['u_photo'] = $response1['u_photo'];
                	$_SESSION['u_name'] = $response1['u_name'];
                	$_SESSION['u_pass'] = $response1['u_pass'];
                	$_SESSION['u_address'] = $response1['u_address'];
                	$_SESSION['u_mail'] = $response1['u_mail'];
                	$_SESSION['u_contact'] = $response1['u_contact'];
                	$_SESSION['u_type'] = $response1['u_type'];
                	$_SESSION['u_about'] = $response1['u_about'];

                	if(($_SESSION['u_mail'] == $i_email) && ($_SESSION['u_pass'] == $i_hash)){

                		header('LOCATION: profile.php');

                	}else{

                		echo "<script type='text/javascript'>alert('Incorrect Password');
							window.location='index.php';
							</script>";
                	}

	                }

					}else{
						echo '<span class="badge badge-danger">Incorrect Email.No Data Found For This Email In Database!</span>';
					}

					}

					?>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="regestration.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

	<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<?php

ob_end_flush();

?>

</body>
</html>