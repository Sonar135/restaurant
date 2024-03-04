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

                <?php
                       if(isset($_SESSION["id"])){
                        
                        if($user_type=="user"){
                            echo '
                            <a href="main.php">Home</a>
                            <li id="menu">menu
        
                            <div class="menu_cont">
                            <div class="ne">
                                <a href="menu.php?category=international">intercontinental</a>
                                <a href="menu.php?category=local">Local</a>
                            </div>
        
                            <div class="ne">
                                <a href="menu.php?category=fast foods">Fast Foods</a>
                                <a href="menu.php?category=drinks">Drinks</a>
                            </div>
        
                            <div class="ne">
                                <a href="menu.php?category=pastries">Pastries</a>
                                <a href="menu.php?category=""">other</a>
                            </div>
                            </div>
                            </li>


                            <li id="you">you

                            <div class="user_cont">
                              <div class="ne">
                                  <a href="account.php">account</a>
                                  <a href="wishlist.php">wishlist</a>
                              </div>
          
                              <div class="ne">
                                  <a href="orders.php">orders</a>
                                  <a href="logout.php">logout</a>
                              </div>
                            </div>
                            </li>

                            <a href="search.php">Search</a>
                            ';
                        }


                        if($user_type=="restaurant"){
                            echo '
                            <a href="stock.php">My Stock</a>
                            <a href="add_prod.php#lock">Add Product</a>
                            <a href="logout.php">logout</a>
                            ';
                        }
                 
                         
                      
                      }


                      else{
                        echo  '<a href="reg.php">login/register</a>';
                      }
                ?>
              

                  

              
                  
                </ul>
                </div>

                <div class="cart">

                <?php
                       if(isset($_SESSION["id"])){
                        
                 
                        if($user_type=="user"){
                            echo ' <a href="cart.php#lock"> <i class="fa-solid fa-cart-shopping"></i></a>  ';
                        }

                        if($user_type=="restaurant"){
                            echo ' <a href="user_orders.php"> <i class="fa-solid fa-cart-shopping"></i></a>  ';
                        }
                      
                      }
                ?>
            
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