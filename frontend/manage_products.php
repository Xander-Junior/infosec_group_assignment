<?php
require_once __DIR__ . '/../backend/config/database.php';

$query = "SELECT * FROM Products";
$stmt = $pdo->query($query);
$products = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
    <link rel="stylesheet" href="path/to/your/css/style.css"> <!-- Adjust the path as necessary -->
</head>
<body>
    <h1>Product Management</h1>
    <a href="add_product.php">Add New Product</a> <!-- Link to your 'Add Product' form -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['ProductID']); ?></td>
                <td><?php echo htmlspecialchars($product['Name']); ?></td>
                <td><?php echo htmlspecialchars($product['Description']); ?></td>
                <td><?php echo htmlspecialchars($product['Price']); ?></td>
                <td><?php echo htmlspecialchars($product['StockQuantity']); ?></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $product['ProductID']; ?>">Edit</a> |
                    <a href="delete_product.php?id=<?php echo $product['ProductID']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
