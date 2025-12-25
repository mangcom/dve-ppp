<nav class="bg-white shadow-md sticky top-0 z-[100]">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-8">
                <a href="dashboard.php" class="flex items-center gap-2">
                    <div class="bg-blue-600 p-1.5 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <span class="text-xl font-bold text-slate-800 tracking-tight">DVE <span class="text-blue-600">PPP</span></span>
                </a>

                <div class="hidden md:flex items-center gap-1">
                    <a href="dashboard.php" class="nav-link">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h7"></path></svg>
                        Dashboard รายงาน
                    </a>
                    <a href="search.php" class="nav-link">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        ค้นหาที่ฝึกงาน/ฝึกอาชีพ
                    </a>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="h-8 w-[1px] bg-slate-200 mx-2"></div>
                <a href="ppp-form.php" class="bg-blue-50 text-blue-600 px-4 py-2 rounded-lg text-sm font-bold hover:bg-blue-100 transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
                    บันทึกข้อมูล (สอจ.)
                </a>
            </div>
        </div>
    </div>
</nav>

<style>
    .nav-link {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        color: #64748b;
        font-size: 0.95rem;
        font-weight: 500;
        border-radius: 0.5rem;
        transition: all 0.2s;
    }
    .nav-link:hover {
        background-color: #f1f5f9;
        color: #1e40af;
    }
    .nav-link.active {
        color: #2563eb;
        background-color: #eff6ff;
    }
</style>