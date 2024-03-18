<?php

require_once '../config/database.php';

// Start session
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrPhone = $_POST['email_or_phone'];
    $password = $_POST['password'];

    // Adjusted SQL query to fetch the user by email or phone along with their role
// Adjusted SQL query to fetch the user by email
    $sql = "SELECT UserID, email, password, Role FROM Users WHERE email = :emailOrPhone";

    // Prepare statement
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':emailOrPhone', $emailOrPhone, PDO::PARAM_STR);
    
    // Execute the statement
    $stmt->execute();

    // Fetch the user
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists
    if ($user) {
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start user session
            $_SESSION['user_id'] = $user['UserID'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['Role']; // Store user role in session

            // Redirect based on role
            switch ($_SESSION['user_role']) {
                case 'Administrator':
                    header('Location: ../../frontend/dashboard.php');
                    break;
                case 'Sales Personnel':
                    header('Location: ../../frontend/sales_dashboard.php');
                    break;
                case 'Inventory Manager':
                    header('Location: ../../frontend/inventory_dashboard.php');
                    break;
                case 'Customer':
                    header('Location: ../../frontend/customer_dashboard.php');
                    break;
                default:
                    // Handle unexpected role
                    echo "Access Denied.";
                    break;
            }
            exit;
        } else {
            // Authentication failed: wrong password
            echo "Invalid login credentials.";
        }
    } else {
        // Authentication failed: user not found
        echo "Invalid login credentials.";
    }
} else {
    // Not a POST request, handle accordingly or show the login form
    echo "Please submit the login form.";
}
?>
