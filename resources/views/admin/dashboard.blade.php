@extends('layouts.admin')

@section('title', 'Dashboard Overview - SMTTC Control Panel')

@section('content')

<!-- Toast Notifications -->
@if(session('blog_success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center justify-between shadow-xs mb-6">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
            <span>{{ session('blog_success') }}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">&times;</button>
    </div>
@endif

@if(session('blog_error'))
    <div class="bg-rose-50 border-2 border-rose-300 text-rose-800 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center justify-between shadow-xs mb-6 animate-pulse">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation text-rose-600 text-xl"></i>
            <div>
                <strong class="block font-bold">Blog Post Karne Me Dikkat Aayi:</strong>
                <span class="text-xs">{{ session('blog_error') }}</span>
            </div>
        </div>
        <button onclick="this.parentElement.remove()" class="text-rose-500 hover:text-rose-700 text-lg font-bold">&times;</button>
    </div>
@endif

@if($errors->any())
    <div class="bg-amber-50 border border-amber-300 text-amber-900 px-5 py-4 rounded-2xl text-sm font-medium shadow-xs mb-6">
        <div class="flex items-center gap-2 font-bold mb-1 text-amber-800">
            <i class="fa-solid fa-triangle-exclamation text-amber-600"></i> Kripya in fields ko check karein:
        </div>
        <ul class="list-disc list-inside space-y-0.5 text-xs">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('slider_success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center justify-between shadow-xs mb-6">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
            <span>{{ session('slider_success') }}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">&times;</button>
    </div>
@endif

@if(session('fee_success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center justify-between shadow-xs mb-6">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
            <span>{{ session('fee_success') }}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">&times;</button>
    </div>
@endif

@if(session('gallery_success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center justify-between shadow-xs mb-6">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
            <span>{{ session('gallery_success') }}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">&times;</button>
    </div>
@endif

@if(session('cert_success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center justify-between shadow-xs mb-6">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
            <span>{{ session('cert_success') }}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">&times;</button>
    </div>
@endif


<!-- ================= TAB 1: DASHBOARD OVERVIEW ================= -->
<div id="tab-overview" class="space-y-8 animate-fade-in">
    
    <!-- METRIC STAT CARDS GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Card 1: Total Blogs -->
        <div onclick="showTab('blogs')" class="cursor-pointer bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Blogs</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-2">{{ count($blogs) }}</h3>
                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-emerald-600 mt-1">
                    <i class="fa-solid fa-arrow-up-right"></i> Published
                </span>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-newspaper"></i>
            </div>
        </div>

        <!-- Card 2: Hero Sliders -->
        <div onclick="showTab('sliders')" class="cursor-pointer bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Hero Sliders</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-2">{{ count($sliders) }}</h3>
                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-amber-600 mt-1">
                    <i class="fa-solid fa-circle-play"></i> Active Carousel
                </span>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-images"></i>
            </div>
        </div>

        <!-- Card 3: Gallery -->
        <div onclick="showTab('galleries')" class="cursor-pointer bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Gallery Images</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-2">{{ count($galleries) }}</h3>
                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-emerald-600 mt-1">
                    <i class="fa-solid fa-camera-retro"></i> Public Gallery
                </span>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-images"></i>
            </div>
        </div>

        <!-- Card 4: Certificates -->
        <div onclick="showTab('certificates')" class="cursor-pointer bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Certificates</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-2">{{ count($certificates ?? []) }}</h3>
                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-yellow-600 mt-1">
                    <i class="fa-solid fa-award"></i> Issued
                </span>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-yellow-50 text-yellow-600 flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-certificate"></i>
            </div>
        </div>

    </div>

    <!-- QUICK ACCESS TILES -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Manage Blogs Shortcut Card -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-pen-nib"></i>
                </div>
                <h3 class="text-lg font-extrabold text-slate-900">Manage Blog Posts</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Create, edit, and publish technical guides, announcements, and articles for institute students.</p>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <span class="text-xs font-bold text-slate-400">{{ count($blogs) }} Articles</span>
                <button onclick="showTab('blogs')" class="px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs transition shadow-sm">
                    Open Manager &rarr;
                </button>
            </div>
        </div>

        <!-- Manage Sliders Shortcut Card -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-sliders"></i>
                </div>
                <h3 class="text-lg font-extrabold text-slate-900">Manage Hero Banners</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Upload new banner images or remove old images displayed on the homepage hero carousel.</p>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <span class="text-xs font-bold text-slate-400">{{ count($sliders) }} Hero Banners</span>
                <button onclick="showTab('sliders')" class="px-4 py-2 rounded-xl bg-amber-400 hover:bg-amber-500 text-black font-bold text-xs transition shadow-sm">
                    Open Sliders &rarr;
                </button>
            </div>
        </div>

        <!-- Manage Fee Structure Shortcut Card -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-indian-rupee-sign"></i>
                </div>
                <h3 class="text-lg font-extrabold text-slate-900">Fee Structure</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Manage course pricing and duration details shown on the main page to students.</p>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <span class="text-xs font-bold text-slate-400">{{ count($fees) }} Courses</span>
                <button onclick="showTab('fees')" class="px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs transition shadow-sm">
                    Open Fees &rarr;
                </button>
            </div>
        </div>

        <!-- Manage Gallery Shortcut Card -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-camera-retro"></i>
                </div>
                <h3 class="text-lg font-extrabold text-slate-900">Gallery</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Add and manage the public image gallery of the institute events and facilities.</p>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <span class="text-xs font-bold text-slate-400">{{ count($galleries) }} Images</span>
                <button onclick="showTab('galleries')" class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition shadow-sm">
                    Open Gallery &rarr;
                </button>
            </div>
        </div>

        <!-- Certificates Shortcut Card -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-yellow-100 text-yellow-700 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-certificate"></i>
                </div>
                <h3 class="text-lg font-extrabold text-slate-900">Certificates</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Generate official course completion certificates and manage student records.</p>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <span class="text-xs font-bold text-slate-400">{{ count($certificates ?? []) }} Certificates</span>
                <button onclick="showTab('certificates')" class="px-4 py-2 rounded-xl bg-yellow-500 hover:bg-yellow-600 text-white font-bold text-xs transition shadow-sm">
                    Open Certificates &rarr;
                </button>
            </div>
        </div>

    </div>

    <!-- RECENT ACTIVITY PREVIEWS -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 md:p-8 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-clock-rotate-left text-indigo-600"></i> Recent Articles Preview
            </h3>
            <button onclick="showTab('blogs')" class="text-xs font-bold text-indigo-600 hover:underline">View All &rarr;</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($blogs->take(3) as $b)
                <div class="bg-slate-50 rounded-2xl p-4 border border-slate-200/60 flex items-center gap-4">
                    <img src="{{ $b->image_url ? (Str::startsWith($b->image_url, '/uploads') ? asset($b->image_url) : asset($b->image_url)) : asset('assets/images/default-blog.webp') }}" class="w-16 h-14 object-cover rounded-xl shrink-0">
                    <div class="overflow-hidden">
                        <h4 class="font-bold text-slate-900 text-xs truncate">{{ $b->title }}</h4>
                        <p class="text-[11px] text-slate-400 mt-1">{{ $b->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-xs text-slate-400 py-6">No articles found.</p>
            @endforelse
        </div>
    </div>

</div>


<!-- ================= TAB 2: BLOG POSTS MANAGEMENT ================= -->
<div id="tab-blogs" class="hidden space-y-8 animate-fade-in">
    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 md:p-8 space-y-8">
        <!-- Section Header -->
        <div class="flex items-center justify-between border-b border-slate-100 pb-5 flex-wrap gap-4">
            <div>
                <div class="flex items-center gap-3">
                    <h2 class="text-xl font-extrabold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-pen-to-square text-indigo-600"></i> Advanced Blog & Technical Articles Studio
                    </h2>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-indigo-50 text-indigo-700 border border-indigo-200/70">
                        <i class="fa-solid fa-wand-magic-sparkles text-[10px]"></i> High-Detailing & Free-Size Engine
                    </span>
                </div>
                <p class="text-xs text-slate-400 font-medium mt-1">
                    Compose rich technical articles with interactive image resizing (length & width / free-size drag), live SEO preview, and custom cover studio.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs font-bold text-slate-600 bg-slate-100 px-3.5 py-1.5 rounded-full border border-slate-200">
                    <i class="fa-regular fa-newspaper mr-1 text-slate-500"></i> {{ count($blogs) }} Published
                </span>
                <a href="{{ route('blog.index') }}" target="_blank" class="text-xs font-bold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 px-3.5 py-1.5 rounded-full border border-indigo-200 transition flex items-center gap-1.5">
                    <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i> View Public Blog
                </a>
            </div>
        </div>

        <!-- Create Blog Form (Full-Width Editorial Canvas & Bottom Studio) -->
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" id="createBlogForm" class="bg-slate-50/70 p-6 md:p-8 rounded-3xl border border-slate-200 space-y-8">
            @csrf
            
            <div class="flex items-center justify-between border-b border-slate-200/80 pb-3 flex-wrap gap-2">
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-file-pen text-indigo-500"></i> Full-Page Article Editor
                </h3>
                <span class="text-[11px] font-semibold text-slate-400">Distraction-free full width layout</span>
            </div>

            <!-- Error Alert inside Form -->
            @if(session('blog_error') || $errors->any())
                <div class="bg-rose-50 border-2 border-rose-300 text-rose-900 p-4.5 rounded-2xl flex items-start gap-3 shadow-xs">
                    <i class="fa-solid fa-triangle-exclamation text-rose-600 text-lg mt-0.5"></i>
                    <div class="space-y-1">
                        <h4 class="font-bold text-xs uppercase tracking-wider text-rose-950">Article Publish Karne Me Dikkat Aayi:</h4>
                        @if(session('blog_error'))
                            <p class="text-xs font-semibold text-rose-800">{{ session('blog_error') }}</p>
                        @endif
                        @if($errors->any())
                            <ul class="list-disc list-inside text-xs text-rose-700 space-y-0.5">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endif

            <!-- ================= SECTION 1: FULL-WIDTH EDITORIAL CANVAS ================= -->
            <div class="space-y-6 w-full">
                <!-- Title & Typography Studio -->
                <div class="space-y-3 bg-white p-5 rounded-2xl border border-slate-200 shadow-xs">
                    <div class="flex justify-between items-center flex-wrap gap-2">
                        <div class="flex items-center gap-2">
                            <label class="block text-xs font-bold text-slate-800 flex items-center gap-1.5">
                                <i class="fa-solid fa-heading text-indigo-600"></i> Article Title <span class="text-red-500">*</span>
                            </label>
                            <span class="text-[10px] font-bold text-indigo-600 bg-indigo-50 border border-indigo-100 px-2 py-0.5 rounded-md">Live Typography</span>
                        </div>
                        <span id="create-title-count" class="text-[10px] font-semibold text-slate-400">0 / 70 chars</span>
                    </div>

                    <!-- Live Styled Title Input -->
                    <div class="relative">
                        <input type="text" id="create-blog-title" name="title" value="{{ old('title') }}" placeholder="e.g. Complete Inverter AC PCB Troubleshooting & Repairing Guide 2026" required class="w-full bg-slate-50/40 border-2 border-slate-200 focus:border-indigo-600 focus:bg-white rounded-xl px-4 py-3.5 text-xl font-black text-slate-900 focus:outline-none focus:ring-4 focus:ring-indigo-50 transition shadow-inner" style="transition: all 0.2s ease;">
                    </div>

                    <!-- Hidden Styling Form Inputs -->
                    <input type="hidden" id="create-title-color" name="title_color" value="#0f172a">
                    <input type="hidden" id="create-title-font" name="title_font" value="sans">
                    <input type="hidden" id="create-title-size" name="title_size" value="large">
                    <input type="hidden" id="create-title-weight" name="title_weight" value="900">
                    <input type="hidden" id="create-title-transform" name="title_transform" value="none">

                    <!-- Title Styling Control Bar (Colour, Letters Style & Size) -->
                    <div class="flex items-center justify-between flex-wrap gap-3 pt-3 border-t border-slate-100 text-xs">
                        <!-- Colour Options -->
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="text-[11px] font-bold text-slate-600 flex items-center gap-1">
                                <i class="fa-solid fa-palette text-indigo-500"></i> Colour:
                            </span>
                            <div class="flex items-center gap-1.5" id="createTitleColorPresets">
                                <button type="button" onclick="setTitleStyle('create', 'color', '#0f172a', this)" class="title-color-btn w-6 h-6 rounded-full bg-slate-900 ring-2 ring-indigo-500 ring-offset-1 transition hover:scale-110 shadow-2xs" title="Dark Slate (Default)"></button>
                                <button type="button" onclick="setTitleStyle('create', 'color', '#4338ca', this)" class="title-color-btn w-6 h-6 rounded-full bg-indigo-700 transition hover:scale-110 shadow-2xs" title="Indigo Blue"></button>
                                <button type="button" onclick="setTitleStyle('create', 'color', '#dc2626', this)" class="title-color-btn w-6 h-6 rounded-full bg-red-600 transition hover:scale-110 shadow-2xs" title="Crimson Red"></button>
                                <button type="button" onclick="setTitleStyle('create', 'color', '#059669', this)" class="title-color-btn w-6 h-6 rounded-full bg-emerald-600 transition hover:scale-110 shadow-2xs" title="Emerald Green"></button>
                                <button type="button" onclick="setTitleStyle('create', 'color', '#d97706', this)" class="title-color-btn w-6 h-6 rounded-full bg-amber-500 transition hover:scale-110 shadow-2xs" title="Amber Gold"></button>
                                <button type="button" onclick="setTitleStyle('create', 'color', '#7c3aed', this)" class="title-color-btn w-6 h-6 rounded-full bg-purple-600 transition hover:scale-110 shadow-2xs" title="Royal Purple"></button>
                                <label class="relative cursor-pointer flex items-center" title="Custom Colour Picker">
                                    <input type="color" id="createCustomColorPicker" value="#0f172a" oninput="setTitleStyle('create', 'color', this.value, this)" class="sr-only">
                                    <span class="w-6 h-6 rounded-full border border-slate-300 bg-gradient-to-tr from-rose-500 via-amber-400 to-indigo-500 flex items-center justify-center text-[9px] text-white font-bold shadow-2xs hover:scale-110 transition">
                                        <i class="fa-solid fa-eye-dropper"></i>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <!-- Letters Style / Font Family -->
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="text-[11px] font-bold text-slate-600 flex items-center gap-1">
                                <i class="fa-solid fa-font text-indigo-500"></i> Style:
                            </span>
                            <select id="createTitleFontSelect" onchange="setTitleStyle('create', 'font', this.value)" class="bg-white border border-slate-200 rounded-lg px-2.5 py-1 text-xs font-semibold text-slate-700 focus:outline-none focus:border-indigo-600 shadow-2xs">
                                <option value="sans" selected>Modern Sans (Clean)</option>
                                <option value="outfit">Outfit (Trendy Heading)</option>
                                <option value="serif">Editorial Serif (Classic)</option>
                                <option value="mono">Technical Monospace</option>
                            </select>
                            <button type="button" id="createTitleTransformBtn" onclick="toggleTitleTransform('create')" class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-700 hover:text-indigo-600 font-bold text-xs transition shadow-2xs" title="Toggle UPPERCASE / Normal">
                                <strong>TT</strong>
                            </button>
                            <button type="button" id="createTitleItalicBtn" onclick="toggleTitleItalic('create')" class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-700 hover:text-indigo-600 italic font-bold text-xs transition shadow-2xs" title="Toggle Italic">
                                <em>I</em>
                            </button>
                        </div>

                        <!-- Letters Size -->
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="text-[11px] font-bold text-slate-600 flex items-center gap-1">
                                <i class="fa-solid fa-text-height text-indigo-500"></i> Size:
                            </span>
                            <div class="inline-flex rounded-lg border border-slate-200 bg-slate-50 p-0.5 shadow-2xs">
                                <button type="button" onclick="setTitleStyle('create', 'size', 'medium', this)" class="title-size-btn px-2.5 py-0.5 rounded text-[11px] font-semibold text-slate-600 hover:text-indigo-600">Med</button>
                                <button type="button" onclick="setTitleStyle('create', 'size', 'large', this)" class="title-size-btn px-2.5 py-0.5 rounded text-[11px] font-bold bg-white text-indigo-600 shadow-2xs">Large</button>
                                <button type="button" onclick="setTitleStyle('create', 'size', 'xl', this)" class="title-size-btn px-2.5 py-0.5 rounded text-[11px] font-semibold text-slate-600 hover:text-indigo-600">XL</button>
                                <button type="button" onclick="setTitleStyle('create', 'size', 'mega', this)" class="title-size-btn px-2.5 py-0.5 rounded text-[11px] font-semibold text-slate-600 hover:text-indigo-600">Mega</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slug & Author -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <div class="flex justify-between items-center">
                            <label class="block text-xs font-bold text-slate-700">Custom URL / Slug</label>
                            <button type="button" id="toggleSlugLockBtn" class="text-[10px] text-indigo-600 font-bold hover:underline flex items-center gap-1">
                                <i class="fa-solid fa-lock text-[9px]" id="slugLockIcon"></i> <span id="slugLockText">Auto-Synced</span>
                            </button>
                        </div>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-xs text-slate-400 font-medium">/blog/</span>
                            <input type="text" id="create-blog-slug" name="slug" value="{{ old('slug') }}" placeholder="inverter-ac-pcb-troubleshooting" class="w-full bg-white border border-slate-200 rounded-xl pl-16 pr-4 py-2.5 text-xs font-mono text-slate-700 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700">Author Name</label>
                        <input type="text" id="create-blog-author" name="author_name" value="{{ old('author_name', session('admin_user', 'SMTTC Master Trainer')) }}" placeholder="e.g. Er. S. Kumar" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-700 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition">
                    </div>
                </div>

                <!-- Topic Tag Helpers -->
                <div class="space-y-1.5">
                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Quick Topic Tags (Click to inject)</label>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" onclick="injectTopicTag('AC & HVAC Repair')" class="px-3 py-1 rounded-lg bg-white border border-slate-200 hover:border-indigo-400 text-xs font-semibold text-slate-600 hover:text-indigo-600 transition shadow-2xs">❄️ AC & HVAC</button>
                        <button type="button" onclick="injectTopicTag('Smartphone Hardware')" class="px-3 py-1 rounded-lg bg-white border border-slate-200 hover:border-indigo-400 text-xs font-semibold text-slate-600 hover:text-indigo-600 transition shadow-2xs">📱 Smartphone</button>
                        <button type="button" onclick="injectTopicTag('Laptop Motherboard')" class="px-3 py-1 rounded-lg bg-white border border-slate-200 hover:border-indigo-400 text-xs font-semibold text-slate-600 hover:text-indigo-600 transition shadow-2xs">💻 Laptop PCB</button>
                        <button type="button" onclick="injectTopicTag('Washing Machine & Fridge')" class="px-3 py-1 rounded-lg bg-white border border-slate-200 hover:border-indigo-400 text-xs font-semibold text-slate-600 hover:text-indigo-600 transition shadow-2xs">⚡ Home Appliances</button>
                        <button type="button" onclick="injectTopicTag('Student Career Guide')" class="px-3 py-1 rounded-lg bg-white border border-slate-200 hover:border-indigo-400 text-xs font-semibold text-slate-600 hover:text-indigo-600 transition shadow-2xs">🎓 Career Guide</button>
                    </div>
                </div>

                <!-- Full-Width Rich Text Editor with Top Action Bar -->
                <div class="space-y-2 pt-2 w-full">
                    <div class="flex items-center justify-between flex-wrap gap-3 bg-white px-5 py-3 rounded-t-2xl border border-slate-200 border-b-0 shadow-2xs">
                        <label class="text-xs font-bold text-slate-800 flex items-center gap-2">
                            <i class="fa-solid fa-paragraph text-indigo-600"></i> Article Content & Rich Media (Full Width)
                        </label>
                        
                        <!-- Actions & Quick Buttons -->
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <span id="create-editor-word-count" class="text-xs font-bold text-slate-600 bg-slate-100 px-3 py-1.5 rounded-lg border border-slate-200">
                                <i class="fa-regular fa-file-lines mr-1 text-slate-400"></i> 0 words
                            </span>
                            <span id="create-editor-read-time" class="text-xs font-bold text-indigo-600 bg-indigo-50 px-3 py-1.5 rounded-lg border border-indigo-100">
                                <i class="fa-regular fa-clock mr-1"></i> ~1 min read
                            </span>

                            <!-- Direct PC Image Upload Button -->
                            <button type="button" onclick="triggerDirectImageUpload('create-blog-content')" class="px-3.5 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-bold shadow-xs transition flex items-center gap-1.5" title="Directly upload an image from your computer into this article">
                                <i class="fa-solid fa-cloud-arrow-up"></i> <span>Upload Image</span>
                            </button>

                            <!-- Free Size Studio Modal Button -->
                            <button type="button" onclick="openImageStudioModal('create-blog-content')" class="px-3.5 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-xs font-bold shadow-xs transition flex items-center gap-1.5" title="Adjust Image Length, Width, Proportions & Floating Alignment">
                                <i class="fa-solid fa-arrows-up-down-left-right text-[10px]"></i> <span>Free-Size Image Studio</span>
                            </button>

                            <!-- Jump to Bottom / Free Write Button -->
                            <button type="button" onclick="insertTypingParagraphAtEnd('create-blog-content')" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-xs font-bold border border-slate-200 shadow-xs transition flex items-center gap-1.5" title="Instantly create a new typing line at the bottom to write freely">
                                <i class="fa-solid fa-i-cursor text-indigo-600"></i> <span>Type at Bottom</span>
                            </button>

                            <!-- Select All Content Button -->
                            <button type="button" onclick="selectAllEditorContent('create-blog-content')" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-xs font-bold border border-slate-200 shadow-xs transition flex items-center gap-1.5" title="Select all text and content in the editor">
                                <i class="fa-solid fa-object-group text-indigo-600"></i> <span>Select All</span>
                            </button>

                            <!-- Large Page View Canvas Toggle -->
                            <button type="button" onclick="toggleEditorCanvasSize('create')" id="createEditorCanvasBtn" data-is-large="false" class="px-3 py-1.5 bg-slate-100 hover:bg-indigo-50 text-slate-700 hover:text-indigo-700 rounded-lg text-xs font-bold border border-slate-200 shadow-xs transition flex items-center gap-1.5" title="Expand Editor to Large Spacious Canvas (800px Height)">
                                <i class="fa-solid fa-expand text-indigo-600"></i> <span id="createEditorCanvasText">Large Page View</span>
                            </button>
                        </div>
                    </div>

                    <!-- TinyMCE Textarea (Spacious Full Width) -->
                    <textarea name="content" id="create-blog-content" class="w-full bg-white border border-slate-200 rounded-b-2xl text-sm min-h-[460px]">{{ old('content') }}</textarea>
                    
                    <div class="flex items-center justify-between text-xs text-slate-400 pt-1 flex-wrap gap-2">
                        <span><i class="fa-solid fa-circle-info text-indigo-500 mr-1"></i> Click any image to drag blue handles freely, double-click for exact Length & Width, or click <strong>Upload Image</strong> above.</span>
                        <span class="font-mono text-slate-400 text-[11px]">Images auto-uploaded to /public/uploads</span>
                    </div>
                </div>
            </div>

            <!-- ================= SECTION 2: COVER IMAGE STUDIO (MOVED DOWN) ================= -->
            <div class="pt-6 border-t border-slate-200/80 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <div>
                        <h4 class="text-sm font-extrabold uppercase tracking-wider text-slate-900 flex items-center gap-2">
                            <i class="fa-solid fa-image text-indigo-600"></i> Primary Cover Image (Hero Banner)
                        </h4>
                        <p class="text-xs text-slate-400 mt-0.5">Upload the main cover photo for the blog directory card and article top header.</p>
                    </div>
                    <span class="text-xs font-bold text-amber-700 bg-amber-50 border border-amber-200 px-3 py-1 rounded-full">
                        Primary Hero Banner
                    </span>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 bg-white p-6 rounded-2xl border border-slate-200 shadow-xs">
                    <!-- Dropzone (6 Cols) -->
                    <div class="lg:col-span-6 space-y-3">
                        <div id="createCoverDropzone" onclick="document.getElementById('createCoverInput').click()" class="relative border-2 border-dashed border-indigo-200 hover:border-indigo-500 rounded-2xl p-6 text-center cursor-pointer bg-indigo-50/20 hover:bg-indigo-50/40 transition group min-h-[220px] flex flex-col justify-center items-center">
                            <input type="file" id="createCoverInput" name="image" accept="image/*" class="hidden" onchange="handleCoverImageSelect(event, 'create')">
                            
                            <div id="createCoverEmptyState" class="space-y-3 py-4">
                                <div class="w-14 h-14 mx-auto rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-2xl group-hover:scale-110 transition shadow-xs">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">Click to Browse or Drag Cover Photo</p>
                                    <p class="text-xs text-slate-400 mt-1">Supports WEBP, PNG, JPG (up to 5MB)<br>Recommended resolution: 1200 &times; 675 (16:9 Banner)</p>
                                </div>
                                <button type="button" class="px-4 py-2 rounded-xl bg-white border border-slate-200 text-xs font-bold text-slate-700 shadow-2xs group-hover:border-indigo-400">
                                    Select File from Computer
                                </button>
                            </div>

                            <p id="createCoverChangeHint" class="hidden text-xs text-indigo-600 font-bold mt-2">Click to choose a different file</p>
                        </div>
                    </div>

                    <!-- Live Preview Box & Specs (6 Cols) -->
                    <div class="lg:col-span-6 space-y-4">
                        <div id="createCoverPreviewBox" class="hidden space-y-3">
                            <div class="relative rounded-2xl overflow-hidden border border-slate-200 shadow-xs bg-slate-900">
                                <img id="createCoverPreviewImg" src="" alt="Cover Preview" class="w-full object-cover transition-all duration-300" style="max-height: 220px;">
                                <div class="absolute top-2 right-2 flex gap-1">
                                    <button type="button" onclick="event.stopPropagation(); clearCoverImage('create')" class="px-2.5 py-1.5 bg-red-600/90 hover:bg-red-700 text-white rounded-lg text-xs font-bold shadow-md transition flex items-center gap-1" title="Remove Cover">
                                        <i class="fa-solid fa-trash-can"></i> Remove
                                    </button>
                                </div>
                                <div class="absolute bottom-2 left-2 bg-slate-900/80 backdrop-blur-xs text-white text-[11px] font-mono px-2.5 py-1 rounded-md">
                                    <span id="createCoverDimensions">-- &times; -- px</span>
                                </div>
                            </div>

                            <!-- Meta Specs -->
                            <div class="grid grid-cols-2 gap-3 text-left">
                                <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-200/80 text-xs">
                                    <span class="text-slate-400 block font-medium text-[11px]">Aspect Ratio</span>
                                    <span id="createCoverRatio" class="font-bold text-slate-800">16:9 Landscape</span>
                                </div>
                                <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-200/80 text-xs">
                                    <span class="text-slate-400 block font-medium text-[11px]">File Size</span>
                                    <span id="createCoverSize" class="font-bold text-slate-800">-- KB</span>
                                </div>
                            </div>

                            <!-- Height Slider -->
                            <div class="space-y-1 text-left pt-1">
                                <div class="flex justify-between items-center text-xs font-semibold text-slate-600">
                                    <span>Live Preview Height:</span>
                                    <span id="createCoverHeightVal" class="font-mono font-bold text-indigo-600">220px</span>
                                </div>
                                <input type="range" min="160" max="360" value="220" oninput="adjustCoverPreviewHeight(this.value, 'create')" class="w-full accent-indigo-600 h-1.5 bg-slate-200 rounded-lg cursor-pointer">
                            </div>
                        </div>

                        <!-- Placeholder when no image is selected -->
                        <div id="createCoverPreviewPlaceholder" class="border border-slate-100 rounded-2xl p-6 bg-slate-50/60 text-center flex flex-col justify-center items-center h-full min-h-[220px] text-slate-400 space-y-2">
                            <i class="fa-regular fa-image text-3xl text-slate-300"></i>
                            <p class="text-xs font-medium">Cover image preview and resolution diagnostics will appear here once selected.</p>
                        </div>
                    </div>

                    <!-- Banner Backlink Option (Full Width 12 Cols) -->
                    <div class="lg:col-span-12 pt-4 border-t border-slate-100">
                        <div class="bg-indigo-50/40 border border-indigo-100/90 rounded-2xl p-4.5 space-y-2.5">
                            <div class="flex items-center justify-between flex-wrap gap-2">
                                <label for="create-cover-link" class="text-xs font-bold text-slate-800 flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-indigo-600 text-white flex items-center justify-center text-xs shadow-xs">
                                        <i class="fa-solid fa-link"></i>
                                    </span>
                                    <span>Banner Backlink / Target URL (Optional)</span>
                                </label>
                                <span class="text-[11px] font-semibold text-indigo-700 bg-indigo-100/80 px-2.5 py-0.5 rounded-full flex items-center gap-1">
                                    <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i> Clickable Banner Link
                                </span>
                            </div>
                            <p class="text-xs text-slate-500">
                                Yahan backlink enter karein taki visitor jab article ke banner image par click kare toh seedhe is URL par redirect ho jaye (e.g. Admission link, Course details, ya Affiliate/Sponsor website).
                            </p>
                            <div class="relative flex items-center">
                                <span class="absolute left-3.5 text-slate-400 text-xs">
                                    <i class="fa-solid fa-globe"></i>
                                </span>
                                <input type="text" id="create-cover-link" name="cover_link" placeholder="https://smttc.in/admission ya https://example.com" class="w-full bg-white border border-slate-200 rounded-xl pl-9 pr-24 py-2.5 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 shadow-2xs">
                                <button type="button" onclick="testCoverLink('create-cover-link')" class="absolute right-2 px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-indigo-50 text-slate-600 hover:text-indigo-600 text-[11px] font-bold border border-slate-200 transition flex items-center gap-1">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i> Test Link
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= SECTION 3: SEO PREVIEW & PUBLISH ACTION ================= -->
            <div class="pt-6 border-t border-slate-200/80 grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                <!-- Google SEO Snippet (7 Cols) -->
                <div class="lg:col-span-7 bg-white rounded-2xl p-5 border border-slate-200 shadow-xs space-y-2.5">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-800 flex items-center gap-1.5">
                            <i class="fa-brands fa-google text-red-500"></i> Google Search Snippet Preview
                        </h4>
                        <span class="text-[10px] font-mono font-bold text-slate-400">SEO Preview</span>
                    </div>
                    
                    <div class="bg-slate-50/70 p-3.5 rounded-xl border border-slate-100 space-y-1 font-sans text-left">
                        <div class="flex items-center gap-1.5 text-xs text-slate-500">
                            <span class="w-4 h-4 rounded-full bg-indigo-600 text-white flex items-center justify-center text-[8px] font-bold">S</span>
                            <span class="truncate">https://smttc.in &rsaquo; blog &rsaquo; <span id="seoSlugPreview" class="text-slate-700 font-medium">article-slug</span></span>
                        </div>
                        <h5 id="seoTitlePreview" class="text-base font-semibold text-blue-700 hover:underline cursor-pointer leading-snug line-clamp-2">
                            Article Title Preview Goes Here
                        </h5>
                        <p id="seoSnippetPreview" class="text-xs text-slate-600 leading-relaxed line-clamp-2">
                            Provide valuable technical insights and guides to students. Content snippet will automatically generate here...
                        </p>
                    </div>
                </div>

                <!-- Publish Action (5 Cols) -->
                <div class="lg:col-span-5 bg-gradient-to-br from-indigo-950 via-slate-900 to-indigo-900 text-white rounded-2xl p-6 shadow-xl space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-indigo-200">Publication Status</span>
                        <span class="text-[10px] font-extrabold uppercase bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 px-2.5 py-1 rounded-md flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Instant Live
                        </span>
                    </div>
                    
                    <p class="text-xs text-indigo-100/80 leading-relaxed">
                        Ready to go live? Once published, this article will immediately be accessible on the public technical blog.
                    </p>

                    <button type="submit" id="publishBlogSubmitBtn" class="w-full py-4 rounded-xl bg-gradient-to-r from-amber-400 to-[#FACA0A] hover:from-amber-500 hover:to-yellow-500 text-slate-950 font-black text-sm uppercase tracking-wider shadow-lg transition duration-200 flex items-center justify-center gap-2 group cursor-pointer">
                        <i class="fa-solid fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-0.5 transition-transform" id="publishBlogSubmitIcon"></i>
                        <span id="publishBlogSubmitBtnText">Publish Blog Article Now</span>
                    </button>
                </div>
            </div>
        </form>

        <!-- Published Blogs Table -->
        <div class="space-y-4 pt-4 border-t border-slate-100">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-800 flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-indigo-600"></i> All Published Technical Articles
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Manage, update content, adjust cover images or delete articles.</p>
                </div>
                <div class="relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                    <input type="text" id="blogSearchInput" onkeyup="filterBlogTable()" placeholder="Search articles by title..." class="bg-slate-50 border border-slate-200 rounded-xl pl-9 pr-4 py-2 text-xs w-64 md:w-72 focus:outline-none focus:border-indigo-500 transition">
                </div>
            </div>

            <div class="overflow-x-auto rounded-2xl border border-slate-200/80 bg-white shadow-xs">
                <table id="blogsTable" class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-slate-400 text-[11px] font-bold uppercase tracking-wider">
                            <th class="p-4">Cover Photo</th>
                            <th class="p-4">Article Details</th>
                            <th class="p-4">Author</th>
                            <th class="p-4">Date</th>
                            <th class="p-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($blogs as $blog)
                            <tr class="blog-row hover:bg-slate-50/80 transition duration-150">
                                <td class="p-4 w-28">
                                    <div class="relative w-20 h-14 rounded-xl overflow-hidden border border-slate-200 bg-slate-100 shadow-2xs group">
                                        <img src="{{ $blog->image_url ? (Str::startsWith($blog->image_url, '/uploads') ? asset($blog->image_url) : asset($blog->image_url)) : asset('assets/images/default-blog.webp') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    </div>
                                </td>
                                <td class="p-4">
                                    <h4 class="font-bold text-slate-900 leading-snug blog-title-cell hover:text-indigo-600 transition">
                                        <a href="{{ route('blog.show', $blog->slug ?? $blog->id) }}" target="_blank">
                                            {{ $blog->title }}
                                        </a>
                                    </h4>
                                    <div class="flex items-center gap-2 mt-1 flex-wrap">
                                        <span class="text-[10px] font-mono text-slate-400">/blog/{{ $blog->slug ?? $blog->id }}</span>
                                        <span class="text-slate-300">&bull;</span>
                                        <span class="text-[10px] text-slate-500 font-medium">
                                            {{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read
                                        </span>
                                        @if($blog->cover_link)
                                            <span class="text-slate-300">&bull;</span>
                                            <a href="{{ $blog->cover_link }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[10px] font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 border border-indigo-200/60 px-2 py-0.5 rounded-md transition" title="Banner Target: {{ $blog->cover_link }}">
                                                <i class="fa-solid fa-link text-[9px]"></i> Backlink Active
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="p-4 text-xs font-semibold text-slate-600 whitespace-nowrap">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 text-slate-700">
                                        <i class="fa-solid fa-pen-nib text-[10px] text-indigo-500"></i> {{ $blog->author_name ?? 'Admin' }}
                                    </span>
                                </td>
                                <td class="p-4 text-xs font-semibold text-slate-500 whitespace-nowrap">
                                    {{ $blog->created_at->format('M d, Y') }}
                                </td>
                                <td class="p-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('blog.show', $blog->slug ?? $blog->id) }}" target="_blank" class="px-3 py-1.5 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-100 font-bold text-xs transition flex items-center gap-1" title="View Public Article">
                                            <i class="fa-solid fa-eye text-[11px]"></i> View
                                        </a>
                                        <button type="button" data-blog='@json($blog)' onclick="handleEditBlogClick(this)" class="px-3.5 py-1.5 rounded-lg border border-indigo-200 text-indigo-600 hover:bg-indigo-50 font-bold text-xs transition flex items-center gap-1.5">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </button>
                                        <form action="{{ route('admin.blogs.delete', $blog->id) }}" method="POST" onsubmit="return confirm('Delete this blog article?')" class="inline">
                                            @csrf
                                            <button type="submit" class="px-3.5 py-1.5 rounded-lg border border-red-200 text-red-600 hover:bg-red-50 font-bold text-xs transition flex items-center gap-1.5">
                                                <i class="fa-solid fa-trash-can"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-12 text-slate-400 text-sm font-medium">
                                    <i class="fa-regular fa-folder-open text-2xl mb-2 block text-slate-300"></i>
                                    No blog posts published yet. Create your first technical guide above!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>



<!-- ================= TAB 3: HERO SLIDERS MANAGEMENT ================= -->
<div id="tab-sliders" class="hidden space-y-8 animate-fade-in">
    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 md:p-8 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4 flex-wrap gap-4">
            <div>
                <h2 class="text-xl font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-images text-amber-500"></i> Homepage Hero Sliders
                </h2>
                <p class="text-xs text-slate-400 font-medium mt-1">Upload high-resolution banner images for the main website header carousel.</p>
            </div>
            <span class="text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-full">{{ count($sliders) }} Images</span>
        </div>

        <!-- Upload Box -->
        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-50 border-2 border-dashed border-slate-200 hover:border-amber-400 rounded-2xl p-6 transition duration-200">
            @csrf
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-xl font-bold shrink-0">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Upload New Banner Image</h4>
                        <p class="text-xs text-slate-400">Supported formats: JPG, PNG, WEBP (Max: 5MB)</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 w-full md:w-auto">
                    <input type="file" id="sliderFileInput" name="image" accept="image/*" required class="hidden" onchange="updateSliderFileName(this)">
                    <button type="button" onclick="document.getElementById('sliderFileInput').click()" class="w-full md:w-auto px-5 py-3 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold text-xs hover:bg-slate-100 transition shadow-xs">
                        <span id="sliderFileLabel">Browse Image File</span>
                    </button>
                    <button type="submit" class="w-full md:w-auto px-6 py-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs shadow-md transition">
                        Upload Slider
                    </button>
                </div>
            </div>
        </form>

        <!-- Slider Images Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 pt-2">
            @forelse($sliders as $slider)
                <div class="relative group bg-slate-100 rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-300">
                    <img src="{{ Str::startsWith($slider->image_url, '/uploads') ? asset($slider->image_url) : asset($slider->image_url) }}" class="w-full h-52 object-cover transition-transform duration-500 group-hover:scale-105">
                    
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-3 backdrop-blur-xs">
                        <form action="{{ route('admin.sliders.delete', $slider->id) }}" method="POST" onsubmit="return confirm('Delete this hero slider image?')">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2.5 rounded-xl font-bold text-xs shadow-lg transition flex items-center gap-1.5">
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        </form>
                    </div>

                    <div class="p-3 bg-white border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                        <span>Added {{ $slider->created_at->format('M d, Y') }}</span>
                        <span class="font-semibold text-amber-600">Active</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center bg-slate-50/50 rounded-2xl border border-dashed border-slate-200">
                    <i class="fa-solid fa-image text-3xl text-slate-300 mb-2"></i>
                    <p class="text-slate-400 text-sm font-medium">No slider images uploaded yet.</p>
                </div>
            @endforelse
        </div>
    </section>
</div>

<!-- ================= TAB 4: FEE STRUCTURE MANAGEMENT ================= -->
<div id="tab-fees" class="hidden space-y-8 animate-fade-in">
    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 md:p-8 space-y-8">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4 flex-wrap gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold uppercase tracking-wider mb-2">
                    <i class="fa-solid fa-tags"></i> Course Pricing & Scholarship Engine
                </div>
                <h2 class="text-xl sm:text-2xl font-black text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-indian-rupee-sign text-emerald-600"></i> Fee Structure & Discount Management
                </h2>
                <p class="text-xs text-slate-500 font-medium mt-1">Set course fees, percentage discounts for boys, special scholarships for girls, and promotional offer tags.</p>
            </div>
            <span class="text-xs font-bold text-slate-600 bg-slate-100 px-3.5 py-1.5 rounded-full border border-slate-200 shadow-2xs">
                <i class="fa-solid fa-graduation-cap text-indigo-500 mr-1"></i> {{ count($fees) }} Courses Configured
            </span>
        </div>

        <!-- Add Fee & Discount Form -->
        <form action="{{ route('admin.fees.store') }}" method="POST" class="bg-slate-50/80 p-6 md:p-8 rounded-2xl border border-slate-200 space-y-6">
            @csrf
            <div class="flex items-center justify-between flex-wrap gap-2">
                <h3 class="text-sm font-black uppercase tracking-wider text-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-circle-plus text-emerald-600"></i> Add New Course Fee & Offer
                </h3>
                <span class="text-[11px] font-bold text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-lg border border-indigo-100">
                    Live Price & Discount Calculator
                </span>
            </div>

            <!-- Basic Course Info (Row 1) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Course Name <span class="text-red-500">*</span></label>
                    <input type="text" name="course_name" id="createFeeCourseName" placeholder="e.g. AC Repairing & Inverter PCB" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium focus:outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-50 transition shadow-2xs">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Course Duration <span class="text-red-500">*</span></label>
                    <input type="text" name="duration" placeholder="e.g. 3 Months (Daily 2 Hours)" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium focus:outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-50 transition shadow-2xs">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Base Course Fee <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-xs">₹</span>
                        <input type="text" name="course_fee" id="createCourseFeeInput" oninput="calculateFeeDiscounts('create')" placeholder="15,000" required class="w-full bg-white border border-slate-200 rounded-xl pl-8 pr-4 py-2.5 text-xs font-bold text-slate-900 focus:outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-50 transition shadow-2xs">
                    </div>
                </div>
                
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Certification</label>
                    <input type="text" name="certification" value="ISO & Govt. Recognized Certificate" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium focus:outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-50 transition shadow-2xs">
                </div>
            </div>

            <!-- Special Discount & Scholarship Card (Row 2) -->
            <div class="bg-white p-5 rounded-2xl border border-indigo-100 shadow-xs space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2 border-b border-slate-100 pb-3">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center text-xs font-bold">
                            <i class="fa-solid fa-percent"></i>
                        </span>
                        <div>
                            <h4 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider">Gender-Based Discount & Offer Settings</h4>
                            <p class="text-[11px] text-slate-400">Offer separate discounts for boys and higher scholarships for girl students.</p>
                        </div>
                    </div>
                    
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="offer_active" value="1" checked class="sr-only peer">
                        <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-600"></div>
                        <span class="ml-2 text-xs font-bold text-slate-700">Activate Offer</span>
                    </label>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Boys Discount -->
                    <div class="bg-blue-50/50 p-3.5 rounded-xl border border-blue-100 space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label class="block text-xs font-bold text-blue-900 flex items-center gap-1">
                                👦 Boys Discount (%)
                            </label>
                            <span id="createBoysCalculatedBadge" class="text-[10px] font-bold text-blue-700 bg-blue-100 px-2 py-0.5 rounded-md">Final: ₹--</span>
                        </div>
                        <div class="relative">
                            <input type="number" name="discount_boys" id="createDiscountBoysInput" min="0" max="100" placeholder="e.g. 20" oninput="calculateFeeDiscounts('create')" class="w-full bg-white border border-blue-200 rounded-lg px-3 py-2 text-xs font-bold text-blue-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 transition">
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-blue-400 font-bold text-xs">% OFF</span>
                        </div>
                    </div>

                    <!-- Girls Special Scholarship -->
                    <div class="bg-purple-50/50 p-3.5 rounded-xl border border-purple-100 space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label class="block text-xs font-bold text-purple-900 flex items-center gap-1">
                                👧 Girls Scholarship (%)
                            </label>
                            <span id="createGirlsCalculatedBadge" class="text-[10px] font-bold text-purple-700 bg-purple-100 px-2 py-0.5 rounded-md">Final: ₹--</span>
                        </div>
                        <div class="relative">
                            <input type="number" name="discount_girls" id="createDiscountGirlsInput" min="0" max="100" placeholder="e.g. 40" oninput="calculateFeeDiscounts('create')" class="w-full bg-white border border-purple-200 rounded-lg px-3 py-2 text-xs font-bold text-purple-900 focus:outline-none focus:border-purple-600 focus:ring-2 focus:ring-purple-100 transition">
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-purple-400 font-bold text-xs">% OFF</span>
                        </div>
                    </div>

                    <!-- Offer Tagline / Badge -->
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700">Offer Tagline / Badge</label>
                        <input type="text" name="offer_tag" placeholder="e.g. 🔥 Top Trending Course" class="w-full bg-white border border-slate-200 rounded-xl px-3.5 py-2 text-xs font-medium focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-50 transition">
                    </div>

                    <!-- Badge Theme Color -->
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700">Badge Theme</label>
                        <select name="badge_color" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs font-semibold text-slate-700 focus:outline-none focus:border-emerald-600 transition">
                            <option value="amber">Amber Gold (🔥 Trending)</option>
                            <option value="emerald" selected>Emerald Green (⚡ Best Value)</option>
                            <option value="indigo">Indigo Royal (⭐ Premium)</option>
                            <option value="rose">Rose Red (🎁 Limited Offer)</option>
                            <option value="blue">Tech Blue (💻 Standard)</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center flex-wrap gap-4 pt-1">
                <span class="text-xs text-slate-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-check text-emerald-500"></i>
                    Original fee par strike-through (~~₹15,000~~) aur Boys/Girls discounted price website par automatically dikhega.
                </span>
                <button type="submit" class="px-8 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md shadow-emerald-200 transition duration-200 flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Save Course Fee & Offer
                </button>
            </div>
        </form>

        <!-- Fee Structures Table -->
        <div class="space-y-4 pt-2">
            <div class="flex items-center justify-between flex-wrap gap-2">
                <h3 class="text-sm font-black uppercase tracking-wider text-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-list-check text-indigo-600"></i> Active Course Fee & Scholarship Catalog
                </h3>
                <span class="text-xs text-slate-400">Click Edit to modify fees, scholarships, or offer badges anytime.</span>
            </div>

            <div class="overflow-x-auto rounded-2xl border border-slate-200/90 bg-white shadow-2xs">
                <table class="w-full text-left border-collapse min-w-[750px]">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 text-[11px] font-extrabold uppercase tracking-wider">
                            <th class="p-4">Course Name & Tag</th>
                            <th class="p-4">Duration & Certificate</th>
                            <th class="p-4">Standard Fee</th>
                            <th class="p-4">👦 Boys Fee</th>
                            <th class="p-4">👧 Girls Scholarship</th>
                            <th class="p-4">Status</th>
                            <th class="p-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs">
                        @forelse($fees as $fee)
                            <tr class="hover:bg-slate-50/70 transition duration-150">
                                <td class="p-4">
                                    <div class="font-extrabold text-slate-900 text-sm">{{ $fee->course_name }}</div>
                                    @if($fee->offer_tag)
                                        <span class="inline-block mt-1 text-[10px] font-bold px-2.5 py-0.5 rounded-full border
                                            @if($fee->badge_color === 'amber') bg-amber-50 text-amber-700 border-amber-200
                                            @elseif($fee->badge_color === 'rose') bg-rose-50 text-rose-700 border-rose-200
                                            @elseif($fee->badge_color === 'indigo') bg-indigo-50 text-indigo-700 border-indigo-200
                                            @elseif($fee->badge_color === 'blue') bg-blue-50 text-blue-700 border-blue-200
                                            @else bg-emerald-50 text-emerald-700 border-emerald-200
                                            @endif">
                                            {{ $fee->offer_tag }}
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <div class="font-bold text-slate-700">{{ $fee->duration }}</div>
                                    <div class="text-[11px] text-slate-400 truncate max-w-[160px]">{{ $fee->certification }}</div>
                                </td>
                                <td class="p-4">
                                    @if($fee->hasDiscount())
                                        <div class="text-xs text-slate-400 line-through font-semibold">{{ $fee->course_fee }}</div>
                                    @else
                                        <div class="font-black text-slate-900 text-sm">{{ $fee->course_fee }}</div>
                                    @endif
                                </td>
                                <td class="p-4">
                                    @if($fee->hasDiscount() && $fee->discount_boys > 0)
                                        <div class="font-extrabold text-blue-700 text-sm">{{ $fee->boys_discounted_fee }}</div>
                                        <span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-100 px-1.5 py-0.5 rounded">
                                            {{ $fee->discount_boys }}% OFF
                                        </span>
                                    @else
                                        <span class="text-slate-600 font-medium">{{ $fee->course_fee }}</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    @if($fee->hasDiscount() && $fee->discount_girls > 0)
                                        <div class="font-extrabold text-purple-700 text-sm">{{ $fee->girls_discounted_fee }}</div>
                                        <span class="text-[10px] font-bold text-purple-600 bg-purple-50 border border-purple-100 px-1.5 py-0.5 rounded">
                                            {{ $fee->discount_girls }}% Scholarship
                                        </span>
                                    @else
                                        <span class="text-slate-600 font-medium">{{ $fee->course_fee }}</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    @if($fee->offer_active && $fee->hasDiscount())
                                        <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-1 rounded-full">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Active Offer
                                        </span>
                                    @else
                                        <span class="text-[11px] font-bold text-slate-500 bg-slate-100 border border-slate-200 px-2.5 py-1 rounded-full">
                                            Standard
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <button type="button" data-fee="{{ base64_encode(json_encode($fee)) }}" onclick="handleFeeEdit(this)" class="px-3 py-1.5 rounded-lg border border-slate-200 text-slate-700 hover:text-indigo-600 hover:border-indigo-300 font-bold text-xs transition flex items-center gap-1 bg-white shadow-2xs" title="Edit course fee and discounts">
                                            <i class="fa-solid fa-pen-to-square text-indigo-500"></i> Edit
                                        </button>
                                        <form action="{{ route('admin.fees.delete', $fee->id) }}" method="POST" onsubmit="return confirm('Delete this course fee structure?')" class="inline">
                                            @csrf
                                            <button type="submit" class="px-3 py-1.5 rounded-lg border border-red-200 text-red-600 hover:bg-red-50 font-bold text-xs transition flex items-center gap-1" title="Delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-12 text-slate-400 text-sm font-medium">No fee structures found. Add your first course pricing above!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- ================= MODAL: EDIT COURSE FEE & DISCOUNT ================= -->
<div id="editFeeModal" class="fixed inset-0 z-[110] hidden flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-xs" onclick="closeEditFeeModal()"></div>
    <div class="relative bg-white rounded-3xl shadow-2xl border border-slate-200 w-full max-w-2xl overflow-hidden animate-scale-up z-10">
        <!-- Header -->
        <div class="bg-gradient-to-r from-emerald-600 via-teal-600 to-indigo-700 text-white px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <span class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center text-sm font-bold">
                    <i class="fa-solid fa-tags"></i>
                </span>
                <div>
                    <h3 class="text-base font-black">Edit Course Fee & Discount</h3>
                    <p class="text-xs text-emerald-100">Update pricing, boys discount and girls scholarship</p>
                </div>
            </div>
            <button type="button" onclick="closeEditFeeModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition">&times;</button>
        </div>

        <form id="editFeeForm" action="" method="POST" class="p-6 space-y-5">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Course Name <span class="text-red-500">*</span></label>
                    <input type="text" name="course_name" id="editFeeCourseName" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-semibold text-slate-900 focus:outline-none focus:border-emerald-600 focus:bg-white transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Course Duration <span class="text-red-500">*</span></label>
                    <input type="text" name="duration" id="editFeeDuration" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-semibold text-slate-900 focus:outline-none focus:border-emerald-600 focus:bg-white transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Standard Course Fee <span class="text-red-500">*</span></label>
                    <input type="text" name="course_fee" id="editCourseFeeInput" oninput="calculateFeeDiscounts('edit')" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-bold text-slate-900 focus:outline-none focus:border-emerald-600 focus:bg-white transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Certification</label>
                    <input type="text" name="certification" id="editFeeCertification" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-semibold text-slate-900 focus:outline-none focus:border-emerald-600 focus:bg-white transition">
                </div>
            </div>

            <!-- Discount Section -->
            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200/80 space-y-3">
                <div class="flex items-center justify-between border-b border-slate-200 pb-2">
                    <span class="text-xs font-bold text-slate-800 uppercase tracking-wider flex items-center gap-1.5">
                        <i class="fa-solid fa-gift text-indigo-600"></i> Special Offer & Scholarships
                    </span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="offer_active" id="editFeeOfferActive" value="1" class="sr-only peer">
                        <div class="w-8 h-4 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-emerald-600"></div>
                        <span class="ml-2 text-xs font-bold text-slate-700">Offer Active</span>
                    </label>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="bg-blue-50/70 p-3 rounded-xl border border-blue-100 space-y-1">
                        <div class="flex items-center justify-between">
                            <label class="block text-xs font-bold text-blue-900">👦 Boys Discount (%)</label>
                            <span id="editBoysCalculatedBadge" class="text-[10px] font-bold text-blue-700">Final: ₹--</span>
                        </div>
                        <input type="number" name="discount_boys" id="editDiscountBoysInput" min="0" max="100" oninput="calculateFeeDiscounts('edit')" class="w-full bg-white border border-blue-200 rounded-lg px-3 py-1.5 text-xs font-bold text-blue-900 focus:outline-none focus:border-blue-600">
                    </div>

                    <div class="bg-purple-50/70 p-3 rounded-xl border border-purple-100 space-y-1">
                        <div class="flex items-center justify-between">
                            <label class="block text-xs font-bold text-purple-900">👧 Girls Scholarship (%)</label>
                            <span id="editGirlsCalculatedBadge" class="text-[10px] font-bold text-purple-700">Final: ₹--</span>
                        </div>
                        <input type="number" name="discount_girls" id="editDiscountGirlsInput" min="0" max="100" oninput="calculateFeeDiscounts('edit')" class="w-full bg-white border border-purple-200 rounded-lg px-3 py-1.5 text-xs font-bold text-purple-900 focus:outline-none focus:border-purple-600">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                    <div class="space-y-1">
                        <label class="block text-[11px] font-bold text-slate-600">Offer Tagline / Badge</label>
                        <input type="text" name="offer_tag" id="editFeeOfferTag" placeholder="e.g. 🔥 Top Trending Course" class="w-full bg-white border border-slate-200 rounded-lg px-3 py-1.5 text-xs">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-[11px] font-bold text-slate-600">Badge Theme</label>
                        <select name="badge_color" id="editFeeBadgeColor" class="w-full bg-white border border-slate-200 rounded-lg px-3 py-1.5 text-xs font-semibold">
                            <option value="amber">Amber Gold</option>
                            <option value="emerald">Emerald Green</option>
                            <option value="indigo">Indigo Royal</option>
                            <option value="rose">Rose Red</option>
                            <option value="blue">Tech Blue</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-2.5 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeEditFeeModal()" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-700 font-bold text-xs hover:bg-slate-50 transition">Cancel</button>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md shadow-emerald-100 transition flex items-center gap-1.5">
                    <i class="fa-solid fa-check"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ================= TAB 5: GALLERY MANAGEMENT ================= -->
<div id="tab-galleries" class="hidden space-y-8 animate-fade-in">
    <!-- Header with Stats -->
    <div class="bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 text-white rounded-3xl p-6 sm:p-8 shadow-xl border border-slate-800 flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-1">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/20 text-blue-300 border border-blue-400/30 text-xs font-bold uppercase tracking-wider">
                <i class="fa-solid fa-photo-film"></i> SMTTC Media Studio
            </div>
            <h2 class="text-2xl sm:text-3xl font-black text-white flex items-center gap-3">
                Gallery & Video Management
            </h2>
            <p class="text-xs sm:text-sm text-slate-300 max-w-xl">
                Upload practical training lab photos, student bench testing videos, and event highlights with technical descriptions and category tags.
            </p>
        </div>

        <!-- Quick Metrics Badges -->
        <div class="flex items-center gap-2 flex-wrap">
            <div class="bg-emerald-500/20 border border-emerald-400/30 px-3.5 py-2 rounded-2xl text-center">
                <span class="block text-lg font-black text-emerald-300">{{ count($beforeAfters ?? []) }}</span>
                <span class="text-[10px] font-bold text-emerald-200">🔄 Before/After</span>
            </div>
            <div class="bg-red-500/20 border border-red-400/30 px-3.5 py-2 rounded-2xl text-center">
                <span class="block text-lg font-black text-red-300">{{ count($successVideos ?? []) }}</span>
                <span class="text-[10px] font-bold text-red-200">🎥 5s Video Stories</span>
            </div>
            <div class="bg-sky-500/20 border border-sky-400/30 px-3.5 py-2 rounded-2xl text-center">
                <span class="block text-lg font-black text-sky-300">{{ count($successfulStudents ?? []) }}</span>
                <span class="text-[10px] font-bold text-sky-200">🎓 Placed Ticker</span>
            </div>
            <div class="bg-blue-500/20 border border-blue-400/30 px-3.5 py-2 rounded-2xl text-center">
                <span class="block text-lg font-black text-blue-300">{{ count($galleries) }}</span>
                <span class="text-[10px] font-bold text-blue-200">📸 Media Catalog</span>
            </div>
        </div>
    </div>

    <!-- SUB-TAB SWITCHER (ALL 4 POST OPTIONS UNIFIED IN GALLERY TAB) -->
    <div class="bg-slate-100 p-2 rounded-2xl border border-slate-200/80 shadow-inner flex items-center gap-2 overflow-x-auto">
        <button type="button" 
                onclick="switchAdminGallerySubTab('ba')" 
                id="subtab-btn-ba" 
                class="admin-gal-subtab-btn px-4 py-2.5 rounded-xl font-black text-xs transition flex items-center gap-2 bg-emerald-600 text-white shadow-sm whitespace-nowrap">
            <i class="fa-solid fa-arrows-left-right text-amber-300"></i>
            <span>1. Before & After (Upload 2 Images)</span>
            <span class="px-2 py-0.5 rounded-full text-[10px] bg-white/20 text-white font-extrabold">{{ count($beforeAfters ?? []) }}</span>
        </button>

        <button type="button" 
                onclick="switchAdminGallerySubTab('stories')" 
                id="subtab-btn-stories" 
                class="admin-gal-subtab-btn px-4 py-2.5 rounded-xl font-bold text-xs transition flex items-center gap-2 text-slate-700 hover:text-slate-900 hover:bg-white/80 whitespace-nowrap">
            <i class="fa-solid fa-circle-play text-red-500"></i>
            <span>2. Video Success Story (5-Sec Slot)</span>
            <span class="px-2 py-0.5 rounded-full text-[10px] bg-slate-200 text-slate-700 font-extrabold">{{ count($successVideos ?? []) }}</span>
        </button>

        <button type="button" 
                onclick="switchAdminGallerySubTab('students')" 
                id="subtab-btn-students" 
                class="admin-gal-subtab-btn px-4 py-2.5 rounded-xl font-bold text-xs transition flex items-center gap-2 text-slate-700 hover:text-slate-900 hover:bg-white/80 whitespace-nowrap">
            <i class="fa-solid fa-graduation-cap text-sky-500"></i>
            <span>3. Placed Students (Top Live Ticker)</span>
            <span class="px-2 py-0.5 rounded-full text-[10px] bg-slate-200 text-slate-700 font-extrabold">{{ count($successfulStudents ?? []) }}</span>
        </button>

        <button type="button" 
                onclick="switchAdminGallerySubTab('catalog')" 
                id="subtab-btn-catalog" 
                class="admin-gal-subtab-btn px-4 py-2.5 rounded-xl font-bold text-xs transition flex items-center gap-2 text-slate-700 hover:text-slate-900 hover:bg-white/80 whitespace-nowrap">
            <i class="fa-solid fa-photo-film text-blue-600"></i>
            <span>4. General Lab Media & Videos (Bottom Grid)</span>
            <span class="px-2 py-0.5 rounded-full text-[10px] bg-slate-200 text-slate-700 font-extrabold">{{ count($galleries) }}</span>
        </button>
    </div>

    <!-- ================= SUB-PANE 1: BEFORE & AFTER REPAIR (2 IMAGES) ================= -->
    <div id="admin-gal-pane-ba" class="space-y-6">
        <!-- Guidance Banner -->
        <div class="bg-gradient-to-r from-emerald-500/10 via-teal-500/5 to-transparent border-l-4 border-emerald-500 p-4 rounded-r-2xl">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center shrink-0 text-sm shadow-sm">
                    <i class="fa-solid fa-arrows-left-right"></i>
                </div>
                <div>
                    <h4 class="text-xs font-black text-slate-900 uppercase tracking-wider">Public Gallery: Top Interactive Split Slider</h4>
                    <p class="text-xs text-slate-600 mt-0.5 leading-relaxed">
                        Yahan aapko <strong>2 ALAG-ALAG IMAGES</strong> upload karni hain: <strong>1. Before Image (Kharab/Dead PCB)</strong> aur <strong>2. After Image (100% Repaired/Working PCB)</strong>. Jab aap ise publish karenge toh yeh Public Gallery ke <strong>SABSE UPPER</strong> split slider me show hoga jahan students slider ko left-right karke micro-soldering proof dekh sakte hain!
                    </p>
                </div>
            </div>
        </div>

        <!-- Before & After Upload Form -->
        <section class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4 flex-wrap gap-3">
                <div>
                    <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-cloud-arrow-up text-emerald-600"></i> Upload New 2-Image Before & After Case
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Upload Dead vs Repaired PCB photos with fault diagnostics & micro-soldering solutions.</p>
                </div>
                <span class="px-3 py-1.5 rounded-xl bg-emerald-50 text-emerald-700 font-black text-xs border border-emerald-200">
                    {{ count($beforeAfters ?? []) }} Cases Published
                </span>
            </div>

            <form action="{{ route('admin.before_after.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    
                    <!-- Left (7 Cols): Metadata -->
                    <div class="lg:col-span-7 space-y-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700">Practical Case Title <span class="text-red-500">*</span></label>
                            <input type="text" name="title" required placeholder="e.g. Inverter AC Outdoor PCB - IPM Short Circuit Repair" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-50 transition shadow-2xs">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Category Tag <span class="text-red-500">*</span></label>
                                <select name="category" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 focus:outline-none focus:border-emerald-600 focus:bg-white transition shadow-2xs">
                                    <option value="AC & HVAC PCB Repairing">❄️ AC & HVAC PCB Repairing</option>
                                    <option value="Smartphone Hardware & Micro-soldering">📱 Smartphone Hardware & Micro-soldering</option>
                                    <option value="Laptop Chip Level Repairing">💻 Laptop Chip Level Repairing</option>
                                    <option value="Home Appliances (Fridge/Washing Machine)">⚡ Home Appliances (Fridge / Washing Machine)</option>
                                    <option value="Student Lab Practicals">🔬 Student Lab Practicals</option>
                                </select>
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Tools / Equipment Used</label>
                                <input type="text" name="tools_used" placeholder="e.g. SMD Hot Air Gun, DSO, Microscope" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-emerald-600 focus:bg-white transition shadow-2xs">
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700">Fault Diagnosed (समस्या / खराबी) <span class="text-red-500">*</span></label>
                            <textarea name="fault_description" rows="2" required placeholder="e.g. Outdoor PCB completely non-responsive with U4 error code. Burnt traces and shorted IPM module." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-emerald-600 focus:bg-white transition shadow-2xs"></textarea>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700">Repair Procedure (समाधान / प्रैक्टिकल तरीका) <span class="text-red-500">*</span></label>
                            <textarea name="repair_solution" rows="2" required placeholder="e.g. Micro-soldered replacement IPM module, reconstructed damaged PCB traces using 0.08mm wire, tested on compressor bench." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-emerald-600 focus:bg-white transition shadow-2xs"></textarea>
                        </div>
                    </div>

                    <!-- Right (5 Cols): Both Images Upload (Before & After) -->
                    <div class="lg:col-span-5 space-y-4">
                        <!-- 1. Before Image (Faulty) -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-red-600 flex items-center justify-between">
                                <span class="flex items-center gap-1"><i class="fa-solid fa-triangle-exclamation"></i> 1. BEFORE Image (Kharab / Dead PCB) <span class="text-red-500">*</span></span>
                                <span class="text-[10px] bg-red-100 text-red-700 font-bold px-2 py-0.5 rounded-full">Required</span>
                            </label>
                            <div onclick="document.getElementById('baBeforeFileInput').click()" class="border-2 border-dashed border-red-200 hover:border-red-400 bg-red-50/20 hover:bg-red-50/40 rounded-2xl p-4 text-center cursor-pointer transition min-h-[110px] flex flex-col justify-center items-center">
                                <input type="file" id="baBeforeFileInput" name="before_image" accept="image/*" required class="hidden" onchange="previewAdminBAFile(this, 'adminBeforePreview')">
                                <p class="text-xs font-bold text-slate-700" id="adminBeforeLabel">Click to Choose Before Image</p>
                                <p class="text-[10px] text-slate-400">JPG, PNG, WEBP (Max 10MB)</p>
                                <img id="adminBeforePreview" src="" alt="Before Preview" class="hidden max-h-24 mt-2 rounded-lg object-cover shadow-sm">
                            </div>
                        </div>

                        <!-- 2. After Image (Repaired) -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-emerald-600 flex items-center justify-between">
                                <span class="flex items-center gap-1"><i class="fa-solid fa-circle-check"></i> 2. AFTER Image (100% Repaired / OK PCB) <span class="text-red-500">*</span></span>
                                <span class="text-[10px] bg-emerald-100 text-emerald-700 font-bold px-2 py-0.5 rounded-full">Required</span>
                            </label>
                            <div onclick="document.getElementById('baAfterFileInput').click()" class="border-2 border-dashed border-emerald-200 hover:border-emerald-400 bg-emerald-50/20 hover:bg-emerald-50/40 rounded-2xl p-4 text-center cursor-pointer transition min-h-[110px] flex flex-col justify-center items-center">
                                <input type="file" id="baAfterFileInput" name="after_image" accept="image/*" required class="hidden" onchange="previewAdminBAFile(this, 'adminAfterPreview')">
                                <p class="text-xs font-bold text-slate-700" id="adminAfterLabel">Click to Choose After Image</p>
                                <p class="text-[10px] text-slate-400">JPG, PNG, WEBP (Max 10MB)</p>
                                <img id="adminAfterPreview" src="" alt="After Preview" class="hidden max-h-24 mt-2 rounded-lg object-cover shadow-sm">
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-black text-xs shadow-md shadow-emerald-200 transition flex items-center justify-center gap-2">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <span>Publish Before & After Case (Shows at Top Slider)</span>
                            </button>
                        </div>
                    </div>

                </div>
            </form>

            <!-- Existing Case Studies List -->
            @if(isset($beforeAfters) && count($beforeAfters) > 0)
            <div class="pt-6 border-t border-slate-100 space-y-4">
                <h4 class="text-xs font-black uppercase tracking-wider text-slate-500 flex items-center gap-1.5">
                    <i class="fa-solid fa-list-check text-emerald-600"></i> Active Before & After Cases in Top Slider ({{ count($beforeAfters) }})
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($beforeAfters as $case)
                        @php
                            $bSrc = Str::startsWith($case->before_image, 'http') ? $case->before_image : asset($case->before_image);
                            $aSrc = Str::startsWith($case->after_image, 'http') ? $case->after_image : asset($case->after_image);
                        @endphp
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-emerald-300 transition flex items-start gap-4 justify-between">
                            <!-- Two Mini Images -->
                            <div class="flex items-center gap-2 shrink-0">
                                <div class="relative w-16 h-16 rounded-xl overflow-hidden border border-red-200 shadow-2xs">
                                    <img src="{{ $bSrc }}" alt="Before" class="w-full h-full object-cover">
                                    <span class="absolute bottom-0 inset-x-0 bg-red-600/90 text-white text-[8px] font-bold text-center py-0.5">Before</span>
                                </div>
                                <div class="relative w-16 h-16 rounded-xl overflow-hidden border border-emerald-200 shadow-2xs">
                                    <img src="{{ $aSrc }}" alt="After" class="w-full h-full object-cover">
                                    <span class="absolute bottom-0 inset-x-0 bg-emerald-600/90 text-white text-[8px] font-bold text-center py-0.5">After</span>
                                </div>
                            </div>

                            <!-- Info -->
                            <div class="flex-1 min-w-0 space-y-1">
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-blue-100 text-blue-700">{{ $case->category }}</span>
                                <h5 class="text-xs font-bold text-slate-900 truncate" title="{{ $case->title }}">{{ $case->title }}</h5>
                                <p class="text-[11px] text-slate-500 line-clamp-1">{{ $case->fault_description ?: 'No fault notes' }}</p>
                                <span class="text-[10px] text-slate-400 flex items-center gap-1 font-medium">
                                    <i class="fa-solid fa-heart text-red-400"></i> {{ $case->likes_count }} Helpful clicks
                                </span>
                            </div>

                            <!-- Action -->
                            <form action="{{ route('admin.before_after.delete', $case->id) }}" method="POST" onsubmit="return confirm('Delete this Before & After case study?')" class="shrink-0">
                                @csrf
                                <button type="submit" class="w-7 h-7 rounded-lg bg-white hover:bg-red-50 text-slate-400 hover:text-red-600 border border-slate-200 transition flex items-center justify-center" title="Delete Case">
                                    <i class="fa-solid fa-trash-can text-[10px]"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </section>
    </div>

    <!-- ================= SUB-PANE 2: VIDEO SUCCESS STORY (5-SEC SLOT) ================= -->
    <div id="admin-gal-pane-stories" class="hidden space-y-6">
        <!-- Guidance Banner -->
        <div class="bg-gradient-to-r from-red-500/10 via-rose-500/5 to-transparent border-l-4 border-red-500 p-4 rounded-r-2xl">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-xl bg-red-500 text-white flex items-center justify-center shrink-0 text-sm shadow-sm">
                    <i class="fa-solid fa-circle-play"></i>
                </div>
                <div>
                    <h4 class="text-xs font-black text-slate-900 uppercase tracking-wider">Public Gallery: 5-Second Auto-Rotating Video Slot</h4>
                    <p class="text-xs text-slate-600 mt-0.5 leading-relaxed">
                        Yeh video card public gallery me Before/After comparison ke bagal me display hota hai aur <strong>HAR 5 SECONDS ME AUTOMATICALLY CHANGE</strong> hota hai! Yahan aap student ka name, course, video demonstration link (YouTube ya MP4 file), earning badge aur unka real feedback add kar sakte hain.
                    </p>
                </div>
            </div>
        </div>

        <!-- Create Story Video Form -->
        <section class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4 flex-wrap gap-3">
                <div>
                    <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-video text-red-600"></i> Add Video Success Story (5-Sec Rotator)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Students who completed practical training and started successful careers / earning.</p>
                </div>
                <span class="px-3 py-1.5 rounded-xl bg-red-50 text-red-700 font-black text-xs border border-red-200">
                    {{ count($successVideos ?? []) }} Stories Published
                </span>
            </div>

            <form action="{{ route('admin.story_videos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    
                    <!-- Left (7 Cols): Student Info & Story Details -->
                    <div class="lg:col-span-7 space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Student Name <span class="text-red-500">*</span></label>
                                <input type="text" name="student_name" required placeholder="e.g. Rahul Sharma" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-red-500 focus:bg-white focus:ring-4 focus:ring-red-50 transition shadow-2xs">
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Course Completed <span class="text-red-500">*</span></label>
                                <input type="text" name="course" required placeholder="e.g. Inverter AC PCB Repairing" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-red-500 focus:bg-white focus:ring-4 focus:ring-red-50 transition shadow-2xs">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Video Story Title <span class="text-red-500">*</span></label>
                                <input type="text" name="title" required placeholder="e.g. From Beginner to Earning ₹60,000/mo" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-red-500 focus:bg-white focus:ring-4 focus:ring-red-50 transition shadow-2xs">
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Monthly Earning / Shop Badge</label>
                                <input type="text" name="earning_badge" placeholder="e.g. Earns ₹50,000+/mo, Shop Owner" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-red-500 focus:bg-white transition shadow-2xs">
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700">Student Real Experience / Testimonial Quote</label>
                            <textarea name="story_description" rows="3" placeholder="e.g. SMTTC ke practical lab me mujhe real fault-finding seekhne ko mila. Ab main har tarah ke dead inverter board repair kar leta hoon." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-red-500 focus:bg-white transition shadow-2xs"></textarea>
                        </div>
                    </div>

                    <!-- Right (5 Cols): Video URL / Upload -->
                    <div class="lg:col-span-5 space-y-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700 flex items-center justify-between">
                                <span class="flex items-center gap-1"><i class="fa-brands fa-youtube text-red-500"></i> YouTube Video URL</span>
                                <span class="text-[10px] text-slate-400">Recommended</span>
                            </label>
                            <input type="url" name="video_url" placeholder="https://www.youtube.com/watch?v=... or shorts" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-red-500 focus:bg-white transition shadow-2xs">
                            <p class="text-[10px] text-slate-400">YouTube video automatically gets thumbnail preview.</p>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700 flex items-center gap-1">
                                <i class="fa-solid fa-file-video text-indigo-500"></i> OR Upload MP4 Video File
                            </label>
                            <div onclick="document.getElementById('storyVideoFileInput').click()" class="border-2 border-dashed border-indigo-200 hover:border-indigo-400 bg-indigo-50/20 hover:bg-indigo-50/40 rounded-2xl p-4 text-center cursor-pointer transition">
                                <input type="file" id="storyVideoFileInput" name="video_file" accept="video/mp4,video/webm,video/quicktime" class="hidden" onchange="previewStoryVideoFile(this)">
                                <p class="text-xs font-bold text-slate-700" id="storyVideoFileLabel">Click to Upload MP4 Video</p>
                                <p class="text-[10px] text-slate-400">Supports MP4 up to 50MB</p>
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700 flex items-center justify-between">
                                <span>Custom Thumbnail (Optional)</span>
                                <span class="text-[10px] text-slate-400">JPG, PNG, WEBP</span>
                            </label>
                            <input type="file" name="thumbnail" accept="image/*" onchange="previewStoryThumbnail(this)" class="w-full text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer">
                            <img id="storyThumbPreview" src="" alt="Thumbnail Preview" class="hidden max-h-20 rounded-lg object-cover mt-2 shadow-2xs">
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-black text-xs shadow-md shadow-red-200 transition flex items-center justify-center gap-2">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <span>Publish Video Success Story</span>
                            </button>
                        </div>
                    </div>

                </div>
            </form>

            <!-- Existing Video Stories List -->
            @if(isset($successVideos) && count($successVideos) > 0)
            <div class="pt-6 border-t border-slate-100 space-y-4">
                <h4 class="text-xs font-black uppercase tracking-wider text-slate-500 flex items-center gap-1.5">
                    <i class="fa-solid fa-list-check text-red-600"></i> Active 5-Sec Success Stories ({{ count($successVideos) }})
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($successVideos as $sv)
                        @php
                            $thumb = $sv->thumbnail_url ? (Str::startsWith($sv->thumbnail_url, 'http') ? $sv->thumbnail_url : asset(ltrim($sv->thumbnail_url, '/'))) : asset('assets/images/g1.webp');
                        @endphp
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-red-300 transition space-y-3">
                            <div class="relative rounded-xl overflow-hidden aspect-video bg-black shadow-xs">
                                <img src="{{ $thumb }}" alt="{{ $sv->student_name }}" class="w-full h-full object-cover">
                                <span class="absolute top-2 right-2 px-2 py-0.5 rounded-full text-[9px] font-bold bg-emerald-600 text-white shadow-xs">
                                    {{ $sv->earning_badge }}
                                </span>
                                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                    <div class="w-8 h-8 rounded-full bg-red-600 text-white flex items-center justify-center text-xs shadow-md">
                                        <i class="fa-solid fa-play ml-0.5"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-1">
                                <div class="flex items-center justify-between">
                                    <h5 class="text-xs font-black text-slate-900 truncate">{{ $sv->student_name }}</h5>
                                    <span class="text-[10px] font-bold text-sky-600">{{ $sv->course }}</span>
                                </div>
                                <p class="text-[11px] font-semibold text-slate-700 line-clamp-1">{{ $sv->title }}</p>
                                <p class="text-[10px] text-slate-500 italic line-clamp-2">"{{ $sv->story_description }}"</p>
                            </div>

                            <div class="pt-2 border-t border-slate-200/60 flex items-center justify-between">
                                <a href="{{ $sv->video_url }}" target="_blank" rel="noopener" class="text-[11px] font-bold text-blue-600 hover:underline flex items-center gap-1">
                                    <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i> View Video
                                </a>

                                <form action="{{ route('admin.story_videos.delete', $sv->id) }}" method="POST" onsubmit="return confirm('Delete this success story video?')" class="shrink-0">
                                    @csrf
                                    <button type="submit" class="w-7 h-7 rounded-lg bg-white hover:bg-red-50 text-slate-400 hover:text-red-600 border border-slate-200 transition flex items-center justify-center" title="Delete Story">
                                        <i class="fa-solid fa-trash-can text-[10px]"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </section>
    </div>

    <!-- ================= SUB-PANE 3: PLACED STUDENTS (TOP LIVE TICKER) ================= -->
    <div id="admin-gal-pane-students" class="hidden space-y-6">
        <!-- Guidance Banner -->
        <div class="bg-gradient-to-r from-sky-500/10 via-blue-500/5 to-transparent border-l-4 border-sky-500 p-4 rounded-r-2xl">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-xl bg-sky-500 text-white flex items-center justify-center shrink-0 text-sm shadow-sm">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div>
                    <h4 class="text-xs font-black text-slate-900 uppercase tracking-wider">Public Gallery: Top Continuous Right-to-Left Ticker</h4>
                    <p class="text-xs text-slate-600 mt-0.5 leading-relaxed">
                        Yahan add kiye gaye students Public Gallery page ke <strong>SABSE TOP PE infinite Right-to-Left scrolling marquee ticker</strong> me chalte hain! Student photo, name, course aur unka job placement ya khud ka repair care center display hota hai.
                    </p>
                </div>
            </div>
        </div>

        <!-- Add Student Form -->
        <section class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4 flex-wrap gap-3">
                <div>
                    <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-user-plus text-sky-600"></i> Add Placed / Success Student to Ticker
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Showcase real students placed in companies or running their own electronics labs.</p>
                </div>
                <span class="px-3 py-1.5 rounded-xl bg-sky-50 text-sky-700 font-black text-xs border border-sky-200">
                    {{ count($successfulStudents ?? []) }} Students in Ticker
                </span>
            </div>

            <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    
                    <!-- Left (7 Cols): Student Info -->
                    <div class="lg:col-span-7 space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Student Full Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" required placeholder="e.g. Amit Kumar" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-50 transition shadow-2xs">
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Course Studied <span class="text-red-500">*</span></label>
                                <input type="text" name="course" required placeholder="e.g. Advanced Laptop Chip Level" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-50 transition shadow-2xs">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Achievement / Shop / Job Placement <span class="text-red-500">*</span></label>
                                <input type="text" name="achievement" required placeholder="e.g. Opened Care Center / Earns ₹50,000/mo" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-50 transition shadow-2xs">
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Batch / Status Tag</label>
                                <input type="text" name="batch_year" placeholder="e.g. Certified Expert / Batch 2024" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-50 transition shadow-2xs">
                            </div>
                        </div>
                    </div>

                    <!-- Right (5 Cols): Photo Upload -->
                    <div class="lg:col-span-5 space-y-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700 flex items-center justify-between">
                                <span class="flex items-center gap-1"><i class="fa-solid fa-image text-sky-500"></i> Student Passport Photo <span class="text-red-500">*</span></span>
                                <span class="text-[10px] text-slate-400">JPG, PNG, WEBP</span>
                            </label>
                            <div onclick="document.getElementById('studentPhotoFileInput').click()" class="border-2 border-dashed border-sky-200 hover:border-sky-400 bg-sky-50/20 hover:bg-sky-50/40 rounded-2xl p-4 text-center cursor-pointer transition min-h-[110px] flex flex-col justify-center items-center">
                                <input type="file" id="studentPhotoFileInput" name="photo" accept="image/*" required class="hidden" onchange="previewStudentPhoto(this)">
                                <p class="text-xs font-bold text-slate-700" id="studentPhotoLabel">Click to Choose Student Photo</p>
                                <p class="text-[10px] text-slate-400">Square or portrait photo recommended</p>
                                <img id="studentPhotoPreview" src="" alt="Student Preview" class="hidden w-20 h-20 mt-2 rounded-xl object-cover shadow-sm border-2 border-sky-400">
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-sky-600 to-blue-600 hover:from-sky-700 hover:to-blue-700 text-white font-black text-xs shadow-md shadow-sky-200 transition flex items-center justify-center gap-2">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <span>Add Student to Top Live Ticker</span>
                            </button>
                        </div>
                    </div>

                </div>
            </form>

            <!-- Existing Ticker Students List -->
            @if(isset($successfulStudents) && count($successfulStudents) > 0)
            <div class="pt-6 border-t border-slate-100 space-y-4">
                <h4 class="text-xs font-black uppercase tracking-wider text-slate-500 flex items-center gap-1.5">
                    <i class="fa-solid fa-list-check text-sky-600"></i> Active Students in Top Marquee ({{ count($successfulStudents) }})
                </h4>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($successfulStudents as $st)
                        @php
                            $pSrc = Str::startsWith($st->photo, 'http') ? $st->photo : asset(ltrim($st->photo, '/'));
                        @endphp
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-sky-300 transition flex items-center gap-3 justify-between">
                            <div class="relative w-12 h-12 rounded-xl overflow-hidden shrink-0 border border-amber-300 shadow-2xs">
                                <img src="{{ $pSrc }}" alt="{{ $st->name }}" class="w-full h-full object-cover">
                            </div>

                            <div class="flex-1 min-w-0 space-y-0.5">
                                <h5 class="text-xs font-black text-slate-900 truncate">{{ $st->name }}</h5>
                                <p class="text-[10px] font-bold text-sky-600 truncate">{{ $st->course }}</p>
                                <p class="text-[10px] font-extrabold text-emerald-600 truncate">{{ $st->achievement }}</p>
                            </div>

                            <form action="{{ route('admin.students.delete', $st->id) }}" method="POST" onsubmit="return confirm('Remove student from ticker?')" class="shrink-0">
                                @csrf
                                <button type="submit" class="w-7 h-7 rounded-lg bg-white hover:bg-red-50 text-slate-400 hover:text-red-600 border border-slate-200 transition flex items-center justify-center" title="Remove Student">
                                    <i class="fa-solid fa-trash-can text-[10px]"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </section>
    </div>

    <!-- ================= SUB-PANE 4: GENERAL MEDIA CATALOG (BOTTOM GRID) ================= -->
    <div id="admin-gal-pane-catalog" class="hidden space-y-6">
        <!-- Guidance Banner -->
        <div class="bg-gradient-to-r from-blue-500/10 via-indigo-500/5 to-transparent border-l-4 border-blue-500 p-4 rounded-r-2xl">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-xl bg-blue-500 text-white flex items-center justify-center shrink-0 text-sm shadow-sm">
                    <i class="fa-solid fa-photo-film"></i>
                </div>
                <div>
                    <h4 class="text-xs font-black text-slate-900 uppercase tracking-wider">Public Gallery: Bottom Media Grid</h4>
                    <p class="text-xs text-slate-600 mt-0.5 leading-relaxed">
                        Yahan se upload kiye gaye photos aur long practical videos Public Gallery ke <strong>NICHE WALE GRID</strong> me category filters (All / Photos / Videos) aur search bar ke sath display hote hain.
                    </p>
                </div>
            </div>
        </div>

        <!-- Advanced Upload Studio Card -->
        <section class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4 flex-wrap gap-3">
            <div>
                <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-up text-blue-600"></i> Upload New Media Asset
                </h3>
                <p class="text-xs text-slate-400 mt-0.5">Choose whether to upload a photo, video file, or embed a YouTube demonstration.</p>
            </div>

            <!-- Mode Selector Tabs -->
            <div class="inline-flex p-1 bg-slate-100 rounded-2xl border border-slate-200/80 text-xs font-bold" id="galleryUploadTypeTabs">
                <button type="button" onclick="setGalleryUploadType('image')" id="btn-mode-image" class="px-3.5 py-2 rounded-xl transition bg-white text-blue-700 shadow-xs flex items-center gap-1.5">
                    <i class="fa-solid fa-image"></i> Photo
                </button>
                <button type="button" onclick="setGalleryUploadType('video_file')" id="btn-mode-video-file" class="px-3.5 py-2 rounded-xl transition text-slate-600 hover:text-slate-900 flex items-center gap-1.5">
                    <i class="fa-solid fa-file-video"></i> Video File (MP4)
                </button>
                <button type="button" onclick="setGalleryUploadType('video_url')" id="btn-mode-video-url" class="px-3.5 py-2 rounded-xl transition text-slate-600 hover:text-slate-900 flex items-center gap-1.5">
                    <i class="fa-brands fa-youtube text-red-500"></i> YouTube / Video URL
                </button>
            </div>
        </div>

        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <input type="hidden" name="media_type" id="galleryMediaTypeInput" value="image">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <!-- Left Column: Metadata (Title, Category, Description) (7 Cols) -->
                <div class="lg:col-span-7 space-y-4">
                    <!-- Title / Caption -->
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700">Media Title / Topic Caption <span class="text-slate-400 font-normal">(Optional)</span></label>
                        <input type="text" name="title" placeholder="e.g. Inverter AC PCB Tracing Practical Demo" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-50 transition shadow-2xs">
                    </div>

                    <!-- Category Selector -->
                    <div class="space-y-1.5">
                        <div class="flex justify-between items-center">
                            <label class="block text-xs font-bold text-slate-700">Category Tag (किस कैटेगरी का है) <span class="text-red-500">*</span></label>
                            <span class="text-[10px] text-blue-600 font-bold bg-blue-50 px-2 py-0.5 rounded-md">Topic Filter</span>
                        </div>
                        <select name="category" id="galleryCategorySelect" onchange="checkCustomCategory(this.value, 'create')" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-50 transition shadow-2xs">
                            <option value="AC & HVAC PCB Repairing">❄️ AC & HVAC PCB Repairing</option>
                            <option value="Smartphone Hardware & Micro-soldering">📱 Smartphone Hardware & Micro-soldering</option>
                            <option value="Laptop Chip Level Repairing">💻 Laptop Chip Level Repairing</option>
                            <option value="Home Appliances (Fridge/Washing Machine)">⚡ Home Appliances (Fridge / Washing Machine)</option>
                            <option value="Student Lab Practicals" selected>🔬 Student Lab Practicals</option>
                            <option value="Events & Certificate Ceremonies">🏆 Events & Certificate Ceremonies</option>
                            <option value="Campus & Workshop Infrastructure">🏫 Campus & Workshop Infrastructure</option>
                            <option value="__custom__">➕ Other Custom Category...</option>
                        </select>
                        <input type="text" id="createCustomCategoryInput" name="custom_category_text" placeholder="Type custom category name..." class="hidden mt-2 w-full bg-white border border-blue-300 rounded-xl px-4 py-2 text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <!-- Description -->
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700">Practical Description (डिटेल्स / डिस्क्रिप्शन)</label>
                        <textarea name="description" rows="3" placeholder="Explain what workbench skills, diagnosis methods, or practical equipment are demonstrated in this session..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-50 transition shadow-2xs"></textarea>
                    </div>
                </div>

                <!-- Right Column: Media Upload Area (5 Cols) -->
                <div class="lg:col-span-5 space-y-4">
                    <!-- MODE 1: PHOTO UPLOAD -->
                    <div id="box-upload-image" class="space-y-3">
                        <label class="block text-xs font-bold text-slate-700">Photo File (JPG, PNG, WEBP)</label>
                        <div onclick="document.getElementById('galleryImageFileInput').click()" class="border-2 border-dashed border-blue-200 hover:border-blue-500 bg-blue-50/20 hover:bg-blue-50/40 rounded-2xl p-6 text-center cursor-pointer transition min-h-[170px] flex flex-col justify-center items-center group">
                            <input type="file" id="galleryImageFileInput" name="image" accept="image/*" class="hidden" onchange="previewGalleryImage(this, 'create')">
                            <div id="galleryImageEmpty" class="space-y-2">
                                <div class="w-12 h-12 mx-auto rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl group-hover:scale-110 transition shadow-xs">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </div>
                                <p class="text-xs font-bold text-slate-800">Click or Drag Photo</p>
                                <p class="text-[11px] text-slate-400">Supports JPG, PNG, WEBP (Max 10MB)</p>
                            </div>
                            <img id="galleryImagePreviewImg" src="" alt="Preview" class="hidden max-h-40 rounded-xl object-cover shadow-sm">
                        </div>
                    </div>

                    <!-- MODE 2: VIDEO FILE UPLOAD -->
                    <div id="box-upload-video-file" class="hidden space-y-3">
                        <label class="block text-xs font-bold text-slate-700">Video File (MP4, WEBM, MOV)</label>
                        <div onclick="document.getElementById('galleryVideoFileInput').click()" class="border-2 border-dashed border-indigo-200 hover:border-indigo-500 bg-indigo-50/20 hover:bg-indigo-50/40 rounded-2xl p-6 text-center cursor-pointer transition min-h-[140px] flex flex-col justify-center items-center group">
                            <input type="file" id="galleryVideoFileInput" name="video_file" accept="video/mp4,video/webm,video/ogg,video/quicktime" class="hidden" onchange="previewGalleryVideoFile(this)">
                            <div class="space-y-2">
                                <div class="w-12 h-12 mx-auto rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-xl group-hover:scale-110 transition shadow-xs">
                                    <i class="fa-solid fa-video"></i>
                                </div>
                                <p class="text-xs font-bold text-slate-800" id="galleryVideoFileLabel">Click to Choose Video File</p>
                                <p class="text-[11px] text-slate-400">Supports MP4, WEBM up to 50MB</p>
                            </div>
                        </div>

                        <!-- Optional Thumbnail for Video File -->
                        <div class="space-y-1">
                            <label class="block text-[11px] font-bold text-slate-600">Custom Video Poster / Thumbnail (Optional)</label>
                            <input type="file" name="thumbnail" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer">
                        </div>
                    </div>

                    <!-- MODE 3: YOUTUBE / VIDEO URL -->
                    <div id="box-upload-video-url" class="hidden space-y-3">
                        <label class="block text-xs font-bold text-slate-700">YouTube or Video Link URL</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-red-500 text-sm">
                                <i class="fa-brands fa-youtube"></i>
                            </span>
                            <input type="url" id="galleryVideoUrlInput" name="video_url" oninput="previewYoutubeUrl(this.value)" placeholder="https://www.youtube.com/watch?v=... or shorts" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-red-500 focus:bg-white focus:ring-4 focus:ring-red-50 transition shadow-2xs">
                        </div>
                        <div id="youtubePreviewContainer" class="hidden rounded-xl overflow-hidden border border-slate-200 relative bg-slate-900 aspect-video flex items-center justify-center shadow-xs">
                            <img id="youtubeThumbImg" src="" alt="YouTube Thumbnail" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-slate-950/30 flex items-center justify-center">
                                <div class="w-10 h-10 rounded-full bg-red-600 text-white flex items-center justify-center text-sm shadow-lg">
                                    <i class="fa-solid fa-play ml-0.5"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-[11px] text-slate-400">Paste any YouTube watch or shorts URL. Thumbnail will be auto-generated automatically!</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-extrabold text-xs shadow-md shadow-blue-200 hover:shadow-lg transition duration-200 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <span id="gallerySubmitBtnText">Upload Media to Gallery</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <!-- Gallery Media Explorer & Live Filters -->
    <section class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4 flex-wrap gap-4">
            <div>
                <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-grip text-blue-600"></i> Published Media Catalog (<span id="visibleGalleryCount">{{ count($galleries) }}</span>)
                </h3>
                <p class="text-xs text-slate-400 mt-0.5">Filter by media type or topic, or search through training gallery cards.</p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex items-center gap-2 flex-wrap">
                <!-- Type Filter Pills -->
                <div class="inline-flex p-1 bg-slate-100 rounded-xl border border-slate-200 text-xs font-bold" id="adminMediaFilterPills">
                    <button type="button" onclick="filterAdminGalleryType('all', this)" class="gal-type-filter active px-3 py-1.5 rounded-lg bg-white text-blue-700 shadow-2xs transition">All ({{ count($galleries) }})</button>
                    <button type="button" onclick="filterAdminGalleryType('image', this)" class="gal-type-filter px-3 py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition">📸 Photos ({{ $galleries->where('media_type', 'image')->count() }})</button>
                    <button type="button" onclick="filterAdminGalleryType('video', this)" class="gal-type-filter px-3 py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition">🎥 Videos ({{ $galleries->where('media_type', 'video')->count() }})</button>
                </div>

                <!-- Category Filter Dropdown -->
                <select id="adminGalleryCategoryFilter" onchange="filterAdminGalleryCatalog()" class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-semibold text-slate-700 focus:outline-none focus:border-blue-600 shadow-2xs">
                    <option value="all">All Categories</option>
                    @foreach($galleries->pluck('category')->filter()->unique() as $cat)
                        <option value="{{ strtolower($cat) }}">{{ $cat }}</option>
                    @endforeach
                </select>

                <!-- Search Input -->
                <div class="relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                    <input type="text" id="adminGallerySearchInput" onkeyup="filterAdminGalleryCatalog()" placeholder="Search title or tag..." class="bg-slate-50 border border-slate-200 rounded-xl pl-8 pr-3 py-2 text-xs font-medium text-slate-700 focus:outline-none focus:border-blue-600 w-44 sm:w-56 shadow-2xs">
                </div>
            </div>
        </div>

        <!-- Gallery Grid Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 pt-2" id="adminGalleryGrid">
            @forelse($galleries as $gallery)
                @php
                    $isVid = $gallery->media_type === 'video';
                    $displayImg = $gallery->thumbnail_url ?: $gallery->image_url;
                    $displayImgSrc = $displayImg ? (Str::startsWith($displayImg, 'http') ? $displayImg : asset($displayImg)) : asset('assets/images/g1.webp');
                    $galleryDataJson = base64_encode(json_encode([
                        'id' => $gallery->id,
                        'title' => $gallery->title ?? '',
                        'category' => $gallery->category ?? 'General',
                        'description' => $gallery->description ?? '',
                        'media_type' => $gallery->media_type ?? 'image',
                        'image_url' => $gallery->image_url ? (Str::startsWith($gallery->image_url, 'http') ? $gallery->image_url : asset($gallery->image_url)) : '',
                        'video_url' => $gallery->video_url ? (Str::startsWith($gallery->video_url, 'http') ? $gallery->video_url : asset($gallery->video_url)) : '',
                        'thumbnail_url' => $gallery->thumbnail_url ? (Str::startsWith($gallery->thumbnail_url, 'http') ? $gallery->thumbnail_url : asset($gallery->thumbnail_url)) : '',
                        'embed_url' => $gallery->embed_url ?? '',
                        'created_at_formatted' => $gallery->created_at ? $gallery->created_at->format('M d, Y') : ''
                    ]));
                @endphp
                <div class="gallery-card-item group relative bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between"
                     data-type="{{ $gallery->media_type ?: 'image' }}"
                     data-category="{{ strtolower($gallery->category ?? 'general') }}"
                     data-search="{{ strtolower(($gallery->title ?? '') . ' ' . ($gallery->description ?? '') . ' ' . ($gallery->category ?? '')) }}">
                    
                    <!-- Media Top View -->
                    <div>
                        <div class="relative overflow-hidden bg-slate-900 aspect-[16/10] cursor-pointer" data-gallery="{{ $galleryDataJson }}" onclick="handleGalleryPreview(this)">
                            <img src="{{ $displayImgSrc }}" alt="{{ $gallery->title ?: 'Gallery Media' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            
                            <!-- Category Badge (Top Left) -->
                            <div class="absolute top-2.5 left-2.5 z-10">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-slate-950/80 backdrop-blur-xs text-white shadow-sm border border-white/10">
                                    {{ $gallery->category ?: 'General' }}
                                </span>
                            </div>

                            <!-- Media Type Badge (Top Right) -->
                            <div class="absolute top-2.5 right-2.5 z-10">
                                @if($isVid)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-indigo-600 text-white shadow-md flex items-center gap-1">
                                        <i class="fa-solid fa-play text-[8px]"></i> Video
                                    </span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-slate-900/80 text-white shadow-sm flex items-center gap-1">
                                        <i class="fa-regular fa-image text-[8px]"></i> Photo
                                    </span>
                                @endif
                            </div>

                            <!-- Video Play Overlay Icon -->
                            @if($isVid)
                                <div class="absolute inset-0 bg-slate-950/30 flex items-center justify-center group-hover:bg-slate-950/10 transition">
                                    <div class="w-11 h-11 rounded-full bg-white/90 text-indigo-600 flex items-center justify-center text-sm shadow-xl group-hover:scale-110 group-hover:bg-indigo-600 group-hover:text-white transition duration-200">
                                        <i class="fa-solid fa-play ml-0.5"></i>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Card Body (Title & Description) -->
                        <div class="p-4 space-y-1.5">
                            <h4 class="font-bold text-slate-900 text-sm leading-snug line-clamp-1 group-hover:text-blue-600 transition" title="{{ $gallery->title ?: 'SMTTC Practical' }}">
                                {{ $gallery->title ?: 'SMTTC Practical Demonstration' }}
                            </h4>
                            <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed" title="{{ $gallery->description ?: 'No details provided.' }}">
                                {{ $gallery->description ?: 'Workbench practical training session at SMTTC Patna.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Card Footer Actions -->
                    <div class="p-3 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                        <span class="text-[11px] font-medium">{{ $gallery->created_at->format('M d, Y') }}</span>
                        
                        <div class="flex items-center gap-1.5">
                            <!-- Preview/Play -->
                            <button type="button" data-gallery="{{ $galleryDataJson }}" onclick="handleGalleryPreview(this)" class="w-7 h-7 rounded-lg bg-white hover:bg-blue-50 text-slate-600 hover:text-blue-600 border border-slate-200 transition flex items-center justify-center" title="Preview / Play">
                                <i class="fa-solid {{ $isVid ? 'fa-play' : 'fa-expand' }} text-[10px]"></i>
                            </button>
                            <!-- Edit -->
                            <button type="button" data-gallery="{{ $galleryDataJson }}" onclick="handleGalleryEdit(this)" class="w-7 h-7 rounded-lg bg-white hover:bg-indigo-50 text-slate-600 hover:text-indigo-600 border border-slate-200 transition flex items-center justify-center" title="Edit Info">
                                <i class="fa-solid fa-pen text-[10px]"></i>
                            </button>
                            <!-- Delete -->
                            <form action="{{ route('admin.galleries.delete', $gallery->id) }}" method="POST" onsubmit="return confirm('Delete this gallery item?')" class="inline">
                                @csrf
                                <button type="submit" class="w-7 h-7 rounded-lg bg-white hover:bg-red-50 text-slate-400 hover:text-red-600 border border-slate-200 transition flex items-center justify-center" title="Delete">
                                    <i class="fa-solid fa-trash-can text-[10px]"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center bg-slate-50/60 rounded-3xl border border-dashed border-slate-200 space-y-3">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center text-2xl shadow-inner">
                        <i class="fa-solid fa-photo-film"></i>
                    </div>
                    <h4 class="text-sm font-bold text-slate-700">No Gallery Media Uploaded Yet</h4>
                    <p class="text-xs text-slate-400 max-w-sm mx-auto">Upload training photos or add YouTube practical videos above to showcase student workbench work.</p>
                </div>
            @endforelse
        </div>
    </section>
    </div>
</div>

<!-- ================= TAB 6: CERTIFICATES MANAGEMENT ================= -->
<div id="tab-certificates" class="hidden space-y-8 animate-fade-in">
    <!-- Signature Settings -->
    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 md:p-8">
        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2"><i class="fa-solid fa-pen-nib text-indigo-500"></i> Signature Settings</h3>
        <form action="{{ route('admin.certificates.signatures') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Training Incharge Signature</label>
                <input type="file" name="incharge_sig" accept="image/*" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                @if(\App\Models\Setting::where('key', 'cert_incharge_signature')->value('value'))
                    <img src="{{ asset(\App\Models\Setting::where('key', 'cert_incharge_signature')->value('value')) }}" class="h-10 mt-2 object-contain bg-white border border-slate-200 rounded p-1">
                @endif
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Authorised Signatory</label>
                <input type="file" name="auth_sig" accept="image/*" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                @if(\App\Models\Setting::where('key', 'cert_signature')->value('value'))
                    <img src="{{ asset(\App\Models\Setting::where('key', 'cert_signature')->value('value')) }}" class="h-10 mt-2 object-contain bg-white border border-slate-200 rounded p-1">
                @endif
            </div>
            <div class="md:col-span-2">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-md transition">Update Signatures</button>
            </div>
        </form>
    </section>

    <!-- Generate Form -->
    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 md:p-8">
        <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2"><i class="fa-solid fa-file-circle-plus text-yellow-500"></i> Generate New Certificate</h3>
        <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Registration No. *</label>
                <input type="text" name="regd_no" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-500 transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Serial No. *</label>
                <input type="text" name="sl_no" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-500 transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Student Name *</label>
                <input type="text" name="name" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-500 transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Father's Name *</label>
                <input type="text" name="father_name" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-500 transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Date of Birth</label>
                <input type="date" name="dob" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-500 transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Course Completed *</label>
                <select name="course" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-500 transition font-bold text-slate-800">
                    <option value="">-- Select Completed Course --</option>
                    <option value="Smartphone & iPhone Chip-Level Repairing">Smartphone & iPhone Chip-Level Repairing</option>
                    <option value="Laptop Motherboard & MacBook Repairing">Laptop Motherboard & MacBook Repairing</option>
                    <option value="AC Repairing & Inverter PCB Course">AC Repairing & Inverter PCB Course</option>
                    <option value="Washing Machine Repairing (Semi & Fully Auto)">Washing Machine Repairing (Semi & Fully Auto)</option>
                    <option value="Refrigerator & Inverter Fridge Repairing">Refrigerator & Inverter Fridge Repairing</option>
                    <option value="LED TV & Smart Android TV Repairing">LED TV & Smart Android TV Repairing</option>
                    <option value="Mobile Phone Repairing">Mobile Phone Repairing</option>
                    <option value="Laptop Repairing">Laptop Repairing</option>
                    <option value="AC Repairing">AC Repairing</option>
                    <option value="Fridge Repairing">Fridge Repairing</option>
                    <option value="Washing Machine Repairing">Washing Machine Repairing</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">From Date</label>
                <input type="date" name="from_date" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-500 transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">To Date</label>
                <input type="date" name="to_date" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-500 transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Student Photo (Passport Size)</label>
                <input type="file" name="photo" accept="image/*" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-indigo-500 transition file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-800 hover:file:bg-amber-200">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Training Center *</label>
                <input type="text" name="center" value="SMTTC Institute" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-500 transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Location *</label>
                <input type="text" name="location" value="Patna" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-500 transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Date of Issue</label>
                <input type="date" name="issued_date" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-500 transition">
            </div>
            <div class="md:col-span-3 flex justify-end mt-4">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-xl font-bold text-sm shadow-md transition">Generate Certificate</button>
            </div>
        </form>
    </section>

    <!-- List -->
    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-6 md:p-8 border-b border-slate-100 flex items-center justify-between">
            <h2 class="text-xl font-extrabold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-list text-slate-400"></i> Issued Certificates
            </h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 border-b border-slate-200/80 text-xs font-bold text-slate-500 uppercase tracking-wider">
                    <tr>
                        <th class="p-4">Regd No.</th>
                        <th class="p-4">Student Name</th>
                        <th class="p-4">Course</th>
                        <th class="p-4">Issue Date</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($certificates ?? [] as $cert)
                        <tr class="hover:bg-slate-50/80 transition duration-150">
                            <td class="p-4 font-bold text-indigo-600">{{ $cert->regd_no }}</td>
                            <td class="p-4 font-bold text-slate-900">{{ $cert->name }}</td>
                            <td class="p-4 text-slate-600">{{ $cert->course }}</td>
                            <td class="p-4 text-slate-600">{{ $cert->issued_date ? $cert->issued_date->format('M d, Y') : '-' }}</td>
                            <td class="p-4 text-right flex justify-end gap-2">
                                <a href="{{ route('certificate.view', $cert->regd_no) }}" target="_blank" class="px-3.5 py-1.5 rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50 font-bold text-xs transition flex items-center gap-1.5" title="View/Print Certificate">
                                    <i class="fa-solid fa-eye"></i> View/Print
                                </a>
                                <a href="{{ route('idcard.view', $cert->regd_no) }}" target="_blank" class="px-3.5 py-1.5 rounded-lg border border-purple-200 text-purple-700 bg-purple-50/60 hover:bg-purple-100 font-bold text-xs transition flex items-center gap-1.5" title="Print Student Identity Card">
                                    <i class="fa-solid fa-id-card"></i> ID Card
                                </a>
                                @php
                                    $certJson = base64_encode(json_encode([
                                        'id' => $cert->id,
                                        'regd_no' => $cert->regd_no,
                                        'sl_no' => $cert->sl_no,
                                        'name' => $cert->name,
                                        'father_name' => $cert->father_name,
                                        'dob' => $cert->dob ? $cert->dob->format('Y-m-d') : '',
                                        'course' => $cert->course,
                                        'from_date' => $cert->from_date ? $cert->from_date->format('Y-m-d') : '',
                                        'to_date' => $cert->to_date ? $cert->to_date->format('Y-m-d') : '',
                                        'center' => $cert->center,
                                        'location' => $cert->location,
                                        'issued_date' => $cert->issued_date ? $cert->issued_date->format('Y-m-d') : '',
                                    ]));
                                @endphp
                                <button type="button" data-cert="{{ $certJson }}" onclick="handleCertEdit(this)" class="px-3.5 py-1.5 rounded-lg border border-amber-200 text-amber-700 hover:bg-amber-50 font-bold text-xs transition flex items-center gap-1.5" title="Change Certificate Dates & Details">
                                    <i class="fa-solid fa-calendar-days text-amber-500"></i> Edit Dates
                                </button>
                                <form action="{{ route('admin.certificates.delete', $cert->id) }}" method="POST" onsubmit="return confirm('Delete this certificate?')">
                                    @csrf
                                    <button type="submit" class="px-3.5 py-1.5 rounded-lg border border-red-200 text-red-600 hover:bg-red-50 font-bold text-xs transition flex items-center gap-1.5" title="Delete Certificate">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-slate-400 text-sm font-medium">No certificates generated yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- ================= TAB 7: ADMISSIONS MANAGEMENT ================= -->
<div id="tab-admissions" class="hidden space-y-8 animate-fade-in">
    <!-- List -->
    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-6 md:p-8 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-user-graduate text-indigo-500"></i> Student Admissions
                </h2>
                <p class="text-xs text-slate-400 font-medium mt-1">View and manage all student admission applications.</p>
            </div>
            <span class="text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-full">{{ count($admissions ?? []) }} Applications</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 border-b border-slate-200/80 text-xs font-bold text-slate-500 uppercase tracking-wider">
                    <tr>
                        <th class="p-4">Enrollment No.</th>
                        <th class="p-4">Student Name</th>
                        <th class="p-4">Course</th>
                        <th class="p-4">Mobile No.</th>
                        <th class="p-4 text-center">Photo</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($admissions ?? [] as $admission)
                        <tr class="hover:bg-slate-50/80 transition duration-150">
                            <td class="p-4 font-bold text-indigo-600">{{ $admission->enrollment_no }}</td>
                            <td class="p-4 font-bold text-slate-900">{{ $admission->name }}</td>
                            <td class="p-4 text-slate-600">{{ $admission->course }}</td>
                            <td class="p-4 text-slate-600">{{ $admission->mobile_no }}</td>
                            <td class="p-4 text-center">
                                @if($admission->photo)
                                    @php
                                        $photoUrl = Str::startsWith($admission->photo, 'http') ? $admission->photo : (Str::startsWith($admission->photo, '/') ? $admission->photo : asset($admission->photo));
                                    @endphp
                                    <a href="{{ $photoUrl }}" target="_blank">
                                        <img src="{{ $photoUrl }}" class="w-10 h-10 rounded-full object-cover border border-slate-200 inline-block" onerror="this.onerror=null; this.src='/assets/images/placeholder-user.jpg';">
                                    </a>
                                @else
                                    <img src="{{ asset('assets/images/placeholder-user.jpg') }}" class="w-10 h-10 rounded-full object-cover border border-slate-200 inline-block">
                                @endif
                            </td>
                            <td class="p-4 text-right flex justify-end gap-2">
                                @php
                                    $hasCertificate = \App\Models\Certificate::where('regd_no', $admission->enrollment_no)->exists();
                                @endphp
                                <button type="button" onclick="document.getElementById('profile-modal-{{ $admission->id }}').classList.remove('hidden')" class="px-3.5 py-1.5 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold text-xs transition flex items-center gap-1.5" title="View Full Profile">
                                    <i class="fa-solid fa-user"></i> <span class="hidden xl:inline">View Profile</span>
                                </button>

                                <a href="{{ route('idcard.view', $admission->enrollment_no) }}" target="_blank" class="px-3.5 py-1.5 rounded-lg border border-purple-200 text-purple-700 bg-purple-50/60 hover:bg-purple-100 font-bold text-xs transition flex items-center gap-1.5" title="Print Student Identity Card">
                                    <i class="fa-solid fa-id-card"></i> <span class="hidden xl:inline">ID Card</span>
                                </a>
                                
                                @if($hasCertificate)
                                    @php
                                        $admCert = \App\Models\Certificate::where('regd_no', $admission->enrollment_no)->first();
                                        $admCertJson = $admCert ? base64_encode(json_encode([
                                            'id' => $admCert->id,
                                            'regd_no' => $admCert->regd_no,
                                            'sl_no' => $admCert->sl_no,
                                            'name' => $admCert->name,
                                            'father_name' => $admCert->father_name,
                                            'dob' => $admCert->dob ? $admCert->dob->format('Y-m-d') : '',
                                            'course' => $admCert->course,
                                            'from_date' => $admCert->from_date ? $admCert->from_date->format('Y-m-d') : '',
                                            'to_date' => $admCert->to_date ? $admCert->to_date->format('Y-m-d') : '',
                                            'center' => $admCert->center,
                                            'location' => $admCert->location,
                                            'issued_date' => $admCert->issued_date ? $admCert->issued_date->format('Y-m-d') : '',
                                        ])) : '';
                                    @endphp
                                    <a href="{{ route('certificate.view', $admission->enrollment_no) }}" target="_blank" class="px-3.5 py-1.5 rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50 font-bold text-xs transition flex items-center gap-1.5" title="View Certificate">
                                        <i class="fa-solid fa-eye"></i> <span class="hidden xl:inline">View Cert</span>
                                    </a>
                                    @if($admCert)
                                        <button type="button" data-cert="{{ $admCertJson }}" onclick="handleCertEdit(this)" class="px-3.5 py-1.5 rounded-lg border border-amber-200 text-amber-700 hover:bg-amber-50 font-bold text-xs transition flex items-center gap-1.5" title="Change Certificate Dates & Details">
                                            <i class="fa-solid fa-calendar-days text-amber-500"></i> <span class="hidden xl:inline">Edit Dates</span>
                                        </button>
                                    @endif
                                @else
                                    <form action="{{ route('admin.admissions.approve', $admission->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Approve admission and generate certificate?')" class="px-3.5 py-1.5 rounded-lg bg-green-500 hover:bg-green-600 text-white font-bold text-xs shadow-md transition flex items-center gap-1.5" title="Approve & Generate Certificate">
                                            <i class="fa-solid fa-check"></i> <span class="hidden xl:inline">Approve & Gen Cert</span>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-10 text-slate-400 text-sm font-medium">No admission applications received yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>


@endsection

@section('modals')
<!-- Student Profile Modals -->
@foreach($admissions ?? [] as $admission)
<div id="profile-modal-{{ $admission->id }}" class="fixed inset-0 z-[99] hidden flex items-center justify-center p-4">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" onclick="this.parentElement.classList.add('hidden')"></div>
    <!-- Modal -->
    <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl p-6 md:p-8 animate-fade-in max-h-[90vh] overflow-y-auto z-10">
        <button onclick="this.closest('.fixed').classList.add('hidden')" class="absolute top-6 right-6 text-slate-400 hover:text-red-500 transition-colors">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>

        <h3 class="text-xl font-extrabold text-slate-900 mb-6 flex items-center gap-2">
            <i class="fa-solid fa-address-card text-indigo-500"></i> Student Profile
        </h3>

        <div class="flex flex-col md:flex-row gap-8">
            <div class="w-32 h-32 shrink-0 rounded-2xl overflow-hidden border border-slate-200 shadow-sm mx-auto md:mx-0">
                @php
                    $photoUrl = $admission->photo ? (Str::startsWith($admission->photo, 'http') ? $admission->photo : (Str::startsWith($admission->photo, '/') ? $admission->photo : asset($admission->photo))) : asset('assets/images/placeholder-user.jpg');
                @endphp
                <img src="{{ $photoUrl }}" class="w-full h-full object-cover" alt="Student Photo" onerror="this.onerror=null; this.src='/assets/images/placeholder-user.jpg';">
            </div>
            <div class="flex-1 space-y-4">
                <div>
                    <h4 class="text-2xl font-bold text-slate-900">{{ $admission->name }}</h4>
                    <p class="text-xs font-semibold text-indigo-600 uppercase tracking-wider mt-1">{{ $admission->course }}</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-slate-100">
                    <div>
                        <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Enrollment No.</span>
                        <span class="text-sm font-semibold text-slate-800">{{ $admission->enrollment_no }}</span>
                    </div>
                    <div>
                        <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">DOB</span>
                        <span class="text-sm font-semibold text-slate-800">{{ $admission->dob }}</span>
                    </div>
                    <div>
                        <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Father's Name</span>
                        <span class="text-sm font-semibold text-slate-800">{{ $admission->father_name }}</span>
                    </div>
                    <div>
                        <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Mother's Name</span>
                        <span class="text-sm font-semibold text-slate-800">{{ $admission->mother_name }}</span>
                    </div>
                    <div>
                        <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Mobile</span>
                        <span class="text-sm font-semibold text-slate-800">{{ $admission->mobile_no }}</span>
                    </div>
                    <div>
                        <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Email</span>
                        <span class="text-sm font-semibold text-slate-800">{{ $admission->email }}</span>
                    </div>
                    <div class="sm:col-span-2">
                        <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Full Address</span>
                        <span class="text-sm font-semibold text-slate-800">{{ $admission->address }}, {{ $admission->district }}, {{ $admission->state }}</span>
                    </div>
                    <div class="sm:col-span-2">
                        <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Training Center</span>
                        <span class="text-sm font-semibold text-slate-800">{{ $admission->center }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- EDIT CERTIFICATE & MANUAL DATES MODAL -->
<div id="editCertModal" class="fixed inset-0 z-[105] hidden flex items-center justify-center p-4">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-xs" onclick="closeEditCertModal()"></div>
    
    <!-- Modal Dialog -->
    <div class="relative w-full max-w-3xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden animate-fade-in max-h-[92vh] overflow-y-auto z-10">
        <!-- Header -->
        <div class="bg-gradient-to-r from-amber-500 via-yellow-500 to-indigo-600 px-6 py-4 text-white flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center text-lg shadow-sm">
                    <i class="fa-solid fa-certificate"></i>
                </div>
                <div>
                    <h3 class="text-base sm:text-lg font-black leading-tight text-white">Edit Certificate & Manual Dates</h3>
                    <p class="text-xs text-yellow-100 font-medium">Update student certificate particulars, training period and issue date</p>
                </div>
            </div>
            <button type="button" onclick="closeEditCertModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center text-lg transition">&times;</button>
        </div>

        <form id="editCertForm" method="POST" action="" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-5">
            @csrf

            <!-- Identifiers (Regd & Serial) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Registration / Enrollment No. <span class="text-red-500">*</span></label>
                    <input type="text" name="regd_no" id="editCertRegdNo" required class="w-full bg-slate-100 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-mono font-bold text-indigo-700 focus:outline-none">
                </div>
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Certificate Serial No. <span class="text-red-500">*</span></label>
                    <input type="text" name="sl_no" id="editCertSlNo" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-mono font-bold text-slate-800 focus:outline-none focus:border-amber-500 focus:bg-white transition">
                </div>
            </div>

            <!-- Student Particulars -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Student Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="editCertName" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-bold text-slate-900 focus:outline-none focus:border-amber-500 focus:bg-white transition">
                </div>
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Father's Name <span class="text-red-500">*</span></label>
                    <input type="text" name="father_name" id="editCertFatherName" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 focus:outline-none focus:border-amber-500 focus:bg-white transition">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Date of Birth (DOB)</label>
                    <input type="date" name="dob" id="editCertDob" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 focus:outline-none focus:border-amber-500 focus:bg-white transition">
                </div>
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Course Completed <span class="text-red-500">*</span></label>
                    <select name="course" id="editCertCourse" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-bold text-slate-900 focus:outline-none focus:border-amber-500 focus:bg-white transition">
                        <option value="Smartphone & iPhone Chip-Level Repairing">Smartphone & iPhone Chip-Level Repairing</option>
                        <option value="Laptop Motherboard & MacBook Repairing">Laptop Motherboard & MacBook Repairing</option>
                        <option value="AC Repairing & Inverter PCB Course">AC Repairing & Inverter PCB Course</option>
                        <option value="Washing Machine Repairing (Semi & Fully Auto)">Washing Machine Repairing (Semi & Fully Auto)</option>
                        <option value="Refrigerator & Inverter Fridge Repairing">Refrigerator & Inverter Fridge Repairing</option>
                        <option value="LED TV & Smart Android TV Repairing">LED TV & Smart Android TV Repairing</option>
                        <option value="Mobile Phone Repairing">Mobile Phone Repairing</option>
                        <option value="Laptop Repairing">Laptop Repairing</option>
                        <option value="AC Repairing">AC Repairing</option>
                        <option value="Fridge Repairing">Fridge Repairing</option>
                        <option value="Washing Machine Repairing">Washing Machine Repairing</option>
                    </select>
                </div>
            </div>

            <!-- Student Photo Upload -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700">Student Photo (For ID Card & Records)</label>
                <input type="file" name="photo" accept="image/*" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-xs focus:outline-none focus:border-amber-500 transition file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-800 hover:file:bg-amber-200">
            </div>

            <!-- MANUAL DATES SECTION (HIGHLIGHTED BOX) -->
            <div class="bg-gradient-to-br from-amber-50/70 to-yellow-50/50 p-4 sm:p-5 rounded-2xl border border-amber-200/90 space-y-3">
                <div class="flex items-center justify-between border-b border-amber-200/70 pb-2">
                    <span class="text-xs font-black text-amber-900 uppercase tracking-wider flex items-center gap-1.5">
                        <i class="fa-solid fa-calendar-days text-amber-600"></i> Manual Training Period & Issue Date
                    </span>
                    <span class="text-[10px] font-bold text-amber-800 bg-amber-100 px-2 py-0.5 rounded-md border border-amber-300">
                        Appears on Certificate
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div class="space-y-1">
                        <label class="block text-[11px] font-bold text-slate-700">From Date (शुरुआत)</label>
                        <input type="date" name="from_date" id="editCertFromDate" class="w-full bg-white border border-amber-300 rounded-xl px-3 py-2 text-xs font-bold text-slate-900 focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-[11px] font-bold text-slate-700">To Date (समाप्ति)</label>
                        <input type="date" name="to_date" id="editCertToDate" class="w-full bg-white border border-amber-300 rounded-xl px-3 py-2 text-xs font-bold text-slate-900 focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-[11px] font-bold text-slate-700">Date of Issue (जारी दिनांक)</label>
                        <input type="date" name="issued_date" id="editCertIssuedDate" class="w-full bg-white border border-amber-300 rounded-xl px-3 py-2 text-xs font-bold text-slate-900 focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-100 transition">
                    </div>
                </div>
            </div>

            <!-- Training Center & Location -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Training Center <span class="text-red-500">*</span></label>
                    <input type="text" name="center" id="editCertCenter" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 focus:outline-none focus:border-amber-500 focus:bg-white transition">
                </div>
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700">Location <span class="text-red-500">*</span></label>
                    <input type="text" name="location" id="editCertLocation" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 focus:outline-none focus:border-amber-500 focus:bg-white transition">
                </div>
            </div>

            <!-- Modal Footer Actions -->
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-slate-100">
                <button type="button" onclick="closeEditCertModal()" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold text-xs transition">Cancel</button>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-600 hover:to-yellow-600 text-slate-950 font-black text-xs shadow-md transition flex items-center gap-1.5">
                    <i class="fa-solid fa-check"></i> Update Certificate
                </button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT BLOG MODAL (STUDIO MODE) -->
<div id="editBlogModal" class="fixed inset-0 z-[99] hidden flex items-center justify-center p-4">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-xs" onclick="closeEditBlogModal()"></div>
    
    <!-- Modal Content -->
    <div class="relative w-full max-w-6xl bg-white rounded-3xl shadow-2xl p-6 md:p-8 animate-fade-in max-h-[94vh] overflow-y-auto z-10 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <div>
                <h3 class="text-lg font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-pen-to-square text-indigo-600"></i> Edit Published Technical Article
                </h3>
                <p class="text-xs text-slate-400 mt-0.5">Full-page editorial view. Update content, adjust image dimensions, customize SEO or change cover photo.</p>
            </div>
            <button onclick="closeEditBlogModal()" class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-red-50 text-slate-400 hover:text-red-500 font-bold transition flex items-center justify-center text-lg">&times;</button>
        </div>

        <form id="editBlogForm" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- SECTION 1: FULL-WIDTH EDITORIAL CANVAS -->
            <div class="space-y-5 w-full">
                <!-- Title & Typography Studio (Edit) -->
                <div class="space-y-3 bg-white p-5 rounded-2xl border border-slate-200 shadow-xs">
                    <div class="flex justify-between items-center flex-wrap gap-2">
                        <div class="flex items-center gap-2">
                            <label class="block text-xs font-bold text-slate-800 flex items-center gap-1.5">
                                <i class="fa-solid fa-heading text-indigo-600"></i> Article Title <span class="text-red-500">*</span>
                            </label>
                            <span class="text-[10px] font-bold text-indigo-600 bg-indigo-50 border border-indigo-100 px-2 py-0.5 rounded-md">Live Typography</span>
                        </div>
                        <span id="edit-title-count" class="text-[10px] font-semibold text-slate-400">0 / 70 chars</span>
                    </div>

                    <!-- Live Styled Title Input -->
                    <div class="relative">
                        <input type="text" id="edit-blog-title" name="title" required class="w-full bg-slate-50/40 border-2 border-slate-200 focus:border-indigo-600 focus:bg-white rounded-xl px-4 py-3.5 text-xl font-black text-slate-900 focus:outline-none focus:ring-4 focus:ring-indigo-50 transition shadow-inner" style="transition: all 0.2s ease;">
                    </div>

                    <!-- Hidden Styling Form Inputs -->
                    <input type="hidden" id="edit-title-color" name="title_color" value="#0f172a">
                    <input type="hidden" id="edit-title-font" name="title_font" value="sans">
                    <input type="hidden" id="edit-title-size" name="title_size" value="large">
                    <input type="hidden" id="edit-title-weight" name="title_weight" value="900">
                    <input type="hidden" id="edit-title-transform" name="title_transform" value="none">

                    <!-- Title Styling Control Bar (Colour, Letters Style & Size) -->
                    <div class="flex items-center justify-between flex-wrap gap-3 pt-3 border-t border-slate-100 text-xs">
                        <!-- Colour Options -->
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="text-[11px] font-bold text-slate-600 flex items-center gap-1">
                                <i class="fa-solid fa-palette text-indigo-500"></i> Colour:
                            </span>
                            <div class="flex items-center gap-1.5" id="editTitleColorPresets">
                                <button type="button" onclick="setTitleStyle('edit', 'color', '#0f172a', this)" class="title-color-btn w-6 h-6 rounded-full bg-slate-900 ring-2 ring-indigo-500 ring-offset-1 transition hover:scale-110 shadow-2xs" title="Dark Slate (Default)"></button>
                                <button type="button" onclick="setTitleStyle('edit', 'color', '#4338ca', this)" class="title-color-btn w-6 h-6 rounded-full bg-indigo-700 transition hover:scale-110 shadow-2xs" title="Indigo Blue"></button>
                                <button type="button" onclick="setTitleStyle('edit', 'color', '#dc2626', this)" class="title-color-btn w-6 h-6 rounded-full bg-red-600 transition hover:scale-110 shadow-2xs" title="Crimson Red"></button>
                                <button type="button" onclick="setTitleStyle('edit', 'color', '#059669', this)" class="title-color-btn w-6 h-6 rounded-full bg-emerald-600 transition hover:scale-110 shadow-2xs" title="Emerald Green"></button>
                                <button type="button" onclick="setTitleStyle('edit', 'color', '#d97706', this)" class="title-color-btn w-6 h-6 rounded-full bg-amber-500 transition hover:scale-110 shadow-2xs" title="Amber Gold"></button>
                                <button type="button" onclick="setTitleStyle('edit', 'color', '#7c3aed', this)" class="title-color-btn w-6 h-6 rounded-full bg-purple-600 transition hover:scale-110 shadow-2xs" title="Royal Purple"></button>
                                <label class="relative cursor-pointer flex items-center" title="Custom Colour Picker">
                                    <input type="color" id="editCustomColorPicker" value="#0f172a" oninput="setTitleStyle('edit', 'color', this.value, this)" class="sr-only">
                                    <span class="w-6 h-6 rounded-full border border-slate-300 bg-gradient-to-tr from-rose-500 via-amber-400 to-indigo-500 flex items-center justify-center text-[9px] text-white font-bold shadow-2xs hover:scale-110 transition">
                                        <i class="fa-solid fa-eye-dropper"></i>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <!-- Letters Style / Font Family -->
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="text-[11px] font-bold text-slate-600 flex items-center gap-1">
                                <i class="fa-solid fa-font text-indigo-500"></i> Style:
                            </span>
                            <select id="editTitleFontSelect" onchange="setTitleStyle('edit', 'font', this.value)" class="bg-white border border-slate-200 rounded-lg px-2.5 py-1 text-xs font-semibold text-slate-700 focus:outline-none focus:border-indigo-600 shadow-2xs">
                                <option value="sans" selected>Modern Sans (Clean)</option>
                                <option value="outfit">Outfit (Trendy Heading)</option>
                                <option value="serif">Editorial Serif (Classic)</option>
                                <option value="mono">Technical Monospace</option>
                            </select>
                            <button type="button" id="editTitleTransformBtn" onclick="toggleTitleTransform('edit')" class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-700 hover:text-indigo-600 font-bold text-xs transition shadow-2xs" title="Toggle UPPERCASE / Normal">
                                <strong>TT</strong>
                            </button>
                            <button type="button" id="editTitleItalicBtn" onclick="toggleTitleItalic('edit')" class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-700 hover:text-indigo-600 italic font-bold text-xs transition shadow-2xs" title="Toggle Italic">
                                <em>I</em>
                            </button>
                        </div>

                        <!-- Letters Size -->
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="text-[11px] font-bold text-slate-600 flex items-center gap-1">
                                <i class="fa-solid fa-text-height text-indigo-500"></i> Size:
                            </span>
                            <div class="inline-flex rounded-lg border border-slate-200 bg-slate-50 p-0.5 shadow-2xs">
                                <button type="button" onclick="setTitleStyle('edit', 'size', 'medium', this)" class="title-size-btn px-2.5 py-0.5 rounded text-[11px] font-semibold text-slate-600 hover:text-indigo-600">Med</button>
                                <button type="button" onclick="setTitleStyle('edit', 'size', 'large', this)" class="title-size-btn px-2.5 py-0.5 rounded text-[11px] font-bold bg-white text-indigo-600 shadow-2xs">Large</button>
                                <button type="button" onclick="setTitleStyle('edit', 'size', 'xl', this)" class="title-size-btn px-2.5 py-0.5 rounded text-[11px] font-semibold text-slate-600 hover:text-indigo-600">XL</button>
                                <button type="button" onclick="setTitleStyle('edit', 'size', 'mega', this)" class="title-size-btn px-2.5 py-0.5 rounded text-[11px] font-semibold text-slate-600 hover:text-indigo-600">Mega</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slug & Author in 2 cols -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700">Custom URL / Slug</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-xs text-slate-400 font-medium">/blog/</span>
                            <input type="text" id="edit-blog-slug" name="slug" placeholder="e.g. ac-repairing-guide" class="w-full bg-white border border-slate-200 rounded-xl pl-16 pr-4 py-2.5 text-xs font-mono text-slate-700 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700">Author Name</label>
                        <input type="text" id="edit-blog-author" name="author_name" placeholder="e.g. Admin" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-700 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50">
                    </div>
                </div>

                <!-- Editor section with toolbar triggers (100% full width) -->
                <div class="space-y-2 pt-2 w-full">
                    <div class="flex items-center justify-between flex-wrap gap-2.5 bg-slate-50 px-5 py-3 rounded-t-2xl border border-slate-200 border-b-0 shadow-2xs">
                        <label class="text-xs font-bold text-slate-800 flex items-center gap-2">
                            <i class="fa-solid fa-paragraph text-indigo-600"></i> Article Content & Rich Media (Full Width)
                        </label>
                        
                        <div class="flex items-center gap-2 flex-wrap">
                            <span id="edit-editor-word-count" class="text-xs font-bold text-slate-600 bg-white px-3 py-1.5 rounded-lg border border-slate-200">
                                <i class="fa-regular fa-file-lines mr-1 text-slate-400"></i> 0 words
                            </span>
                            <span id="edit-editor-read-time" class="text-xs font-bold text-indigo-600 bg-indigo-50 px-3 py-1.5 rounded-lg border border-indigo-100">
                                <i class="fa-regular fa-clock mr-1"></i> ~1 min read
                            </span>
                            <button type="button" onclick="triggerDirectImageUpload('edit-blog-content-input')" class="px-3.5 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-bold shadow-xs transition flex items-center gap-1.5" title="Directly upload an image from your computer">
                                <i class="fa-solid fa-cloud-arrow-up"></i> <span>Upload Image</span>
                            </button>
                            <button type="button" onclick="openImageStudioModal('edit-blog-content-input')" class="px-3.5 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-xs font-bold shadow-xs transition flex items-center gap-1.5" title="Adjust Image Length, Width & Proportions">
                                <i class="fa-solid fa-arrows-up-down-left-right text-[10px]"></i> <span>Free-Size Image Studio</span>
                            </button>
                            <button type="button" onclick="insertTypingParagraphAtEnd('edit-blog-content-input')" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-xs font-bold border border-slate-200 shadow-xs transition flex items-center gap-1.5" title="Instantly create a new typing line at the bottom to write freely">
                                <i class="fa-solid fa-i-cursor text-indigo-600"></i> <span>Type at Bottom</span>
                            </button>
                            <!-- Select All Content Button -->
                            <button type="button" onclick="selectAllEditorContent('edit-blog-content-input')" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-xs font-bold border border-slate-200 shadow-xs transition flex items-center gap-1.5" title="Select all text and content in the editor">
                                <i class="fa-solid fa-object-group text-indigo-600"></i> <span>Select All</span>
                            </button>

                            <!-- Large Page View Canvas Toggle -->
                            <button type="button" onclick="toggleEditorCanvasSize('edit')" id="editEditorCanvasBtn" data-is-large="false" class="px-3 py-1.5 bg-slate-100 hover:bg-indigo-50 text-slate-700 hover:text-indigo-700 rounded-lg text-xs font-bold border border-slate-200 shadow-xs transition flex items-center gap-1.5" title="Expand Editor to Large Spacious Canvas (800px Height)">
                                <i class="fa-solid fa-expand text-indigo-600"></i> <span id="editEditorCanvasText">Large Page View</span>
                            </button>
                        </div>
                    </div>

                    <textarea name="content" id="edit-blog-content-input" class="w-full bg-white border border-slate-200 rounded-b-2xl text-sm min-h-[460px]"></textarea>
                    
                    <div class="flex items-center justify-between text-xs text-slate-400 pt-1 flex-wrap gap-2">
                        <span><i class="fa-solid fa-circle-info text-indigo-500 mr-1"></i> Click image to drag blue handles freely, or double-click for exact Length & Width.</span>
                        <span class="font-mono text-slate-400 text-[11px]">Images auto-uploaded to /public/uploads</span>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: COVER IMAGE STUDIO (MOVED DOWN) -->
            <div class="pt-6 border-t border-slate-200/80 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <div>
                        <h4 class="text-sm font-extrabold uppercase tracking-wider text-slate-900 flex items-center gap-2">
                            <i class="fa-solid fa-image text-indigo-600"></i> Primary Cover Image (Hero Banner)
                        </h4>
                        <p class="text-xs text-slate-400 mt-0.5">Keep existing cover image or upload a replacement.</p>
                    </div>
                    <span class="text-xs font-bold text-indigo-700 bg-indigo-50 border border-indigo-200 px-3 py-1 rounded-full">
                        Cover Image Studio
                    </span>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 bg-slate-50/70 p-6 rounded-2xl border border-slate-200 shadow-xs">
                    <!-- Dropzone (6 Cols) -->
                    <div class="lg:col-span-6 space-y-3">
                        <div id="editCoverDropzone" onclick="document.getElementById('editCoverInput').click()" class="relative border-2 border-dashed border-indigo-200 hover:border-indigo-500 rounded-2xl p-6 text-center cursor-pointer bg-white hover:bg-indigo-50/30 transition group min-h-[200px] flex flex-col justify-center items-center">
                            <input type="file" id="editCoverInput" name="image" accept="image/*" class="hidden" onchange="handleCoverImageSelect(event, 'edit')">
                            
                            <div class="space-y-3 py-2">
                                <div class="w-12 h-12 mx-auto rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl group-hover:scale-110 transition shadow-xs">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">Click to Choose Replacement Image</p>
                                    <p class="text-xs text-slate-400 mt-1">Leaves current image if you don't pick a new one.<br>Supports WEBP, PNG, JPG (up to 5MB)</p>
                                </div>
                                <button type="button" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 border border-slate-200 text-xs font-bold text-slate-700 shadow-2xs">
                                    Browse Replacement Photo
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Live Preview Box & Specs (6 Cols) -->
                    <div class="lg:col-span-6 space-y-3">
                        <div id="editCoverPreviewBox" class="space-y-3">
                            <div class="relative rounded-2xl overflow-hidden border border-slate-200 shadow-xs bg-slate-900">
                                <img id="editCoverPreviewImg" src="" alt="Current Cover" class="w-full object-cover transition-all duration-300" style="max-height: 200px;">
                                <div class="absolute bottom-2 left-2 bg-slate-900/80 backdrop-blur-xs text-white text-[11px] font-mono px-2.5 py-1 rounded-md">
                                    <span id="editCoverDimensions">Current Cover Photo</span>
                                </div>
                            </div>
                            
                            <!-- Height Slider for Edit -->
                            <div class="space-y-1 text-left pt-1">
                                <div class="flex justify-between items-center text-xs font-semibold text-slate-600">
                                    <span>Preview Height:</span>
                                    <span id="editCoverHeightVal" class="font-mono font-bold text-indigo-600">200px</span>
                                </div>
                                <input type="range" min="160" max="360" value="200" oninput="adjustCoverPreviewHeight(this.value, 'edit')" class="w-full accent-indigo-600 h-1.5 bg-slate-200 rounded-lg cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <!-- Banner Backlink Option for Edit (Full Width 12 Cols) -->
                    <div class="lg:col-span-12 pt-4 border-t border-slate-200/80">
                        <div class="bg-white border border-indigo-100 rounded-2xl p-4.5 space-y-2.5 shadow-2xs">
                            <div class="flex items-center justify-between flex-wrap gap-2">
                                <label for="edit-cover-link" class="text-xs font-bold text-slate-800 flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-indigo-600 text-white flex items-center justify-center text-xs shadow-xs">
                                        <i class="fa-solid fa-link"></i>
                                    </span>
                                    <span>Banner Backlink / Target URL (Optional)</span>
                                </label>
                                <span class="text-[11px] font-semibold text-indigo-600 bg-indigo-50 px-2.5 py-0.5 rounded-full border border-indigo-100 flex items-center gap-1">
                                    <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i> Clickable Banner Link
                                </span>
                            </div>
                            <p class="text-xs text-slate-500">
                                Banner image par click hone par open hone wala destination URL (Backlink). Khali chhodne par normal image zoom hoga.
                            </p>
                            <div class="relative flex items-center">
                                <span class="absolute left-3.5 text-slate-400 text-xs">
                                    <i class="fa-solid fa-globe"></i>
                                </span>
                                <input type="text" id="edit-cover-link" name="cover_link" placeholder="https://smttc.in/admission ya koi bhi target URL" class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-9 pr-24 py-2.5 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-50 shadow-2xs">
                                <button type="button" onclick="testCoverLink('edit-cover-link')" class="absolute right-2 px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-indigo-50 text-slate-600 hover:text-indigo-600 text-[11px] font-bold border border-slate-200 transition flex items-center gap-1">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i> Test Link
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION 3: SEO PREVIEW & ACTION BUTTONS (MOVED DOWN) -->
            <div class="pt-6 border-t border-slate-200/80 grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                <!-- Search Preview (7 Cols) -->
                <div class="lg:col-span-7 bg-white rounded-2xl p-5 border border-slate-200 shadow-xs space-y-2.5">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-800 flex items-center gap-1.5">
                            <i class="fa-brands fa-google text-red-500"></i> Search Preview
                        </h4>
                        <span class="text-[10px] font-mono font-bold text-slate-400">SEO Preview</span>
                    </div>
                    <div class="bg-slate-50/70 p-3.5 rounded-xl border border-slate-100 space-y-1 font-sans text-left">
                        <div class="flex items-center gap-1.5 text-xs text-slate-500">
                            <span class="w-4 h-4 rounded-full bg-indigo-600 text-white flex items-center justify-center text-[8px] font-bold">S</span>
                            <span class="truncate">https://smttc.in &rsaquo; blog &rsaquo; <span id="editSeoSlugPreview" class="text-slate-700 font-medium">slug</span></span>
                        </div>
                        <h5 id="editSeoTitlePreview" class="text-base font-semibold text-blue-700 hover:underline cursor-pointer leading-snug line-clamp-1">Title</h5>
                        <p id="editSeoSnippetPreview" class="text-xs text-slate-600 leading-relaxed line-clamp-2">Excerpt</p>
                    </div>
                </div>

                <!-- Action buttons (5 Cols) -->
                <div class="lg:col-span-5 bg-gradient-to-br from-indigo-950 via-slate-900 to-indigo-900 text-white rounded-2xl p-6 shadow-xl space-y-4">
                    <div>
                        <span class="text-xs font-bold text-indigo-200">Ready to save?</span>
                        <p class="text-xs text-indigo-100/80 mt-1">Changes will update immediately on the public website.</p>
                    </div>
                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 py-3.5 rounded-xl bg-gradient-to-r from-amber-400 to-[#FACA0A] hover:from-amber-500 hover:to-yellow-500 text-slate-950 font-black text-sm uppercase tracking-wider shadow-lg transition duration-200 flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Save Changes</span>
                        </button>
                        <button type="button" onclick="closeEditBlogModal()" class="px-5 py-3.5 rounded-xl border border-white/20 hover:bg-white/10 text-white font-bold text-xs transition">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- ================= FREE-SIZE IMAGE STUDIO MODAL ================= -->
<div id="imageResizeStudioModal" class="fixed inset-0 z-[110] hidden flex items-center justify-center p-4">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-xs" onclick="closeImageStudioModal()"></div>
    
    <!-- Modal Dialog -->
    <div class="relative w-full max-w-3xl bg-white rounded-3xl shadow-2xl p-6 md:p-8 animate-fade-in max-h-[92vh] overflow-y-auto z-20 space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <div>
                <h3 class="text-lg font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-arrows-up-down-left-right text-indigo-600"></i> Free-Size Image Dimension & Styling Studio
                </h3>
                <p class="text-xs text-slate-400 mt-0.5">Adjust exact image length (height), width, proportions, floating alignment, and shadows.</p>
            </div>
            <button onclick="closeImageStudioModal()" class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-red-50 text-slate-400 hover:text-red-500 font-bold transition flex items-center justify-center text-lg">&times;</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
            <!-- Left: Interactive Live Preview (5 Cols) -->
            <div class="md:col-span-5 space-y-4">
                <div class="bg-slate-900 rounded-2xl p-4 text-center border border-slate-800 shadow-inner flex flex-col justify-center items-center min-h-[260px] relative overflow-hidden">
                    <div id="studioPreviewCanvas" class="w-full flex items-center justify-center transition-all duration-200 max-h-[240px]">
                        <img id="studioPreviewImg" src="" alt="Selected Preview" class="max-w-full max-h-[220px] object-contain transition-all duration-150">
                    </div>
                    
                    <div class="absolute top-2 left-2 bg-slate-800/90 text-white text-[10px] font-mono px-2 py-0.5 rounded-md border border-slate-700">
                        <span id="studioNaturalBadge">Natural: -- &times; -- px</span>
                    </div>

                    <div class="absolute bottom-2 right-2 bg-indigo-600/90 text-white text-[10px] font-bold px-2 py-0.5 rounded-md">
                        <span id="studioLiveOutputBadge">Live: Auto</span>
                    </div>
                </div>

                <!-- Aspect Ratio & Natural Info -->
                <div class="bg-slate-50 p-3.5 rounded-xl border border-slate-200/80 space-y-1.5 text-xs">
                    <div class="flex justify-between items-center text-slate-500">
                        <span>Original Aspect Ratio:</span>
                        <span id="studioAspectDisplay" class="font-bold text-slate-800 font-mono">16 : 9</span>
                    </div>
                    <div class="flex justify-between items-center text-slate-500">
                        <span>Current Selection:</span>
                        <span id="studioSelectionTag" class="font-bold text-indigo-600 font-mono">1 Image Selected</span>
                    </div>
                </div>

                <div class="p-3 bg-amber-50 rounded-xl border border-amber-200/80 text-[11px] text-amber-800 flex items-start gap-2">
                    <i class="fa-solid fa-lightbulb text-amber-600 mt-0.5 shrink-0"></i>
                    <span><strong>Free-Size Tip:</strong> You can also drag the 8 blue handles directly on the image in the editor to resize freely!</span>
                </div>
            </div>

            <!-- Right: Dimension & Formatting Controls (7 Cols) -->
            <div class="md:col-span-7 space-y-5">
                <!-- Dimensions (Breadth/Width & Length/Height) -->
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200/80 space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-200/80 pb-2 flex-wrap gap-2">
                        <span class="text-xs font-bold text-slate-800 uppercase tracking-wider flex items-center gap-1.5">
                            <i class="fa-solid fa-ruler-combined text-indigo-600"></i> Free-Size Studio: Length & Breadth (लंबाई और चौड़ाई)
                        </span>
                        
                        <!-- Free-Size vs Lock Aspect Ratio Toggle (Default: Unlocked Free-Size) -->
                        <label class="flex items-center gap-1.5 text-xs font-bold text-indigo-700 cursor-pointer select-none bg-indigo-50 hover:bg-indigo-100 px-2.5 py-1 rounded-lg border border-indigo-200 transition">
                            <input type="checkbox" id="studioLockRatio" onchange="toggleStudioRatioLock()" class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 w-3.5 h-3.5">
                            <i class="fa-solid fa-lock-open text-[10px]" id="studioRatioLockIcon"></i>
                            <span id="studioRatioLockLabel">Free-Size Mode (Independent)</span>
                        </label>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Breadth (Width) Control -->
                        <div class="space-y-2 bg-white p-3 rounded-xl border border-slate-200 shadow-2xs">
                            <div class="flex justify-between items-center">
                                <label class="block text-xs font-extrabold text-slate-800 flex items-center gap-1">
                                    <i class="fa-solid fa-arrows-left-right text-indigo-600"></i> Breadth / Width (चौड़ाई)
                                </label>
                                <span id="studioWidthLiveBadge" class="text-[11px] font-mono font-bold text-indigo-600">100%</span>
                            </div>
                            <div class="flex rounded-xl overflow-hidden border border-slate-200 bg-white">
                                <input type="number" id="studioWidthInput" min="20" max="2500" value="100" oninput="handleStudioWidthChange(this.value)" class="w-full px-3 py-2 text-xs font-bold text-slate-800 focus:outline-none">
                                <select id="studioWidthUnit" onchange="handleStudioWidthUnitChange(this.value)" class="bg-slate-100 border-l border-slate-200 px-2 text-xs font-bold text-slate-600 focus:outline-none">
                                    <option value="%">%</option>
                                    <option value="px">px</option>
                                </select>
                            </div>
                            <!-- Breadth Range Slider -->
                            <div class="space-y-1 pt-1">
                                <input type="range" id="studioWidthSlider" min="50" max="1200" value="700" oninput="handleStudioWidthSliderChange(this.value)" class="w-full accent-indigo-600 h-1.5 bg-slate-200 rounded-lg cursor-pointer">
                            </div>
                            <div class="flex flex-wrap gap-1 pt-1">
                                <button type="button" onclick="setStudioQuickWidth(25, '%')" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">25%</button>
                                <button type="button" onclick="setStudioQuickWidth(50, '%')" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">50%</button>
                                <button type="button" onclick="setStudioQuickWidth(75, '%')" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">75%</button>
                                <button type="button" onclick="setStudioQuickWidth(100, '%')" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">100%</button>
                                <button type="button" onclick="setStudioQuickWidth(500, 'px')" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">500px</button>
                                <button type="button" onclick="setStudioQuickWidth(800, 'px')" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">800px</button>
                            </div>
                        </div>

                        <!-- Length (Height) Control -->
                        <div class="space-y-2 bg-white p-3 rounded-xl border border-slate-200 shadow-2xs">
                            <div class="flex justify-between items-center">
                                <label class="block text-xs font-extrabold text-slate-800 flex items-center gap-1">
                                    <i class="fa-solid fa-arrows-up-down text-indigo-600"></i> Length / Height (लंबाई)
                                </label>
                                <span id="studioHeightLiveBadge" class="text-[11px] font-mono font-bold text-indigo-600">Auto</span>
                            </div>
                            <div class="flex rounded-xl overflow-hidden border border-slate-200 bg-white">
                                <input type="text" id="studioHeightInput" value="auto" oninput="handleStudioHeightChange(this.value)" class="w-full px-3 py-2 text-xs font-bold text-slate-800 focus:outline-none">
                                <select id="studioHeightUnit" onchange="handleStudioHeightUnitChange(this.value)" class="bg-slate-100 border-l border-slate-200 px-2 text-xs font-bold text-slate-600 focus:outline-none">
                                    <option value="auto">auto</option>
                                    <option value="px">px</option>
                                </select>
                            </div>
                            <!-- Length Range Slider -->
                            <div class="space-y-1 pt-1">
                                <input type="range" id="studioHeightSlider" min="80" max="850" value="350" oninput="handleStudioHeightSliderChange(this.value)" class="w-full accent-indigo-600 h-1.5 bg-slate-200 rounded-lg cursor-pointer">
                            </div>
                            <div class="flex flex-wrap gap-1 pt-1">
                                <button type="button" onclick="setStudioQuickHeight('auto')" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">Auto</button>
                                <button type="button" onclick="setStudioQuickHeight(180)" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">180px</button>
                                <button type="button" onclick="setStudioQuickHeight(260)" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">260px</button>
                                <button type="button" onclick="setStudioQuickHeight(380)" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">380px</button>
                                <button type="button" onclick="setStudioQuickHeight(500)" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">500px</button>
                            </div>
                        </div>
                    </div>

                    <!-- Object Fit & Natural Reset -->
                    <div class="flex items-center justify-between pt-1 flex-wrap gap-2 text-xs">
                        <div class="flex items-center gap-2">
                            <span class="text-slate-500 font-bold text-[11px]">Fitting Mode:</span>
                            <select id="studioObjectFit" onchange="updateStudioStyling()" class="bg-white border border-slate-200 rounded-lg px-2.5 py-1 text-xs font-semibold text-slate-700">
                                <option value="fill" selected>No Cut / Full Image (पूरी फोटो दिखेगी - कोई कटिंग नहीं)</option>
                                <option value="contain">Contain (पूरा अनुपात में फिट - कोई कटिंग नहीं)</option>
                                <option value="cover">Crop / Fill (कट करके बॉक्स भरेगा)</option>
                            </select>
                        </div>
                        <button type="button" onclick="resetStudioToNatural()" class="px-3 py-1 bg-indigo-50 border border-indigo-200 hover:bg-indigo-100 rounded-lg text-xs font-bold text-indigo-700 transition flex items-center gap-1">
                            <i class="fa-solid fa-rotate-left text-[10px]"></i> Reset Natural Size
                        </button>
                    </div>
                </div>

                <!-- Movement & Positioning Controls (Width के बीच में और Length के बीच में Move करें) -->
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200/80 space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-200/80 pb-2">
                        <span class="text-xs font-bold text-slate-800 uppercase tracking-wider flex items-center gap-1.5">
                            <i class="fa-solid fa-arrows-up-down-left-right text-indigo-600"></i> Move & Position: Length & Width (लंबाई और चौड़ाई के बीच में Move करें)
                        </span>
                        <span class="text-[10px] font-bold text-indigo-600 bg-indigo-50 border border-indigo-200 px-2 py-0.5 rounded-md">Live Positioning</span>
                    </div>

                    <!-- 1. Width Movement (चौड़ाई के बीच में Move / Horizontal Alignment) -->
                    <div class="space-y-2 bg-white p-3 rounded-xl border border-slate-200 shadow-2xs">
                        <div class="flex justify-between items-center">
                            <label class="block text-xs font-extrabold text-slate-800 flex items-center gap-1">
                                <i class="fa-solid fa-arrows-left-right text-indigo-600"></i> Width Position (चौड़ाई के बीच में / Horizontal)
                            </label>
                            <span id="studioAlignStatusBadge" class="text-[11px] font-mono font-bold text-indigo-600">Center Block</span>
                        </div>
                        <div class="grid grid-cols-4 gap-2 pt-1">
                            <button type="button" id="alignBtnLeft" onclick="setStudioAlign('float-left')" class="p-2 bg-white border border-slate-200 rounded-xl text-center hover:border-indigo-500 transition shadow-2xs" title="Float Left (बाईं तरफ)">
                                <i class="fa-solid fa-align-left block text-sm text-slate-600 mb-0.5"></i>
                                <span class="text-[10px] font-bold text-slate-700 block">Left (बाईं)</span>
                            </button>
                            <button type="button" id="alignBtnCenter" onclick="setStudioAlign('center')" class="p-2 bg-indigo-50 border-2 border-indigo-600 rounded-xl text-center transition shadow-2xs" title="Center in Page (चौड़ाई के बिल्कुल बीच में)">
                                <i class="fa-solid fa-align-center block text-sm text-indigo-600 mb-0.5"></i>
                                <span class="text-[10px] font-bold text-indigo-700 block">Center (बीच में)</span>
                            </button>
                            <button type="button" id="alignBtnRight" onclick="setStudioAlign('float-right')" class="p-2 bg-white border border-slate-200 rounded-xl text-center hover:border-indigo-500 transition shadow-2xs" title="Float Right (दाईं तरफ)">
                                <i class="fa-solid fa-align-right block text-sm text-slate-600 mb-0.5"></i>
                                <span class="text-[10px] font-bold text-slate-700 block">Right (दाईं)</span>
                            </button>
                            <button type="button" id="alignBtnInline" onclick="setStudioAlign('inline')" class="p-2 bg-white border border-slate-200 rounded-xl text-center hover:border-indigo-500 transition shadow-2xs" title="Inline (टेक्स्ट के साथ)">
                                <i class="fa-solid fa-arrows-left-right block text-sm text-slate-600 mb-0.5"></i>
                                <span class="text-[10px] font-bold text-slate-700 block">Inline (साथ)</span>
                            </button>
                        </div>
                    </div>

                    <!-- 2. Length Movement (लंबाई के बीच में Move / Vertical Position & Spacing) -->
                    <div class="space-y-3 bg-white p-3 rounded-xl border border-slate-200 shadow-2xs">
                        <div class="flex justify-between items-center">
                            <label class="block text-xs font-extrabold text-slate-800 flex items-center gap-1">
                                <i class="fa-solid fa-arrows-up-down text-indigo-600"></i> Length Position (लंबाई के बीच में Move & Spacing)
                            </label>
                            <span id="studioVSpacingBadge" class="text-[11px] font-mono font-bold text-indigo-600">24px Gap</span>
                        </div>

                        <!-- Move Up / Down along article length -->
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="text-[11px] font-bold text-slate-600">Article Order:</span>
                            <button type="button" onclick="moveStudioImage('up')" class="px-3 py-1.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 border border-slate-200 rounded-lg text-xs font-bold text-slate-700 transition flex items-center gap-1.5 shadow-2xs">
                                <i class="fa-solid fa-arrow-up text-indigo-600"></i> ⬆️ Move Up (लंबाई में ऊपर ले जाएं)
                            </button>
                            <button type="button" onclick="moveStudioImage('down')" class="px-3 py-1.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 border border-slate-200 rounded-lg text-xs font-bold text-slate-700 transition flex items-center gap-1.5 shadow-2xs">
                                <i class="fa-solid fa-arrow-down text-indigo-600"></i> ⬇️ Move Down (लंबाई में नीचे ले जाएं)
                            </button>
                        </div>

                        <!-- Vertical Margin / Gap Slider -->
                        <div class="space-y-1 pt-1 border-t border-slate-100">
                            <div class="flex justify-between text-[11px] text-slate-500 font-semibold">
                                <span>Vertical Spacing (ऊपर और नीचे का गैप):</span>
                                <span id="studioMarginValText" class="font-mono font-bold text-indigo-600">24px</span>
                            </div>
                            <input type="range" id="studioMarginVerticalSlider" min="0" max="80" value="24" oninput="handleStudioMarginVerticalChange(this.value)" class="w-full accent-indigo-600 h-1.5 bg-slate-200 rounded-lg cursor-pointer">
                            <div class="flex flex-wrap gap-1 pt-1">
                                <button type="button" onclick="setStudioQuickVSpacing(0)" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">0px</button>
                                <button type="button" onclick="setStudioQuickVSpacing(16)" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">16px</button>
                                <button type="button" onclick="setStudioQuickVSpacing(24)" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">24px (Std)</button>
                                <button type="button" onclick="setStudioQuickVSpacing(36)" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">36px</button>
                                <button type="button" onclick="setStudioQuickVSpacing(48)" class="px-2 py-0.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 rounded text-[10px] font-bold text-slate-600">48px (Wide)</button>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Photo Focal Position (फ्रेम के अंदर फोटो को लंबाई/चौड़ाई के बीच में खिसकाना) -->
                    <div class="space-y-2 bg-white p-3 rounded-xl border border-slate-200 shadow-2xs">
                        <div class="flex justify-between items-center">
                            <label class="block text-xs font-extrabold text-slate-800 flex items-center gap-1">
                                <i class="fa-solid fa-crop-simple text-indigo-600"></i> Frame Focal Shift (फ्रेम के अंदर फोटो को बीच में Move करना)
                            </label>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                            <div>
                                <label class="block text-[11px] font-bold text-slate-600 mb-1">Length Focus (लंबाई / Vertical):</label>
                                <select id="studioObjectPosY" onchange="updateStudioStyling()" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-semibold text-slate-700">
                                    <option value="center" selected>Center (बिल्कुल बीच में)</option>
                                    <option value="top">Top (ऊपर का हिस्सा)</option>
                                    <option value="bottom">Bottom (नीचे का हिस्सा)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-slate-600 mb-1">Width Focus (चौड़ाई / Horizontal):</label>
                                <select id="studioObjectPosX" onchange="updateStudioStyling()" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-semibold text-slate-700">
                                    <option value="center" selected>Center (बिल्कुल बीच में)</option>
                                    <option value="left">Left (बाईं तरफ)</option>
                                    <option value="right">Right (दाईं तरफ)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Styling Accents (Corners & Shadow) -->
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200/80 space-y-3">
                    <span class="block text-xs font-bold text-slate-800 uppercase tracking-wider flex items-center gap-1.5">
                        <i class="fa-solid fa-wand-magic-sparkles text-indigo-600"></i> Corner Radius & Shadow
                    </span>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="block text-[11px] font-bold text-slate-600">Corner Radius</label>
                            <select id="studioCornerRadius" onchange="updateStudioStyling()" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-1.5 text-xs font-semibold text-slate-700 focus:outline-none focus:border-indigo-500">
                                <option value="rounded-none">Square (0px)</option>
                                <option value="rounded-lg">Soft Rounded (8px)</option>
                                <option value="rounded-2xl" selected>Modern Card (16px)</option>
                                <option value="rounded-full">Pill / Circle</option>
                            </select>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-[11px] font-bold text-slate-600">Drop Shadow</label>
                            <select id="studioShadow" onchange="updateStudioStyling()" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-1.5 text-xs font-semibold text-slate-700 focus:outline-none focus:border-indigo-500">
                                <option value="shadow-none">No Shadow</option>
                                <option value="shadow-sm">Subtle Soft (Light)</option>
                                <option value="shadow-lg" selected>Card Depth (Elevated)</option>
                                <option value="shadow-2xl">Ultra Deep</option>
                            </select>
                        </div>
                    </div>

                    <!-- Alt Text / Caption -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <div class="space-y-1">
                            <label class="block text-[11px] font-bold text-slate-600">Alt Text (Accessibility & SEO)</label>
                            <input type="text" id="studioAltInput" placeholder="Describe this technical image..." class="w-full bg-white border border-slate-200 rounded-xl px-3 py-1.5 text-xs text-slate-700 focus:outline-none focus:border-indigo-500">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-[11px] font-bold text-slate-600">Optional Caption</label>
                            <input type="text" id="studioCaptionInput" placeholder="e.g. Figure 1: Inverter PCB Testing" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-1.5 text-xs text-slate-700 focus:outline-none focus:border-indigo-500">
                        </div>
                    </div>
                </div>

                <!-- Footer Action Buttons -->
                <div class="flex justify-end gap-3 pt-3 border-t border-slate-100">
                    <button type="button" onclick="closeImageStudioModal()" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-xs hover:bg-slate-50 transition">
                        Cancel
                    </button>
                    <button type="button" onclick="applyStudioImageChanges()" class="px-7 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-extrabold text-xs shadow-md shadow-indigo-100 transition duration-200 flex items-center gap-2">
                        <i class="fa-solid fa-check"></i> Apply Dimensions & Style
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================= GALLERY PREVIEW & VIDEO PLAYER MODAL ================= -->
<div id="galleryPreviewModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-3 sm:p-6">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-950/85 backdrop-blur-md" onclick="closeGalleryPreview()"></div>
    
    <!-- Modal Window -->
    <div class="relative w-full max-w-4xl bg-slate-900 rounded-3xl shadow-2xl overflow-hidden border border-slate-800 animate-fade-in z-10 flex flex-col max-h-[94vh]">
        <!-- Top bar with close button -->
        <div class="flex items-center justify-between p-4 sm:px-6 bg-slate-950/60 border-b border-white/10 z-20">
            <div class="flex items-center gap-2.5">
                <span id="galPreviewCategory" class="px-3 py-1 rounded-full text-[11px] font-bold bg-blue-500/20 text-blue-300 border border-blue-400/30">
                    General
                </span>
                <span id="galPreviewTypeBadge" class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white/10 text-slate-300">
                    Media
                </span>
            </div>
            <button type="button" onclick="closeGalleryPreview()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-slate-300 hover:text-white flex items-center justify-center transition">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>

        <!-- Media Display Area -->
        <div class="relative bg-black flex items-center justify-center flex-1 min-h-[300px] overflow-hidden">
            <!-- 1. Photo View -->
            <div id="galPreviewImageContainer" class="hidden w-full max-h-[65vh] flex items-center justify-center p-2">
                <img id="galPreviewImg" src="" alt="Gallery Preview" class="max-h-[60vh] max-w-full object-contain rounded-xl shadow-2xl">
            </div>

            <!-- 2. YouTube Iframe View -->
            <div id="galPreviewIframeContainer" class="hidden w-full aspect-video">
                <iframe id="galPreviewIframe" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <!-- 3. Direct HTML5 Video File View -->
            <div id="galPreviewVideoContainer" class="hidden w-full aspect-video bg-black flex items-center justify-center">
                <video id="galPreviewVideo" class="w-full h-full max-h-[65vh]" controls playsinline preload="metadata">
                    <source id="galPreviewVideoSource" src="" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
            </div>
        </div>

        <!-- Info Description Bottom Drawer -->
        <div class="p-5 sm:p-6 bg-slate-900 border-t border-white/10 space-y-2 max-h-48 overflow-y-auto">
            <div class="flex items-start justify-between gap-4">
                <h3 id="galPreviewTitle" class="text-base sm:text-lg font-black text-white leading-snug">
                    Gallery Media
                </h3>
                <span id="galPreviewDate" class="text-xs font-semibold text-slate-400 shrink-0"></span>
            </div>
            <p id="galPreviewDescription" class="text-xs sm:text-sm text-slate-300 leading-relaxed font-normal">
                No description provided.
            </p>
        </div>
    </div>
</div>

<!-- ================= EDIT GALLERY MEDIA MODAL ================= -->
<div id="editGalleryModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-xs" onclick="closeEditGalleryModal()"></div>

    <!-- Modal Box -->
    <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl p-6 sm:p-8 animate-fade-in max-h-[92vh] overflow-y-auto z-10 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <div>
                <h3 class="text-lg font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-pen-to-square text-indigo-600"></i> Edit Media Details
                </h3>
                <p class="text-xs text-slate-400 mt-0.5">Update category tag, practical title, workbench description or replace media.</p>
            </div>
            <button type="button" onclick="closeEditGalleryModal()" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 flex items-center justify-center transition">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>

        <form id="editGalleryForm" action="" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <input type="hidden" id="editGalleryId" name="id">
            <input type="hidden" id="editGalleryMediaType" name="media_type" value="image">

            <!-- Title / Caption -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700">Media Title / Practical Caption</label>
                <input type="text" id="editGalleryTitle" name="title" placeholder="e.g. Inverter AC PCB Tracing Practical Demo" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-50 transition shadow-2xs">
            </div>

            <!-- Category -->
            <div class="space-y-1.5">
                <div class="flex justify-between items-center">
                    <label class="block text-xs font-bold text-slate-700">Category Tag (किस कैटेगरी का है) <span class="text-red-500">*</span></label>
                    <span class="text-[10px] text-indigo-600 font-bold bg-indigo-50 px-2 py-0.5 rounded-md">Filter Group</span>
                </div>
                <select id="editGalleryCategory" name="category" onchange="checkCustomCategory(this.value, 'edit')" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-800 focus:outline-none focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-50 transition shadow-2xs">
                    <option value="AC & HVAC PCB Repairing">❄️ AC & HVAC PCB Repairing</option>
                    <option value="Smartphone Hardware & Micro-soldering">📱 Smartphone Hardware & Micro-soldering</option>
                    <option value="Laptop Chip Level Repairing">💻 Laptop Chip Level Repairing</option>
                    <option value="Home Appliances (Fridge/Washing Machine)">⚡ Home Appliances (Fridge / Washing Machine)</option>
                    <option value="Student Lab Practicals">🔬 Student Lab Practicals</option>
                    <option value="Events & Certificate Ceremonies">🏆 Events & Certificate Ceremonies</option>
                    <option value="Campus & Workshop Infrastructure">🏫 Campus & Workshop Infrastructure</option>
                    <option value="__custom__">➕ Other Custom Category...</option>
                </select>
                <input type="text" id="editCustomCategoryInput" name="custom_category_text" placeholder="Type custom category name..." class="hidden mt-2 w-full bg-white border border-indigo-300 rounded-xl px-4 py-2 text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>

            <!-- Description -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700">Practical Description (डिटेल्स / डिस्क्रिप्शन)</label>
                <textarea id="editGalleryDescription" name="description" rows="3" placeholder="Explain what workbench skills, diagnosis methods, or practical equipment are demonstrated..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-50 transition shadow-2xs"></textarea>
            </div>

            <!-- Image Replacement Field (shown if image) -->
            <div id="editGalleryImageBlock" class="space-y-2">
                <label class="block text-xs font-bold text-slate-700">Replace Photo (Optional)</label>
                <div class="flex items-center gap-4">
                    <img id="editGalleryCurrentImagePreview" src="" alt="Current Media" class="w-16 h-12 rounded-xl object-cover border border-slate-200 shadow-2xs">
                    <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                </div>
            </div>

            <!-- Video Replacement Field (shown if video) -->
            <div id="editGalleryVideoBlock" class="space-y-3">
                <div class="space-y-1">
                    <label class="block text-xs font-bold text-slate-700">Update YouTube / Video URL</label>
                    <input type="url" id="editGalleryVideoUrl" name="video_url" placeholder="https://www.youtube.com/watch?v=..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 focus:outline-none focus:border-indigo-600 focus:bg-white transition shadow-2xs">
                </div>
                <div class="space-y-1">
                    <label class="block text-xs font-bold text-slate-700">Or Upload New Video File</label>
                    <input type="file" name="video_file" accept="video/mp4,video/webm,video/ogg,video/quicktime" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 pt-3 border-t border-slate-100">
                <button type="button" onclick="closeEditGalleryModal()" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-xs hover:bg-slate-50 transition">
                    Cancel
                </button>
                <button type="submit" class="px-7 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-extrabold text-xs shadow-md shadow-indigo-100 transition duration-200 flex items-center gap-2">
                    <i class="fa-solid fa-check"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Global Studio State for Image Manipulation
let activeEditorId = 'create-blog-content';
let targetStudioImageNode = null;
let studioOriginalWidth = 800;
let studioOriginalHeight = 450;
let studioCurrentAlign = 'center';
let autoSlugEnabled = true;

// -----------------------------------------------------------------------------
// Core Image Wrap, Scaling & Position Locking Engine
// -----------------------------------------------------------------------------
function scaleImageSize(editor, imgNode, factor) {
    if (!editor || !imgNode) return;
    editor.undoManager.transact(() => {
        let currentW = imgNode.offsetWidth || parseInt(imgNode.style.width) || parseInt(imgNode.getAttribute('width')) || 350;
        let newW = Math.round(currentW * factor);
        newW = Math.max(60, Math.min(1200, newW));

        imgNode.style.width = newW + 'px';
        imgNode.style.height = 'auto';
        imgNode.setAttribute('width', newW);
        imgNode.removeAttribute('height');

        editor.save();
        updateEditorMetrics(editor);
        showAdminToast(`Image resized to ${newW}px!`, 'info');
    });
}

function adjustImageDimension(editor, imgNode, dimension, delta) {
    if (!editor || !imgNode) return;
    editor.undoManager.transact(() => {
        const parentFigure = editor.dom.getParent(imgNode, 'figure');
        if (parentFigure && !parentFigure.querySelector('figcaption')) {
            editor.dom.replace(imgNode, parentFigure);
        }

        if (dimension === 'height') {
            let currentH = imgNode.offsetHeight || parseInt(imgNode.style.height) || parseInt(imgNode.getAttribute('height')) || imgNode.naturalHeight || 300;
            let newH = Math.max(40, Math.min(2000, currentH + delta));
            imgNode.style.height = newH + 'px';
            imgNode.setAttribute('height', newH);
            imgNode.style.removeProperty('max-height');
            showAdminToast(`Image Length (Height / लंबाई): ${newH}px`, 'info');
        } else if (dimension === 'width') {
            let currentW = imgNode.offsetWidth || parseInt(imgNode.style.width) || parseInt(imgNode.getAttribute('width')) || imgNode.naturalWidth || 400;
            let newW = Math.max(50, Math.min(2000, currentW + delta));
            imgNode.style.width = newW + 'px';
            imgNode.setAttribute('width', newW);
            imgNode.style.removeProperty('max-width');
            showAdminToast(`Image Breadth (Width / चौड़ाई): ${newW}px`, 'info');
        }
        editor.save();
        updateEditorMetrics(editor);
    });
}

function applyImageWrap(editor, imgNode, align = 'float-left') {
    if (!editor || !imgNode) return;

    editor.undoManager.transact(() => {
        // If wrapped in a figure with no caption, unwrap for clean native 8-point resizing
        const parentFigure = editor.dom.getParent(imgNode, 'figure');
        if (parentFigure && !parentFigure.querySelector('figcaption')) {
            editor.dom.replace(imgNode, parentFigure);
        }

        // If wrapped in a P, unwrap it so float works cleanly across the document
        const parentP = editor.dom.getParent(imgNode, 'p');
        if (parentP && parentP !== editor.getBody()) {
            parentP.parentNode.insertBefore(imgNode, parentP);
            const remainingText = parentP.textContent.replace(/[\s\u00a0]+/g, '').trim();
            if (!remainingText && !parentP.querySelector('img, iframe, video, audio')) {
                parentP.remove();
            }
        }

        const targetNode = imgNode;

        // Clean previous alignment classes & styles
        imgNode.classList.remove('img-float-left', 'img-float-right', 'img-center-block', 'img-full-width');
        imgNode.style.removeProperty('float');
        imgNode.style.removeProperty('display');
        imgNode.style.removeProperty('margin');
        imgNode.style.removeProperty('margin-left');
        imgNode.style.removeProperty('margin-right');
        imgNode.style.removeProperty('max-width'); // Never lock max-width

        // Remove !important from width/height so native handles work!
        const styleW = imgNode.style.getPropertyValue('width');
        const styleH = imgNode.style.getPropertyValue('height');
        imgNode.style.removeProperty('width');
        imgNode.style.removeProperty('height');
        if (styleW) imgNode.style.width = styleW;
        if (styleH && styleH !== 'auto') imgNode.style.height = styleH;
        else imgNode.style.height = 'auto';

        if (align === 'float-left') {
            imgNode.classList.add('img-float-left');
            imgNode.removeAttribute('data-explicit-center');
            imgNode.style.float = 'left';
            imgNode.style.margin = '8px 24px 16px 0';
            imgNode.style.display = 'block';
            imgNode.style.clear = 'none';

            // Only set default width if image has none; if user already sized it, KEEP user's exact size!
            let curW = parseInt(imgNode.style.width) || parseInt(imgNode.getAttribute('width')) || 0;
            if (!curW) {
                const natW = imgNode.naturalWidth || 380;
                const sensibleW = Math.min(natW, 380);
                imgNode.style.width = sensibleW + 'px';
                imgNode.setAttribute('width', sensibleW);
                imgNode.style.height = 'auto';
            }

            // Find or create paragraph to type beside the image on the right
            let nextBlock = targetNode.nextElementSibling;
            if (!nextBlock || nextBlock.nodeName.toLowerCase() !== 'p') {
                nextBlock = editor.dom.create('p', { style: 'clear: none;' }, '<br data-mce-bogus="1">');
                editor.dom.insertAfter(nextBlock, targetNode);
            }
            nextBlock.style.removeProperty('clear');
            nextBlock.style.clear = 'none';

            if (nextBlock.textContent.trim().length > 0) {
                editor.selection.setCursorLocation(nextBlock, nextBlock.childNodes.length);
            } else {
                editor.selection.setCursorLocation(nextBlock, 0);
            }
            editor.focus();

            showAdminToast('Photo locked on LEFT. Typing cursor is BESIDE it on the RIGHT!', 'success');
        } else if (align === 'float-right') {
            imgNode.classList.add('img-float-right');
            imgNode.removeAttribute('data-explicit-center');
            imgNode.style.float = 'right';
            imgNode.style.margin = '8px 0 16px 24px';
            imgNode.style.display = 'block';
            imgNode.style.clear = 'none';

            let curW = parseInt(imgNode.style.width) || parseInt(imgNode.getAttribute('width')) || 0;
            if (!curW) {
                const natW = imgNode.naturalWidth || 380;
                const sensibleW = Math.min(natW, 380);
                imgNode.style.width = sensibleW + 'px';
                imgNode.setAttribute('width', sensibleW);
                imgNode.style.height = 'auto';
            }

            // In float-right, following paragraph flows to the left of the image
            let nextBlock = targetNode.nextElementSibling;
            if (!nextBlock || nextBlock.nodeName.toLowerCase() !== 'p') {
                nextBlock = editor.dom.create('p', { style: 'clear: none;' }, '<br data-mce-bogus="1">');
                editor.dom.insertAfter(nextBlock, targetNode);
            }
            nextBlock.style.removeProperty('clear');
            nextBlock.style.clear = 'none';

            if (nextBlock.textContent.trim().length > 0) {
                editor.selection.setCursorLocation(nextBlock, nextBlock.childNodes.length);
            } else {
                editor.selection.setCursorLocation(nextBlock, 0);
            }
            editor.focus();

            showAdminToast('Photo locked on RIGHT. Typing cursor is BESIDE it on the LEFT!', 'success');
        } else if (align === 'center') {
            imgNode.classList.add('img-center-block');
            imgNode.classList.remove('img-float-left', 'img-float-right');
            imgNode.setAttribute('data-explicit-center', 'true');
            imgNode.style.display = 'block';
            imgNode.style.margin = '20px auto';
            imgNode.style.removeProperty('float');
            imgNode.style.clear = 'both';

            // Also ensure surrounding elements clear float so text flows full-width across page
            const parent = editor.dom.getParent(imgNode, 'p') || editor.dom.getParent(imgNode, 'figure');
            if (parent) {
                parent.style.clear = 'both';
                parent.style.textAlign = 'center';
            }
            const nextNode = (parent || imgNode).nextElementSibling;
            if (nextNode) {
                nextNode.style.clear = 'both';
            }

            showAdminToast('Image Full Page Center (No text wrap, full page paragraphs)!', 'success');
        }

        editor.save();
        updateEditorMetrics(editor);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    // -------------------------------------------------------------------------
    // 1. Advanced TinyMCE Initialization with Free-Size & High-Detailing
    // -------------------------------------------------------------------------
    if (typeof tinymce !== 'undefined') {
        tinymce.init({
            selector: '#create-blog-content, #edit-blog-content-input',
            height: 520,
            resize: 'both', // Enables dragging the bottom-right handle (//) in Image 1 to resize BOTH width & height!
            min_height: 520,
            max_height: 2000,
            relative_urls: false,
            remove_script_host: false,
            document_base_url: window.location.origin + '/',
            convert_urls: false,
            menubar: 'file edit view insert format tools table help',
            branding: false,
            promotion: false, // Hides the Upgrade badge
            object_resizing: true, // Natively enables 8 free-size drag handles on images
            resize_img_proportional: false, // Independent height (lamba/chota) & width resizing with 8 drag handles!
            image_dimensions: true, // Enables width & length inputs in dialogs
            image_advtab: true, // Enables Advanced tab for borders & styles
            image_caption: true,
            image_title: true,
            paste_data_images: true, // Allows pasting screenshots directly from clipboard
            automatic_uploads: true,
            images_upload_url: '/admin/blogs/upload-image',
            file_picker_types: 'image',
            forced_root_block: 'p',
            end_container_on_empty_block: true,

            // Native file browser popup callback when user clicks Image tool
            file_picker_callback: function (cb, value, meta) {
                if (meta.filetype === 'image') {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function () {
                        const file = this.files[0];
                        if (!file) return;

                        const formData = new FormData();
                        formData.append('image', file);
                        formData.append('file', file);
                        formData.append('upload', file);
                        formData.append('_token', "{{ csrf_token() }}");

                        showAdminToast('Uploading image from computer...', 'info');

                        fetch('/admin/blogs/upload-image', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                                'Accept': 'application/json'
                            },
                            body: formData,
                            credentials: 'same-origin'
                        })
                        .then(res => res.json())
                        .then(data => {
                            let imgUrl = data.url || data.location || data.relative_url;
                            if (imgUrl) {
                                if (!imgUrl.startsWith('http')) {
                                    imgUrl = window.location.origin + (imgUrl.startsWith('/') ? imgUrl : '/' + imgUrl);
                                }
                                cb(imgUrl, { title: file.name, alt: file.name });
                                showAdminToast('Image selected and uploaded!', 'success');

                                // Ensure newly inserted image floats left and typing cursor is beside it
                                setTimeout(() => {
                                    const activeEd = tinymce.activeEditor;
                                    if (activeEd) {
                                        const imgs = activeEd.dom.select('img[src*="' + file.name.replace(/\.[^/.]+$/, "") + '"], img[src="' + imgUrl + '"]');
                                        if (imgs.length > 0) {
                                            applyImageWrap(activeEd, imgs[imgs.length - 1], 'float-left');
                                        }
                                    }
                                }, 300);
                            } else {
                                showAdminToast('Upload failed: ' + (data.error || 'Server error'), 'error');
                            }
                        })
                        .catch(err => {
                            showAdminToast('Upload error: ' + err.message, 'error');
                        });
                    };
                    input.click();
                }
            },

            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],

            toolbar_location: 'top',
            toolbar_sticky: true,
            toolbar_mode: 'wrap', // Never float into content; always wrap cleanly at the top header

            toolbar: [
                'selectall undo redo | blocks fontfamily fontsize | bold italic underline strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify',
                'img_wrap_left img_wrap_right img_center add_free_line write_below_btn | upload_image_btn free_size_image image media table link | bullist numlist outdent indent | removeformat code fullscreen custom_preview'
            ],

            image_class_list: [
                { title: 'Float Left (Text Wraps Around - Locked)', value: 'img-float-left' },
                { title: 'Float Right (Text Wraps Around - Locked)', value: 'img-float-right' },
                { title: 'Center Block (बीच में)', value: 'img-center-block' },
                { title: 'Responsive (Default)', value: 'img-responsive' },
                { title: '100% Full Width', value: 'img-full-width' },
                { title: 'Modern Rounded Corners (16px)', value: 'img-rounded-lg' },
                { title: 'Elevated Drop Shadow', value: 'img-shadow-card' }
            ],

            content_style: `
                html {
                    min-height: 100%;
                    cursor: text;
                    user-select: text !important;
                    -webkit-user-select: text !important;
                    background-color: #f8fafc;
                }
                body {
                    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                    font-size: 1.0625rem;
                    line-height: 1.8;
                    color: #1e293b;
                    padding: 1.5rem 1.5rem 24rem 1.5rem;
                    min-height: 100%;
                    cursor: text;
                    box-sizing: border-box;
                    user-select: text !important;
                    -webkit-user-select: text !important;
                    word-break: break-word;
                    overflow-wrap: anywhere;
                    hyphens: auto;
                }
                ::selection {
                    background-color: #c7d2fe !important;
                    color: #1e1b4b !important;
                }
                ::-moz-selection {
                    background-color: #c7d2fe !important;
                    color: #1e1b4b !important;
                }
                h1 {
                    font-family: inherit;
                    font-size: 1.85rem;
                    font-weight: 800;
                    margin-top: 2rem;
                    margin-bottom: 0.85rem;
                    color: #0f172a;
                    line-height: 1.3;
                    border-bottom: 2px solid #f1f5f9;
                    padding-bottom: 0.5rem;
                }
                h2 {
                    font-family: inherit;
                    font-size: 1.45rem;
                    font-weight: 800;
                    margin-top: 1.75rem;
                    margin-bottom: 0.75rem;
                    color: #0f172a;
                    line-height: 1.35;
                }
                h3 {
                    font-family: inherit;
                    font-size: 1.25rem;
                    font-weight: 700;
                    margin-top: 1.5rem;
                    margin-bottom: 0.6rem;
                    color: #1e293b;
                }
                p {
                    margin-top: 0;
                    margin-bottom: 1.25rem;
                    min-height: 1.6rem;
                    line-height: 1.8;
                    color: #334155;
                }
                p:empty, p:has(> br:only-child) {
                    min-height: 1.6rem;
                    cursor: text;
                }
                img {
                    max-width: 100%;
                    cursor: default;
                    transition: outline 0.15s ease, box-shadow 0.2s ease;
                    border-radius: 8px;
                    display: inline-block;
                }
                img:not([style*="height"]):not([height]) {
                    height: auto;
                }
                img:hover {
                    outline: 2px dashed #6366f1;
                    outline-offset: 3px;
                }
                img.img-float-left,
                img[style*="float: left"] {
                    float: left !important;
                    margin: 0.25rem 1.75rem 1rem 0 !important;
                    max-width: 100%;
                }
                img.img-float-right,
                img[style*="float: right"] {
                    float: right !important;
                    margin: 0.25rem 0 1rem 1.75rem !important;
                    max-width: 100%;
                }
                p:has(> img.img-float-left),
                p:has(> img.img-float-right),
                p:has(> img[style*="float: left"]),
                p:has(> img[style*="float: right"]) {
                    margin-bottom: 0 !important;
                }
                p:has(> img.img-float-left) + *,
                p:has(> img.img-float-right) + *,
                img.img-float-left + *,
                img.img-float-right + * {
                    margin-top: 0 !important;
                }
                img.img-center-block {
                    display: block !important;
                    margin: 1.5rem auto !important;
                    clear: both !important;
                }
                img.img-full-width {
                    width: 100% !important;
                    display: block !important;
                }
                img.img-rounded-lg {
                    border-radius: 16px !important;
                }
                img.img-shadow-card {
                    box-shadow: 0 12px 30px -8px rgba(0,0,0,0.18) !important;
                }
                figure.image {
                    display: inline-block;
                    margin: 1rem 0;
                    text-align: center;
                }
                figure.image.img-float-left,
                figure.img-float-left {
                    float: left !important;
                    margin: 0.25rem 1.75rem 1rem 0 !important;
                    max-width: 50% !important;
                    text-align: left !important;
                }
                figure.image.img-float-right,
                figure.img-float-right {
                    float: right !important;
                    margin: 0.25rem 0 1rem 1.75rem !important;
                    max-width: 50% !important;
                    text-align: right !important;
                }
                figure.image.img-center-block,
                figure.img-center-block {
                    display: block !important;
                    margin: 1.5rem auto !important;
                    text-align: center !important;
                    clear: both !important;
                }
                figure.image figcaption {
                    font-size: 13px;
                    color: #64748b;
                    margin-top: 6px;
                    font-style: italic;
                }
            `,

            images_upload_handler: function (blobInfo, progress) {
                return new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    xhr.withCredentials = true;
                    xhr.open('POST', '/admin/blogs/upload-image');
                    xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
                    xhr.setRequestHeader('Accept', 'application/json');

                    xhr.upload.onprogress = (e) => {
                        progress(e.loaded / e.total * 100);
                    };

                    xhr.onload = function() {
                        if (xhr.status < 200 || xhr.status >= 300) {
                            reject('HTTP Error: ' + xhr.status);
                            return;
                        }
                        try {
                            const json = JSON.parse(xhr.responseText);
                            let finalUrl = json.url || json.location || json.relative_url;
                            if (!finalUrl) {
                                reject('Invalid JSON: ' + xhr.responseText);
                                return;
                            }
                            if (!finalUrl.startsWith('http')) {
                                finalUrl = window.location.origin + (finalUrl.startsWith('/') ? finalUrl : '/' + finalUrl);
                            }
                            resolve(finalUrl);
                        } catch (err) {
                            reject('JSON Parse Error: ' + err.message);
                        }
                    };

                    xhr.onerror = function () {
                        reject('Image upload failed due to a transport error.');
                    };

                    const formData = new FormData();
                    formData.append('image', blobInfo.blob(), blobInfo.filename());
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    formData.append('upload', blobInfo.blob(), blobInfo.filename());
                    formData.append('_token', "{{ csrf_token() }}");
                    xhr.send(formData);
                });
            },

            setup: function (editor) {
                // Register Custom Preview Button (Includes Title, Banner & 100% Exact Live Styles)
                editor.ui.registry.addButton('custom_preview', {
                    icon: 'preview',
                    tooltip: '100% Exact Live Preview (Title + Banner + Formatted Content)',
                    onAction: () => {
                        const isCreate = editor.id === 'create-blog-content';
                        let coverSrc = '';
                        let title = '';
                        if (isCreate) {
                            coverSrc = document.getElementById('createCoverPreviewImg')?.src || '';
                            title = document.getElementById('create-blog-title')?.value || 'Untitled Article';
                        } else {
                            coverSrc = document.getElementById('editCoverPreviewImg')?.src || '';
                            title = document.getElementById('edit-blog-title')?.value || 'Untitled Article';
                        }
                        
                        let bannerHtml = '';
                        if (coverSrc && coverSrc !== window.location.href && !coverSrc.includes('default-blog.webp')) {
                            bannerHtml = `<div class="article-preview-banner"><img src="${coverSrc}" alt="Article Cover" /></div>`;
                        }
                        
                        const content = editor.getContent();
                        const html = `
                            <style>
                                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
                                
                                .article-live-preview-wrapper {
                                    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                                    font-size: 16px;
                                    line-height: 1.8;
                                    color: #1e293b;
                                    max-width: 920px;
                                    margin: 0 auto;
                                    padding: 16px 20px 48px 20px;
                                    background: #ffffff;
                                    box-sizing: border-box;
                                    word-break: break-word;
                                    overflow-wrap: break-word;
                                }
                                .article-live-preview-wrapper * {
                                    box-sizing: border-box;
                                }
                                .article-live-preview-wrapper h1.article-preview-title {
                                    font-size: 2.25rem;
                                    font-weight: 800;
                                    margin-top: 0;
                                    margin-bottom: 1.75rem;
                                    color: #0f172a;
                                    line-height: 1.25;
                                    text-align: center;
                                    letter-spacing: -0.02em;
                                }
                                .article-live-preview-wrapper .article-preview-banner {
                                    margin-bottom: 2.25rem;
                                    width: 100%;
                                    display: flex;
                                    justify-content: center;
                                }
                                .article-live-preview-wrapper .article-preview-banner img {
                                    display: block;
                                    margin: 0 auto;
                                    width: 100%;
                                    max-height: 480px;
                                    object-fit: cover;
                                    object-position: center;
                                    border-radius: 16px;
                                    box-shadow: 0 12px 32px -8px rgba(0,0,0,0.18);
                                }
                                .article-live-preview-content {
                                    font-size: 1.0625rem;
                                    line-height: 1.8;
                                    color: #1e293b;
                                }
                                .article-live-preview-content p {
                                    margin-top: 0;
                                    margin-bottom: 1.25rem;
                                    color: #334155;
                                    line-height: 1.8;
                                }
                                .article-live-preview-content h1 {
                                    font-size: 1.85rem;
                                    font-weight: 800;
                                    margin-top: 2rem;
                                    margin-bottom: 0.85rem;
                                    color: #0f172a;
                                    line-height: 1.3;
                                    border-bottom: 2px solid #f1f5f9;
                                    padding-bottom: 0.5rem;
                                }
                                .article-live-preview-content h2 {
                                    font-size: 1.45rem;
                                    font-weight: 800;
                                    margin-top: 1.75rem;
                                    margin-bottom: 0.75rem;
                                    color: #0f172a;
                                    line-height: 1.35;
                                }
                                .article-live-preview-content h3 {
                                    font-size: 1.25rem;
                                    font-weight: 700;
                                    margin-top: 1.5rem;
                                    margin-bottom: 0.6rem;
                                    color: #1e293b;
                                }
                                .article-live-preview-content a {
                                    color: #4f46e5;
                                    text-decoration: underline;
                                    text-underline-offset: 3px;
                                    font-weight: 600;
                                }
                                .article-live-preview-content ul {
                                    list-style-type: disc;
                                    padding-left: 1.75rem;
                                    margin-bottom: 1.25rem;
                                    color: #334155;
                                }
                                .article-live-preview-content ol {
                                    list-style-type: decimal;
                                    padding-left: 1.75rem;
                                    margin-bottom: 1.25rem;
                                    color: #334155;
                                }
                                .article-live-preview-content li {
                                    margin-bottom: 0.5rem;
                                }
                                .article-live-preview-content strong, .article-live-preview-content b {
                                    font-weight: 700;
                                    color: #0f172a;
                                }
                                .article-live-preview-content blockquote {
                                    border-left: 4px solid #FACA0A;
                                    background: #fffbeb;
                                    padding: 1rem 1.5rem;
                                    border-radius: 0 1rem 1rem 0;
                                    font-style: italic;
                                    color: #451a03;
                                    margin: 1.75rem 0;
                                }
                                .article-live-preview-content code {
                                    background: #f1f5f9;
                                    color: #0f172a;
                                    padding: 0.2rem 0.45rem;
                                    border-radius: 0.375rem;
                                    font-size: 0.875em;
                                    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
                                }
                                .article-live-preview-content pre {
                                    background: #0f172a;
                                    color: #f8fafc;
                                    padding: 1.25rem;
                                    border-radius: 1rem;
                                    overflow-x: auto;
                                    margin: 1.5rem 0;
                                }
                                .article-live-preview-content table {
                                    width: 100%;
                                    border-collapse: collapse;
                                    margin: 2rem 0;
                                    border-radius: 1rem;
                                    overflow: hidden;
                                    border: 1px solid #e2e8f0;
                                }
                                .article-live-preview-content th, .article-live-preview-content td {
                                    padding: 0.85rem 1.25rem;
                                    border: 1px solid #e2e8f0;
                                    text-align: left;
                                }
                                .article-live-preview-content th {
                                    background: #f8fafc;
                                    font-weight: 700;
                                }
                                
                                /* IMAGES - Exact 1:1 Rendering */
                                .article-live-preview-content img {
                                    max-width: 100%;
                                    border-radius: 8px;
                                    box-shadow: 0 8px 24px -6px rgba(0, 0, 0, 0.12);
                                    display: inline-block;
                                    transition: transform 0.2s ease, box-shadow 0.2s ease;
                                }
                                .article-live-preview-content img:not([style*="height"]):not([height]) {
                                    height: auto;
                                }
                                .article-live-preview-content img.img-float-left,
                                .article-live-preview-content img[style*="float: left"] {
                                    float: left !important;
                                    margin: 0.25rem 1.75rem 1rem 0 !important;
                                    max-width: 100%;
                                    display: block !important;
                                }
                                .article-live-preview-content img.img-float-right,
                                .article-live-preview-content img[style*="float: right"] {
                                    float: right !important;
                                    margin: 0.25rem 0 1rem 1.75rem !important;
                                    max-width: 100%;
                                    display: block !important;
                                }
                                .article-live-preview-content p:has(> img.img-float-left),
                                .article-live-preview-content p:has(> img.img-float-right),
                                .article-live-preview-content p:has(> img[style*="float: left"]),
                                .article-live-preview-content p:has(> img[style*="float: right"]) {
                                    margin-bottom: 0 !important;
                                }
                                .article-live-preview-content p:has(> img.img-float-left) + *,
                                .article-live-preview-content p:has(> img.img-float-right) + *,
                                .article-live-preview-content img.img-float-left + *,
                                .article-live-preview-content img.img-float-right + * {
                                    margin-top: 0 !important;
                                }
                                .article-live-preview-content img.img-center-block,
                                .article-live-preview-content img[style*="margin-left: auto"][style*="margin-right: auto"],
                                .article-live-preview-content img[style*="margin: auto"],
                                .article-live-preview-content img[style*="20px auto"] {
                                    display: block !important;
                                    margin: 2rem auto !important;
                                    clear: both !important;
                                }
                                .article-live-preview-content img.img-full-width {
                                    width: 100% !important;
                                    display: block !important;
                                }
                                .article-live-preview-content img.img-rounded-lg {
                                    border-radius: 1.25rem !important;
                                }
                                .article-live-preview-content img.img-shadow-card {
                                    box-shadow: 0 16px 36px -10px rgba(0, 0, 0, 0.2) !important;
                                }
                                .article-live-preview-content figure {
                                    margin: 1.5rem auto;
                                    text-align: center;
                                    max-width: 100%;
                                }
                                .article-live-preview-content figure.img-float-left,
                                .article-live-preview-content figure[style*="float: left"],
                                .article-live-preview-content figure:has(img.img-float-left) {
                                    float: left !important;
                                    margin: 0.5rem 1.75rem 1.25rem 0 !important;
                                    max-width: 100%;
                                    text-align: left !important;
                                }
                                .article-live-preview-content figure.img-float-right,
                                .article-live-preview-content figure[style*="float: right"],
                                .article-live-preview-content figure:has(img.img-float-right) {
                                    float: right !important;
                                    margin: 0.5rem 0 1.25rem 1.75rem !important;
                                    max-width: 100%;
                                    text-align: right !important;
                                }
                                .article-live-preview-content figure.img-center-block,
                                .article-live-preview-content figure[style*="margin: 20px auto"] {
                                    display: block !important;
                                    margin: 2rem auto !important;
                                    text-align: center !important;
                                    clear: both !important;
                                }
                                .article-live-preview-content figure img {
                                    margin: 0 auto;
                                    display: inline-block;
                                }
                                .article-live-preview-content figcaption {
                                    margin-top: 0.65rem;
                                    font-size: 0.85rem;
                                    color: #64748b;
                                    font-style: italic;
                                    text-align: center;
                                }
                                .article-live-preview-content::after {
                                    content: "";
                                    display: table;
                                    clear: both;
                                }
                            </style>
                            <div class="article-live-preview-wrapper">
                                <h1 class="article-preview-title">${title}</h1>
                                ${bannerHtml}
                                <div class="article-live-preview-content">${content}</div>
                            </div>
                        `;
                        
                        editor.windowManager.open({
                            title: '100% Exact Live Preview (Title + Banner + Formatted Content)',
                            size: 'large',
                            body: {
                                type: 'panel',
                                items: [
                                    {
                                        type: 'htmlpanel',
                                        html: html
                                    }
                                ]
                            },
                            buttons: [
                                {
                                    type: 'cancel',
                                    text: 'Close Preview'
                                }
                            ]
                        });
                    }
                });

                // Register Custom Toolbar Button for Direct Computer Image Upload
                editor.ui.registry.addButton('upload_image_btn', {
                    icon: 'image',
                    text: 'Upload Image',
                    tooltip: 'Directly upload image from computer into article',
                    onAction: () => {
                        triggerDirectImageUpload(editor.id);
                    }
                });

                // Free-Line Button on Main Toolbar: Insert a free typing line anywhere
                editor.ui.registry.addButton('add_free_line', {
                    text: '✍️ Add Line Here',
                    tooltip: 'Insert a new typing line at cursor position to write freely',
                    onAction: () => {
                        const body = editor.getBody();
                        const selNode = editor.selection.getNode();
                        const currentBlock = (selNode && selNode !== body) ? (editor.dom.getParent(selNode, editor.dom.isBlock) || selNode) : null;
                        const newP = editor.dom.create('p', {}, '<br data-mce-bogus="1">');
                        if (currentBlock && currentBlock.parentNode) {
                            editor.dom.insertAfter(newP, currentBlock);
                        } else {
                            body.appendChild(newP);
                        }
                        editor.selection.setCursorLocation(newP, 0);
                        editor.focus();
                        editor.save();
                    }
                });

                // Write Below Button on Main Toolbar: Instantly jump to end of article
                editor.ui.registry.addButton('write_below_btn', {
                    text: '⬇️ Type Below',
                    tooltip: 'Instantly add line at bottom of article and type freely',
                    onAction: () => {
                        const body = editor.getBody();
                        const newP = editor.dom.create('p', {}, '<br data-mce-bogus="1">');
                        body.appendChild(newP);
                        editor.selection.setCursorLocation(newP, 0);
                        editor.focus();
                        editor.save();
                    }
                });

                // Register Custom Toolbar Button for Free-Size Studio
                editor.ui.registry.addButton('free_size_image', {
                    text: '📐 Image Studio',
                    tooltip: 'Free-Size Image Sizing, Length/Width & Styling',
                    onAction: () => {
                        openImageStudioModal(editor.id);
                    }
                });

                // Contextual Toolbar Action: Type Above Image
                editor.ui.registry.addButton('quick_write_above', {
                    tooltip: 'Start typing above this image',
                    text: '✍️ Type Above',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        if (selected) {
                            const parent = editor.dom.getParent(selected, 'figure') || editor.dom.getParent(selected, 'p') || selected;
                            const newP = editor.dom.create('p', { style: 'clear: both;' }, '<br data-mce-bogus="1">');
                            parent.parentNode.insertBefore(newP, parent);
                            editor.selection.setCursorLocation(newP, 0);
                            editor.focus();
                            editor.save();
                            showAdminToast('Ready to type above image!', 'info');
                        }
                    }
                });

                // Contextual Toolbar Action: Type Below Image
                editor.ui.registry.addButton('quick_write_below', {
                    tooltip: 'Start typing below this image',
                    text: '✍️ Type Below',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        if (selected) {
                            const parent = editor.dom.getParent(selected, 'figure') || editor.dom.getParent(selected, 'p') || selected;
                            const newP = editor.dom.create('p', { style: 'clear: both;' }, '<br data-mce-bogus="1">');
                            editor.dom.insertAfter(newP, parent);
                            editor.selection.setCursorLocation(newP, 0);
                            editor.focus();
                            editor.save();
                            showAdminToast('Ready to type below image!', 'info');
                        }
                    }
                });

                // Register Main Toolbar Wrap Left (Type Right) Button
                editor.ui.registry.addButton('img_wrap_left', {
                    text: '✍️ Type Beside (Right)',
                    tooltip: 'Photo on Left, type beside it on the Right (बगल में लिखें)',
                    onAction: () => {
                        const sel = editor.selection.getNode();
                        const img = (sel && sel.nodeName.toLowerCase() === 'img') ? sel : (sel ? sel.querySelector('img') : null) || editor.dom.select('img')[0];
                        if (img) {
                            applyImageWrap(editor, img, 'float-left');
                        } else {
                            showAdminToast('Please select or insert an image first.', 'info');
                        }
                    }
                });

                // Register Main Toolbar Wrap Right (Type Left) Button
                editor.ui.registry.addButton('img_wrap_right', {
                    text: '✍️ Type Beside (Left)',
                    tooltip: 'Photo on Right, type beside it on the Left (बगल में लिखें)',
                    onAction: () => {
                        const sel = editor.selection.getNode();
                        const img = (sel && sel.nodeName.toLowerCase() === 'img') ? sel : (sel ? sel.querySelector('img') : null) || editor.dom.select('img')[0];
                        if (img) {
                            applyImageWrap(editor, img, 'float-right');
                        } else {
                            showAdminToast('Please select or insert an image first.', 'info');
                        }
                    }
                });

                // Register Main Toolbar Center Block Button
                editor.ui.registry.addButton('img_center', {
                    text: '🎯 Center Block',
                    tooltip: 'Center Image in Article (Block mode)',
                    onAction: () => {
                        const sel = editor.selection.getNode();
                        const img = (sel && sel.nodeName.toLowerCase() === 'img') ? sel : (sel ? sel.querySelector('img') : null) || editor.dom.select('img')[0];
                        if (img) {
                            applyImageWrap(editor, img, 'center');
                        } else {
                            showAdminToast('Please select or insert an image first.', 'info');
                        }
                    }
                });

                // Contextual Toolbar Action: Type Beside on Right
                editor.ui.registry.addButton('quick_write_beside_right', {
                    tooltip: 'Type Beside on Right side (फोटो बाईं तरफ, बगल में दाईं तरफ लिखें)',
                    text: '✍️ Type Right (बगल में)',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        const img = (selected && selected.nodeName.toLowerCase() === 'img') ? selected : (selected ? selected.querySelector('img') : null) || editor.dom.select('img')[0];
                        if (img) {
                            applyImageWrap(editor, img, 'float-left');
                        }
                    }
                });

                // Contextual Toolbar Action: Type Beside on Left
                editor.ui.registry.addButton('quick_write_beside_left', {
                    tooltip: 'Type Beside on Left side (फोटो दाईं तरफ, बगल में बाईं तरफ लिखें)',
                    text: '✍️ Type Left (बगल में)',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        const img = (selected && selected.nodeName.toLowerCase() === 'img') ? selected : (selected ? selected.querySelector('img') : null) || editor.dom.select('img')[0];
                        if (img) {
                            applyImageWrap(editor, img, 'float-right');
                        }
                    }
                });

                // 1. Move to Center of Width (पूरा पेज - Full Page Center)
                editor.ui.registry.addButton('quick_img_center', {
                    tooltip: 'Full Page Center (पूरा पेज - No text wrap beside image)',
                    text: '🎯 Full Page (Center)',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        const img = (selected && selected.nodeName.toLowerCase() === 'img') ? selected : (selected ? selected.querySelector('img') : null) || editor.dom.select('img')[0];
                        if (img) {
                            applyImageWrap(editor, img, 'center');
                        }
                    }
                });

                // 2. Move Up along Length of Article (लंबाई में ऊपर ले जाएं)
                editor.ui.registry.addButton('quick_img_up', {
                    tooltip: 'Move Up in Article (लंबाई में ऊपर ले जाएं)',
                    text: '⬆️ Up',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        if (selected && selected.nodeName.toLowerCase() === 'img') {
                            const parent = editor.dom.getParent(selected, 'figure') || editor.dom.getParent(selected, 'p') || selected;
                            const prev = parent.previousElementSibling;
                            if (prev) {
                                parent.parentNode.insertBefore(parent, prev);
                                editor.selection.select(selected);
                                editor.save();
                                showAdminToast('Image moved UP along length of article!', 'success');
                            } else {
                                showAdminToast('Image is already at the very top of article!', 'info');
                            }
                        }
                    }
                });

                // 3. Move Down along Length of Article (लंबाई में नीचे ले जाएं)
                editor.ui.registry.addButton('quick_img_down', {
                    tooltip: 'Move Down in Article (लंबाई में नीचे ले जाएं)',
                    text: '⬇️ Down',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        if (selected && selected.nodeName.toLowerCase() === 'img') {
                            const parent = editor.dom.getParent(selected, 'figure') || editor.dom.getParent(selected, 'p') || selected;
                            const next = parent.nextElementSibling;
                            if (next) {
                                parent.parentNode.insertBefore(next, parent);
                                editor.selection.select(selected);
                                editor.save();
                                showAdminToast('Image moved DOWN along length of article!', 'success');
                            } else {
                                showAdminToast('Image is already at the very bottom of article!', 'info');
                            }
                        }
                    }
                });

                // Quick Direct Height & Width Adjustment Buttons: Lamba / Chota / Chauda / Patla
                editor.ui.registry.addButton('quick_img_taller', {
                    tooltip: 'Make Taller (लंबाई बढ़ाएं / Lamba)',
                    text: '↕️ Lamba (+)',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        const img = (selected && selected.nodeName.toLowerCase() === 'img') ? selected : (selected ? selected.querySelector('img') : null);
                        if (img) {
                            adjustImageDimension(editor, img, 'height', 40);
                        } else {
                            showAdminToast('Please click on the image first.', 'info');
                        }
                    }
                });

                editor.ui.registry.addButton('quick_img_shorter', {
                    tooltip: 'Make Shorter (लंबाई घटाएं / Chota)',
                    text: '↕️ Chota (-)',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        const img = (selected && selected.nodeName.toLowerCase() === 'img') ? selected : (selected ? selected.querySelector('img') : null);
                        if (img) {
                            adjustImageDimension(editor, img, 'height', -40);
                        } else {
                            showAdminToast('Please click on the image first.', 'info');
                        }
                    }
                });

                editor.ui.registry.addButton('quick_img_wider', {
                    tooltip: 'Make Wider (चौड़ाई बढ़ाएं / Chauda)',
                    text: '↔️ Chauda (+)',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        const img = (selected && selected.nodeName.toLowerCase() === 'img') ? selected : (selected ? selected.querySelector('img') : null);
                        if (img) {
                            adjustImageDimension(editor, img, 'width', 50);
                        } else {
                            showAdminToast('Please click on the image first.', 'info');
                        }
                    }
                });

                editor.ui.registry.addButton('quick_img_narrower', {
                    tooltip: 'Make Narrower (चौड़ाई घटाएं / Patla)',
                    text: '↔️ Patla (-)',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        const img = (selected && selected.nodeName.toLowerCase() === 'img') ? selected : (selected ? selected.querySelector('img') : null);
                        if (img) {
                            adjustImageDimension(editor, img, 'width', -50);
                        } else {
                            showAdminToast('Please click on the image first.', 'info');
                        }
                    }
                });

                // 4. Vertical Spacing / Margin (लंबाई के बीच में स्पेस/गैप)
                editor.ui.registry.addButton('quick_img_vspacing', {
                    tooltip: 'Vertical Gap / Spacing (लंबाई के बीच में गैप)',
                    text: '↕️ Spacing',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        if (selected && selected.nodeName.toLowerCase() === 'img') {
                            const currentV = selected.style.marginTop || '24px';
                            const newV = prompt('Enter Vertical Gap / Margin between text (e.g. 16px, 24px, 36px, 50px):', currentV);
                            if (newV && newV.trim()) {
                                const formattedV = newV.includes('px') ? newV.trim() : newV.trim() + 'px';
                                selected.style.marginTop = formattedV;
                                selected.style.marginBottom = formattedV;
                                editor.save();
                                showAdminToast('Vertical spacing set to ' + formattedV, 'success');
                            }
                        }
                    }
                });

                // 5. Quick Breadth & Length on Contextual Toolbar
                editor.ui.registry.addButton('quick_img_breadth', {
                    tooltip: 'Adjust Breadth / Width (चौड़ाई)',
                    text: '↔️ Breadth',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        if (selected && selected.nodeName.toLowerCase() === 'img') {
                            const currentW = selected.style.width || selected.getAttribute('width') || '350px';
                            const newW = prompt('Enter Image Breadth / Width (e.g. 100%, 75%, 50%, 600px, 400px):', currentW);
                            if (newW && newW.trim()) {
                                const formattedW = newW.includes('%') || newW.includes('px') ? newW.trim() : newW.trim() + 'px';
                                selected.style.width = formattedW;
                                selected.style.height = 'auto';
                                selected.setAttribute('width', formattedW);
                                selected.removeAttribute('height');
                                editor.save();
                                showAdminToast('Breadth set to ' + formattedW, 'success');
                            }
                        }
                    }
                });

                editor.ui.registry.addButton('quick_img_length', {
                    tooltip: 'Adjust Length / Height (लंबाई)',
                    text: '↕️ Length',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        if (selected && selected.nodeName.toLowerCase() === 'img') {
                            const currentH = selected.style.height || selected.getAttribute('height') || 'auto';
                            const newH = prompt('Enter Image Length / Height (e.g. auto, 180px, 260px, 360px, 500px):', currentH);
                            if (newH && newH.trim()) {
                                const formattedH = (newH.trim() === 'auto' || newH.includes('px')) ? newH.trim() : newH.trim() + 'px';
                                if (formattedH === 'auto') {
                                    selected.style.height = 'auto';
                                    selected.removeAttribute('height');
                                } else {
                                    selected.style.height = formattedH;
                                    selected.style.removeProperty('object-fit');
                                    selected.setAttribute('height', formattedH);
                                }
                                editor.save();
                                showAdminToast('Length set to ' + formattedH, 'success');
                            }
                        }
                    }
                });

                // Contextual Toolbar Action: Safely Delete Image
                editor.ui.registry.addButton('quick_img_delete', {
                    tooltip: 'Safely Delete this image',
                    text: '🗑️ Delete Image',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        if (selected && (selected.nodeName.toLowerCase() === 'img' || selected.querySelector('img'))) {
                            const parent = editor.dom.getParent(selected, 'figure') || (selected.parentElement && selected.parentElement.nodeName.toLowerCase() === 'p' && selected.parentElement.children.length === 1 ? selected.parentElement : null);
                            if (parent) {
                                parent.remove();
                            } else {
                                selected.remove();
                            }
                            editor.save();
                            updateEditorMetrics(editor);
                            showAdminToast('Image removed.', 'info');
                        }
                    }
                });

                // Contextual Toolbar on Image Selection
                editor.ui.registry.addContextToolbar('image-free-size-toolbar', {
                    predicate: (node) => node.nodeName.toLowerCase() === 'img',
                    items: 'quick_write_beside_right quick_write_beside_left quick_img_center | quick_img_taller quick_img_shorter quick_img_wider quick_img_narrower free_size_image | quick_write_below quick_img_delete',
                    position: 'node',
                    scope: 'node'
                });

                // -------------------------------------------------------------
                // Backspace & Enter Image Protection: Text flows freely, images stay locked!
                // -------------------------------------------------------------
                editor.on('keydown', function (e) {
                    // Enter Protection: If an image is selected, cleanly insert a typing line without moving or displacing the image
                    if (e.key === 'Enter') {
                        const selectedNode = editor.selection.getNode();
                        if (selectedNode && selectedNode.nodeName.toLowerCase() === 'img') {
                            e.preventDefault();
                            e.stopPropagation();
                            const isFloated = selectedNode.style.float === 'left' || selectedNode.style.float === 'right' || selectedNode.classList.contains('img-float-left') || selectedNode.classList.contains('img-float-right');
                            const parent = editor.dom.getParent(selectedNode, 'p') || editor.dom.getParent(selectedNode, 'figure') || selectedNode;
                            let nextP = parent.nextElementSibling;
                            if (!nextP || nextP.nodeName.toLowerCase() !== 'p') {
                                nextP = editor.dom.create('p', { style: isFloated ? 'clear: none;' : 'clear: both;' }, '<br data-mce-bogus="1">');
                                editor.dom.insertAfter(nextP, parent);
                            } else if (isFloated) {
                                nextP.style.clear = 'none';
                            }
                            editor.selection.setCursorLocation(nextP, 0);
                            editor.focus();
                            return false;
                        }
                    }
                    if (e.key === 'Backspace') {
                        const selectedNode = editor.selection.getNode();

                        // 1. If an IMG node itself is directly selected, don't wipe it with Backspace!
                        if (selectedNode && selectedNode.nodeName.toLowerCase() === 'img') {
                            e.preventDefault();
                            e.stopPropagation();

                            // Deselect image and move cursor into a safe text paragraph below it
                            const parent = editor.dom.getParent(selectedNode, 'p') || editor.dom.getParent(selectedNode, 'figure') || selectedNode;
                            let nextP = parent.nextElementSibling;
                            if (!nextP || nextP.nodeName.toLowerCase() !== 'p') {
                                nextP = editor.dom.create('p', { style: 'clear: both;' }, '<br data-mce-bogus="1">');
                                editor.dom.insertAfter(nextP, parent);
                            }
                            editor.selection.setCursorLocation(nextP, 0);
                            editor.focus();

                            showAdminToast('Image preserved. Click 🗑️ Delete Image button to remove images.', 'info');
                            return false;
                        }

                        // 2. If caret is right against an image with no text in between, protect the image
                        const rng = editor.selection.getRng();
                        if (rng && rng.collapsed) {
                            let prevNode = null;
                            if (rng.startContainer.nodeType === Node.TEXT_NODE && rng.startOffset === 0) {
                                prevNode = rng.startContainer.previousSibling;
                            } else if (rng.startContainer.nodeType === Node.ELEMENT_NODE && rng.startOffset > 0) {
                                prevNode = rng.startContainer.childNodes[rng.startOffset - 1] || null;
                            }

                            if (prevNode && (prevNode.nodeName && prevNode.nodeName.toLowerCase() === 'img')) {
                                e.preventDefault();
                                e.stopPropagation();
                                showAdminToast('Image preserved.', 'info');
                                return false;
                            }
                        }

                        // For ALL other cases (typing text, deleting letters, words, sentences):
                        // Never call preventDefault! Let browser delete text freely and natively!
                    }
                });

                // -------------------------------------------------------------
                // Mouse Drag & Selection Guardian: Protects mouse selections!
                // -------------------------------------------------------------
                let isMouseDragging = false;
                let mouseDownX = 0;
                let mouseDownY = 0;

                editor.on('mousedown', function (e) {
                    mouseDownX = e.clientX;
                    mouseDownY = e.clientY;
                    isMouseDragging = false;
                });

                editor.on('mousemove', function (e) {
                    if (e.buttons === 1) { // Left mouse button dragged
                        const distX = Math.abs(e.clientX - mouseDownX);
                        const distY = Math.abs(e.clientY - mouseDownY);
                        if (distX > 3 || distY > 3) {
                            isMouseDragging = true;
                        }
                    }
                });

                editor.on('mouseup', function (e) {
                    setTimeout(() => {
                        isMouseDragging = false;
                    }, 150);
                });

                // -------------------------------------------------------------
                // Free Pointer Placement: Click beside any image to write beside it instantly!
                // -------------------------------------------------------------
                editor.on('click', function (e) {
                    // CRITICAL: If user dragged mouse to select, OR if any content is selected:
                    // NEVER touch or collapse the selection!
                    if (isMouseDragging || !editor.selection.isCollapsed()) {
                        return;
                    }

                    const target = e.target;
                    const body = editor.getBody();

                    // If user clicked directly on an IMG node, let TinyMCE handle image selection and toolbar
                    if (target && target.nodeName.toLowerCase() === 'img') {
                        return;
                    }

                    // Regular click on empty canvas / bottom whitespace
                    if (target === body || target.nodeName.toLowerCase() === 'html') {
                        const lastChild = body.lastElementChild;
                        if (!lastChild) {
                            const p = editor.dom.create('p', {}, '<br data-mce-bogus="1">');
                            body.appendChild(p);
                            editor.selection.setCursorLocation(p, 0);
                        } else if (lastChild.nodeName.toLowerCase() === 'img' || (lastChild.nodeName.toLowerCase() === 'p' && lastChild.querySelector('img') && !lastChild.textContent.trim()) || lastChild.nodeName.toLowerCase() === 'figure') {
                            const p = editor.dom.create('p', { style: 'clear: both;' }, '<br data-mce-bogus="1">');
                            body.appendChild(p);
                            editor.selection.setCursorLocation(p, 0);
                        } else if (lastChild.nodeName.toLowerCase() === 'p') {
                            editor.selection.setCursorLocation(lastChild, lastChild.childNodes.length);
                        } else {
                            const p = editor.dom.create('p', { style: 'clear: both;' }, '<br data-mce-bogus="1">');
                            body.appendChild(p);
                            editor.selection.setCursorLocation(p, 0);
                        }
                        editor.focus();
                    }
                });

                // Double click on blank canvas guarantees a fresh line at cursor
                editor.on('dblclick', function (e) {
                    if (e.target && e.target.nodeName.toLowerCase() === 'img') {
                        openImageStudioModal(editor.id, e.target);
                    } else if (!editor.selection.isCollapsed()) {
                        return; // Leave word or text selected!
                    } else if (e.target === editor.getBody() || e.target.nodeName.toLowerCase() === 'html') {
                        const p = editor.dom.create('p', { style: 'clear: both;' }, '<br data-mce-bogus="1">');
                        editor.getBody().appendChild(p);
                        editor.selection.setCursorLocation(p, 0);
                        editor.focus();
                    }
                });

                // Strip out any previously applied object-fit: cover and unlock resize constraints
                editor.on('init SetContent', function () {
                    const imgs = editor.dom.select('img');
                    imgs.forEach(img => {
                        if (img.style.objectFit === 'cover') {
                            img.style.removeProperty('object-fit');
                        }
                        // Remove any !important or max-width locks that freeze resizing
                        img.style.removeProperty('max-width');
                        const curW = img.style.getPropertyValue('width');
                        const curH = img.style.getPropertyValue('height');
                        img.style.removeProperty('width');
                        img.style.removeProperty('height');
                        if (curW) img.style.width = curW;
                        if (curH && curH !== 'auto') img.style.height = curH;
                        else img.style.height = 'auto';

                        // If image has figure wrapper without caption, unwrap for clean native 8-point resizing
                        const parentFigure = editor.dom.getParent(img, 'figure');
                        if (parentFigure && !parentFigure.querySelector('figcaption')) {
                            editor.dom.replace(img, parentFigure);
                        }
                    });
                });

                // Live Word Count & Reading Time Tracker
                editor.on('input change keyup NodeChange', function () {
                    editor.save();
                    updateEditorMetrics(editor);
                });
            }
        });
    }

    // -------------------------------------------------------------------------
    // 2. Title & Slug Auto-Sync Engine
    // -------------------------------------------------------------------------
    const createTitleInput = document.getElementById('create-blog-title');
    const createSlugInput = document.getElementById('create-blog-slug');
    const toggleSlugBtn = document.getElementById('toggleSlugLockBtn');

    if (createTitleInput && createSlugInput) {
        createTitleInput.addEventListener('input', () => {
            const val = createTitleInput.value;
            // Update Title Char Count
            const charCountEl = document.getElementById('create-title-count');
            if (charCountEl) charCountEl.innerText = `${val.length} / 70 chars`;

            // Auto-Generate Slug if unlocked
            if (autoSlugEnabled) {
                createSlugInput.value = generateSlug(val);
            }
            updateSeoPreview();
        });

        createSlugInput.addEventListener('input', () => {
            updateSeoPreview();
        });

        if (toggleSlugBtn) {
            toggleSlugBtn.addEventListener('click', () => {
                autoSlugEnabled = !autoSlugEnabled;
                const icon = document.getElementById('slugLockIcon');
                const text = document.getElementById('slugLockText');
                if (autoSlugEnabled) {
                    icon.className = 'fa-solid fa-lock text-[9px]';
                    text.innerText = 'Auto-Synced';
                    createSlugInput.value = generateSlug(createTitleInput.value);
                } else {
                    icon.className = 'fa-solid fa-lock-open text-[9px]';
                    text.innerText = 'Custom Slug';
                }
                updateSeoPreview();
            });
        }
    }

    // Edit Modal Slug Listener
    const editTitleInput = document.getElementById('edit-blog-title');
    const editSlugInput = document.getElementById('edit-blog-slug');
    if (editTitleInput && editSlugInput) {
        editTitleInput.addEventListener('input', () => {
            const charCountEl = document.getElementById('edit-title-count');
            if (charCountEl) charCountEl.innerText = `${editTitleInput.value.length} / 70 chars`;
            updateEditSeoPreview();
        });
        editSlugInput.addEventListener('input', updateEditSeoPreview);
    }

    // Form Submissions Validation
    const createForm = document.getElementById('createBlogForm');
    if (createForm) {
        createForm.addEventListener('submit', function(e) {
            if (typeof tinymce !== 'undefined' && tinymce.get('create-blog-content')) {
                tinymce.get('create-blog-content').save();
            }
            const editor = typeof tinymce !== 'undefined' ? tinymce.get('create-blog-content') : null;
            const content = document.getElementById('create-blog-content').value;
            const textContent = editor ? editor.getContent({ format: 'text' }).trim() : content.trim();
            const hasImages = content.includes('<img');

            if (!textContent && !hasImages) {
                alert('Kripya article me kuch content ya image likhein!');
                e.preventDefault();
                return false;
            }

            const btn = document.getElementById('publishBlogSubmitBtn');
            const btnText = document.getElementById('publishBlogSubmitBtnText');
            const btnIcon = document.getElementById('publishBlogSubmitIcon');
            if (btn && btnText) {
                btn.style.opacity = '0.75';
                btn.style.pointerEvents = 'none';
                btnText.innerText = 'Publishing Article... Please wait...';
                if (btnIcon) btnIcon.className = 'fa-solid fa-spinner fa-spin mr-1';
            }
        });
    }

    const editForm = document.getElementById('editBlogForm');
    if (editForm) {
        editForm.addEventListener('submit', function(e) {
            if (typeof tinymce !== 'undefined' && tinymce.get('edit-blog-content-input')) {
                tinymce.get('edit-blog-content-input').save();
            }
            const editor = typeof tinymce !== 'undefined' ? tinymce.get('edit-blog-content-input') : null;
            const content = document.getElementById('edit-blog-content-input').value;
            const textContent = editor ? editor.getContent({ format: 'text' }).trim() : content.trim();
            const hasImages = content.includes('<img');

            if (!textContent && !hasImages) {
                alert('Kripya article me kuch content ya image likhein!');
                e.preventDefault();
                return false;
            }

            const btn = editForm.querySelector('button[type="submit"]');
            if (btn) {
                btn.style.opacity = '0.75';
                btn.style.pointerEvents = 'none';
                btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-1"></i> Updating article...';
            }
        });
    }

    // Initialize Title Styles
    applyTitleStyles('create');
});

