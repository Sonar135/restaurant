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
    }

    $get_cart=mysqli_query($conn, "SELECT * from wishlist where buyer='$email' and food_id='$id'");

    if(mysqli_num_rows($get_cart)>0){
        header("location: main.php?in_wish");
    }

    else{
        $insert=mysqli_query($conn, "INSERT INTO wishlist (name, price, image,  buyer, food_id)
        values('$name', '$price',  '$image', '$email', '$id')");

        if($insert){
      

        header("location: main.php?wished");
            
        }
    }
?>