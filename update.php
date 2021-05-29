<?php
require './db_conn.php';

if (isset($_GET['orderId'])) {
    if (!empty($_POST)) {
        
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $product = isset($_POST['product']) ? $_POST['product'] : '';

        $stmt = $conn->prepare('UPDATE orders SET name = ?, email = ?, telephone = ?, address = ?, product = ? WHERE orderId = ?');
        $stmt->execute([$name, $email, $telephone, $address, $product, $_GET['orderId']]);
        header('Location: orders.php');
    }
    $stmt = $conn->prepare('SELECT * FROM orders WHERE orderId = ?');
    $stmt->execute([$_GET['orderId']]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modyfikuj zamówienie</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
<div class="container">


    <div class="edit-form">
        <h2>Edytujesz zamówienie nr <?=$order['orderId']?></h2>
    <form name="orderForm" action="update.php?orderId=<?=$order['orderId']?>" method="post" onsubmit="return validateForm()">
        <div class="input-group">
            <label for="name" class="label">Imie i nazwisko</label>
            <input name="name" placeholder="Jan Kowalski" value="<?=$order['name']?>" type="text" class="input">
        </div>

        <div class="input-group">
            <label for="email" class="label">Email</label>
            <input name="email" type="text" class="input" value="<?=$order['email']?>" placeholder="jankowalski@gmail.com">
        </div>

        <div class="input-group">
            <label for="telephone" class="label">Telefon</label>
            <input name="telephone" type="text" value="<?=$order['telephone']?>" class="input" placeholder="andy@web-crunch.com">
        </div>

        <div class="input-group">
            <label for="address" class="label">Adres</label>
            <input name="address" value="<?=$order['address']?>" type="text" placeholder="Kraków" class="input">
        </div>

        <select class="select" name="product" id="cars">
            <option value="Samsung" <?php if ($order['product']) echo "selected='selected'";?>>Samsung</option>
            <option value="Xiaomi" <?php if ($order['product'] == "Xiaomi") echo "selected='selected'"?>>Xiaomi</option>
            <option value="HTC" <?php if ($order['product'] == "HTC") echo "selected='selected'"?>>HTC</option>
        </select>
        <input class="button" type="submit" value="Zaaktualizuj">
    </form>
    </div>
    <<div class="navigation">
        <p class="justify p-button"><a href="orders.php">Przjedz do zamówień</a></p>
        <p class="justify p-button"><a href="form.php">Złóż kolejne zamówienie</a></p>
    </div>
</div>
<script>
    function validateForm() {
        var product = document.forms["orderForm"]["product"].value;
        var name = document.forms["orderForm"]["name"].value;
        var email = document.forms["orderForm"]["email"].value;
        var telephone = document.forms["orderForm"]["telephone"].value;
        var address = document.forms["orderForm"]["address"].value;
            if(product == "" || name == "" || email == "" || phone == "" || address == ""){
                alert('Wypełnij wszystkie pola.');
            return false;
            }
        }   
</script>
</body>
</html>