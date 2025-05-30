<?php
$conn = new mysqli("localhost", "root", "", "database3");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $conn->real_escape_string($_POST['username']);
$full_name = $conn->real_escape_string($_POST['full_name']);
$issue_option = $conn->real_escape_string($_POST['issue_option']);
$email = $conn->real_escape_string($_POST['email']);
$message = $conn->real_escape_string($_POST['message']);


$sql = "INSERT INTO emaillist (username, full_name, issue_option, email, message)
        VALUES ('$username', '$full_name', '$issue_option', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Thank you! Your message has been submitted.');
        window.location.href = 'contact.php';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
