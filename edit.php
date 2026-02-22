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
        echo "<div class='alert alert-danger'>Error updating record: " . $conn->error . "</div>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แก้ไขข้อมูลผู้ใช้ - ระบบสมุดโทรศัพท์</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-warning">
                        <h4 class="m-0"><i class="bi bi-pencil-square me-2"></i>แก้ไขข้อมูลผู้ใช้</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="edit.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">ชื่อ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="firstname"
                                        value="<?php echo htmlspecialchars($data['firstname']); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">นามสกุล <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lastname"
                                        value="<?php echo htmlspecialchars($data['lastname']); ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">ชื่อเล่น</label>
                                    <input type="text" class="form-control" name="nickname"
                                        value="<?php echo htmlspecialchars($data['nickname'] ?? ''); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">เบอร์โทร</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="<?php echo htmlspecialchars($data['phone'] ?? ''); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">วัน เดือน ปี เกิด</label>
                                    <input type="date" class="form-control" name="dob"
                                        value="<?php echo htmlspecialchars($data['dob'] ?? ''); ?>">
                                </div>
                            </div>

                            <hr class="my-4">
                            <h5 class="mb-3 text-secondary"><i class="bi bi-geo-alt-fill me-2"></i>ข้อมูลที่อยู่</h5>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">บ้านเลขที่</label>
                                    <input type="text" class="form-control" name="address_no"
                                        value="<?php echo htmlspecialchars($data['address_no'] ?? ''); ?>">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label fw-bold">หมู่ที่</label>
                                    <input type="text" class="form-control" name="moo"
                                        value="<?php echo htmlspecialchars($data['moo'] ?? ''); ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">ซอย</label>
                                    <input type="text" class="form-control" name="soi"
                                        value="<?php echo htmlspecialchars($data['soi'] ?? ''); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">ถนน</label>
                                    <input type="text" class="form-control" name="road"
                                        value="<?php echo htmlspecialchars($data['road'] ?? ''); ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">ตำบล/แขวง</label>
                                    <input type="text" class="form-control" name="subdistrict"
                                        value="<?php echo htmlspecialchars($data['subdistrict'] ?? ''); ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">อำเภอ/เขต</label>
                                    <input type="text" class="form-control" name="district"
                                        value="<?php echo htmlspecialchars($data['district'] ?? ''); ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">จังหวัด</label>
                                    <input type="text" class="form-control" name="province"
                                        value="<?php echo htmlspecialchars($data['province'] ?? ''); ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control" name="zipcode"
                                        value="<?php echo htmlspecialchars($data['zipcode'] ?? ''); ?>">
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="mb-4">
                                <label class="form-label fw-bold">อีเมล <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email"
                                    value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="index.php" class="btn btn-secondary px-4"><i
                                        class="bi bi-x-circle me-2"></i>ยกเลิก</a>
                                <button type="submit" class="btn btn-warning px-4"><i
                                        class="bi bi-check2-square me-2"></i>อัปเดตข้อมูล</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>