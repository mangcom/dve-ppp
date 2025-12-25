// ฟังก์ชันเพิ่มแถวใหม่ในตาราง
function addRow(tableId) {
  const table = document.getElementById(tableId).getElementsByTagName("tbody")[0];
  const firstRow = table.rows[0];
  const newRow = firstRow.cloneNode(true);

  // ล้างค่าใน input ของแถวใหม่
  const inputs = newRow.getElementsByTagName("input");
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].value = "";
  }

  table.appendChild(newRow);
}

// ฟังก์ชันลบแถว
function removeRow(btn) {
  const tableBody = btn.closest("tbody");
  // ป้องกันไม่ให้ลบแถวสุดท้าย
  if (tableBody.rows.length > 1) {
    const row = btn.parentNode;
    row.parentNode.removeChild(row);
  } else {
    alert("ต้องมีอย่างน้อย 1 รายการ");
  }
}

// ระบบบันทึก (ตัวอย่าง)
document.getElementById("pppForm").addEventListener("submit", function (e) {
  // ตรงนี้สามารถเพิ่มการ Validate ข้อมูลก่อนส่งได้
  console.log("Form is being submitted...");
});
