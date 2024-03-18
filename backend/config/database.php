<?php


// Load Composer's autoloader and environment variables
require_once '/Applications/XAMPP/xamppfiles/htdocs/infosec_group_assignment/vendor/autoload.php';

// Initialize Dotenv library
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

// Database configuration using environment variables
$host = $_ENV['DB_HOST'] ?? '127.0.0.1'; // Fallback to '127.0.0.1' if not set
$db   = $_ENV['DB_DATABASE'] ?? 'QuickShop'; // Fallback to 'QuickShop' if not set
$user = $_ENV['DB_USERNAME'] ?? 'root'; // Fallback to 'root' if not set
$pass = $_ENV['DB_PASSWORD'] ?? ''; // Fallback to empty string if not set
$charset = $_ENV['DB_CHARSET'] ?? 'utf8mb4'; // Fallback to 'utf8mb4' if not set

// Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Options for PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Create a PDO instance (connect to the database)
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Use $pdo to interact with the database
?>
