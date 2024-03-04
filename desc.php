<?php
    include "header.php";
?>



<?php

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

if(isset($_GET["greater"])){
    echo '  <div class="message" id="message">
   demand exceeds stock
</div>';
}
?>

<?php

    if(isset($_GET["id"])){
        $id=$_GET["id"];
    }


    $food="";
    $get=mysqli_query($conn, "SELECT * from item where id='$id' ");

    while($row=mysqli_fetch_assoc($get)){


        $name=$row["name"];
        $image=$row["image"];
        $seller=$row["seller"];
        $price=$row["price"];
        $category=$row["category"];
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

              <form action="" method="post"> <div class="select">
                    <div class="minus">
                    <i class="fa-solid fa-minus"></i>
                    </div>

                    <input type="text" readonly value="1" name="quantity" id="value">

                    <div class="plus">
                    <i class="fa-solid fa-plus"></i>
                    </div>
                </div>


                <button name="cart"> Cart</button>
                <button name="wish"> Wishlist</button>
                </form> 

            </div>';
    }
?>



<?php
    $related="";
    $get_related=mysqli_query($conn, "SELECT * from item where category='$category' order by rand() limit 4");


    while($row=mysqli_fetch_assoc($get_related)){


        $name=$row["name"];
        $image=$row["image"];
        $seller=$row["seller"];
        $price=$row["price"];
        $category=$row["category"];
        $rel_id=$row["id"];


        if($seller!="kfc"){
            $red=" ";
        }

        else{
            $red="red";
        }
        






        $related.= '        <div class="best_card">

        <div class="card_seller" id="'.$red.'">
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
          <a href="add_cart.php?id='.$rel_id.'" class=""> <div class="ico"><i class="fa-solid fa-cart-shopping"></i></div></a>
            <div class="ico"><i class="fa-solid fa-heart"></i></div>
            <a href="desc.php?id='.$rel_id.'#lock"><div class="ico"><i class="fa-solid fa-eye"></i></div></a> 
        </div>
    </div>';
    }


?>




<?php
    if(isset($_POST["cart"])){
        $quantity=$_POST["quantity"];

        $get_item=mysqli_query($conn, "SELECT * from item where id='$id'");

        while($row=mysqli_fetch_assoc($get_item)){
    
    
            $name=$row["name"];
            $image=$row["image"];
            $seller=$row["seller"];
            $price=$row["price"];
            $category=$row["category"];
            $id=$row["id"];
            $in_stock=$row["quantity"];
            $total=$quantity*$price;

            
        }
    
        $get_cart=mysqli_query($conn, "SELECT * from cart where buyer='$email' and food_id='$id'");
    
        if(mysqli_num_rows($get_cart)>0){
            header("location: desc.php?id=$id&in_cart#lock");
        }

       else if($quantity>$in_stock){
            header("location: desc.php?id=$id&greater#lock");
        }
    
        else{
            $insert=mysqli_query($conn, "INSERT INTO cart (name, price, quantity, total, image, seller, buyer, food_id)
            values('$name', '$price', '$quantity', '$total', '$image', '$seller', '$email', '$id')");
    
            if($insert){
                $new_stock=$in_stock-$quantity;
    
                $update=mysqli_query($conn, "UPDATE item set quantity='$new_stock' where id='$id' ");
    
                header("location: desc.php?id=$id&carted#lock");

                
            }
        }
    }






    if(isset($_POST["wish"])){
        $get=mysqli_query($conn, "SELECT * from item where id='$id'");

        while($row=mysqli_fetch_assoc($get)){
    
    
            $name=$row["name"];
            $image=$row["image"];
            $seller=$row["seller"];
            $price=$row["price"];
            $category=$row["category"];
            $id=$row["id"];
           
     
        }
    
        $get_wish=mysqli_query($conn, "SELECT * from wishlist where buyer='$email' and food_id='$id'");
    
        if(mysqli_num_rows($get_wish)>0){
            header("location: desc.php?id=$id&in_wish#lock");
        }
    
        else{
            $insert=mysqli_query($conn, "INSERT INTO wishlist (name, price, image,  buyer, food_id)
            values('$name', '$price',  '$image', '$email', '$id')");
    
            if($insert){
          
    
                header("location: desc.php?id=$id&wished#lock");
                
            }
        }
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
            <div class="cent">
                        <h1>DESCRIPTION</h1>
                   
                    </div>
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


        <footer>
            <div class="cent">
                <div class="anchor">
                    <div class="foot_cont">
                    <div class="cont_box">
                            <div class="ico_base">
                            <i class="fa-solid fa-location-dot"></i>
                            </div>

                            <div class="the_text">
                                <h3>ADDRESS</h3>
                                <h4>Babcock University</h4>
                            </div>
                            </div>
                    </div>

                    <div class="foot_cont">
                    <div class="cont_box">
                            <div class="ico_base">
                            <i class="fa-solid fa-phone"></i>
                            </div>

                            <div class="the_text">
                                <h3>PHONE</h3>
                                <h4>08109495127</h4>
                            </div>
                            </div>
                        </div>

                        <div class="foot_cont">
                        <div class="cont_box">
                            <div class="ico_base">
                            <i class="fa-solid fa-envelope"></i>
                            </div>

                            <div class="the_text">
                                <h3>EMAIL</h3>
                                <h4>vefidi135@gmail.com</h4>
                            </div>
                            </div>
                        </div>
                </div>
                <div class="fot">
                    <div class="fot_card">
                        <h3>CHOWDOWN THEME</h3>

                        <p>Tincidunt elit magnis nulla facilisis. Dolor sagittis maecenas. Sapien nunc amet ultrices, dolores sit ipsum velit purus aliquet, massa fringilla leo orci.</p>
                    </div>

                    <div class="fot_card">
                        <h3>SERVICES</h3>

                        <p>Tincidunt elit magnis nulla facilisis. Dolor sagittis maecenas. Sapien nunc amet ultrices, dolores sit ipsum velit purus aliquet, massa fringilla leo orci.</p>
                        </div>

                        <div class="fot_card">
                        <H3>ADDITIONAL LINKS</H3>

                        <p>Tincidunt elit magnis nulla facilisis. Dolor sagittis maecenas. Sapien nunc amet ultrices, dolores sit ipsum velit purus aliquet, massa fringilla leo orci.</p>
                        </div>

                       
                </div>
            </div>


      
        </footer>

</body>
</html>