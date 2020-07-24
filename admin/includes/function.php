<?php
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
function add_admin(){

	global $conn;
	$ref_no = rand();
	$error = [];
	if (isset($_POST['register'])) {
		
		$name = escape_string($_POST['name']);
		$username = escape_string($_POST['username']);
		$password = escape_string($_POST['password']);
		$confirm_pass = escape_string($_POST['confirm_pass']);
		$hash_pass = password_hash($password, PASSWORD_DEFAULT);

		if (empty($name) || empty($username) || empty($password) || empty($confirm_pass)) {
			
			$error[] = "All field are required!";
		}
		if ($password != $confirm_pass) {
			$error[] = "Password Not match!";
		}
		if (strlen($password)  < 6) {
			$error[] = "Password must be greater than 6 character !";
		}

		$userQuery = query("SELECT * FROM tbl_admin WHERE admin_username = '$username' ");
		confirm($userQuery);
		$userCount = mysqli_num_rows($userQuery);
		

		if ($userCount != 0) {

			$error[] = 'username already taken.';
		}
		
		if (!empty($error)) {
			echo displayError($error);
		} else {

			$query = query("INSERT INTO tbl_admin(admin_name,admin_username,admin_password,admin_ref) VALUES('$name','$username','$hash_pass','$ref_no') ");
			confirm($query);
			redirect('admin_login.php');
			set_message('Registration Successful');

		}

		
	}
}

function admin_login(){

	global $conn;
	$error = [];

	if (isset($_POST['login'])) {
		
		$username = escape_string($_POST['username']);
		$password = escape_string($_POST['password']);

		if (empty($username) || empty($password)) {
			
			$error[] = "All field are required!";
		}

		$userQuery = query("SELECT * FROM tbl_admin WHERE admin_username = '$username' ");
		confirm($userQuery);
		$row = fetch_array($userQuery);
		$rowCount = mysqli_num_rows($userQuery);

		if ($rowCount < 1) {

			$error[] = 'user does not exist!';
		}

		if (!password_verify($password, $row['admin_password'])) {
					$error[] = 'Password does not match.';
				}
				//check for error
				if (!empty($error)) {
					echo displayError($error);
				}else{
					//log user in
				$id = $row['admin_id'];	
				$_SESSION['admin_id'] = $row;
				$_SESSION['admin_username'] = $row;
				$_SESSION['logged'] = true;
				$date = date("Y-m-d H:i:S");
				query("UPDATE tbl_admin SET last_login = '$date' WHERE admin_id = '$id'");
				redirect("index.php");
				set_message("You are login!");
				}
	}
}


function password_change($admin){

	global $conn;

	$error = [];
	if (isset($_POST['password_change'])) {
		
		$admin_id = $admin['admin_id'];
		$old_password = escape_string($_POST['old_password']);
		$new_password = escape_string($_POST['new_password']);
		$confirm_password = escape_string($_POST['confirm_password']);
		$new_hash_pass = password_hash($new_password, PASSWORD_DEFAULT);
		$hashed = $admin['admin_password'];

		if (empty($new_password) || empty($confirm_password) || empty($old_password)) {
			
			$error[] = "All field are required!";
		}
		if ($new_password != $confirm_password) {
			$error[] = "Password Not match!";
		}
		if (strlen($new_password)  < 6) {
			$error[] = "Password must be greater than 6 character !";
		}	

		if (!password_verify($old_password, $hashed)) {
			$error[] = 'Old Password does not exist.';
		}
		
		if (!empty($error)) {
			echo displayError($error);
		} else {

			$query = query("UPDATE tbl_admin SET admin_password = '$new_hash_pass' WHERE admin_id = '$admin_id' ");
			confirm($query);
			redirect('index.php');
			set_message('Password Was Updated Successfully!');

		}

		
	}
	
}

function show_admin(){

	global $conn;

	$query = query("SELECT * FROM tbl_admin");
	confirm($query);

	while ($row = fetch_array($query)) {
		
		$admin_ref = $row['admin_ref'];
		$admin_name = $row['admin_name'];
		$admin_username = $row['admin_username'];
		$admin_image = $row['admin_image'];
		$last_login = $row['last_login'];
		$admin_phone_number = $row['admin_phone_number'];

		$admin = <<<DELIMETER
		
		 		<tr class="gradeX">
                  <td>{$admin_name}</td>
                  <td>{$admin_ref}</td>
                  <td>$last_login</td>
                  <td class="center">
                    <a href="admin_detail.php?edit={$admin_ref}" class="btn btn-xm btn-primary">View</a>
                    <a href="delete_admin.php?delete={$admin_ref}" class="btn btn-xm btn-danger">Delete</a>
                  </td>
                </tr>

DELIMETER;
        echo $admin;

	}
}