// Helper: Slug Generator
function generateSlug(text) {
    return text.toString().toLowerCase()
        .replace(/\s+/g, '-')
        .replace(/[^\w\-]+/g, '')
        .replace(/\-\-+/g, '-')
        .replace(/^-+/, '')
        .replace(/-+$/, '');
}

// Helper: Inject Topic Tag into Title
function injectTopicTag(tag) {
    const titleInput = document.getElementById('create-blog-title');
    if (!titleInput) return;
    if (titleInput.value.trim().length === 0) {
        titleInput.value = `${tag}: `;
    } else {
        titleInput.value = `[${tag}] ${titleInput.value}`;
    }
    titleInput.dispatchEvent(new Event('input'));
    titleInput.focus();
}

// -----------------------------------------------------------------------------
// 3. Editor Metrics (Words & Reading Time) & SEO Preview
// -----------------------------------------------------------------------------
function updateEditorMetrics(editor) {
    const content = editor.getContent({ format: 'text' }) || '';
    const words = content.trim().split(/\s+/).filter(Boolean).length;
    const readMinutes = Math.max(1, Math.ceil(words / 200));

    const isCreate = editor.id === 'create-blog-content';
    const wordBadge = document.getElementById(isCreate ? 'create-editor-word-count' : 'edit-editor-word-count');
    const readBadge = document.getElementById(isCreate ? 'create-editor-read-time' : 'edit-editor-read-time');

    if (wordBadge) wordBadge.innerHTML = `<i class="fa-regular fa-file-lines mr-1 text-slate-400"></i> ${words} words`;
    if (readBadge) readBadge.innerHTML = `<i class="fa-regular fa-clock mr-1"></i> ~${readMinutes} min read`;

    if (isCreate) updateSeoPreview();
    else updateEditSeoPreview();
}

