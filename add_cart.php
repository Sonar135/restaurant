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

    if(isset($_GET["category"])){
        $category=$_GET["category"];
    }

    if(isset($_GET["q"])){
        $search=$_GET["q"];
    }

    $get=mysqli_query($conn, "SELECT * from item where id='$id'");

    while($row=mysqli_fetch_assoc($get)){


        $name=$row["name"];
        $image=$row["image"];
        $seller=$row["seller"];
        $price=$row["price"];
        $category=$row["category"];
        $id=$row["id"];
        $in_stock=$row["quantity"];
        $quantity=1;
        $total=$quantity*$price;
    }

    $get_cart=mysqli_query($conn, "SELECT * from cart where buyer='$email' and food_id='$id'");

    if(mysqli_num_rows($get_cart)>0){
        if(isset($_GET["category"])){
            header("location: menu.php?in_cart&category=$category#lock");
        }
        else  if(isset($_GET["q"])){
            header("location: search.php?in_cart&q=$search#lock");
        }

        else{
            header("location: main.php?in_cart");
        }
      
    }

    else{
        $insert=mysqli_query($conn, "INSERT INTO cart (name, price, quantity, total, image, seller, buyer, food_id)
        values('$name', '$price', '$quantity', '$total', '$image', '$seller', '$email', '$id')");

        if($insert){
            $new_stock=$in_stock-$quantity;

            $update=mysqli_query($conn, "UPDATE item set quantity='$new_stock' where id='$id' ");

            if(isset($_GET["category"])){
                header("location: menu.php?carted&category=$category#lock");
            }

          else  if(isset($_GET["q"])){
                header("location: search.php?carted&q=$search#lock");
            }

            else{
                header("location: main.php?carted");
            }

      
            
        }
    }
?>