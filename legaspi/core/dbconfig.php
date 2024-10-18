<?php
$host = "localhost";
$user = "root";
$password = "";  // If you have set a password for root, put it here
$dbname = "legaspi";
$dsn = "mysql:host={$host};dbname={$dbname}";

try {
    $pdo = new PDO($dsn, $user, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ));
    $pdo->exec("SET time_zone = '+08:00';");
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}