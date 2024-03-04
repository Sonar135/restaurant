<?php
    include 'connect.php';
    include 'header.php';

 
    if(isset($_GET['user'])){
        $user=$_GET['user'];
    }
        // echo $user;
        $invoice=mt_rand();
        
        $total_cost=0;

        $email=$_SESSION["email"];


        $query2=mysqli_query($conn, "SELECT * from users where email='$email'");
        while($row2=mysqli_fetch_assoc($query2)){
            if($row2['phone']=='' or $row2['address']==''){
                header('location: account.php?update');
            }

        }
     


      $query=mysqli_query($conn, "SELECT * from cart where buyer='$email'");
      $count=mysqli_num_rows($query);
      while($row=mysqli_fetch_assoc($query)){
          $product_id=$row["food_id"];
          $cart_quantity=$row["quantity"];
         
          $price_query=mysqli_query($conn, "SELECT * from item where id='$product_id'");
  
          while($cart_products=mysqli_fetch_assoc($price_query)){
          

    //         // echo '<img src="./admin/product_images/'.$cart_products['image'].'">';
    //         echo '<br>';
            $product_name=$cart_products['name'];
    //         // echo $product_name;
    //         echo '<br>';
            $productID=$cart_products['id'];
    //         // echo 'product id: '.$productID.' ';
    //         echo '<br>';
            $quantity= $cart_products['quantity'];
    //         // echo 'quantity: '.$cart_quantity.'';
            $total=array($cart_products["price"]);
             $sum=array_sum($total);
            $total_cost+=$sum*$row['quantity'];
    //         echo '<br>';

            
    //         // echo  'invoice: '.$invoice.'';
    //         // echo '<br>'; 
    //         // echo  'email: '.$email.'';
    //         echo '<br>';

    //        $insert_order= mysqli_query($conn, "INSERT into order_details (invoice_number, user, product, product_id, quantity) values ('$invoice', '$email', '$product_name', '$product_id', $cart_quantity)");
            
    //        if($insert_order){

    //         $new_sold_value=$sold+$cart_quantity;
    //         mysqli_query($conn, "UPDATE products set sold=$new_sold_value where productID=$product_id");
    //        }
        

          }

      
      }
    //   $insert_query=mysqli_query($conn, "INSERT into orders (user, amount_due, invoice_number, total_products, order_date, order_status) values ('$email', '$total_cost', '$invoice', '$count', NOW(), 'success')");
    //   if($insert_query){
    //     //   echo 'order placed';
    //       mysqli_query($conn, "DELETE from cart where email='$email'");
    //       echo '<script>window.open("cart.php", "_self")</script>';
    //   }

  
    ?>


<script src="https://js.paystack.co/v2/inline.js">
    import PaystackPop from '@paystack/inline-js';
</script>






    <script>

        function payWithPaystack(){
            const paystack= new PaystackPop();
            paystack.newTransaction({
                key:"pk_test_f24842eaf14e3ed903b0c70e34d6831345b21fa0",
                    email: '<?php echo $email; ?>',
                    amount:'<?php echo $total_cost; ?>00 ',
                    currency:"NGN",
                    ref:''+Math.floor((Math.random() * 1000000) +1),


                    metadata: {
                        custom_fields: [

                            {
                                display_name: "mobile number",
                            variable_name: "mobile number",
                            value: "08109495127",
                            }
                           
                        ]
                    },

                    callback: function (response){
                        window.location.href='success.php?successfullypaid=<?php echo $email; ?>'
                    },

                    onClose: function (){
                        
                    }
            })

                

               
            
        }

        payWithPaystack()

    </script>