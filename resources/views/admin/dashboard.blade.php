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
        <div class="flex items-center justify-between border-b border-slate-100 pb-4 flex-wrap gap-4">
            <div>
                <h2 class="text-xl font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-pen-to-square text-indigo-600"></i> Blog Posts Management
                </h2>
                <p class="text-xs text-slate-400 font-medium mt-1">Publish news, announcements, and technical guides for students.</p>
            </div>
            <span class="text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-full">{{ count($blogs) }} Published</span>
        </div>

        <!-- Create Blog Form -->
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-50/60 p-6 md:p-8 rounded-2xl border border-slate-200 space-y-6">
            @csrf
            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-700">Write New Article</h3>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-xs font-bold text-slate-600">Article Title</label>
                    <input type="text" name="title" placeholder="e.g. Complete AC Repairing Practical Guide 2026" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition">
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="block text-xs font-bold text-slate-600">Custom URL / Slug (Optional)</label>
                    <input type="text" name="slug" placeholder="e.g. ac-repairing-guide" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition">
                    <p class="text-[10px] text-slate-400">Leave blank to auto-generate from title.</p>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-600">Author Name</label>
                    <input type="text" name="author_name" placeholder="e.g. Admin" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-600">Cover Image</label>
                    <input type="file" name="image" accept="image/*" class="w-full bg-white border border-slate-200 rounded-xl p-2 text-xs file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-600">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold text-slate-600">Article Content / Description (Rich Text - MS Word formatting & Links supported)</label>
                <textarea name="content" id="create-blog-content" class="w-full bg-white border border-slate-200 rounded-b-xl text-sm min-h-[250px]"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-8 py-3.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs shadow-md shadow-indigo-100 transition duration-200 flex items-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i> Publish Blog Post
                </button>
            </div>
        </form>

        <!-- Published Blogs Table -->
        <div class="space-y-4">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-700">All Published Articles</h3>
                <input type="text" id="blogSearchInput" onkeyup="filterBlogTable()" placeholder="Search title..." class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-xs w-64 focus:outline-none focus:border-indigo-500">
            </div>

            <div class="overflow-x-auto rounded-2xl border border-slate-200/80 bg-white">
                <table id="blogsTable" class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-slate-400 text-[11px] font-bold uppercase tracking-wider">
                            <th class="p-4">Cover</th>
                            <th class="p-4">Title</th>
                            <th class="p-4">Date</th>
                            <th class="p-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($blogs as $blog)
                            <tr class="blog-row hover:bg-slate-50/80 transition duration-150">
                                <td class="p-4">
                                    <img src="{{ $blog->image_url ? (Str::startsWith($blog->image_url, '/uploads') ? asset($blog->image_url) : asset($blog->image_url)) : asset('assets/images/default-blog.webp') }}" class="w-16 h-12 object-cover rounded-xl border border-slate-200">
                                </td>
                                <td class="p-4">
                                    <h4 class="font-bold text-slate-900 leading-snug blog-title-cell">{{ $blog->title }}</h4>
                                    <p class="text-xs text-slate-400 line-clamp-1 mt-0.5">{{ strip_tags($blog->content) }}</p>
                                </td>
                                <td class="p-4 text-xs font-semibold text-slate-500 whitespace-nowrap">
                                    {{ $blog->created_at->format('M d, Y') }}
                                </td>
                                <td class="p-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <button type="button" onclick="openEditBlogModal({{ json_encode($blog) }})" class="px-3.5 py-1.5 rounded-lg border border-indigo-200 text-indigo-600 hover:bg-indigo-50 font-bold text-xs transition flex items-center gap-1.5">
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
                                <td colspan="4" class="text-center py-10 text-slate-400 text-sm font-medium">No blog posts found.</td>
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
                                        <img src="{{ $photoUrl }}" class="w-10 h-10 rounded-full object-cover border border-slate-200 inline-block" onerror="this.onerror=null; this.src='{{ asset('assets/images/placeholder-user.jpg') }}';">
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
                <img src="{{ $photoUrl }}" class="w-full h-full object-cover" alt="Student Photo" onerror="this.onerror=null; this.src='{{ asset('assets/images/placeholder-user.jpg') }}';">
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

