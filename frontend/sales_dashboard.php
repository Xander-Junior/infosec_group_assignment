<?php
// Assuming user authentication and role verification is done beforehand

// Placeholder function for retrieving orders
function fetchOrdersForSalesPersonnel() {
    // Example return structure
    return [
        ['id' => 1, 'customer' => 'John Doe', 'total' => 150.00, 'status' => 'Shipped'],
        ['id' => 2, 'customer' => 'Jane Smith', 'total' => 200.00, 'status' => 'Processing'],
        // Add more orders as needed
    ];
}

$orders = fetchOrdersForSalesPersonnel();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sales Dashboard</title>
    <style>
        /* Example CSS for basic styling */
        body { font-family: Arial, sans-serif; }
        section { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 8px; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Sales Dashboard</h1>
    <section>
        <h2>Order Management</h2>
        <?php if (!empty($orders)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['id']); ?></td>
                            <td><?php echo htmlspecialchars($order['customer']); ?></td>
                            <td>$<?php echo htmlspecialchars(number_format($order['total'], 2)); ?></td>
                            <td><?php echo htmlspecialchars($order['status']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </section>
    <section>
        <h2>Sales Reports</h2>
        <p>View reports on sales performance and trends.</p>
        <!-- Sales report summaries -->
    </section>
</body>
</html>
