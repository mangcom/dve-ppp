<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "dve_ppp");
$conn->set_charset("utf8mb4");

$sql = "SELECT id, company_name, province_college, operation_date, coordinator_name FROM ppp_forms ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | ระบบ dve-ppp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f8f9fa; }
        .navbar { background-color: #003366; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark mb-4">
    <div class="container">
        <span class="navbar-brand"><i class="bi bi-speedometer2"></i> ระบบจัดการข้อมูล PPP-002</span>
        <a href="index.php" class="btn btn-light btn-sm">+ เพิ่มข้อมูลใหม่</a>
    </div>
</nav>

<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">รายการสถานประกอบการที่บันทึกแล้ว</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>วันที่ดำเนินการ</th>
                        <th>ชื่อสถานประกอบการ</th>
                        <th>จังหวัด</th>
                        <th>ผู้ประสานงาน</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= date('d/m/Y', strtotime($row['operation_date'])) ?></td>
                        <td><?= $row['company_name'] ?></td>
                        <td><?= $row['province_college'] ?></td>
                        <td><?= $row['coordinator_name'] ?></td>
                        <td class="text-center">
                            <a href="print_ppp.php?id=<?= $row['id'] ?>" target="_blank" class="btn btn-outline-dark btn-sm">
                                <i class="bi bi-printer"></i> พิมพ์ PPP-002
                            </a>
                            <button class="btn btn-outline-danger btn-sm" onclick="alert('ฟังก์ชันลบข้อมูล')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>