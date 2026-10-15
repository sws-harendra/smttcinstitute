@extends('layouts.app')

@section('title', 'Technical Repair Guides & Articles | Smart Technical Training Institute Patna')

@section('meta')
    <meta name="description" content="Explore expert practical guides on AC PCB repairing, mobile motherboard servicing, laptop micro-soldering, and technical training in Patna.">
    <link rel="canonical" href="{{ route('blog.index') }}" />
@endsection

@section('content')

<!-- ================= HERO SECTION ================= -->
<section class="relative bg-slate-950 text-white py-16 sm:py-24 overflow-hidden border-b border-slate-800">
    <!-- Ambient Glow & Technical Background Pattern -->
    <div class="absolute inset-0 pointer-events-none opacity-20">
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[700px] h-[350px] bg-gradient-to-r from-amber-400 via-yellow-500 to-indigo-600 rounded-full blur-[120px]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#334155_1px,transparent_1px)] [background-size:24px_24px] opacity-40"></div>
    </div>

    <div class="relative max-w-[1320px] mx-auto px-4 sm:px-6 text-center space-y-6">
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-900 border border-slate-700/80 shadow-md text-xs font-bold text-amber-400 tracking-wide uppercase">
            <i class="fa-solid fa-graduation-cap"></i> SMTTC Technical Knowledge Hub
        </div>

        <!-- Main Title -->
        <h1 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tight text-white max-w-4xl mx-auto leading-tight">
            Technical Repair Guides, Practical Tips & Industry Updates
        </h1>

        <!-- Subtitle -->
        <p class="max-w-2xl mx-auto text-sm sm:text-base md:text-lg text-slate-300 font-normal leading-relaxed">
            Written by certified master trainers from Smart Technical Training Institute Patna. Master inverter AC PCB diagnosis, smartphone micro-soldering, and home appliances maintenance.
        </p>

        <!-- Live Search & Interactive Filter Bar -->
        <div class="max-w-2xl mx-auto pt-4 space-y-4">
            <div class="relative flex items-center bg-slate-900/90 backdrop-blur-md rounded-2xl border border-slate-700/80 p-1.5 shadow-2xl focus-within:border-amber-400 focus-within:ring-4 focus-within:ring-amber-400/20 transition duration-200">
                <i class="fa-solid fa-magnifying-glass text-slate-400 pl-4 text-base"></i>
                <input type="text" id="publicBlogSearch" onkeyup="filterPublicBlogs()" placeholder="Search articles by title, topic, or keyword (e.g. AC, PCB, Mobile)..." class="w-full bg-transparent px-4 py-3 text-sm text-white placeholder-slate-400 focus:outline-none">
                <button type="button" id="clearSearchBtn" onclick="clearPublicSearch()" class="hidden pr-3 text-slate-400 hover:text-white text-xs font-bold transition">
                    <i class="fa-solid fa-circle-xmark text-sm"></i>
                </button>
            </div>

            <!-- Topic Quick Category Pills -->
            <div class="flex items-center justify-center flex-wrap gap-2 pt-1" id="topicFilterPills">
                <button type="button" onclick="filterByTopic('all', this)" class="topic-pill active px-3.5 py-1.5 rounded-full text-xs font-bold bg-[#FACA0A] text-slate-950 transition shadow-sm">All Articles</button>
                <button type="button" onclick="filterByTopic('ac', this)" class="topic-pill px-3.5 py-1.5 rounded-full text-xs font-semibold bg-slate-900 hover:bg-slate-800 text-slate-300 border border-slate-800 hover:border-slate-700 transition">❄️ AC & HVAC</button>
                <button type="button" onclick="filterByTopic('mobile', this)" class="topic-pill px-3.5 py-1.5 rounded-full text-xs font-semibold bg-slate-900 hover:bg-slate-800 text-slate-300 border border-slate-800 hover:border-slate-700 transition">📱 Smartphone</button>
                <button type="button" onclick="filterByTopic('laptop', this)" class="topic-pill px-3.5 py-1.5 rounded-full text-xs font-semibold bg-slate-900 hover:bg-slate-800 text-slate-300 border border-slate-800 hover:border-slate-700 transition">💻 Laptop & Motherboard</button>
                <button type="button" onclick="filterByTopic('appliance', this)" class="topic-pill px-3.5 py-1.5 rounded-full text-xs font-semibold bg-slate-900 hover:bg-slate-800 text-slate-300 border border-slate-800 hover:border-slate-700 transition">⚡ Home Appliances</button>
            </div>
        </div>
    </div>
