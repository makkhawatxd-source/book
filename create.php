<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $address_no = $_POST['address_no'];
    $moo = $_POST['moo'];
    $soi = $_POST['soi'];
    $road = $_POST['road'];
    $subdistrict = $_POST['subdistrict'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $email = $_POST['email'];

    // ใช้ Prepared Statement เพื่อความปลอดภัย
    $sql = "INSERT INTO users (firstname, lastname, nickname, phone, dob, address_no, moo, soi, road, subdistrict, district, province, zipcode, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $oper = $conn->prepare($sql);
    $oper->bind_param("ssssssssssssss", $firstname, $lastname, $nickname, $phone, $dob, $address_no, $moo, $soi, $road, $subdistrict, $district, $province, $zipcode, $email);

    if ($oper->execute()) {
        header("Location: index.php"); // บันทึกเสร็จกลับไปหน้าแรก
        exit();
    } else {
        echo "Error: " . $oper->error;
    }
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูล</title>
</head>

<body>
    <h2>เพิ่มผู้ใช้ใหม่</h2>
    <form action="create.php" method="POST">
        <label>ชื่อ:</label>
        <input type="text" name="firstname" required><br>
        <label>นามสกุล:</label>
        <input type="text" name="lastname" required><br>
        <label>ชื่อเล่น:</label>
        <input type="text" name="nickname"><br>
        <label>เบอร์โทร:</label>
        <input type="text" name="phone"><br>
        <label>วัน เดือน ปี เกิด:</label>
        <input type="date" name="dob"><br>
        <label>ที่อยู่ บ้านเลขที่:</label>
        <input type="text" name="address_no"><br>
        <label>หมู่ที่:</label>
        <input type="text" name="moo"><br>
        <label>ซอย:</label>
        <input type="text" name="soi"><br>
        <label>ถนน:</label>
        <input type="text" name="road"><br>
        <label>ตำบล:</label>
        <input type="text" name="subdistrict"><br>
        <label>อำเภอ:</label>
        <input type="text" name="district"><br>
        <label>จังหวัด:</label>
        <input type="text" name="province"><br>
        <label>รหัสไปรษณีย์:</label>
        <input type="text" name="zipcode"><br>
        <label>อีเมล:</label>
        <input type="email" name="email" required><br><br>
        <button type="submit">บันทึกข้อมูล</button>
        <a href="index.php">กลับหน้าแรก</a>
    </form>
</body>

</html>