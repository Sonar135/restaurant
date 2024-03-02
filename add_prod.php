<?php
    include "header.php";
?>



<?php
    if(isset($_POST["submit"])){
        $name=htmlentities($_POST["name"]);
        $desc=htmlentities($_POST["desc"]);
        $category=htmlentities($_POST["category"]);
        $quantity=$_POST["quantity"];
        $price=$_POST["price"];

        $picture=$_FILES["image"]['name'];
        $temp_img=$_FILES['image']['tmp_name'];

        if($name=="" or $desc=="" or $quantity=="" or $price=="" or $picture==""){
            echo '  <div class="message" id="message">
          please fill required fields
        </div>';
        }

        else{
            move_uploaded_file($temp_img, "./food_pictures/$picture");


            $insert=mysqli_query($conn, "INSERT into item (name, price, quantity, image, description, category, seller) 
            values('$name', '$price', '$quantity', '$picture', '$desc', '$category', '$res_id')");

            if($insert){
                echo '  <div class="message" id="message">
               submitted
              </div>';
            }
        }


   
    }
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

           <form action="" method="post" id="lock"   enctype="multipart/form-data">  <div class="right">
                    <h1>Add Food</h1>

                    <div class="n_e">
                        <input type="text" placeholder="name" name="name">
                        <input type="number" placeholder="price" name="price">
                    </div>

                    <div class="n_e">

                        <div class="select">
                           <span id="selected"> select category (optional)</span>

                            <div class="selections">
                                <ul>
                                    <li id="list">intercontinental </li>
                                     
                                  
                                    <li id="list">local</li>
                                     
                                     
                                       <li id="list">fast foods </li>
                                      
                                     
                                       <li id="list">drinks</li>
                                       <li id="list">pastries </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <input type="text" placeholder="" name="category"  id="myInput" hidden >

                        <label for="image" class="label">
                            image
                        </label>
                        <input type="file" accept="image/*" name="image" hidden id="image">
                    </div>

                  

                    <div class="n_e">
                        <input type="number" placeholder="quantity" name="quantity">
                    </div>

               
                        <textarea name="desc" id="" cols="30" rows="10" placeholder="item description"></textarea>
                 

                    <button name="submit">submit</button>
                </div></form>  
            </div>



  
        </div>
</body>
</html>