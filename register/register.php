<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/14/2019
 * Time: 10:39
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Webshop</title>
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

<div class="content">
    <form name="register" action="../php/register.php" class="form" method="POST">
        <p id="page_title">Register</p>
        <input type="text" required name="firstname" placeholder="first name">
        <input type="text" required name="lastname" placeholder="last name">
        <input type="text" required name="street" placeholder="street">
        <input type="text" required name="zipcode" placeholder="zipcode">
        <input type="text" required name="residence" placeholder="residence">
        <input type="email" required name="email" placeholder="example@johndoe.com">
        <input type="password" required name="password" placeholder="*****">

        <div class="g-recaptcha"
             data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI">
        </div>

        <br>

        <div class="icon_container">
            <input type="submit" class="icon" id="submit" name="submit" value="&rarr;">
        </div>

        <a href="../pages/index.php">Back</a>
    </form>
</div>


</body>
</html>

