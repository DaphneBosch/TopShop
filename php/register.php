<?php

include("../register/register.php");
include("../db/dbconfig.php");
include('../lib/mail.php');

if(isset($_POST['submit'])) {
  $note = "";
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $client = $firstname . " " . $lastname;
  $street = htmlspecialchars($_POST['street']);
  $zipcode = htmlspecialchars($_POST['zipcode']);
  $residence = htmlspecialchars($_POST['residence']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $passHash = password_hash($password, PASSWORD_DEFAULT);

// check if email is already taken

$sql = "SELECT * FROM client WHERE email = ?";
$stmt = $connection->prepare($sql);
$stmt->execute(array($email));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
  if($result) {
    $note = "Email is already been used!";
  } else {
    $sql = "INSERT INTO client
     (firstname, lastname, street, zipcode, residence, email, password, role)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    try {
      $stmt->execute(array(
        $firstname,
        $lastname,
        $street,
        $zipcode,
        $residence,
        $email,
        $passHash,
        0)
      );
      $note = "New account created!";
    } catch(PDOException $e) {
      $note = "Couldn't create account :(";
      echo $e->getMessage();
    }
    echo "<div id='note'>" . $note . "</div>";
    $subject = "New account";
    $msg = "$client, your account has been created!";
    email($email, $client, $subject, $msg);
  }
}

 ?>
