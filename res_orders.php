<?php
    include 'header.php';
?>


<?php
  $orders="";
  $query=mysqli_query($conn, "SELECT * FROM orders where seller='$res_id'");


  while($row=mysqli_fetch_assoc($query)){
    $name=$row["name"];
    $image=$row["image"];
    $price=$row["price"];
    $quantity=$row["quantity"];
    $time=$row["date"];
    $status=$row["status"];
    $id=$row["id"];
    $buyer=$row["buyer"];

    $get=mysqli_query($conn, "SELECT * FROM users where email='$buyer'");

    while($get_row=mysqli_fetch_assoc($get)){
      $address=$get_row["address"];
      $phone=$get_row["phone"];

      if($status=="pending confirmation"){
        $confirm='<a href="confirm.php?id='.$id.'" class=""><button>confirm</button></a>';
      }
  
      else if($status=="confirmed"){
        $confirm='<a href="deny.php?id='.$id.'" class=""><button>deny</button></a>';
      }
  
  
      $orders.= '     <tr>
      <td><div class="img_con"><img src="./food_pictures/'.$image.'" alt=""></div></td>
      <td><h3>'.$name.'</h3> </td>
      <td><h3>₦'.$price.'.000</h3></td>
      <td><h3>'.$quantity.'</h3></td>
      <td><h3>'.$time.'</h3></td>
      <td>'.$confirm.'</td>
      <td><h3>'.$address.'</h3></td>
      <td><h3>'.$phone.'</h3></td>
    </tr> ';
    }


  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/wishlist.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="css/res_orders.css?v=<?php echo time()?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="bg_container">
            <div class="overlay">
            <div class="cent">
                        <h1>CUSTOMER ORDERS</h1>
                        <H1> see Who Has Purchased Your Product</H1>
                   
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
          <th>address</th>
          <th>phone</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content" id="lock">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
    

        <?php echo $orders?>

 

      </tbody>
    </table>
  </div>
</section>

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