function updateSeoPreview() {
    const title = document.getElementById('create-blog-title')?.value || 'Article Title Preview Goes Here';
    const slug = document.getElementById('create-blog-slug')?.value || 'article-slug';
    
    let text = '';
    if (typeof tinymce !== 'undefined' && tinymce.get('create-blog-content')) {
        text = tinymce.get('create-blog-content').getContent({ format: 'text' }) || '';
    }
    text = text.trim() ? text.substring(0, 155) + '...' : 'Provide valuable technical insights and guides to students. Content snippet will automatically generate here...';

    const seoTitle = document.getElementById('seoTitlePreview');
    const seoSlug = document.getElementById('seoSlugPreview');
    const seoSnippet = document.getElementById('seoSnippetPreview');

    if (seoTitle) seoTitle.innerText = title;
    if (seoSlug) seoSlug.innerText = slug;
    if (seoSnippet) seoSnippet.innerText = text;
}

function updateEditSeoPreview() {
    const title = document.getElementById('edit-blog-title')?.value || 'Title';
    const slug = document.getElementById('edit-blog-slug')?.value || 'slug';
    let text = '';
    if (typeof tinymce !== 'undefined' && tinymce.get('edit-blog-content-input')) {
        text = tinymce.get('edit-blog-content-input').getContent({ format: 'text' }) || '';
    }
    text = text.trim() ? text.substring(0, 150) + '...' : 'Article content excerpt';

    const seoTitle = document.getElementById('editSeoTitlePreview');
    const seoSlug = document.getElementById('editSeoSlugPreview');
    const seoSnippet = document.getElementById('editSeoSnippetPreview');

    if (seoTitle) seoTitle.innerText = title;
    if (seoSlug) seoSlug.innerText = slug;
    if (seoSnippet) seoSnippet.innerText = text;
}

