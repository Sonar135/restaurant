<?php
    include "header.php";
?>

<?php

  $wished="";
  $get=mysqli_query($conn, "SELECT * from wishlist where buyer='$email'");


  while($row=mysqli_fetch_assoc($get)){


    $name=$row["name"];
    $image=$row["image"];
    $price=$row["price"];
    $id=$row["food_id"];
    






    $wished.= '        <tr>
    <td><div class="img_con"><img src="./food_pictures/'.$image.'" alt=""></div></td>
    <td><h3> '.$name.'</h3> </td>
    <td><h3>₦ '.$price.'.00</h3></td>
 <td id="ico"><a href="desc.php?id='.$id.'#lock"><div class="tb_ico"> <i class="fa-solid fa-eye"></i> </div></a></td>
 <td id="ico"><a href="delete.php?wish&id='.$id.'" class=""><div class="tb_ico"><i class="fa-solid fa-trash"></i></div></a></td>
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
  <h1>WISHLIST</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>image</th>
          <th>item</th>
          <th>Price</th>
          <th>view</th>
          <th>delete</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
     <?php echo $wished?>



      </tbody>
    </table>
  </div>
</section>

            </div>
        </div>

</body>
</html>