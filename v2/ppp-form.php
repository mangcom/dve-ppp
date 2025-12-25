<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกข้อมูล PPP-002 | ระบบ DVE PPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f8fafc; color: #1e293b; }
        .label-head { font-weight: 600; color: #334155; font-size: 0.95rem; margin-bottom: 4px; display: block; }
        .input-form { width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 6px; outline: none; font-size: 14px; }
        .input-form:focus { border-color: #2563eb; ring: 2px ring-blue-100; }
        .table-head { background-color: #f1f5f9; font-weight: 600; font-size: 13px; text-align: center; border: 1px solid #e2e8f0; }
        .disability-row { background-color: #fffbeb; border: 1px solid #fef3c7; }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="max-w-6xl mx-auto my-10 px-4 pb-20">
    <form action="save_data.php" method="POST">
        
        <div class="bg-white border-b-4 border-blue-600 p-8 rounded-t-2xl shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold">แบบกรอกข้อมูล PPP-002</h1>
                    <p class="text-slate-500 uppercase text-sm">Public-Private-Partnership Information Form</p>
                </div>
                <div class="text-right">
                    <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-md text-xs font-bold">ปรับปรุง 18 ธ.ค. 68</span>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 shadow-sm space-y-6">
            <h2 class="text-lg font-bold text-blue-800 border-b pb-2 italic">๑. ข้อมูลพื้นฐาน</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-1">
                    <label class="label-head">ชื่อสถานศึกษาที่ดำเนินการ</label>
                    <input type="text" name="college_name" class="input-form" placeholder="ระบุชื่อวิทยาลัย">
                </div>
                <div>
                    <label class="label-head">จังหวัด</label>
                    <input type="text" name="college_province" class="input-form">
                </div>
                <div>
                    <label class="label-head">วันที่ดำเนินการ</label>
                    <input type="date" name="operation_date" class="input-form">
                </div>
                <div class="md:col-span-2">
                    <label class="label-head font-bold">ชื่อสถานประกอบการ</label>
                    <input type="text" name="company_name" class="input-form border-blue-200">
                </div>
                <div>
                    <label class="label-head">เลขประจำตัวผู้เสียภาษี (ถ้ามี)</label>
                    <input type="text" name="tax_id" class="input-form">
                </div>
                <div class="md:col-span-2">
                    <label class="label-head">ที่อยู่</label>
                    <textarea name="address" rows="2" class="input-form"></textarea>
                </div>
                <div>
                    <label class="label-head">หมายเลขโทรศัพท์</label>
                    <input type="text" name="company_phone" class="input-form">
                </div>
                <div class="md:col-span-3 bg-blue-50 p-4 rounded-lg border border-blue-100">
                    <label class="label-head text-blue-800">ภายใต้นิคมอุตสาหกรรม</label>
                    <input type="text" name="industrial_estate" class="input-form bg-white" placeholder="ระบุชื่อนิคมฯ (ถ้ามี)">
                </div>
            </div>

            <div class="pt-6">
                <h3 class="font-bold text-slate-700 mb-4 underline">ผู้ประสานงานของสถานประกอบการ</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    <div class="lg:col-span-2">
                        <label class="label-head text-xs">ชื่อ-นามสกุล</label>
                        <input type="text" name="coord_name" class="input-form">
                    </div>
                    <div>
                        <label class="label-head text-xs">ตำแหน่ง</label>
                        <input type="text" name="coord_pos" class="input-form">
                    </div>
                    <div>
                        <label class="label-head text-xs">ID Line</label>
                        <input type="text" name="coord_line" class="input-form">
                    </div>
                    <div>
                        <label class="label-head text-xs">โทรศัพท์</label>
                        <input type="text" name="coord_phone" class="input-form">
                    </div>
                    <div class="lg:col-span-2">
                        <label class="label-head text-xs">E-mail</label>
                        <input type="email" name="coord_email" class="input-form">
                    </div>
                    <div class="lg:col-span-1">
                        <label class="label-head text-xs">จังหวัด</label>
                        <input type="text" name="coord_province" class="input-form">
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 mt-6 shadow-sm">
            <h2 class="text-lg font-bold text-blue-800 border-b pb-2 mb-6 italic">๒. ข้อมูลความต้องการกำลังคน (ฝึกงาน และ ฝึกอาชีพ)</h2>

            <div class="mb-12">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-slate-800">๑. การฝึกประสบการณ์สมรรถนะวิชาชีพ (ฝึกงาน)</h3>
                    <button type="button" onclick="addRow('table_intern', 'intern')" class="bg-emerald-600 text-white px-4 py-1 rounded text-sm hover:bg-emerald-700 transition">+ เพิ่มสาขาฝึกงาน</button>
                </div>
                <div class="overflow-x-auto border rounded-xl">
                    <table class="w-full text-sm" id="table_intern">
                        <thead>
                            <tr>
                                <th class="table-head p-3" rowspan="2">สาขาวิชาที่ต้องการ</th>
                                <th class="table-head p-3" colspan="2">ปวช. (คน)</th>
                                <th class="table-head p-3" colspan="2">ปวส. (คน)</th>
                                <th class="table-head p-3 w-48" rowspan="2">ความพิการที่รับได้ (รายสาขา)</th>
                                <th class="table-head p-3 w-16" rowspan="2"></th>
                            </tr>
                            <tr>
                                <th class="table-head p-2 border">ชาย</th><th class="table-head p-2 border">หญิง</th>
                                <th class="table-head p-2 border">ชาย</th><th class="table-head p-2 border">หญิง</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="item-row border-b border-slate-100">
                                <td class="p-2 border-r"><input type="text" name="intern_major[]" class="w-full p-2 outline-none"></td>
                                <td class="p-2 border-r w-20"><input type="number" name="intern_pvc_m[]" class="w-full p-1 text-center"></td>
                                <td class="p-2 border-r w-20"><input type="number" name="intern_pvc_f[]" class="w-full p-1 text-center"></td>
                                <td class="p-2 border-r w-20"><input type="number" name="intern_pvs_m[]" class="w-full p-1 text-center"></td>
                                <td class="p-2 border-r w-20"><input type="number" name="intern_pvs_f[]" class="w-full p-1 text-center"></td>
                                <td class="p-2 border-r text-center">
                                    <button type="button" onclick="toggleDis(this)" class="dis-btn text-[10px] bg-slate-100 px-2 py-1 rounded-full border">♿ เลือกความพิการ</button>
                                    <div class="dis-panel hidden p-3 text-left mt-2 rounded bg-amber-50 border border-amber-100 shadow-inner">
                                        <div class="grid grid-cols-1 gap-1 text-[11px] text-slate-700">
                                            <?php $dt = ["ทางการเห็น","ทางการได้ยินฯ","ทางร่างกายฯ","ทางจิตใจฯ","ทางสติปัญญา","ทางการเรียนรู้","ทางออทิสติก","อื่นๆ"]; 
                                            foreach($dt as $i=>$n){ echo "<label class='flex items-center gap-2'><input type='checkbox' name='intern_dis[0][]' value='".($i+1)."'> $n</label>"; } ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-2 text-center"><button type="button" onclick="removeRow(this)" class="text-red-400 font-bold">✕</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mb-10">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-blue-800">๒. การฝึกอาชีพ (ระบบทวิภาคี)</h3>
                    <button type="button" onclick="addRow('table_dve', 'dve')" class="bg-blue-600 text-white px-4 py-1 rounded text-sm hover:bg-blue-700 transition">+ เพิ่มสาขาทวิภาคี</button>
                </div>
                <div class="overflow-x-auto border border-blue-100 rounded-xl">
                    <table class="w-full text-sm" id="table_dve">
                        <thead>
                            <tr class="bg-blue-50">
                                <th class="table-head p-3 border-blue-100" rowspan="2">สาขาวิชาที่ต้องการ</th>
                                <th class="table-head p-3 border-blue-100" colspan="2">ปวช. (คน)</th>
                                <th class="table-head p-3 border-blue-100" colspan="2">ปวส. (คน)</th>
                                <th class="table-head p-3 border-blue-100 w-48" rowspan="2">ความพิการที่รับได้ (รายสาขา)</th>
                                <th class="table-head p-3 border-blue-100 w-16" rowspan="2"></th>
                            </tr>
                            <tr class="bg-blue-50">
                                <th class="table-head p-2 border-blue-100">ชาย</th><th class="table-head p-2 border-blue-100">หญิง</th>
                                <th class="table-head p-2 border-blue-100">ชาย</th><th class="table-head p-2 border-blue-100">หญิง</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="item-row border-b border-blue-50">
                                <td class="p-2 border-r border-blue-50"><input type="text" name="dve_major[]" class="w-full p-2 outline-none"></td>
                                <td class="p-2 border-r border-blue-50 w-20"><input type="number" name="dve_pvc_m[]" class="w-full p-1 text-center"></td>
                                <td class="p-2 border-r border-blue-50 w-20"><input type="number" name="dve_pvc_f[]" class="w-full p-1 text-center"></td>
                                <td class="p-2 border-r border-blue-50 w-20"><input type="number" name="dve_pvs_m[]" class="w-1/2 p-1 text-center"></td>
                                <td class="p-2 border-r border-blue-50 w-20"><input type="number" name="dve_pvs_f[]" class="w-1/2 p-1 text-center"></td>
                                <td class="p-2 border-r border-blue-50 text-center">
                                    <button type="button" onclick="toggleDis(this)" class="dis-btn text-[10px] bg-blue-50 px-2 py-1 rounded-full border border-blue-200">♿ เลือกความพิการ</button>
                                    <div class="dis-panel hidden p-3 text-left mt-2 rounded bg-amber-50 border border-amber-100 shadow-inner">
                                        <div class="grid grid-cols-1 gap-1 text-[11px] text-slate-700">
                                            <?php foreach($dt as $i=>$n){ echo "<label class='flex items-center gap-2'><input type='checkbox' name='dve_dis[0][]' value='".($i+1)."'> $n</label>"; } ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-2 text-center"><button type="button" onclick="removeRow(this)" class="text-red-400 font-bold">✕</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10 p-6 bg-slate-50 rounded-xl">
                <div>
                    <h4 class="font-bold text-slate-800 mb-3 underline">๒.๓ ระยะเวลาการเข้าฝึกอาชีพ (ระบบทวิภาคี)</h4>
                    <div class="flex flex-wrap gap-4 text-sm">
                        <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" name="term[]" value="1" class="w-4 h-4"> ภาคเรียนที่ ๑ (พ.ค.-ก.ย.)</label>
                        <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" name="term[]" value="2" class="w-4 h-4"> ภาคเรียนที่ ๒ (ต.ค.-ก.พ.)</label>
                        <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" name="term[]" value="summer" class="w-4 h-4"> ภาคฤดูร้อน (มี.ค.-เม.ย.)</label>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-slate-800 mb-3 underline">๒.๔ ลักษณะงาน/ตำแหน่งงานที่ประสงค์รับ</h4>
                    <textarea name="job_desc" class="input-form" rows="3" placeholder="ระบุลักษณะงานหรือตำแหน่ง..."></textarea>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 mt-6 shadow-sm border-l-8 border-indigo-500">
            <h2 class="text-lg font-bold text-indigo-800 mb-6 italic">๓. ความประสงค์รับครูเข้าฝึกประสบการณ์อาชีพ</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div><label class="label-head">สาขาวิชา</label><input type="text" name="teacher_major" class="input-form"></div>
                <div><label class="label-head">จำนวน (คน)</label><input type="number" name="teacher_count" class="input-form"></div>
                <div><label class="label-head">ช่วงเวลา / ระยะเวลา</label><input type="text" name="teacher_period" class="input-form" placeholder="เช่น ๑ เดือน"></div>
            </div>
        </div>

        <div class="bg-white p-8 mt-6 shadow-sm rounded-b-2xl">
            <h2 class="text-lg font-bold text-slate-800 mb-6 border-b pb-2 italic">สวัสดิการที่สถานประกอบการจัดให้ผู้เรียน</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-y-4 text-sm">
                <label class="flex items-center gap-2"><input type="checkbox" name="welfare[]" value="food"> อาหาร</label>
                <label class="flex items-center gap-2"><input type="checkbox" name="welfare[]" value="housing"> ที่พัก</label>
                <label class="flex items-center gap-2"><input type="checkbox" name="welfare[]" value="insurance"> ประกันอุบัติเหตุ</label>
                <label class="flex items-center gap-2"><input type="checkbox" name="welfare[]" value="uniform"> ชุดฟอร์ม</label>
                <label class="flex items-center gap-2"><input type="checkbox" name="welfare[]" value="allowance"> เบี้ยเลี้ยง</label>
            </div>
            <div class="mt-4"><label class="label-head">สวัสดิการอื่น ๆ (ระบุ)</label><input type="text" name="welfare_other" class="input-form"></div>
        </div>

        <div class="mt-8 flex justify-end gap-4">
            <button type="button" class="px-8 py-3 bg-slate-200 text-slate-600 rounded-xl font-bold hover:bg-slate-300">ยกเลิก</button>
            <button type="submit" class="px-10 py-3 bg-blue-600 text-white rounded-xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition">
                บันทึกข้อมูลเข้าระบบ
            </button>
        </div>
    </form>
</div>

<script>
let rowCounts = { intern: 1, dve: 1 };

function toggleDis(btn) {
    const panel = btn.nextElementSibling;
    if (panel.classList.contains('hidden')) {
        panel.classList.remove('hidden');
        btn.innerHTML = "♿ กำลังระบุ...";
        btn.classList.add('bg-amber-500', 'text-white');
    } else {
        panel.classList.add('hidden');
        btn.innerHTML = "♿ เลือกความพิการ";
        btn.classList.remove('bg-amber-500', 'text-white');
    }
}

function addRow(tableId, type) {
    const tbody = document.querySelector(`#${tableId} tbody`);
    const firstRow = tbody.querySelector('.item-row');
    const newRow = firstRow.cloneNode(true);

    newRow.querySelectorAll('input[type="text"], input[type="number"]').forEach(input => input.value = "");
    
    // รีเซ็ตส่วนผู้พิการ
    const panel = newRow.querySelector('.dis-panel');
    panel.classList.add('hidden');
    const btn = newRow.querySelector('.dis-btn');
    btn.innerHTML = "♿ เลือกความพิการ";
    btn.classList.remove('bg-amber-500', 'text-white');

    // อัปเดต Index สำหรับ Checkbox ของแต่ละแถว
    newRow.querySelectorAll('input[type="checkbox"]').forEach(cb => {
        cb.checked = false;
        const name = cb.getAttribute('name');
        cb.setAttribute('name', name.replace(/\[\d+\]/, `[${rowCounts[type]}]`));
    });

    rowCounts[type]++;
    tbody.appendChild(newRow);
}

function removeRow(btn) {
    const tbody = btn.closest('tbody');
    if (tbody.querySelectorAll('.item-row').length > 1) {
        btn.closest('.item-row').remove();
    }
}
</script>
</body>
</html>