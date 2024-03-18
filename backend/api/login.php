<?php

require_once '../config/database.php';

// Start session
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrPhone = $_POST['email_or_phone'];
    $password = $_POST['password'];

    // SQL query to fetch the user by email or phone
    $sql = "SELECT * FROM Users WHERE email = :emailOrPhone OR phone = :emailOrPhone";

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
            $_SESSION['user_id'] = $user['UserID']; // It's safer to store user ID in session
            $_SESSION['user_email'] = $user['email']; // Storing email as well for ease of use
            // Redirect to dashboard or return success response
            header('Location: dashboard.php');
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
