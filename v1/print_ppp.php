<?php
$id = $_GET['id'];
$conn = new mysqli("localhost", "root", "", "dve_ppp");
$conn->set_charset("utf8mb4");

// ดึงข้อมูลหลัก
$main = $conn->query("SELECT * FROM ppp_forms WHERE id = $id")->fetch_assoc();
// ดึงข้อมูลรายการความต้องการ
$requests = $conn->query("SELECT * FROM student_requests WHERE form_id = $id");
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Print PPP-002 - <?= $main['company_name'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap');
        body { font-family: 'Sarabun', sans-serif; font-size: 14px; line-height: 1.6; }
        .print-area { width: 210mm; min-height: 297mm; padding: 20px; margin: auto; background: white; }
        .dotted-line { border-bottom: 1px dotted #000; display: inline-block; min-width: 100px; padding: 0 5px; }
        .title { font-weight: bold; text-align: center; margin-bottom: 20px; }
        
        @media print {
            .no-print { display: none; }
            body { background: none; }
            .print-area { width: 100%; padding: 0; }
        }
    </style>
</head>
<body>

<div class="no-print text-center my-3">
    <button onclick="window.print()" class="btn btn-primary btn-lg">กดเพื่อพิมพ์เอกสาร (Print)</button>
</div>

<div class="print-area">
    <div class="text-end fw-bold">PPP-002</div>
    <div class="title">ข้อมูลการประสานความร่วมมือระหว่างภาครัฐและเอกชน<br>(Public-Private-Partnership : PPP)</div>

    <p>ชื่อสถานศึกษาที่ดำเนินการ <span class="dotted-line"><?= $main['college_name'] ?></span> จังหวัด <span class="dotted-line"><?= $main['province_college'] ?></span></p>
    <p>วันที่ดำเนินการ <span class="dotted-line"><?= date('d/m/Y', strtotime($main['operation_date'])) ?></span></p>

    <h5 class="fw-bold mt-4">ข้อมูลพื้นฐาน</h5>
    <div class="row">
        <div class="col-8">ชื่อสถานประกอบการ: <span class="dotted-line"><?= $main['company_name'] ?></span></div>
        <div class="col-4">จังหวัด: <span class="dotted-line"><?= $main['company_province'] ?></span></div>
        <div class="col-12">ภาค: <span class="dotted-line"><?= $main['region'] ?></span></div>
        <div class="col-12">ที่อยู่: <span class="dotted-line"><?= $main['address'] ?></span></div>
        <div class="col-6">โทรศัพท์: <span class="dotted-line"><?= $main['phone'] ?></span></div>
        <div class="col-6">E-mail: <span class="dotted-line"><?= $main['email'] ?></span></div>
        <div class="col-12">ผู้ประสานงาน: <span class="dotted-line"><?= $main['coordinator_name'] ?></span></div>
    </div>

    <h5 class="fw-bold mt-4">๑. และ ๒. ข้อมูลความต้องการกำลังคน</h5>
    <table class="table table-bordered border-dark">
        <thead>
            <tr class="text-center">
                <th>ประเภท</th>
                <th>ระดับ</th>
                <th>สาขาวิชา</th>
                <th>ตำแหน่งงาน</th>
                <th>ชาย</th>
                <th>หญิง</th>
            </tr>
        </thead>
        <tbody>
            <?php while($req = $requests->fetch_assoc()): ?>
            <tr>
                <td><?= $req['work_type'] == 'internship' ? 'ฝึกงาน' : 'ทวิภาคี' ?></td>
                <td><?= $req['edu_level'] ?></td>
                <td><?= $req['major'] ?></td>
                <td><?= $req['job_description'] ?></td>
                <td class="text-center"><?= $req['amount_male'] ?></td>
                <td class="text-center"><?= $req['amount_female'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h5 class="fw-bold mt-4">๓. การรับครูของสถานศึกษา</h5>
    <p><?= $main['accept_teacher'] ? '☑ ประสงค์รับครู สาขา: '.$main['teacher_major'] : '☐ ไม่ประสงค์รับครู' ?></p>

    <h5 class="fw-bold mt-4">๔. สวัสดิการ/ค่าตอบแทน</h5>
    <p>รายละเอียด: <span class="dotted-line"><?= $main['welfare_other'] ?></span></p>

    <h5 class="fw-bold mt-4">๕. ข้อสรุปจากการประชุม</h5>
    <p class="border p-2" style="min-height: 100px;"><?= nl2br($main['meeting_summary']) ?></p>

    <div class="row mt-5 text-center">
        <div class="col-6 offset-6">
            <p>ลงชื่อ.......................................................... ผู้รับรองข้อมูล</p>
            <p>(..........................................................)</p>
            <p>ตำแหน่ง..........................................................</p>
        </div>
    </div>
</div>

</body>
</html>