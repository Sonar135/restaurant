<?php
    include "header.php";



    if(isset($_GET["carted"])){
        echo '  <div class="message" id="message">
        added to cart
    </div>';
    }
    
    if(isset($_GET["in_cart"])){
        echo '  <div class="message" id="message">
        already in cart
    </div>';
    }
    
    
    if(isset($_GET["wished"])){
        echo '  <div class="message" id="message">
        added to wishlist
    </div>';
    }
    
    if(isset($_GET["in_wish"])){
        echo '  <div class="message" id="message">
        already in wishlist
    </div>';
    }
?>



<?php
    $food="";

    if(isset($_GET["category"])){
        $category=$_GET["category"];
    }


    $query=mysqli_query($conn, "SELECT * from item where category='$category'");

    while($row=mysqli_fetch_assoc($query)){
        $name=$row["name"];
        $image=$row["image"];
        $seller=$row["seller"];
        $price=$row["price"];
        $category=$row["category"];
        $id=$row["id"];
        






        $food.= '   <div class="best_card">

        <div class="card_seller">
        '.$seller.'
        </div>
        <div class="food_img">
            <img src="./food_pictures/'.$image.'" alt="">
        </div>

        <div class="name">
            <h4>'.$name.'</h4>
        </div>

        <div class="star_array">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        </div>

        <div class="name">
            <h4>₦'.$price.'</h4>
        </div>

        <div class="actions">
          <a href="add_cart.php?id='.$id.'&category='.$category.'" class=""> <div class="ico"><i class="fa-solid fa-cart-shopping"></i></div></a>
           <a href="add_wish.php?id='.$id.'&category='.$category.'" class=""> <div class="ico"><i class="fa-solid fa-heart"></i></div></a>
            <a href="desc.php?id='.$id.'#lock"><div class="ico"><i class="fa-solid fa-eye"></i></div></a> 
        </div>
    </div>';
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/menu.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="bg_container">
            <div class="overlay">

            </div>
        </div>


        <div class="container sec1">
            <div class="cent">
                <h1><?php echo $category?> dishes</h1>

                <div class="our_best" id="lock">
                           <?php echo $food?>
                       
                </div>
          
            </div>
        </div>

</body>
</html>