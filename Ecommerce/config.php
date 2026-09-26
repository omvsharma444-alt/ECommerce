<?php
// Application configuration. Update these values only when your XAMPP MySQL credentials differ.
define('DB_HOST', 'localhost'); define('DB_NAME', 'ecommerce_db'); define('DB_USER', 'root'); define('DB_PASS', '');
define('BASE_URL', '/Ecommerce'); // Change this if the project folder has a different name in htdocs.
if (session_status() === PHP_SESSION_NONE) session_start();
try { $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]); }
catch (PDOException $e) { $pdo = null; }
?>