function update_admin(){

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

function show_user(){

	global $conn;

	$query = query("SELECT * FROM tbl_customer");
	confirm($query);

	while ($row = fetch_array($query)) {
		
		$customer_ref = $row['customer_reference'];
		$customer_name = $row['customer_name'];
		$customer_email = $row['customer_email'];
		$customer_email = $row['customer_email'];
		$customer_phone_number = $row['customer_phone_number'];

		$admin = <<<DELIMETER
		
		 		<tr class="gradeX">
                  <td>{$customer_name}</td>
                  <td>{$customer_ref}</td>
                  <td>$customer_email</td>
                  <td class="center">
                    <a href="customer_detail.php?edit={$customer_ref}" class="btn btn-xm btn-primary">View</a>
                    <a href="delete_customer.php?delete={$customer_ref}" class="btn btn-xm btn-danger">Delete</a>
                  </td>
                </tr>

DELIMETER;
        echo $admin;

	}
}


function show_order(){

	global $conn;

	$query = query("SELECT * FROM tbl_order WHERE order_status = 0");
	confirm($query);

	while ($row = fetch_array($query)) {
		
		$order_ref = $row['order_reference'];
		$date_created = $row['date_created'];
		$customer_id = $row['customer_id'];
		$order_id = $row['order_id'];
		$order_status = $row['order_status'];
		$date_created = $row['date_created'];

		$cusQuery = query("SELECT customer_name FROM tbl_customer WHERE customerID = '$customer_id' ");
		$cusResult = fetch_array($cusQuery);
		$cus_name = $cusResult['customer_name'];

		

		$order = <<<DELIMETER

				<tr class="gradeX">
                  <td>$cus_name</td>
                  <td class="center" >
                   <a href="status.php?status=$order_id" class="btn btn-xm btn-success" align="center">Running</a>
                  </td>
                  <td class="center" >
                    <a href="order_view.php?view=$order_id" class="btn btn-xm btn-info" align="center">View</a>
                  </td>
                </tr>
DELIMETER;
         echo $order;

	}
}

function order_detail(){

	global $conn; 
	$order_detail = '';
	$customer = '';
	$total=0;
	if (isset($_GET['view'])) {
		
		$view = $_GET['view'];
		$query = query("SELECT * FROM tbl_order  
                        INNER JOIN tbl_order_details  
                        ON tbl_order_details.order_id = tbl_order.order_id  
                        INNER JOIN tbl_customer  
                        ON tbl_customer.customerID = tbl_order.customer_id  
                        WHERE tbl_order.order_id = '$view' ");

	
	 			while ($row = fetch_array($query)) 
	 			{
	 				$order_reference = $row['order_reference'];
	 				$order_id = $row['order_id'];
	 				$order_status = $row['order_status'];
	 				$date_created = $row['date_created'];
	 				$shipped_date = $row['shipped_date'];
					$cusrt = $row['customer_id'];
	 				$cusquery = query("SELECT *
	 									FROM tbl_customer WHERE customerID = '$cusrt' ORDER BY '$view' ");
	 				$resultcus = fetch_array($cusquery);

				$order_detail .="
				<tr>
					<td>".$row["food_title"]."</td> 
					<td>".$row['food_quantity']."</td>
					<td>₦".$row["food_price"]."</td>  
                    <td>₦".number_format($row["food_quantity"] * $row["food_price"], 2)."</td
				</tr>
				";
				$total = $total + ($row["food_quantity"] * $row["food_price"]); 
				
			}
			?>
				
			
				<table class="table table-bordered table-invoice">
				 
                  <tbody>
                   
                    <tr>
                    <tr>
                      <th class="width30" width="100"><strong>Customer Name:</strong></th>
                      <td class="width70"><?=$resultcus['customer_email']?></td>
                    </tr>
                   <tr>
                      <th width="100"><strong>Customer City</strong>:</th>
                      <td><?=$resultcus['customer_city']?></td>
                    </tr>
                    <tr>
                      <th width="100"><strong>Postal Code</strong>:</th>
                      <td><?=$resultcus['postal_code']?></td>
                    </tr>
                    <tr>
                      <th width="100"><strong>Customer Country</strong>:</th>
                      <td><?=$resultcus['customer_country']?></td>
                    </tr>
                 	<tr>
                      <th width="100"><strong>Phone Number</strong>:</th>
                      <td><?=$resultcus['customer_phone_number']?></td>
                    </tr>
                    <tr>
                      <th width="100"><strong>Customer Address</strong>:</th>
                      <td><?=$resultcus['customer_address']?></td>
                    </tr>
                    <tr>
                      <th width="100"><strong>Order Ref</strong>:</th>
                      <td><?=$order_reference?></td>
                    </tr>
                     <tr>
                      <th width="100"><strong>Date created</strong>:</th>
                      <td><?=$date_created?></td>
                    </tr>
                     <tr>
                      <th width="100"><strong>Shipped Date</strong>:</th>
						
						<?php

						$query = query("SELECT order_status FROM tbl_order WHERE order_id = '$view' AND order_status = 1 ");
						$result = fetch_array($query);

						?>
                      <td><?=(($result)?"$shipped_date":"")?></td>
                    </tr>
                  </tr>
               
                  
                    </tbody>
                  
                </table>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th class="head0">Food Name</th>
                      <th class="head0 right">Qty</th>
                      <th class="head1 right">Price</th>
                      <th class="head0 right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?=$order_detail?>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-bordered table-invoice-full">
                  <tbody>
                    <tr>
                      <td class="msg-invoice" width="85%"><h4>Payment method: </h4>
                        <a href="#" class="tip-bottom" title="Wire Transfer">PayStack</a></td>
                      <td class="right"><strong>Grand Total</strong> <br>
                      <td class="right"><strong>₦<?=number_format($total, 2)?><br>
                       </strong></td>
                    </tr>
                  </tbody>
                </table>
                <div class="pull-right">
                	

                  <a href="order_view.php?order_status=<?=(($order_status == 0)?'1':'0');?>&id=<?=$order_id;?>"></span>
				</a>&nbsp <?=(($order_status == 0)?'<p class="btn btn-warning">Pending</p>':'<p class="btn btn-success">Shipped</p>');?>
                  	
              	</div>
              </div>
          
            </div>
	 
	<?php
	}
	
	
}



function shipped(){


		
		$query = query("SELECT * FROM tbl_order WHERE order_status = 1");
		confirm($query);

		while ($Complete = fetch_array($query)) {

			$order_ref = $Complete['order_reference'];
		$shipped_date = $Complete['shipped_date'];
		$customer_id = $Complete['customer_id'];
		$order_id = $Complete['order_id'];
		$order_status = $Complete['order_status'];
		$date_created = $Complete['date_created'];

		$cusQuery = query("SELECT customer_name FROM tbl_customer WHERE customerID = '$customer_id' ");
		$cusResult = fetch_array($cusQuery);
		$cus_name = $cusResult['customer_name'];
			
			$Completed = <<<DELIMETER

				<tr class="gradeX">
                  <td>$cus_name</td>
                  <td>$order_ref</td>
                   <td>$shipped_date</td>
                  <td class="center" >
                   <a href="reverse_status.php?restore=$order_id" class="btn btn-xm btn-success" align="center">Completed</a>
                  </td>
                  <td class="center" >
                    <a href="order_view.php?view=$order_id" class="btn btn-xm btn-info" align="center">View</a>
                  </td>
                </tr>
DELIMETER;
        echo $Completed;

		}
	
}

function add_menu(){

	global $conn;
	
	$error = [];
	if (isset($_POST['add_menu'])) {
		$menu_ref = rand(0000000,999999);
		$menu_title = escape_string($_POST['menu_title']);
		$menu_price = escape_string($_POST['menu_price']);
		$menu_quantity = escape_string($_POST['menu_quantity']);
		$menu_cat = escape_string($_POST['menu_cat']);
		$menu_description = escape_string($_POST['menu_description']);

		if (!is_numeric($menu_price)) {
			
			$error[] = "Enter valued Price!";
		}

		if (!empty($_FILES)) {
		//var_dump($_FILES);
		$photo = $_FILES['file'];
		$name = $photo['name'];
		$nameArray = explode('.', $name);
		$fileName = $nameArray[0];
		$fileExtension = $nameArray[1];
		$mime = explode('/',$photo['type']);
		$mimeType = $mime[0];
		$mimeExtension = $mime[1];
		$tmpLocation = $photo['tmp_name'];
		$fileSize = $photo['size'];
		$allowed = array('png','jpg','jpeg','gif');
		$uploadName = md5(microtime()).'.'.$fileExtension;
		$uploadPath = 'images'.$uploadName;
		$imagePath = 'images'.$uploadName;
		if ($mimeType != 'image') {
			$error[] = 'The file must be an image.';
		}
		if (!in_array($fileExtension, $allowed)) {
			$error[] = 'The file must be a jpg, png, jprg or gif.';
		}
		if ($fileSize > 15000000) {
			$error[] = 'The file size must be below 15mb.';
		}
		if ($fileExtension != $mimeExtension && ($mimeExtension = 'jpeg' && $fileExtension != 'jpg')) {
			$error[] = 'The file extension deos not match the file.';
		}

	}

		if (!empty($error)) {
			echo displayError($error);
		} 
		else
		{
			if (!empty($_FILES)) {
			move_uploaded_file($tmpLocation,$uploadPath);
			}
			$query = query("INSERT INTO menu(menu_reference,title,price,quantity,cat_id,description,images) VALUES('$menu_ref',$menu_title','$menu_price','$menu_cat','$menu_description','$imagePath') ");
			confirm($query);
			redirect("menu.php");
			set_message("Menu was added");
		}
	}	
}

?>
