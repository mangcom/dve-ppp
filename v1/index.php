<?php
// เชื่อมต่อฐานข้อมูลเพื่อดึงรายชื่อนิคมฯ
$conn = new mysqli("localhost", "root", "", "dve_ppp");
$conn->set_charset("utf8mb4");
$estates_query = $conn->query("SELECT estate_name FROM industrial_estates ORDER BY estate_name ASC");
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dve-ppp | แบบฟอร์ม PPP-002</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f6f9; color: #333; }
        .main-card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        .header-box { background: #003366; color: white; padding: 25px; border-radius: 12px 12px 0 0; }
        .section-title { font-weight: bold; color: #003366; border-bottom: 2px solid #003366; padding-bottom: 5px; margin-top: 35px; margin-bottom: 20px; font-size: 1.2rem; }
        .bg-custom-light { background-color: #ffffff; border: 1px solid #dee2e6; border-radius: 8px; padding: 25px; margin-bottom: 20px; }
        .form-label { font-weight: 600; color: #444; }
        .btn-add { border-radius: 20px; font-weight: bold; }
        .request-item { border-left: 5px solid #198754; margin-bottom: 15px; }
        /* บังคับให้ Select2 ยืดหยุ่นตาม Container */
        .select2-container {
            width: 100% !important;
        }

        /* ปรับตำแหน่ง Dropdown ให้พอดีกับขอบ */
        .select2-container--bootstrap-5 .select2-dropdown {
            max-width: 100% !important;
            overflow-x: hidden;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
</head>
<body>

<div class="container py-5">
    <form action="save_ppp.php" method="POST">
        <div class="card main-card">
            <div class="header-box text-center">
                <h4 class="mb-1">แบบฟอร์ม PPP-002</h4>
                <p class="mb-0 opacity-75">ข้อมูลการประสานความร่วมมือระหว่างภาครัฐและเอกชน (Public-Private-Partnership)</p>
            </div>
            
            <div class="card-body p-4 p-md-5">
                <div class="row g-3 mb-4">
                    <div class="col-md-7">
                        <label class="form-label">ชื่อสถานศึกษาที่ดำเนินการ</label>
                        <input type="text" name="college_name" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">จังหวัด</label>
                        <input type="text" name="province_college" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">วันที่ดำเนินการ</label>
                        <input type="date" name="operation_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>

                <div class="section-title">๑. ข้อมูลพื้นฐาน</div>
                <div class="bg-custom-light shadow-sm">
                    <div class="row g-3">
                        <div class="col-md-9">
                            <label class="form-label">ชื่อสถานประกอบการ</label>
                            <input type="text" name="company_name" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">จังหวัด</label>
                            <input type="text" name="company_province" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">ภาค</label>
                            <input type="text" name="region" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">เลขประจำตัวผู้เสียภาษี (ถ้ามี)</label>
                            <input type="text" name="tax_id" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">ที่อยู่</label>
                            <textarea name="address" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">หมายเลขโทรศัพท์</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">E - mail</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <!-- <div class="col-md-12">
                            <label class="form-label">ภายใต้นิคมอุตสาหกรรม</label>
                            <input type="text" name="industrial_estate" class="form-control">
                        </div> -->
                        <div class="col-md-12">
                        <label class="form-label">ภายใต้นิคมอุตสาหกรรม</label>
                            <select name="industrial_estate" id="industrial_estate" class="form-select select2-dropdown">
                                <option value="">-- ไม่ได้อยู่ในนิคมอุตสาหกรรม / ระบุชื่อเอง --</option>
                                <?php while($estate = $estates_query->fetch_assoc()): ?>
                                    <option value="<?= htmlspecialchars($estate['estate_name']) ?>">
                                        <?= htmlspecialchars($estate['estate_name']) ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">ผู้ประสานงานของสถานประกอบการ</label>
                            <input type="text" name="coordinator_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ตำแหน่ง</label>
                            <input type="text" name="coordinator_position" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">โทรศัพท์</label>
                            <input type="text" name="coordinator_phone" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">ID Line</label>
                            <input type="text" name="line_id" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="section-title">๒. ข้อมูลความต้องการกำลังคน (ฝึกงาน / ทวิภาคี)</div>
                <div id="request_container"></div>
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-success btn-add px-4 shadow-sm" onclick="addRequestRow()">
                        <i class="bi bi-plus-circle"></i> เพิ่มข้อมูลสาขาวิชา
                    </button>
                </div>

                <div class="section-title">๓. การรับครูของสถานศึกษา</div>
                <div class="bg-custom-light">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="accept_teacher" id="t_yes" value="1">
                        <label class="form-check-label fw-bold" for="t_yes">ประสงค์รับครูของสถานศึกษาเข้าฝึกประสบการณ์อาชีพในสถานประกอบการ</label>
                    </div>
                    <div class="mb-3 ms-4">
                        <input type="text" name="teacher_major" class="form-control" placeholder="ระบุสาขาวิชาที่ประสงค์รับการเข้าฝึก">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="accept_teacher" id="t_no" value="0" checked>
                        <label class="form-check-label fw-bold" for="t_no">ไม่ประสงค์รับครูของสถานศึกษาเข้าฝึกประสบการณ์อาชีพในสถานประกอบการ</label>
                    </div>
                </div>

                <div class="section-title">๔. สวัสดิการ/ค่าตอบแทน ที่ได้รับ</div>
                <div class="bg-custom-light">
                    <div class="row g-3">
                        <div class="col-md-4"><div class="form-check"><input class="form-check-input" type="checkbox" name="welfare[]" value="scholarship"> ทุนการศึกษา/ปีการศึกษา</div></div>
                        <div class="col-md-4"><div class="form-check"><input class="form-check-input" type="checkbox" name="welfare[]" value="allowance"> เบี้ยเลี้ยง</div></div>
                        <div class="col-md-4"><div class="form-check"><input class="form-check-input" type="checkbox" name="welfare[]" value="accommodation"> ที่พัก</div></div>
                        <div class="col-md-4"><div class="form-check"><input class="form-check-input" type="checkbox" name="welfare[]" value="uniform"> ชุดยูนิฟอร์ม</div></div>
                        <div class="col-md-4"><div class="form-check"><input class="form-check-input" type="checkbox" name="welfare[]" value="insurance"> ค่าประกันอุบัติเหตุ</div></div>
                        <div class="col-md-12">
                            <label class="small fw-bold">อื่น ๆ ระบุ</label>
                            <input type="text" name="welfare_other" class="form-control mt-1">
                        </div>
                    </div>
                </div>

                <div class="section-title">๕. ข้อสรุป</div>
                <div class="row g-4">
                    <div class="col-md-12">
                        <label class="form-label text-primary">ข้อสรุปจากการประชุมร่วมกับสถานประกอบการ (โปรดระบุ เป็นข้อ ๆ)</label>
                        <textarea name="meeting_summary" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="section-title">๖. ข้อเสนอแนะ</div>
                <div class="row g-4">
                    <div class="col-md-12">
                        <label class="form-label text-primary">ข้อเสนอแนะ ข้อคิดเห็นเพิ่มเติม จากการหารือ ปรับปรุง พัฒนาการจัดการเรียนการสอน</label>
                        <textarea name="suggestions" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="mt-5 text-center border-top pt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow">บันทึกข้อมูลระบบ dve-ppp</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#industrial_estate').select2({
        theme: 'bootstrap-5',
        placeholder: 'ค้นหาหรือเลือกรายชื่อนิคมอุตสาหกรรม...',
        allowClear: true,
        tags: true,
        width: '100%' // เพิ่มบรรทัดนี้เพื่อแก้ปัญหาการล้นขอบ
    });
});
</script>
<script>
    let rowIdx = 0;
    function addRequestRow() {
        const container = document.getElementById('request_container');
        const div = document.createElement('div');
        div.className = 'card request-item shadow-sm bg-white mb-3';
        div.innerHTML = `
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="small fw-bold">ประเภท</label>
                        <select name="work_type[]" class="form-select">
                            <option value="internship">๑. ฝึกงานปกติ</option>
                            <option value="dual">๒. ฝึกอาชีพ (ทวิภาคี)</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="small fw-bold">ระดับชั้น</label>
                        <select name="edu_level[]" class="form-select">
                            <option value="VEC">ปวช.</option>
                            <option value="HVEC">ปวส.</option>
                        </select>
                    </div>
                    <div class="col-md-4 text-end">
                        <button type="button" class="btn btn-outline-danger btn-sm border-0" onclick="this.closest('.card').remove()">ลบรายการ</button>
                    </div>
                    <div class="col-md-6">
                        <label class="small fw-bold">สาขาวิชา</label>
                        <input type="text" name="major[]" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="small fw-bold">ชาย (คน)</label>
                        <input type="number" name="m[]" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="small fw-bold">หญิง (คน)</label>
                        <input type="number" name="f[]" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="small fw-bold">ตำแหน่งงาน/ลักษณะงานที่ได้รับมอบหมาย</label>
                        <input type="text" name="job[]" class="form-control">
                    </div>
                    <div class="col-12 mt-2 pt-2 border-top">
                        <label class="small fw-bold mb-2">ประสงค์รับผู้เรียนที่มีความพิการ (ระบุถ้าต้องการ)</label>
                        <div class="row g-2">
                            <div class="col-6 col-md-3 small"><input type="checkbox" name="dis[${rowIdx}][]" value="vision"> การเห็น</div>
                            <div class="col-6 col-md-3 small"><input type="checkbox" name="dis[${rowIdx}][]" value="hearing"> การได้ยิน</div>
                            <div class="col-6 col-md-3 small"><input type="checkbox" name="dis[${rowIdx}][]" value="physical"> ร่างกาย</div>
                            <div class="col-6 col-md-3 small"><input type="checkbox" name="dis[${rowIdx}][]" value="autistic"> ออทิสติก</div>
                        </div>
                    </div>
                </div>
            </div>`;
        container.appendChild(div);
        rowIdx++;
    }
    window.onload = addRequestRow;
</script>

</body>
</html>