<?php
$conn = new mysqli("localhost", "root", "", "database3");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]);
    $stmt = $conn->prepare("DELETE FROM emaillist WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
