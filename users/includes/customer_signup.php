 
<?php

require "database.php";?>

<head>
	<meta charset="UTF-8">
	<title>Food-store</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Css -->
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="../css/registration.css">
	<!-- jS -->
<body>
		<div class="header">
			<h2>Registration</h2>
		</div>
		<form method="post">
				<?php add_customer();?>
			<div class="input-group">
				<label>Email</label>
				<input type="text" name="customer_email" required>
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="customer_password" required>
			</div>
			<div class="input-group">
				<label>Confirm Password</label>
				<input type="password" name="confirm_pass" required>
			</div>
			<div class="input-group">
				<button type="submit" name="register" class="btn">Register</button>
			</div>
			<p>
					Already a member? <a href="customer_login.php">Login</a>
			</p>
		</form>
</body>
</html>

 			








