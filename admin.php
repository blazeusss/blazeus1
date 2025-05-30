<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>
<body style="margin: 50px;">
    <h1>List of User</h1>
    <br>
    <div style="max-width: 1110px; margin: 0 auto; overflow-x: auto;">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Surname</th>
                <th>Age</th>
                <th>Username</th>
                <th>Password</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "database3";

        $connection = new mysqli($servername, $username, $password, $database);
        if ($connection->connect_error) {
            die("Connection Failed: " . $connection->connect_error);
        }

        $sql = "SELECT * FROM login";
        $result = $connection->query($sql);

        if (!$result) {
            die("Invalid query: " . $connection->error);
        }

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row["id"]}</td>
                <td>{$row["Name"]}</td>
                <td>{$row["MiddleName"]}</td>
                <td>{$row["Surname"]}</td>
                <td>{$row["Age"]}</td>
                <td>{$row["Username"]}</td>
                <td>{$row["Password"]}</td>
                <td>{$row["PNum"]}</td>
                <td>{$row["Email"]}</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='update.php?id={$row["id"]}'>Update</a>
                    <button class='btn btn-danger btn-sm' onclick='confirmDelete({$row["id"]})'>Delete</button>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content animate__animated animate__fadeIn">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this user?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="user_id" id="user_id_to_delete">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

     <a href="admincontrol.html">
                    <button class="backbut" type="button">Back</button>
                </a>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript to trigger modal -->
    <script>
        function confirmDelete(userId) {
            document.getElementById('user_id_to_delete').value = userId;
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }
    </script>
</body>
</html>
