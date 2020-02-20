<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/19/2019
 * Time: 11:06
 */

if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] != "ACTIVE") {
    echo "<script>alert('You do not have permission to access this page');
                  location.href='../pages/index.php";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Phone Shop</title>
    <link href="../css/webshop.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script type="text/javascript" src="../js/phoneshop.js"></script>
  </head>
  <body>

  <?php

  if(isset($_POST['searching']) && !empty($_POST['pattern'])) {
  $pattern = htmlspecialchars($_POST['pattern']);
  $sql2 = "SELECT * FROM phones WHERE namephone LIKE '%$pattern%' || brand LIKE '%$pattern%' || yearphone LIKE '%$pattern%'
  || os LIKE '%$pattern%' || processor LIKE '%$pattern%' || spacephone LIKE '%$pattern%'
  || camres LIKE '%$pattern%' || color LIKE '%$pattern%' || simtype LIKE '%$pattern%'";
  } else {
  $sql2 = "SELECT * FROM phones LIMIT 3";
  }

  ?>

  <div class="content">
    <form name="search" id="search" action="" method="POST">
      <div class="styleform">
        <input type="text" style="float: left; width:70%;" id="pattern" name="pattern" placeholder="Search laptops">
        <input type="submit" style="float: none; width: 10%; font-size: 1.2rem;" id="searching" name="searching" value="&#128270;">
        <br>
      </div>
    </form>
  </div>

  <div class="content">
    <form name="phoneshop" id="phoneshop" action="index.php?page=orders_phone" method="POST">
                <?php
                include_once('../db/dbconfig.php');
                $stmt2 = $connection->prepare($sql2);
                $stmt2->execute();
                $phones = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                $loop2 = 0;
                foreach($phones as $phone) {
                    echo "<img width='100px' src='../img/" . $phone['cover'] . "'>";
                    echo "<input type='hidden' name='id[$loop2]' id='id[$loop2]' value='" . $phone['ID'] . "'>";
                    echo "<input type='hidden' name='namephone[$loop2]' id='namephone[$loop2]' value='" . $phone['namephone'] . "'>";
                    echo "<input type='hidden' name='brand[$loop2]' id='brand[$loop2]' value='" . $phone['brand'] . "'>";
                    echo "<input type='hidden' name='yearphone[$loop2]' id='yearphone[$loop2]' value='" . $phone['yearphone'] . "'>";
                    echo "<input type='hidden' name='os[$loop2]' id='os[$loop2]' value='" . $phone['os'] . "'>";
                    echo "<input type='hidden' name='processor[$loop2]' id='processor[$loop2]' value='" . $phone['processor'] . "'>";
                    echo "<input type='hidden' name='spacephone[$loop2]' id='spacephone[$loop2]' value='" . $phone['spacephone'] . "'>";
                    echo "<input type='hidden' name='camres[$loop2]' id='camres[$loop2]' value='" . $phone['camres'] . "'>";
                    echo "<input type='hidden' name='color[$loop2]' id='color[$loop2]' value='" . $phone['color'] . "'>";
                    echo "<input type='hidden' name='simtype[$loop2]' id='simtype[$loop2]' value='" . $phone['simtype'] . "'>";
                    echo "<input type='hidden' name='price[$loop2]' id='price[$loop2]' value='" . $phone['price'] . "'>";
                    echo "<br> Name: " . $phone['namephone'] . "<br>Brand: " . $phone['brand'] . "<br>Price: $" . $phone['price']
                        . "<br>Year: " . $phone['yearphone'] . "<br>OS: " . $phone['os'] . "<br>Processor: " . $phone['processor'] .
                        "<br>Space: " . $phone['spacephone'] . "<br>Camera Resolution: " . $phone['camres'] . "<br>Color: " . $phone['color'] .
                        "<br>Simtype: " . $phone['simtype'];
                    echo "<br>Stock: " . $phone['stock'];
                    echo "<br>Amount: ";
                    echo "<input class='stock' type='text' style='width: 10%;' name='stock[$loop2]' id='stock[$loop2]' value='0'>";
                    echo "<hr>";
                    $loop2++;
                }
                echo "<input type='hidden' name='loop2' id='loop2' value='" . $loop2 . "'>";
                ?>
    <input type="checkbox" name="cart_buybttn" id="cart_buybttn" onclick="showCarts();" class="icon" value="&#128717;">
    <label for="cart_buybttn">&#128717;</label>
    <br>
      <div class="icon_container">
        <input type="submit" name="submit" id="submit" class="icon" value="&rarr;">
      </div>
    <br>
  </form>
  </div>

  <div id="cart">
    <div id="rows"></div>
    <input type="checkbox" id="cart_buybttn" onclick="javascript:showCarts();" class="icon" value="X">
    <label for="cart_buybttn" style="color: red;">&#8861;</label>
  </div>

     </body>
</html>
