<?php
$conn = new mysqli("localhost", "root", "", "database3");
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order List</title>
    <link rel="stylesheet" href="orderlist.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>
<body style="margin: 50px;">
    <h1>List of Orders</h1>
    <br>
    <div style="max-width: 2000px; margin: 0 auto; overflow-x: auto;">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Order ID</th>
                <th>Customer Username</th>
                <th>Product Name</th>
                <th>Color</th>
                <th>Phone No.</th>
                <th>Total Price</th>
                <th>Payment Method</th>
                <th>Address</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['customer_username']) ?></td>
                <td><?= htmlspecialchars($row['product_name']) ?></td>
                <td><?= $row['color'] ?></td>
                <td><?= $row['phone_number'] ?></td>
                <td>P<?= number_format($row['product_price'], 2) ?></td>
                <td><?= htmlspecialchars($row['payment_method']) ?></td>
                <td><?= htmlspecialchars($row['Address']) ?></td>
                <td><?= $row['order_date'] ?></td>
                <td><?= htmlspecialchars($row['status']) ?></td>
                <td>
                <?php if ($row['status'] === 'Pending'): ?>
    <button class="btn btn-info btn-sm" onclick="confirmApprove(<?= $row['id'] ?>)">Approve</button>
<?php else: ?>
    <div>
        <span class="badge bg-success mb-2 d-block">APPROVED ORDER</span>
        <div>
            <button class="btn btn-secondary btn-sm me-1" onclick="printOrder(<?= $row['id'] ?>)">Print</button>
            <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $row['id'] ?>)">Delete</button>
        </div>
    </div>
<?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Approve Modal -->
    <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content animate__animated animate__fadeIn">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Approval</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to approve this product?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="approve_order.php">
                        <input type="hidden" name="order_id" id="order_id_to_approve">
                         <button type="submit" class="btn btn-success">Approve</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

 
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content animate__animated animate__fadeIn">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this order?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="delete_order.php">
                        <input type="hidden" name="order_id" id="order_id_to_delete">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

         <a href="admincontrol.html" id="adminOptions">
                    <button class="backbut" type="button">Back</button>
                </a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmApprove(orderId) {
            document.getElementById('order_id_to_approve').value = orderId;
            const modal = new bootstrap.Modal(document.getElementById('approveModal'));
            modal.show();
        }

        function confirmDelete(orderId) {
            document.getElementById('order_id_to_delete').value = orderId;
            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        }

        function printOrder(orderId) {
     
            window.open('printorder.php?id=' + orderId, '_blank');
        }
    </script>
</body>
</html>
