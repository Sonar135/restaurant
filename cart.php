<?php
    include "header.php";
?>



<?php
  if(isset($_POST["inc"])){

  

    $cart_id=$_POST["id"];
    $get_stock=mysqli_query($conn, "SELECT * from item where id =$cart_id");

   

    $stock_row=mysqli_fetch_assoc($get_stock);

    $stock=$stock_row["quantity"];
    $stock_price=$stock_row["price"];


    $query=mysqli_query($conn, "SELECT * from cart where buyer='$email' and food_id='$cart_id'");

    $cart_row=mysqli_fetch_assoc($query);
    $pre_quantity=$cart_row["quantity"];

    if($stock<1){
   
        echo '  <div class="message" id="message">
        item is now out of stock
    </div>';
    
    }

    else{
      $new_quantity=$pre_quantity+1;

      $new_total=$stock_price*$new_quantity; 

      $update_cart=mysqli_query($conn, "UPDATE cart set quantity='$new_quantity'  where food_id='$cart_id'");
      $update_cart2=mysqli_query($conn, "UPDATE cart set total='$new_total'  where food_id='$cart_id'");

      $new_stock= $stock-1;

      $update_stock=mysqli_query($conn, "UPDATE item set quantity='$new_stock' where id='$cart_id'");

      header("location: cart.php#lock");
    }
  
  }
?>






<?php
  if(isset($_POST["dec"])){

  

    $cart_id=$_POST["id"];
    $get_stock=mysqli_query($conn, "SELECT * from item where id =$cart_id");

   

    $stock_row=mysqli_fetch_assoc($get_stock);

    $stock=$stock_row["quantity"];
    $stock_price=$stock_row["price"];


    $query=mysqli_query($conn, "SELECT * from cart where buyer='$email' and food_id='$cart_id'");

    $cart_row=mysqli_fetch_assoc($query);
    $pre_quantity=$cart_row["quantity"];

    if($pre_quantity<2){
   
      $new_quantity=$pre_quantity;
    
    }

    else{
      $new_quantity=$pre_quantity-1;

      $new_total=$stock_price*$new_quantity; 

      $update_cart=mysqli_query($conn, "UPDATE cart set quantity='$new_quantity'  where food_id='$cart_id'");
      $update_cart2=mysqli_query($conn, "UPDATE cart set total='$new_total'  where food_id='$cart_id'");

      $new_stock= $stock+1;

      $update_stock=mysqli_query($conn, "UPDATE item set quantity='$new_stock' where id='$cart_id'");

      header("location: cart.php#lock");
    }
  
  }
?>

  
<?php
  $cart="";
  $disabled="";
  $total_cost=0;
  $get=mysqli_query($conn, "SELECT * FROM cart where buyer='$email'");

  if(mysqli_num_rows($get)<1){
    $disabled="disabled";
  }

  while($row=mysqli_fetch_assoc($get)){


    $name=$row["name"];
    $image=$row["image"];
    $price=$row["price"];
    $id=$row["food_id"];
    $quantity=$row["quantity"];
    $total=$row["total"];

  

    $total_cost+=$total;
    
  





    $cart.= '             <tr>
    <td><div class="img_con"><img src="./food_pictures/'.$image.'" alt=""></div></td>
    <td><h3> '.$name.'</h3> </td>
    <td><h3>₦ '.$price.'.00</h3></td>
    <td><form action="" method="post"><div class="select">
              <button class="dec" name="dec">
              <i class="fa-solid fa-minus"></i>
              </button>

              <input type="text" readonly value=" '.$id.'" name="id"  hidden>


              <input type="text" readonly value=" '.$quantity.'" name="quantity" id="value">

              <button class="inc" name="inc">
              <i class="fa-solid fa-plus"></i>
            </button>
          </div></form></td>
    <td><h3>₦ '.$total.'.00</h3></td>
    <td id="ico"><a href="desc.php?id='.$id.'#lock"><div class="tb_ico"> <i class="fa-solid fa-eye"></i> </div></a></td>
    <td id="ico"><a href="delete.php?cart&id='.$id.'" class=""><div class="tb_ico"><i class="fa-solid fa-trash"></i></div></a></td>
  </tr> ';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/wishlist.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="css/cart.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="bg_container">
            <div class="overlay">
            <div class="cent">
                        <h1>CART</h1>
                   
                    </div>
            </div>
        </div>


        <div class="container sec1">
            <div class="cent">
         


            <section>
  <!--for demo wrap-->
  <h1>CART</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>image</th>
          <th>item</th>
          <th>Price</th>
          <th>quantity</th>
          <th>total</th>
          <th>view</th>
          <th>delete</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody id="lock">

        <?php echo $cart?>

 

      </tbody>
    </table>
  </div>
</section>

    <div class="checkout_cont">
       <h1>Total: ₦<?php echo $total_cost?>.00</h1>
     <a href="checkout.php">  <button  <?php echo $disabled?>>checkout</button></a>
    </div>
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