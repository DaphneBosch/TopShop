<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/13/2019
 * Time: 16:18
 */

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Orders</title>
        <link href="../css/order.css" rel="stylesheet">
    </head>
    <body>

    <div class="content">
        <table border="1" cellspacing="0">
            <caption><p id="page_title">LAPTOP STOCK</p><br><br></caption>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Brand</th>
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

                // for every order
                foreach($laptops as $laptop) {
                        echo "<tr bgcolor='#a9a9a9'>
                               <td>" . $laptop['namelaptop'] ."</td>" ."<td> " . $laptop['brand'] ."</td>"
                                . "<td>" . "$" . $laptop['price'] ."</td>" .
                                "<td style='font-weight: bold;' bgcolor='aqua'>" . $laptop['stock'] . "</td></tr>";
                    }

                ?>
            </tbody>
        </table>
    </div>

    <div class="content">
        <a class="icon" style="font-size: 1.5rem;" href="../lib/pdf_generate.php?rapportName=rapport_stock">PDF</a>
    </div>


    </body>
</html>