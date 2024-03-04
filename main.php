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
    $red="";
    $get=mysqli_query($conn, "SELECT * from item order by rand() limit 8");

    while($row=mysqli_fetch_assoc($get)){


        $name=$row["name"];
        $image=$row["image"];
        $seller=$row["seller"];
        $price=$row["price"];
        $category=$row["category"];
        $id=$row["id"];


        if($seller!="kfc"){
            $red=" ";
        }

        else{
            $red="red";
        }
        






        $food.= '        <div class="best_card">

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
                    <div class="cent">
                        <h1>CHOWDOWN</h1>
                        <h1>THE PLACE FOR THE RIGHT KINDS OF FOOD</h1>
                    </div>
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
                                <img src="images\xcwedo.jpg" alt="">
                            </div>

                         
                        </div>

                        </div>
                        <div class="name">
                                <h1>victoria lolade</h1>
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
                                <img src="images\african-american-male-chef-preparing-food-professional-kitchen_94255-8924.jpg" alt="">
                            </div>

                         
                        </div>

                        </div>
                        <div class="name">
                                <h1>fortune isaiah</h1>
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
                                <img src="images\360_F_653798800_xuzX9Fnek006G2EacJhgmoZOJ0w9c4YD.jpg" alt="">
                            </div>

                         
                        </div>

                        </div>
                        <div class="name">
                                <h1>gbolahan shokoya</h1>
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