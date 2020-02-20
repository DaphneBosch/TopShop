<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/12/2019
 * Time: 14:05
 */

if(!isset($_SESSION["ID"]) && ($_SESSION["STATUS"]) !="ACTIVE") {
    echo "<script>alert('You do not have permission to access this page');
           location.href='index.php'";
}

$sql = "DELETE FROM phones WHERE ID = ?";
$stmt = $connection->prepare($sql);
try {
    $stmt->execute(array($_GET['id']));
    echo "<script>alert('Phone deleted!');
         location.href='index.php?page=laptops';
         </script>";
} catch(PDOException $e) {
    echo $e->getMessage();
}