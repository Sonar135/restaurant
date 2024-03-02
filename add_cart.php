<?php
    include 'connect.php';

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

    $get_cart=mysqli_query($conn, "SELECT * from cart where buyer='$email' and food_id='$id'");

    if(mysqli_num_rows($get_cart)>0){
        header("location: main.php?in_cart");
    }

    else{
        $insert=mysqli_query($conn, "INSERT INTO cart (name, price, quantity, total, image, seller, buyer, food_id)
        values('$name', '$price', '$quantity', '$total', '$image', '$seller', '$email', '$id')");

        if($insert){
            $new_stock=$in_stock-$quantity;

            $update=mysqli_query($conn, "UPDATE item set quantity='$new_stock' where id='$id' ");

        header("location: main.php?carted");
            
        }
    }
?>