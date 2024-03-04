<?php
    include "connect.php";


    if(isset($_GET["id"])){
        $id=$_GET["id"];
    }


    $query=mysqli_query($conn, "DELETE from item where id='$id'");

    if($query){
        mysqli_query($conn, "DELETE FROM cart where food_id='$id'");
        mysqli_query($conn, "DELETE FROM wishlist where food_id='$id'");

        header("location: stock.php");
    }
?>