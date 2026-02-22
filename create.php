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
        echo "<div class='alert alert-danger'>Error: " . $oper->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เพิ่มข้อมูลผู้ใช้ใหม่ - ระบบสมุดโทรศัพท์</title>
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
                    <div class="card-header bg-success text-white">
                        <h4 class="m-0"><i class="bi bi-person-plus-fill me-2"></i>เพิ่มข้อมูลผู้ใช้ใหม่</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="create.php" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">ชื่อ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="firstname" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">นามสกุล <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lastname" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">ชื่อเล่น</label>
                                    <input type="text" class="form-control" name="nickname">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">เบอร์โทร</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">วัน เดือน ปี เกิด</label>
                                    <input type="date" class="form-control" name="dob">
                                </div>
                            </div>

                            <hr class="my-4">
                            <h5 class="mb-3 text-secondary"><i class="bi bi-geo-alt-fill me-2"></i>ข้อมูลที่อยู่</h5>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">บ้านเลขที่</label>
                                    <input type="text" class="form-control" name="address_no">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label fw-bold">หมู่ที่</label>
                                    <input type="text" class="form-control" name="moo">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">ซอย</label>
                                    <input type="text" class="form-control" name="soi">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">ถนน</label>
                                    <input type="text" class="form-control" name="road">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">ตำบล/แขวง</label>
                                    <input type="text" class="form-control" name="subdistrict">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">อำเภอ/เขต</label>
                                    <input type="text" class="form-control" name="district">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">จังหวัด</label>
                                    <input type="text" class="form-control" name="province">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control" name="zipcode">
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="mb-4">
                                <label class="form-label fw-bold">อีเมล <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="index.php" class="btn btn-secondary px-4"><i
                                        class="bi bi-arrow-left me-2"></i>กลับหน้าแรก</a>
                                <button type="submit" class="btn btn-success px-4"><i
                                        class="bi bi-save me-2"></i>บันทึกข้อมูล</button>
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