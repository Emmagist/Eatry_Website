<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "food_store");

if (mysqli_connect_errno()) {
	echo 'not connected with following error: '. mysqli_connect_error();
	die();
}


//require ("../backend/includes/function.php");

require ("function.php");

?>