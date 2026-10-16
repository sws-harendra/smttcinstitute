@extends('layouts.app')

@section('title', 'Training Gallery & Video Labs | Smart Technical Training Institute Patna')

@section('meta')
    <meta name="description" content="Explore real student practical videos, PCB circuit tracing demonstrations, smartphone IC micro-soldering labs, and air conditioner workbench training at SMTTC Patna.">
    <link rel="canonical" href="{{ route('gallery') }}" />
@endsection

@section('content')

<!-- ================= HERO HEADER ================= -->
<section class="relative bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 text-white py-16 sm:py-24 px-4 overflow-hidden border-b border-slate-800">
    <!-- Ambient glow orbs -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-amber-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10 text-center space-y-5">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-500/15 border border-blue-400/30 text-blue-300 text-xs sm:text-sm font-bold tracking-wide">
            <i class="fa-solid fa-microchip text-amber-400"></i> SMTTC Practical Demonstration Hub
        </div>
        
        <h1 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tight leading-tight">
            Training <span class="bg-gradient-to-r from-amber-400 via-yellow-300 to-amber-500 bg-clip-text text-transparent">Gallery</span> & Video Labs
        </h1>
        
        <p class="max-w-2xl mx-auto text-sm sm:text-base text-slate-300 font-normal leading-relaxed">
            Watch live bench-testing videos, multimeter diagnostics, and real student workbench training across AC PCB, Smartphone hardware, Laptop repair, and Home Appliances.
        </p>

        <!-- Stats Chips -->
        <div class="flex items-center justify-center gap-3 sm:gap-4 pt-2 flex-wrap">
            <div class="bg-white/5 backdrop-blur-md border border-white/10 px-4 py-2 rounded-2xl flex items-center gap-2.5 shadow-sm">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-xs sm:text-sm font-extrabold text-white" id="pubTotalMediaCount">{{ count($galleries) }}</span>
                <span class="text-xs text-slate-400">Total Media</span>
            </div>
            <div class="bg-white/5 backdrop-blur-md border border-white/10 px-4 py-2 rounded-2xl flex items-center gap-2 shadow-sm">
                <span class="text-xs text-slate-300 font-bold">📸 Photos:</span>
                <span class="text-xs font-black text-amber-300">{{ $galleries->where('media_type', 'image')->count() }}</span>
            </div>
            <div class="bg-white/5 backdrop-blur-md border border-white/10 px-4 py-2 rounded-2xl flex items-center gap-2 shadow-sm">
                <span class="text-xs text-slate-300 font-bold">🎥 Videos:</span>
                <span class="text-xs font-black text-indigo-300">{{ $galleries->where('media_type', 'video')->count() }}</span>
            </div>
            @if(isset($beforeAfters) && count($beforeAfters) > 0)
            <a href="#beforeAfterSection" class="bg-white/5 backdrop-blur-md border border-emerald-400/30 px-4 py-2 rounded-2xl flex items-center gap-2 shadow-sm hover:bg-emerald-500/10 transition">
                <span class="text-xs text-emerald-300 font-bold">🔄 Before & After:</span>
                <span class="text-xs font-black text-emerald-300">{{ count($beforeAfters) }} Cases</span>
            </a>
            @endif
        </div>
    </div>
</section>

