<?php
    include "header.php";
?>



<?php

    $query=mysqli_query($conn, "SELECT * from users where email='$email'");

    $row=mysqli_fetch_assoc($query);

    $name=$row["name"];
    $address=$row["address"];
    $phone=$row["phone"];


  
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
                <button>
                Edit
            </button>
            </div>

            
        </div>
</body>
</html>