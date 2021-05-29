<?php 

require './db_conn.php';
$orders = $conn->query("SELECT * FROM orders ORDER BY orderId ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zamówienia</title>
    <link rel="stylesheet" href="orders.css">
</head>
<body>
    <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Id Zamowienia</th>
                <th>Imię i nazwisko</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Adres</th>
                <th>Produkt</th>
                <th>Edytuj lub usuń zamówienie</th>
            </tr>
        </thead>
        <tbody>
        <?php while($order = $orders->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $order['orderId'] ?></td>
                <td><?php echo $order['name'] ?></td>
                <td><?php echo $order['email'] ?></td>
                <td><?php echo $order['telephone'] ?></td>
                <td><?php echo $order['address'] ?></td>
                <td><?php echo $order['product'] ?></td>
                <td class="actions">
                    <button class="action-button"><a href="update.php?orderId=<?=$order['orderId']?>" class="edit">Edytuj zamówienie</button>
                    <button class="action-button"><a href="remove.php?orderId=<?=$order['orderId']?>" class="edit">Usuń zamówienie</button>
                </td>
            </tr>
        <?php } ?>           
        </tbody>
    </table>
    </div>
    <div class="navigation">
        <p class="justify action-button"><a class="button" href="form.php">Dodaj zamówienie</a></p>
    </div>
</body>
</html>