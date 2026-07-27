<aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-all duration-300 bg-white border-r border-slate-200 shadow-sm flex flex-col justify-between -translate-x-full md:translate-x-0">
    <div>
        <!-- Sidebar Brand Logo & Collapse Toggle -->
        <div class="h-20 flex items-center justify-between px-5 border-b border-slate-100 bg-slate-50/50">
            <a href="javascript:void(0)" onclick="showTab('overview')" class="flex items-center gap-3 overflow-hidden">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-[#FACA0A] to-yellow-400 text-black font-black text-xl flex items-center justify-center shadow-md shadow-yellow-200 shrink-0">
                    S
                </div>
                <div class="sidebar-text truncate">
                    <h2 class="font-extrabold text-slate-900 text-base leading-tight">SMTTC Admin</h2>
                    <span class="text-xs text-slate-400 font-medium">Control Panel v2.0</span>
                </div>
            </a>

            <!-- Minimize Desktop Button -->
            <button onclick="toggleSidebarCollapse()" title="Toggle Sidebar" class="hidden md:flex items-center justify-center p-2 text-slate-400 hover:text-slate-700 hover:bg-slate-200/60 rounded-xl transition-all duration-200 shrink-0">
                <i id="sidebarToggleIcon" class="fa-solid fa-angles-left text-sm transition-transform duration-300"></i>
            </button>
        </div>

        <!-- Sidebar Navigation Menu -->
        <div class="px-3 py-6 space-y-1.5">
            <div class="sidebar-text px-3 pb-2 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Main Navigation</div>

            <!-- Overview Link -->
            <button id="nav-overview" onclick="showTab('overview')" title="Dashboard Overview" class="w-full flex items-center justify-start gap-3 px-3.5 py-3 rounded-xl font-semibold text-sm transition-all duration-200 bg-indigo-50 text-indigo-600 shadow-sm">
                <i class="fa-solid fa-chart-pie text-lg text-indigo-600 shrink-0"></i>
                <span class="sidebar-text truncate">Dashboard Overview</span>
            </button>

            <!-- Blog Posts Link -->
            <button id="nav-blogs" onclick="showTab('blogs')" title="Blog Posts" class="w-full flex items-center justify-between px-3.5 py-3 rounded-xl font-semibold text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all duration-200">
                <div class="flex items-center gap-3 overflow-hidden">
                    <i class="fa-solid fa-newspaper text-lg text-slate-400 shrink-0"></i>
                    <span class="sidebar-text truncate">Blog Posts</span>
                </div>
                <span class="sidebar-text bg-indigo-100 text-indigo-700 text-xs font-bold px-2 py-0.5 rounded-full shrink-0">{{ \App\Models\Blog::count() }}</span>
            </button>

            <!-- Hero Sliders Link -->
            <button id="nav-sliders" onclick="showTab('sliders')" title="Hero Sliders" class="w-full flex items-center justify-between px-3.5 py-3 rounded-xl font-semibold text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all duration-200">
                <div class="flex items-center gap-3 overflow-hidden">
                    <i class="fa-solid fa-images text-lg text-slate-400 shrink-0"></i>
                    <span class="sidebar-text truncate">Hero Sliders</span>
                </div>
                <span class="sidebar-text bg-amber-100 text-amber-800 text-xs font-bold px-2 py-0.5 rounded-full shrink-0">{{ \App\Models\SliderImage::count() }}</span>
            </button>

            <!-- Fee Structure Link -->
            <button id="nav-fees" onclick="showTab('fees')" title="Fee Structure" class="w-full flex items-center justify-between px-3.5 py-3 rounded-xl font-semibold text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all duration-200">
                <div class="flex items-center gap-3 overflow-hidden">
                    <i class="fa-solid fa-indian-rupee-sign text-lg text-slate-400 shrink-0"></i>
                    <span class="sidebar-text truncate">Fee Structure</span>
                </div>
                <span class="sidebar-text bg-green-100 text-green-800 text-xs font-bold px-2 py-0.5 rounded-full shrink-0">{{ \App\Models\FeeStructure::count() }}</span>
            </button>

            <!-- Gallery Link -->
            <button id="nav-galleries" onclick="showTab('galleries')" title="Gallery" class="w-full flex items-center justify-between px-3.5 py-3 rounded-xl font-semibold text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all duration-200">
                <div class="flex items-center gap-3 overflow-hidden">
                    <i class="fa-solid fa-camera-retro text-lg text-slate-400 shrink-0"></i>
                    <span class="sidebar-text truncate">Gallery</span>
                </div>
                <span class="sidebar-text bg-blue-100 text-blue-800 text-xs font-bold px-2 py-0.5 rounded-full shrink-0">{{ \App\Models\GalleryImage::count() }}</span>
            </button>

            <div class="sidebar-text pt-6 px-3 pb-2 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Quick Actions</div>

            <a href="{{ route('home') }}" target="_blank" title="Live Website" class="flex items-center gap-3 px-3.5 py-3 rounded-xl font-semibold text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all duration-200">
                <i class="fa-solid fa-globe text-lg text-slate-400 shrink-0"></i>
                <span class="sidebar-text truncate">Live Website</span>
                <i class="sidebar-text fa-solid fa-arrow-up-right-from-square text-xs text-slate-400 ml-auto shrink-0"></i>
            </a>
        </div>
    </div>

    <!-- Sidebar Footer / Logout -->
    <div class="p-3 border-t border-slate-100 bg-slate-50/50">
        <div class="flex items-center gap-3 p-2.5 rounded-xl bg-white border border-slate-200 shadow-sm mb-3 overflow-hidden">
            <div class="w-9 h-9 rounded-lg bg-indigo-600 text-white font-bold flex items-center justify-center text-sm shadow shrink-0">
                {{ strtoupper(substr(session('admin_user', 'A'), 0, 1)) }}
            </div>
            <div class="sidebar-text overflow-hidden">
                <p class="text-xs font-bold text-slate-900 truncate">{{ session('admin_user', 'Administrator') }}</p>
                <p class="text-[10px] text-emerald-600 font-semibold flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Active Session
                </p>
            </div>
        </div>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" title="Sign Out" class="w-full flex items-center justify-center gap-2 px-3.5 py-2.5 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 font-semibold text-xs transition duration-200">
                <i class="fa-solid fa-right-from-bracket shrink-0"></i>
                <span class="sidebar-text truncate">Sign Out</span>
            </button>
        </form>
    </div>
</aside>
