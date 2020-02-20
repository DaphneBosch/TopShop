<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/12/2019
 * Time: 14:34
 */

if(!isset($_SESSION["ID"]) && ($_SESSION["STATUS"]) !="ACTIVE") {
    echo "<script>alert('You do not have permission to access this page');
           location.href='index.php'";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Rapport</title>
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>

        <div class="content">
            <form name="rapport" id="rapport" action="" method="POST">
                <select style="font-size: 1.0rem" name="rapport">
                    <option value="">Select rapport</option>
                    <option value="orders">Orders laptops</option>
                    <option value="orders_phone">Orders phones</option>
                    <option value="stock">Laptop stock</option>
                    <option value="phonestock">Phone stock</option>
                </select>
                <br>

                <div class="icon_container">
                    <input type="submit" class="icon" id="submit" name="submit" value="&rarr;">
                </div>
                <br>
            </form>
        </div>

        <?php

        if(isset($_POST['submit'])) {
            if($_POST['rapport'] == 'orders') {
                include_once("rapport_orders.php");
            } elseif($_POST['rapport'] == 'stock') {
                include_once("rapport_stock.php");
            } elseif($_POST['rapport'] == 'phonestock') {
                include_once('rapport_stockphones.php');
            } elseif($_POST['rapport'] == 'orders_phone') {
                include_once('rapport_phoneorders.php');
            }
        }

        ?>


    </body>
</html>
