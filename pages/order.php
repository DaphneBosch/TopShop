<?php

if(!isset($_SESSION['ID']) && ($_SESSION['STATUS'] != "ACTIVE")) {
  echo "<script>alert('You don't have permission to access this page!);
        location.href='index.php';
        </script>";
}
if(isset($_POST['submit'])) {
  // $dat means date but date is word used by PHP and not available
  $dat = new DateTime();
  $dat = date_format($dat, "c");
  $sql = "INSERT INTO weborder (ID, client_ID, dat) VALUES (?, ?, ?)";
  $stmt = $connection->prepare($sql);
  $data = array(NULL, $_SESSION['USER_ID'], $dat);
  try {
    $stmt->execute($data);
    echo "<script>alert('Order made!');</script>";
  } catch(PDOException $e) {
    echo $e->getMessage();
    echo "<script>alert('Could not order!');</script>";
    echo "<script>location.href='index.php?page=webshop';</script>";
  }

$weborder_id = $connection->lastInsertId();

for($x=0; $x < $_POST['loop']; $x++) {
  $stock = htmlspecialchars($_POST['stock'][$x]);
  if($stock == -0) continue;
  $laptop_ID = $_POST['id'][$x];
  $price_unit = $_POST['price'][$x];
  $sql = "INSERT INTO item (ID, weborder_ID, client_ID, laptop_ID, price_unit, stock) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $connection->prepare($sql);
  $data = array(NULL, $weborder_id, $_SESSION['USER_ID'], $laptop_ID, $price_unit, $stock);

  try {
    $stmt->execute($data);
    echo "<script>alert('Item saved');</script>";
  } catch(PDOException $e) {
    echo $e->getMessage();
    echo "<script>alert('Could not save item');</script>";
  }
  echo "<script>location.href='index.php?page=webshop';</script>";
  }
}

?>