// -----------------------------------------------------------------------------
// 4. Cover Image Studio Handler (Dimensions, Aspect Ratio & Height Preview)
// -----------------------------------------------------------------------------
function handleCoverImageSelect(e, type) {
    const input = e.target;
    if (!input.files || !input.files[0]) return;
    const file = input.files[0];

    const reader = new FileReader();
    reader.onload = function(event) {
        const dataUrl = event.target.result;
        const img = new Image();
        img.onload = function() {
            const width = img.naturalWidth;
            const height = img.naturalHeight;
            const sizeKB = (file.size / 1024).toFixed(1);

            // Calculate ratio
            let ratioText = 'Custom';
            const ratio = width / height;
            if (ratio >= 1.7 && ratio <= 1.85) ratioText = '16:9 Banner';
            else if (ratio >= 1.3 && ratio <= 1.4) ratioText = '4:3 Standard';
            else if (ratio >= 0.95 && ratio <= 1.05) ratioText = '1:1 Square';
            else if (ratio > 2.0) ratioText = '21:9 Ultrawide';

            if (type === 'create') {
                document.getElementById('createCoverEmptyState').classList.add('hidden');
                
                const hint = document.getElementById('createCoverChangeHint');
                if (hint) hint.classList.remove('hidden');
                
                const placeholder = document.getElementById('createCoverPreviewPlaceholder');
                if (placeholder) placeholder.classList.add('hidden');
                
                document.getElementById('createCoverPreviewBox').classList.remove('hidden');
                document.getElementById('createCoverPreviewImg').src = dataUrl;
                document.getElementById('createCoverDimensions').innerText = `${width} \u00d7 ${height} px`;
                document.getElementById('createCoverRatio').innerText = ratioText;
                document.getElementById('createCoverSize').innerText = `${sizeKB} KB`;
            } else {
                document.getElementById('editCoverPreviewImg').src = dataUrl;
                document.getElementById('editCoverDimensions').innerText = `${width} \u00d7 ${height} px (${ratioText})`;
            }
        };
        img.src = dataUrl;
    };
    reader.readAsDataURL(file);
}