<!-- ================= TOP: PLACED & SUCCESSFUL STUDENTS LIVE MARQUEE (RIGHT TO LEFT) ================= -->
@if(isset($successfulStudents) && count($successfulStudents) > 0)
<section class="py-5 sm:py-6 bg-slate-950 border-b border-slate-800/90 relative overflow-hidden select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 mb-3 sm:mb-4 flex items-center justify-between gap-3 flex-wrap">
        <div class="flex items-center gap-2.5">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/15 border border-emerald-400/30 text-emerald-400 text-xs sm:text-sm font-black uppercase tracking-wider shadow-sm">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                <span>⭐ Placed & Successful Students</span>
            </span>
            <span class="hidden md:inline-block text-xs sm:text-sm text-slate-300 font-semibold">Our Proud Alumni Running Successful Service Centers & Working in Top Brands</span>
        </div>
        <div class="text-xs sm:text-sm font-black text-amber-400 flex items-center gap-1.5 bg-amber-400/10 px-3 py-1 rounded-full border border-amber-400/20">
            <i class="fa-solid fa-arrow-left animate-pulse text-xs"></i>
            <span>Live Workbench Placements</span>
        </div>
    </div>

    <!-- Infinite Scrolling Track (Right to Left) -->
    <div class="overflow-hidden relative w-full py-2">
        <!-- Ambient Edge Blur Vignettes -->
        <div class="absolute left-0 top-0 bottom-0 w-20 sm:w-32 bg-gradient-to-r from-slate-950 to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-20 sm:w-32 bg-gradient-to-l from-slate-950 to-transparent z-10 pointer-events-none"></div>

        <div class="animate-marquee-rtl flex items-center gap-5 sm:gap-6 py-2">
            <!-- First pass of students -->
            @foreach($successfulStudents as $st)
                <div class="shrink-0 flex items-center gap-4 sm:gap-5 bg-gradient-to-r from-slate-900 via-slate-850 to-slate-900 hover:from-slate-800 hover:to-slate-850 border-2 border-slate-700/80 hover:border-amber-400/70 p-3 sm:p-4 pr-5 sm:pr-6 rounded-3xl shadow-xl transition-all duration-300 group hover:scale-[1.02]">
                    <!-- Large Student Photo -->
                    <div class="relative shrink-0">
                        <img src="{{ Str::startsWith($st->photo, 'http') ? $st->photo : asset(ltrim($st->photo, '/')) }}" 
                             alt="{{ $st->name }}" 
                             class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl object-cover border-2 sm:border-3 border-amber-400 shadow-md group-hover:scale-105 transition duration-300">
                        <span class="absolute -bottom-1 -right-1 w-5 h-5 sm:w-6 sm:h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px] sm:text-xs shadow-md border-2 border-slate-900 font-bold" title="Verified Placed Student">
                            <i class="fa-solid fa-check"></i>
                        </span>
                    </div>

                    <!-- Student Info (Much Bigger & Clearer) -->
                    <div class="space-y-1 min-w-[200px] sm:min-w-[230px]">
                        <div class="flex items-center justify-between gap-2">
                            <h4 class="text-sm sm:text-base font-black text-white whitespace-nowrap group-hover:text-amber-300 transition">
                                {{ $st->name }}
                            </h4>
                            <span class="text-xs text-amber-400 font-black tracking-widest">★★★★★</span>
                        </div>

                        <p class="text-xs sm:text-sm font-extrabold text-sky-300 whitespace-nowrap flex items-center gap-1.5">
                            <i class="fa-solid fa-graduation-cap text-xs text-sky-400"></i>
                            <span>{{ $st->course }}</span>
                        </p>

                        <div class="inline-flex items-center gap-1.5 text-xs font-black text-emerald-300 bg-emerald-500/15 px-3 py-1 rounded-xl border border-emerald-500/30 shadow-xs whitespace-nowrap">
                            <i class="fa-solid fa-briefcase text-xs text-amber-400"></i>
                            <span>{{ $st->achievement }}</span>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Duplicate pass for seamless infinite loop -->
            @foreach($successfulStudents as $st)
                <div class="shrink-0 flex items-center gap-4 sm:gap-5 bg-gradient-to-r from-slate-900 via-slate-850 to-slate-900 hover:from-slate-800 hover:to-slate-850 border-2 border-slate-700/80 hover:border-amber-400/70 p-3 sm:p-4 pr-5 sm:pr-6 rounded-3xl shadow-xl transition-all duration-300 group hover:scale-[1.02]" aria-hidden="true">
                    <!-- Large Student Photo -->
                    <div class="relative shrink-0">
                        <img src="{{ Str::startsWith($st->photo, 'http') ? $st->photo : asset(ltrim($st->photo, '/')) }}" 
                             alt="{{ $st->name }}" 
                             class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl object-cover border-2 sm:border-3 border-amber-400 shadow-md group-hover:scale-105 transition duration-300">
                        <span class="absolute -bottom-1 -right-1 w-5 h-5 sm:w-6 sm:h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px] sm:text-xs shadow-md border-2 border-slate-900 font-bold" title="Verified Placed Student">
                            <i class="fa-solid fa-check"></i>
                        </span>
                    </div>

                    <!-- Student Info (Much Bigger & Clearer) -->
                    <div class="space-y-1 min-w-[200px] sm:min-w-[230px]">
                        <div class="flex items-center justify-between gap-2">
                            <h4 class="text-sm sm:text-base font-black text-white whitespace-nowrap group-hover:text-amber-300 transition">
                                {{ $st->name }}
                            </h4>
                            <span class="text-xs text-amber-400 font-black tracking-widest">★★★★★</span>
                        </div>

                        <p class="text-xs sm:text-sm font-extrabold text-sky-300 whitespace-nowrap flex items-center gap-1.5">
                            <i class="fa-solid fa-graduation-cap text-xs text-sky-400"></i>
                            <span>{{ $st->course }}</span>
                        </p>

                        <div class="inline-flex items-center gap-1.5 text-xs font-black text-emerald-300 bg-emerald-500/15 px-3 py-1 rounded-xl border border-emerald-500/30 shadow-xs whitespace-nowrap">
                            <i class="fa-solid fa-briefcase text-xs text-amber-400"></i>
                            <span>{{ $st->achievement }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ================= INTERACTIVE BEFORE & AFTER REPAIR & SUCCESS STORY STUDIO ================= -->
@if((isset($beforeAfters) && count($beforeAfters) > 0) || (isset($successVideos) && count($successVideos) > 0))
@php
    $initialCase = $beforeAfters->first();
    $beforeImgSrc = $initialCase ? (Str::startsWith($initialCase->before_image, 'http') ? $initialCase->before_image : asset($initialCase->before_image)) : asset('assets/images/g1.webp');
    $afterImgSrc = $initialCase ? (Str::startsWith($initialCase->after_image, 'http') ? $initialCase->after_image : asset($initialCase->after_image)) : asset('assets/images/g2.webp');
    $firstStory = $successVideos->first();
@endphp
<section class="py-12 sm:py-16 bg-slate-900 border-b border-slate-800 relative overflow-hidden" id="beforeAfterSection">
    <!-- Ambient ambient glow -->
    <div class="absolute top-1/2 left-0 w-80 h-80 bg-blue-600/10 rounded-full blur-3xl -translate-y-1/2 pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10 space-y-6">
        
        <!-- 1. SELECT REPAIR CASE BAR (MOVED TO TOP ABOVE LIVE PROOF) -->
        @if(isset($beforeAfters) && count($beforeAfters) > 1)
        <div class="bg-gradient-to-r from-slate-800 via-slate-800/95 to-slate-900 p-2.5 sm:p-3 rounded-2xl border border-slate-700/80 shadow-xl flex items-center justify-between gap-3 overflow-x-auto">
            <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-amber-400/15 border border-amber-400/30 text-amber-400 text-xs font-black uppercase tracking-wider shrink-0">
                <i class="fa-solid fa-hand-pointer text-amber-300 animate-pulse"></i>
                <span>SELECT REPAIR CASE:</span>
            </div>

            <div class="flex items-center gap-2 overflow-x-auto no-scrollbar flex-1">
                @foreach($beforeAfters as $idx => $ba)
                    <button type="button" 
                            data-case-index="{{ $idx }}"
                            onclick="handleSwitchBACase(this)"
                            id="ba-tab-btn-{{ $idx }}" 
                            class="ba-tab-btn px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 whitespace-nowrap shrink-0 {{ $idx === 0 ? 'bg-amber-400 text-slate-950 shadow-md font-black ring-2 ring-amber-300' : 'bg-slate-900/90 text-slate-300 hover:bg-slate-700 hover:text-white border border-slate-700/80' }}">
                        <span class="ba-dot w-2 h-2 rounded-full {{ $idx === 0 ? 'bg-slate-950' : 'bg-amber-400' }}"></span>
                        <span>Case #{{ $idx + 1 }}: {{ Str::limit($ba->title ?: $ba->category, 30) }}</span>
                    </button>
                @endforeach
            </div>

            <div class="hidden md:flex items-center gap-1.5 text-[11px] font-bold text-slate-400 px-2 shrink-0">
                <i class="fa-solid fa-arrows-left-right text-xs text-amber-400"></i>
                <span>Click to switch comparison</span>
            </div>
        </div>
        @endif

        <!-- 2. Section Header (Live Proof...) -->
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 text-xs font-bold uppercase tracking-wider">
                <i class="fa-solid fa-arrows-left-right text-amber-400"></i> Workbench Proof & Success Stories
            </div>
            <h2 class="text-2xl sm:text-4xl font-black text-white tracking-tight">
                Live Proof: <span class="text-amber-400">Before & After</span> Repairs & <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-rose-400">Student Stories</span>
            </h2>
            <p class="text-xs sm:text-sm text-slate-300 max-w-3xl font-normal leading-relaxed">
                Slide the divider left & right to inspect dead circuit boards vs 100% repaired and tested boards. On the right, watch real student success story videos auto-rotating every 5 seconds.
            </p>
        </div>

        <!-- Before & After Comparison Stage (Split Slider on Left + Success Video Rotator on Right) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- LEFT (7 cols): The Interactive Split Slider & Fault Diagnostics -->
            <div class="lg:col-span-7 space-y-4">
                <div class="ba-slider-container relative rounded-3xl overflow-hidden aspect-[16/10] bg-slate-950 border-2 border-slate-700/80 shadow-2xl select-none group" id="baSliderContainer">
                    
                    <!-- 1. Background Image: AFTER (Repaired) -->
                    <img id="baAfterImage" 
                         src="{{ $afterImgSrc }}" 
                         alt="After Repair" 
                         class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                    
                    <!-- AFTER Label (Top Right) -->
                    <div class="absolute top-4 right-4 z-10 pointer-events-none">
                        <span id="baAfterBadge" class="px-3 py-1.5 rounded-full text-xs font-black bg-emerald-600/90 text-white shadow-lg backdrop-blur-md border border-white/20 flex items-center gap-1.5">
                            <i class="fa-solid fa-circle-check text-xs"></i> 
                            <span id="baAfterBadgeText">{{ $initialCase?->after_label ?: 'AFTER (100% Repaired)' }}</span>
                        </span>
                    </div>

                    <!-- 2. Foreground Image: BEFORE (Faulty) (Clipped by width) -->
                    <div id="baBeforeWrapper" 
                         class="absolute inset-0 overflow-hidden pointer-events-none z-10" 
                         style="width: 50%;">
                        <img id="baBeforeImage" 
                             src="{{ $beforeImgSrc }}" 
                             alt="Before Repair" 
                             class="absolute inset-0 w-full h-full object-cover max-w-none pointer-events-none" 
                             style="width: 100%; height: 100%;">
                        
                        <!-- BEFORE Label (Top Left) -->
                        <div class="absolute top-4 left-4 z-20 pointer-events-none">
                            <span id="baBeforeBadge" class="px-3 py-1.5 rounded-full text-xs font-black bg-red-600/90 text-white shadow-lg backdrop-blur-md border border-white/20 flex items-center gap-1.5">
                                <i class="fa-solid fa-triangle-exclamation text-xs"></i> 
                                <span id="baBeforeBadgeText">{{ $initialCase?->before_label ?: 'BEFORE (Faulty / Dead)' }}</span>
                            </span>
                        </div>
                    </div>

                    <!-- 3. Vertical Dividing Line & Draggable Handle -->
                    <div id="baDividerHandle" 
                         class="absolute top-0 bottom-0 z-20 pointer-events-none flex items-center justify-center -translate-x-1/2" 
                         style="left: 50%;">
                        <div class="w-1 h-full bg-white shadow-[0_0_12px_rgba(255,255,255,0.8)]"></div>
                        <div class="absolute w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-amber-400 text-slate-950 font-black shadow-2xl border-3 border-white flex items-center justify-center text-sm transform transition-transform group-hover:scale-110 active:scale-95 cursor-ew-resize">
                            <i class="fa-solid fa-arrows-left-right text-base animate-pulse"></i>
                        </div>
                    </div>

                    <!-- Range input overlay -->
                    <input type="range" 
                           id="baRangeSlider" 
                           min="0" 
                           max="100" 
                           value="50" 
                           aria-label="Before and after comparison slider"
                           class="absolute inset-0 w-full h-full opacity-0 cursor-ew-resize z-30 m-0 p-0">
                    
                    <!-- Bottom Tip Instruction -->
                    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 pointer-events-none z-10 opacity-75 group-hover:opacity-100 transition">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-slate-950/80 text-white backdrop-blur-md border border-white/10 flex items-center gap-1">
                            <i class="fa-solid fa-hand-pointer"></i> Drag or swipe divider left & right
                        </span>
                    </div>
                </div>

                <!-- Practical Case Details Underneath Slider -->
                <div class="bg-slate-800/80 rounded-3xl p-5 sm:p-6 border border-slate-700/80 shadow-xl space-y-4">
                    <div class="flex items-center justify-between gap-2">
                        <span id="baDetailCategory" class="px-3 py-1 rounded-full text-[11px] font-bold bg-blue-500/20 text-blue-300 border border-blue-400/30">
                            {{ $initialCase?->category ?? 'AC & HVAC PCB Repairing' }}
                        </span>
                        
                        <button type="button" 
                                onclick="likeCurrentBeforeAfter()" 
                                id="baLikeBtn"
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-700/80 hover:bg-red-500/20 text-slate-300 hover:text-red-400 text-xs font-bold transition border border-slate-600 hover:border-red-400/30">
                            <i class="fa-solid fa-heart text-red-500"></i>
                            <span id="baLikesCount">{{ $initialCase?->likes_count ?? 15 }}</span>
                            <span class="text-[10px] text-slate-400">Helpful</span>
                        </button>
                    </div>

                    <h3 id="baDetailTitle" class="text-base sm:text-lg font-black text-white leading-snug">
                        {{ $initialCase?->title ?? 'Inverter AC Outdoor PCB - IPM Circuit Repair' }}
                    </h3>

                    <!-- Problem vs Solution Box -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <div class="p-3.5 rounded-2xl bg-red-950/30 border border-red-500/20 space-y-1">
                            <div class="flex items-center gap-1.5 text-xs font-bold text-red-400">
                                <i class="fa-solid fa-circle-xmark"></i> Fault Diagnosed (समस्या)
                            </div>
                            <p id="baDetailFault" class="text-xs text-slate-300 leading-relaxed font-normal">
                                {{ $initialCase?->fault_description ?: 'Dead circuitry, shorted components, and communication failure.' }}
                            </p>
                        </div>

                        <div class="p-3.5 rounded-2xl bg-emerald-950/30 border border-emerald-500/20 space-y-1">
                            <div class="flex items-center gap-1.5 text-xs font-bold text-emerald-400">
                                <i class="fa-solid fa-circle-check"></i> Repaired Procedure (समाधान)
                            </div>
                            <p id="baDetailSolution" class="text-xs text-slate-300 leading-relaxed font-normal">
                                {{ $initialCase?->repair_solution ?: 'Micro-soldering, IC replacement, trace reconstruction, and live workbench testing.' }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between flex-wrap gap-3 pt-1">
                        <div class="flex items-center gap-2 text-xs text-slate-300">
                            <i class="fa-solid fa-screwdriver-wrench text-amber-400"></i>
                            <span class="text-slate-400 text-[11px]">Tools:</span>
                            <span id="baDetailTools" class="font-bold text-slate-200">{{ $initialCase?->tools_used ?? 'SMD Rework Station, Digital Multimeter, DSO' }}</span>
                        </div>

                        <a id="baWhatsAppLink" 
                           href="https://wa.me/917870516006?text={{ urlencode('Hello SMTTC, maine aapki gallery me Before/After repair case dekha: ' . ($initialCase?->title ?? 'Repair Case') . '. Mujhe is practical course ki fees aur details chahiye.') }}" 
                           target="_blank" 
                           rel="noopener"
                           class="py-2 px-3.5 rounded-xl bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-extrabold text-xs transition shadow-md flex items-center gap-1.5 ml-auto">
                            <i class="fa-brands fa-whatsapp text-sm"></i>
                            <span>Ask Course Fee On WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- RIGHT (5 cols): DYNAMIC SUCCESS STORY VIDEO ROTATOR (CHANGES EVERY 5 SECONDS) -->
            <div class="lg:col-span-5 bg-gradient-to-b from-slate-800/90 via-slate-800/70 to-slate-900/95 rounded-3xl p-5 sm:p-6 border border-slate-700/80 shadow-2xl space-y-4" id="successStoryRotatorCard">
                <div class="space-y-3">
                    <!-- Header with 5-Second Timer Indicator -->
                    <div class="flex items-center justify-between gap-2">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-500/15 border border-red-400/30 text-red-400 text-xs font-black uppercase tracking-wider">
                            <span class="w-2 h-2 rounded-full bg-red-500 animate-ping"></span>
                            <span>🎥 Video Success Story</span>
                        </div>
                        
                        <div class="flex items-center gap-1.5 text-[11px] font-bold text-amber-400 bg-amber-400/10 border border-amber-400/20 px-2.5 py-1 rounded-full">
                            <i class="fa-solid fa-clock-rotate-left text-[10px]"></i>
                            <span>Changes every <strong id="storyTimerCountdown">5s</strong></span>
                        </div>
                    </div>

                    <!-- 5-Second Progress Bar -->
                    <div class="w-full bg-slate-700/60 h-1.5 rounded-full overflow-hidden">
                        <div id="storyProgressBar" class="h-full bg-gradient-to-r from-amber-400 via-yellow-400 to-amber-500 transition-all duration-100 ease-linear" style="width: 0%;"></div>
                    </div>

                    <!-- Video Preview Card -->
                    <div class="relative rounded-2xl overflow-hidden aspect-video bg-black border border-slate-700 shadow-xl group cursor-pointer" onclick="playCurrentSuccessStoryVideo()">
                        <img id="storyVideoThumb" 
                             src="{{ $firstStory?->thumbnail_url ? (Str::startsWith($firstStory->thumbnail_url, 'http') ? $firstStory->thumbnail_url : asset(ltrim($firstStory->thumbnail_url, '/'))) : asset('assets/images/g1.webp') }}" 
                             alt="Student Success Story" 
                             class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-black/40 to-black/20"></div>
                        
                        <!-- Floating Earning Badge on video -->
                        <div class="absolute top-3 right-3 z-10">
                            <span id="storyEarningBadge" class="px-3 py-1 rounded-full text-xs font-black bg-gradient-to-r from-emerald-500 to-green-600 text-white shadow-lg border border-white/20 flex items-center gap-1">
                                <i class="fa-solid fa-coins text-amber-300"></i>
                                <span id="storyEarningText">{{ $firstStory?->earning_badge ?? 'Earns ₹50,000+/mo' }}</span>
                            </span>
                        </div>

                        <!-- Big Glowing Play Button -->
                        <div class="absolute inset-0 flex items-center justify-center z-10">
                            <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-full bg-red-600 group-hover:bg-red-500 text-white flex items-center justify-center text-xl sm:text-2xl shadow-2xl transition transform group-hover:scale-115 active:scale-95 animate-pulse">
                                <i class="fa-solid fa-play ml-1"></i>
                            </div>
                        </div>

                        <!-- Video Title in Card Overlay -->
                        <div class="absolute bottom-3 left-3 right-3 z-10">
                            <p id="storyVideoTitle" class="text-xs sm:text-sm font-black text-white drop-shadow-md line-clamp-1">
                                {{ $firstStory?->title ?? 'Student Real Practical Success Story' }}
                            </p>
                        </div>
                    </div>

                    <!-- Student Profile & Testimonial Quote -->
                    <div class="space-y-2 pt-1">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 id="storyStudentName" class="text-sm sm:text-base font-black text-white flex items-center gap-1.5">
                                    <span>{{ $firstStory?->student_name ?? 'Student Alumni' }}</span>
                                    <i class="fa-solid fa-circle-check text-blue-400 text-xs" title="Verified Student"></i>
                                </h4>
                                <p id="storyCourseName" class="text-xs font-bold text-amber-400">
                                    {{ $firstStory?->course ?? 'Practical Technical Course' }}
                                </p>
                            </div>
                            
                            <!-- Story Indicator Dots -->
                            @if(isset($successVideos) && count($successVideos) > 1)
                            <div class="flex items-center gap-1" id="storyDotsContainer">
                                @foreach($successVideos as $sIdx => $sv)
                                    <button type="button" 
                                            data-story-idx="{{ $sIdx }}" 
                                            onclick="handleSelectSuccessStory(this)" 
                                            class="story-dot w-2 h-2 rounded-full transition-all {{ $sIdx === 0 ? 'bg-amber-400 w-5' : 'bg-slate-600' }}"></button>
                                @endforeach
                            </div>
                            @endif
                        </div>

                        <p id="storyDescriptionText" class="text-xs text-slate-300 leading-relaxed font-normal line-clamp-2 italic">
                            "{{ $firstStory?->story_description ?? '100% practical lab training helped me learn real fault-finding and start my own technical career.' }}"
                        </p>
                    </div>
                </div>

                <!-- Bottom Controls: Prev / Pause / Next + WhatsApp Enquire -->
                <div class="pt-3 border-t border-slate-700/80 flex items-center justify-between gap-3">
                    <div class="flex items-center gap-1.5">
                        <button type="button" onclick="prevSuccessStory()" class="w-8 h-8 rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-200 transition flex items-center justify-center text-xs" title="Previous Story">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button type="button" onclick="toggleStoryAutoPlay()" id="storyPauseBtn" class="px-2.5 py-1.5 rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-200 transition flex items-center gap-1 text-[11px] font-bold" title="Pause / Play Auto-Rotation">
                            <i class="fa-solid fa-pause text-[10px]"></i>
                        </button>
                        <button type="button" onclick="nextSuccessStory()" class="w-8 h-8 rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-200 transition flex items-center justify-center text-xs" title="Next Story">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>

                    <a id="storyWhatsAppBtn" 
                       href="https://wa.me/917870516006?text={{ urlencode('Hello SMTTC, maine aapki gallery me student success story dekhi: ' . ($firstStory?->student_name ?? 'Alumni') . '. Mujhe is course ki details chahiye.') }}" 
                       target="_blank" 
                       rel="noopener"
                       class="py-2 px-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-extrabold text-xs transition shadow-md flex items-center gap-1.5 whitespace-nowrap">
                        <i class="fa-brands fa-whatsapp text-sm"></i>
                        <span>Enquire Course</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    @php
        $baPayload = ($beforeAfters ?? collect())->map(function($ba) {
            return [
                'id' => $ba->id,
                'title' => $ba->title,
                'category' => $ba->category,
                'before_image' => Str::startsWith($ba->before_image, 'http') ? $ba->before_image : asset($ba->before_image),
                'after_image' => Str::startsWith($ba->after_image, 'http') ? $ba->after_image : asset($ba->after_image),
                'before_label' => $ba->before_label,
                'after_label' => $ba->after_label,
                'fault_description' => $ba->fault_description,
                'repair_solution' => $ba->repair_solution,
                'tools_used' => $ba->tools_used,
                'likes_count' => $ba->likes_count,
            ];
        });
        $storyPayload = ($successVideos ?? collect())->map(function($sv) {
            return [
                'id' => $sv->id,
                'student_name' => $sv->student_name,
                'course' => $sv->course,
                'title' => $sv->title,
                'video_url' => $sv->video_url,
                'embed_url' => $sv->embed_url,
                'thumbnail_url' => $sv->thumbnail_url ? (Str::startsWith($sv->thumbnail_url, 'http') ? $sv->thumbnail_url : asset(ltrim($sv->thumbnail_url, '/'))) : asset('assets/images/g1.webp'),
                'earning_badge' => $sv->earning_badge,
                'story_description' => $sv->story_description,
            ];
        });
    @endphp
    <div id="baDataStore" class="hidden"
         data-cases="{{ base64_encode(json_encode($baPayload)) }}"
         data-stories="{{ base64_encode(json_encode($storyPayload)) }}">
    </div>
</section>
@endif

<!-- ================= INTERACTIVE FILTER & SEARCH TOOLBAR ================= -->
<section class="bg-slate-900 border-b border-slate-800 sticky top-0 z-30 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 space-y-3 sm:space-y-4">
        <!-- Top row: Media Type Tabs + Search Bar -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-3 sm:gap-4">
            
            <!-- Type Tabs (All / Photos / Videos) -->
            <div class="inline-flex p-1 bg-slate-800/80 rounded-2xl border border-slate-700/80 text-xs font-bold shrink-0 shadow-inner">
                <button type="button" onclick="setPublicTypeFilter('all', this)" id="tab-all-media" class="pub-type-btn px-4 py-2 rounded-xl transition bg-blue-600 text-white shadow-sm flex items-center gap-1.5">
                    <i class="fa-solid fa-shapes"></i> All Media ({{ count($galleries) }})
                </button>
                <button type="button" onclick="setPublicTypeFilter('image', this)" class="pub-type-btn px-4 py-2 rounded-xl transition text-slate-300 hover:text-white flex items-center gap-1.5">
                    <i class="fa-regular fa-image text-amber-400"></i> Photos ({{ $galleries->where('media_type', 'image')->count() }})
                </button>
                <button type="button" onclick="setPublicTypeFilter('video', this)" class="pub-type-btn px-4 py-2 rounded-xl transition text-slate-300 hover:text-white flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-play text-red-400"></i> Videos ({{ $galleries->where('media_type', 'video')->count() }})
                </button>
            </div>

            <!-- Search Bar + Results count -->
            <div class="flex items-center gap-3 w-full md:w-auto">
                <div class="relative flex-1 md:w-72">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                    <input type="text" id="publicGallerySearch" onkeyup="filterPublicGallery()" placeholder="Search practical topic, PCB, tool..." class="w-full bg-slate-800/90 border border-slate-700 rounded-xl pl-9 pr-8 py-2 text-xs font-medium text-white placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition">
                    <button type="button" onclick="clearPublicGallerySearch()" id="clearSearchBtn" class="hidden absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-white text-xs">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="hidden sm:inline-flex items-center px-3 py-2 rounded-xl bg-slate-800 text-[11px] font-semibold text-slate-300 border border-slate-700 whitespace-nowrap">
                    Showing <span id="publicVisibleCount" class="font-bold text-amber-400 mx-1">{{ count($galleries) }}</span> items
                </div>
            </div>
        </div>

        <!-- Bottom row: Horizontal Category Filter Chips -->
        @php
            $rawCats = $galleries->pluck('category')->filter()->unique();
            $standardCats = [
                'AC & HVAC PCB Repairing',
                'Smartphone Hardware & Micro-soldering',
                'Laptop Chip Level Repairing',
                'Home Appliances (Fridge/Washing Machine)',
                'Student Lab Practicals',
                'Events & Certificate Ceremonies'
            ];
            $allUniqueCats = collect($standardCats)->merge($rawCats)->unique()->values();
        @endphp
        <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-thin scrollbar-thumb-slate-700">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 shrink-0 mr-1 flex items-center gap-1">
                <i class="fa-solid fa-tags text-[10px] text-blue-400"></i> Category:
            </span>
            <button type="button" onclick="setPublicCategoryFilter('all', this)" class="pub-cat-chip active shrink-0 px-3 py-1.5 rounded-full text-xs font-semibold bg-white text-slate-900 shadow-sm transition">
                All Categories
            </button>
            @foreach($allUniqueCats as $cat)
                @php
                    $catCount = $galleries->filter(function($g) use ($cat) {
                        return strcasecmp($g->category ?? '', $cat) === 0;
                    })->count();
                @endphp
                <button type="button" onclick="setPublicCategoryFilter('{{ strtolower($cat) }}', this)" class="pub-cat-chip shrink-0 px-3 py-1.5 rounded-full text-xs font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white border border-slate-700/60 transition">
                    {{ $cat }}
                    @if($catCount > 0)
                        <span class="ml-1 text-[10px] opacity-75 font-bold">({{ $catCount }})</span>
                    @endif
                </button>
            @endforeach
        </div>
    </div>
</section>

<!-- ================= MEDIA GRID SHOWCASE ================= -->
<section class="py-12 sm:py-20 bg-slate-950 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        
        <!-- Grid Cards Container -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-7" id="publicGalleryGrid">
            @forelse($galleries as $gallery)
                @php
                    $isVid = $gallery->media_type === 'video';
                    $thumbSrc = $gallery->thumbnail_url ?: $gallery->image_url;
                    $displayThumb = $thumbSrc ? (Str::startsWith($thumbSrc, 'http') ? $thumbSrc : asset($thumbSrc)) : asset('assets/images/g1.webp');

                    $galleryPayload = base64_encode(json_encode([
                        'id' => $gallery->id,
                        'title' => $gallery->title ?: 'SMTTC Practical Demonstration',
                        'category' => $gallery->category ?: 'General',
                        'description' => $gallery->description ?: 'Workbench practical training session at SMTTC Institute Patna.',
                        'media_type' => $gallery->media_type ?: 'image',
                        'image_url' => $gallery->image_url ? (Str::startsWith($gallery->image_url, 'http') ? $gallery->image_url : asset($gallery->image_url)) : '',
                        'video_url' => $gallery->video_url ? (Str::startsWith($gallery->video_url, 'http') ? $gallery->video_url : asset($gallery->video_url)) : '',
                        'thumbnail_url' => $gallery->thumbnail_url ? (Str::startsWith($gallery->thumbnail_url, 'http') ? $gallery->thumbnail_url : asset($gallery->thumbnail_url)) : '',
                        'embed_url' => $gallery->embed_url ?? '',
                        'created_at_formatted' => $gallery->created_at ? $gallery->created_at->format('M d, Y') : ''
                    ]));
                @endphp

                <article class="pub-gallery-card group relative bg-slate-900 rounded-3xl overflow-hidden border border-slate-800 hover:border-blue-500/50 shadow-lg hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-300 flex flex-col justify-between cursor-pointer"
                         data-type="{{ $gallery->media_type ?: 'image' }}"
                         data-category="{{ strtolower($gallery->category ?? 'general') }}"
                         data-search="{{ strtolower(($gallery->title ?? '') . ' ' . ($gallery->description ?? '') . ' ' . ($gallery->category ?? '')) }}"
                         data-gallery="{{ $galleryPayload }}"
                         onclick="openPublicMediaModal(this)">
                    
                    <div>
                        <!-- Thumbnail View Area -->
                        <div class="relative overflow-hidden aspect-[16/10] bg-slate-950">
                            <img src="{{ $displayThumb }}" alt="{{ $gallery->title ?: 'SMTTC Practical' }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500">
                            
                            <!-- Dark Gradient Overlay for Readability -->
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-black/40"></div>

                            <!-- Top Badges (Category + Type) -->
                            <div class="absolute top-3 left-3 right-3 flex items-center justify-between gap-2 z-10">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-950/80 backdrop-blur-md text-amber-300 border border-amber-400/20 shadow-xs truncate max-w-[70%]">
                                    {{ $gallery->category ?: 'General' }}
                                </span>

                                @if($isVid)
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-red-600 text-white shadow-md flex items-center gap-1 animate-pulse">
                                        <i class="fa-solid fa-play text-[8px]"></i> Video
                                    </span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-slate-900/80 text-slate-300 shadow-xs flex items-center gap-1 border border-white/10">
                                        <i class="fa-regular fa-image text-[8px]"></i> Photo
                                    </span>
                                @endif
                            </div>

                            <!-- Play Overlay (Only for Videos) -->
                            @if($isVid)
                                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                    <div class="w-13 h-13 rounded-full bg-gradient-to-tr from-red-600 to-amber-500 text-white flex items-center justify-center text-base shadow-xl group-hover:scale-115 transition-transform duration-300">
                                        <i class="fa-solid fa-play ml-1"></i>
                                    </div>
                                </div>
                            @else
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 bg-slate-950/40">
                                    <div class="w-11 h-11 rounded-full bg-white/20 backdrop-blur-md text-white flex items-center justify-center text-sm shadow-md">
                                        <i class="fa-solid fa-expand"></i>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Card Information Body -->
                        <div class="p-5 space-y-2">
                            <h3 class="font-extrabold text-white text-base leading-snug line-clamp-2 group-hover:text-amber-400 transition" title="{{ $gallery->title ?: 'SMTTC Practical Demonstration' }}">
                                {{ $gallery->title ?: 'SMTTC Practical Demonstration' }}
                            </h3>
                            <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed">
                                {{ $gallery->description ?: 'Real hands-on workbench session with diagnostic tools and testing equipment.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Card Footer Action -->
                    <div class="p-4 bg-slate-900/80 border-t border-slate-800 flex items-center justify-between text-xs text-slate-400">
                        <span class="text-[11px] font-medium flex items-center gap-1 text-slate-500">
                            <i class="fa-regular fa-calendar text-[10px]"></i> {{ $gallery->created_at->format('M d, Y') }}
                        </span>

                        <div class="inline-flex items-center gap-1 font-bold text-xs {{ $isVid ? 'text-red-400 group-hover:text-red-300' : 'text-blue-400 group-hover:text-blue-300' }} transition">
                            <span>{{ $isVid ? 'Watch Video' : 'View Photo' }}</span>
                            <i class="fa-solid fa-arrow-right text-[10px] transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-20 text-center bg-slate-900/60 rounded-3xl border border-dashed border-slate-800 space-y-4">
                    <div class="w-16 h-16 mx-auto rounded-3xl bg-blue-500/10 text-blue-400 flex items-center justify-center text-3xl shadow-inner">
                        <i class="fa-solid fa-photo-film"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white">Gallery Content Coming Soon</h3>
                    <p class="text-xs text-slate-400 max-w-md mx-auto">
                        Our instructors are uploading new practical workbench repair videos and lab photos. Please check back shortly!
                    </p>
                </div>
            @endforelse
        </div>

        <!-- No Results from Search/Filter State -->
        <div id="publicGalleryNoResults" class="hidden py-16 text-center bg-slate-900/60 rounded-3xl border border-dashed border-slate-800 space-y-4">
            <div class="w-16 h-16 mx-auto rounded-3xl bg-amber-500/10 text-amber-400 flex items-center justify-center text-3xl">
                <i class="fa-solid fa-filter-circle-xmark"></i>
            </div>
            <h3 class="text-base font-bold text-white">No media found matching this filter</h3>
            <p class="text-xs text-slate-400 max-w-sm mx-auto">Try clearing your search query or selecting a different category tag.</p>
            <button type="button" onclick="resetPublicGalleryFilters()" class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition inline-flex items-center gap-2">
                <i class="fa-solid fa-rotate-left"></i> Reset All Filters
            </button>
        </div>

    </div>
</section>

<!-- ================= PUBLIC INTERACTIVE LIGHTBOX & VIDEO PLAYER MODAL ================= -->
<div id="publicMediaModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-3 sm:p-6" role="dialog" aria-modal="true">
    <!-- Backdrop Blur Overlay -->
    <div class="absolute inset-0 bg-slate-950/90 backdrop-blur-md transition-opacity" onclick="closePublicMediaModal()"></div>

    <!-- Modal Box Container -->
    <div class="relative w-full max-w-4xl bg-slate-900 rounded-3xl shadow-2xl overflow-hidden border border-slate-800 animate-fade-in z-10 flex flex-col max-h-[94vh]">
        
        <!-- Header Bar -->
        <div class="flex items-center justify-between p-4 sm:px-6 bg-slate-950/80 border-b border-white/10 z-20">
            <div class="flex items-center gap-2.5">
                <span id="pubModalCategory" class="px-3 py-1 rounded-full text-xs font-bold bg-amber-400/15 text-amber-300 border border-amber-400/30">
                    Category Tag
                </span>
                <span id="pubModalTypeBadge" class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white/10 text-slate-300">
                    Media
                </span>
            </div>
            
            <button type="button" onclick="closePublicMediaModal()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-slate-300 hover:text-white flex items-center justify-center transition shadow-sm" title="Close (Esc)">
                <i class="fa-solid fa-xmark text-base"></i>
            </button>
        </div>

        <!-- Central Media Viewer Area -->
        <div class="relative bg-black flex items-center justify-center flex-1 min-h-[280px] sm:min-h-[380px] overflow-hidden">
            <!-- 1. Photo Image View -->
            <div id="pubModalImageContainer" class="hidden w-full max-h-[65vh] flex items-center justify-center p-2">
                <img id="pubModalImg" src="" alt="Practical Photo" class="max-h-[62vh] max-w-full object-contain rounded-xl shadow-2xl">
            </div>

            <!-- 2. YouTube Iframe Video Player -->
            <div id="pubModalIframeContainer" class="hidden w-full aspect-video bg-black">
                <iframe id="pubModalIframe" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <!-- 3. Direct HTML5 Video Player -->
            <div id="pubModalVideoContainer" class="hidden w-full aspect-video bg-black flex items-center justify-center">
                <video id="pubModalVideo" class="w-full h-full max-h-[65vh]" controls playsinline preload="metadata">
                    <source id="pubModalVideoSource" src="" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
            </div>
        </div>

        <!-- Bottom Drawer: Title & Description -->
        <div class="p-5 sm:p-7 bg-slate-900 border-t border-white/10 space-y-3 max-h-56 overflow-y-auto">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <h2 id="pubModalTitle" class="text-base sm:text-xl font-black text-white leading-snug">
                    Practical Demonstration Title
                </h2>
                <span id="pubModalDate" class="text-xs font-semibold text-slate-400 shrink-0"></span>
            </div>

            <p id="pubModalDescription" class="text-xs sm:text-sm text-slate-300 leading-relaxed font-normal whitespace-pre-line">
                Detailed description of the practical repair demonstration and workbench procedures.
            </p>

            <div class="pt-2 flex items-center justify-between flex-wrap gap-3 border-t border-slate-800">
                <span class="text-[11px] text-slate-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-graduation-cap text-amber-400"></i> Smart Technical Training Institute Patna
                </span>
                <a href="{{ route('admission') }}" class="px-4 py-1.5 rounded-xl bg-amber-400 hover:bg-amber-500 text-slate-950 font-extrabold text-xs transition inline-flex items-center gap-1.5 shadow-sm">
                    <span>Learn This in Class</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        </div>

    </div>
</div>

@php
    $baDataArray = [];
    if (isset($beforeAfters)) {
        foreach($beforeAfters as $ba) {
            $baDataArray[] = [
                'id' => $ba->id,
                'title' => $ba->title,
                'category' => $ba->category,
                'before_image' => Str::startsWith($ba->before_image, 'http') ? $ba->before_image : asset($ba->before_image),
                'after_image' => Str::startsWith($ba->after_image, 'http') ? $ba->after_image : asset($ba->after_image),
                'before_label' => $ba->before_label ?: 'Before (Faulty / Dead)',
                'after_label' => $ba->after_label ?: 'After (100% Repaired)',
                'fault_description' => $ba->fault_description,
                'repair_solution' => $ba->repair_solution,
                'tools_used' => $ba->tools_used,
                'likes_count' => (int) $ba->likes_count
            ];
        }
    }
    $baEncodedData = base64_encode(json_encode($baDataArray));
@endphp
<div id="baDataStore" data-cases="{{ $baEncodedData }}" class="hidden"></div>

<!-- ================= GALLERY CLIENT SCRIPTS ================= -->
<script>
let currentPublicType = 'all';
let currentPublicCategory = 'all';

function setPublicTypeFilter(type, btn) {
    currentPublicType = type;
    document.querySelectorAll('.pub-type-btn').forEach(b => {
        b.className = 'pub-type-btn px-4 py-2 rounded-xl transition text-slate-300 hover:text-white flex items-center gap-1.5';
    });
    if (btn) {
        btn.className = 'pub-type-btn px-4 py-2 rounded-xl transition bg-blue-600 text-white shadow-sm flex items-center gap-1.5 font-bold';
    }
    filterPublicGallery();
}

function setPublicCategoryFilter(cat, btn) {
    currentPublicCategory = cat.toLowerCase();
    document.querySelectorAll('.pub-cat-chip').forEach(c => {
        c.className = 'pub-cat-chip shrink-0 px-3 py-1.5 rounded-full text-xs font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white border border-slate-700/60 transition';
    });
    if (btn) {
        btn.className = 'pub-cat-chip active shrink-0 px-3 py-1.5 rounded-full text-xs font-semibold bg-white text-slate-900 shadow-sm transition font-bold';
    }
    filterPublicGallery();
}

function clearPublicGallerySearch() {
    const input = document.getElementById('publicGallerySearch');
    if (input) {
        input.value = '';
        document.getElementById('clearSearchBtn').classList.add('hidden');
        filterPublicGallery();
    }
}

function resetPublicGalleryFilters() {
    const allTypeBtn = document.getElementById('tab-all-media');
    const firstCatChip = document.querySelector('.pub-cat-chip');
    clearPublicGallerySearch();
    if (allTypeBtn) setPublicTypeFilter('all', allTypeBtn);
    if (firstCatChip) setPublicCategoryFilter('all', firstCatChip);
}

function filterPublicGallery() {
    const searchInput = document.getElementById('publicGallerySearch');
    const query = (searchInput?.value || '').trim().toLowerCase();
    const clearBtn = document.getElementById('clearSearchBtn');
    
    if (clearBtn) {
        if (query.length > 0) clearBtn.classList.remove('hidden');
        else clearBtn.classList.add('hidden');
    }

    const cards = document.querySelectorAll('.pub-gallery-card');
    let visibleCount = 0;

    cards.forEach(card => {
        const itemType = card.getAttribute('data-type') || 'image';
        const itemCat = (card.getAttribute('data-category') || '').toLowerCase();
        const itemSearch = (card.getAttribute('data-search') || '').toLowerCase();

        const matchType = (currentPublicType === 'all') || (itemType === currentPublicType);
        const matchCategory = (currentPublicCategory === 'all') || (itemCat === currentPublicCategory) || itemCat.includes(currentPublicCategory);
        const matchQuery = (!query) || itemSearch.includes(query);

        if (matchType && matchCategory && matchQuery) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    const countEl = document.getElementById('publicVisibleCount');
    if (countEl) countEl.innerText = visibleCount;

    const noResultsEl = document.getElementById('publicGalleryNoResults');
    if (noResultsEl) {
        if (visibleCount === 0 && cards.length > 0) {
            noResultsEl.classList.remove('hidden');
        } else {
            noResultsEl.classList.add('hidden');
        }
    }
}

function openPublicMediaModal(cardEl) {
    const rawData = cardEl.getAttribute('data-gallery');
    if (!rawData) return;

    let data;
    try {
        data = JSON.parse(atob(rawData));
    } catch(e) {
        console.error('Failed to parse gallery item data:', e);
        return;
    }

    const modal = document.getElementById('publicMediaModal');
    if (!modal) return;

    // Set Text Content
    document.getElementById('pubModalTitle').innerText = data.title || 'SMTTC Practical Demonstration';
    document.getElementById('pubModalCategory').innerText = data.category || 'General';
    document.getElementById('pubModalDate').innerText = data.created_at_formatted ? ('Published: ' + data.created_at_formatted) : '';
    document.getElementById('pubModalDescription').innerText = data.description || 'Workbench training session at SMTTC Patna.';

    const typeBadge = document.getElementById('pubModalTypeBadge');
    const imgContainer = document.getElementById('pubModalImageContainer');
    const iframeContainer = document.getElementById('pubModalIframeContainer');
    const videoContainer = document.getElementById('pubModalVideoContainer');
    const previewImg = document.getElementById('pubModalImg');
    const iframe = document.getElementById('pubModalIframe');
    const video = document.getElementById('pubModalVideo');
    const videoSrc = document.getElementById('pubModalVideoSource');

    // Reset Containers
    imgContainer.classList.add('hidden');
    iframeContainer.classList.add('hidden');
    videoContainer.classList.add('hidden');
    iframe.src = '';
    if (video) {
        video.pause();
        if (videoSrc) videoSrc.src = '';
    }

    if (data.media_type === 'video') {
        typeBadge.innerText = '🎥 Video Demonstration';
        typeBadge.className = 'px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-red-600 text-white shadow-xs';

        if (data.embed_url) {
            const embedSrc = data.embed_url + (data.embed_url.includes('?') ? '&' : '?') + 'autoplay=1';
            iframe.src = embedSrc;
            iframeContainer.classList.remove('hidden');
        } else if (data.video_url) {
            const ytMatch = data.video_url.match(/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|shorts\/))([a-zA-Z0-9_-]{11})/);
            if (ytMatch && ytMatch[1]) {
                iframe.src = 'https://www.youtube.com/embed/' + ytMatch[1] + '?autoplay=1';
                iframeContainer.classList.remove('hidden');
            } else {
                if (video && videoSrc) {
                    videoSrc.src = data.video_url;
                    video.load();
                    videoContainer.classList.remove('hidden');
                    video.play().catch(e => console.log('Autoplay prevented:', e));
                }
            }
        }
    } else {
        typeBadge.innerText = '📸 High-Res Photo';
        typeBadge.className = 'px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white/10 text-slate-300';
        previewImg.src = data.image_url || data.thumbnail_url || '/assets/images/g1.webp';
        imgContainer.classList.remove('hidden');
    }

    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closePublicMediaModal() {
    const modal = document.getElementById('publicMediaModal');
    if (!modal) return;
    const iframe = document.getElementById('pubModalIframe');
    if (iframe) iframe.src = '';
    const video = document.getElementById('pubModalVideo');
    if (video) video.pause();
    modal.classList.add('hidden');
    document.body.style.overflow = '';
}

// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closePublicMediaModal();
    }
});

// =============================================================================
// BEFORE & AFTER REPAIR INTERACTIVE SLIDER ENGINE
// =============================================================================
let beforeAfterCases = [];
try {
    const storeEl = document.getElementById('baDataStore');
    if (storeEl) {
        const rawCases = storeEl.getAttribute('data-cases');
        if (rawCases) {
            beforeAfterCases = JSON.parse(atob(rawCases));
        }
    }
} catch(e) {
    console.error('Failed to parse before/after cases:', e);
}
let currentBACaseIndex = 0;

function handleSwitchBACase(btn) {
    const idx = parseInt(btn.getAttribute('data-case-index'), 10);
    if (!isNaN(idx)) {
        switchBeforeAfterCase(idx);
    }
}

function switchBeforeAfterCase(index) {
    if (!beforeAfterCases || !beforeAfterCases[index]) return;
    currentBACaseIndex = index;
    const c = beforeAfterCases[index];

    // Update active tab buttons
    document.querySelectorAll('.ba-tab-btn').forEach((btn, i) => {
        const dot = btn.querySelector('.ba-dot');
        if (i === index) {
            btn.className = 'ba-tab-btn px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 whitespace-nowrap shrink-0 bg-amber-400 text-slate-950 shadow-md font-black ring-2 ring-amber-300';
            if (dot) dot.className = 'ba-dot w-2 h-2 rounded-full bg-slate-950';
        } else {
            btn.className = 'ba-tab-btn px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 whitespace-nowrap shrink-0 bg-slate-900/90 text-slate-300 hover:bg-slate-700 hover:text-white border border-slate-700/80';
            if (dot) dot.className = 'ba-dot w-2 h-2 rounded-full bg-amber-400';
        }
    });

    // Update images
    const beforeImg = document.getElementById('baBeforeImage');
    const afterImg = document.getElementById('baAfterImage');
    if (beforeImg) beforeImg.src = c.before_image;
    if (afterImg) afterImg.src = c.after_image;

    // Update labels
    const beforeLabel = document.getElementById('baBeforeBadgeText');
    const afterLabel = document.getElementById('baAfterBadgeText');
    if (beforeLabel) beforeLabel.innerText = c.before_label || 'BEFORE (Faulty / Dead)';
    if (afterLabel) afterLabel.innerText = c.after_label || 'AFTER (100% Repaired)';

    // Update details
    const cat = document.getElementById('baDetailCategory');
    const title = document.getElementById('baDetailTitle');
    const fault = document.getElementById('baDetailFault');
    const solution = document.getElementById('baDetailSolution');
    const tools = document.getElementById('baDetailTools');
    const likes = document.getElementById('baLikesCount');
    const waLink = document.getElementById('baWhatsAppLink');

    if (cat) cat.innerText = c.category;
    if (title) title.innerText = c.title;
    if (fault) fault.innerText = c.fault_description || 'Dead circuitry, shorted components, and communication failure.';
    if (solution) solution.innerText = c.repair_solution || 'Micro-soldering, IC replacement, trace reconstruction, and live workbench testing.';
    if (tools) tools.innerText = c.tools_used || 'Digital Multimeter, SMD Rework Station, Microscope';
    if (likes) likes.innerText = c.likes_count || 0;

    if (waLink) {
        const msg = encodeURIComponent('Hello SMTTC, maine aapki gallery me Before/After repair case dekha: ' + c.title + '. Mujhe is practical course ki fees aur details chahiye.');
        waLink.href = 'https://wa.me/919122222222?text=' + msg;
    }

    // Reset slider to center 50%
    const slider = document.getElementById('baRangeSlider');
    if (slider) {
        slider.value = 50;
        updateSliderPosition(50);
    }
}

function updateSliderPosition(val) {
    const wrapper = document.getElementById('baBeforeWrapper');
    const handle = document.getElementById('baDividerHandle');
    if (wrapper) wrapper.style.width = val + '%';
    if (handle) handle.style.left = val + '%';
}

function likeCurrentBeforeAfter() {
    if (!beforeAfterCases || !beforeAfterCases[currentBACaseIndex]) return;
    const c = beforeAfterCases[currentBACaseIndex];
    fetch('/api/before-after/like/' + c.id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            c.likes_count = data.likes;
            const likes = document.getElementById('baLikesCount');
            if (likes) likes.innerText = data.likes;
            const btn = document.getElementById('baLikeBtn');
            if (btn) btn.classList.add('bg-red-500/20', 'text-red-400', 'border-red-400/40');
        }
    })
    .catch(err => console.log('Like error:', err));
}

