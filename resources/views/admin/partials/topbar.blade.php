<header class="h-20 bg-white border-b border-slate-200 sticky top-0 z-30 px-6 flex items-center justify-between shadow-xs">
    
    <!-- Mobile Sidebar Toggle & Desktop Minimize Toggle & Page Title -->
    <div class="flex items-center gap-4">
        <!-- Mobile Drawer Toggle -->
        <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-xl text-slate-500 hover:bg-slate-100 transition">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>

        <!-- Desktop Sidebar Minimize Toggle -->
        <button onclick="toggleSidebarCollapse()" title="Minimize Sidebar" class="hidden md:flex p-2.5 rounded-xl text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition duration-200 border border-slate-200">
            <i id="topbarToggleIcon" class="fa-solid fa-indent text-sm"></i>
        </button>

        <div>
            <h1 id="topbarTitle" class="text-xl font-extrabold text-slate-900 leading-tight">Dashboard Overview</h1>
            <p id="topbarSubtitle" class="text-xs text-slate-400 font-medium hidden sm:block">Manage SMTTC Institute content, hero banners, and blogs</p>
        </div>
    </div>

    <!-- Right Stats & Profile Pill -->
    <div class="flex items-center gap-4">

        <!-- Live Status Pill -->
        <div class="hidden md:flex items-center gap-2 bg-slate-50 border border-slate-200 px-3.5 py-1.5 rounded-full text-xs font-semibold text-slate-600">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
            <span>MySQL Online</span>
            <span class="text-slate-300">|</span>
            <span class="text-indigo-600 font-bold">Laravel v11</span>
        </div>

        <!-- Live Clock -->
        <div id="liveClock" class="hidden lg:block bg-indigo-50 text-indigo-700 font-bold text-xs px-3.5 py-1.5 rounded-full border border-indigo-100">
            --:--:--
        </div>

        <!-- Website Link -->
        <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 bg-amber-400 hover:bg-amber-500 text-black text-xs font-bold px-4 py-2 rounded-xl shadow-sm transition-all duration-200">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            <span class="hidden sm:inline">View Site</span>
        </a>
    </div>
</header>

<script>
function updateClock() {
    const now = new Date();
    const clockEl = document.getElementById('liveClock');
    if (clockEl) {
        clockEl.innerText = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    }
}
setInterval(updateClock, 1000);
updateClock();
</script>
