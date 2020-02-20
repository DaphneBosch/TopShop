<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/18/2019
 * Time: 16:04
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
            <caption><p id="page_title">PHONE STOCK</p><br><br></caption>
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

                $sql = "SELECT * FROM phones";
                $stmt = $connection->prepare($sql);
                $stmt->execute(array());
                $phones = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // for every order
                foreach($phones as $phone) {
                        echo "<tr bgcolor='#a9a9a9'>
                               <td>" . $phone['namephone'] ."</td>" ."<td> " . $phone['brand'] ."</td>"
                                . "<td>" . "$" . $phone['price'] ."</td>" .
                                "<td style='font-weight: bold;' bgcolor='aqua'>" . $phone['stock'] . "</td></tr>";
                    }

                ?>
            </tbody>
        </table>
    </div>

    <div class="content">
        <a class="icon" style="font-size: 1.5rem;" href="../lib/pdf_generate.php?rapportName=rapport_stockphones">PDF</a>
    </div>


    </body>
</html>