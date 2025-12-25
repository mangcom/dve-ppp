<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard รายงานความต้องการกำลังคน | DVE PPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f1f5f9; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <!-- <nav class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 h-16 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="bg-blue-600 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <span class="text-xl font-bold text-slate-800">DVE PPP <span class="text-blue-600">Analytics</span></span>
            </div>
            <div class="flex gap-4 items-center">
                <select id="yearFilter" class="bg-slate-50 border border-slate-300 text-sm rounded-lg p-2 outline-none">
                    <option value="2568">ปีการศึกษา 2568</option>
                    <option value="2567">ปีการศึกษา 2567</option>
                </select>
                <a href="login.php" class="text-sm text-slate-500 hover:text-blue-600 font-medium">สำหรับเจ้าหน้าที่</a>
            </div>
        </div>
    </nav> -->

    <div class="max-w-7xl mx-auto p-6">
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border-b-4 border-blue-500">
                <p class="text-slate-500 text-sm font-medium">สถานประกอบการทั้งหมด</p>
                <h3 class="text-3xl font-bold text-slate-800 mt-1">128 <span class="text-sm text-slate-400 font-normal">แห่ง</span></h3>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-b-4 border-green-500">
                <p class="text-slate-500 text-sm font-medium">ความต้องการกำลังคนรวม</p>
                <h3 class="text-3xl font-bold text-slate-800 mt-1">2,450 <span class="text-sm text-slate-400 font-normal">คน</span></h3>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-b-4 border-purple-500">
                <p class="text-slate-500 text-sm font-medium">นิคมอุตสาหกรรมที่เข้าร่วม</p>
                <h3 class="text-3xl font-bold text-slate-800 mt-1">45 <span class="text-sm text-slate-400 font-normal">นิคม</span></h3>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-b-4 border-orange-500">
                <p class="text-slate-500 text-sm font-medium">ต้องการครูฝึกประสบการณ์</p>
                <h3 class="text-3xl font-bold text-slate-800 mt-1">120 <span class="text-sm text-slate-400 font-normal">คน</span></h3>
            </div>
        </div>

        

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <div class="lg:col-span-2 bg-white p-8 rounded-2xl shadow-sm">
                <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-orange-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    10 ลำดับสาขาวิชาที่ต้องการมากที่สุด
                </h3>
                <div class="h-80">
                    <canvas id="topMajorsChart"></canvas>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm">
                <h3 class="text-lg font-bold text-slate-800 mb-6">สัดส่วนตามระดับชั้น</h3>
                <div class="h-64 relative">
                    <canvas id="levelChart"></canvas>
                </div>
                <div class="mt-6 space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500">ฝึกงานปกติ (Internship)</span>
                        <span class="font-bold text-slate-700">65%</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500">ฝึกอาชีพ (DVE/Apprentice)</span>
                        <span class="font-bold text-slate-700">35%</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="p-6 border-b bg-slate-50 flex justify-between items-center">
                <h3 class="font-bold text-slate-800 text-lg">จำนวนความต้องการแยกตามพื้นที่</h3>
                <input type="text" placeholder="ค้นหาจังหวัดหรือนิคม..." class="text-sm p-2 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500 w-64">
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-slate-500 text-sm border-b uppercase">
                            <th class="p-4 pl-8">ภาค</th>
                            <th class="p-4">จังหวัด</th>
                            <th class="p-4">นิคมอุตสาหกรรม</th>
                            <th class="p-4 text-center">จำนวนสถานประกอบการ</th>
                            <th class="p-4 text-center">ความต้องการ (คน)</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-700">
                        <tr class="border-b hover:bg-slate-50 transition">
                            <td class="p-4 pl-8 font-medium">กรุงเทพฯ และปริมณฑล</td>
                            <td class="p-4">กรุงเทพมหานคร</td>
                            <td class="p-4">นิคมฯ ลาดกระบัง</td>
                            <td class="p-4 text-center">24</td>
                            <td class="p-4 text-center font-bold text-blue-600">450</td>
                        </tr>
                        <tr class="border-b hover:bg-slate-50 transition">
                            <td class="p-4 pl-8 font-medium">ภาคตะวันออก</td>
                            <td class="p-4">ระยอง</td>
                            <td class="p-4">นิคมฯ มาบตาพุด</td>
                            <td class="p-4 text-center">18</td>
                            <td class="p-4 text-center font-bold text-blue-600">320</td>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="dashboard_charts.js"></script>
</body>
</html>