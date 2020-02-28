<!DOCTYPE html>
<html lang="en">
<head>
	<title> FaceBook Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../style/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../style/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../style/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/css/util.css">
	<link rel="stylesheet" type="text/css" href="../style/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
<div class="container-login100" style="background-image: url('../style/images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form action="../../controllers/AuthController.php" method="post" >
				<span class="login100-form-title p-b-37">
					Sign In
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" id="email" name="email" placeholder="username or email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button  type="submit"value="Login" name="Login" class="login100-form-btn">
						login
					</button>
				</div>

			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../style/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../style/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../style/vendor/bootstrap/js/popper.js"></script>
	<script src="../style/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../style/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../style/vendor/daterangepicker/moment.min.js"></script>
	<script src="../style/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../style/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../style/js/main.js"></script>

</body>
</html>