function clearCoverImage(type) {
    if (type === 'create') {
        const input = document.getElementById('createCoverInput');
        if (input) input.value = '';
        document.getElementById('createCoverPreviewBox').classList.add('hidden');
        
        const placeholder = document.getElementById('createCoverPreviewPlaceholder');
        if (placeholder) placeholder.classList.remove('hidden');
        
        document.getElementById('createCoverEmptyState').classList.remove('hidden');
        
        const hint = document.getElementById('createCoverChangeHint');
        if (hint) hint.classList.add('hidden');
        
        document.getElementById('createCoverPreviewImg').src = '';
    } else {
        const input = document.getElementById('editCoverInput');
        if (input) input.value = '';
        const previewImg = document.getElementById('editCoverPreviewImg');
        if (previewImg) previewImg.src = '/assets/images/default-blog.webp';
        const dims = document.getElementById('editCoverDimensions');
        if (dims) dims.innerText = 'Cover Image Cleared';
    }
}

function adjustCoverPreviewHeight(val, type) {
    const valText = `${val}px`;
    if (type === 'create') {
        const hVal = document.getElementById('createCoverHeightVal');
        const img = document.getElementById('createCoverPreviewImg');
        if (hVal) hVal.innerText = valText;
        if (img) img.style.maxHeight = valText;
    } else {
        const hVal = document.getElementById('editCoverHeightVal');
        const img = document.getElementById('editCoverPreviewImg');
        if (hVal) hVal.innerText = valText;
        if (img) img.style.maxHeight = valText;
    }
}

