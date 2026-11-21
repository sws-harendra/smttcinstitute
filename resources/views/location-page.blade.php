@extends('layouts.app')

@section('title', $page->meta_title ?: ($page->h1_heading . ' | SMTTC Technical Training Institute'))

@section('meta')
    <meta name="description" content="{{ $page->meta_description ?: ($page->hero_description ? Str::limit(strip_tags($page->hero_description), 160) : 'Learn professional ' . $page->service_name . ' in ' . $page->location_name . ' at SMTTC Institute.') }}">
    @if(!empty($page->meta_keywords))
        <meta name="keywords" content="{{ $page->meta_keywords }}">
    @else
        <meta name="keywords" content="{{ $page->service_name }} in {{ $page->location_name }}, best {{ $page->service_name }} {{ $page->location_name }}, mobile repairing course in Patna, AC repairing institute Patna">
    @endif
    <link rel="canonical" href="{{ $page->canonical_url ?: url($page->slug) }}">
    <meta property="og:title" content="{{ $page->meta_title ?: $page->h1_heading }}">
    <meta property="og:description" content="{{ $page->meta_description ?: ($page->hero_description ? Str::limit(strip_tags($page->hero_description), 160) : '') }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ $page->canonical_url ?: url($page->slug) }}">
    <meta property="og:image" content="{{ $page->og_image ?: asset('assets/images/logonewblack.webp') }}">
@endsection

@section('content')

@php
    $faqsList = is_array($page->faqs) ? $page->faqs : (json_decode($page->faqs, true) ?: []);
    $sectionsList = is_array($page->content_sections) ? $page->content_sections : (json_decode($page->content_sections, true) ?: []);
    $template = in_array($page->template, ['grid', 'timeline', 'card', 'split']) ? $page->template : 'grid';

    // Build JSON-LD structured data
    $jsonLd = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "EducationalOrganization",
                "name" => "SMTTC Technical Training Institute",
                "url" => url($page->slug),
                "description" => $page->hero_description,
                "telephone" => "+917870516006",
                "address" => [
                    "@type" => "PostalAddress",
                    "streetAddress" => "Near Hi-Tech Hospital saguna more Balaji Nagar new Tarachak danapur",
                    "addressLocality" => $page->location_name,
                    "addressRegion" => "Bihar",
                    "postalCode" => "801503",
                    "addressCountry" => "IN"
                ],
                "areaServed" => [
                    "@type" => "AdministrativeArea",
                    "name" => $page->location_name
                ]
            ],
            [
                "@type" => "Course",
                "name" => $page->service_name . " in " . $page->location_name,
                "description" => $page->hero_description,
                "provider" => [
                    "@type" => "Organization",
                    "name" => "SMTTC Institute",
                    "sameAs" => url('/')
                ]
            ]
        ]
    ];

    if (!empty($faqsList)) {
        $faqEntities = [];
        foreach ($faqsList as $faq) {
            if (!empty($faq['question']) && !empty($faq['answer'])) {
                $faqEntities[] = [
                    "@type" => "Question",
                    "name" => $faq['question'],
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => $faq['answer']
                    ]
                ];
            }
        }
        if (!empty($faqEntities)) {
            $jsonLd['@graph'][] = [
                "@type" => "FAQPage",
                "mainEntity" => $faqEntities
            ];
        }
    }
@endphp

