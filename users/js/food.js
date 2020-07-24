$(document).ready(function(data){
		 $('.add_to_cart').click(function(){  
           var food_id = $(this).attr("id");  
           var food_title = $('#title'+food_id).val();  
           var food_price = $('#price'+food_id).val();  
           var food_quantity = $('#quantity'+food_id).val();  
           var action = "add";  
           if(food_quantity > 0)  
           {  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{  
                          food_id:food_id,   
                          food_title:food_title,   
                          food_price:food_price,   
                          food_quantity:food_quantity,   
                          action:action  
                     },  
                     success:function(data)  
                     {  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);  
                          alert("menu was added to cart");  
                     }  
                });  
           }  
           else  
           {  
                alert("Please Enter Number of Quantity")  
           }  
      });

     $(document).on('click', '.delete', function(){
      var food_id = $(this).attr("id");
      var action = "remove";
      if (confirm("Are you sure you want to remove this food menu")) 
      {
        $.ajax({
          url:"action.php",
          method:"POST",
          dataType:"json",
          data:{
            food_id:food_id,
            action:action
          },
          success:function(data)
          {
            $('#order_table').html(data.order_table);
            $('.badge').text(data.cart_item)
          }
        });
      }
      else
      {
        return false;
      }
     });

     $(document).on('keyup', '.quantity', function(){

      var food_id = $(this).data("food_id");
      var quantity = $(this).val();
      var action = "quantity_change";
      if(quantity != '')
      {
        $.ajax({
            url:"action.php",
            method:"POST",
            dataType:"json",
            data:{
              food_id:food_id,
              quantity:quantity,
              action:action
            },
            success:function(data)
            {
              $('#order_table').html(data.order_table);
            }
        });
      }

     });

	});

  var orderObj = {
    email: '<?php echo $email; ?>',
    total: '<?php echo $total; ?>',
    quantity: '<?php echo $food_quantity; ?>',
    title: '<?php echo $food_title; ?>'
    // other params you want to save
  };

 

function payWithPaystack() {

    var handler = PaystackPop.setup({ 
        key: 'pk_test_8db76374b9fb93f0e2db10787016d9c02e492429', //put your public key here
        email: orderObj.email, //put your customer's email here
        amount: '<?php echo $total; ?>', //amount the customer is supposed to pay
        metadata: {
            custom_fields: [

                {
                    display_name: "Mobile Number",
                    variable_name: "mobile_number",
                    value: "+2348012345678" //customer's mobile number
                },
                {
                    display_name: "City",
                    variable_name: "City",
                    value: "Lagos" //customer's City
                },
                {
                    display_name: "Country",
                    variable_name: "Country",
                    value: "Nigeria" //customer's Country
                },
                {
                    display_name: "Order id",
                    variable_name: "Order_id",
                    value: "Order_id" //customer's Order id
                },
                {
                    display_name: "item",
                    variable_name: "item",
                    value: "food_title" //customer's item purchase
                },
                {
                    display_name: "item",
                    variable_name: "item",
                    value: "food_quantity" //customer's item purchase
                },
                {
                    display_name: "item",
                    variable_name: "item",
                    value: "food_price" //customer's item purchase
                }


            ]
        },
        callback: function (response) {
            //after the transaction have been completed
            //make post call  to the server with to verify payment 
            //using transaction reference as post data
            $.post("verify.php", {reference:response.reference}, function(status){
                if(status == "success")
                    //successful transaction
                    alert('Transaction was successful');
                else
                    //transaction failed
                    alert(response);
            });
        },
        onClose: function () {
            //when the user close the payment modal
            alert('Transaction cancelled');
        }
    });
    handler.openIframe(); //open the paystack's payment modal
}
