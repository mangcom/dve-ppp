// ข้อมูลจำลอง (Mock Data) จากแบบฟอร์ม PPP-002
const mockData = [
  {
    id: 1,
    company: "บริษัท เอบีซี อิเล็กทรอนิกส์ จำกัด",
    region: "ภาคกลาง",
    province: "กรุงเทพฯ",
    estate: "นิคมฯ ลาดกระบัง",
    business_type: "ผลิตปลั๊กไฟ และอุปกรณ์ป้องกันไฟกระชาก",
    major: "ไฟฟ้ากำลัง",
    level: "ปวส.",
    gender: "ไม่จำกัด",
    demand_qty: 10,
    remaining: 5,
    welfare: "มีเบี้ยเลี้ยง 300 บาท/วัน, มีหอพักฟรี, ประกันอุบัติเหตุ",
    other: "รับครูฝึกประสบการณ์ 2 คน (สาขาไฟฟ้า)",
    type: "ทวิภาคี",
  },
];

function performSearch() {
  // ในระบบจริงจะส่ง AJAX ไปที่ PHP
  console.log("Searching...");
  renderResults(mockData);
}

function renderResults(data) {
  const grid = document.getElementById("resultsGrid");
  // ลอจิกการสร้าง Card HTML...
}

function showDetails(id) {
  const modal = document.getElementById("detailModal");
  const content = document.getElementById("modalContent");
  const item = mockData.find((i) => i.id === id);

  if (item) {
    content.innerHTML = `
            <div class="space-y-6">
                <section>
                    <h4 class="text-blue-600 font-bold text-sm uppercase mb-2">ข้อมูลสถานที่</h4>
                    <p class="text-xl font-bold">${item.company}</p>
                    <p class="text-slate-600">${item.estate} จ.${item.province} (${item.region})</p>
                </section>

                <section class="bg-slate-50 p-4 rounded-xl grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-slate-500">ประเภทธุรกิจ</p>
                        <p class="font-medium">${item.business_type}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500">ความต้องการ (ที่ว่าง)</p>
                        <p class="font-bold text-blue-600">${item.remaining} / ${item.demand_qty} คน</p>
                    </div>
                </section>

                <section>
                    <h4 class="font-bold text-slate-800 mb-2">สวัสดิการที่จัดให้</h4>
                    <div class="text-slate-600 bg-green-50 p-3 border border-green-100 rounded-lg text-sm">
                        ${item.welfare}
                    </div>
                </section>

                <section>
                    <h4 class="font-bold text-slate-800 mb-2">ข้อมูลเพิ่มเติม</h4>
                    <p class="text-sm text-slate-600">${item.other}</p>
                </section>

                <div class="pt-6 border-t flex gap-4">
                    <button class="flex-1 py-3 bg-blue-600 text-white rounded-xl font-bold shadow-lg shadow-blue-200" onclick="confirmApp(${item.id})">
                        ยืนยันเข้าฝึกอาชีพ
                    </button>
                </div>
            </div>
        `;
    modal.classList.remove("hidden");
    modal.classList.add("flex");
  }
}

function closeModal() {
  const modal = document.getElementById("detailModal");
  modal.classList.add("hidden");
  modal.classList.remove("flex");
}

function confirmApp(id) {
  if (confirm("ยืนยันการเลือกสถานประกอบการนี้? ระบบจะลดจำนวนที่ว่างลงทันที")) {
    // ส่งคำสั่งไปลดจำนวนในฐานข้อมูลผ่าน PHP
    alert("ลงทะเบียนเบื้องต้นเรียบร้อย!");
    closeModal();
  }
}
