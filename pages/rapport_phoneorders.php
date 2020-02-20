<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/19/2019
 * Time: 11:12
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
            <caption><p id="page_title">Phone Orders</p><br><br></caption>
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Order</th>
                    <th>Name</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT client.lastname, phoneitem.weborder_ID, phones.namephone, phoneitem.stock FROM client
                        INNER JOIN (weborder
                        INNER JOIN (phoneitem
                        INNER JOIN phones ON phones.ID = phoneitem.phone_ID)
                        ON weborder.ID = phoneitem.weborder_ID)
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
                               <td></td><td></td>
                               <td>Total phones: </td>
                               <td align='center'>" . $subtotal . "</td></tr>";
                        $subtotal = 0;
                        $newOrder = true;
                        $weborder_ID = $order['weborder_ID'];
                    }
                    if($newOrder) {
                        echo "<tr bgcolor='#9BC997'>";
                        echo "<td>" . $order['lastname'] . "</td><td>" . $order['weborder_ID'] . "</td>";
                        echo "<td>" . $order['namephone'] . "</td><td>" . $order['stock'] . "</td></tr>";
                        $subtotal += $order['stock'];
                        $total += $subtotal;
                        $newOrder = false;
                    } else {
                        echo "<tr bgcolor='#9BC997'>";
                        echo "<td></td><td></td>";
                        echo "<td>" . $order['namephone'] . "</td><td align='center'>" . $order['stock'] . "</td>
                        </tr>";

                        $subtotal += $order['stock'];

                    }
                }


                ?>
            </tbody>
        </table>
    </div>

    <div class="content">
        <a class="icon" style="font-size: 1.5rem;" href="../lib/pdf_generate.php?rapportName=rapport_phoneorders">PDF</a>
    </div>

    </body>
</html>