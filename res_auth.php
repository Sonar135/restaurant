<?php
    include 'header.php';
?>




<?php
 
    include 'functions.php';

    if(isset($_GET['error'])){
        if($_GET['error']=='emptyfield'){
            echo '  <div class="message" id="message">
            please fill all fields
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='pwd_not_match'){
            echo '  <div class="message" id="message">
            passwords do not match
        </div>';
        }
    }


    if(isset($_GET['error'])){
        if($_GET['error']=='invalid_pass'){
            echo '  <div class="message" id="message">
          password too weak
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='email_in_use'){
            echo '  <div class="message" id="message">
            restaurant already exixts
        </div>';
        }
    }


    if(isset($_GET['error'])){
        if($_GET['error']=='matric_in_use'){
            echo '  <div class="message" id="message">
            account with matric number already exist
        </div>';
        }
    }


    

    if(isset($_GET['error'])){
        if($_GET['error']=='success'){
            echo '  <div class="message" id="message">
            account created
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='invalidemail'){
            echo '  <div class="message" id="message">
            please enter a valid email
        </div>';
        }
    }

    if(isset($_POST['signup'])){
        $email=$_POST['email'];
        $fname=$_POST['name'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $confirm=$_POST['conpass'];



     
        

    

        if(empty_res_signup($email, $fname, $phone, $password, $confirm )!== false){
            
            
            header("location: res_auth.php?error=emptyfield");
            exit();
 
        }

        if(invalid_email($email)!== false){
            header("location: res_auth.php?error=invalidemail");
        //     echo '<div class="message" id="message">
        //     error: INVALID EMAIL
        // </div>';
        exit();
        }

        if(pwd_match($password, $confirm)!== false){
      
            header("location: res_auth.php?error=pwd_not_match");
            exit();
        }

        if (invalid_password($password)) {
            header("location: res_auth.php?error=invalid_pass");
            exit();
 
        }

        if(rest_exists($conn, $fname)!== false){
            header("location: res_auth.php?error=email_in_use");
      
            exit();
        }


     

        create_restaurant($conn, $email, $fname,  $phone, $password, $confirm );
    
        
    }
?>


<?php
    if(isset($_POST['login'])){
        $name=$_POST['name'];
        $password=$_POST['password'];



        

    if(empty_res_login($name, $password)){
        header("location: res_auth.php?error=empty_login");
        exit();
    }

    res_login($conn, $name, $password);
    }


    if(isset($_GET['error'])){
        if($_GET['error']=='wrongLogin'){
            echo '  <div class="message" id="message">
           restaurant or password incorrect
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='empty_login'){
            echo '  <div class="message" id="message">
            enter username and password
        </div>';
        }
    }

    
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/auth.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="hero">
    <div class="bg_container">
            <div class="overlay">
            <div class="cent">
                        <h1>SIGN IN AS RESTAURANT</h1>
                   
                    </div>
            </div>
        </div>


        <div class="container auth">
            <div class="cent signup">
                <div class="left" id="super">
                    <div class="overlay">

                    </div>
                </div>

           <form action="" method="post">  <div class="right">
                    <h1>Register Restaurant</h1>

                    <div class="n_e">
                        <input type="text" placeholder="restaurant name" name="name">
                        <input type="email" placeholder="Email" name="email">
                    </div>

                    <div class="n_e">
                        <input type="text" placeholder="Phone no" name="phone" id="sup_phone">
                    </div>

                  

                    <div class="n_e">
                        <input type="password" placeholder="password" name="password">
                        <input type="password" placeholder="confirm password" name="conpass">
                    </div>

                    <button name="signup">sign up</button>
                    <h4 class="has_acc">I have an account</h4>
                </div></form>  
            </div>



            <div class="cent login">
                <div class="left stud" id="lock">
                    <div class="overlay">

                    </div>
                </div>

           <form action="" method="post">   <div class="right">
                    <h1>LOGIN</h1>

                  

                    <div class="ne_log">
                        <input type="text" placeholder="restaurant" name="name">
                    </div>

                    <div class="ne_log">
                        <input type="password" placeholder="password" name="password">
                    </div>

                    <button name="login">Login</button>

                    <h4 class="no_acc">I dont have an account</h4>
                </div></form>  
            </div>
        </div>
    </div>
</body>
</html>