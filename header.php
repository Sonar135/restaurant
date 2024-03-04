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



     if(isset($_POST["search"])){
        $search=$_POST["data"];

        header("location: search.php?q=$search");
        
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

<div class="loader">
  <img src="images\orange_loading-removebg-preview.png" alt="">
</div>

<form action="" method="post"> <div class="search_cont">
 <div class="cent">
       <div class="search_input">
            <input type="text" name="data" placeholder="search" id="my_input"> 
            <button name="search" id="my_btn">
            <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </div>
</div></form>
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

                           <li class="search_btn">search</li>
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
                            echo ' <a href="cart.php"> <i class="fa-solid fa-cart-shopping"></i></a>  ';
                        }

                        if($user_type=="restaurant"){
                            echo ' <a href="res_orders.php"> <i class="fa-solid fa-cart-shopping"></i></a>  ';
                        }
                      
                      }
                ?>
            
                </div>
            </div>
                <div class="logo">
                        <h1>CHOWDOWN</h1>
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

<script>
      $(window).on("load", ()=>{
    $(".loader").fadeOut("slow")
    $("body").css("overflow-y", "scroll");
  });
</script>
</html>