<?php
    include 'header.php';
?>


<?php
  $orders="";
  $query=mysqli_query($conn, "SELECT * FROM orders where buyer='$email'");

  while($row=mysqli_fetch_assoc($query)){
    $name=$row["name"];
    $image=$row["image"];
    $price=$row["price"];
    $quantity=$row["quantity"];
    $time=$row["date"];
    $status=$row["status"];


    $orders.= '    <tr>
    <td><div class="img_con"><img src="./food_pictures/'.$image.'" alt=""></div></td>
    <td><h3>'.$name.'</h3> </td>
    <td><h3>₦'.$price.'.00</h3></td>
    <td><h3>'.$quantity.'</h3></td>
    <td><h3>'.$time.'</h3></td>
    <td><h3>'.$status.'</h3></td>
  </tr>';
  }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/wishlist.css?v=<?php echo time()?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="bg_container">
            <div class="overlay">
            <div class="cent">
                        <h1>YOUR ORDERS</h1>
                   
                    </div>
            </div>
        </div>


        <div class="container sec1">
            <div class="cent">
         


            <section>
  <!--for demo wrap-->
  <h1>ORDERS</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>image</th>
          <th>item</th>
          <th>Price</th>
          <th>quantity</th>
          <th>time</th>
          <th>status</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
    

      <?php echo $orders?>

      </tbody>
    </table>
  </div>
</section>

            </div>
        </div>
</body>
</html>