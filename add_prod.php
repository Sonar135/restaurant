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

        $picture=htmlentities($_FILES["image"]['name']) ;
        $temp_img=htmlentities($_FILES['image']['tmp_name']);

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
            <div class="cent">
                        <h1>ADD PRODUCT</h1>
                     
                    </div>
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

               
                        <textarea name="desc" id="" cols="30" rows="10" placeholder="item description">food</textarea>
                 

                    <button name="submit">submit</button>
                </div></form>  
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