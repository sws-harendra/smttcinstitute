@extends('layouts.app')

@section('title', 'Course Fee Structure & Scholarships | SMTTC Institute Patna')

@section('meta')
    <meta name="keywords" content="SMTTC course fees, AC mechanic course fee Patna, mobile repairing course fees Patna, laptop repairing course fee, washing machine course fee, technical training scholarship girls Patna" />
    <meta name="description" content="Check official SMTTC course fee structure with special discounts for boys and up to 40% scholarship for girl students. 100% practical training with transparent fees & easy installments.">
    <link rel="canonical" href="{{ route('feestructure') }}" />
@endsection

@section('content')

<!-- ================= HERO HEADER ================= -->
<section class="relative bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 text-white py-14 sm:py-20 overflow-hidden">
    <!-- Background Glow Elements -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#FACA0A]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#ffffff0a_1px,transparent_1px)] [background-size:16px_16px] opacity-40 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10 text-center">
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur-md text-xs sm:text-sm font-bold text-[#FACA0A] mb-4 shadow-sm">
            <i class="fa-solid fa-graduation-cap"></i> Transparent Pricing & Technical Education Scholarships
        </div>

        <h1 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tight text-white mb-4">
            SMTTC Course <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FACA0A] via-yellow-400 to-amber-300">Fee Structure</span>
        </h1>

        <p class="text-sm sm:text-base md:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed mb-8">
            High-earning chip-level technical courses with industry-standard practical training. Special discounts for boys and up to <strong class="text-[#FACA0A]">40% </strong> for girl students.
        </p>

        <!-- Quick Trust Badges -->
        <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-4 text-xs sm:text-sm">
            <span class="inline-flex items-center gap-1.5 bg-white/5 border border-white/10 px-3.5 py-1.5 rounded-xl backdrop-blur-xs text-slate-200">
                <i class="fa-solid fa-circle-check text-emerald-400"></i> No Hidden Charges
            </span>
            <span class="inline-flex items-center gap-1.5 bg-white/5 border border-white/10 px-3.5 py-1.5 rounded-xl backdrop-blur-xs text-slate-200">
                <i class="fa-solid fa-calendar-check text-[#FACA0A]"></i> 2-Part Easy Installment
            </span>
            <span class="inline-flex items-center gap-1.5 bg-white/5 border border-white/10 px-3.5 py-1.5 rounded-xl backdrop-blur-xs text-slate-200">
                <i class="fa-solid fa-certificate text-blue-400"></i> ISO & Govt. Recognized
            </span>
            <span class="inline-flex items-center gap-1.5 bg-white/5 border border-white/10 px-3.5 py-1.5 rounded-xl backdrop-blur-xs text-slate-200">
                <i class="fa-solid fa-briefcase text-purple-400"></i> 100% Job & Business Support
            </span>
        </div>
    </div>
</section>

