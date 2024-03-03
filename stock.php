<?php
    include "header.php";
?>


<?php
$output="";
  $get=mysqli_query($conn, "SELECT * from item where seller='$res_id'");

  while($row=mysqli_fetch_assoc($get)){
    $name=$row["name"];
    $image=$row["image"];
    $price=$row["price"];
    $quantity=$row["quantity"];

    
    $output.= '   <tr>
    <td><div class="img_con"><img src="./food_pictures/'.$image.'" alt=""></div></td>
    <td><h3>'.$name.'</h3> </td>
    <td><h3>₦'.$price.'.00</h3></td>
    <td><h3>'.$quantity.'</h3></td>
    <td id="ico"><div class="tb_ico"><i class="fa-solid fa-trash"></i></div></td>
  </tr>';
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/wishlist.css?v=<?php echo time();?>">
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
         


            <section>
  <!--for demo wrap-->
  <h1>YOUR STOCK</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>image</th>
          <th>item</th>
          <th>Price</th>
          <th>quantity</th>
          <th>delete</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
     

      <?php echo $output?>

      </tbody>
    </table>
  </div>
</section>
</body>
</html>