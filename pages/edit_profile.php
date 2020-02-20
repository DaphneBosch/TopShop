<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 10/3/2019
 * Time: 18:01
 */

include_once('../db/dbconfig.php');
include_once('../php/update_profile.php');

if(!isset($_SESSION['ID']) && ($_SESSION['STATUS']!= "ACTIVE")) {
    echo "<script>alert('You do not have permission to access this page');
                  location.href=index.php;</script>";
    }
    try {
        $sql = "SELECT * FROM client WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute(array($_SESSION['EMAIL']));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Webshop Profile</title>
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>

    <div class="content">
    <form method="POST" action="index.php?page=edit_profile">
        <p id="page_title">Edit profile</p>
        <label for="firstname">First name;</label>
        <input type="text" required name="firstname" value="<?php echo $result['firstname'];?>">
        <label for="lastname">Last name;</label>
        <input type="text" required name="lastname" value="<?php echo $result['lastname'];?>">
        <label for="street">Street;</label>
        <input type="text" required name="street" value="<?php echo $result['street'];?>">
        <label for="street">Zipcode;</label>
        <input type="text" required name="zipcode" value="<?php echo $result['zipcode'];?>">
        <label for="street">Residence;</label>
        <input type="text" required name="residence" value="<?php echo $result['residence'];?>">
        <label for="street">Email;</label>
        <input type="email" required name="email" value="<?php echo $result['email'];?>">
        <br>
        <div class="icon_container">
            <input type="submit" class="icon" id="submit" name="submit" value="&rarr;">
        </div>
        <a href="index.php?page=login">Back</a>
    </form>
    </div>

    </body>
</html>
