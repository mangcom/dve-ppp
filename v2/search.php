<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหาที่ฝึกงาน/ฝึกอาชีพ | DVE PPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="search_style.css">
</head>
<body class="bg-slate-50">
    <?php include 'navbar.php'; ?>
    <header class="bg-blue-700 text-white py-12 px-4 shadow-lg">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">ค้นหาที่ฝึกประสบการณ์และฝึกอาชีพ</h1>
            <p class="text-blue-100 mb-8">เชื่อมโยงโอกาสทางการศึกษา สู่นิคมอุตสาหกรรมทั่วประเทศ</p>
            
            <div class="bg-white p-2 rounded-2xl shadow-2xl flex flex-col md:flex-row gap-2 max-w-4xl mx-auto">
                <div class="flex-1 flex items-center px-4 border-r border-slate-100">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" id="majorSearch" placeholder="สาขาวิชา (เช่น ช่างยนต์, บัญชี)" class="w-full p-3 outline-none text-slate-700">
                </div>
                <div class="flex-1 flex items-center px-4 border-r border-slate-100">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <select id="provinceSearch" class="w-full p-3 outline-none text-slate-700 bg-transparent">
                        <option value="">ทุกจังหวัด</option>
                        <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                        <option value="ปัตตานี">ปัตตานี</option>
                        </select>
                </div>
                <button onclick="performSearch()" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-xl font-bold transition duration-300">
                    ค้นหาข้อมูล
                </button>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto p-6 -mt-8">
        <div class="flex gap-4 mb-6">
            <button class="tab-btn active">ทั้งหมด</button>
            <button class="tab-btn">ฝึกงาน (ภาคปกติ)</button>
            <button class="tab-btn">ฝึกอาชีพ (ภาคทวิภาคี)</button>
        </div>

        <div id="resultsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="company-card bg-white rounded-2xl shadow-sm hover:shadow-md transition p-6 border border-slate-100">
                <div class="flex justify-between items-start mb-4">
                    <span class="bg-blue-100 text-blue-700 text-[10px] font-bold px-2 py-1 rounded uppercase">ทวิภาคี (1-1.5 ปี)</span>
                    <span class="text-green-600 font-bold text-sm">ว่าง 5 ที่</span>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-1">บริษัท เอบีซี อิเล็กทรอนิกส์ จำกัด</h3>
                <p class="text-xs text-slate-500 mb-4 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                    นิคมฯ ลาดกระบัง | กรุงเทพฯ (ภาคกลาง)
                </p>
                <div class="space-y-2 mb-6">
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500">สาขาที่ต้องการ:</span>
                        <span class="font-semibold">ไฟฟ้ากำลัง</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500">ระดับชั้น:</span>
                        <span class="font-semibold">ปวส.</span>
                    </div>
                </div>
                <button onclick="showDetails(1)" class="w-full py-2 bg-slate-100 text-slate-700 rounded-lg text-sm font-bold hover:bg-slate-200 transition">
                    ดูรายละเอียดเพิ่มเติม
                </button>
            </div>
            </div>
    </main>

    <div id="detailModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-[100] p-4">
        <div class="bg-white rounded-3xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b p-6 flex justify-between items-center">
                <h2 class="text-xl font-bold text-slate-800">รายละเอียดข้อมูลสถานประกอบการ</h2>
                <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600 text-2xl">&times;</button>
            </div>
            <div id="modalContent" class="p-8">
                </div>
        </div>
    </div>

    <script src="search_script.js"></script>
</body>
</html>