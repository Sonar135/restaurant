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
            $seller=$cart_products['seller'];
    //         // echo $product_name;
    //         echo '<br>';
            $productID=$cart_products['id'];
            $image=$cart_products['image'];
            $price=$cart_products['price'];
    //         // echo 'product id: '.$productID.' ';
    //         echo '<br>';
            $quantity= $cart_products['quantity'];
    //         // echo 'quantity: '.$cart_quantity.'';
            $total=array($cart_products["price"]);
             $sum=array_sum($total);
            $total_cost+=$sum*$row['quantity'];
            echo '<br>';

            
            // echo  'invoice: '.$invoice.'';
            // echo '<br>'; 
            // echo  'email: '.$email.'';
            echo '<br>';

   
          //  if($insert_order){

          //   $new_sold_value=$sold+$cart_quantity;
          //   mysqli_query($conn, "UPDATE products set sold=$new_sold_value where productID=$product_id");
          //  }
        

          }
          $status='pending confirmation';
          $insert_order= mysqli_query($conn, "INSERT into orders ( buyer, name, price, food_id, quantity, seller, image, date, status) values ('$email', '$product_name', '$price', '$product_id', $cart_quantity, '$seller', '$image', NOW(), '$status') ");
            
          if($insert_order){
            //   echo 'order placed';
              mysqli_query($conn, "DELETE from cart where buyer='$email'");
              header("location: orders.php?payment_successful");
          }
      }
      
      // $insert_query=mysqli_query($conn, "INSERT into orders (user, amount_due, invoice_number, total_products, order_date, order_status) values ('$email', '$total_cost', '$invoice', '$count', NOW(), 'success')");



  
    ?>