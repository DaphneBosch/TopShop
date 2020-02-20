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
    $namelaptop = htmlspecialchars($_POST['namelaptop']);
    $brand = htmlspecialchars($_POST['brand']);
    $processor = htmlspecialchars($_POST['processor']);
    $yearlaptop = htmlspecialchars($_POST['yearlaptop']);
    $graphicscard = htmlspecialchars($_POST['graphicscard']);
    $resolution = htmlspecialchars($_POST['resolution']);
    $ram = htmlspecialchars($_POST['ram']);
    $spacelaptop = htmlspecialchars($_POST['spacelaptop']);
    $price = htmlspecialchars($_POST['price']);
    $stock = htmlspecialchars($_POST['stock']);
    $sql = "UPDATE laptops SET namelaptop = ?, brand = ?, processor = ?, yearlaptop = ?,
            graphicscard = ?, resolution = ?, ram = ?, spacelaptop = ?, price = ?, stock = ? WHERE ID = ?";
    $stmt = $connection->prepare($sql);
    try {
        $stmt = $stmt->execute(array($namelaptop, $brand, $processor, $yearlaptop, $graphicscard, $resolution,
                                    $ram, $spacelaptop, $price, $stock, $id));
        echo "<script>alert('Laptop updated!');
              location.href='index.php?page=laptops';
              </script>";
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}