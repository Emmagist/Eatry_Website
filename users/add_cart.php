<!doctype html>
<html lang="en">
	<!-- signup/login Start -->
	  <?php require_once "includes/header.php";?>
	<!-- End of /Section -->
<body>

    <?php
     if (!isset($customer['customerID'])) {

        echo '<script>alert("You have to login/signup to contiue...Thank you")</script>';  
        echo '<script>window.location.href="index.php"</script>'; 
    } 
    ?>
		
	<!-- Navbar Start -->
	<?php require_once "includes/cart_navbar.php";?>
	<!-- End of /Section -->


	<section>
		 <div id="cart" class="container">

                          <div class="table-responsive" id="order_table">  
                               <table class="table table-bordered table-hover table-condensed"> 
                                    <thead class="table-inverse"> 
                                    <tr>  
                                         <th width="30%">food Name</th>  
                                         <th width="5%">Quantity</th>  
                                         <th width="15%">Price</th>  
                                         <th width="15%">Total</th>  
                                         <th width="10%">Action</th>  
                                    </tr> 
                                    </thead> 
                                    <?php 
                                    if (empty($_SESSION['shoppingCart']))
                                    {
                                      echo '<h6 class="text-danger">Your Cart empty</h6>';
                                    } 
                                    else
                                    {


                                    if(!empty($_SESSION["shoppingCart"]))  
                                    {  
                                         $total = 0;  
                                         foreach($_SESSION["shoppingCart"] as $keys => $values)  
                                         {                                               
                                    ?>  
                                    <tr>  
                                         <td><?php echo $values["food_title"]; ?></td>  
                                         <td><input type="text" name="quantity[]" id="quantity<?php echo $values["food_id"]; ?>" value="<?php echo $values["food_quantity"]; ?>" data-food_id="<?php echo $values["food_id"]; ?>" class="form-control quantity" /></td>  
                                         <td align="right"> ₦<?php echo $values["food_price"]; ?></td>  
                                        <td align="right"> ₦<?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>  
                                         <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["food_id"]; ?>">Remove</button></td>  
                                    </tr>  
                                    <?php  
                                               $total = $total + ($values["food_quantity"] * $values["food_price"]);  
                                         }  
                                    ?>  
                                    <tr>  
                                         <td colspan="3" align="right"><label>Grand Total</label></td>  
                                         <td align="right"> ₦<?php echo number_format($total, 2); ?></td>  
                                         <td></td>  
                                    </tr>  
                                    <tr>  
                                         <td colspan="5" align="right">  
                                              <form method="post" action="checkout.php">  
                                                   <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />  
                                              </form>  
                                         </td>  
                                    </tr>  
                                    <?php  
                                    }
                                    }  
                                    ?>  
                               </table> 
                               <?=$customer['customer_name']?>   
                          </div>  
                     </div> 
	</section>


	<!--about-->
  	<?php require_once "includes/about.php";?>
  	<!--/about-->
	
 	<!-- FOOTER Start -->
	<?php require_once "includes/footer.php";?>
	<!-- End of Section -->
		
</body>
</html>
<script></script>