<?php
        ob_start();
        session_start();
        include 'connect.php';
        if(isset($_SESSION["id"])){
          $email=$_SESSION['email'];
          $user_type=$_SESSION['user_type'];
    
           if($user_type=="restaurant"){
               $res_id=$_SESSION["name"];
           }
        
        }


        if(isset($_GET["id"])){
            $id=$_GET["id"];
        }


        if(isset($_GET["cart"])){
            $get_cart=mysqli_query($conn, "SELECT * from cart where food_id='$id' and buyer='$email'");

            $cart_quantity=mysqli_fetch_assoc($get_cart)["quantity"];

            $get_stock=mysqli_query($conn, "SELECT * from item where id='$id'");

            $stock=mysqli_fetch_assoc($get_stock)["quantity"];

            $delete=mysqli_query($conn, "DELETE from cart where food_id='$id' and buyer='$email' ");

            if($delete){
                $new_stock=$stock+$cart_quantity;
                $update_stock=mysqli_query($conn, "UPDATE item set quantity='$new_stock' where id='$id'");

                header("location: cart.php#lock");
            }
        }




        
        if(isset($_GET["wish"])){

   
            $delete=mysqli_query($conn, "DELETE from wishlist where food_id='$id' and buyer='$email' ");

            if($delete){
     
                header("location: wishlist.php#lock");
            }
        }




?>