// -----------------------------------------------------------------------------
// Direct Computer Image Upload Engine (Native & Fast)
// -----------------------------------------------------------------------------
function triggerDirectImageUpload(editorId) {
    activeEditorId = editorId;
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.onchange = function(e) {
        const file = e.target.files && e.target.files[0];
        if (!file) return;
        uploadAndInsertImage(editorId, file);
    };
    fileInput.click();
}

function uploadAndInsertImage(editorId, file) {
    const editor = (typeof tinymce !== 'undefined') ? tinymce.get(editorId) : null;
    if (!editor) {
        alert('Editor is not loaded yet. Please wait a moment.');
        return;
    }

    showAdminToast('Uploading image from computer...', 'info');

    const formData = new FormData();
    formData.append('image', file);
    formData.append('file', file);
    formData.append('upload', file);
    formData.append('_token', "{{ csrf_token() }}");

    fetch('/admin/blogs/upload-image', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Accept': 'application/json'
        },
        body: formData,
        credentials: 'same-origin'
    })
    .then(res => {
        if (!res.ok) throw new Error('HTTP error ' + res.status);
        return res.json();
    })
    .then(data => {
        let imgUrl = data.url || data.location || data.relative_url;
        if (!imgUrl) throw new Error(data.error || 'Server did not return a valid image URL.');
        if (!imgUrl.startsWith('http://') && !imgUrl.startsWith('https://')) {
            imgUrl = window.location.origin + (imgUrl.startsWith('/') ? imgUrl : '/' + imgUrl);
        }

        const cleanAlt = file.name.replace(/\.[^/.]+$/, "").replace(/[_-]/g, " ");
        let imgHtml = `<img src="${imgUrl}" alt="${cleanAlt}" class="img-float-left" style="float: left; margin: 8px 24px 16px 0; width: 360px; height: auto; border-radius: 12px; display: block;" />`;
        
        editor.insertContent(imgHtml);
        editor.save();

        // Immediately focus into the paragraph beside the image so user can start typing right away
        const imgs = editor.dom.select('img[src="' + imgUrl + '"]');
        if (imgs.length > 0) {
            const insertedImg = imgs[imgs.length - 1];
            let nextPara = insertedImg.nextElementSibling;
            if (!nextPara || nextPara.nodeName.toLowerCase() !== 'p') {
                nextPara = editor.dom.create('p', {}, '<br data-mce-bogus="1">');
                editor.dom.insertAfter(nextPara, insertedImg);
            }
            editor.selection.setCursorLocation(nextPara, 0);
            editor.focus();
        }

        updateEditorMetrics(editor);
        showAdminToast('Photo placed on LEFT. Typing cursor is BESIDE it on the RIGHT!', 'success');
    })
    .catch(err => {
        console.error('Image upload failed:', err);
        showAdminToast('Upload failed: ' + err.message, 'error');
        alert('Image upload failed: ' + err.message);
    });
}

