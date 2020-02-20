<?php

if(!isset($_SESSION['ID']) && ($_SESSION['STATUS']) != 'ACTIVE') {
  echo "<script>alert('You do not have permission to access this page');
        location.href='../pages/index.php';</script>";
}
if(isset($_POST['submit'])) {
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $street = htmlspecialchars($_POST['street']);
  $zipcode = htmlspecialchars($_POST['zipcode']);
  $residence = htmlspecialchars($_POST['residence']);
  $email = htmlspecialchars($_POST['email']);

  $query = "UPDATE client SET 'firstname' = ?, 'lastname' = ?, 'street' = ?, 'zipcode' = ?, 'residence' = ?, 'email' = ? WHERE 'email' = ?";
  $stmt = $connection->prepare($query);
  try {
    $stmt = $stmt->execute(array($firstname, $lastname, $street, $zipcode,
                                 $residence, $email, $email));
    if($stmt) {
      echo "<script>alert('Profile updated!');
            location.href='index.php?page=webshop';</script>";
    } else {
      echo "<script>alert('Could not update profile');
            location.href='index.php?page=webshop';</script>";
    }
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
}



 ?>
