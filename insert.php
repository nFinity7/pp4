<?php
require './db_conn.php';

if(isset($_POST['submit'])){
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['address']) && !empty($_POST['product'])){
        require './db_conn.php';

        $name = $_POST['name'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $address = $_POST['address'];
        $product = $_POST['product'];


        $query = 'INSERT INTO orders(name, email, telephone, address, product) VALUES(?,?,?,?,?)';
        $stmt = $conn->prepare($query);
        $stmt->execute([$name, $email, $telephone, $address, $product]);

        header('Location: orders.php');
    }else{
        echo "Wszystkie pola są wymagane";
    }
}

?>