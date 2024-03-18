<?php
require_once '../config/database.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Basic validation
    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Determine role based on email domain
    $domain = substr(strrchr($email, "@"), 1);
    $role = 'Customer'; // Default role
    switch ($domain) {
        case 'admin.com':
            $role = 'Administrator';
            break;
        case 'invent.com':
            $role = 'Inventory Manager';
            break;
        case 'sales.com':
            $role = 'Sales Personnel';
            break;
        // Add more cases as needed
    }

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT email FROM Users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        die("Email already in use.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user with determined role
    $stmt = $pdo->prepare("INSERT INTO Users (Name, Email, Password, Role) VALUES (?, ?, ?, ?)");
    $result = $stmt->execute([$name, $email, $hashedPassword, $role]);

    if ($result) {
        // Redirect or display success message
        header("Location: ../../frontend/index.php"); // Example redirection to login page
        exit();
    } else {
        echo "An error occurred. Please try again.";
    }
} else {
    // Not a POST request
    echo "Please submit the form.";
}
?>
