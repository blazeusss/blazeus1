<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["order_id"])) {
    $orderId = $_POST["order_id"];

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "database3");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete the order based on the provided order ID
    $sql = "DELETE FROM orders WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderId);

    if ($stmt->execute()) {
        // Redirect back to the order list page after deletion
        header("Location: orderlist.php");
        exit();
    } else {
        echo "Error deleting order: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>