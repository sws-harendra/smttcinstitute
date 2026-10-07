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

            <!-- ================= SECTION 1: FULL-WIDTH EDITORIAL CANVAS ================= -->
            <div class="space-y-6 w-full">
                <!-- Title -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <label class="block text-xs font-bold text-slate-700">Article Title <span class="text-red-500">*</span></label>
                        <span id="create-title-count" class="text-[10px] font-semibold text-slate-400">0 / 70 chars</span>
                    </div>
                    <input type="text" id="create-blog-title" name="title" placeholder="e.g. Complete Inverter AC PCB Troubleshooting & Repairing Guide 2026" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-base font-semibold text-slate-800 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition shadow-xs">
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
                            <input type="text" id="create-blog-slug" name="slug" placeholder="inverter-ac-pcb-troubleshooting" class="w-full bg-white border border-slate-200 rounded-xl pl-16 pr-4 py-2.5 text-xs font-mono text-slate-700 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700">Author Name</label>
                        <input type="text" id="create-blog-author" name="author_name" value="{{ session('admin_user', 'SMTTC Master Trainer') }}" placeholder="e.g. Er. S. Kumar" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-700 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition">
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
                        </div>
                    </div>

                    <!-- TinyMCE Textarea (Spacious Full Width) -->
                    <textarea name="content" id="create-blog-content" class="w-full bg-white border border-slate-200 rounded-b-2xl text-sm min-h-[460px]"></textarea>
                    
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

                    <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-amber-400 to-[#FACA0A] hover:from-amber-500 hover:to-yellow-500 text-slate-950 font-black text-sm uppercase tracking-wider shadow-lg transition duration-200 flex items-center justify-center gap-2 group cursor-pointer">
                        <i class="fa-solid fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-0.5 transition-transform"></i>
                        <span>Publish Blog Article Now</span>
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
                <h2 class="text-xl font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-indian-rupee-sign text-green-600"></i> Fee Structure Management
                </h2>
                <p class="text-xs text-slate-400 font-medium mt-1">Manage course pricing and duration for the main page.</p>
            </div>
            <span class="text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-full">{{ count($fees) }} Courses</span>
        </div>

        <!-- Add Fee Form -->
        <form action="{{ route('admin.fees.store') }}" method="POST" class="bg-slate-50/60 p-6 md:p-8 rounded-2xl border border-slate-200 space-y-6">
            @csrf
            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-700">Add New Course Fee</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-600">Course Name</label>
                    <input type="text" name="course_name" placeholder="e.g. AC Repairing" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:border-green-600 focus:ring-4 focus:ring-green-50 transition">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-600">Duration</label>
                    <input type="text" name="duration" placeholder="e.g. 3 Months" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:border-green-600 focus:ring-4 focus:ring-green-50 transition">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-600">Course Fee</label>
                    <input type="text" name="course_fee" placeholder="e.g. ₹12,000" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:border-green-600 focus:ring-4 focus:ring-green-50 transition">
                </div>
                
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-600">Certification</label>
                    <input type="text" name="certification" value="Yes" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:border-green-600 focus:ring-4 focus:ring-green-50 transition">
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="px-8 py-3.5 rounded-xl bg-green-600 hover:bg-green-700 text-white font-bold text-xs shadow-md shadow-green-100 transition duration-200 flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Add Fee Structure
                </button>
            </div>
        </form>

        <!-- Fee Structures Table -->
        <div class="space-y-4 pt-4">
            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-700">Existing Course Fees</h3>

            <div class="overflow-x-auto rounded-2xl border border-slate-200/80 bg-white">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-slate-400 text-[11px] font-bold uppercase tracking-wider">
                            <th class="p-4">Course Name</th>
                            <th class="p-4">Duration</th>
                            <th class="p-4">Course Fee</th>
                            <th class="p-4">Certification</th>
                            <th class="p-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($fees as $fee)
                            <tr class="hover:bg-slate-50/80 transition duration-150">
                                <td class="p-4 font-bold text-slate-900">{{ $fee->course_name }}</td>
                                <td class="p-4 text-slate-600">{{ $fee->duration }}</td>
                                <td class="p-4 font-bold text-slate-900">{{ $fee->course_fee }}</td>
                                <td class="p-4 text-slate-600">{{ $fee->certification }}</td>
                                <td class="p-4 text-right whitespace-nowrap">
                                    <form action="{{ route('admin.fees.delete', $fee->id) }}" method="POST" onsubmit="return confirm('Delete this fee structure?')" class="inline">
                                        @csrf
                                        <button type="submit" class="px-3.5 py-1.5 rounded-lg border border-red-200 text-red-600 hover:bg-red-50 font-bold text-xs transition flex items-center gap-1.5 ml-auto">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-10 text-slate-400 text-sm font-medium">No fee structures found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- ================= TAB 5: GALLERY MANAGEMENT ================= -->
<div id="tab-galleries" class="hidden space-y-8 animate-fade-in">
    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 md:p-8 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4 flex-wrap gap-4">
            <div>
                <h2 class="text-xl font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-camera-retro text-blue-500"></i> Gallery Management
                </h2>
                <p class="text-xs text-slate-400 font-medium mt-1">Upload images for the public training gallery page.</p>
            </div>
            <span class="text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-full">{{ count($galleries) }} Images</span>
        </div>

        <!-- Upload Box -->
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-50 border-2 border-dashed border-slate-200 hover:border-blue-400 rounded-2xl p-6 transition duration-200">
            @csrf
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl font-bold shrink-0">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Upload New Gallery Image</h4>
                        <p class="text-xs text-slate-400">Supported formats: JPG, PNG, WEBP (Max: 5MB)</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 w-full md:w-auto">
                    <input type="file" id="galleryFileInput" name="image" accept="image/*" required class="hidden" onchange="updateGalleryFileName(this)">
                    <button type="button" onclick="document.getElementById('galleryFileInput').click()" class="w-full md:w-auto px-5 py-3 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold text-xs hover:bg-slate-100 transition shadow-xs">
                        <span id="galleryFileLabel">Browse Image File</span>
                    </button>
                    <button type="submit" class="w-full md:w-auto px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs shadow-md transition">
                        Upload Image
                    </button>
                </div>
            </div>
        </form>

        <!-- Gallery Images Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 pt-2">
            @forelse($galleries as $gallery)
                <div class="relative group bg-slate-100 rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-300">
                    <img src="{{ Str::startsWith($gallery->image_url, '/uploads') ? asset($gallery->image_url) : asset($gallery->image_url) }}" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                    
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-3 backdrop-blur-xs">
                        <form action="{{ route('admin.galleries.delete', $gallery->id) }}" method="POST" onsubmit="return confirm('Delete this gallery image?')">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2.5 rounded-xl font-bold text-xs shadow-lg transition flex items-center gap-1.5">
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        </form>
                    </div>

                    <div class="p-3 bg-white border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                        <span>Added {{ $gallery->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center bg-slate-50/50 rounded-2xl border border-dashed border-slate-200">
                    <i class="fa-solid fa-image text-3xl text-slate-300 mb-2"></i>
                    <p class="text-slate-400 text-sm font-medium">No gallery images uploaded yet.</p>
                </div>
            @endforelse
        </div>
    </section>
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
        <form action="{{ route('admin.certificates.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-6">
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
                <input type="text" name="course" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-500 transition">
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
                                <a href="{{ route('certificate.view', $cert->regd_no) }}" target="_blank" class="px-3.5 py-1.5 rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50 font-bold text-xs transition flex items-center gap-1.5">
                                    <i class="fa-solid fa-eye"></i> View/Print
                                </a>
                                <form action="{{ route('admin.certificates.delete', $cert->id) }}" method="POST" onsubmit="return confirm('Delete this certificate?')">
                                    @csrf
                                    <button type="submit" class="px-3.5 py-1.5 rounded-lg border border-red-200 text-red-600 hover:bg-red-50 font-bold text-xs transition flex items-center gap-1.5">
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
                                
                                @if($hasCertificate)
                                    <a href="{{ route('certificate.view', $admission->enrollment_no) }}" target="_blank" class="px-3.5 py-1.5 rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50 font-bold text-xs transition flex items-center gap-1.5" title="View Certificate">
                                        <i class="fa-solid fa-eye"></i> <span class="hidden xl:inline">View Cert</span>
                                    </a>
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
                <!-- Title -->
                <div class="space-y-1.5">
                    <div class="flex justify-between items-center">
                        <label class="block text-xs font-bold text-slate-700">Article Title <span class="text-red-500">*</span></label>
                        <span id="edit-title-count" class="text-[10px] font-semibold text-slate-400">0 / 70 chars</span>
                    </div>
                    <input type="text" id="edit-blog-title" name="title" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-base font-semibold text-slate-800 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 shadow-xs">
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

document.addEventListener('DOMContentLoaded', () => {
    // -------------------------------------------------------------------------
    // 1. Advanced TinyMCE Initialization with Free-Size & High-Detailing
    // -------------------------------------------------------------------------
    if (typeof tinymce !== 'undefined') {
        tinymce.init({
            selector: '#create-blog-content, #edit-blog-content-input',
            height: 520,
            relative_urls: false,
            remove_script_host: false,
            document_base_url: window.location.origin + '/',
            convert_urls: false,
            menubar: 'file edit view insert format tools table help',
            branding: false,
            promotion: false, // Hides the Upgrade badge
            object_resizing: true, // Natively enables 8 free-size drag handles on images
            resize_img_proportional: false, // Allows free-size dragging in any direction
            image_dimensions: true, // Enables width & length inputs in dialogs
            image_advtab: true, // Enables Advanced tab for borders & styles
            image_caption: true,
            image_title: true,
            paste_data_images: true, // Allows pasting screenshots directly from clipboard
            automatic_uploads: true,
            images_upload_url: '/admin/blogs/upload-image',
            file_picker_types: 'image',

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
                'insertdatetime', 'media', 'table', 'help', 'wordcount', 'quickbars'
            ],

            toolbar: 'undo redo | blocks fontfamily fontsize | ' +
                     'bold italic underline strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify | ' +
                     'upload_image_btn free_size_image image media table link | bullist numlist outdent indent | ' +
                     'removeformat code fullscreen preview',

            quickbars_selection_toolbar: 'bold italic underline | quicklink h2 h3 blockquote',
            quickbars_insert_toolbar: 'image media table hr',

            image_class_list: [
                { title: 'Responsive (Default)', value: 'img-responsive' },
                { title: 'Float Left (Text wraps around)', value: 'img-float-left' },
                { title: 'Float Right (Text wraps around)', value: 'img-float-right' },
                { title: 'Center Block', value: 'img-center-block' },
                { title: '100% Full Width', value: 'img-full-width' },
                { title: 'Modern Rounded Corners (16px)', value: 'img-rounded-lg' },
                { title: 'Elevated Drop Shadow', value: 'img-shadow-card' }
            ],

            content_style: `
                body {
                    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                    font-size: 15px;
                    line-height: 1.7;
                    color: #1e293b;
                    padding: 1.5rem;
                }
                img {
                    max-width: 100%;
                    cursor: pointer;
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
                img.img-float-left {
                    float: left !important;
                    margin: 0.5rem 1.5rem 1rem 0 !important;
                }
                img.img-float-right {
                    float: right !important;
                    margin: 0.5rem 0 1rem 1.5rem !important;
                }
                img.img-center-block {
                    display: block !important;
                    margin: 1.5rem auto !important;
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
                    margin: 1.5rem 0;
                    text-align: center;
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
                // Register Custom Toolbar Button for Direct Computer Image Upload
                editor.ui.registry.addButton('upload_image_btn', {
                    icon: 'image',
                    text: 'Upload Image',
                    tooltip: 'Directly upload image from computer into article',
                    onAction: () => {
                        triggerDirectImageUpload(editor.id);
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

                // 1. Move to Center of Width (चौड़ाई के बिल्कुल बीच में)
                editor.ui.registry.addButton('quick_img_center', {
                    tooltip: 'Move to Center of Width (चौड़ाई के बीच में)',
                    text: '🎯 Center Width',
                    onAction: () => {
                        const selected = editor.selection.getNode();
                        if (selected && selected.nodeName.toLowerCase() === 'img') {
                            selected.classList.remove('img-float-left', 'img-float-right');
                            selected.classList.add('img-center-block');
                            selected.style.setProperty('display', 'block', 'important');
                            selected.style.setProperty('margin-left', 'auto', 'important');
                            selected.style.setProperty('margin-right', 'auto', 'important');
                            selected.style.removeProperty('float');
                            editor.save();
                            showAdminToast('Image moved to Center of Width (चौड़ाई के बीच में)!', 'success');
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
                                selected.style.setProperty('margin-top', formattedV, 'important');
                                selected.style.setProperty('margin-bottom', formattedV, 'important');
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
                            const currentW = selected.style.width || selected.getAttribute('width') || '100%';
                            const newW = prompt('Enter Image Breadth / Width (e.g. 100%, 75%, 50%, 600px, 400px):', currentW);
                            if (newW && newW.trim()) {
                                const formattedW = newW.includes('%') || newW.includes('px') ? newW.trim() : newW.trim() + 'px';
                                selected.style.setProperty('width', formattedW, 'important');
                                selected.setAttribute('width', formattedW);
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
                                    selected.style.setProperty('height', formattedH, 'important');
                                    selected.style.removeProperty('object-fit');
                                    selected.setAttribute('height', formattedH);
                                }
                                editor.save();
                                showAdminToast('Length set to ' + formattedH, 'success');
                            }
                        }
                    }
                });

                // Contextual Toolbar on Image Selection
                editor.ui.registry.addContextToolbar('image-free-size-toolbar', {
                    predicate: (node) => node.nodeName.toLowerCase() === 'img',
                    items: 'free_size_image quick_img_center quick_img_up quick_img_down quick_img_vspacing quick_img_breadth quick_img_length | alignleft alignright | remove',
                    position: 'node',
                    scope: 'node'
                });

                // Double Click Image Handler to open Free-Size Studio
                editor.on('dblclick', function(e) {
                    if (e.target && e.target.nodeName.toLowerCase() === 'img') {
                        openImageStudioModal(editor.id, e.target);
                    }
                });

                // Strip out any previously applied object-fit: cover so resized images are never cut off
                editor.on('init SetContent', function () {
                    const imgs = editor.dom.select('img');
                    imgs.forEach(img => {
                        if (img.style.objectFit === 'cover') {
                            img.style.removeProperty('object-fit');
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
            const content = document.getElementById('create-blog-content').value;
            if (!content.trim()) {
                alert('Please enter article content!');
                e.preventDefault();
                return false;
            }
        });
    }

    const editForm = document.getElementById('editBlogForm');
    if (editForm) {
        editForm.addEventListener('submit', function(e) {
            if (typeof tinymce !== 'undefined' && tinymce.get('edit-blog-content-input')) {
                tinymce.get('edit-blog-content-input').save();
            }
            const content = document.getElementById('edit-blog-content-input').value;
            if (!content.trim()) {
                alert('Please enter article content!');
                e.preventDefault();
                return false;
            }
        });
    }
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
        document.getElementById('createCoverEmptyState').classList.remove('hidden');
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
        const imgHtml = `<p><img src="${imgUrl}" alt="${cleanAlt}" class="img-responsive" style="max-width: 100%; border-radius: 12px; margin: 16px 0;" /></p>`;
        
        editor.insertContent(imgHtml);
        editor.save();
        updateEditorMetrics(editor);

        showAdminToast('Image uploaded and inserted successfully!', 'success');
    })
    .catch(err => {
        console.error('Image upload failed:', err);
        showAdminToast('Upload failed: ' + err.message, 'error');
        alert('Image upload failed: ' + err.message);
    });
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

        targetStudioImageNode.style.setProperty('width', widthStyle, 'important');
        if (isHeightAuto) {
            targetStudioImageNode.style.removeProperty('height');
            targetStudioImageNode.removeAttribute('height');
        } else {
            const heightStyle = `${hVal}px`;
            targetStudioImageNode.style.setProperty('height', heightStyle, 'important');
            targetStudioImageNode.setAttribute('height', hVal);
        }

        if (fit === 'fill' || fit === 'initial' || !fit) {
            targetStudioImageNode.style.removeProperty('object-fit');
        } else {
            targetStudioImageNode.style.setProperty('object-fit', fit, 'important');
        }
        targetStudioImageNode.style.setProperty('object-position', `${posX} ${posY}`, 'important');
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
            targetStudioImageNode.style.setProperty('float', 'left', 'important');
            targetStudioImageNode.style.setProperty('margin', `${vMarginStyle} 1.5rem ${vMarginStyle} 0`, 'important');
        } else if (studioCurrentAlign === 'float-right') {
            targetStudioImageNode.classList.add('img-float-right');
            targetStudioImageNode.style.setProperty('float', 'right', 'important');
            targetStudioImageNode.style.setProperty('margin', `${vMarginStyle} 0 ${vMarginStyle} 1.5rem`, 'important');
        } else if (studioCurrentAlign === 'center') {
            targetStudioImageNode.classList.add('img-center-block');
            targetStudioImageNode.style.setProperty('display', 'block', 'important');
            targetStudioImageNode.style.setProperty('margin', `${vMarginStyle} auto`, 'important');
        } else if (studioCurrentAlign === 'inline') {
            targetStudioImageNode.style.setProperty('display', 'inline-block', 'important');
            targetStudioImageNode.style.setProperty('margin', `${vMarginStyle} 0.5rem`, 'important');
        }

        // Apply Corner & Shadow
        targetStudioImageNode.classList.remove('img-rounded-lg', 'img-shadow-card');
        if (radius === 'rounded-2xl') targetStudioImageNode.classList.add('img-rounded-lg');
        if (shadow === 'shadow-lg' || shadow === 'shadow-2xl') targetStudioImageNode.classList.add('img-shadow-card');

        // Handle Caption
        const existingFigure = editor.dom.getParent(targetStudioImageNode, 'figure');
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
        } else if (existingFigure) {
            editor.dom.replace(targetStudioImageNode, existingFigure);
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
</script>
@endsection