<!-- ================= SCHOLARSHIP HIGHLIGHT BANNER ================= -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 -mt-6 sm:-mt-8 relative z-20">
    <div class="bg-gradient-to-r from-amber-500 via-[#FACA0A] to-yellow-400 rounded-2xl sm:rounded-3xl p-5 sm:p-6 shadow-xl border border-yellow-300 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-4 text-slate-950">
            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-slate-950 text-[#FACA0A] flex items-center justify-center text-xl sm:text-2xl shrink-0 shadow-md">
                <i class="fa-solid fa-gift"></i>
            </div>
            <div>
                <span class="text-xs font-black uppercase tracking-wider bg-slate-950 text-yellow-300 px-2.5 py-0.5 rounded-md">
                    Limited Period Offer
                </span>
                <h3 class="text-base sm:text-lg font-black mt-1 leading-tight text-slate-950">
                    Special Admission Session: Direct PCB Bench Training Seats Open!
                </h3>
                <p class="text-xs sm:text-sm text-slate-900 font-medium mt-0.5">
                    Save up to ₹6,000 with batch discount vouchers. Special 30% to 40% scholarships for female technicians!
                </p>
            </div>
        </div>

        <a href="https://wa.me/917870516006?text={{ urlencode('Hello SMTTC! Mujhe current course fee discount aur girls scholarship offer ki details chahiye.') }}" 
           target="_blank" 
           class="whitespace-nowrap px-6 py-3 rounded-xl bg-slate-950 hover:bg-slate-900 text-[#FACA0A] font-extrabold text-xs sm:text-sm shadow-lg hover:scale-105 transition flex items-center gap-2">
            <i class="fa-brands fa-whatsapp text-green-400 text-base"></i>
            <span>Claim Discount on WhatsApp</span>
        </a>
    </div>
</section>

<!-- ================= MAIN PRICING & SCHOLARSHIP SECTION ================= -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-16 space-y-10">

    <!-- View & Gender Filter Switcher -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 border-b border-slate-200 pb-6">
        <div>
            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 flex items-center gap-2.5">
                <i class="fa-solid fa-tags text-indigo-600"></i> Course Pricing Catalog
            </h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Choose a pricing view to inspect boys fee discounts or girls scholarship privileges.
            </p>
        </div>

        <!-- Gender Switcher Tabs -->
        <div class="inline-flex p-1.5 bg-slate-100 rounded-2xl border border-slate-200 text-xs font-bold" id="pricingTabSwitch">
            <button type="button" onclick="switchPricingView('all')" id="btn-view-all" class="px-4 py-2 rounded-xl transition bg-white text-slate-900 shadow-sm flex items-center gap-1.5">
                <i class="fa-solid fa-layer-group"></i> All Courses
            </button>
            <button type="button" onclick="switchPricingView('boys')" id="btn-view-boys" class="px-4 py-2 rounded-xl transition text-slate-600 hover:text-slate-900 flex items-center gap-1.5">
                <i class="fa-solid fa-person text-blue-600"></i> Boys Discount
            </button>
            <button type="button" onclick="switchPricingView('girls')" id="btn-view-girls" class="px-4 py-2 rounded-xl transition text-slate-600 hover:text-slate-900 flex items-center gap-1.5">
                <i class="fa-solid fa-person-dress text-purple-600"></i> Girls Scholarship
            </button>
        </div>
    </div>

    <!-- COURSES PRICING CARDS GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="pricingCardsGrid">
        @forelse($fees as $fee)
            @php
                $hasDisc = $fee->hasDiscount();
                $slug = $fee->course_slug;
                $nameLower = strtolower($fee->course_name);

                // Auto match course detail route
                $courseUrl = route('home') . '#courses';
                $courseIcon = 'fa-solid fa-microchip';
                if (str_contains($nameLower, 'ac') || str_contains($nameLower, 'air condition') || str_contains($nameLower, 'hvac')) {
                    $courseUrl = route('courses.ac');
                    $courseIcon = 'fa-solid fa-snowflake text-sky-500';
                } elseif (str_contains($nameLower, 'mobile') || str_contains($nameLower, 'smart')) {
                    $courseUrl = route('courses.mobile');
                    $courseIcon = 'fa-solid fa-mobile-screen-button text-emerald-500';
                } elseif (str_contains($nameLower, 'laptop') || str_contains($nameLower, 'computer')) {
                    $courseUrl = route('courses.laptop');
                    $courseIcon = 'fa-solid fa-laptop text-indigo-500';
                } elseif (str_contains($nameLower, 'wash')) {
                    $courseUrl = route('courses.washing');
                    $courseIcon = 'fa-solid fa-soap text-cyan-500';
                } elseif (str_contains($nameLower, 'fridge') || str_contains($nameLower, 'refrigerator')) {
                    $courseUrl = route('courses.fridge');
                    $courseIcon = 'fa-solid fa-cube text-teal-500';
                }

                $badgeColorClass = match($fee->badge_color) {
                    'rose' => 'bg-rose-50 text-rose-700 border-rose-200',
                    'indigo' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                    'emerald' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                    'blue' => 'bg-blue-50 text-blue-700 border-blue-200',
                    default => 'bg-amber-50 text-amber-800 border-amber-200',
                };

                $waMsg = "Hello SMTTC Institute! I want admission in '{$fee->course_name}'. Course Fee: {$fee->course_fee}";
                if ($hasDisc) {
                    $waMsg .= " (Boys Fee: {$fee->boys_discounted_fee}, Girls Fee: {$fee->girls_discounted_fee})";
                }
                $waMsg .= ". Please send me batch timing and seat availability.";
            @endphp

            <div class="fee-card group relative bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between overflow-hidden">
                
                <!-- Top Accent Line -->
                <div class="h-1.5 w-full bg-gradient-to-r from-amber-400 via-yellow-400 to-indigo-600"></div>

                <div class="p-6 sm:p-7 space-y-5">
                    
                    <!-- Header with Tagline & Icon -->
                    <div class="flex items-start justify-between gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition shadow-2xs">
                            <i class="{{ $courseIcon }}"></i>
                        </div>

                        <div class="flex flex-col items-end gap-1">
                            @if($fee->offer_tag)
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-extrabold border {{ $badgeColorClass }} shadow-2xs">
                                    {{ $fee->offer_tag }}
                                </span>
                            @elseif($hasDisc)
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-extrabold border bg-emerald-50 text-emerald-700 border-emerald-200 shadow-2xs">
                                    <i class="fa-solid fa-bolt text-emerald-600 mr-1"></i> Special Offer
                                </span>
                            @endif

                            <span class="text-[11px] font-semibold text-slate-500 bg-slate-100 px-2 py-0.5 rounded-md">
                                <i class="fa-regular fa-clock mr-1"></i> {{ $fee->duration }}
                            </span>
                        </div>
                    </div>

                    <!-- Course Title -->
                    <div>
                        <h3 class="text-xl font-black text-slate-900 group-hover:text-indigo-600 transition leading-snug">
                            {{ $fee->course_name }}
                        </h3>
                        <p class="text-xs text-slate-500 mt-1 flex items-center gap-1.5">
                            <i class="fa-solid fa-award text-amber-500"></i>
                            <span>{{ $fee->certification ?: 'ISO Certified Training Diploma' }}</span>
                        </p>
                    </div>

                    <!-- PRICING DISPLAY BOX -->
                    <div class="bg-slate-50 rounded-2xl p-4 border border-slate-200/80 space-y-3.5">
                        
                        <!-- Base Fee Header -->
                        <div class="flex items-baseline justify-between border-b border-slate-200/80 pb-2">
                            <span class="text-xs font-bold text-slate-600">Standard Base Fee</span>
                            <div class="text-right">
                                @if($hasDisc)
                                    <span class="text-xs text-slate-400 line-through font-semibold mr-1.5">{{ $fee->course_fee }}</span>
                                    <span class="text-xs font-bold text-emerald-600">Discounted</span>
                                @else
                                    <span class="text-base font-black text-slate-900">{{ $fee->course_fee }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Split Pricing Grid (Boys vs Girls) -->
                        <div class="grid grid-cols-2 gap-2.5">
                            <!-- Boys Column -->
                            <div class="pricing-col-boys bg-white rounded-xl p-3 border border-blue-200 shadow-2xs space-y-1">
                                <div class="flex items-center justify-between">
                                    <span class="text-[11px] font-black text-blue-900 flex items-center gap-1">
                                        👦 Boys Fee
                                    </span>
                                    @if($hasDisc && $fee->discount_boys > 0)
                                        <span class="text-[9px] font-extrabold bg-blue-100 text-blue-700 px-1.5 py-0.5 rounded">
                                            {{ $fee->discount_boys }}% OFF
                                        </span>
                                    @endif
                                </div>
                                <div class="text-base sm:text-lg font-black text-blue-900">
                                    {{ $hasDisc && $fee->discount_boys > 0 ? $fee->boys_discounted_fee : $fee->course_fee }}
                                </div>
                                <span class="block text-[10px] text-slate-400">Regular batch discount</span>
                            </div>

                            <!-- Girls Special Column -->
                            <div class="pricing-col-girls bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-3 border-2 border-purple-300 shadow-2xs space-y-1 relative">
                                <div class="flex items-center justify-between">
                                    <span class="text-[11px] font-black text-purple-900 flex items-center gap-1">
                                        👧 Girls Fee
                                    </span>
                                    @if($hasDisc && $fee->discount_girls > 0)
                                        <span class="text-[9px] font-extrabold bg-purple-600 text-white px-1.5 py-0.5 rounded shadow-2xs">
                                            {{ $fee->discount_girls }}% OFF
                                        </span>
                                    @endif
                                </div>
                                <div class="text-base sm:text-lg font-black text-purple-900">
                                    {{ $hasDisc && $fee->discount_girls > 0 ? $fee->girls_discounted_fee : $fee->course_fee }}
                                </div>
                                <span class="block text-[10px] text-purple-600 font-bold">★ Special Scholarship</span>
                            </div>
                        </div>
                    </div>

                    <!-- Practical Training Features -->
                    <div class="space-y-2 text-xs text-slate-600 font-medium">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-microchip text-emerald-600 text-[11px]"></i>
                            <span>100% Practical on Live Inverter / SMD Boards</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-screwdriver-wrench text-blue-600 text-[11px]"></i>
                            <span>DSO, Thermal Camera & Tool Support</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-handshake text-indigo-600 text-[11px]"></i>
                            <span>100% Job Placement & Service Center Guidance</span>
                        </div>
                    </div>

                </div>

                <!-- Card Actions / CTA -->
                <div class="p-6 sm:p-7 pt-0 space-y-2.5">
                    <a href="https://wa.me/917870516006?text={{ urlencode($waMsg) }}" 
                       target="_blank" 
                       class="w-full py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-extrabold text-xs sm:text-sm shadow-md shadow-emerald-100 flex items-center justify-center gap-2 transition hover:scale-[1.02]">
                        <i class="fa-brands fa-whatsapp text-lg"></i>
                        <span>Book Seat on WhatsApp</span>
                    </a>

                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ $courseUrl }}" class="py-2.5 px-3 rounded-xl border border-slate-200 text-slate-700 hover:text-indigo-600 hover:bg-slate-50 font-bold text-xs text-center transition flex items-center justify-center gap-1">
                            <i class="fa-solid fa-book-open text-[11px]"></i>
                            <span>View Syllabus</span>
                        </a>
                        <a href="{{ route('admission') }}" class="py-2.5 px-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-black text-xs text-center transition flex items-center justify-center gap-1">
                            <i class="fa-solid fa-pen-nib text-[11px]"></i>
                            <span>Apply Online</span>
                        </a>
                    </div>
                </div>

            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-slate-50 rounded-3xl border border-dashed border-slate-300 space-y-3">
                <i class="fa-solid fa-graduation-cap text-4xl text-slate-400"></i>
                <h4 class="text-base font-bold text-slate-700">Course fee structures are currently updating</h4>
                <p class="text-xs text-slate-500">Please contact on WhatsApp for instant fee quotes and batch schedules.</p>
            </div>
        @endforelse
    </div>

    <!-- ================= COMPARISON TABLE VIEW ================= -->
    <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm overflow-hidden mt-12 space-y-4">
        <div class="p-6 sm:p-8 border-b border-slate-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
            <div>
                <h3 class="text-lg sm:text-xl font-black text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-table-list text-emerald-600"></i> Detailed Fee Comparison Matrix
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">Quick side-by-side comparison of base pricing, duration, and scholarship benefits.</p>
            </div>
            <span class="text-xs font-bold text-slate-600 bg-slate-100 px-3 py-1.5 rounded-full border border-slate-200">
                {{ count($fees) }} Professional Courses
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[750px]">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-xs font-extrabold text-slate-600 uppercase tracking-wider">
                        <th class="p-4 sm:p-5">Course Title</th>
                        <th class="p-4 sm:p-5">Duration</th>
                        <th class="p-4 sm:p-5">Base Fee</th>
                        <th class="p-4 sm:p-5 bg-blue-50/50 text-blue-900">👦 Boys Fee</th>
                        <th class="p-4 sm:p-5 bg-purple-50/50 text-purple-900">👧 Girls Special</th>
                        <th class="p-4 sm:p-5">Certification</th>
                        <th class="p-4 sm:p-5 text-right">Quick Admission</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs sm:text-sm">
                    @forelse($fees as $fee)
                        <tr class="hover:bg-amber-50/40 transition">
                            <td class="p-4 sm:p-5 font-black text-slate-900">
                                <div>{{ $fee->course_name }}</div>
                                @if($fee->offer_tag)
                                    <span class="text-[10px] font-bold text-amber-700 bg-amber-50 border border-amber-200 px-2 py-0.5 rounded-md inline-block mt-1">
                                        {{ $fee->offer_tag }}
                                    </span>
                                @endif
                            </td>
                            <td class="p-4 sm:p-5 text-slate-600 font-semibold whitespace-nowrap">
                                {{ $fee->duration }}
                            </td>
                            <td class="p-4 sm:p-5 whitespace-nowrap">
                                @if($fee->hasDiscount())
                                    <span class="text-slate-400 line-through text-xs font-medium">{{ $fee->course_fee }}</span>
                                @else
                                    <span class="font-bold text-slate-900">{{ $fee->course_fee }}</span>
                                @endif
                            </td>
                            <td class="p-4 sm:p-5 bg-blue-50/30 font-black text-blue-900 whitespace-nowrap">
                                @if($fee->hasDiscount() && $fee->discount_boys > 0)
                                    <div>{{ $fee->boys_discounted_fee }}</div>
                                    <span class="text-[10px] font-bold text-blue-600">({{ $fee->discount_boys }}% OFF)</span>
                                @else
                                    <span>{{ $fee->course_fee }}</span>
                                @endif
                            </td>
                            <td class="p-4 sm:p-5 bg-purple-50/30 font-black text-purple-900 whitespace-nowrap">
                                @if($fee->hasDiscount() && $fee->discount_girls > 0)
                                    <div>{{ $fee->girls_discounted_fee }}</div>
                                    <span class="text-[10px] font-bold text-purple-700 bg-purple-100 px-1.5 py-0.5 rounded">({{ $fee->discount_girls }}% Scholarship)</span>
                                @else
                                    <span>{{ $fee->course_fee }}</span>
                                @endif
                            </td>
                            <td class="p-4 sm:p-5 text-slate-600 text-xs font-medium max-w-[160px] truncate" title="{{ $fee->certification }}">
                                {{ $fee->certification ?: 'ISO Certified' }}
                            </td>
                            <td class="p-4 sm:p-5 text-right whitespace-nowrap">
                                <a href="https://wa.me/917870516006?text={{ urlencode('Hello SMTTC, I am interested in ' . $fee->course_name . '. Please confirm my seat.') }}" 
                                   target="_blank" 
                                   class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-2xs transition">
                                    <i class="fa-brands fa-whatsapp text-sm"></i> Join Batch
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-slate-400">No fee records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- ================= SCHOLARSHIPS & PAYMENT FAQ ACCORDION ================= -->
    <div class="bg-gradient-to-br from-slate-900 to-indigo-950 rounded-3xl p-6 sm:p-10 text-white space-y-8 mt-12 border border-slate-800 shadow-xl">
        <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="text-xs font-extrabold text-[#FACA0A] uppercase tracking-wider bg-white/10 px-3 py-1 rounded-full border border-white/10">
                FAQ & Admission Guidance
            </span>
            <h3 class="text-2xl sm:text-3xl font-black text-white">Frequently Asked Questions on Fees & Scholarships</h3>
            <p class="text-xs sm:text-sm text-slate-300">
                Everything you need to know about payment methods, installment flexibility, and female candidate scholarships.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 text-xs sm:text-sm">
            <div class="bg-white/5 border border-white/10 rounded-2xl p-5 space-y-2">
                <h4 class="font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-circle-question text-[#FACA0A]"></i> Kya girls ke liye scholarship direct milti hai?
                </h4>
                <p class="text-slate-300 leading-relaxed">
                    Haan, SMTTC me <strong>female candidates</strong> ko direct 50% scholarship milti hai. Admission ke waqt keval ek valid photo ID/Aadhaar card jama karna hota hai.
                </p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-2xl p-5 space-y-2">
                <h4 class="font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-circle-question text-[#FACA0A]"></i> Kya fees installments (kiston) me de sakte hain?
                </h4>
                <p class="text-slate-300 leading-relaxed">
                    Haan, students 2 aasan installments me fees de sakte hain. Pahli installment admission ke samay aur doosri installment course ke mid-term me di ja sakti hai.
                </p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-2xl p-5 space-y-2">
                <h4 class="font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-circle-question text-[#FACA0A]"></i> Kya practical tools aur PCB lab material ka extra charge hai?
                </h4>
                <p class="text-slate-300 leading-relaxed">
                    Nahi! Practical training ke liye sabhi lab tools (DSO, SMD Hot Air Gun, Soldering Station, Multimeter) aur testing PCBs institute dwara training ke dauran bilkul free provide kiye jaate hain.
                </p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-2xl p-5 space-y-2">
                <h4 class="font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-circle-question text-[#FACA0A]"></i> Course complete hone ke baad placement me kaise help milti hai?
                </h4>
                <p class="text-slate-300 leading-relaxed">
                    Course ke baad ISO certificate diya jata hai aur reputed brand service centers (Daikin, Voltas, Samsung, LG, Mi, HP) me interview & job placement ya apni dukan shuru karne me poori business guidance milti hai.
                </p>
            </div>
        </div>

        <!-- Help Line Banner -->
        <div class="pt-4 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-[#FACA0A] text-slate-950 flex items-center justify-center font-bold text-lg">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <div>
                    <h5 class="text-sm font-bold text-white">Koi sawal ya special batch requirement hai?</h5>
                    <p class="text-xs text-slate-400">Direct admission helpdesk se baat karein.</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="tel:7870516006" class="px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-xs border border-white/15 transition flex items-center gap-2">
                    <i class="fa-solid fa-phone"></i> Call: 7870516006
                </a>
                <a href="https://wa.me/917870516006" target="_blank" class="px-5 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs shadow-md transition flex items-center gap-2">
                    <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
                </a>
            </div>
        </div>
    </div>

