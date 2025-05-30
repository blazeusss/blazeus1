<?php
$conn = new mysqli("localhost", "root", "", "database3");
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM emaillist ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Submissions</title>
    <link rel="stylesheet" href="emaillist.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>
<body style="margin: 50px;">
    <h1>List of Email Submissions</h1>
    <br>
    <div style="max-width: 1200px; margin: 0 auto; overflow-x: auto;">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Full name</th>
                <th>Issue Option</th>
                <th>Email</th>
                <th>Time Submitted</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['username']) ?></td>
                <td><?= htmlspecialchars($row['full_name']) ?></td>
                <td><?= htmlspecialchars($row['issue_option']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['submitted_at'])) ?></td>
                <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                <td>
    <form method="POST" action="deleteemail.php" onsubmit="return confirm('Are you sure you want to delete this entry?');">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</td>
                
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    </div>
          <a href="admincontrol.html">
                    <button class="backbut" type="button">Back</button>
                </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="emaillist.js"></script>
</body>
</html>
