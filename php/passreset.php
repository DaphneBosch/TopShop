<!DOCTYPE html>
<html>
  <head>
    <title>Webshop</title>
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>

  <div class="content">
    <form name="resetform" method="POST" enctype="multipart/form-data" action=""
      onsubmit="if(document.resetform.password1 !== document.resetform.password2) {
        alert('Password should be the same');
        return false;
      }">
      <p id="page_title">Password reset</p>
      <input required type="email" name="email" placeholder="example@johndoe.com">
      <input required type="password" name="password" placeholder="New password">
      <input required type="password" name="password" placeholder="Repeat password">

    <div class="icon_container">
      <input type="submit" class="icon" id="submit" name="submit" value="&rarr;">
    </div>
    </form>
  </div>

  <?php

  include_once('../db/dbconfig.php');

  if(isset($_POST['submit'])) {
    if(isset($_GET['token']) && isset($_GET['timestamp'])) {
      $token = $_GET['token'];
      $timestamp1 = $_GET['timestamp'];
      $note = "";

      include("../db/dbconfig.php");
      $email = htmlspecialchars($_POST['email']);
      $pass = htmlspecialchars($_POST['password']);
      $passHash = password_hash($pass, PASSWORD_DEFAULT);

      try {
        $sql = "SELECT * FROM client WHERE email = ? AND token = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute(array($email, $token));
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt) {
          $timestamp2 = new Datetime("now");
          $timestamp2 = $timestamp2->getTimestamp();
          $dif = $timestamp2 - $timestamp1;

          if(($timestamp2 - $timestamp1) < 43200) {
              $query = "UPDATE client SET 'password' = ? WHERE email = ?";
              $stmt = $connection->prepare($query);
              $stmt = $stmt->execute(array($passHash, $email));
              if($stmt) {
                  echo "<script>alert('Your password has been reset!');
                  location.href='../pages/index.php';</script>";
              }
          } else {
              echo "<script>alert('Link has been expired');
                    location.href='../pages/index.php";
          }
        }
      } catch (PDOException $e) {
          echo $e->getMessage();
      }
    }
  }


  ?>

  </body>
</html>
