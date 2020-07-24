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
<?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) { $admin = $_SESSION['admin_username'];}?>

<?php if (!isset($admin['admin_id'])) {redirect("admin_login.php");}





?>






<div class="header">
	<h2>Change Password</h2>
</div>
	 
	<form method="post">
		<?php password_change($admin); ?>
		<div class="input-group">
			<label>Old Password</label>
			<input type="password" name="old_password">
		</div>
		<div class="input-group">
			<label>New Password</label>
			<input type="password" name="new_password">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="confirm_password">
		</div>
		<div class="input-group">
			<button type="submit" name="password_change" class="btn">Save</button>
			<a href="index.php" class="btn" id="Cancle">Cancle</a>
		</div>
		<p>
			
		</p>
	</form>









 <script src="js/jquery.min.js"></script>  
 <script src="js/matrix.login.js"></script> 
</body>
</html>