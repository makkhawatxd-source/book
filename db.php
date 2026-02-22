<?php
$servername = "mariadb"; // ใช้ service name จาก docker-compose
$username = "root"; // ปกติ XAMPP ใช้ root
$password = "bncc2026";     // รหัสผ่านตามที่ตั้งไว้ใน docker-compose
$dbname = "crud_demo";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// ตั้งค่าภาษาไทย
$conn->set_charset("utf8mb4");
?>