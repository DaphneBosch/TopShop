<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 10/3/2019
 * Time: 17:47
 */

if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] != "ACTIVE") {
    echo "<script>alert('You do not have permission to access this page');
                  location.href='../pages/index.php";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Webshop</title>
    <link href="../css/webshop.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script type="text/javascript" src="../js/webshop.js"></script>
  </head>
  <body>

  <div class="content">
    <form name="search" id="search" action="" method="POST">
      <div class="styleform">
        <input type="text" style="float: left; width:70%;" id="pattern" name="pattern" placeholder="Search laptops">
        <input type="submit" style="float: none; width: 10%; font-size: 1.2rem;" id="searching" name="searching" value="&#128270;">
        <br>
      </div>
    </form>
  </div>

  <?php
  if(isset($_POST['searching']) && !empty($_POST['pattern'])) {
    $pattern = htmlspecialchars($_POST['pattern']);
    $sql = "SELECT * FROM laptops WHERE namelaptop LIKE '%$pattern%' || brand LIKE '%$pattern%' || processor LIKE '%$pattern%'
            || yearlaptop LIKE '%$pattern%' || graphicscard LIKE '%$pattern%' || resolution LIKE '%$pattern%'
            || ram LIKE '%$pattern%' || spacelaptop LIKE '%$pattern%'";
  } else {
    $sql = "SELECT * FROM laptops LIMIT 3";
  }
  ?>

  <div class="content">
    <form name="webshop" id="webshop" action="index.php?page=order" method="POST">
    <?php
    include_once('../db/dbconfig.php');
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $laptops = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $loop = 0;
    foreach($laptops as $laptop) {
      echo "<img width='100px' src='../img/" . $laptop['cover'] . "'>";
      echo "<input type='hidden' name='id[$loop]' id='id[$loop]' value='" . $laptop['ID'] . "'>";
      echo "<input type='hidden' name='namelaptop[$loop]' id='namelaptop[$loop]' value='" . $laptop['namelaptop'] . "'>";
      echo "<input type='hidden' name='brand[$loop]' id='brand[$loop]' value='" . $laptop['brand'] . "'>";
      echo "<input type='hidden' name='processor[$loop]' id='processor[$loop]' value='" . $laptop['processor'] . "'>";
      echo "<input type='hidden' name='yearlaptop[$loop]' id='yearlaptop[$loop]' value='" . $laptop['yearlaptop'] . "'>";
      echo "<input type='hidden' name='graphicscard[$loop]' id='graphicscard[$loop]' value='" . $laptop['graphicscard'] . "'>";
      echo "<input type='hidden' name='ram[$loop]' id='ram[$loop]' value='" . $laptop['ram'] . "'>";
      echo "<input type='hidden' name='price[$loop]' id='price[$loop]' value='" . $laptop['price'] . "'>";
      echo "<br> Name: " . $laptop['namelaptop'] . "<br>Brand: " . $laptop['brand'] . "<br>Price: $" . $laptop['price']
          . "<br>Processor: " . $laptop['processor'] . "<br>Year: " . $laptop['yearlaptop'] . "<br>Graphics Card: " . $laptop['graphicscard'] .
            "<br>Resolution: " . $laptop['resolution'] . "<br>Ram: " . $laptop['ram'] . "<br>Space: " . $laptop['spacelaptop'];
      echo "<br>Stock: " . $laptop['stock'];
      echo "<br>Amount: ";
      echo "<input class='stock' type='text' style='width: 10%;' name='stock[$loop]' id='stock[$loop]' value='0'>";
      echo "<hr>";
      $loop++;
    }
    echo "<input type='hidden' name='loop' id='loop' value='" . $loop . "'>";
  ?>

    <input type="checkbox" name="cart_buybttn" id="cart_buybttn" onclick="showCart();" class="icon" value="&#128717;">
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
    <input type="checkbox" id="cart_buybttn" onclick="javascript:showCart();" class="icon" value="X">
    <label for="cart_buybttn" style="color: red;">&#8861;</label>
  </div>

     </body>
</html>