// Helper: Instantly create and focus a typing paragraph at the end of the editor
function insertTypingParagraphAtEnd(editorId) {
    const editor = (typeof tinymce !== 'undefined') ? tinymce.get(editorId) : null;
    if (!editor) return;
    const body = editor.getBody();
    const p = editor.dom.create('p', {}, '<br data-mce-bogus="1">');
    body.appendChild(p);
    editor.selection.setCursorLocation(p, 0);
    editor.focus();
    editor.save();
    showAdminToast('New line created at bottom! Start typing.', 'info');
}

// Helper: Instantly select all content in editor
function selectAllEditorContent(editorId) {
    const editor = (typeof tinymce !== 'undefined') ? tinymce.get(editorId) : null;
    if (!editor) return;
    editor.focus();
    editor.execCommand('SelectAll');
    showAdminToast('All content selected! (Press Backspace or Delete to remove)', 'info');
}

// Helper: Toggle between Standard Page View and Large Full-Width Editor Canvas
function toggleEditorCanvasSize(type) {
    const editorId = type === 'create' ? 'create-blog-content' : 'edit-blog-content-input';
    const btn = document.getElementById(type + 'EditorCanvasBtn');
    const btnText = document.getElementById(type + 'EditorCanvasText');
    const editor = (typeof tinymce !== 'undefined') ? tinymce.get(editorId) : null;
    if (!editor || !btn) return;

    const isLarge = btn.getAttribute('data-is-large') === 'true';
    const editorContainer = editor.getContainer();

    if (!isLarge) {
        btn.setAttribute('data-is-large', 'true');
        btn.classList.remove('bg-slate-100', 'text-slate-700');
        btn.classList.add('bg-indigo-600', 'text-white', 'shadow-md');
        if (btnText) btnText.innerText = 'Standard Page View';

        // Expand TinyMCE height to spacious 800px
        editor.theme.resizeTo('100%', 800);

        if (editorContainer) {
            editorContainer.style.boxShadow = '0 20px 40px -15px rgba(79, 70, 229, 0.2)';
            editorContainer.style.borderColor = '#6366f1';
        }
        showAdminToast('Editor page expanded to Large Canvas (800px)!', 'success');
    } else {
        btn.setAttribute('data-is-large', 'false');
        btn.classList.remove('bg-indigo-600', 'text-white', 'shadow-md');
        btn.classList.add('bg-slate-100', 'text-slate-700');
        if (btnText) btnText.innerText = 'Large Page View';

        editor.theme.resizeTo('100%', 520);

        if (editorContainer) {
            editorContainer.style.boxShadow = '';
            editorContainer.style.borderColor = '';
        }
        showAdminToast('Editor returned to Standard Page View (520px)', 'info');
    }
}

// -----------------------------------------------------------------------------
// Interactive Toast Notification System
// -----------------------------------------------------------------------------
function showAdminToast(message, type = 'success') {
    let container = document.getElementById('adminToastContainer');
    if (!container) {
        container = document.createElement('div');
        container.id = 'adminToastContainer';
        container.className = 'fixed top-5 right-5 z-[9999] flex flex-col gap-2 pointer-events-none';
        document.body.appendChild(container);
    }

    const toast = document.createElement('div');
    toast.className = `pointer-events-auto px-4 py-3 rounded-2xl text-xs font-bold shadow-xl border flex items-center gap-2.5 transition-all duration-300 transform translate-y-[-20px] opacity-0 ${
        type === 'success' ? 'bg-emerald-600 text-white border-emerald-500 shadow-emerald-950/20' :
        type === 'error' ? 'bg-rose-600 text-white border-rose-500 shadow-rose-950/20' :
        'bg-indigo-600 text-white border-indigo-500 shadow-indigo-950/20'
    }`;

    const icon = type === 'success' ? '<i class="fa-solid fa-circle-check text-sm"></i>' :
                 type === 'error' ? '<i class="fa-solid fa-triangle-exclamation text-sm"></i>' :
                 '<i class="fa-solid fa-spinner fa-spin text-sm"></i>';

    toast.innerHTML = `${icon} <span>${message}</span>`;
    container.appendChild(toast);

    // Animate in
    requestAnimationFrame(() => {
        toast.classList.remove('translate-y-[-20px]', 'opacity-0');
        toast.classList.add('translate-y-0', 'opacity-100');
    });

    // Remove after 3.5s
    setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-y-[-10px]');
        setTimeout(() => toast.remove(), 300);
    }, 3500);
}

// -----------------------------------------------------------------------------
// Helper: Handle Edit Blog Click cleanly from data-blog
// -----------------------------------------------------------------------------
function handleEditBlogClick(btn) {
    try {
        const blogData = JSON.parse(btn.getAttribute('data-blog'));
        openEditBlogModal(blogData);
    } catch (e) {
        console.error('Failed to parse blog data for edit:', e);
    }
}

// -----------------------------------------------------------------------------
// 5. Free-Size Image Studio Modal Engine
// -----------------------------------------------------------------------------
function openImageStudioModal(editorId, specificNode = null) {
    activeEditorId = editorId;
    const editor = tinymce.get(editorId);
    if (!editor) return;

    // Detect selected image
    let imgNode = specificNode;
    if (!imgNode) {
        const selectedNode = editor.selection.getNode();
        if (selectedNode && selectedNode.nodeName.toLowerCase() === 'img') {
            imgNode = selectedNode;
        } else {
            // Find first image in editor or prompt to select
            const images = editor.dom.select('img');
            if (images.length > 0) {
                imgNode = images[0];
            }
        }
    }

    if (!imgNode) {
        alert('Please insert or select an image inside the editor first to adjust its dimensions!');
        editor.execCommand('mceImage');
        return;
    }

    targetStudioImageNode = imgNode;

    // Populate Studio Preview & Dimensions
    const previewImg = document.getElementById('studioPreviewImg');
    previewImg.src = imgNode.src;

    // Measure natural dimensions
    studioOriginalWidth = imgNode.naturalWidth || parseInt(imgNode.getAttribute('width')) || 800;
    studioOriginalHeight = imgNode.naturalHeight || parseInt(imgNode.getAttribute('height')) || 450;

    document.getElementById('studioNaturalBadge').innerText = `Natural: ${studioOriginalWidth} \u00d7 ${studioOriginalHeight} px`;
    const aspect = (studioOriginalWidth / studioOriginalHeight).toFixed(2);
    document.getElementById('studioAspectDisplay').innerText = `${studioOriginalWidth} : ${studioOriginalHeight} (${aspect})`;

    // Check current styles on image
    let currentWidth = imgNode.style.width || imgNode.getAttribute('width') || '100%';
    let currentHeight = imgNode.style.height || imgNode.getAttribute('height') || 'auto';

    if (currentWidth.endsWith('%')) {
        document.getElementById('studioWidthUnit').value = '%';
        document.getElementById('studioWidthInput').value = parseInt(currentWidth);
    } else {
        document.getElementById('studioWidthUnit').value = 'px';
        document.getElementById('studioWidthInput').value = parseInt(currentWidth) || studioOriginalWidth;
    }

    if (currentHeight.endsWith('px')) {
        document.getElementById('studioHeightUnit').value = 'px';
        document.getElementById('studioHeightInput').value = parseInt(currentHeight);
    } else {
        document.getElementById('studioHeightUnit').value = 'auto';
        document.getElementById('studioHeightInput').value = 'auto';
    }

    // Alignment detection
    const isFloatLeft = imgNode.classList.contains('img-float-left') || imgNode.style.float === 'left';
    const isFloatRight = imgNode.classList.contains('img-float-right') || imgNode.style.float === 'right';
    const isCenter = imgNode.classList.contains('img-center-block') || (imgNode.style.marginLeft === 'auto' && imgNode.style.marginRight === 'auto');

    if (isFloatLeft) setStudioAlign('float-left');
    else if (isFloatRight) setStudioAlign('float-right');
    else if (isCenter) setStudioAlign('center');
    else setStudioAlign('inline');

    // Alt & Caption
    document.getElementById('studioAltInput').value = imgNode.getAttribute('alt') || '';
    
    // Check if wrapped in figure
    const parentFigure = editor.dom.getParent(imgNode, 'figure');
    if (parentFigure) {
        const caption = parentFigure.querySelector('figcaption');
        document.getElementById('studioCaptionInput').value = caption ? caption.innerText : '';
    } else {
        document.getElementById('studioCaptionInput').value = '';
    }

    // Set Free-Size mode (unlocked ratio) by default for independent length and breadth resizing
    const lockEl = document.getElementById('studioLockRatio');
    if (lockEl) {
        lockEl.checked = false;
        toggleStudioRatioLock();
    }

    if (imgNode.style.objectFit && imgNode.style.objectFit !== 'cover') {
        const fitSelect = document.getElementById('studioObjectFit');
        if (fitSelect) fitSelect.value = imgNode.style.objectFit;
    } else {
        const fitSelect = document.getElementById('studioObjectFit');
        if (fitSelect) fitSelect.value = 'fill';
    }

    // Detect and populate Object Position (Focal point within frame)
    if (imgNode.style.objectPosition) {
        const parts = imgNode.style.objectPosition.split(' ');
        if (parts.length >= 2) {
            document.getElementById('studioObjectPosX').value = parts[0];
            document.getElementById('studioObjectPosY').value = parts[1];
        } else if (parts.length === 1) {
            document.getElementById('studioObjectPosX').value = parts[0];
        }
    } else {
        document.getElementById('studioObjectPosX').value = 'center';
        document.getElementById('studioObjectPosY').value = 'center';
    }

    // Detect and populate Vertical Margin (Length Spacing)
    const currentMarginTop = parseInt(imgNode.style.marginTop) || 24;
    const vMarginSlider = document.getElementById('studioMarginVerticalSlider');
    if (vMarginSlider) vMarginSlider.value = currentMarginTop;
    const vMarginText = document.getElementById('studioMarginValText');
    if (vMarginText) vMarginText.innerText = `${currentMarginTop}px`;
    const vSpacingBadge = document.getElementById('studioVSpacingBadge');
    if (vSpacingBadge) vSpacingBadge.innerText = `${currentMarginTop}px Gap`;

    // Sync sliders
    const widthSlider = document.getElementById('studioWidthSlider');
    if (widthSlider) {
        if (currentWidth.endsWith('px')) {
            widthSlider.value = Math.min(1200, Math.max(50, parseInt(currentWidth) || studioOriginalWidth));
        } else {
            widthSlider.value = Math.min(1200, Math.max(50, studioOriginalWidth));
        }
    }
    const heightSlider = document.getElementById('studioHeightSlider');
    if (heightSlider) {
        if (currentHeight.endsWith('px')) {
            heightSlider.value = Math.min(850, Math.max(80, parseInt(currentHeight) || studioOriginalHeight));
        } else {
            heightSlider.value = Math.min(850, Math.max(80, studioOriginalHeight));
        }
    }

    updateStudioPreviewOutput();
    document.getElementById('imageResizeStudioModal').classList.remove('hidden');
}

function closeImageStudioModal() {
    document.getElementById('imageResizeStudioModal').classList.add('hidden');
    targetStudioImageNode = null;
}

// Move Image Up or Down along the article length
function moveStudioImage(direction) {
    if (!targetStudioImageNode) return;
    const editor = tinymce.get(activeEditorId);
    if (!editor) return;

    const parent = editor.dom.getParent(targetStudioImageNode, 'figure') || editor.dom.getParent(targetStudioImageNode, 'p') || targetStudioImageNode;
    if (direction === 'up') {
        const prev = parent.previousElementSibling;
        if (prev) {
            parent.parentNode.insertBefore(parent, prev);
            editor.save();
            showAdminToast('Image moved UP along length of article!', 'success');
        } else {
            showAdminToast('Image is already at the very top of article!', 'info');
        }
    } else if (direction === 'down') {
        const next = parent.nextElementSibling;
        if (next) {
            parent.parentNode.insertBefore(next, parent);
            editor.save();
            showAdminToast('Image moved DOWN along length of article!', 'success');
        } else {
            showAdminToast('Image is already at the very bottom of article!', 'info');
        }
    }
}

// Vertical Spacing / Margin Handlers
function handleStudioMarginVerticalChange(val) {
    val = parseInt(val) || 0;
    const vMarginText = document.getElementById('studioMarginValText');
    if (vMarginText) vMarginText.innerText = `${val}px`;
    const vSpacingBadge = document.getElementById('studioVSpacingBadge');
    if (vSpacingBadge) vSpacingBadge.innerText = `${val}px Gap`;
    updateStudioPreviewOutput();
}

function setStudioQuickVSpacing(val) {
    const slider = document.getElementById('studioMarginVerticalSlider');
    if (slider) slider.value = val;
    handleStudioMarginVerticalChange(val);
}

function toggleStudioRatioLock() {
    const isLocked = document.getElementById('studioLockRatio').checked;
    const icon = document.getElementById('studioRatioLockIcon');
    const label = document.getElementById('studioRatioLockLabel');
    if (isLocked) {
        if (icon) icon.className = 'fa-solid fa-lock text-[10px]';
        if (label) label.innerText = 'Aspect Ratio Locked';
    } else {
        if (icon) icon.className = 'fa-solid fa-lock-open text-[10px]';
        if (label) label.innerText = 'Free-Size Mode (Independent)';
    }
}

function handleStudioWidthChange(val) {
    const numVal = parseInt(val) || 10;
    const isLocked = document.getElementById('studioLockRatio').checked;
    const unit = document.getElementById('studioWidthUnit').value;

    if (unit === 'px') {
        const slider = document.getElementById('studioWidthSlider');
        if (slider) slider.value = Math.min(1200, Math.max(50, numVal));
    }

    if (isLocked && unit === 'px' && studioOriginalWidth > 0) {
        const ratio = studioOriginalHeight / studioOriginalWidth;
        const newHeight = Math.round(numVal * ratio);
        document.getElementById('studioHeightUnit').value = 'px';
        document.getElementById('studioHeightInput').value = newHeight;
        const hSlider = document.getElementById('studioHeightSlider');
        if (hSlider) hSlider.value = Math.min(850, Math.max(80, newHeight));
    }
    updateStudioPreviewOutput();
}

function handleStudioHeightChange(val) {
    if (val === 'auto' || val === '' || val === null) {
        document.getElementById('studioHeightUnit').value = 'auto';
    } else {
        const numVal = parseInt(val) || 0;
        document.getElementById('studioHeightUnit').value = 'px';
        const hSlider = document.getElementById('studioHeightSlider');
        if (hSlider && numVal > 0) hSlider.value = Math.min(850, Math.max(80, numVal));

        const isLocked = document.getElementById('studioLockRatio').checked;
        const hUnit = document.getElementById('studioHeightUnit').value;
        const wUnit = document.getElementById('studioWidthUnit').value;

        if (isLocked && hUnit === 'px' && wUnit === 'px' && studioOriginalHeight > 0) {
            const ratio = studioOriginalWidth / studioOriginalHeight;
            const newWidth = Math.round(numVal * ratio);
            document.getElementById('studioWidthInput').value = newWidth;
            const wSlider = document.getElementById('studioWidthSlider');
            if (wSlider) wSlider.value = Math.min(1200, Math.max(50, newWidth));
        }
    }
    updateStudioPreviewOutput();
}

function handleStudioWidthSliderChange(val) {
    document.getElementById('studioWidthUnit').value = 'px';
    document.getElementById('studioWidthInput').value = val;
    handleStudioWidthChange(val);
}

function handleStudioHeightSliderChange(val) {
    document.getElementById('studioHeightUnit').value = 'px';
    document.getElementById('studioHeightInput').value = val;
    handleStudioHeightChange(val);
}

function setStudioQuickWidth(val, unit = '%') {
    document.getElementById('studioWidthUnit').value = unit;
    document.getElementById('studioWidthInput').value = val;
    if (unit === 'px') {
        const slider = document.getElementById('studioWidthSlider');
        if (slider) slider.value = Math.min(1200, Math.max(50, val));
    }
    handleStudioWidthChange(val);
}

function setStudioQuickHeight(val) {
    if (val === 'auto') {
        document.getElementById('studioHeightUnit').value = 'auto';
        document.getElementById('studioHeightInput').value = 'auto';
        handleStudioHeightChange('auto');
    } else {
        document.getElementById('studioHeightUnit').value = 'px';
        document.getElementById('studioHeightInput').value = val;
        const slider = document.getElementById('studioHeightSlider');
        if (slider) slider.value = Math.min(850, Math.max(80, val));
        handleStudioHeightChange(val);
    }
}

function handleStudioWidthUnitChange(unit) {
    if (unit === '%') {
        document.getElementById('studioWidthInput').value = 100;
        document.getElementById('studioHeightUnit').value = 'auto';
        document.getElementById('studioHeightInput').value = 'auto';
    } else {
        document.getElementById('studioWidthInput').value = studioOriginalWidth;
        document.getElementById('studioHeightUnit').value = 'px';
        document.getElementById('studioHeightInput').value = studioOriginalHeight;
    }
    updateStudioPreviewOutput();
}

function handleStudioHeightUnitChange(unit) {
    if (unit === 'auto') {
        document.getElementById('studioHeightInput').value = 'auto';
    } else {
        const wVal = parseInt(document.getElementById('studioWidthInput').value) || studioOriginalWidth;
        const ratio = studioOriginalHeight / studioOriginalWidth;
        document.getElementById('studioHeightInput').value = Math.round(wVal * ratio);
    }
    updateStudioPreviewOutput();
}

function setStudioQuickSize(percent) {
    document.getElementById('studioWidthUnit').value = '%';
    document.getElementById('studioWidthInput').value = percent;
    document.getElementById('studioHeightUnit').value = 'auto';
    document.getElementById('studioHeightInput').value = 'auto';
    updateStudioPreviewOutput();
}

function resetStudioToNatural() {
    document.getElementById('studioWidthUnit').value = 'px';
    document.getElementById('studioWidthInput').value = studioOriginalWidth;
    document.getElementById('studioHeightUnit').value = 'px';
    document.getElementById('studioHeightInput').value = studioOriginalHeight;
    const wSlider = document.getElementById('studioWidthSlider');
    if (wSlider) wSlider.value = Math.min(1200, Math.max(50, studioOriginalWidth));
    const hSlider = document.getElementById('studioHeightSlider');
    if (hSlider) hSlider.value = Math.min(850, Math.max(80, studioOriginalHeight));
    updateStudioPreviewOutput();
}

function setStudioAlign(align) {
    studioCurrentAlign = align;
    ['Left', 'Center', 'Right', 'Inline'].forEach(type => {
        const btn = document.getElementById('alignBtn' + type);
        if (btn) {
            btn.className = 'p-2 bg-white border border-slate-200 rounded-xl text-center hover:border-indigo-500 transition shadow-2xs';
            btn.querySelector('i').className = btn.querySelector('i').className.replace('text-indigo-600', 'text-slate-600');
            btn.querySelector('span').className = 'text-[10px] font-bold text-slate-700 block';
        }
    });

    let activeBtnId = 'alignBtnCenter';
    let statusText = 'Center Block (बीच में)';
    if (align === 'float-left') { activeBtnId = 'alignBtnLeft'; statusText = 'Float Left (बाईं)'; }
    else if (align === 'float-right') { activeBtnId = 'alignBtnRight'; statusText = 'Float Right (दाईं)'; }
    else if (align === 'inline') { activeBtnId = 'alignBtnInline'; statusText = 'Inline (साथ)'; }

    const activeBtn = document.getElementById(activeBtnId);
    if (activeBtn) {
        activeBtn.className = 'p-2 bg-indigo-50 border-2 border-indigo-600 rounded-xl text-center transition shadow-2xs';
        activeBtn.querySelector('i').className = activeBtn.querySelector('i').className.replace('text-slate-600', 'text-indigo-600');
        activeBtn.querySelector('span').className = 'text-[10px] font-bold text-indigo-700 block';
    }

    const statusBadge = document.getElementById('studioAlignStatusBadge');
    if (statusBadge) statusBadge.innerText = statusText;

    updateStudioPreviewOutput();
}

function updateStudioStyling() {
    updateStudioPreviewOutput();
}