// =============================================================================
// SUCCESS STORY VIDEO ROTATOR ENGINE (CHANGES EVERY 5 SECONDS)
// =============================================================================
let successStoryCases = [];
try {
    const storeEl = document.getElementById('baDataStore');
    if (storeEl) {
        const rawStories = storeEl.getAttribute('data-stories');
        if (rawStories) {
            successStoryCases = JSON.parse(atob(rawStories));
        }
    }
} catch(e) {
    console.error('Failed to parse success story cases:', e);
}

let currentStoryIdx = 0;
let storyProgressTimer = null;
let storyTimeElapsed = 0;
const STORY_DURATION = 5000; // 5 seconds
const STORY_STEP = 50; // update progress bar every 50ms
let isStoryAutoPlaying = true;
let isStoryHovered = false;

function initStoryRotator() {
    if (!successStoryCases || successStoryCases.length <= 1) {
        const cd = document.getElementById('storyTimerCountdown');
        if (cd && successStoryCases.length <= 1) cd.innerText = 'Featured';
        return;
    }

    startStoryTimer();

    const card = document.getElementById('successStoryRotatorCard');
    if (card) {
        card.addEventListener('mouseenter', function() {
            isStoryHovered = true;
        });
        card.addEventListener('mouseleave', function() {
            isStoryHovered = false;
        });
    }
}

