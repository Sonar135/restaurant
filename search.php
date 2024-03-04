<?php
    include "header.php";
?>


<?php
    if(isset($_GET["search"])){
        $search=$_GET["search"];
    }


    $food="";

    $query=mysqli_query($conn, "SELECT * from item where category='$search' or name='$search' or seller='$search'");


    while($row=mysqli_fetch_assoc($query)){
        
        $name=$row["name"];
        $image=$row["image"];
        $seller=$row["seller"];
        $price=$row["price"];
        $category=$row["category"];
        $id=$row["id"];
        






        $food.= '        <div class="best_card">

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
           <a href="add_wish.php?id='.$id.'" class=""> <div class="ico"><i class="fa-solid fa-heart"></i></div></a>
            <a href="desc.php?id='.$id.'#lock"><div class="ico"><i class="fa-solid fa-eye"></i></div></a> 
        </div>
    </div>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/search.css?v=<?php echo time();?>">
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
      <?php echo $food?>
            </div>
        </div>

</body>
</html>