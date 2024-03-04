<?php
    include "header.php";
?>



<?php

if(isset($_GET["update"])){
    echo '  <div class="message" id="message">
    please update your address
</div>';
}


if(isset($_GET["updated"])){
    echo '  <div class="message" id="message">
  updated successfully
</div>';
}

    $query=mysqli_query($conn, "SELECT * from users where email='$email'");

    $row=mysqli_fetch_assoc($query);

    $name=$row["name"];
    $address=$row["address"];
    $phone=$row["phone"];



    if(isset($_POST["edit"])){
        $new_name=$_POST["name"];
        $new_email=$_POST["email"];
        $new_phone=$_POST["phone"];
        $new_address=htmlentities($_POST["address"]);

        $check=mysqli_query($conn, "SELECT * from users where email!='$email' and email='$new_email'");

        

        if($new_address=="" or $new_email=="" or $new_phone=="" or $new_name==""){
            echo '  <div class="message" id="message">
           please fill all fields
        </div>';
        }

        else if(mysqli_num_rows($check)>0){
            echo '  <div class="message" id="message">
            email already in use
         </div>';
        }


        else{
            $update=mysqli_query($conn, "UPDATE users set name='$new_name', phone='$new_phone', email='$new_email', address='$new_address' where email='$email'");
            $update_cart=mysqli_query($conn, "UPDATE cart set buyer='$new_email' where buyer='$email' ");
            $update_wish=mysqli_query($conn, "UPDATE wishlist set buyer='$new_email' where buyer='$email' ");
            $update_orders=mysqli_query($conn, "UPDATE orders set buyer='$new_email' where buyer='$email' ");


            if($update){
                header("location: account.php?updated");
            }
        }
    }


  
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="css/account.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="edit_overlay">
    <div class="container edit">
        <div class="cent">


        <div class="form_cont">
                <div class="exit">
                <i class="fa-solid fa-xmark"></i>
                </div>
                <h1>Edit Profile</h1>

              <form action="" method="post" enctype="multipart/form-data"> <div class="input">
                    <input type="text" value="<?php echo $name?>" name="name" placeholder="Full name">
                    <input type="email" value="<?php echo $email?>" name="email" placeholder="email" readonly>
                </div>

                <div class="input">
                    <input type="text" value="<?php echo $address?>" name="address" placeholder="address">
                    <input type="text" value="<?php echo $phone?>" name="phone" placeholder="phone number">
                </div>

              

                <button name="edit">submit</button></form> 
            </div>

         


        </div>
    </div>
</div>
<div class="bg_container">
            <div class="overlay">

            </div>
        </div>


        <div class="container sec1">
            <div class="cent">
                <div class="acct_box">
                    <div class="profile_i">
                        <div class="i_cont">
                        <i class="fa-solid fa-user"></i>
                        </div>
                    </div>

                    <div class="ne">
                        <h3>Name:</h3>
                        <h3><?php echo $name?></h3>
                    </div>

                    <div class="ne">
                        <h3>Email:</h3>
                        <h3><?php echo $email?></h3>
                    </div>

                    <div class="ne">
                        <h3>Address:</h3>
                        <h3><?php echo $address?></h3>
                    </div>

                    <div class="ne">
                        <h3>Phone:</h3>
                        <h3><?php echo $phone?></h3>
                    </div>
                </div>
                <button id="toggle">
                Edit
            </button>
            </div>

            
        </div>
</body>
</html>