function startStoryTimer() {
    clearInterval(storyProgressTimer);
    storyTimeElapsed = 0;
    updateStoryProgressBar(0);

    storyProgressTimer = setInterval(function() {
        if (!isStoryAutoPlaying || isStoryHovered) return;

        storyTimeElapsed += STORY_STEP;
        const progressPct = Math.min((storyTimeElapsed / STORY_DURATION) * 100, 100);
        updateStoryProgressBar(progressPct);

        const remainingSec = Math.max(1, Math.ceil((STORY_DURATION - storyTimeElapsed) / 1000));
        const cd = document.getElementById('storyTimerCountdown');
        if (cd) cd.innerText = remainingSec + 's';

        if (storyTimeElapsed >= STORY_DURATION) {
            nextSuccessStory(false);
        }
    }, STORY_STEP);
}

function updateStoryProgressBar(pct) {
    const bar = document.getElementById('storyProgressBar');
    if (bar) bar.style.width = pct + '%';
}

function handleSelectSuccessStory(btn) {
    const idx = parseInt(btn.getAttribute('data-story-idx'), 10);
    if (!isNaN(idx)) {
        selectSuccessStory(idx);
    }
}

function selectSuccessStory(index) {
    if (!successStoryCases || !successStoryCases[index]) return;
    currentStoryIdx = index;
    renderCurrentStory();
    startStoryTimer();
}