<script type="application/ld+json">
{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>

<div class="bg-slate-50 min-h-screen text-slate-800 antialiased py-8 sm:py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 space-y-10">

        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500 overflow-x-auto whitespace-nowrap pb-1">
            <a href="{{ route('home') }}" class="hover:text-indigo-600 transition flex items-center gap-1.5">
                <i class="fa-solid fa-house"></i> Home
            </a>
            <span>/</span>
            <a href="{{ route('locations.index') }}" class="hover:text-indigo-600 transition">
                Locations
            </a>
            <span>/</span>
            <span class="text-slate-400">{{ $page->location_name }}</span>
            <span>/</span>
            <span class="text-indigo-600 font-bold truncate max-w-xs">{{ $page->service_name }}</span>
        </nav>

        <!-- Hero Section -->
        <header class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 text-white p-6 sm:p-12 shadow-2xl border border-slate-800">
            <!-- Decorative Glow Background -->
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-[#FACA0A]/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl space-y-5">
                <!-- Location Badge -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[#FACA0A] text-xs font-bold shadow-xs">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Practical Training Center Serving {{ $page->location_name }}</span>
                </div>

                <!-- Main H1 Heading -->
                <h1 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tight leading-tight sm:leading-tight text-white">
                    {{ $page->h1_heading ?: ("Best " . $page->service_name . " in " . $page->location_name) }}
                </h1>

                <!-- Hero Overview Description -->
                @if(!empty($page->hero_description))
                <p class="text-sm sm:text-base md:text-lg text-slate-300 leading-relaxed font-normal">
                    {{ $page->hero_description }}
                </p>
                @endif

                <!-- Quality Pills Row -->
                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-white/5 border border-white/10 text-xs text-emerald-400 font-semibold">
                        <i class="fa-solid fa-certificate"></i>
                        <span>ISO 9001:2015 Certified</span>
                    </div>
                    <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-white/5 border border-white/10 text-xs text-[#FACA0A] font-semibold">
                        <i class="fa-solid fa-microchip"></i>
                        <span>100% Practical Lab Training</span>
                    </div>
                    <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-white/5 border border-white/10 text-xs text-blue-400 font-semibold">
                        <i class="fa-solid fa-user-tie"></i>
                        <span>100% Job & Placement Support</span>
                    </div>
                </div>

                <!-- CTA Action Buttons -->
                <div class="flex flex-wrap items-center gap-3.5 pt-4">
                    <a href="{{ route('admission') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-gradient-to-r from-[#FACA0A] to-yellow-400 text-slate-900 font-extrabold text-sm shadow-lg shadow-yellow-500/20 hover:scale-[1.02] active:scale-[0.98] transition-all">
                        <i class="fa-solid fa-user-graduate"></i>
                        <span>Apply For Admission</span>
                    </a>

                    <a href="tel:7870516006" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-sm backdrop-blur-md transition-all">
                        <i class="fa-solid fa-phone"></i>
                        <span>Call: 7870516006</span>
                    </a>

                    <a href="https://wa.me/917870516006?text=Hi%20SMTTC,%20I%20am%20interested%20in%20{{ urlencode($page->service_name) }}%20course%20in%20{{ urlencode($page->location_name) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 px-4 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition-all">
                        <i class="fa-brands fa-whatsapp text-lg"></i>
                        <span>WhatsApp Chat</span>
                    </a>
                </div>
            </div>
        </header>

        <!-- ================= TEMPLATE-BASED CONTENT SECTIONS ================= -->

        @if(!empty($sectionsList) && count($sectionsList) > 0)
            <!-- 1. GRID TEMPLATE -->
            @if($template === 'grid')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($sectionsList as $sec)
                <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-sm hover:shadow-md hover:border-indigo-200 transition-all space-y-4">
                    @if(!empty($sec['badge']))
                    <span class="inline-block text-[11px] font-extrabold uppercase px-2.5 py-1 rounded-md bg-indigo-50 text-indigo-700 tracking-wider">
                        {{ $sec['badge'] }}
                    </span>
                    @endif

                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 leading-snug">
                        {{ $sec['title'] ?? '' }}
                    </h3>

                    @if(!empty($sec['content']))
                    <p class="text-sm text-slate-600 leading-relaxed">
                        {{ $sec['content'] }}
                    </p>
                    @endif

                    @if(!empty($sec['bulletPoints']) && is_array($sec['bulletPoints']))
                    <ul class="space-y-2.5 pt-2">
                        @foreach($sec['bulletPoints'] as $bp)
                        <li class="text-xs sm:text-sm text-slate-700 flex items-start gap-2.5">
                            <i class="fa-solid fa-circle-check text-emerald-500 shrink-0 mt-1"></i>
                            <span class="leading-relaxed">{{ $bp }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endforeach
            </div>

            <!-- 2. TIMELINE TEMPLATE -->
            @elseif($template === 'timeline')
            <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-sm">
                <div class="relative border-l-2 border-emerald-400 ml-4 sm:ml-6 pl-6 sm:pl-8 space-y-8">
                    @foreach($sectionsList as $i => $sec)
                    <div class="relative">
                        <span class="absolute -left-[33px] sm:-left-[41px] top-1.5 w-5 h-5 rounded-full bg-emerald-500 border-4 border-white shadow-md flex items-center justify-center"></span>
                        
                        <div class="bg-slate-50/70 rounded-2xl p-5 sm:p-6 border border-slate-200/70 space-y-3">
                            <div class="flex items-center gap-3">
                                <span class="text-xs font-black px-2 py-0.5 rounded bg-emerald-100 text-emerald-800">STEP {{ $i + 1 }}</span>
                                @if(!empty($sec['badge']))
                                <span class="text-[11px] font-extrabold uppercase text-slate-500">{{ $sec['badge'] }}</span>
                                @endif
                            </div>

                            <h3 class="text-base sm:text-lg font-bold text-slate-900">
                                {{ $sec['title'] ?? '' }}
                            </h3>

                            @if(!empty($sec['content']))
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                {{ $sec['content'] }}
                            </p>
                            @endif

                            @if(!empty($sec['bulletPoints']) && is_array($sec['bulletPoints']))
                            <ul class="space-y-2 pt-1">
                                @foreach($sec['bulletPoints'] as $bp)
                                <li class="text-xs sm:text-sm text-slate-700 flex items-start gap-2">
                                    <i class="fa-solid fa-arrow-right text-emerald-600 shrink-0 mt-1 text-xs"></i>
                                    <span>{{ $bp }}</span>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- 3. CARD TEMPLATE -->
            @elseif($template === 'card')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($sectionsList as $sec)
                <div class="relative bg-gradient-to-b from-white to-slate-50/80 rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md hover:shadow-xl transition-all space-y-4 overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-purple-500 via-indigo-500 to-pink-500"></div>

                    @if(!empty($sec['badge']))
                    <span class="inline-block text-[11px] font-extrabold uppercase px-3 py-1 rounded-full bg-purple-50 text-purple-700 border border-purple-200/60">
                        {{ $sec['badge'] }}
                    </span>
                    @endif

                    <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 group-hover:text-indigo-600 transition">
                        {{ $sec['title'] ?? '' }}
                    </h3>

                    @if(!empty($sec['content']))
                    <p class="text-sm text-slate-600 leading-relaxed">
                        {{ $sec['content'] }}
                    </p>
                    @endif

                    @if(!empty($sec['bulletPoints']) && is_array($sec['bulletPoints']))
                    <div class="pt-2 space-y-2">
                        @foreach($sec['bulletPoints'] as $bp)
                        <div class="p-2.5 rounded-xl bg-white border border-slate-200/70 text-xs sm:text-sm text-slate-700 flex items-start gap-2.5">
                            <i class="fa-solid fa-check text-purple-600 shrink-0 mt-0.5"></i>
                            <span class="font-medium">{{ $bp }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endforeach
            </div>

            <!-- 4. SPLIT TEMPLATE -->
            @elseif($template === 'split')
            <div class="space-y-6">
                @foreach($sectionsList as $i => $sec)
                <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-sm flex flex-col {{ $i % 2 === 1 ? 'md:flex-row-reverse' : 'md:flex-row' }} gap-6 sm:gap-10 items-center">
                    <div class="flex-1 space-y-4">
                        @if(!empty($sec['badge']))
                        <span class="inline-block text-[11px] font-extrabold uppercase px-2.5 py-1 rounded-md bg-amber-50 text-amber-800 border border-amber-200">
                            {{ $sec['badge'] }}
                        </span>
                        @endif

                        <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900">
                            {{ $sec['title'] ?? '' }}
                        </h3>

                        @if(!empty($sec['content']))
                        <p class="text-sm text-slate-600 leading-relaxed">
                            {{ $sec['content'] }}
                        </p>
                        @endif
                    </div>

                    @if(!empty($sec['bulletPoints']) && is_array($sec['bulletPoints']))
                    <div class="flex-1 w-full bg-slate-50 rounded-2xl p-5 sm:p-6 border border-slate-200/80 space-y-2.5">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Key Highlights</h4>
                        @foreach($sec['bulletPoints'] as $bp)
                        <div class="text-xs sm:text-sm text-slate-700 flex items-start gap-2.5">
                            <i class="fa-solid fa-circle-dot text-amber-500 shrink-0 mt-1"></i>
                            <span>{{ $bp }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            @endif
        @endif

        <!-- ================= FAQ ACCORDION SECTION ================= -->
        @if(!empty($faqsList) && count($faqsList) > 0)
        <section class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-sm space-y-6">
            <div class="max-w-2xl">
                <span class="text-xs font-bold uppercase tracking-wider text-indigo-600">Got Questions?</span>
                <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-slate-900 mt-1">
                    Frequently Asked Questions About {{ $page->service_name }} in {{ $page->location_name }}
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    Clear answers to help you choose the right training path and kickstart your career.
                </p>
            </div>

            <div class="space-y-3" id="faqAccordion">
                @foreach($faqsList as $i => $faq)
                <div class="border border-slate-200 rounded-2xl overflow-hidden transition-all duration-200 hover:border-slate-300">
                    <button type="button" onclick="toggleFaq({{ $i }})" class="w-full flex items-center justify-between p-4 sm:p-5 text-left font-bold text-sm sm:text-base text-slate-800 bg-white hover:bg-slate-50/80 transition">
                        <span>{{ $faq['question'] ?? '' }}</span>
                        <i id="faq-icon-{{ $i }}" class="fa-solid fa-chevron-down text-slate-400 text-xs transition-transform duration-300 {{ $i === 0 ? 'rotate-180' : '' }}"></i>
                    </button>
                    <div id="faq-content-{{ $i }}" class="{{ $i === 0 ? 'block' : 'hidden' }} px-4 sm:px-5 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 bg-slate-50/50">
                        <div class="pt-3">
                            {{ $faq['answer'] ?? '' }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- ================= BOTTOM CALL TO ACTION BANNER ================= -->
        <section class="bg-gradient-to-r from-indigo-900 via-indigo-800 to-slate-900 rounded-3xl p-8 sm:p-12 text-white shadow-xl flex flex-col md:flex-row items-center justify-between gap-8 border border-indigo-700/50">
            <div class="space-y-3 max-w-xl text-center md:text-left">
                <span class="inline-block px-3 py-1 rounded-full bg-yellow-400 text-slate-950 text-xs font-black tracking-wide uppercase">
                    ADMISSIONS OPEN NOW
                </span>
                <h3 class="text-2xl sm:text-3xl font-black leading-tight">
                    Start Your Technical Career in {{ $page->location_name }} Today!
                </h3>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Join 15,000+ successful technicians trained at SMTTC Institute. Attend a free demo class, experience our practical lab, and get immediate job guidance.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto shrink-0">
                <a href="{{ route('admission') }}" class="px-7 py-3.5 rounded-xl bg-[#FACA0A] hover:bg-yellow-400 text-slate-950 font-extrabold text-sm text-center shadow-lg transition">
                    Enroll For Admission
                </a>
                <a href="tel:7870516006" class="px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-sm text-center transition">
                    📞 Call 7870516006
                </a>
            </div>
        </section>

        <!-- ================= EXPLORE RELATED LOCATIONS ================= -->
        @if(isset($relatedPages) && count($relatedPages) > 0)
        <section class="pt-6 border-t border-slate-200">
            <h3 class="text-base font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fa-solid fa-map-location-dot text-indigo-600"></i>
                <span>Explore Other Courses & Areas in Bihar</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                @foreach($relatedPages as $rp)
                <a href="{{ url($rp->slug) }}" class="p-3.5 rounded-xl bg-white border border-slate-200/80 hover:border-indigo-300 hover:shadow-sm transition flex items-center justify-between group">
                    <div>
                        <p class="text-xs font-bold text-slate-800 group-hover:text-indigo-600 transition truncate max-w-[220px]">
                            {{ $rp->h1_heading ?: ($rp->service_name . ' in ' . $rp->location_name) }}
                        </p>
                        <span class="text-[11px] text-slate-400 flex items-center gap-1 mt-0.5">
                            <i class="fa-solid fa-location-pin text-[10px]"></i> {{ $rp->location_name }}
                        </span>
                    </div>
                    <i class="fa-solid fa-arrow-right text-xs text-slate-300 group-hover:text-indigo-600 group-hover:translate-x-1 transition-all"></i>
                </a>
                @endforeach
            </div>
        </section>
        @endif

    </div>
</div>

<script>
function toggleFaq(index) {
    const content = document.getElementById('faq-content-' + index);
    const icon = document.getElementById('faq-icon-' + index);
    if (!content || !icon) return;

    const isHidden = content.classList.contains('hidden');
    if (isHidden) {
        content.classList.remove('hidden');
        content.classList.add('block');
        icon.classList.add('rotate-180');
    } else {
        content.classList.add('hidden');
        content.classList.remove('block');
        icon.classList.remove('rotate-180');
    }
}
</script>

@endsection
