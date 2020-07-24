<?php

 require_once "includes/database.php";?>
<?php  
 //action.php   
 if(isset($_POST["food_id"]))  
 {  
      $order_table = '';  
      $message = '';  
      if($_POST["action"] == "add")  
      {  
           if(isset($_SESSION["shoppingCart"]))  
           {  
                $is_available = 0;  
                foreach($_SESSION["shoppingCart"] as $keys => $values)  
                {  
                     if($_SESSION["shoppingCart"][$keys]['food_id'] == $_POST["food_id"])  
                     {  
                          $is_available++;  
                          $_SESSION["shoppingCart"][$keys]['food_quantity'] = $_SESSION["shoppingCart"][$keys]['food_quantity'] + $_POST["food_quantity"];  
                     }  
                }  
                if($is_available < 1)  
                {  
                     $item_array = array(  
                          'food_id'               =>     $_POST["food_id"],  
                          'food_title'               =>     $_POST["food_title"],  
                          'food_price'               =>     $_POST["food_price"],  
                          'food_quantity'          =>     $_POST["food_quantity"]  
                     );  
                     $_SESSION["shoppingCart"][] = $item_array;  
                }  
           }  
           else  
           {  
                $item_array = array(  
                     'food_id'               =>     $_POST["food_id"],  
                     'food_title'               =>     $_POST["food_title"],  
                     'food_price'               =>     $_POST["food_price"],  
                     'food_quantity'          =>     $_POST["food_quantity"]  
                );  
                $_SESSION["shoppingCart"][] = $item_array;  
           }  
      }  
      if($_POST["action"] == "remove")  
      {  
           foreach($_SESSION["shoppingCart"] as $keys => $values)  
           {  
                if($values["food_id"] == $_POST["food_id"])  
                {  
                     unset($_SESSION["shoppingCart"][$keys]);  
                     $message = '<label class="text-success">food Removed</label>';  
                }  
           }  
      }  
      if($_POST["action"] == "quantity_change")  
      {  
           foreach($_SESSION["shoppingCart"] as $keys => $values)  
           {  
                if($_SESSION["shoppingCart"][$keys]['food_id'] == $_POST["food_id"])  
                {  
                     $_SESSION["shoppingCart"][$keys]['food_quantity'] = $_POST["quantity"];  
                }  
           }  
      }  
      $order_table .= '  
           '.$message.'  
           <table class="table table-bordered"> 
              <thead class="table-inverse"> 
                <tr>  
                    <th width="30%">food Name</th>  
                    <th width="5%">Quantity</th>  
                    <th width="15%">Price</th>  
                    <th width="15%">Total</th>  
                    <th width="10%">Action</th> 
                </tr>
              </thead  
           ';  
      if(!empty($_SESSION["shoppingCart"]))  
      {  
           $total = 0;  
           foreach($_SESSION["shoppingCart"] as $keys => $values)  
           {  
                $order_table .= '  
                     <tr>  
                          <td>'.$values["food_title"].'</td>  
                          <td><input type="text" title="quantity[]" id="quantity'.$values["food_id"].'" value="'.$values["food_quantity"].'" class="form-control quantity" data-food_id="'.$values["food_id"].'" /></td>  
                          <td align="right"> '.$values["food_price"].'</td>  
                          <td align="right"> '.number_format($values["food_quantity"] * $values["food_price"], 2).'</td>  
                          <td><button title="delete" class="btn btn-danger btn-xs delete" id="'.$values["food_id"].'">Remove</button></td>  
                     </tr>  
                ';  
                $total = $total + ($values["food_quantity"] * $values["food_price"]);  
           }  
           $order_table .= '  
                <tr>  
                     <td colspan="3" align="right">Total</td>  
                     <td align="right"> '.number_format($total, 2).'</td>  
                     <td></td>  
                </tr>  
                <tr>  
                     <td colspan="5" align="right">  
                          <form method="post" action="checkout.php">  
                               <input type="submit" title="place_order" class="btn btn-warning" value="Place Order" />  
                          </form>  
                     </td>  
                </tr>  
           ';  
      }  
      $order_table .= '</table>';  
      $output = array(  
           'order_table'     =>     $order_table,  
           'cart_item'          =>     count($_SESSION["shoppingCart"])  
      );  
      echo json_encode($output);  
 }  
 ?>