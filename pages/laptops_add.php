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
            <form name="laptopsadd" class="form" method="POST">
                <p id="page_title">Add album</p>
                <label>Name:</label>
                <input type="text" name="namelaptop" id="namelaptop">
                <label>Brand:</label>
                <input type="text" name="brand" id="brand">
                <label>Processor:</label>
                <input type="text" name="processor" id="processor">
                <label>Year:</label>
                <input type="text" name="yearlaptop" id="yearlaptop">
                <label>Graphics Card:</label>
                <input type="text" name="graphicscard" id="graphicscard">
                <label>Resolution:</label>
                <input type="text" name="resolution" id="resolution">
                <label>RAM:</label>
                <input type="text" name="ram" id="ram">
                <label>Space:</label>
                <input type="text" name="spacelaptop" id="spacelaptop">
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
                <a href="index.php?page=laptops">Back</a>

            </form>
        </div>


    </body>
</html>

<?php


if(isset($_POST['submit'])) {
    $note = "";
    $namelaptop = htmlspecialchars($_POST['namelaptop']);
    $brand = htmlspecialchars($_POST['brand']);
    $processor = htmlspecialchars($_POST['processor']);
    $yearlaptop = htmlspecialchars($_POST['yearlaptop']);
    $graphicscard = htmlspecialchars($_POST['graphicscard']);
    $resolution = htmlspecialchars($_POST['resolution']);
    $ram = htmlspecialchars($_POST['ram']);
    $spacelaptop = htmlspecialchars($_POST['spacelaptop']);
    $price = htmlspecialchars($_POST['price']);
    $stock = htmlspecialchars($_POST['stock']);
    $cover = htmlspecialchars($_POST['cover']);

    $sql = "INSERT INTO laptops (ID, namelaptop, brand, processor, yearlaptop, graphicscard, resolution,
            ram, spacelaptop, price, stock, cover) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    try {
        $stmt->execute(array(
            NULL,
            $namelaptop,
            $brand,
            $processor,
            $yearlaptop,
            $graphicscard,
            $resolution,
            $ram,
            $spacelaptop,
            $price,
            $stock,
            $cover
        ));
        $note = "Added new laptop!";
    } catch(PDOException $e) {
        $note = "Could not add new laptop" . $e->getMessage();
    }
    echo "<div id='note'>" . $note . "</div>";
}



?>

