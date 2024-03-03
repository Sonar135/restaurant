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

    $food="";
    $get=mysqli_query($conn, "SELECT * from item order by rand() limit 8");

    while($row=mysqli_fetch_assoc($get)){


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

    <link rel="stylesheet" href="css/main.css?v=<?php echo time();?>">
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
                    <h1>OUR BEST</h1>

                    <div class="our_best">
               
                  <?php echo $food?>
                    </div>
                </div>
        </div>


        <div class="container sec2">
            <div class="cent">
                <h1>RECOGNIZED CHEFS</h1>

                <div class="chef_container">
                    <div class="chef_card">
                        <div class="chef_img">

                        <div class="img_circle">
                            <div class="inner_cir">
                                <img src="images\360_F_635201516_G2TFpFPoFA6utXYNgFlgPJGwU24mj6CJ.jpg" alt="">
                            </div>

                         
                        </div>

                        </div>
                        <div class="name">
                                <h1>stepanie amanda</h1>
                                <h4>senior chef</h4>
                            </div>

                            <div class="chef_links">
                                <div class="cir">
                                <i class="fa-brands fa-facebook-f"></i>
                                </div>
                                <div class="cir">
                                <i class="fa-brands fa-linkedin-in"></i>
                                    </div>
                                    <div class="cir">
                                    <i class="fa-brands fa-twitter"></i>
                                    </div>
                                    <div class="cir">
                                    <i class="fa-solid fa-envelope"></i>
                                    </div>
                            </div>
                    </div>
                    <div class="chef_card">
                             <div class="chef_img">

                        <div class="img_circle">
                            <div class="inner_cir">
                                <img src="images\360_F_635201516_G2TFpFPoFA6utXYNgFlgPJGwU24mj6CJ.jpg" alt="">
                            </div>

                         
                        </div>

                        </div>
                        <div class="name">
                                <h1>stepanie amanda</h1>
                                <h4>senior chef</h4>
                            </div>

                            <div class="chef_links">
                                <div class="cir">
                                <i class="fa-brands fa-facebook-f"></i>
                                </div>
                                <div class="cir">
                                <i class="fa-brands fa-linkedin-in"></i>
                                    </div>
                                    <div class="cir">
                                    <i class="fa-brands fa-twitter"></i>
                                    </div>
                                    <div class="cir">
                                    <i class="fa-solid fa-envelope"></i>
                                    </div>
                            </div>
                        </div>
                        <div class="chef_card">
                             <div class="chef_img">

                        <div class="img_circle">
                            <div class="inner_cir">
                                <img src="images\360_F_635201516_G2TFpFPoFA6utXYNgFlgPJGwU24mj6CJ.jpg" alt="">
                            </div>

                         
                        </div>

                        </div>
                        <div class="name">
                                <h1>stepanie amanda</h1>
                                <h4>senior chef</h4>
                            </div>

                            <div class="chef_links">
                                <div class="cir">
                                <i class="fa-brands fa-facebook-f"></i>
                                </div>
                                <div class="cir">
                                <i class="fa-brands fa-linkedin-in"></i>
                                    </div>
                                    <div class="cir">
                                    <i class="fa-brands fa-twitter"></i>
                                    </div>
                                    <div class="cir">
                                    <i class="fa-solid fa-envelope"></i>
                                    </div>
                            </div>
                        </div>
                        <div class="chef_card">
                             <div class="chef_img">

                        <div class="img_circle">
                            <div class="inner_cir">
                                <img src="images\360_F_635201516_G2TFpFPoFA6utXYNgFlgPJGwU24mj6CJ.jpg" alt="">
                            </div>

                         
                        </div>

                        </div>
                        <div class="name">
                                <h1>stepanie amanda</h1>
                                <h4>senior chef</h4>
                            </div>

                            <div class="chef_links">
                                <div class="cir">
                                <i class="fa-brands fa-facebook-f"></i>
                                </div>
                                <div class="cir">
                                <i class="fa-brands fa-linkedin-in"></i>
                                    </div>
                                    <div class="cir">
                                    <i class="fa-brands fa-twitter"></i>
                                    </div>
                                    <div class="cir">
                                    <i class="fa-solid fa-envelope"></i>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="container sec3">
            <div class="cent">
                <div class="bean_cont">
                    <div class="beans">
                 
                      <h4>Weekly Best Seller</h4>
                  
                      

                        <div class="chicken">
                         <h1>   Fried Chicken</h1>
                        </div>

                        <p>Neque porro quisquam est qui dolor ipsum quia dolor sit ametsed.</p>

                        <button>get now</button>
                      
                    </div>

                    <div class="beans" id="sec">
                          <h4>Daily Offerr</h4>
                  
                      

                        <div class="chicken">
                         <h1> Hyderabadi Biryani</h1>
                        </div>

                        <p>Neque porro quisquam est qui dolor ipsum quia dolor sit ametsed.</p>

                        <button>get now</button>
                      
                        </div>
                </div>
            </div>
        </div>
</body>
</html>