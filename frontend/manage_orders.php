<?php
require_once __DIR__ . '/../backend/config/database.php';

$query = "SELECT * FROM Orders";
$stmt = $pdo->query($query);
$orders = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="path/to/your/css/style.css"> <!-- Adjust the path as necessary -->
</head>
<body>
    <h1>Order Management</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>User ID</th>
                <th>Total Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo htmlspecialchars($order['OrderID']); ?></td>
                <td><?php echo htmlspecialchars($order['Date']); ?></td>
                <td><?php echo htmlspecialchars($order['UserID']); ?></td>
                <td><?php echo htmlspecialchars($order['TotalAmount']); ?></td>
                <td>
                    <a href="view_order.php?id=<?php echo $order['OrderID']; ?>">View</a> |
                    <a href="delete_order.php?id=<?php echo $order['OrderID']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