</section>

<!-- ================= BLOG ARTICLES SECTION ================= -->
<section class="max-w-[1320px] mx-auto px-4 sm:px-6 py-12 sm:py-20 space-y-12">
    <!-- Active Filter Counter -->
    <div class="flex items-center justify-between border-b border-gray-200/80 pb-4 flex-wrap gap-4">
        <div class="flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
            <h2 class="text-lg sm:text-xl font-extrabold text-gray-900">
                Latest Publications (<span id="visibleBlogCount">{{ count($blogs ?? []) }}</span>)
            </h2>
        </div>
        <p class="text-xs sm:text-sm text-gray-500 font-medium">Updated weekly with verified practical workbench troubleshooting</p>
    </div>

    @if(isset($blogs) && count($blogs) > 0)
        <!-- Featured Spotlight Card (First Article) -->
        @php
            $featured = $blogs->first();
            $featuredImg = $featured->image_url ? (Str::startsWith($featured->image_url, '/uploads') ? asset($featured->image_url) : asset($featured->image_url)) : asset('assets/images/default-blog.webp');
            $featuredWords = str_word_count(strip_tags($featured->content));
            $featuredReadTime = ceil($featuredWords / 200);
        @endphp

        <div id="featuredArticleCard" class="blog-card-item group relative bg-white rounded-3xl border border-gray-100 shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300" data-title="{{ strtolower($featured->title) }}" data-content="{{ strtolower(strip_tags($featured->content)) }}">
            <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
                <!-- Cover Image Container (7 Cols) -->
                <div class="lg:col-span-7 relative overflow-hidden bg-slate-900 aspect-[16/10] sm:aspect-[16/9] lg:aspect-auto lg:h-[420px]">
                    @if(!empty($featured->cover_link))
                        <a href="{{ $featured->cover_link }}" target="_blank" rel="noopener noreferrer" class="block w-full h-full relative group/feat" title="{{ $featured->title }} - Visit Link">
                            <img src="{{ $featuredImg }}" alt="{{ $featured->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 ease-out">
                            <div class="absolute bottom-4 right-4 bg-indigo-600/90 text-white text-xs font-bold px-3 py-1.5 rounded-xl shadow-lg flex items-center gap-1.5 backdrop-blur-xs hover:bg-indigo-600 transition">
                                <span>Visit Link</span> <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('blog.show', $featured->slug ?? $featured->id) }}" class="block w-full h-full">
                            <img src="{{ $featuredImg }}" alt="{{ $featured->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 ease-out">
                        </a>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent lg:hidden"></div>
                    <div class="absolute top-4 left-4 flex items-center gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-black bg-amber-400 text-slate-950 shadow-md uppercase tracking-wider flex items-center gap-1.5">
                            <i class="fa-solid fa-star text-[10px]"></i> Featured Guide
                        </span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-slate-900/80 backdrop-blur-md text-white shadow-md">
                            <i class="fa-regular fa-clock mr-1"></i> {{ $featuredReadTime }} min read
                        </span>
                    </div>
                </div>

                <!-- Content Body (5 Cols) -->
                <div class="lg:col-span-5 p-6 sm:p-8 lg:p-10 space-y-5 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex items-center gap-3 flex-wrap text-xs text-gray-500">
                            <span class="font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-lg uppercase tracking-wider">SMTTC Institute</span>
                            <span>&bull;</span>
                            <span class="font-medium text-gray-400">{{ $featured->created_at->format('M d, Y') }}</span>
                            @if($featured->author_name)
                                <span>&bull;</span>
                                <span class="font-semibold text-indigo-600 flex items-center gap-1">
                                    <i class="fa-solid fa-pen-nib text-[10px]"></i> {{ $featured->author_name }}
                                </span>
                            @endif
                        </div>

                        <h3 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-gray-900 leading-tight group-hover:text-indigo-600 transition duration-200">
                            <a href="{{ route('blog.show', $featured->slug ?? $featured->id) }}">
                                {{ $featured->title }}
                            </a>
                        </h3>

                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed line-clamp-3">
                            {{ Str::limit(strip_tags($featured->content), 180) }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                        <a href="{{ route('blog.show', $featured->slug ?? $featured->id) }}" class="inline-flex items-center gap-2 font-bold text-sm text-[#FACA0A] hover:text-amber-600 group-hover:translate-x-1 transition duration-200">
                            <span>Read Complete Master Guide</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($featured->title . ' - ' . route('blog.show', $featured->slug ?? $featured->id)) }}" target="_blank" aria-label="Share on WhatsApp" class="w-8 h-8 rounded-full bg-green-50 hover:bg-green-100 text-green-600 flex items-center justify-center transition" title="Share via WhatsApp">
                            <i class="fab fa-whatsapp text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Remaining Articles Grid -->
        <div id="articlesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($blogs->skip(1) as $blog)
                @php
                    $blogImg = $blog->image_url ? (Str::startsWith($blog->image_url, '/uploads') ? asset($blog->image_url) : asset($blog->image_url)) : asset('assets/images/default-blog.webp');
                    $blogWords = str_word_count(strip_tags($blog->content));
                    $blogReadTime = ceil($blogWords / 200);
                @endphp
                <article class="blog-card-item group bg-white rounded-3xl border border-gray-100 shadow-md hover:shadow-2xl transition-all duration-300 flex flex-col justify-between overflow-hidden" data-title="{{ strtolower($blog->title) }}" data-content="{{ strtolower(strip_tags($blog->content)) }}">
                    <div>
                        <!-- Cover Image with Aspect Ratio & Zoom -->
                        <div class="relative overflow-hidden bg-gray-100 aspect-[16/10]">
                            @if(!empty($blog->cover_link))
                                <a href="{{ $blog->cover_link }}" target="_blank" rel="noopener noreferrer" class="block w-full h-full relative" title="{{ $blog->title }} - Visit Link">
                                    <img src="{{ $blogImg }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 ease-out">
                                    <div class="absolute bottom-2.5 right-2.5 bg-indigo-600/90 text-white text-[11px] font-bold px-2.5 py-1 rounded-lg shadow-md flex items-center gap-1 backdrop-blur-xs hover:bg-indigo-600 transition">
                                        <span>Link</span> <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
                                    </div>
                                </a>
                            @else
                                <a href="{{ route('blog.show', $blog->slug ?? $blog->id) }}" class="block w-full h-full">
                                    <img src="{{ $blogImg }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 ease-out">
                                </a>
                            @endif
                            
                            <!-- Badges Overlay -->
                            <div class="absolute top-3 left-3 flex items-center gap-1.5">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-slate-900/80 backdrop-blur-xs text-white">
                                    <i class="fa-regular fa-clock mr-1 text-amber-400"></i> {{ $blogReadTime }} min read
                                </span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 space-y-3">
                            <div class="flex items-center gap-2 text-[11px] text-gray-400">
                                <span class="font-bold text-gray-500">{{ $blog->created_at->format('M d, Y') }}</span>
                                @if($blog->author_name)
                                    <span>&bull;</span>
                                    <span class="font-semibold text-indigo-600 truncate max-w-[150px]">
                                        <i class="fa-solid fa-pen-nib text-[9px]"></i> {{ $blog->author_name }}
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 leading-snug line-clamp-2 group-hover:text-indigo-600 transition">
                                <a href="{{ route('blog.show', $blog->slug ?? $blog->id) }}">
                                    {{ $blog->title }}
                                </a>
                            </h3>

                            <p class="text-gray-600 text-xs sm:text-sm leading-relaxed line-clamp-3">
                                {{ Str::limit(strip_tags($blog->content), 140) }}
                            </p>
                        </div>
                    </div>

                    <!-- Card Footer Link -->
                    <div class="p-6 pt-0 border-t border-gray-50 flex items-center justify-between mt-4">
                        <a href="{{ route('blog.show', $blog->slug ?? $blog->id) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#FACA0A] hover:text-amber-600 group-hover:translate-x-1 transition duration-200">
                            <span>Read Full Article</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>

                        <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . route('blog.show', $blog->slug ?? $blog->id)) }}" target="_blank" aria-label="Share on WhatsApp" class="w-7 h-7 rounded-full bg-slate-50 hover:bg-green-50 text-slate-400 hover:text-green-600 flex items-center justify-center transition text-xs" title="Share via WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- No Search Results Found (Hidden initially) -->
        <div id="noResultsState" class="hidden text-center py-20 bg-gray-50 rounded-3xl border border-gray-200/80 p-8 space-y-4">
            <div class="w-16 h-16 mx-auto rounded-full bg-amber-50 text-amber-500 flex items-center justify-center text-2xl shadow-inner">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800">No Matching Technical Articles Found</h3>
            <p class="text-sm text-gray-500 max-w-md mx-auto">
                We couldn't find any articles matching your search query. Try searching for broader terms like "AC", "PCB", "Mobile", or "Wiring".
            </p>
            <button type="button" onclick="clearPublicSearch()" class="px-6 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs shadow-md transition">
                Clear Filters & Show All Articles
            </button>
        </div>
    @else
        <!-- No Articles in DB -->
        <div class="text-center py-24 bg-white rounded-3xl border border-gray-200/80 p-8 space-y-4 shadow-sm">
            <div class="w-20 h-20 mx-auto rounded-3xl bg-amber-50 text-amber-500 flex items-center justify-center text-3xl shadow-inner">
                <i class="fa-regular fa-folder-open"></i>
            </div>
            <h3 class="text-2xl font-black text-gray-900">Technical Articles Coming Soon</h3>
            <p class="text-sm text-gray-500 max-w-md mx-auto">
                Our master trainers are currently authoring comprehensive practical guides and troubleshooting schematics. Check back shortly!
            </p>
        </div>
    @endif
