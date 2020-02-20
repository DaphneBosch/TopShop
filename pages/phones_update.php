<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/12/2019
 * Time: 12:18
 */

if(!isset($_SESSION["ID"]) && ($_SESSION["STATUS"]) !="ACTIVE") {
    echo "<script>alert('You do not have permission to access this page');
           location.href='index.php'";
}

if(isset($_POST["submit"])) {
    $id = htmlspecialchars($_POST['id']);
    $namephone = htmlspecialchars($_POST['namephone']);
    $brand = htmlspecialchars($_POST['brand']);
    $yearphone = htmlspecialchars($_POST['yearphone']);
    $os = htmlspecialchars($_POST['os']);
    $processor = htmlspecialchars($_POST['processor']);
    $spacephone = htmlspecialchars($_POST['spacephone']);
    $camres = htmlspecialchars($_POST['camres']);
    $color = htmlspecialchars($_POST['color']);
    $simtype = htmlspecialchars($_POST['simtype']);
    $price = htmlspecialchars($_POST['price']);
    $stock = htmlspecialchars($_POST['stock']);
    $sql = "UPDATE phones SET namephone = ?, brand = ?, yearphone = ?, os = ?,
            processor = ?, spacephone = ?, camres = ?, color = ?, simtype = ?, price = ?, stock = ? WHERE ID = ?";
    $stmt = $connection->prepare($sql);
    try {
        $stmt = $stmt->execute(array($namephone, $brand, $yearphone, $os, $processor, $spacephone,
                                    $camres, $color, $simtype, $price, $stock, $id));
        echo "<script>alert('Phone updated!');
              location.href='index.php?page=phones';
              </script>";
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}