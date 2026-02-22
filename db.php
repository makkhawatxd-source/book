<?php
$servername = getenv('DB_HOST') ?: "mariadb"; // รองรับ Railway (DB_HOST) และ Docker (mariadb)
$username = getenv('DB_USER') ?: "root";
$password = getenv('DB_PASSWORD') ?: "bncc2026";
$dbname = getenv('DB_NAME') ?: "crud_demo";
$port = getenv('DB_PORT') ?: 3306;

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// ตั้งค่าภาษาไทย
$conn->set_charset("utf8mb4");
?>