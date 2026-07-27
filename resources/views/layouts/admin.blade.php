<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - SMTTC Technical Institute')</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* Smooth transitions for sidebar minimize */
        #sidebar, #mainContentWrapper {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Sidebar Minimized / Collapsed Rules */
        @media (min-width: 768px) {
            body.sidebar-collapsed #sidebar {
                width: 5rem !important; /* 80px */
            }
            body.sidebar-collapsed #mainContentWrapper {
                padding-left: 5rem !important; /* 80px */
            }
            body.sidebar-collapsed .sidebar-text {
                display: none !important;
            }
            body.sidebar-collapsed #sidebar button,
            body.sidebar-collapsed #sidebar a {
                justify-content: center !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
</head>
<body class="h-full bg-slate-50 text-slate-800 antialiased selection:bg-indigo-500 selection:text-white">

    <!-- Mobile Sidebar Backdrop -->
    <div id="sidebarBackdrop" onclick="toggleSidebar()" class="fixed inset-0 z-30 bg-slate-900/40 backdrop-blur-xs hidden md:hidden transition-opacity"></div>

    <!-- Include Sidebar Partial -->
    @include('admin.partials.sidebar')

    <!-- Main Content Area -->
    <div id="mainContentWrapper" class="md:pl-64 flex flex-col min-h-screen">
        
        <!-- Include Topbar Partial -->
        @include('admin.partials.topbar')

        <!-- Page Dynamic Body -->
        <main class="flex-1 p-6 md:p-10 max-w-7xl w-full mx-auto space-y-8 animate-fade-in">
            @yield('content')
        </main>

        <!-- Admin Footer -->
        <footer class="py-6 border-t border-slate-200 bg-white text-center text-xs font-medium text-slate-400">
            &copy; {{ date('Y') }} SMTTC Institute Admin Panel.
        </footer>
    </div>

    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('sidebarBackdrop');
        if (sidebar && backdrop) {
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
        }
    }

    function toggleSidebarCollapse() {
        document.body.classList.toggle('sidebar-collapsed');
        const isCollapsed = document.body.classList.contains('sidebar-collapsed');
        localStorage.setItem('sidebar_collapsed', isCollapsed ? 'true' : 'false');
        
        const icon1 = document.getElementById('sidebarToggleIcon');
        const icon2 = document.getElementById('topbarToggleIcon');
        if (icon1) {
            icon1.className = isCollapsed ? 'fa-solid fa-angles-right text-sm transition-transform duration-300' : 'fa-solid fa-angles-left text-sm transition-transform duration-300';
        }
        if (icon2) {
            icon2.className = isCollapsed ? 'fa-solid fa-outdent text-sm' : 'fa-solid fa-indent text-sm';
        }
    }

    function showTab(tabName) {
        const tabs = ['overview', 'blogs', 'sliders', 'fees', 'galleries', 'certificates'];
        
        tabs.forEach(t => {
            const el = document.getElementById('tab-' + t);
            if (el) el.classList.add('hidden');

            const navBtn = document.getElementById('nav-' + t);
            if (navBtn) {
                navBtn.className = 'w-full flex items-center justify-between px-3.5 py-3 rounded-xl font-semibold text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all duration-200';
                const icon = navBtn.querySelector('i');
                if (icon) {
                    icon.classList.remove('text-indigo-600');
                    icon.classList.add('text-slate-400');
                }
            }
        });

        const activeEl = document.getElementById('tab-' + tabName);
        if (activeEl) {
            activeEl.classList.remove('hidden');
        }

        const activeNav = document.getElementById('nav-' + tabName);
        if (activeNav) {
            activeNav.className = 'w-full flex items-center justify-between px-3.5 py-3 rounded-xl font-semibold text-sm transition-all duration-200 bg-indigo-50 text-indigo-600 shadow-sm';
            const activeIcon = activeNav.querySelector('i');
            if (activeIcon) {
                activeIcon.classList.remove('text-slate-400');
                activeIcon.classList.add('text-indigo-600');
            }
        }

        const titleEl = document.getElementById('topbarTitle');
        const subTitleEl = document.getElementById('topbarSubtitle');
        if (titleEl && subTitleEl) {
            if (tabName === 'overview') {
                titleEl.innerText = 'Dashboard Overview';
                subTitleEl.innerText = 'Manage SMTTC Institute content, hero banners, and blogs';
            } else if (tabName === 'blogs') {
                titleEl.innerText = 'Blog Posts Management';
                subTitleEl.innerText = 'Publish news, announcements, and technical guides';
            } else if (tabName === 'sliders') {
                titleEl.innerText = 'Hero Sliders Management';
                subTitleEl.innerText = 'Upload banner photos for homepage carousel';
            } else if (tabName === 'fees') {
                titleEl.innerText = 'Fee Structure Management';
                subTitleEl.innerText = 'Manage course pricing and duration for the main page';
            } else if (tabName === 'galleries') {
                titleEl.innerText = 'Gallery Management';
                subTitleEl.innerText = 'Manage images shown on the public gallery page';
            } else if (tabName === 'certificates') {
                titleEl.innerText = 'Certificates Management';
                subTitleEl.innerText = 'Generate and print certificates for students';
            }
        }

        window.location.hash = tabName;

        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('sidebarBackdrop');
        if (sidebar && backdrop && !sidebar.classList.contains('-translate-x-full') && window.innerWidth < 768) {
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.add('hidden');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (localStorage.getItem('sidebar_collapsed') === 'true') {
            document.body.classList.add('sidebar-collapsed');
            const icon1 = document.getElementById('sidebarToggleIcon');
            const icon2 = document.getElementById('topbarToggleIcon');
            if (icon1) icon1.className = 'fa-solid fa-angles-right text-sm transition-transform duration-300';
            if (icon2) icon2.className = 'fa-solid fa-outdent text-sm';
        }

        const hash = window.location.hash.replace('#', '');
        if (['overview', 'blogs', 'sliders', 'fees', 'galleries', 'certificates'].includes(hash)) {
            showTab(hash);
        } else {
            showTab('overview');
        }
    });
    </script>
    @yield('scripts')
</body>
</html>