function nextSuccessStory(resetTimer = true) {
    if (!successStoryCases || successStoryCases.length === 0) return;
    currentStoryIdx = (currentStoryIdx + 1) % successStoryCases.length;
    renderCurrentStory();
    if (resetTimer) startStoryTimer();
    else storyTimeElapsed = 0;
}

function prevSuccessStory() {
    if (!successStoryCases || successStoryCases.length === 0) return;
    currentStoryIdx = (currentStoryIdx - 1 + successStoryCases.length) % successStoryCases.length;
    renderCurrentStory();
    startStoryTimer();
}

function renderCurrentStory() {
    const s = successStoryCases[currentStoryIdx];
    if (!s) return;

    const thumb = document.getElementById('storyVideoThumb');
    const earning = document.getElementById('storyEarningText');
    const title = document.getElementById('storyVideoTitle');
    const student = document.getElementById('storyStudentName');
    const course = document.getElementById('storyCourseName');
    const desc = document.getElementById('storyDescriptionText');
    const wa = document.getElementById('storyWhatsAppBtn');

    if (thumb) thumb.src = s.thumbnail_url;
    if (earning) earning.innerText = s.earning_badge || 'Success Alumni';
    if (title) title.innerText = s.title || (s.student_name + ' - Practical Success Story');
    if (student) student.innerHTML = '<span>' + (s.student_name || 'Alumni') + '</span> <i class="fa-solid fa-circle-check text-blue-400 text-xs" title="Verified Student"></i>';
    if (course) course.innerText = s.course || 'Practical Course';
    if (desc) desc.innerText = '"' + (s.story_description || 'SMTTC practical training helped me master chip-level repair and build my career.') + '"';

    if (wa) {
        const msg = encodeURIComponent('Hello SMTTC, maine aapki gallery me student success story dekhi: ' + (s.student_name || 'Alumni') + '. Mujhe is course ki details chahiye.');
        wa.href = 'https://wa.me/917870516006?text=' + msg;
    }

    // Update dots
    const dots = document.querySelectorAll('.story-dot');
    dots.forEach((dot, i) => {
        if (i === currentStoryIdx) {
            dot.className = 'story-dot w-5 h-2 rounded-full bg-amber-400 transition-all';
        } else {
            dot.className = 'story-dot w-2 h-2 rounded-full bg-slate-600 transition-all';
        }
    });
}