function updateStudioPreviewOutput() {
    const previewImg = document.getElementById('studioPreviewImg');
    if (!previewImg) return;

    const wVal = document.getElementById('studioWidthInput').value;
    const wUnit = document.getElementById('studioWidthUnit').value;
    const hVal = document.getElementById('studioHeightInput').value;
    const hUnit = document.getElementById('studioHeightUnit').value;

    const radius = document.getElementById('studioCornerRadius').value;
    const shadow = document.getElementById('studioShadow').value;
    const fit = document.getElementById('studioObjectFit')?.value || 'cover';

    const posX = document.getElementById('studioObjectPosX')?.value || 'center';
    const posY = document.getElementById('studioObjectPosY')?.value || 'center';
    previewImg.style.objectPosition = `${posX} ${posY}`;

    const vMargin = document.getElementById('studioMarginVerticalSlider')?.value || 24;
    previewImg.style.marginTop = `${vMargin}px`;
    previewImg.style.marginBottom = `${vMargin}px`;

    previewImg.style.width = `${wVal}${wUnit}`;
    if (hUnit === 'auto' || hVal === 'auto' || !hVal) {
        previewImg.style.height = 'auto';
    } else {
        previewImg.style.height = `${hVal}px`;
    }
    previewImg.style.objectFit = fit;

    previewImg.className = `max-w-full transition-all duration-150 ${radius} ${shadow}`;
    document.getElementById('studioLiveOutputBadge').innerText = `Live: ${wVal}${wUnit} \u00d7 ${hUnit === 'auto' || hVal === 'auto' ? 'auto' : hVal + 'px'}`;
    const wBadge = document.getElementById('studioWidthLiveBadge');
    if (wBadge) wBadge.innerText = `${wVal}${wUnit}`;
    const hBadge = document.getElementById('studioHeightLiveBadge');
    if (hBadge) hBadge.innerText = `${hUnit === 'auto' || hVal === 'auto' ? 'Auto' : hVal + 'px'}`;
}

function applyStudioImageChanges() {
    if (!targetStudioImageNode) return;
    const editor = tinymce.get(activeEditorId);
    if (!editor) return;

    const wVal = document.getElementById('studioWidthInput').value;
    const wUnit = document.getElementById('studioWidthUnit').value;
    const hVal = document.getElementById('studioHeightInput').value;
    const hUnit = document.getElementById('studioHeightUnit').value;
    const fit = document.getElementById('studioObjectFit')?.value || 'cover';
    const alt = document.getElementById('studioAltInput').value;
    const caption = document.getElementById('studioCaptionInput').value.trim();

    const posX = document.getElementById('studioObjectPosX')?.value || 'center';
    const posY = document.getElementById('studioObjectPosY')?.value || 'center';
    const vMargin = document.getElementById('studioMarginVerticalSlider')?.value || 24;
    const vMarginStyle = `${vMargin}px`;

    const radius = document.getElementById('studioCornerRadius').value;
    const shadow = document.getElementById('studioShadow').value;

    editor.undoManager.transact(() => {
        // Set dimensions style & attributes
        const widthStyle = `${wVal}${wUnit}`;
        const isHeightAuto = (hUnit === 'auto' || hVal === 'auto' || !hVal);

        targetStudioImageNode.style.width = widthStyle;
        if (isHeightAuto) {
            targetStudioImageNode.style.height = 'auto';
            targetStudioImageNode.removeAttribute('height');
        } else {
            targetStudioImageNode.style.height = `${hVal}px`;
            targetStudioImageNode.setAttribute('height', hVal);
        }

        if (fit === 'fill' || fit === 'initial' || !fit) {
            targetStudioImageNode.style.removeProperty('object-fit');
        } else {
            targetStudioImageNode.style.objectFit = fit;
        }
        targetStudioImageNode.style.objectPosition = `${posX} ${posY}`;
        targetStudioImageNode.setAttribute('width', wUnit === 'px' ? wVal : widthStyle);
        targetStudioImageNode.setAttribute('alt', alt);

        // Alignment Classes & Styles with Vertical Spacing
        targetStudioImageNode.classList.remove('img-float-left', 'img-float-right', 'img-center-block', 'img-full-width');
        targetStudioImageNode.style.removeProperty('float');
        targetStudioImageNode.style.removeProperty('display');
        targetStudioImageNode.style.removeProperty('margin');
        targetStudioImageNode.style.removeProperty('margin-left');
        targetStudioImageNode.style.removeProperty('margin-right');

        if (studioCurrentAlign === 'float-left') {
            targetStudioImageNode.classList.add('img-float-left');
            targetStudioImageNode.style.float = 'left';
            targetStudioImageNode.style.margin = `${vMarginStyle} 1.5rem ${vMarginStyle} 0`;
            targetStudioImageNode.style.display = 'block';
        } else if (studioCurrentAlign === 'float-right') {
            targetStudioImageNode.classList.add('img-float-right');
            targetStudioImageNode.style.float = 'right';
            targetStudioImageNode.style.margin = `${vMarginStyle} 0 ${vMarginStyle} 1.5rem`;
            targetStudioImageNode.style.display = 'block';
        } else if (studioCurrentAlign === 'center') {
            targetStudioImageNode.classList.add('img-center-block');
            targetStudioImageNode.style.display = 'block';
            targetStudioImageNode.style.margin = `${vMarginStyle} auto`;
        } else if (studioCurrentAlign === 'inline') {
            targetStudioImageNode.style.display = 'inline-block';
            targetStudioImageNode.style.margin = `${vMarginStyle} 0.5rem`;
        }

        // Apply Corner & Shadow
        targetStudioImageNode.classList.remove('img-rounded-lg', 'img-shadow-card');
        if (radius === 'rounded-2xl') targetStudioImageNode.classList.add('img-rounded-lg');
        if (shadow === 'shadow-lg' || shadow === 'shadow-2xl') targetStudioImageNode.classList.add('img-shadow-card');

        // Handle Caption & Figure Sync
        const existingFigure = editor.dom.getParent(targetStudioImageNode, 'figure');
        if (existingFigure) {
            existingFigure.classList.remove('img-float-left', 'img-float-right', 'img-center-block');
            existingFigure.style.removeProperty('float');
            existingFigure.style.removeProperty('display');
            existingFigure.style.removeProperty('margin');
            if (studioCurrentAlign === 'float-left') {
                existingFigure.classList.add('img-float-left');
                existingFigure.style.setProperty('float', 'left', 'important');
                existingFigure.style.setProperty('margin', `${vMarginStyle} 1.5rem ${vMarginStyle} 0`, 'important');
                existingFigure.style.setProperty('display', 'inline-block', 'important');
            } else if (studioCurrentAlign === 'float-right') {
                existingFigure.classList.add('img-float-right');
                existingFigure.style.setProperty('float', 'right', 'important');
                existingFigure.style.setProperty('margin', `${vMarginStyle} 0 ${vMarginStyle} 1.5rem`, 'important');
                existingFigure.style.setProperty('display', 'inline-block', 'important');
            } else if (studioCurrentAlign === 'center') {
                existingFigure.classList.add('img-center-block');
                existingFigure.setAttribute('data-explicit-center', 'true');
                existingFigure.style.setProperty('display', 'block', 'important');
                existingFigure.style.setProperty('margin', `${vMarginStyle} auto`, 'important');
                existingFigure.style.setProperty('text-align', 'center', 'important');
            }
        }

        if (caption.length > 0) {
            if (existingFigure) {
                let figcap = existingFigure.querySelector('figcaption');
                if (!figcap) {
                    figcap = editor.dom.create('figcaption', {}, caption);
                    existingFigure.appendChild(figcap);
                } else {
                    figcap.innerText = caption;
                }
            } else {
                const figure = editor.dom.create('figure', { class: 'image' });
                editor.dom.replace(figure, targetStudioImageNode);
                figure.appendChild(targetStudioImageNode);
                const figcap = editor.dom.create('figcaption', {}, caption);
                figure.appendChild(figcap);
            }
        } else if (existingFigure && !caption.length) {
            // Keep figure wrapper if it exists or clean empty caption
            const figcap = existingFigure.querySelector('figcaption');
            if (figcap) figcap.remove();
        }

        // Float extraction logic:
        // If image is floated left or right, pull it out of its paragraph and place it BEFORE the paragraph.
        // Also if preceded by a paragraph, place it BEFORE that paragraph so text wraps nicely without pushing image down.
        if (studioCurrentAlign === 'float-left' || studioCurrentAlign === 'float-right') {
            const nodeToMove = editor.dom.getParent(targetStudioImageNode, 'figure') || targetStudioImageNode;
            const parentBlock = editor.dom.getParent(nodeToMove, 'p') || editor.dom.getParent(nodeToMove, 'div');
            
            if (parentBlock && parentBlock !== editor.getBody()) {
                parentBlock.parentNode.insertBefore(nodeToMove, parentBlock);
                if (parentBlock.innerHTML.trim() === '' || parentBlock.innerHTML === '<br data-mce-bogus="1">') {
                    parentBlock.remove();
                }
            }
        }

        editor.save();
        updateEditorMetrics(editor);
        showAdminToast('Image dimensions, position & movement updated!', 'success');
    });

    closeImageStudioModal();
}

// -----------------------------------------------------------------------------
// 6. Edit Blog Modal Opener & Filter
// -----------------------------------------------------------------------------
function openEditBlogModal(blog) {
    const editForm = document.getElementById('editBlogForm');
    if (editForm) {
        editForm.action = '/admin/blogs/update/' + blog.id;
    }
    document.getElementById('edit-blog-title').value = blog.title || '';
    document.getElementById('edit-blog-slug').value = blog.slug || '';
    document.getElementById('edit-blog-author').value = blog.author_name || '';
    document.getElementById('edit-cover-link').value = blog.cover_link || '';

    // Set Title Typography Values
    document.getElementById('edit-title-color').value = blog.title_color || '#0f172a';
    document.getElementById('edit-title-font').value = blog.title_font || 'sans';
    document.getElementById('edit-title-size').value = blog.title_size || 'large';
    document.getElementById('edit-title-weight').value = blog.title_weight || '900';
    document.getElementById('edit-title-transform').value = blog.title_transform || 'none';
    const editFontSelect = document.getElementById('editTitleFontSelect');
    if (editFontSelect) editFontSelect.value = blog.title_font || 'sans';

    // Sync Edit Color Ring
    const editColorContainer = document.getElementById('editTitleColorPresets');
    if (editColorContainer) {
        let found = false;
        editColorContainer.querySelectorAll('.title-color-btn').forEach(btn => {
            btn.classList.remove('ring-2', 'ring-indigo-500', 'ring-offset-1');
            const targetColor = blog.title_color || '#0f172a';
            if (btn.getAttribute('onclick') && btn.getAttribute('onclick').includes(targetColor)) {
                btn.classList.add('ring-2', 'ring-indigo-500', 'ring-offset-1');
                found = true;
            }
        });
    }

    // Sync Edit Transform Button
    const editTransformBtn = document.getElementById('editTitleTransformBtn');
    if (editTransformBtn) {
        if (blog.title_transform === 'uppercase') {
            editTransformBtn.classList.add('bg-indigo-600', 'text-white');
            editTransformBtn.classList.remove('bg-white', 'text-slate-700');
        } else {
            editTransformBtn.classList.remove('bg-indigo-600', 'text-white');
            editTransformBtn.classList.add('bg-white', 'text-slate-700');
        }
    }

    applyTitleStyles('edit');

    // Set Existing Cover Preview
    const previewImg = document.getElementById('editCoverPreviewImg');
    const previewDims = document.getElementById('editCoverDimensions');
    if (blog.image_url) {
        const fullCoverUrl = blog.image_url.startsWith('http') ? blog.image_url : (blog.image_url.startsWith('/') ? blog.image_url : '/' + blog.image_url);
        previewImg.src = fullCoverUrl;
        previewDims.innerText = 'Current Cover Photo';
    } else {
        previewImg.src = '{{ asset("assets/images/default-blog.webp") }}';
        previewDims.innerText = 'Default Cover Photo';
    }

    if (typeof tinymce !== 'undefined' && tinymce.get('edit-blog-content-input')) {
        tinymce.get('edit-blog-content-input').setContent(blog.content || '');
        tinymce.get('edit-blog-content-input').save();
        updateEditorMetrics(tinymce.get('edit-blog-content-input'));
    } else {
        document.getElementById('edit-blog-content-input').value = blog.content || '';
    }

    updateEditSeoPreview();
    document.getElementById('editBlogModal').classList.remove('hidden');
}

function closeEditBlogModal() {
    document.getElementById('editBlogModal').classList.add('hidden');
}

function testCoverLink(inputId) {
    let url = document.getElementById(inputId).value.trim();
    if (!url) {
        showAdminToast('Please enter a target link first to test!', 'error');
        return;
    }
    if (!/^https?:\/\//i.test(url) && !url.startsWith('/')) {
        url = 'https://' + url;
    }
    window.open(url, '_blank');
}

// -----------------------------------------------------------------------------
// 7. Title Typography Engine (Colour, Letters Style & Size)
// -----------------------------------------------------------------------------
function setTitleStyle(type, property, value, btn = null) {
    const colorInput = document.getElementById(type + '-title-color');
    const fontInput = document.getElementById(type + '-title-font');
    const sizeInput = document.getElementById(type + '-title-size');
    const weightInput = document.getElementById(type + '-title-weight');
    const transformInput = document.getElementById(type + '-title-transform');

    if (property === 'color') {
        if (colorInput) colorInput.value = value;
        const presetContainer = document.getElementById(type + 'TitleColorPresets');
        if (presetContainer) {
            presetContainer.querySelectorAll('.title-color-btn').forEach(b => {
                b.classList.remove('ring-2', 'ring-indigo-500', 'ring-offset-1');
            });
            if (btn && btn.classList.contains('title-color-btn')) {
                btn.classList.add('ring-2', 'ring-indigo-500', 'ring-offset-1');
            }
        }
    } else if (property === 'font') {
        if (fontInput) fontInput.value = value;
    } else if (property === 'size') {
        if (sizeInput) sizeInput.value = value;
        if (btn && btn.parentElement) {
            btn.parentElement.querySelectorAll('.title-size-btn').forEach(b => {
                b.classList.remove('bg-white', 'text-indigo-600', 'font-bold', 'shadow-2xs');
                b.classList.add('text-slate-600', 'font-semibold');
            });
            btn.classList.add('bg-white', 'text-indigo-600', 'font-bold', 'shadow-2xs');
            btn.classList.remove('text-slate-600');
        }
    } else if (property === 'weight') {
        if (weightInput) weightInput.value = value;
    } else if (property === 'transform') {
        if (transformInput) transformInput.value = value;
    }

    applyTitleStyles(type);
}

function toggleTitleTransform(type) {
    const transformInput = document.getElementById(type + '-title-transform');
    const btn = document.getElementById(type + 'TitleTransformBtn');
    if (!transformInput || !btn) return;

    if (transformInput.value === 'uppercase') {
        transformInput.value = 'none';
        btn.classList.remove('bg-indigo-600', 'text-white');
        btn.classList.add('bg-white', 'text-slate-700');
    } else {
        transformInput.value = 'uppercase';
        btn.classList.add('bg-indigo-600', 'text-white');
        btn.classList.remove('bg-white', 'text-slate-700');
    }
    applyTitleStyles(type);
}

function toggleTitleItalic(type) {
    const input = document.getElementById(type + '-blog-title');
    const btn = document.getElementById(type + 'TitleItalicBtn');
    if (!input || !btn) return;

    if (input.style.fontStyle === 'italic') {
        input.style.fontStyle = 'normal';
        btn.classList.remove('bg-indigo-600', 'text-white');
        btn.classList.add('bg-white', 'text-slate-700');
    } else {
        input.style.fontStyle = 'italic';
        btn.classList.add('bg-indigo-600', 'text-white');
        btn.classList.remove('bg-white', 'text-slate-700');
    }
}

function applyTitleStyles(type) {
    const input = document.getElementById(type + '-blog-title');
    if (!input) return;

    const color = document.getElementById(type + '-title-color')?.value || '#0f172a';
    const font = document.getElementById(type + '-title-font')?.value || 'sans';
    const size = document.getElementById(type + '-title-size')?.value || 'large';
    const weight = document.getElementById(type + '-title-weight')?.value || '900';
    const transform = document.getElementById(type + '-title-transform')?.value || 'none';

    input.style.color = color;
    input.style.fontWeight = weight;
    input.style.textTransform = transform;

    if (font === 'serif') {
        input.style.fontFamily = "'Georgia', Cambria, 'Times New Roman', serif";
    } else if (font === 'outfit') {
        input.style.fontFamily = "'Outfit', -apple-system, sans-serif";
    } else if (font === 'mono') {
        input.style.fontFamily = "ui-monospace, SFMono-Regular, Menlo, monospace";
    } else {
        input.style.fontFamily = "'Inter', system-ui, sans-serif";
    }

    if (size === 'medium') {
        input.style.fontSize = '1.25rem';
    } else if (size === 'large') {
        input.style.fontSize = '1.5rem';
    } else if (size === 'xl') {
        input.style.fontSize = '1.85rem';
    } else if (size === 'mega') {
        input.style.fontSize = '2.25rem';
    }

    // Sync SEO preview styling
    if (type === 'create') {
        const seoTitle = document.getElementById('seoTitlePreview');
        if (seoTitle) {
            seoTitle.style.color = (color === '#0f172a') ? '#1d4ed8' : color;
            seoTitle.style.fontFamily = input.style.fontFamily;
        }
    } else if (type === 'edit') {
        const seoTitle = document.getElementById('editSeoTitlePreview');
        if (seoTitle) {
            seoTitle.style.color = (color === '#0f172a') ? '#1d4ed8' : color;
            seoTitle.style.fontFamily = input.style.fontFamily;
        }
    }
}

function updateSliderFileName(input) {
    const label = document.getElementById('sliderFileLabel');
    if (input.files && input.files[0]) {
        label.innerText = input.files[0].name;
    }
}

function updateGalleryFileName(input) {
    const label = document.getElementById('galleryFileLabel');
    if (input.files && input.files[0]) {
        label.innerText = input.files[0].name;
    }
}

function filterBlogTable() {
    const query = document.getElementById('blogSearchInput').value.toLowerCase();
    const rows = document.querySelectorAll('.blog-row');
    rows.forEach(row => {
        const title = row.querySelector('.blog-title-cell').innerText.toLowerCase();
        if (title.includes(query)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// =============================================================================
// GALLERY STUDIO ENGINE: UPLOAD MODES, PREVIEWS, LIVE FILTERS & LIGHTBOX
// =============================================================================
let currentAdminGalFilterType = 'all';

function setGalleryUploadType(type) {
    const inputMediaType = document.getElementById('galleryMediaTypeInput');
    const boxImg = document.getElementById('box-upload-image');
    const boxVidFile = document.getElementById('box-upload-video-file');
    const boxVidUrl = document.getElementById('box-upload-video-url');
    const btnImg = document.getElementById('btn-mode-image');
    const btnVidFile = document.getElementById('btn-mode-video-file');
    const btnVidUrl = document.getElementById('btn-mode-video-url');
    const submitText = document.getElementById('gallerySubmitBtnText');

    // Reset button styles
    [btnImg, btnVidFile, btnVidUrl].forEach(b => {
        if (b) b.className = 'px-3.5 py-2 rounded-xl transition text-slate-600 hover:text-slate-900 flex items-center gap-1.5';
    });

    // Hide all upload boxes
    if (boxImg) boxImg.classList.add('hidden');
    if (boxVidFile) boxVidFile.classList.add('hidden');
    if (boxVidUrl) boxVidUrl.classList.add('hidden');

    if (type === 'image') {
        if (btnImg) btnImg.className = 'px-3.5 py-2 rounded-xl transition bg-white text-blue-700 shadow-xs flex items-center gap-1.5 font-bold';
        if (boxImg) boxImg.classList.remove('hidden');
        if (inputMediaType) inputMediaType.value = 'image';
        if (submitText) submitText.innerText = 'Upload Photo to Gallery';
    } else if (type === 'video_file') {
        if (btnVidFile) btnVidFile.className = 'px-3.5 py-2 rounded-xl transition bg-white text-indigo-700 shadow-xs flex items-center gap-1.5 font-bold';
        if (boxVidFile) boxVidFile.classList.remove('hidden');
        if (inputMediaType) inputMediaType.value = 'video';
        if (submitText) submitText.innerText = 'Upload Video File to Gallery';
    } else if (type === 'video_url') {
        if (btnVidUrl) btnVidUrl.className = 'px-3.5 py-2 rounded-xl transition bg-white text-red-600 shadow-xs flex items-center gap-1.5 font-bold';
        if (boxVidUrl) boxVidUrl.classList.remove('hidden');
        if (inputMediaType) inputMediaType.value = 'video';
        if (submitText) submitText.innerText = 'Save YouTube Video to Gallery';
    }
}

function previewGalleryImage(input, context) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImg = document.getElementById('galleryImagePreviewImg');
            const emptyBox = document.getElementById('galleryImageEmpty');
            if (previewImg) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
            }
            if (emptyBox) emptyBox.classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewGalleryVideoFile(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const label = document.getElementById('galleryVideoFileLabel');
        if (label) {
            const sizeMb = (file.size / (1024 * 1024)).toFixed(1);
            label.innerText = file.name + ' (' + sizeMb + ' MB)';
        }
    }
}

function previewYoutubeUrl(url) {
    const container = document.getElementById('youtubePreviewContainer');
    const thumbImg = document.getElementById('youtubeThumbImg');
    if (!url || !url.trim()) {
        if (container) container.classList.add('hidden');
        return;
    }
    const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=|shorts\/)([^#&?]*).*/;
    const match = url.match(regExp);
    if (match && match[2] && match[2].length === 11) {
        if (thumbImg) thumbImg.src = 'https://img.youtube.com/vi/' + match[2] + '/hqdefault.jpg';
        if (container) container.classList.remove('hidden');
    } else {
        if (container) container.classList.add('hidden');
    }
}

function checkCustomCategory(val, mode) {
    const input = mode === 'edit' 
        ? document.getElementById('editCustomCategoryInput') 
        : document.getElementById('createCustomCategoryInput');
    if (!input) return;

    if (val === '__custom__') {
        input.classList.remove('hidden');
        input.focus();
    } else {
        input.classList.add('hidden');
        input.value = '';
    }
}

function filterAdminGalleryType(type, btn) {
    currentAdminGalFilterType = type;
    const filterPills = document.querySelectorAll('#adminMediaFilterPills .gal-type-filter');
    filterPills.forEach(pill => {
        pill.className = 'gal-type-filter px-3 py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition';
    });
    if (btn) {
        btn.className = 'gal-type-filter active px-3 py-1.5 rounded-lg bg-white text-blue-700 shadow-2xs font-bold transition';
    }
    filterAdminGalleryCatalog();
}

function filterAdminGalleryCatalog() {
    const catFilter = (document.getElementById('adminGalleryCategoryFilter')?.value || 'all').toLowerCase();
    const query = (document.getElementById('adminGallerySearchInput')?.value || '').trim().toLowerCase();
    const cards = document.querySelectorAll('.gallery-card-item');
    let visibleCount = 0;

    cards.forEach(card => {
        const itemType = card.getAttribute('data-type') || 'image';
        const itemCat = (card.getAttribute('data-category') || '').toLowerCase();
        const itemSearch = (card.getAttribute('data-search') || '').toLowerCase();

        const matchType = (currentAdminGalFilterType === 'all') || (itemType === currentAdminGalFilterType);
        const matchCat = (catFilter === 'all') || (itemCat === catFilter) || itemCat.includes(catFilter);
        const matchSearch = (!query) || itemSearch.includes(query);

        if (matchType && matchCat && matchSearch) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    const countEl = document.getElementById('visibleGalleryCount');
    if (countEl) countEl.innerText = visibleCount;
}

function parseGalleryData(el) {
    if (!el) return null;
    const raw = el.getAttribute('data-gallery');
    if (!raw) return null;
    try {
        return JSON.parse(atob(raw));
    } catch(e) {
        console.error('Failed to parse gallery item:', e);
        return null;
    }
}

function handleGalleryPreview(el) {
    const data = parseGalleryData(el);
    if (data) openGalleryPreview(data);
}

function openGalleryPreview(data) {
    const modal = document.getElementById('galleryPreviewModal');
    if (!modal) return;

    // Set Text Content
    const titleEl = document.getElementById('galPreviewTitle');
    const catEl = document.getElementById('galPreviewCategory');
    const dateEl = document.getElementById('galPreviewDate');
    const descEl = document.getElementById('galPreviewDescription');
    const typeBadge = document.getElementById('galPreviewTypeBadge');

    if (titleEl) titleEl.innerText = data.title || 'SMTTC Practical Demonstration';
    if (catEl) catEl.innerText = data.category || 'General';
    if (dateEl) dateEl.innerText = data.created_at_formatted || '';
    if (descEl) descEl.innerText = data.description || 'Workbench training session at SMTTC Patna.';

    const imgContainer = document.getElementById('galPreviewImageContainer');
    const iframeContainer = document.getElementById('galPreviewIframeContainer');
    const videoContainer = document.getElementById('galPreviewVideoContainer');
    const previewImg = document.getElementById('galPreviewImg');
    const iframe = document.getElementById('galPreviewIframe');
    const video = document.getElementById('galPreviewVideo');
    const videoSrc = document.getElementById('galPreviewVideoSource');

    // Reset Containers
    if (imgContainer) imgContainer.classList.add('hidden');
    if (iframeContainer) iframeContainer.classList.add('hidden');
    if (videoContainer) videoContainer.classList.add('hidden');
    if (iframe) iframe.src = '';
    if (video) {
        video.pause();
        if (videoSrc) videoSrc.src = '';
    }

    if (data.media_type === 'video') {
        if (typeBadge) {
            typeBadge.innerText = '🎥 Video';
            typeBadge.className = 'px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-indigo-600 text-white shadow-xs';
        }

        if (data.embed_url) {
            const embedSrc = data.embed_url + (data.embed_url.includes('?') ? '&' : '?') + 'autoplay=1';
            if (iframe) iframe.src = embedSrc;
            if (iframeContainer) iframeContainer.classList.remove('hidden');
        } else if (data.video_url) {
            const ytMatch = data.video_url.match(/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|shorts\/))([a-zA-Z0-9_-]{11})/);
            if (ytMatch && ytMatch[1]) {
                if (iframe) iframe.src = 'https://www.youtube.com/embed/' + ytMatch[1] + '?autoplay=1';
                if (iframeContainer) iframeContainer.classList.remove('hidden');
            } else {
                if (video && videoSrc) {
                    videoSrc.src = data.video_url;
                    video.load();
                    if (videoContainer) videoContainer.classList.remove('hidden');
                    video.play().catch(e => console.log('Autoplay prevented:', e));
                }
            }
        }
    } else {
        if (typeBadge) {
            typeBadge.innerText = '📸 Photo';
            typeBadge.className = 'px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white/10 text-slate-300';
        }
        if (previewImg) {
            previewImg.src = data.image_url || data.thumbnail_url || '/assets/images/g1.webp';
        }
        if (imgContainer) imgContainer.classList.remove('hidden');
    }

    modal.classList.remove('hidden');
}

function closeGalleryPreview() {
    const modal = document.getElementById('galleryPreviewModal');
    if (!modal) return;
    const iframe = document.getElementById('galPreviewIframe');
    if (iframe) iframe.src = '';
    const video = document.getElementById('galPreviewVideo');
    if (video) video.pause();
    modal.classList.add('hidden');
}

function handleGalleryEdit(el) {
    const data = parseGalleryData(el);
    if (data) openEditGalleryModal(data);
}

function openEditGalleryModal(data) {
    const modal = document.getElementById('editGalleryModal');
    if (!modal) return;

    const form = document.getElementById('editGalleryForm');
    if (form) form.action = '/admin/galleries/update/' + data.id;

    const idInput = document.getElementById('editGalleryId');
    const titleInput = document.getElementById('editGalleryTitle');
    const descInput = document.getElementById('editGalleryDescription');
    const mediaTypeInput = document.getElementById('editGalleryMediaType');

    if (idInput) idInput.value = data.id;
    if (titleInput) titleInput.value = data.title || '';
    if (descInput) descInput.value = data.description || '';
    if (mediaTypeInput) mediaTypeInput.value = data.media_type || 'image';

    // Category Selector
    const catSelect = document.getElementById('editGalleryCategory');
    const customInput = document.getElementById('editCustomCategoryInput');
    let matched = false;

    if (catSelect) {
        for (let i = 0; i < catSelect.options.length; i++) {
            if (catSelect.options[i].value === data.category) {
                catSelect.selectedIndex = i;
                matched = true;
                break;
            }
        }
        if (!matched && data.category) {
            catSelect.value = '__custom__';
            if (customInput) {
                customInput.value = data.category;
                customInput.classList.remove('hidden');
            }
        } else {
            if (customInput) {
                customInput.classList.add('hidden');
                customInput.value = '';
            }
        }
    }

    // Media Switch
    const imgBlock = document.getElementById('editGalleryImageBlock');
    const vidBlock = document.getElementById('editGalleryVideoBlock');
    const currentImg = document.getElementById('editGalleryCurrentImagePreview');
    const vidUrlInput = document.getElementById('editGalleryVideoUrl');

    if (data.media_type === 'video') {
        if (imgBlock) imgBlock.classList.add('hidden');
        if (vidBlock) vidBlock.classList.remove('hidden');
        if (vidUrlInput) vidUrlInput.value = data.video_url || '';
    } else {
        if (imgBlock) imgBlock.classList.remove('hidden');
        if (vidBlock) vidBlock.classList.add('hidden');
        if (currentImg) {
            currentImg.src = data.image_url || data.thumbnail_url || '/assets/images/g1.webp';
        }
    }

    modal.classList.remove('hidden');
}

function closeEditGalleryModal() {
    const modal = document.getElementById('editGalleryModal');
    if (modal) modal.classList.add('hidden');
}

// Close modals on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeGalleryPreview();
        closeEditGalleryModal();
        closeEditFeeModal();
        closeEditCertModal();
    }
});

// Gallery Unified Sub-tabs Switcher
function switchAdminGallerySubTab(tab) {
    const panes = {
        'ba': document.getElementById('admin-gal-pane-ba'),
        'stories': document.getElementById('admin-gal-pane-stories'),
        'students': document.getElementById('admin-gal-pane-students'),
        'catalog': document.getElementById('admin-gal-pane-catalog')
    };
    const btns = {
        'ba': document.getElementById('subtab-btn-ba'),
        'stories': document.getElementById('subtab-btn-stories'),
        'students': document.getElementById('subtab-btn-students'),
        'catalog': document.getElementById('subtab-btn-catalog')
    };

    // Hide all panes
    Object.keys(panes).forEach(k => {
        if (panes[k]) panes[k].classList.add('hidden');
        if (btns[k]) {
            btns[k].className = 'admin-gal-subtab-btn px-4 py-2.5 rounded-xl font-bold text-xs transition flex items-center gap-2 text-slate-700 hover:text-slate-900 hover:bg-white/80 whitespace-nowrap';
        }
    });

    if (panes[tab]) panes[tab].classList.remove('hidden');
    if (btns[tab]) {
        let activeColor = 'bg-emerald-600 text-white shadow-sm';
        if (tab === 'stories') activeColor = 'bg-red-600 text-white shadow-sm';
        else if (tab === 'students') activeColor = 'bg-sky-600 text-white shadow-sm';
        else if (tab === 'catalog') activeColor = 'bg-blue-600 text-white shadow-sm';
        btns[tab].className = 'admin-gal-subtab-btn px-4 py-2.5 rounded-xl font-black text-xs transition flex items-center gap-2 ' + activeColor + ' whitespace-nowrap';
    }
}

function previewAdminBAFile(input, previewId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById(previewId);
            if (img) {
                img.src = e.target.result;
                img.classList.remove('hidden');
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewStudentPhoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('studentPhotoPreview');
            if (preview) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewStoryThumbnail(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('storyThumbPreview');
            if (preview) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewStoryVideoFile(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const label = document.getElementById('storyVideoFileLabel');
        if (label) {
            const sizeMb = (file.size / (1024 * 1024)).toFixed(1);
            label.innerText = file.name + ' (' + sizeMb + ' MB)';
        }
    }
}

// Fee Structure Discount Calculator & Modal Control
function calculateFeeDiscounts(prefix) {
    const feeInput = document.getElementById(prefix === 'edit' ? 'editCourseFeeInput' : 'createCourseFeeInput');
    const boysDiscInput = document.getElementById(prefix === 'edit' ? 'editDiscountBoysInput' : 'createDiscountBoysInput');
    const girlsDiscInput = document.getElementById(prefix === 'edit' ? 'editDiscountGirlsInput' : 'createDiscountGirlsInput');
    const boysBadge = document.getElementById(prefix === 'edit' ? 'editBoysCalculatedBadge' : 'createBoysCalculatedBadge');
    const girlsBadge = document.getElementById(prefix === 'edit' ? 'editGirlsCalculatedBadge' : 'createGirlsCalculatedBadge');

    if (!feeInput) return;

    const rawVal = feeInput.value.replace(/[^0-9]/g, '');
    const baseFee = parseFloat(rawVal) || 0;
    const boysDisc = Math.min(100, Math.max(0, parseFloat(boysDiscInput?.value) || 0));
    const girlsDisc = Math.min(100, Math.max(0, parseFloat(girlsDiscInput?.value) || 0));

    if (baseFee > 0) {
        const boysFinal = Math.round(baseFee - (baseFee * boysDisc / 100));
        const girlsFinal = Math.round(baseFee - (baseFee * girlsDisc / 100));
        if (boysBadge) boysBadge.textContent = 'Final: ₹' + boysFinal.toLocaleString('en-IN');
        if (girlsBadge) girlsBadge.textContent = 'Final: ₹' + girlsFinal.toLocaleString('en-IN');
    } else {
        if (boysBadge) boysBadge.textContent = 'Final: ₹--';
        if (girlsBadge) girlsBadge.textContent = 'Final: ₹--';
    }
}

function handleFeeEdit(btn) {
    try {
        const raw = btn.getAttribute('data-fee');
        const fee = JSON.parse(atob(raw));
        openEditFeeModal(fee);
    } catch (e) {
        console.error('Error parsing fee data', e);
    }
}

function openEditFeeModal(fee) {
    const modal = document.getElementById('editFeeModal');
    const form = document.getElementById('editFeeForm');
    if (!modal || !form) return;

    form.action = '/admin/fees/update/' + fee.id;
    document.getElementById('editFeeCourseName').value = fee.course_name || '';
    document.getElementById('editFeeDuration').value = fee.duration || '';
    document.getElementById('editCourseFeeInput').value = fee.course_fee || '';
    document.getElementById('editFeeCertification').value = fee.certification || '';
    document.getElementById('editDiscountBoysInput').value = fee.discount_boys || 0;
    document.getElementById('editDiscountGirlsInput').value = fee.discount_girls || 0;
    document.getElementById('editFeeOfferTag').value = fee.offer_tag || '';
    document.getElementById('editFeeBadgeColor').value = fee.badge_color || 'amber';
    document.getElementById('editFeeOfferActive').checked = fee.offer_active == 1;

    calculateFeeDiscounts('edit');
    modal.classList.remove('hidden');
}

function closeEditFeeModal() {
    const modal = document.getElementById('editFeeModal');
    if (modal) modal.classList.add('hidden');
}

// Certificate Edit & Manual Dates Modal Control
function handleCertEdit(btn) {
    try {
        const raw = btn.getAttribute('data-cert');
        const cert = JSON.parse(atob(raw));
        openEditCertModal(cert);
    } catch (e) {
        console.error('Error parsing certificate data', e);
    }
}

function openEditCertModal(cert) {
    const modal = document.getElementById('editCertModal');
    const form = document.getElementById('editCertForm');
    if (!modal || !form) return;

    form.action = '/admin/certificates/update/' + cert.id;
    document.getElementById('editCertRegdNo').value = cert.regd_no || '';
    document.getElementById('editCertSlNo').value = cert.sl_no || '';
    document.getElementById('editCertName').value = cert.name || '';
    document.getElementById('editCertFatherName').value = cert.father_name || '';
    document.getElementById('editCertDob').value = cert.dob || '';
    document.getElementById('editCertCourse').value = cert.course || '';
    document.getElementById('editCertFromDate').value = cert.from_date || '';
    document.getElementById('editCertToDate').value = cert.to_date || '';
    document.getElementById('editCertIssuedDate').value = cert.issued_date || '';
    document.getElementById('editCertCenter').value = cert.center || 'SMTTC Institute';
    document.getElementById('editCertLocation').value = cert.location || 'Patna';

    modal.classList.remove('hidden');
}

function closeEditCertModal() {
    const modal = document.getElementById('editCertModal');
    if (modal) modal.classList.add('hidden');
}
</script>
@endsection

