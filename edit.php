<?php
require 'db.php';

// ส่วน Update ข้อมูลเมื่อกดปุ่ม Submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
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

    $sql = "UPDATE users SET firstname=?, lastname=?, nickname=?, phone=?, dob=?, address_no=?, moo=?, soi=?, road=?, subdistrict=?, district=?, province=?, zipcode=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssi", $firstname, $lastname, $nickname, $phone, $dob, $address_no, $moo, $soi, $road, $subdistrict, $district, $province, $zipcode, $email, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// ส่วนดึงข้อมูลเก่ามาแสดงในฟอร์ม (GET Request)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูล</title>
</head>

<body>
    <h2>แก้ไขข้อมูลผู้ใช้</h2>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <label>ชื่อ:</label>
        <input type="text" name="firstname" value="<?php echo $data['firstname']; ?>" required><br>

        <label>นามสกุล:</label>
        <input type="text" name="lastname" value="<?php echo $data['lastname']; ?>" required><br>

        <label>ชื่อเล่น:</label>
        <input type="text" name="nickname" value="<?php echo $data['nickname']; ?>"><br>

        <label>เบอร์โทร:</label>
        <input type="text" name="phone" value="<?php echo $data['phone']; ?>"><br>

        <label>วัน เดือน ปี เกิด:</label>
        <input type="date" name="dob" value="<?php echo $data['dob']; ?>"><br>

        <label>ที่อยู่ บ้านเลขที่:</label>
        <input type="text" name="address_no" value="<?php echo $data['address_no']; ?>"><br>

        <label>หมู่ที่:</label>
        <input type="text" name="moo" value="<?php echo $data['moo']; ?>"><br>

        <label>ซอย:</label>
        <input type="text" name="soi" value="<?php echo $data['soi']; ?>"><br>

        <label>ถนน:</label>
        <input type="text" name="road" value="<?php echo $data['road']; ?>"><br>

        <label>ตำบล:</label>
        <input type="text" name="subdistrict" value="<?php echo $data['subdistrict']; ?>"><br>

        <label>อำเภอ:</label>
        <input type="text" name="district" value="<?php echo $data['district']; ?>"><br>

        <label>จังหวัด:</label>
        <input type="text" name="province" value="<?php echo $data['province']; ?>"><br>

        <label>รหัสไปรษณีย์:</label>
        <input type="text" name="zipcode" value="<?php echo $data['zipcode']; ?>"><br>

        <label>อีเมล:</label>
        <input type="email" name="email" value="<?php echo $data['email']; ?>" required><br><br>

        <button type="submit">อัปเดตข้อมูล</button>
        <a href="index.php">ยกเลิก</a>
    </form>
</body>

</html>