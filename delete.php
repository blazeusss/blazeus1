<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "database3";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete user by ID
    $sql = "DELETE FROM login WHERE id = $userId";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User Sucessfully Deleted.'); window.location.href = 'admin.php';</script>";
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