</section>

<!-- ================= JAVASCRIPT FOR GENDER TAB SWITCHER ================= -->
<script>
function switchPricingView(mode) {
    const btnAll = document.getElementById('btn-view-all');
    const btnBoys = document.getElementById('btn-view-boys');
    const btnGirls = document.getElementById('btn-view-girls');

    // Reset styles
    [btnAll, btnBoys, btnGirls].forEach(btn => {
        btn.classList.remove('bg-white', 'text-slate-900', 'shadow-sm', 'bg-blue-600', 'bg-purple-600', 'text-white');
        btn.classList.add('text-slate-600');
    });

    const boysCols = document.querySelectorAll('.pricing-col-boys');
    const girlsCols = document.querySelectorAll('.pricing-col-girls');

    if (mode === 'boys') {
        btnBoys.classList.add('bg-white', 'text-blue-700', 'shadow-sm');
        btnBoys.classList.remove('text-slate-600');

        boysCols.forEach(col => {
            col.classList.remove('opacity-40');
            col.classList.add('scale-105', 'ring-2', 'ring-blue-500');
        });
        girlsCols.forEach(col => {
            col.classList.add('opacity-40');
            col.classList.remove('scale-105', 'ring-2', 'ring-purple-500');
        });
    } else if (mode === 'girls') {
        btnGirls.classList.add('bg-white', 'text-purple-700', 'shadow-sm');
        btnGirls.classList.remove('text-slate-600');

        girlsCols.forEach(col => {
            col.classList.remove('opacity-40');
            col.classList.add('scale-105', 'ring-2', 'ring-purple-500');
        });
        boysCols.forEach(col => {
            col.classList.add('opacity-40');
            col.classList.remove('scale-105', 'ring-2', 'ring-blue-500');
        });
    } else {
        btnAll.classList.add('bg-white', 'text-slate-900', 'shadow-sm');
        btnAll.classList.remove('text-slate-600');

        boysCols.forEach(col => {
            col.classList.remove('opacity-40', 'scale-105', 'ring-2', 'ring-blue-500');
        });
        girlsCols.forEach(col => {
            col.classList.remove('opacity-40', 'scale-105', 'ring-2', 'ring-purple-500');
        });
    }
}
</script>

@endsection
