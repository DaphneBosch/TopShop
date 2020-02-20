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
    <title>Clients</title>
    <link href="../css/order.css" rel="stylesheet">
</head>
<body>

<div class="content">
    <table border="1" cellspacing="0">
        <caption><p id="page_title">CLIENTS</p><br><br></caption>
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Street</th>
            <th>Zipcode</th>
            <th>Residence</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $sql = "SELECT * FROM client";
        $stmt = $connection->prepare($sql);
        $stmt->execute(array());
        $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // for every order
        foreach($clients as $client) {
            echo "<tr bgcolor='#a9a9a9'>
                               <td>" . $client['firstname'] ."</td>" ."<td> " . $client['lastname'] ."</td>"
                . "<td>" . $client['street'] ."</td>" . "<td>" . $client['zipcode'] ."</td>" .
                "<td>" . $client['residence'] ."</td>" . "<td>" . $client['email'] ."</td></tr>";
        }

        ?>
        </tbody>
    </table>
</div>

<div class="content">
    <a class="icon" style="font-size: 1.5rem;" href="../lib/pdf_generate.php?rapportName=clients">PDF</a>
</div>

</body>
</html>
