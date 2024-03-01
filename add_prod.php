<?php
    include "header.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/add.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="bg_container">
            <div class="overlay">

            </div>
        </div>



        <div class="container auth">
            <div class="cent signup">
                <div class="left" id="super">
                    <div class="overlay">

                    </div>
                </div>

           <form action="" method="post">  <div class="right">
                    <h1>Add Food</h1>

                    <div class="n_e">
                        <input type="text" placeholder="name" name="name">
                        <input type="number" placeholder="price" name="email">
                    </div>

                    <div class="n_e">

                        <div class="select">
                            select category
                        </div>
                        <input type="text" placeholder="" name="category" hidden>

                        <label for="image">
                            image
                        </label>
                        <input type="file" accept="image/*" name="conpass" hidden id="image">
                    </div>

                  

                    <div class="n_e">
                        <input type="number" placeholder="quantity" name="quantity">
                    </div>

               
                        <textarea name="" id="" cols="30" rows="10" placeholder="item description"></textarea>
                 

                    <button name="signup">submit</button>
                </div></form>  
            </div>



  
        </div>
</body>
</html>