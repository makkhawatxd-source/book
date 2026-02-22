<?php require 'db.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบสมุดโทรศัพท์ - Phonebook</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table-responsive {
            overflow-x: auto;
        }

        td {
            align-content: center;
        }

        /* ให้เนื้อหาตรงกลางแนวตั้ง */
    </style>
</head>

<body>
    <div class="container-fluid mt-5 px-4 pb-5">
        <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
            <h2 class="text-primary m-0"><i class="bi bi-journal-bookmark-fill me-2"></i>รายชื่อผู้ใช้ในสมุดโทรศัพท์
            </h2>
            <a href="create.php" class="btn btn-success"><i
                    class="bi bi-person-plus-fill me-2"></i>เพิ่มข้อมูลผู้ใช้ใหม่</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">ID</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>ชื่อเล่น</th>
                                <th>เบอร์โทร</th>
                                <th>ว/ด/ป เกิด</th>
                                <th>ที่อยู่</th>
                                <th>อีเมล</th>
                                <th class="text-center" style="min-width: 150px;">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM users";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $address = "";
                                    if (!empty($row['address_no']))
                                        $address .= $row['address_no'] . " ";
                                    if (!empty($row['moo']))
                                        $address .= "ม." . $row['moo'] . " ";
                                    if (!empty($row['soi']))
                                        $address .= "ซ." . $row['soi'] . " ";
                                    if (!empty($row['road']))
                                        $address .= "ถ." . $row['road'] . " ";
                                    if (!empty($row['subdistrict']))
                                        $address .= "ต." . $row['subdistrict'] . " ";
                                    if (!empty($row['district']))
                                        $address .= "อ." . $row['district'] . " ";
                                    if (!empty($row['province']))
                                        $address .= "จ." . $row['province'] . " ";
                                    if (!empty($row['zipcode']))
                                        $address .= $row['zipcode'];

                                    echo "<tr>";
                                    echo "<td class='text-center fw-bold'>" . htmlspecialchars($row['id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['firstname']) . " " . htmlspecialchars($row['lastname']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['nickname'] ?? '-') . "</td>";
                                    echo "<td><a href='tel:" . htmlspecialchars($row['phone'] ?? '') . "' class='text-decoration-none'>" . htmlspecialchars($row['phone'] ?? '-') . "</a></td>";
                                    echo "<td>" . htmlspecialchars($row['dob'] ?? '-') . "</td>";
                                    echo "<td><small>" . htmlspecialchars($address != "" ? $address : "-") . "</small></td>";
                                    echo "<td><a href='mailto:" . htmlspecialchars($row['email']) . "' class='text-decoration-none'>" . htmlspecialchars($row['email']) . "</a></td>";
                                    echo "<td class='text-center'>";
                                    echo "<div class='btn-group btn-group-sm' role='group'>";
                                    echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-outline-warning' title='แก้ไขข้อมูล'><i class='bi bi-pencil-square'></i></a>";
                                    echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"คุณยืนยันที่จะลบข้อมูลของ " . htmlspecialchars($row['firstname']) . " ใช่หรือไม่?\")' class='btn btn-outline-danger' title='ลบข้อมูล'><i class='bi bi-trash-fill'></i></a>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8' class='text-center text-muted py-4'><i class='bi bi-inbox fs-2 d-block mb-3'></i>ไม่พบข้อมูลในระบบ</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>