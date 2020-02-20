<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/12/2019
 * Time: 12:00
 */

if(!isset($_SESSION["ID"]) && ($_SESSION["STATUS"]) != "ACTIVE") {
    echo "<script>alert('You do not have permission to access this page');
          location.href='index.php'
          </script>";
}

$sql = "SELECT * FROM laptops WHERE ID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute(array($_GET["id"]));
$laptops = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($laptops as $laptop) {

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit laptops</title>
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>

        <div class="content">
            <form name="edit" class="form" action="index.php?page=laptops_update" method="POST">
                <p id="page_title">Edit album</p>
                <input type="hidden" name="id" id="id" value="<?php echo $laptop["ID"];?>">
                <label>Name:</label>
                <input type="text" name="namelaptop" id="namelaptop" value="<?php echo $laptop["namelaptop"];?>">
                <label>Brand:</label>
                <input type="text" name="brand" id="brand" value="<?php echo $laptop["brand"];?>">
                <label>Processor:</label>
                <input type="text" name="processor" id="processor" value="<?php echo $laptop["processor"];?>">
                <label>Year:</label>
                <input type="text" name="yearlaptop" id="yearlaptop" value="<?php echo $laptop["yearlaptop"];?>">
                <label>Graphics Card:</label>
                <input type="text" name="graphicscard" id="graphicscard" value="<?php echo $laptop["graphicscard"];?>">
                <label>Resolution:</label>
                <input type="text" name="resolution" id="resolution" value="<?php echo $laptop["resolution"];?>">
                <label>RAM:</label>
                <input type="text" name="ram" id="ram" value="<?php echo $laptop["ram"];?>">
                <label>Space:</label>
                <input type="text" name="spacelaptop" id="spacelaptop" value="<?php echo $laptop["spacelaptop"];?>">
                <label>Price:</label>
                <input type="text" name="price" id="price" value="<?php echo $laptop["price"];?>">
                <label>Stock:</label>
                <input type="text" name="stock" id="stock" value="<?php echo $laptop["stock"];?>">
                <br>

                <div class="icon_container">
                    <input type="submit" class="icon" id="submit" name="submit" value="&rarr;">
                </div>
                <a href="index.php?page=laptops">Back</a>
            </form>
        </div>
        <?php } ?>
    </body>
</html>