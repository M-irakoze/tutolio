<?php
// Database configuration for Programming Tutorials Platform
// Supports both local development and TiDB production

// Load environment variables from .env file if it exists
if (file_exists(__DIR__ . '/../.env')) {
    $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && !str_starts_with($line, '#')) {
            list($key, $value) = explode('=', $line, 2);
            $value = trim($value, '"');
            $_ENV[trim($key)] = $value;
            putenv(trim($key) . '=' . $value);
        }
    }
}

// Get environment variables or use defaults
$db_host = $_ENV['DB_HOST'] ?? "gateway01.eu-central-1.prod.aws.tidbcloud.com";
$db_port = $_ENV['DB_PORT'] ?? '4000';
$db_name = $_ENV['DB_NAME'] ?? 'tutorials_platform';
$db_user = $_ENV['DB_USER'] ?? '4FpxFa9rDe6N6p4.root';
$db_pass = $_ENV['DB_PASS'] ?? 'nVqQt9d1DCLuD0z1';

// For TiDB, you might need SSL settings
$ssl_ca = $_ENV['DB_SSL_CA'] ?? null;
$ssl_cert = $_ENV['DB_SSL_CERT'] ?? null;
$ssl_key = $_ENV['DB_SSL_KEY'] ?? null;

// Create DSN string
$dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8mb4";

// Add SSL settings for TiDB if provided
if ($ssl_ca && $ssl_cert && $ssl_key) {
    $dsn .= ";ssl_mode=VERIFY_CA;ssl_ca=$ssl_ca;ssl_cert=$ssl_cert;ssl_key=$ssl_key";
}

try {
    // Create PDO connection (more secure and flexible than mysqli)
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    
    // For backward compatibility, also create mysqli connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    // Set charset for mysqli
    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
    // Log error and show user-friendly message
    error_log("Database connection error: " . $e->getMessage());
    die("Database connection failed. Please check your configuration.");
}

// Function to get PDO connection
function getPDO() {
    global $pdo;
    return $pdo;
}

// Function to get MySQLi connection  
function getMySQLi() {
    global $conn;
    return $conn;
}
?>
