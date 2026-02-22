<?php require 'db.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>ระบบ CRUD พื้นฐาน</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>รายชื่อผู้ใช้</h2>
    <a href="create.php">Create + เพิ่มข้อมูลใหม่</a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อ-นามสกุล</th>
                <th>ชื่อเล่น</th>
                <th>เบอร์โทร</th>
                <th>ว/ด/ป เกิด</th>
                <th>ที่อยู่</th>
                <th>อีเมล</th>
                <th>จัดการ</th>
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
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['firstname']) . " " . htmlspecialchars($row['lastname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nickname'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['dob'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($address) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>";
                    echo "<a href='edit.php?id=" . $row['id'] . "'>Edit (แก้ไข)</a> | ";
                    echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"ยืนยันการลบ?\")'>Delete (ลบ)</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>ไม่พบข้อมูล</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>