<!-- EDIT BLOG MODAL -->
<div id="editBlogModal" class="fixed inset-0 z-[99] hidden flex items-center justify-center p-4">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-xs" onclick="closeEditBlogModal()"></div>
    
    <!-- Modal Content -->
    <div class="relative w-full max-w-3xl bg-white rounded-3xl shadow-2xl p-6 md:p-8 animate-fade-in max-h-[92vh] overflow-y-auto z-10 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-indigo-600"></i> Edit Published Article
            </h3>
            <button onclick="closeEditBlogModal()" class="text-2xl text-slate-400 hover:text-red-500 font-bold">&times;</button>
        </div>

        <form id="editBlogForm" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-xs font-bold text-slate-600">Article Title</label>
                    <input type="text" id="edit-blog-title" name="title" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50">
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="block text-xs font-bold text-slate-600">Custom URL / Slug (Optional)</label>
                    <input type="text" id="edit-blog-slug" name="slug" placeholder="e.g. ac-repairing-guide" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50">
                    <p class="text-[10px] text-slate-400">Leave blank to auto-generate from title.</p>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-600">Author Name</label>
                    <input type="text" id="edit-blog-author" name="author_name" placeholder="e.g. Admin" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-600">Update Cover Image</label>
                    <input type="file" name="image" accept="image/*" class="w-full bg-white border border-slate-200 rounded-xl p-2 text-xs file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-600">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold text-slate-600">Article Content / Description (Rich Text Editor)</label>
                <textarea name="content" id="edit-blog-content-input" class="w-full bg-white border border-slate-200 rounded-b-xl text-sm min-h-[250px]"></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                <button type="button" onclick="closeEditBlogModal()" class="px-6 py-3 rounded-xl border border-slate-200 text-slate-600 font-semibold text-xs hover:bg-slate-50">
                    Cancel
                </button>
                <button type="submit" class="px-8 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs shadow-md transition">
                    Update Article
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    if (typeof tinymce !== 'undefined') {
        tinymce.init({
            selector: '#create-blog-content, #edit-blog-content-input',
            height: 450,
            menubar: true,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
            'bold italic forecolor backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'image media table link | removeformat | code fullscreen preview',
            image_title: true,
            automatic_uploads: true,
            images_upload_url: "{{ route('admin.blogs.uploadImage') }}",
            file_picker_types: 'image',
            images_upload_handler: function (blobInfo, progress) {
                return new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', "{{ route('admin.blogs.uploadImage') }}");
                    xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");

                    xhr.upload.onprogress = (e) => {
                        progress(e.loaded / e.total * 100);
                    };

                    xhr.onload = function() {
                        if (xhr.status === 403) {
                            reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                            return;
                        }

                        if (xhr.status < 200 || xhr.status >= 300) {
                            reject('HTTP Error: ' + xhr.status);
                            return;
                        }

                        const json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.url != 'string') {
                            reject('Invalid JSON: ' + xhr.responseText);
                            return;
                        }

                        resolve(json.url);
                    };

                    xhr.onerror = function () {
                        reject('Image upload failed due to a XHR Transport error.');
                    };

                    const formData = new FormData();
                    formData.append('image', blobInfo.blob(), blobInfo.filename());

                    xhr.send(formData);
                });
            },
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
            content_style: 'body { font-family:Inter,Helvetica,Arial,sans-serif; font-size:14px; line-height:1.6; } img { max-width: 100%; height: auto; }',
            image_advtab: true,
            image_class_list: [
                {title: 'None', value: ''},
                {title: 'Float Left', value: 'float-left mr-4 mb-4'},
                {title: 'Float Right', value: 'float-right ml-4 mb-4'},
                {title: 'Center', value: 'mx-auto block'}
            ]
        });
    }

    const createForm = document.querySelector('form[action="{{ route('admin.blogs.store') }}"]');
    if (createForm) {
        createForm.addEventListener('submit', function(e) {
            if (typeof tinymce !== 'undefined') {
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
            if (typeof tinymce !== 'undefined') {
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

function openEditBlogModal(blog) {
    const editForm = document.getElementById('editBlogForm');
    if (editForm) {
        editForm.action = '/admin/blogs/update/' + blog.id;
    }
    document.getElementById('edit-blog-title').value = blog.title || '';
    document.getElementById('edit-blog-slug').value = blog.slug || '';
    document.getElementById('edit-blog-author').value = blog.author_name || '';
    
    if (typeof tinymce !== 'undefined' && tinymce.get('edit-blog-content-input')) {
        tinymce.get('edit-blog-content-input').setContent(blog.content || '');
    } else {
        document.getElementById('edit-blog-content-input').value = blog.content || '';
    }
    
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
