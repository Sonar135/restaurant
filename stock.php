<?php
    include "header.php";
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
        <tr>
          <td><div class="img_con"><img src="images\southern-living-27338_Green_Chile_Mac_And_Cheese_With_Chicken_303-7416f067f07f4bf3b6b8aaeddff4542b.jpg" alt=""></div></td>
          <td><h3>food</h3> </td>
          <td><h3>₦12000</h3></td>
          <td><h3>1</h3></td>
          <td id="ico"><div class="tb_ico"><i class="fa-solid fa-trash"></i></div></td>
        </tr>



      </tbody>
    </table>
  </div>
</section>
</body>
</html>