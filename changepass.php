<?php
header('Content-Type: application/json');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "database3";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => "Connection failed: " . $conn->connect_error]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST['Username'] ?? '';
    $CurrentPassword = $_POST['Password'] ?? '';
    $NewPassword = $_POST['NewPassword'] ?? '';
    $Email = $_POST['Email'] ?? '';

    $Username = $conn->real_escape_string($Username);
    $CurrentPassword = $conn->real_escape_string($CurrentPassword);
    $NewPassword = $conn->real_escape_string($NewPassword);
    $Email = $conn->real_escape_string($Email);

    $checkQuery = "SELECT * FROM login WHERE Username = '$Username' AND Password = '$CurrentPassword' AND Email = '$Email'";
    $result = $conn->query($checkQuery);

    if ($result && $result->num_rows > 0) {
        $updateQuery = "UPDATE login SET Password = '$NewPassword' WHERE Username = '$Username'";
        if ($conn->query($updateQuery) === TRUE) {
            echo json_encode(['success' => true, 'message' => 'Password changed successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error updating password: ' . $conn->error]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Incorrect Username or Password or Email']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

$conn->close();
?>
