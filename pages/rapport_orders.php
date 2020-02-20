<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/12/2019
 * Time: 14:43
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
            <caption><p id="page_title">Orders rapport</p><br><br></caption>
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT client.lastname, item.weborder_ID, laptops.namelaptop, item.stock FROM client
                        INNER JOIN (weborder
                        INNER JOIN (item
                        INNER JOIN laptops ON laptops.ID = item.laptop_ID)
                        ON weborder.ID = item.weborder_ID)
                        ON client.ID = weborder.client_ID";
                $stmt = $connection->prepare($sql);
                $stmt->execute(array());
                $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $weborder_ID = $orders[0]['weborder_ID'];
                $subtotal = 0;
                $total = 0;
                $newOrder = true;

                // for every order
                foreach($orders as $order) {
                    if($order['weborder_ID'] != $weborder_ID) {
                        echo "<tr bgcolor='#9BC997'>
                              <tr bgcolor='#DAD4D4'>
                              <tr>
                               <td></td><td></td>
                               <td>Total laptops: </td>
                               <td align='center'>" . $subtotal . "</td></tr>";
                        $subtotal = 0;
                        $newOrder = true;
                        $weborder_ID = $order['weborder_ID'];
                    }
                    if($newOrder) {
                        echo "<tr bgcolor='#9BC997'>";
                        echo "<td>" . $order['lastname'] . "</td><td>" . $order['weborder_ID'] . "</td>";
                        echo "<td>" . $order['namelaptop'] . "</td><td>" . $order['stock'] . "</td></tr>";
                        $subtotal += $order['stock'];
                        $total += $subtotal;
                        $newOrder = false;
                    } else {
                        echo "<tr bgcolor='#9BC997'>";
                        echo "<td></td><td></td>";
                        echo "<td>" . $order['namelaptop'] . "</td><td align='center'>" . $order['stock'] . "</td>
                        </tr>";

                        $subtotal += $order['stock'];

                    }
                }


                ?>
            </tbody>
        </table>
    </div>

    <div class="content">
        <a class="icon" style="font-size: 1.5rem;" href="../lib/pdf_generate.php?rapportName=rapport_orders">PDF</a>
    </div>

    </body>
</html>