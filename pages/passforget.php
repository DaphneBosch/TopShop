<!DOCTYPE html>
<html>
  <head>
    <title>Webshop</title>
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>

  <div class="content">
    <form name="pass forget" method="POST" enctype="multipart/form-data" action="">
      <p id="page_title">Get a new password!</p>
      <input type="email" required name="email" placeholder="example@johndoe.com">
      <div class="g-recaptcha"
      data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI">
      </div>
      <br>
      <div class="icon_container">
        <input type="submit" class="icon" id="submit" name="submit" value="&rarr;">
      </div>
      <a href="index.php?page=login.php">
    </form>
  </div>

  <?php

  if(isset($_POST['submit'])) {
    $note = "";
    $email = htmlspecialchars($_POST['email']);

    $token = bin2hex(random_bytes(32));
    $timestamp = new DateTime("now");
    $timestamp = $timestamp->getTimestamp();

    include('../db/dbconfig.php');
    try {
      $sql = "UPDATE client SET 'token' = ? WHERE 'email' = ?";
      $stmt = $connection->prepare($sql);
      $stmt->execute(array($token, $email));
      if($stmt) {
        echo "<script>alert('Could not save in database');
              location.href='index.php?page=login'</script>";
      }
    } catch(PDOException $e) {
      echo $e->getMessage();
    }

  // Configure URL for pass forget page
  $url = sprintf("%s://%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']!='off' ?
  'https' : 'http', $_SERVER['HTTP_HOST']
   . dirname($_SERVER['PHP_SELF']) . "passforget.php");

  $url = $url . "?token-" . $token . "&timestamp=" . $timestamp;

  include('../lib/mail.php');
  $note = "<p>If you want to reset your password, click <a href=" . $url . ">here</a></p>";
  try {
    email($email, "client", $subject, $msg);
    $note = "Check your mail to continue";
  } catch(Exception $e) {
    $note = "Could not send mail - " . + $mail->ErrorInfo;
  }
  echo "<div id='note'>" . $note . "</div>";
  }
  ?>

  </body>
</html>
