<?php
require "includes/database.php";

if (isset($_GET['status'])) {
	$statusID = escape_string($_GET['status']);
	$query = query("UPDATE tbl_order SET order_status = 1 WHERE order_id ='$statusID'");

	if(isset($query)) {
		$date = date("Y-m-d H:i:S");
		query("UPDATE tbl_order SET shipped_date = '$date' WHERE order_id = '$statusID' ");
	redirect("shipped.php?status");



	} else {

	redirect("shipped.php?status");


	}

	
}








 ?>