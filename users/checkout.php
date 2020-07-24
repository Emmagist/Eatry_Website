<!DOCTYPE html>
<html>
<head>
	<!-- signup/login Start -->
	  <?php require_once "includes/header.php";?>
	<!-- End of /Section -->

</head>
<body>

	
		
	<!-- Navbar Start -->
	<?php require_once "includes/cart_navbar.php";?>
	<!-- End of /Section -->


	  <br />
    <div class="container" id="checkout">
      <div class="row">
        <div class="col-md-12"> 
            <div class="col-md-3" id="block">
              <div class="block">
                <div class="block">
                  <img src="images/food-ad.png" alt="">
                </div>
                <div class="block">
                  <h4>Latest Food Items</h4>
                  <ul class="media-list">
                    <li class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/post-img.png" alt="...">
                        </a>
                        <div class="media-body">
                            <a href="" class="media-heading">Lamb leg roast
                            <p>Lorem ipsum dolor sit amet.</p></a>
                        </div>
                      </li>
                      <li class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/post-img-2.png" alt="...">
                        </a>
                        <div class="media-body">
                            <a href="" class="media-heading"> Lamingtons
                            <p>Lorem ipsum dolor.</p></a>
                        </div>
                      </li>
                      <li class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/post-img-3.png" alt="...">
                        </a>
                        <div class="media-body">
                            <a href="" class="media-heading">
                            Anzac Salad
                            <p>Lorem ipsum dolor sit.</p>

                            </a>
                        </div>
                      </li>
                    </ul>
                </div>

                <div class="block">
                  <h4>Food Tag</h4>
                  <div class="tag-link">
                    <a href="">BALLET</a>
                    <a href="">CHRISTMAS</a>
                    <a href="">ELEGANCE</a>
                    <a href="">ELEGANT</a>
                    <a href="">SHOPPING</a>
                    <a href="">SHOP</a>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-9" > 
           
                    <?php

                      $c = uniqid(rand(),true);
                     $md5 = md5($c);
                    $order_reference = $md5;   
                    if(isset($_POST["place_order"]))  
                    {  
                        
                         
                         $insert_order = "  
                         INSERT INTO tbl_order(customer_id,order_reference)  
                         VALUES('".$customer['customerID']."','$order_reference')  
                         ";  
                         $order_id = "";  
                         if(query($insert_order))  
                         {  
                              $order_id = mysqli_insert_id($conn);  
                         }  
                         $_SESSION["order_id"] = $order_id;  
                         $order_details = "";  
                         foreach($_SESSION["shoppingCart"] as $keys => $values)  
                         {  
                              $order_details .= "  
                              INSERT INTO tbl_order_details(order_id, food_title, food_price, food_quantity)  
                              VALUES('".$order_id."', '".$values["food_title"]."', '".$values["food_price"]."', '".$values["food_quantity"]."');  
                              ";  
                         }  
                         if(mysqli_multi_query($conn, $order_details))  
                         {  
                              unset($_SESSION["shoppingCart"]);  
                              echo '<script>alert("You have successfully place an order...Thank you")</script>';  
                              echo '<script>window.location.href="checkout.php"</script>';  
                         }  
                    }  
                    if(isset($_SESSION["order_id"]))  
                    {  
                         $customer_details = '';  
                         $order_details = '';  
                         $total = 0;  
                         $query = '  
                         SELECT * FROM tbl_order  
                         INNER JOIN tbl_order_details  
                         ON tbl_order_details.order_id = tbl_order.order_id  
                         INNER JOIN tbl_customer  
                         ON tbl_customer.customerID = tbl_order.customer_id  
                         WHERE tbl_order.order_id = "'.$_SESSION["order_id"].'"  
                         ';  
                         $result = query($query);  
                         while($row = fetch_array($result))  
                         {  
                              $customer_details = '  
                              <p><label>Name:</label> '.$row["customer_name"].'</p>
                              <p id="email'.$row['customer_email'].'"><label>Email:</label> '.$row["customer_email"].'</p>
                              <p><label>Phone Number:</label> '.$row["customer_phone_number"].'</p>    
                              <p><label>Address:</label> '.$row["customer_address"].'</p>  
                              <p><label>City:</label>    '.$row["customer_city"].'</p>  
                              <p><label>Postal Code:</label> '.$row["postal_code"].'</p>
                              <p><label>Country:</label> '.$row["customer_country"].'</p> 
                              <p><label>Order Ref.No:</label>  '.$row["order_reference"].'</p> 
                              ';  
                              $order_details .= "  
                                   <tr>  
                                        <td>".$row["food_title"]."</td>  
                                        <td>".$row["food_quantity"]."</td>  
                                        <td>₦".$row["food_price"]."</td>  
                                        <td>₦".number_format($row["food_quantity"] * $row["food_price"], 2)."</td>  
                                   </tr>  
                              ";  
                              $total = $total + ($row["food_quantity"] * $row["food_price"]);  
                         
                     
                         }
                         ?>
                          
                         <h3 align="center">Order Summary for Order No.<?=$row["order_reference"]?></h3>  
                         <div class="table-responsive">  
                              <table class="table">  
                                    <h6>Shipping Details</h6>  
                                   <tr>  
                                        <td><?=$customer_details?></td>  
                                   </tr>  
                                   
                                   <tr>  
                                        <td>  
                                        <h6>Order Details</h6>
                                             <table class="table table-bordered">  
                                                  <tr>  
                                                       <th width="50%">food Name</th>  
                                                       <th width="15%">Quantity</th>  
                                                       <th width="15%">Price</th>  
                                                       <th width="20%">Total</th>  
                                                  </tr>
                                                  <tr>
                                                    <?=$order_details?>
                                                  </tr>  
                                                    
                                                  <tr>  
                                                       <td colspan="3" align="right"><label>Grand Total</label></td>  
                                                       <td>₦<?=number_format($total, 2)?></td>  
                                                  </tr>  
                                             </table>

                                             
                                            <?php

                                        
                                              
                                              $query = query('SELECT * FROM tbl_order  
                                              INNER JOIN tbl_order_details  
                                              ON tbl_order_details.order_id = tbl_order.order_id  
                                              INNER JOIN tbl_customer  
                                              ON tbl_customer.customerID = tbl_order.customer_id  
                                              WHERE tbl_order.order_id = "'.$_SESSION["order_id"].'" ');
                                            

                                            ?>

                                             <form action="pay.php" method="POST">
                                              <?php foreach($query as $row):
                                                $total = $total + ($row["food_quantity"] * $row["food_price"]); 

                                                ?>

                                                <input type="hidden" name="email" value="<?php echo $row['customer_email']; ?>"> 
                                                <input type="hidden" name="name" value="<?php echo $row['customer_name']; ?>">
                                                <input type="hidden" name="phone_number" value="<?php echo $row['customer_phone_number']; ?>"> 
                                                <input type="hidden" name="address" value="<?php echo $row['customer_address']; ?>"> 
                                                <input type="hidden" name="city" value="<?php echo $row['customer_city']; ?>"> 
                                                <input type="hidden" name="country" value="<?php echo $row['customer_country']; ?>">  
                                                <input type="hidden" name="food_price" value="<?=$row['food_price']?>">
                                                <input type="hidden" name="food_title[]" value="<?php echo $row['food_title']; ?>" id="food_title<?=$row['order_detail_id']?>"> 
                                                <input type="hidden" name="food_quantity[]" id="food_quantity<?php echo $row["order_detail_id"]; ?>" value="<?php echo $row['food_title'] .':'. $row['food_quantity']; ?>"> 
                                                <input type="hidden" name="order_reference" value="<?php echo $row['order_reference']; ?>"> 
                                                
                                              <?php endforeach;?>
                                              <input type="hidden" name="total" value="<?=$total?>">
                                              <input type="submit" name="pay_now" id="pay-now" title="Pay now" class="btn btn-warning close " value="Payment Via Paystack">
                                            </form>

                                            
                                            
                                             <a class="btn btn-default" id="payment"><i class="fa fa-print" aria-hidden="true"></i> Print shipping Reciept</a> 
                                        </td> 
                                   </tr>  
                              </table> 

                         </div>  
                     <?php      
                    }  
                    ?>  
            </div>
        </div>  
      </div>
    </div>
  <!-- FOOTER Start -->
  <?php require_once "includes/footer.php";?>
  <!-- End of Section -->
   
</body>
</html>