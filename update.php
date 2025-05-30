<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "database3";


$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $middle = $_POST['middle_name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $pnum = $_POST['pnum'];

  
if (!preg_match("/^[a-zA-Z0-9._%+-]+@(gmail|yahoo)\.com$/", $email)) {
        echo "<script>alert('Email must be a valid Gmail/Yahoo address (e.g., user@gmail.com)'); window.history.back();</script>";
        exit();
    }


    if (!preg_match("/^09\d{9}$/", $pnum)) {
        echo "<script>alert('Phone number must start with 09 and be exactly 11 digits'); window.history.back();</script>";
        exit();
    }

    $sql = "UPDATE login SET 
                Name = ?, 
                MiddleName = ?, 
                Surname = ?, 
                Age = ?, 
                Username = ?, 
                Password = ?, 
                Email = ?, 
                PNum = ? 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssissssi", $name, $middle, $surname, $age, $username, $password, $email, $pnum, $id);

    if ($stmt->execute()) {
        echo "<script>alert('User updated successfully'); window.location.href = 'admin.php';</script>";
    } else {
        echo "Update failed: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM login WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        die("User not found.");
    }

    $stmt->close();
} else {
    die("No ID provided.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <link rel="stylesheet" href="update.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/logo.png">
    
</head>
<body class="container" style="margin-top: 50px;">
    <h2>Update User</h2>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <div class="mb-3">
            <label class="form-label">First Name:</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['Name']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Middle Name:</label>
            <input type="text" name="middle_name" class="form-control" value="<?= htmlspecialchars($user['MiddleName']) ?>" required> 
        </div>

        <div class="mb-3">
            <label class="form-label">Surname:</label>
            <input type="text" name="surname" class="form-control" value="<?= htmlspecialchars($user['Surname']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Age:</label>
            <input type="number" name="age" class="form-control" value="<?= htmlspecialchars($user['Age']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Username:</label>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['Username']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password:</label>
            <div class="input-group">
                <input type="password" name="password" id="passwordInput" class="form-control" value="<?= htmlspecialchars($user['Password']) ?>" required>
                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">Show</button>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['Email']) ?>" required pattern=".+@gmail\.com" title="Only Gmail addresses are allowed">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone Number:</label>
            <input type="text" name="pnum" class="form-control" value="<?= htmlspecialchars($user['PNum']) ?>" required pattern="09\d{9}" title="Must start with 09 and contain exactly 11 digits" maxlength="11">
        </div>

        <button type="submit" class="btn btn-success">Update User</button>
        <a href="admin.php" class="btn btn-secondary">Cancel</a>
    </form>
    <div id="successModal" class="modal" style="display: none;">
  <div id="successMessage" class="success-message">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path d="M9 16.17l-3.88-3.88-1.41 1.41L9 19 20.3 7.71l-1.41-1.41z" />
    </svg>
    <p>Success! User Successfully Updated!</p>

  </div>
</div>


    <script>
    function togglePassword() {
        const passwordInput = document.getElementById("passwordInput");
        const toggleButton = event.target;

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordInput.type = "password";
            toggleButton.textContent = "Show";
        }
    }
    </script>
</body>
</html> 
