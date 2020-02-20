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

$sql = "SELECT * FROM phones WHERE ID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute(array($_GET["id"]));
$phones = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($phones as $phone) {

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit phones</title>
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>

        <div class="content">
            <form name="edit" class="form" action="index.php?page=phones_update" method="POST">
                <p id="page_title">Edit album</p>
                <input type="hidden" name="id" id="id" value="<?php echo $phone["ID"];?>">
                <label>Name:</label>
                <input type="text" name="namephone" id="namephone" value="<?php echo $phone["namephone"];?>">
                <label>Brand:</label>
                <input type="text" name="brand" id="brand" value="<?php echo $phone["brand"];?>">
                <label>Year:</label>
                <input type="text" name="yearphone" id="yearphone" value="<?php echo $phone["yearphone"];?>">
                <label>OS:</label>
                <input type="text" name="os" id="os" value="<?php echo $phone["os"];?>">
                <label>Processor:</label>
                <input type="text" name="processor" id="processor" value="<?php echo $phone["processor"];?>">
                <label>Space:</label>
                <input type="text" name="spacephone" id="spacephone" value="<?php echo $phone["spacephone"];?>">
                <label>Camera Resolution:</label>
                <input type="text" name="camres" id="camres" value="<?php echo $phone["camres"];?>">
                <label>Color:</label>
                <input type="text" name="color" id="color" value="<?php echo $phone["color"];?>">
                <label>Simtype:</label>
                <input type="text" name="simtype" id="simtype" value="<?php echo $phone["simtype"];?>">
                <label>Price:</label>
                <input type="text" name="price" id="price" value="<?php echo $phone["price"];?>">
                <label>Stock:</label>
                <input type="text" name="stock" id="stock" value="<?php echo $phone["stock"];?>">
                <br>

                <div class="icon_container">
                    <input type="submit" class="icon" id="submit" name="submit" value="&rarr;">
                </div>
                <a href="index.php?page=phones">Back</a>
            </form>
        </div>
        <?php } ?>
    </body>
</html>