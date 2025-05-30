<?php

$conn = new mysqli("localhost", "root", "", "database3");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!isset($_GET['id'])) {
    die("No order ID provided.");
}

$order_id = intval($_GET['id']);

$sql = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Order not found.");
}

$order = $result->fetch_assoc();


$username = $order['customer_username'];
$name_sql = "SELECT Name, MiddleName, Surname FROM login WHERE username = ?";
$name_stmt = $conn->prepare($name_sql);
$name_stmt->bind_param("s", $username);
$name_stmt->execute();
$name_result = $name_stmt->get_result();

$full_name = "N/A";
if ($name_result->num_rows > 0) {
    $user = $name_result->fetch_assoc();
    $full_name = htmlspecialchars($user['Name'] . ' ,' . $user['MiddleName'] . ', ' . $user['Surname']);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 30px;
            background: #f5f5f5;
        }
        .invoice-container {
            background: #fff;
            padding: 20px;
            max-width: 700px;
            margin: auto;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .invoice-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-container td, .invoice-container th {
            padding: 10px;
        }
        .title img {
            max-width: 100px;
        }
        .heading {
            background: #eee;
            font-weight: bold;
        }
        .total {
            font-weight: bold;
            border-top: 2px solid #000;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body onload="window.print();">

<div class="invoice-container">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="img/logo.png" alt="Logo">
                        </td>
                        <td class="text-right">
                            <strong>Order ID #: </strong><?= $order['id'] ?><br>
                            <strong>Date: </strong><?= date("F j, Y", strtotime($order['order_date'])) ?><br>
                            <strong>Status: </strong><?= $order['status'] ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <strong>From:</strong><br>
                            Blazeus Gadgets<br>
                            245 Sunny Road<br>
                            San Jose, Pampanga, Philippines
                        </td>
                        <td>
                          <td>
    <strong>To:</strong><br>
    <?= $full_name ?><br>
    <?= htmlspecialchars($order['customer_username']) ?><br>
    <?= htmlspecialchars($order['phone_number']) ?><br>
    <?= htmlspecialchars($order['Address']) ?>
</td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Payment Method</td>
            <td class="text-right"><?= htmlspecialchars(ucfirst($order['payment_method'])) ?></td>
        </tr>

        <tr class="heading">
            <td>Item</td>
            <td class="text-right">Price</td>
        </tr>

        <tr class="item">
            <td><?= htmlspecialchars($order['product_name']) ?> (Color: <?= $order['color'] ?>)</td>
            <td class="text-right">₱<?= number_format($order['product_price'], 2) ?></td>
        </tr>

        <tr class="total">
            <td></td>
            <td class="text-right">Total: ₱<?= number_format($order['product_price'], 2) ?></td>
        </tr>
    </table>
</div>

</body>
</html>
