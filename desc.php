<?php
    include "header.php";
?>


<?php

    if(isset($_GET["id"])){
        $id=$_GET["id"];
    }


    $food="";
    $get=mysqli_query($conn, "SELECT * from item where id='$id' order by rand() limit 8");

    while($row=mysqli_fetch_assoc($get)){


        $name=$row["name"];
        $image=$row["image"];
        $seller=$row["seller"];
        $price=$row["price"];
        $category=$row["category"];
        $id=$row["id"];
        $desc=$row["description"];
        






        $food.= '         <div class="desc_img">
        <img src="./food_pictures/'.$image.'" alt="">
    </div>

    <div class="right">
        <h3> '.$name.'</h3>

        <h4>₦'.$price.'.00</h4>

        <div class="star_array">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                </div>

                <p>'.$desc.'.</p>


                <h4>Select Quantity</h4>

              <form action=""> <div class="select">
                    <div class="minus">
                    <i class="fa-solid fa-minus"></i>
                    </div>

                    <input type="text" readonly value="1">

                    <div class="plus">
                    <i class="fa-solid fa-plus"></i>
                    </div>
                </div>


                <button> Cart</button>
                <button> Wishlist</button>
                </form> 

            </div>';
    }
?>



<?php
    $related="";
    $get_related=mysqli_query($conn, "SELECT * from item where category like '%$category%' order by rand() limit 4'");


    while($row=mysqli_fetch_assoc($get_related)){


        $name=$row["name"];
        $image=$row["image"];
        $seller=$row["seller"];
        $price=$row["price"];
        $category=$row["category"];
        $id=$row["id"];
        






        $related.= '        <div class="best_card">

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
          <a href="add_cart.php?id='.$id.'" class=""> <div class="ico"><i class="fa-solid fa-cart-shopping"></i></div></a>
            <div class="ico"><i class="fa-solid fa-heart"></i></div>
            <a href="desc.php?id='.$id.'#lock"><div class="ico"><i class="fa-solid fa-eye"></i></div></a> 
        </div>
    </div>';
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/desc.css?v=<?php echo time()?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="bg_container">
            <div class="overlay">

            </div>
        </div>


        <div class="container sec1" id="lock">
            <div class="cent" >
       
                <?php echo $food?>
                
            </div>
        </div>


        <div class="container sec2">
            <div class="cent">
                <h1>related Items</h1>

                <div class="our_best">
                   <?php echo $related?>
                </div>
            </div>
        </div>

</body>
</html>