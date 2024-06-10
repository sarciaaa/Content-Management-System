<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "cms";

try {
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Something went wrong. Database is not connected; Error: " . $e->getMessage());
}
?>
