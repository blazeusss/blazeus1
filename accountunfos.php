<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$conn = new mysqli("localhost", "root", "", "database3");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle order status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mark_received'])) {
    $order_id = $_POST['order_id'];

    $update_sql = "UPDATE orders SET status = 'Success order' WHERE id = ? AND customer_username = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("is", $order_id, $username);
    $update_stmt->execute();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch user info
$sql = "SELECT * FROM login WHERE Username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found.";
    exit();
}

// Fetch user's orders
$order_sql = "SELECT * FROM orders WHERE customer_username = ?";
$order_stmt = $conn->prepare($order_sql);
$order_stmt->bind_param("s", $username);
$order_stmt->execute();
$order_result = $order_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blazeus</title>
    <link rel="stylesheet" href="accountinfo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="img/logo.png">

    <style>
        .success-label {
            display: inline-block;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 25px;
            cursor: default;
            user-select: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .pending-label {
            display: inline-block;
            background-color:rgb(255, 17, 0);
            color: white;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 25px;
            cursor: default;
            user-select: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="main">
    <nav class="navbar"></nav>
    <div class="navigation">
        <div class="nav-10">
            <img src="img/logo2.png" alt="Logo" class="logoad" style="height: 120px;">  
            <ul>
                <li><a href="main.php">HOME</a></li>
                <li><a href="shop.php">PRODUCTS</a></li>
                <li><a href="accountunfos.php">ACCOUNT</a></li>
                <li><a href="contact.php">CONTACT US</a></li>   
                <li><a href="aboutus.php">ABOUT US</a></li>
            </ul>
        </div>

        <div class="container">
            <!-- Profile Photo Section -->
            <div class="profile-photo-wrapper">
                <?php if (!empty($user['ProfilePhoto']) && file_exists($user['ProfilePhoto'])): ?>
                    <img src="<?= htmlspecialchars($user['ProfilePhoto']) ?>" alt="Profile Photo" class="profile-photo">
                <?php else: ?>
                    <div class="profile-photo-default">No Profile Photo</div>
                <?php endif; ?>
            </div>

            <h2>User Information</h2>
            <div class="row">
                <div class="field"><span class="label">Name</span><div class="value"><?= htmlspecialchars($user['Name']) ?></div></div>
                <div class="field"><span class="label">Middle Name</span><div class="value"><?= htmlspecialchars($user['MiddleName']) ?></div></div>
                <div class="field"><span class="label">Surname</span><div class="value"><?= htmlspecialchars($user['Surname']) ?></div></div>
                <div class="field"><span class="label">Age</span><div class="value"><?= htmlspecialchars($user['Age']) ?></div></div>
            </div>
            <div class="row">
                <div class="field"><span class="label">Username</span><div class="value"><?= htmlspecialchars($user['Username']) ?></div></div>
                <div class="field"><span class="label">Password</span><div class="value"><?= str_repeat("•", strlen($user['Password'])) ?></div></div>
                <div class="field"><span class="label">Phone Number</span><div class="value"><?= htmlspecialchars($user['PNum']) ?></div></div>
                <div class="field"><span class="label">Email</span><div class="value"><?= htmlspecialchars($user['Email']) ?></div></div>
            </div>
            
            <h2>Order List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Address</th>
                        <th>Payment Method</th>
                        <th>Order ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($order_result->num_rows > 0): ?>
                        <?php while ($order = $order_result->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <img src="<?= htmlspecialchars($order['product_image']) ?>" 
                                         alt="Product Image" 
                                         style="width: 120px; height: auto;"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                    <div style="display:none; padding: 20px; background-color: #f0f0f0;">No Image</div>
                                </td>
                                <td><?= htmlspecialchars($order['product_name']) ?></td>
                                <td><?= htmlspecialchars($order['color']) ?></td>
                                <td>₱<?= number_format($order['product_price'], 2) ?></td>
                                <td><?= htmlspecialchars($order['Address']) ?></td>
                                <td><?= htmlspecialchars($order['payment_method']) ?></td>
                                <td><?= htmlspecialchars($order['id']) ?></td>
                                <td>
                                    <?php if ($order['status'] === 'Approved'): ?>
                                        <form method="post" action="">
                                            <input type="hidden" name="order_id" value="<?= htmlspecialchars($order['id']) ?>">
                                            <button type="submit" name="mark_received">Order Received</button>
                                        </form>
                                    <?php elseif ($order['status'] === 'Success order'): ?>
                                        <span class="success-label">Success Order</span>
                                    <?php elseif (strtolower($order['status']) === 'pending'): ?>
                                        <span class="pending-label">Pending</span>
                                    <?php else: ?>    
                                        <?= htmlspecialchars($order['status']) ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8">No orders found for this user.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="nav-20">
            <div class="search-container"></div>
            <a href="main.php" class="a1"><i class="ri-menu-2-line"></i></a>
            <a href="shop.php" class="a1"><i class="ri-shopping-cart-2-line"></i></a>
            <i class="ri-logout-box-r-line logout-icon" id="logoutIcon"></i>

            <div class="modal" id="logoutModal">
                <div class="modal-content">
                    <p>Do you want to logout?</p>
                    <div class="buttons">
                        <a href="logout.php"><button id="confirmLogout">Confirm</button></a>
                        <button id="cancelLogout">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="footer-content">
        <p>&copy; 2025 Blazeus Gadgets Finds. All rights reserved.</p>
    </div>
</footer>

<script>
    const logoutIcon = document.getElementById("logoutIcon");
    const logoutModal = document.getElementById("logoutModal");
    const cancelLogout = document.getElementById("cancelLogout");

    logoutIcon.onclick = () => {
        logoutModal.style.display = "block";
    };

    cancelLogout.onclick = () => {
        logoutModal.style.display = "none";
    };
</script>
</body>
</html>
