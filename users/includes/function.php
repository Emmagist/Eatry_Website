<?php
// Helper function


// Helper function


function displayError($error){
    $display = '<ul class="bg-danger">';
    foreach ($error as $error) {
        $display .= '<p class="text-danger" style="color: red;">'.$error.'</p>';
    }
    $display .= '</ul>';
    return $display;

}



function display_image($picture) {

global $upload_directory;

return $upload_directory  .  $picture;



}


function set_message($msg){

if(!empty($msg)) {

$_SESSION['message'] = $msg;

} else {

$msg = "";


    }


}


function display_message() {

    if(isset($_SESSION['message'])) {

        echo $_SESSION['message'];
        unset($_SESSION['message']);

    }
}

function message_danger($dng){

if(!empty($dng)) {

$_SESSION['danger'] = $dng;

} else {

$dng = "";


    }


}

function danger_message() {

    if(isset($_SESSION['danger'])) {

        echo $_SESSION['danger'];
        unset($_SESSION['danger']);

    }
}



function redirect($location) {

	header("location: $location");

}


function query($sql) {

	global $conn;

	return mysqli_query($conn, $sql);
}


function confirm($result) {

	if(!$result) {

		die("QUERY FALIED" . mysqli_erro($conn, $result));
	}
}


function escape_string($string) {

	global $conn;

	return mysqli_real_escape_string($conn, $string);
}

function fetch_array($result) {

  return mysqli_fetch_array($result);
}


/*End of Helper*/


function show_menu(){

	global $conn;

	$query = query("SELECT * FROM menu WHERE active = 1");
	confirm($query);
      

      while ($row = fetch_array($query)) {

      	$menu_id = escape_string($row['menu_id']);
      	$title = escape_string($row['title']);
      	$image = escape_string($row['image']);
      	$price = escape_string($row['price']);
      	$description = escape_string($row['description']);
      	
	$menu = <<<DELIMETER

	
		
			 <li>
						            <div class="products me">
										<a href="#">
											<img src="{$image}" alt="" class="img-responsive">
										</a>
										<a href="#">
											<h3>{$title}</h3>
										</a>
										<p class="price">From: {$price}</p>
										<input type="text" name="quantity" class="form-control" id="quantity{$menu_id}" value="1" />
										<input type="hidden" name="hidden_title" id="title{$menu_id}" value="{$title}" />
										<input type="hidden" name="hidden_price" id="price{$menu_id}" value="{$price}" />
										<div class="row">
											<div class="col-md-12">
												<a class="view-link shutter col-md-6" href="menu_detail.php?menu={$menu_id}"></i>More Detail</a>
												<a class="view-link shutter col-md-6 add_to_cart" name="add_to_cart" id="{$menu_id}">Add To cart</a>
											</div>
										</div>
									</div>	<!-- End of /.products -->
						        </li>
				
		
DELIMETER;
		echo $menu;
	}
}



function cat(){

	global $conn;

	$query = query("SELECT * FROM menu");
}

function add_customer(){

	global $conn;
	$customer_ref_no = rand();
	$error = [];
	if (isset($_POST['register'])) {
		
		$customer_email = escape_string($_POST['customer_email']);
		$customer_password = escape_string($_POST['customer_password']);
		$confirm_pass = escape_string($_POST['confirm_pass']);
		$hash_pass = password_hash($customer_password, PASSWORD_DEFAULT);

		if (empty($customer_email) || empty($customer_password) || empty($confirm_pass)) {
			
			$error[] = "All field are required!";
		}
		if ($customer_password != $confirm_pass) {
			$error[] = "Password Not match!";
		}
		if (strlen($customer_password)  < 8) {
			$error[] = "Password must be greater than 8 character !";
		}

		$customerQuery = query("SELECT * FROM tbl_customer WHERE customer_email = '$customer_email' ");
		confirm($customerQuery);
		$customerCount = mysqli_num_rows($customerQuery);

		if ($customerCount != 0) {

			$error[] = 'Email already taken.';
		}
		
		if (!empty($error)) {
					echo displayError($error);
		} else {

			$query = query("INSERT INTO tbl_customer(customer_email,customer_password,customer_reference) VALUES('$customer_email','$hash_pass','$customer_ref_no') ");
			confirm($query);
			redirect('../index.php');
			set_message('Registration Successful');

		}

		
	}
}

