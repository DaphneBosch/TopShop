<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/12/2019
 * Time: 14:08
 */

if(!isset($_SESSION["ID"]) && ($_SESSION["STATUS"]) !="ACTIVE") {
    echo "<script>alert('You do not have permission to access this page');
           location.href='index.php'";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add laptops</title>
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>

        <div class="content">
            <form name="phonesadd" class="form" method="POST">
                <p id="page_title">Add phone</p>
                <label>Name:</label>
                <input type="text" name="namephone" id="namephone">
                <label>Brand:</label>
                <input type="text" name="brand" id="brand">
                <label>Year:</label>
                <input type="text" name="yearphone" id="yearphone">
                <label>OS:</label>
                <input type="text" name="os" id="os">
                <label>Processor:</label>
                <input type="text" name="processor" id="processor">
                <label>Space:</label>
                <input type="text" name="spacephone" id="spacephone">
                <label>Camera Resolution:</label>
                <input type="text" name="camres" id="camres">
                <label>Color:</label>
                <input type="text" name="color" id="color">
                <label>Simtype:</label>
                <input type="text" name="simtype" id="simtype">
                <label>Price:</label>
                <input type="text" name="price" id="price">
                <label>Stock:</label>
                <input type="text" name="stock" id="stock">
                <p>Upload cover:</p>
                <input type="file" name="cover" id="cover">
                <br>

                <div class="icon_container">
                    <input type="submit" class="icon" id="submit" name="submit" value="&rarr;">
                </div>
                <a href="index.php?page=phones">Back</a>

            </form>
        </div>


    </body>
</html>

<?php


if(isset($_POST['submit'])) {
    $note = "";
    $namephone = htmlspecialchars($_POST['namephone']);
    $brand = htmlspecialchars($_POST['brand']);
    $yearphone = htmlspecialchars($_POST['yearphone']);
    $os = htmlspecialchars($_POST['os']);
    $processor = htmlspecialchars($_POST['processor']);
    $spacephone = htmlspecialchars($_POST['spacephone']);
    $camres = htmlspecialchars($_POST['camres']);
    $color = htmlspecialchars($_POST['color']);
    $simtype = htmlspecialchars($_POST['simtype']);
    $price = htmlspecialchars($_POST['price']);
    $stock = htmlspecialchars($_POST['stock']);
    $cover = htmlspecialchars($_POST['cover']);

    $sql = "INSERT INTO phones (ID, namephone, brand, yearphone, os, processor, spacephone,
            camres, color, simtype, price, stock, cover) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    try {
        $stmt->execute(array(
            NULL,
            $namephone,
            $brand,
            $yearphone,
            $os,
            $processor,
            $spacephone,
            $camres,
            $color,
            $simtype,
            $price,
            $stock,
            $cover
        ));
        $note = "Added new phone!";
    } catch(PDOException $e) {
        $note = "Could not add new phone" . $e->getMessage();
    }
    echo "<div id='note'>" . $note . "</div>";
}



?>

