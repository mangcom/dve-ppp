// 1. กราฟ 10 ลำดับสาขาวิชา (Horizontal Bar Chart)
const ctxTop = document.getElementById("topMajorsChart").getContext("2d");
new Chart(ctxTop, {
  type: "bar",
  data: {
    labels: ["ช่างยนต์", "ไฟฟ้ากำลัง", "บัญชี", "อิเล็กทรอนิกส์", "คอมพิวเตอร์ธุรกิจ", "ช่างกลโรงงาน", "เทคนิคยานยนต์", "การตลาด", "ช่างเชื่อม", "โลจิสติกส์"],
    datasets: [
      {
        label: "จำนวนความต้องการ (คน)",
        data: [450, 380, 310, 290, 250, 220, 190, 150, 130, 110],
        backgroundColor: "rgba(59, 130, 246, 0.8)",
        borderRadius: 8,
        barThickness: 20,
      },
    ],
  },
  options: {
    indexAxis: "y",
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: { display: false },
    },
    scales: {
      x: { grid: { display: false } },
      y: { grid: { display: false } },
    },
  },
});

// 2. กราฟสัดส่วนระดับชั้น (Doughnut Chart)
const ctxLevel = document.getElementById("levelChart").getContext("2d");
new Chart(ctxLevel, {
  type: "doughnut",
  data: {
    labels: ["ปวช.", "ปวส."],
    datasets: [
      {
        data: [1200, 1250],
        backgroundColor: ["#6366f1", "#a855f7"],
        hoverOffset: 4,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    cutout: "70%",
    plugins: {
      legend: {
        position: "bottom",
        labels: { usePointStyle: true, padding: 20 },
      },
    },
  },
});
