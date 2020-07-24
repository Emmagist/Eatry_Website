<?php
require "includes/database.php";

if (isset($_GET['restore'])) {
	$restoreID = escape_string($_GET['restore']);
	$query = query("UPDATE tbl_order SET order_status = 0 WHERE order_id ='$restoreID'");

	if(isset($query)) {
		$date = ("00-00-00 00:00:00");
		query("UPDATE tbl_order SET shipped_date = '00-00-00 00:00:00' WHERE order_id = '$statusID' ");
	redirect("order.php?status");
	set_message("Item restored!");


	} else {

	redirect("order.php?status");


	}

	
}








 ?>