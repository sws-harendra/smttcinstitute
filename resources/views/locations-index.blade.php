@extends('layouts.app')

@section('title', 'Technical Training Courses by Location in Patna & Bihar | SMTTC Institute')

@section('meta')
    <meta name="description" content="Explore SMTTC Technical Training Institute courses across Patna, Danapur, Bailey Road, Kankarbagh, and all districts of Bihar. 100% practical lab training for mobile, AC, and laptop repairing.">
    <link rel="canonical" href="{{ url('/locations') }}">
@endsection

@section('content')
<div class="bg-slate-50 min-h-screen py-10 sm:py-16 text-slate-800">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 space-y-10">

        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-indigo-600 transition flex items-center gap-1.5">
                <i class="fa-solid fa-house"></i> Home
            </a>
            <span>/</span>
            <span class="text-indigo-600 font-bold">Locations</span>
        </nav>

        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto space-y-3">
            <span class="inline-block px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-black uppercase tracking-wider">
                REGIONAL TRAINING DIRECTORY
            </span>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                Courses by Area & Location in Bihar
            </h1>
            <p class="text-sm sm:text-base text-slate-500 leading-relaxed">
                Find specialized chip-level technical courses available across Patna, Danapur, Bailey Road, and neighboring towns.
            </p>
        </div>

        @if(isset($pages) && count($pages) > 0)
            <!-- Search / Filter on client side -->
            <div class="max-w-md mx-auto">
                <div class="relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input type="text" id="locSearchInput" onkeyup="filterLocationCards()" placeholder="Search your town, area, or course..." class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm">
                </div>
            </div>

            <!-- Grouped by Location Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="locationsGrid">
                @foreach($pages as $page)
                <div class="location-card bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-md hover:border-indigo-300 transition-all flex flex-col justify-between"
                     data-text="{{ strtolower($page->service_name . ' ' . $page->location_name . ' ' . $page->h1_heading) }}">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="inline-flex items-center gap-1.5 text-xs font-bold px-2.5 py-1 rounded-full bg-slate-100 text-slate-700">
                                <i class="fa-solid fa-location-dot text-[#FACA0A]"></i> {{ $page->location_name }}
                            </span>
                            <span class="text-[11px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">
                                ISO Certified
                            </span>
                        </div>

                        <h3 class="text-base font-bold text-slate-900 leading-snug">
                            {{ $page->h1_heading ?: ($page->service_name . ' in ' . $page->location_name) }}
                        </h3>

                        <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed">
                            {{ $page->hero_description }}
                        </p>
                    </div>

                    <div class="pt-5 mt-4 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-xs font-semibold text-indigo-600">
                            {{ $page->service_name }}
                        </span>
                        <a href="{{ url($page->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-900 hover:text-indigo-600 transition">
                            <span>View Details</span>
                            <i class="fa-solid fa-arrow-right text-[11px]"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 text-center border border-slate-200 max-w-lg mx-auto space-y-4">
                <div class="w-16 h-16 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center mx-auto text-2xl">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Locations Directory Initializing</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Our training center is located at Saguna More, Danapur, Patna. Please explore our main courses or contact our helpline directly.
                </p>
                <div class="pt-2">
                    <a href="{{ route('home') }}" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs inline-block transition">
                        Back to Homepage
                    </a>
                </div>
            </div>
        @endif

    </div>
</div>

<script>
function filterLocationCards() {
    const query = (document.getElementById('locSearchInput').value || '').toLowerCase().trim();
    const cards = document.querySelectorAll('.location-card');
    cards.forEach(card => {
        const text = card.getAttribute('data-text') || '';
        if (text.includes(query)) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>
@endsection
