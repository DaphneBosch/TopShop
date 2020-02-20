<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/12/2019
 * Time: 10:55
 */

if(!isset($_SESSION["ID"]) && ($_SESSION["STATUS"] != "ACTIVE")) {
    echo "<script> alert('You do not have permission to access this page');
           location;href='index.php'
           </script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Albums</title>
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>

        <div class="content">
            <table id="table" border="0" cellspacing="6">
                <caption>
                    <h3>Edit laptops</h3>
                </caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Processor</th>
                        <th>Year</th>
                        <th>Graphics Card</th>
                        <th>Resolution</th>
                        <th>RAM</th>
                        <th>Space</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM laptops";
                    $stmt = $connection->prepare($sql);
                    $stmt->execute(array());
                    $laptops = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $bgcolor = true;
                    foreach($laptops as $laptop) {
                        $td = $laptop["ID"];
                        echo
                        "<td>" . $laptop["namelaptop"] . "</td>" . "<td>" . $laptop["brand"] . "</td>" .
                        "<td>" . $laptop["processor"] . "</td>" . "<td>" . $laptop["yearlaptop"] . "</td>" .
                        "<td>" . $laptop["graphicscard"] . "</td>" . "<td>" . $laptop["resolution"] . "</td>" .
                        "<td>" . $laptop["ram"] . "</td>" . "<td>" . $laptop["spacelaptop"] . "</td>" .
                        "<td>" . $laptop["price"] . "</td>" . "<td>" . $laptop["stock"] . "</td>" .
                        "<td><a style='text-decoration: none' href='index.php?page=laptops_edit&id=" .
                        $laptop["ID"] . "'>&#9989;</a></td>" .
                        "<td><a style='text-decoration: none ' href='index.php?page=laptops_delete&id=" .
                        $laptop["ID"] . "'>&#10062;</a></td></tr>";
                        $bgcolor = ($bgcolor ? false:true);
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6">
                            <a class="add" href="index.php?page=laptops_add">&#10012;</a>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <a href="index.php?page=webshop">Back</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </body>
</html>
