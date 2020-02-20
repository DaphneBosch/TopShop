<?php

$host = "localhost";
$db = "webbackend";
$user = "root";
$pass = "";

$dsn = "mysql:host=$host;dbname=$db";

try {
  $connection = new PDO($dsn, $user, $pass);
  $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
  echo "Could not connect to database";
}

?>
