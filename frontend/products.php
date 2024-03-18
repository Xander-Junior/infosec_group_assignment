<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
    <link rel="stylesheet" href="style.css"> <!-- Ensure you replace 'style.css' with the actual path to your CSS file -->
</head>
<body>
    <h1>Our Products</h1>
    <div class="product-list">
        <?php
      // Absolute path to the project root directory
$projectRoot = '/Applications/XAMPP/xamppfiles/htdocs/infosec_group_assignment';

// Include the database configuration
require_once $projectRoot . '/backend/config/database.php';


        // Assuming your products table has 'ProductID', 'Name', 'Description', 'Price', 'StockQuantity' columns
        $sql = "SELECT ProductID, Name, Description, Price, StockQuantity FROM Products";
        $result = $pdo->query($sql);

        if ($result && $result->rowCount() > 0) {
            // Output data of each row
            while($row = $result->fetch()) {
                echo "<div class='product'>";
                // Assuming you have a way to resolve image URLs or store them directly in the database
                // echo "<img src='" . $row["image_url"] . "' alt='" . htmlspecialchars($row["Name"]) . "' />";
                echo "<h2>" . htmlspecialchars($row["Name"]) . "</h2>";
                echo "<p>" . htmlspecialchars($row["Description"]) . "</p>";
                echo "<p>Price: $" . htmlspecialchars($row["Price"]) . "</p>";
                // If you want to display stock quantity
                // echo "<p>Stock: " . htmlspecialchars($row["StockQuantity"]) . "</p>";
                echo "</div>";
            }
        } else {
            echo "0 results found.";
        }
        // No need to close connection when using PDO, as it's done automatically
        ?>
    </div>
</body>
</html>
