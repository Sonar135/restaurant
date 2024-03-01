<?php
    include "connect.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/header.css?v=<?php echo time();?>">
    <script src="https://kit.fontawesome.com/b782cf5553.js" crossorigin="anonymous"></script>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChowDown</title>
</head>
<body>
<div class="nav">
            <div class="cent">

            <div class="hanging_menu">
                <div class="hanging_links">
                <ul>
                    <a href="main.php">Home</a>
                    <li id="menu">menu

                    <div class="menu_cont">
                    <div class="ne">
                        <a href="menu.php">intercontinental</a>
                        <a href="">Local</a>
                    </div>

                    <div class="ne">
                        <a href="">Fast Food</a>
                        <a href="">Drinks</a>
                    </div>

                    <div class="ne">
                        <a href="">Pastries</a>
                        <a href="">other</a>
                    </div>
                    </div>
                    </li>

                    <a href="search.php">Search</a>

                  <li id="you">you

                  <div class="user_cont">
                    <div class="ne">
                        <a href="account.php">account</a>
                        <a href="wishlist.php">wishlist</a>
                    </div>

                    <div class="ne">
                        <a href="orders.php">orders</a>
                        <a href="">logout</a>
                    </div>
                  </div>
                  </li>
                  
                </ul>
                </div>

                <div class="cart">
             <a href="cart.php"> <i class="fa-solid fa-cart-shopping"></i></a>  
                </div>
            </div>
                <div class="logo">

                </div>

                

                <div class="menu">
                    <div class="contact">
                        <div class="icon">

                        </div>

                        <div class="text">
                            <h4>267 Park Avenue</h4>
                            <h4>New York, NY 90210</h4>
                        </div>
                    </div>

                    <div class="contact">
                         <div class="icon">

                        </div>

                        <div class="text">
                            <h4>1-800-1234-567</h4>
                            <h4>Mon – Sat: 9:00–18:00</h4>
                        </div>
                        </div>

                        <div class="contact">
                           <div class="icon">

                        </div>

                        <div class="text">
                            <h4>267 Park Avenue</h4>
                            <h4>New York, NY 90210</h4>
                        </div>
                        </div>
                </div>
            </div>
        </div>


     


      
</body>
<script src="js/min.js"></script>
<script src="js/dom.js"></script>
</html>