function customer_login(){

	global $conn;
	$error = [];

	if (isset($_POST['login'])) {
		
		$customer_email = escape_string($_POST['customer_email']);
		$customer_password = escape_string($_POST['customer_password']);

		if (empty($customer_email) || empty($customer_password)) {
			
			$error[] = "All field are required!";
		}

		$customerQuery = query("SELECT * FROM tbl_customer WHERE customer_email = '$customer_email' ");
		confirm($customerQuery);
		$row = fetch_array($customerQuery);
		$rowCount = mysqli_num_rows($customerQuery);

		if ($rowCount < 1) {

			$error[] = 'user does not exist!';
		}

		if (!password_verify($customer_password, $row['customer_password'])) {
					$error[] = 'Password does not match.';
		}
				//check for error
				if (!empty($error)) {
					echo displayError($error);
				}else{
					//log user in
				$customerID = $row['customerID'];	
				$_SESSION['customer_email'] = $row;
				$_SESSION['customer_name'] = $row;
				$_SESSION['logged'] = true;
				$date = date("Y-m-d H:i:S");
				query("UPDATE tbl_customer SET last_login = '$date' WHERE customerID = '$customerID'");
				redirect("../index.php");
				set_message("Welcome Home" .$row['customer_name']);
				}
	}
}


function update_customer(){

	global $conn;
	$error = [];
	if (isset($_POST['update'])) {
		
		$editId = escape_string($_GET['edit']);
		$name = escape_string($_POST['name']);
		$username = escape_string($_POST['username']);
		$email = escape_string($_POST['email']);
		$phone_number = escape_string($_POST['phone_number']);

		if (!is_numeric($phone_number)) {
			
			$error[] = "Please enter a vaild value!";
		} elseif ($phone_number < 11) {
			$error[] = "Enter 11 digit!";
		}

		if (!empty($error)) {
			
			echo displayError($error);
		}
		else {

			$query = query("UPDATE tbl_admin SET admin_name = '$name', admin_username = '$username', admin_email = '$email', admin_phone_number = '$phone_number' WHERE admin_ref = '$editId' ");
			confirm($query);

			set_message("Detail Updated Successfully");
		}
	}

	if (isset($_GET['edit'])) {
	
		$editId = escape_string($_GET['edit']);

		$query = query("SELECT * FROM tbl_admin WHERE admin_ref = '$editId' ");
		confirm($query);

		while ($row = fetch_array($query)) {
			
			$admin_ref = $row['admin_ref'];
			$admin_name = $row['admin_name'];
			$admin_username = $row['admin_username'];
			$admin_email = $row['admin_email'];
			$admin_image = $row['admin_image'];
			$date_joined = $row['date_joined'];
			$admin_phone_number = $row['admin_phone_number'];

			$update = <<<DELIMETER

			 <div class="control-group">
                <label class="control-label">Admin Name :</label>
                <div class="controls">
                  <input type="text" class="span11" name="name" value="$admin_name" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Admin Email :</label>
                <div class="controls">
                  <input type="email" class="span11" name="email" value="$admin_email" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Admin username :</label>
                <div class="controls">
                  <input type="text" class="span11" name="username" value="$admin_username" />
                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Date Joined :</label>
                <div class="controls">
                  <input type="text" class="span11" readonly value="$date_joined" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Admin Phone number :</label>
                <div class="controls">
                  <input type="text" class="span11" name="phone_number"  value="$admin_phone_number" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">File upload input :</label>
                <div class="controls">
                  <input type="file" name="image" />
                  <img src="$admin_image" class="img-responsive" alt="image" width="200" height="150" />
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" name="update" class="btn btn-success">Update</button>
                 <a href="admin.php" type="submit" class="btn btn-default">Cancle</a>
              </div>

DELIMETER;
         echo $update;
		}

	}
}

?>
