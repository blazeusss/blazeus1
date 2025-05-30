<?php 
session_start(); 

$error_message = ""; // Initialize error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "database3";
    
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    
    // Special case: admin login bypasses database check
    if ($username === "admin" && $password === "admin") {
        $_SESSION['username'] = $username;
        header("Location: admincontrol.html");
        exit();
    }
    
    // Regular user login - Use prepared statement for security
    $query = "SELECT * FROM login WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['fullname'] = $user['fullname'];
        header("Location: main.php");   
        exit();
    } else {
        $error_message = "Invalid user"; // Set error message instead of alert
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
              <link rel="icon" type="image/png" href="img/logo.png">
    <title>Login Form</title>
    <style>
        .error-message {
            color: #ff4444;
            font-size: 14px;
            margin-top: 5px;
            margin-left: 5px;
            left: 490px;
            position: absolute;
            top: 290px;
            display: block;
        }
        .inputBox2.error input {
            border-color: #ff4444;
        }
    </style>
</head>
<body>
    <form action="login.php" method="POST" autocomplete="off">
        <div class="container">
            <h1>Login Form</h1>
            
            <div class="inputBox1">
                <input type="text" placeholder="Username" name="username" 
                       value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" 
                       required autocomplete="off">
                <i class="fa-solid fa-user"></i>
            </div>
            
            <div class="inputBox2 <?php echo !empty($error_message) ? 'error' : ''; ?>">
                <input type="password" placeholder="Enter Password" name="password" required autocomplete="off">
                <i class="fa-solid fa-lock"></i>
                <?php if (!empty($error_message)): ?>
                    <span class="error-message"><?php echo $error_message; ?></span>
                <?php endif; ?>
            </div>
            
            <div>
                <button class="submitbutton" type="submit">Submit</button>
            </div>
        </div>
    </form>
    
    <div class="SignupBut">
        <h2>Sign Up</h2>
        <p>To keep connected with us, </p>
        <p>login with your personal info.</p>
        <a href="create.html">
            <button class="button2">Create New</button>
        </a>
    </div>
    
    <a href="changepass.html" class="Forgotpass">
        <p>Change your password?</p>
    </a>
    
    <p class="estb">Est'd 2025</p>
</body>
</html>