</section>

<!-- Client-side Interactive Filter Script -->
<script>
let currentTopic = 'all';

function filterPublicBlogs() {
    const input = document.getElementById('publicBlogSearch');
    const clearBtn = document.getElementById('clearSearchBtn');
    const query = input.value.toLowerCase().trim();

    if (query.length > 0) {
        clearBtn.classList.remove('hidden');
    } else {
        clearBtn.classList.add('hidden');
    }

    applyCombinedFilters(query, currentTopic);
}

function clearPublicSearch() {
    const input = document.getElementById('publicBlogSearch');
    if (input) input.value = '';
    const clearBtn = document.getElementById('clearSearchBtn');
    if (clearBtn) clearBtn.classList.add('hidden');
    currentTopic = 'all';

    // Reset topic pills
    document.querySelectorAll('.topic-pill').forEach(pill => {
        pill.className = 'topic-pill px-3.5 py-1.5 rounded-full text-xs font-semibold bg-slate-900 hover:bg-slate-800 text-slate-300 border border-slate-800 hover:border-slate-700 transition';
    });
    const allPill = document.querySelector('.topic-pill');
    if (allPill) allPill.className = 'topic-pill active px-3.5 py-1.5 rounded-full text-xs font-bold bg-[#FACA0A] text-slate-950 transition shadow-sm';

    applyCombinedFilters('', 'all');
}

