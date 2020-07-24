<?php require "includes/database.php";?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link rel="stylesheet" href="css/registration.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>




<p style="color: green;" align="center"><?php display_message();?></p>
<div class="header">
	<h2>Admin Login</h2>
</div>
	 
	<form method="post">
		<?php admin_login();?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="admin_registration.php">Signup</a>
		</p>
	</form>









 <script src="js/jquery.min.js"></script>  
 <script src="js/matrix.login.js"></script> 
</body>
</html>