<?php
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['username'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to place an order.']);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_username = $_SESSION['username'];
    $product_name = $_POST['product_name'];
    $product_price = floatval($_POST['product_price']);
    $color = $_POST['color'];
    $payment_method = $_POST['paymentMethod'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $street_address = $_POST['address'];
    $phone_number = $_POST['phone'];
    $product_image = $_POST['product_image'];

    $address = "$street_address, $city, $province, Philippines";
    $shipping_fee = 3.00;
    $total_price = $product_price + $shipping_fee;

    $conn = new mysqli("localhost", "root", "", "database3");
    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO orders (customer_username, product_name, color, product_price, payment_method, address, phone_number, product_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $customer_username, $product_name, $color, $total_price, $payment_method, $address, $phone_number, $product_image);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
