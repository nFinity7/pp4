<?php
require './db_conn.php';
if (isset($_GET['orderId'])) {
    $stmt = $conn->prepare('DELETE FROM orders WHERE orderId = ?');
    $stmt->execute([$_GET['orderId']]);
    }
    header('Location: orders.php')
?>
