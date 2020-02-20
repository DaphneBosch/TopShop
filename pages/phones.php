<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/18/2019
 * Time: 10:13
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
                    <h3>Edit phones</h3>
                </caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Year</th>
                        <th>OS</th>
                        <th>Processor</th>
                        <th>Space</th>
                        <th>Camera Resolution</th>
                        <th>Color</th>
                        <th>Simtype</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM phones";
                    $stmt = $connection->prepare($sql);
                    $stmt->execute(array());
                    $phones = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $bgcolor = true;
                    foreach($phones as $phone) {
                        $td = $phone["ID"];
                        echo
                        "<td>" . $phone["namephone"] . "</td>" . "<td>" . $phone["brand"] . "</td>" .
                        "<td>" . $phone["yearphone"] . "</td>" . "<td>" . $phone["os"] . "</td>" .
                        "<td>" . $phone["processor"] . "</td>" . "<td>" . $phone["spacephone"] . "</td>" .
                        "<td>" . $phone["camres"] . "</td>" . "<td>" . $phone["color"] . "</td>" . "<td>"
                        . $phone["simtype"] . "</td>" .
                        "<td>" . $phone["price"] . "</td>" . "<td>" . $phone["stock"] . "</td>" .
                        "<td><a style='text-decoration: none' href='index.php?page=phones_edit&id=" .
                        $phone["ID"] . "'>&#9989;</a></td>" .
                        "<td><a style='text-decoration: none' href='index.php?page=phones_delete&id=" .
                        $phone["ID"] . "'>&#10062;</a></td></tr>";
                        $bgcolor = ($bgcolor ? false:true);
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6">
                            <a class="add" href="index.php?page=phones_add">&#10012;</a>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <a href="index.php?page=phoneshop">Back</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </body>
</html>
