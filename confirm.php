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


        if(isset($_GET["id"])){
            $id=$_GET["id"];
        }


        $query= mysqli_query($conn, "UPDATE orders set status='confirmed' where id='$id'");

        if($query){
            header("location: res_orders.php#lock");
        }
?>