function filterByTopic(topic, btn) {
    currentTopic = topic;
    document.querySelectorAll('.topic-pill').forEach(pill => {
        pill.className = 'topic-pill px-3.5 py-1.5 rounded-full text-xs font-semibold bg-slate-900 hover:bg-slate-800 text-slate-300 border border-slate-800 hover:border-slate-700 transition';
    });
    btn.className = 'topic-pill active px-3.5 py-1.5 rounded-full text-xs font-bold bg-[#FACA0A] text-slate-950 transition shadow-sm';

    const input = document.getElementById('publicBlogSearch');
    const query = input ? input.value.toLowerCase().trim() : '';
    applyCombinedFilters(query, topic);
}

function applyCombinedFilters(query, topic) {
    const items = document.querySelectorAll('.blog-card-item');
    let visibleCount = 0;

    items.forEach(card => {
        const title = card.getAttribute('data-title') || '';
        const content = card.getAttribute('data-content') || '';
        const combined = `${title} ${content}`;

        const matchesQuery = query === '' || combined.includes(query);
        let matchesTopic = true;
        if (topic !== 'all') {
            if (topic === 'ac') matchesTopic = combined.includes('ac') || combined.includes('air') || combined.includes('hvac') || combined.includes('cooling');
            else if (topic === 'mobile') matchesTopic = combined.includes('mobile') || combined.includes('phone') || combined.includes('smartphone');
            else if (topic === 'laptop') matchesTopic = combined.includes('laptop') || combined.includes('computer') || combined.includes('pcb') || combined.includes('motherboard');
            else if (topic === 'appliance') matchesTopic = combined.includes('washing') || combined.includes('fridge') || combined.includes('refrigerator') || combined.includes('appliance');
        }

        if (matchesQuery && matchesTopic) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    const countEl = document.getElementById('visibleBlogCount');
    if (countEl) countEl.innerText = visibleCount;

    const noResults = document.getElementById('noResultsState');
    if (noResults) {
        if (visibleCount === 0 && items.length > 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }
}
</script>

@endsection
