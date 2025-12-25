<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "dve_ppp");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. บันทึกข้อมูลสถานประกอบการ
    $sql_est = "INSERT INTO establishments (company_name, phone, email, ...) VALUES (?, ?, ?, ...)";
    $stmt = $conn->prepare($sql_est);
    // bind_param และ execute...
    $establishment_id = $conn->insert_id;

    // 2. วนลูปบันทึกความต้องการกำลังคน (รับค่าจาก array ในฟอร์ม)
    foreach ($_POST['majors'] as $major) {
        $sql_req = "INSERT INTO manpower_requests (establishment_id, major, ...) VALUES (?, ?, ...)";
        // bind_param และ execute...
    }
    
    // 3. บันทึกสวัสดิการและสรุปผล
    // ... logic สำหรับ insert เข้าตาราง benefits_and_summary
    
    echo "บันทึกข้อมูลเรียบร้อยแล้ว";
}
?>