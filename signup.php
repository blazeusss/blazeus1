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
    // Sanitize and collect form input
    $Name = $conn->real_escape_string($_POST['Name'] ?? '');
    $MiddleName = $conn->real_escape_string($_POST['MiddleName'] ?? '');
    $Surname = $conn->real_escape_string($_POST['Surname'] ?? '');
    $Age = (int)($_POST['Age'] ?? 0);
    $Username = $conn->real_escape_string($_POST['Username'] ?? '');
    $Password = $conn->real_escape_string($_POST['Password'] ?? '');
    $PNum = $conn->real_escape_string($_POST['PNum'] ?? '');
    $Email = $conn->real_escape_string($_POST['Email'] ?? '');

    // File upload validation
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $photoName = basename($_FILES["profilePhoto"]["name"]);
    $target_file = $target_dir . time() . "_" . $photoName;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    $check = getimagesize($_FILES["profilePhoto"]["tmp_name"]);
    if ($check === false) {
        echo json_encode(['success' => false, 'message' => 'File is not an image.']);
        exit;
    }

    if (!in_array($imageFileType, $allowedTypes)) {
        echo json_encode(['success' => false, 'message' => 'Only JPG, JPEG, PNG & GIF files are allowed.']);
        exit;
    }

    if (!move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $target_file)) {
        echo json_encode(['success' => false, 'message' => 'Error uploading profile photo.']);
        exit;
    }

    $profilePhotoPath = $target_file;

    // Check for duplicates
    $checkQuery = "SELECT * FROM login WHERE Email = '$Email' OR Username = '$Username'";
    $result = $conn->query($checkQuery);

    if ($result && $result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Email or Username already exists.']);
        exit;
    }

    // Insert into database
    $insertQuery = "INSERT INTO login (Name, MiddleName, Surname, Age, Username, Password, PNum, Email, ProfilePhoto)
                    VALUES ('$Name', '$MiddleName', '$Surname', '$Age', '$Username', '$Password', '$PNum', '$Email', '$profilePhotoPath')";

    if ($conn->query($insertQuery) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Account created successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

$conn->close();
?>
