<?php
$host = 'localhost';
$dbname = 'studdb';
$username = 'root';
$password = '';
 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>