function toggleStoryAutoPlay() {
    isStoryAutoPlaying = !isStoryAutoPlaying;
    const btn = document.getElementById('storyPauseBtn');
    if (btn) {
        if (isStoryAutoPlaying) {
            btn.innerHTML = '<i class="fa-solid fa-pause text-[10px]"></i>';
            btn.title = 'Pause Auto-Rotation';
        } else {
            btn.innerHTML = '<i class="fa-solid fa-play text-[10px] text-amber-400"></i>';
            btn.title = 'Resume Auto-Rotation';
        }
    }
}

function playCurrentSuccessStoryVideo() {
    if (!successStoryCases || !successStoryCases[currentStoryIdx]) return;
    const s = successStoryCases[currentStoryIdx];
    openPublicMediaModal({
        media_type: 'video',
        title: s.title || (s.student_name + ' - Success Story'),
        category: s.course || 'Success Story',
        description: s.story_description || '',
        video_url: s.video_url,
        embed_url: s.embed_url,
        thumbnail_url: s.thumbnail_url
    });
}

// Attach slider input event and initialize on page ready
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('baRangeSlider');
    if (slider) {
        slider.addEventListener('input', function(e) {
            updateSliderPosition(e.target.value);
        });
    }

    // Initialize the 5-second video rotator
    initStoryRotator();
});
</script>

@endsection
