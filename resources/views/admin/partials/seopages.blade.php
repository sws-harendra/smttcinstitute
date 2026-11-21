<!-- ================= TAB: AI LOCATION BLOGS (SEO PAGES) ================= -->
<div id="tab-seopages" class="hidden space-y-8 animate-fade-in">

    <!-- TOP METRIC STATS CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Pages -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Location Blogs</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-2" id="statSeoTotal">{{ $seoPageStats['total'] ?? count($seoPages ?? []) }}</h3>
                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-purple-600 mt-1">
                    <i class="fa-solid fa-map-pin"></i> Localized Pages
                </span>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-earth-asia"></i>
            </div>
        </div>

        <!-- Published Pages -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Published Live</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-2" id="statSeoPublished">{{ $seoPageStats['published'] ?? 0 }}</h3>
                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-emerald-600 mt-1">
                    <i class="fa-solid fa-circle-check"></i> Live on Google & Footer
                </span>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-globe"></i>
            </div>
        </div>

        <!-- Draft Pages -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Drafts</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-2" id="statSeoDraft">{{ $seoPageStats['draft'] ?? 0 }}</h3>
                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-amber-600 mt-1">
                    <i class="fa-solid fa-pencil"></i> In Progress
                </span>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-file-pen"></i>
            </div>
        </div>

        <!-- AI Generated Pages -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">AI Generated</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-2" id="statSeoAi">{{ $seoPageStats['aiGenerated'] ?? 0 }}</h3>
                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-indigo-600 mt-1">
                    <i class="fa-solid fa-wand-magic-sparkles"></i> Gemini AI
                </span>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-bolt-lightning"></i>
            </div>
        </div>
    </div>

    <!-- MAIN CARD: LISTING & MANAGEMENT -->
    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 md:p-8 space-y-6">

        <!-- Header Row -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-6">
            <div>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-purple-600 to-indigo-600 text-white flex items-center justify-center text-lg font-bold shadow-md shadow-indigo-200">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-black text-slate-900">AI Location Blogs & SEO Pages</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Auto-generate localized student landing pages with Gemini AI & Anti-AI Humanizer.</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2.5">
                <!-- AI Settings Button -->
                <button type="button" onclick="openAiSettingsModal()" class="px-3.5 py-2.5 rounded-xl border border-purple-200 bg-purple-50 hover:bg-purple-100 text-purple-700 font-bold text-xs transition flex items-center gap-2">
                    <i class="fa-solid fa-key"></i>
                    <span>AI Settings</span>
                    <span id="aiKeyIndicatorDot" class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                </button>

                <!-- Bulk Delete Button (Hidden by default) -->
                <button type="button" id="btnBulkDeleteSeo" onclick="bulkDeleteSeoPages()" class="hidden px-3.5 py-2.5 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 font-bold text-xs transition items-center gap-2">
                    <i class="fa-solid fa-trash-can"></i>
                    <span id="bulkDeleteCountText">Delete Selected (0)</span>
                </button>

                <!-- Create New Page Button -->
                <button type="button" onclick="openCreateSeoModal()" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-extrabold text-xs transition shadow-md shadow-indigo-300 flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i>
                    <span>Create AI Location Blog</span>
                </button>
            </div>
        </div>

        <!-- Filter & Search Toolbar -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 bg-slate-50/70 p-3 rounded-2xl border border-slate-200/70">
            <!-- Search Input -->
            <div class="relative flex-1">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" id="seoSearchInput" onkeyup="filterSeoTable()" placeholder="Search by course, location, title, or slug..." class="w-full pl-9 pr-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-medium focus:outline-none focus:ring-2 focus:ring-purple-500 transition">
            </div>

            <div class="flex items-center gap-2">
                <!-- Status Filter -->
                <select id="seoFilterStatus" onchange="filterSeoTable()" class="px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <option value="all">All Status</option>
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                </select>

                <!-- Template Filter -->
                <select id="seoFilterTemplate" onchange="filterSeoTable()" class="px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <option value="all">All Templates</option>
                    <option value="grid">Grid</option>
                    <option value="timeline">Timeline</option>
                    <option value="card">Card</option>
                    <option value="split">Split</option>
                </select>
            </div>
        </div>

        <!-- Pages Table -->
        <div class="overflow-x-auto rounded-2xl border border-slate-200/80">
            <table class="w-full text-left border-collapse" id="seoPagesTable">
                <thead>
                    <tr class="bg-slate-50 text-[11px] font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200">
                        <th class="p-4 w-10 text-center">
                            <input type="checkbox" id="selectAllSeoPages" onchange="toggleSelectAllSeoPages(this)" class="rounded border-slate-300 text-purple-600 focus:ring-purple-500">
                        </th>
                        <th class="p-4">Course & Location</th>
                        <th class="p-4">H1 Title & Slug</th>
                        <th class="p-4 text-center">Template</th>
                        <th class="p-4 text-center">SEO Score</th>
                        <th class="p-4 text-center">Status</th>
                        <th class="p-4 text-center">AI Badge</th>
                        <th class="p-4 text-center">Views</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($seoPages ?? [] as $sp)
                    @php
                        $score = $sp->seo_score ?? 0;
                        $scoreColor = $score >= 85 ? 'text-emerald-700 bg-emerald-50 border-emerald-200' : ($score >= 70 ? 'text-blue-700 bg-blue-50 border-blue-200' : ($score >= 50 ? 'text-amber-700 bg-amber-50 border-amber-200' : 'text-red-700 bg-red-50 border-red-200'));
                        $templateColors = [
                            'grid' => 'bg-blue-100 text-blue-800',
                            'timeline' => 'bg-emerald-100 text-emerald-800',
                            'card' => 'bg-purple-100 text-purple-800',
                            'split' => 'bg-amber-100 text-amber-800',
                        ];
                    @endphp
                    <tr class="hover:bg-slate-50/70 transition seo-page-row"
                        data-id="{{ $sp->id }}"
                        data-status="{{ $sp->status }}"
                        data-template="{{ $sp->template }}"
                        data-search="{{ strtolower($sp->service_name . ' ' . $sp->location_name . ' ' . $sp->h1_heading . ' ' . $sp->slug) }}">
                        
                        <!-- Checkbox -->
                        <td class="p-4 text-center">
                            <input type="checkbox" class="seo-row-checkbox rounded border-slate-300 text-purple-600 focus:ring-purple-500" value="{{ $sp->id }}" onchange="handleSeoRowCheck()">
                        </td>

                        <!-- Course & Location -->
                        <td class="p-4">
                            <div class="font-extrabold text-slate-900 text-xs flex items-center gap-1.5">
                                <i class="fa-solid fa-graduation-cap text-indigo-500"></i>
                                <span>{{ $sp->service_name }}</span>
                            </div>
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 mt-1 rounded-md bg-slate-100 text-slate-700 text-[10px] font-bold">
                                <i class="fa-solid fa-location-dot text-[#FACA0A]"></i> {{ $sp->location_name }}
                            </span>
                        </td>

                        <!-- H1 Title & Slug -->
                        <td class="p-4 max-w-xs">
                            <p class="font-bold text-slate-800 truncate" title="{{ $sp->h1_heading }}">
                                {{ $sp->h1_heading }}
                            </p>
                            <div class="flex items-center gap-1.5 mt-1 text-[11px] font-mono text-slate-400">
                                <span class="truncate text-indigo-600">/{{ $sp->slug }}</span>
                                <button type="button" onclick="copySeoPageLink('{{ $sp->slug }}')" title="Copy Link" class="text-slate-400 hover:text-indigo-600 transition">
                                    <i class="fa-solid fa-copy"></i>
                                </button>
                            </div>
                        </td>

                        <!-- Template -->
                        <td class="p-4 text-center">
                            <span class="inline-block px-2.5 py-1 rounded-md text-[10px] font-bold uppercase {{ $templateColors[$sp->template] ?? 'bg-slate-100 text-slate-700' }}">
                                {{ $sp->template }}
                            </span>
                        </td>

                        <!-- SEO Score -->
                        <td class="p-4 text-center">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-black border {{ $scoreColor }}">
                                <i class="fa-solid fa-chart-line text-[10px]"></i>
                                <span>{{ $score }}/100</span>
                            </span>
                        </td>

                        <!-- Status Toggle -->
                        <td class="p-4 text-center">
                            <button type="button" onclick="toggleSeoPageStatus({{ $sp->id }})" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold transition {{ $sp->status === 'published' ? 'bg-emerald-100 text-emerald-800 hover:bg-emerald-200' : 'bg-slate-200 text-slate-700 hover:bg-slate-300' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $sp->status === 'published' ? 'bg-emerald-600 animate-pulse' : 'bg-slate-400' }}"></span>
                                <span>{{ ucfirst($sp->status) }}</span>
                            </button>
                        </td>

                        <!-- AI & Humanized Badges -->
                        <td class="p-4 text-center">
                            <div class="flex flex-col items-center gap-1">
                                @if($sp->is_ai_generated)
                                <span class="inline-block px-2 py-0.5 rounded text-[10px] font-extrabold bg-indigo-50 text-indigo-700 border border-indigo-200">
                                    <i class="fa-solid fa-sparkles"></i> AI GEN
                                </span>
                                @endif
                                @if($sp->is_humanized)
                                <span class="inline-block px-2 py-0.5 rounded text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <i class="fa-solid fa-wand-magic"></i> HUMANIZED
                                </span>
                                @endif
                            </div>
                        </td>

                        <!-- Views -->
                        <td class="p-4 text-center font-mono font-bold text-slate-700">
                            {{ number_format($sp->views ?? 0) }}
                        </td>

                        <!-- Actions -->
                        <td class="p-4 text-right whitespace-nowrap">
                            <div class="inline-flex items-center gap-1.5">
                                <!-- Public Link -->
                                <a href="{{ url($sp->slug) }}" target="_blank" title="View Public Landing Page" class="p-2 rounded-lg border border-slate-200 text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 transition">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>

                                <!-- Edit Button -->
                                <button type="button" onclick="editSeoPage({{ $sp->id }})" title="Edit Page" class="p-2 rounded-lg border border-slate-200 text-slate-600 hover:text-purple-600 hover:bg-purple-50 transition">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button -->
                                <button type="button" onclick="deleteSeoPage({{ $sp->id }})" title="Delete Page" class="p-2 rounded-lg border border-slate-200 text-slate-600 hover:text-red-600 hover:bg-red-50 transition">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr id="emptySeoPagesRow">
                        <td colspan="9" class="p-12 text-center text-slate-400">
                            <div class="w-16 h-16 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center mx-auto text-2xl mb-3">
                                <i class="fa-solid fa-wand-magic-sparkles"></i>
                            </div>
                            <h4 class="text-base font-bold text-slate-800">No AI Location Blogs Yet</h4>
                            <p class="text-xs text-slate-400 max-w-sm mx-auto mt-1">
                                Click "Create AI Location Blog" to auto-generate localized Google-ranked pages for courses in Patna, Danapur, and Bihar!
                            </p>
                            <button type="button" onclick="openCreateSeoModal()" class="mt-4 px-4 py-2 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-bold text-xs shadow-md transition">
                                + Create First AI Page
                            </button>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- ================= MODAL 1: CREATE / EDIT AI LOCATION BLOG ================= -->
<div id="seoEditorModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-2 sm:p-4 bg-slate-900/60 backdrop-blur-xs overflow-y-auto">
    <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden flex flex-col my-auto max-h-[94vh] animate-fade-in">
        
        <!-- Header -->
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-white shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-purple-50 border border-purple-100 text-purple-600 flex items-center justify-center font-bold text-base">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </div>
                <div>
                    <h2 class="text-base font-black text-slate-900" id="seoModalTitle">Create AI Location Blog</h2>
                    <p class="text-xs text-slate-400">Dynamic Google #1 ranking student landing page writer</p>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <!-- AI Generate Button -->
                <button type="button" id="btnTriggerAi" onclick="triggerAiGenerate()" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-extrabold bg-gradient-to-r from-purple-600 to-indigo-600 text-white shadow-xs hover:scale-105 active:scale-95 transition-all">
                    <i class="fa-solid fa-sparkles"></i>
                    <span id="btnTriggerAiText">AI Generate</span>
                </button>

                <!-- Humanize Button -->
                <button type="button" id="btnTriggerHumanize" onclick="triggerHumanize()" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-extrabold bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200 transition-all">
                    <i class="fa-solid fa-wand-magic"></i>
                    <span id="btnTriggerHumanizeText">Humanize (Anti-AI)</span>
                </button>

                <!-- Close Modal -->
                <button type="button" onclick="closeCreateSeoModal()" class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition ml-2">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Tab Ribbons -->
        <div class="px-6 border-b border-slate-100 bg-slate-50/50 flex items-center gap-6 shrink-0">
            <button type="button" id="seoTabBtn-basic" onclick="switchSeoModalTab('basic')" class="py-3 text-xs font-bold border-b-2 border-purple-600 text-purple-600 flex items-center gap-1.5 transition">
                <i class="fa-solid fa-list-check"></i> Basic Info
            </button>
            <button type="button" id="seoTabBtn-content" onclick="switchSeoModalTab('content')" class="py-3 text-xs font-bold border-b-2 border-transparent text-slate-500 hover:text-slate-800 flex items-center gap-1.5 transition">
                <i class="fa-solid fa-file-lines"></i> Content & Sections
            </button>
            <button type="button" id="seoTabBtn-seo" onclick="switchSeoModalTab('seo')" class="py-3 text-xs font-bold border-b-2 border-transparent text-slate-500 hover:text-slate-800 flex items-center gap-1.5 transition">
                <i class="fa-solid fa-bullseye"></i> SEO & Meta
            </button>
        </div>

        <!-- Scrollable Modal Body (Grid: 8 Cols Form, 4 Cols Live SEO Score) -->
        <div class="flex-1 overflow-y-auto p-6 bg-slate-50/40">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                
                <!-- Left 8 Columns: Form Fields -->
                <div class="lg:col-span-8 space-y-6">

                    <!-- ================= TAB CONTENT 1: BASIC INFO ================= -->
                    <div id="seoTabPane-basic" class="space-y-5">
                        
                        <!-- Course & Location Row -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Course / Service -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    Course / Technical Service <span class="text-red-500">*</span>
                                </label>
                                <div class="space-y-1.5">
                                    <select id="seoFormServiceSelect" onchange="handleServiceSelectChange(this)" class="w-full bg-white border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-semibold focus:ring-2 focus:ring-purple-500">
                                        <option value="">-- Choose Course --</option>
                                        <option value="Mobile Phone Repairing Course">Mobile Phone Repairing Course</option>
                                        <option value="AC Repairing Course">AC Repairing Course</option>
                                        <option value="Laptop & Desktop Repairing Course">Laptop & Desktop Repairing Course</option>
                                        <option value="Washing Machine Repairing Course">Washing Machine Repairing Course</option>
                                        <option value="Fridge Repairing Course">Fridge Repairing Course</option>
                                        <option value="LED TV Repairing Course">LED TV Repairing Course</option>
                                        <option value="Chip Level eMMC & UFS Programming">Chip Level eMMC & UFS Programming</option>
                                        <option value="iPhone Hardware & Software Training">iPhone Hardware & Software Training</option>
                                        <option value="__custom__">+ Enter Custom Course Name</option>
                                    </select>
                                    <input type="text" id="seoFormServiceCustom" placeholder="Type custom course..." class="hidden w-full bg-white border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-semibold focus:ring-2 focus:ring-purple-500">
                                </div>
                            </div>

                            <!-- Location / Area -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    Location / City / Area <span class="text-red-500">*</span>
                                </label>
                                <div class="space-y-1.5">
                                    <select id="seoFormLocationSelect" onchange="handleLocationSelectChange(this)" class="w-full bg-white border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-semibold focus:ring-2 focus:ring-purple-500">
                                        <option value="">-- Choose Location --</option>
                                        <option value="Patna">Patna</option>
                                        <option value="Danapur">Danapur</option>
                                        <option value="Saguna More">Saguna More</option>
                                        <option value="Bailey Road">Bailey Road</option>
                                        <option value="Boring Road">Boring Road</option>
                                        <option value="Kankarbagh">Kankarbagh</option>
                                        <option value="Rajendra Nagar">Rajendra Nagar</option>
                                        <option value="Anisabad">Anisabad</option>
                                        <option value="Patliputra">Patliputra</option>
                                        <option value="Muzaffarpur">Muzaffarpur</option>
                                        <option value="Gaya">Gaya</option>
                                        <option value="Bhagalpur">Bhagalpur</option>
                                        <option value="Darbhanga">Darbhanga</option>
                                        <option value="Ara">Ara (Bhojpur)</option>
                                        <option value="Begusarai">Begusarai</option>
                                        <option value="Bihar Sharif">Bihar Sharif</option>
                                        <option value="Samastipur">Samastipur</option>
                                        <option value="Hajipur">Hajipur</option>
                                        <option value="Chhapra">Chhapra</option>
                                        <option value="__custom__">+ Enter Custom Location Name</option>
                                    </select>
                                    <input type="text" id="seoFormLocationCustom" placeholder="Type custom location/area..." class="hidden w-full bg-white border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-semibold focus:ring-2 focus:ring-purple-500">
                                </div>
                            </div>
                        </div>

                        <!-- H1 Heading -->
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">
                                    Page H1 Heading <span class="text-red-500">*</span>
                                </label>
                                <span class="text-[10px] text-slate-400">Must include Course & Location</span>
                            </div>
                            <input type="text" id="seoFormH1" oninput="handleH1Input(this.value)" placeholder="e.g. Best Mobile Phone Repairing Course in Patna | 100% Practical Training" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-bold text-slate-900 focus:ring-2 focus:ring-purple-500">
                        </div>

                        <!-- URL Slug & Focus Keyword -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    URL Slug
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs font-mono">/</span>
                                    <input type="text" id="seoFormSlug" oninput="recalcLiveSeoScore()" placeholder="mobile-repairing-course-in-patna" class="w-full bg-white border border-slate-200 rounded-xl pl-7 pr-3.5 py-2.5 text-xs font-mono focus:ring-2 focus:ring-purple-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    Focus Keyword
                                </label>
                                <input type="text" id="seoFormFocusKeyword" oninput="recalcLiveSeoScore()" placeholder="e.g. Mobile Repairing Course in Patna" class="w-full bg-white border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-semibold focus:ring-2 focus:ring-purple-500">
                            </div>
                        </div>

                        <!-- Page Template Selector (4 Visual Cards) -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                                Landing Page Template Layout
                            </label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3" id="seoTemplateOptions">
                                <!-- Grid -->
                                <div onclick="selectSeoTemplate('grid')" id="tmpl-card-grid" class="cursor-pointer p-3.5 rounded-2xl border-2 border-purple-500 bg-purple-50/50 hover:border-purple-500 transition space-y-1">
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                                        <strong class="text-xs font-bold text-slate-900">Grid</strong>
                                    </div>
                                    <p class="text-[10px] text-slate-500 leading-tight">Card grid, clean & structured</p>
                                </div>

                                <!-- Timeline -->
                                <div onclick="selectSeoTemplate('timeline')" id="tmpl-card-timeline" class="cursor-pointer p-3.5 rounded-2xl border-2 border-slate-200 bg-white hover:border-emerald-400 transition space-y-1">
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                                        <strong class="text-xs font-bold text-slate-900">Timeline</strong>
                                    </div>
                                    <p class="text-[10px] text-slate-500 leading-tight">Vertical step-by-step roadmap</p>
                                </div>

                                <!-- Card -->
                                <div onclick="selectSeoTemplate('card')" id="tmpl-card-card" class="cursor-pointer p-3.5 rounded-2xl border-2 border-slate-200 bg-white hover:border-purple-400 transition space-y-1">
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
                                        <strong class="text-xs font-bold text-slate-900">Card</strong>
                                    </div>
                                    <p class="text-[10px] text-slate-500 leading-tight">Modern glassmorphism cards</p>
                                </div>

                                <!-- Split -->
                                <div onclick="selectSeoTemplate('split')" id="tmpl-card-split" class="cursor-pointer p-3.5 rounded-2xl border-2 border-slate-200 bg-white hover:border-amber-400 transition space-y-1">
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                                        <strong class="text-xs font-bold text-slate-900">Split</strong>
                                    </div>
                                    <p class="text-[10px] text-slate-500 leading-tight">50/50 alternating split rows</p>
                                </div>
                            </div>
                            <input type="hidden" id="seoFormTemplate" value="grid">
                        </div>

                        <!-- Status Selection -->
                        <div class="pt-2">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Publication Status
                            </label>
                            <div class="flex items-center gap-4">
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="seoFormStatus" value="draft" checked class="text-purple-600 focus:ring-purple-500">
                                    <span class="text-xs font-semibold text-slate-700">Save as Draft</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="seoFormStatus" value="published" class="text-purple-600 focus:ring-purple-500">
                                    <span class="text-xs font-semibold text-slate-700">Publish Immediately (Visible in Footer & Public URL)</span>
                                </label>
                            </div>
                        </div>

                    </div>

                    <!-- ================= TAB CONTENT 2: CONTENT & SECTIONS ================= -->
                    <div id="seoTabPane-content" class="hidden space-y-6">
                        
                        <!-- Hero Description -->
                        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 space-y-2">
                            <div class="flex items-center justify-between">
                                <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">
                                    Hero Description (Intro Overview)
                                </label>
                                <span class="text-[11px] font-semibold text-slate-400" id="heroWordCountText">0 words (25+ recommended)</span>
                            </div>
                            <textarea id="seoFormHeroDesc" oninput="handleHeroDescInput(this.value)" rows="3" placeholder="Explain course benefits, 100% practical lab training in Patna, ISO certification, and career placement support..." class="w-full bg-slate-50/50 border border-slate-200 rounded-xl p-3.5 text-xs leading-relaxed focus:ring-2 focus:ring-purple-500"></textarea>
                        </div>

                        <!-- Content Sections Manager -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider">Dynamic Content Sections</h4>
                                    <p class="text-[11px] text-slate-400">Add detailed sections explaining curriculum, practical labs, and placements.</p>
                                </div>
                                <button type="button" onclick="addSeoSection()" class="px-3 py-1.5 rounded-xl bg-purple-50 hover:bg-purple-100 text-purple-700 font-bold text-xs transition flex items-center gap-1.5">
                                    <i class="fa-solid fa-plus"></i> Add Section
                                </button>
                            </div>

                            <div id="seoSectionsContainer" class="space-y-4">
                                <!-- Dynamic Section Cards will be injected here -->
                            </div>
                        </div>

                        <!-- FAQs Manager -->
                        <div class="space-y-4 pt-4 border-t border-slate-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider">Frequently Asked Questions (FAQs)</h4>
                                    <p class="text-[11px] text-slate-400">Generates Google FAQPage Schema.org rich results in search.</p>
                                </div>
                                <button type="button" onclick="addSeoFaq()" class="px-3 py-1.5 rounded-xl bg-purple-50 hover:bg-purple-100 text-purple-700 font-bold text-xs transition flex items-center gap-1.5">
                                    <i class="fa-solid fa-plus"></i> Add FAQ
                                </button>
                            </div>

                            <div id="seoFaqsContainer" class="space-y-3">
                                <!-- Dynamic FAQs will be injected here -->
                            </div>
                        </div>

                    </div>

                    <!-- ================= TAB CONTENT 3: SEO & META ================= -->
                    <div id="seoTabPane-seo" class="hidden space-y-5">
                        
                        <!-- Meta Title -->
                        <div class="space-y-1">
                            <div class="flex items-center justify-between">
                                <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">
                                    Meta Title <span class="text-red-500">*</span>
                                </label>
                                <span class="text-[11px] font-semibold text-slate-400" id="metaTitleCountText">0/60 chars (40-65 optimal)</span>
                            </div>
                            <input type="text" id="seoFormMetaTitle" oninput="handleMetaTitleInput(this.value)" placeholder="Best Mobile Repairing Course in Patna - SMTTC Institute" class="w-full bg-white border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-semibold focus:ring-2 focus:ring-purple-500">
                        </div>

                        <!-- Meta Description -->
                        <div class="space-y-1">
                            <div class="flex items-center justify-between">
                                <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">
                                    Meta Description <span class="text-red-500">*</span>
                                </label>
                                <span class="text-[11px] font-semibold text-slate-400" id="metaDescCountText">0/160 chars (120-165 optimal)</span>
                            </div>
                            <textarea id="seoFormMetaDesc" oninput="handleMetaDescInput(this.value)" rows="3" placeholder="Get 100% practical chip-level training in Patna. ISO certified diploma, advanced lab with SMD workstations, affordable fees & lifetime placement support..." class="w-full bg-white border border-slate-200 rounded-xl p-3 text-xs leading-relaxed focus:ring-2 focus:ring-purple-500"></textarea>
                        </div>

                        <!-- Meta Keywords -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Meta Keywords (Comma Separated)
                            </label>
                            <input type="text" id="seoFormMetaKeywords" placeholder="mobile repairing course in patna, chip level training, ac mechanic course patna" class="w-full bg-white border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-purple-500">
                        </div>

                        <!-- Canonical URL & OG Image -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    Canonical URL (Optional)
                                </label>
                                <input type="text" id="seoFormCanonicalUrl" placeholder="https://smttcinstitute.com/..." class="w-full bg-white border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-purple-500">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    OG Image URL (Social Share)
                                </label>
                                <input type="text" id="seoFormOgImage" placeholder="{{ asset('assets/images/logonewblack.webp') }}" class="w-full bg-white border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-purple-500">
                            </div>
                        </div>

                        <!-- Google SERP Live Snippet Box -->
                        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 space-y-2 mt-4">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Google Search Result Preview</span>
                            <div class="space-y-1 font-sans">
                                <div class="text-[11px] text-emerald-800 flex items-center gap-1">
                                    <span>https://smttcinstitute.com</span>
                                    <span>›</span>
                                    <span id="serpPreviewSlug" class="text-slate-600 font-mono">slug</span>
                                </div>
                                <h3 id="serpPreviewTitle" class="text-base text-blue-700 font-semibold hover:underline cursor-pointer leading-snug">
                                    Page Title Preview
                                </h3>
                                <p id="serpPreviewDesc" class="text-xs text-slate-600 line-clamp-2 leading-relaxed">
                                    Meta description snippet will preview here...
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Right 4 Columns: LIVE SEO SCORE WIDGET -->
                <div class="lg:col-span-4 bg-white rounded-3xl border border-slate-200 p-5 shadow-sm space-y-5 sticky top-0">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Live SEO Health</span>
                            <h3 class="text-base font-extrabold text-slate-900 mt-0.5" id="seoWidgetRating">Evaluating...</h3>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-black text-purple-600 leading-none" id="seoWidgetScore">0</div>
                            <span class="text-[10px] font-bold text-slate-400">/100 points</span>
                        </div>
                    </div>

                    <!-- Checklist -->
                    <div class="space-y-2.5 text-xs" id="seoChecklistContainer">
                        <div class="flex items-center justify-between" id="chk-h1">
                            <span class="flex items-center gap-2 text-slate-600">
                                <i class="fa-solid fa-circle-xmark text-red-400 check-icon"></i> H1 Tag Present
                            </span>
                            <span class="font-bold text-slate-400 check-pts">0/15</span>
                        </div>

                        <div class="flex items-center justify-between" id="chk-title">
                            <span class="flex items-center gap-2 text-slate-600">
                                <i class="fa-solid fa-circle-xmark text-red-400 check-icon"></i> Meta Title (40-65 chars)
                            </span>
                            <span class="font-bold text-slate-400 check-pts">0/15</span>
                        </div>

                        <div class="flex items-center justify-between" id="chk-desc">
                            <span class="flex items-center gap-2 text-slate-600">
                                <i class="fa-solid fa-circle-xmark text-red-400 check-icon"></i> Meta Desc (120-165 chars)
                            </span>
                            <span class="font-bold text-slate-400 check-pts">0/20</span>
                        </div>

                        <div class="flex items-center justify-between" id="chk-loc-h1">
                            <span class="flex items-center gap-2 text-slate-600">
                                <i class="fa-solid fa-circle-xmark text-red-400 check-icon"></i> Location in H1
                            </span>
                            <span class="font-bold text-slate-400 check-pts">0/15</span>
                        </div>

                        <div class="flex items-center justify-between" id="chk-loc-desc">
                            <span class="flex items-center gap-2 text-slate-600">
                                <i class="fa-solid fa-circle-xmark text-red-400 check-icon"></i> Location in Meta Desc
                            </span>
                            <span class="font-bold text-slate-400 check-pts">0/10</span>
                        </div>

                        <div class="flex items-center justify-between" id="chk-hero">
                            <span class="flex items-center gap-2 text-slate-600">
                                <i class="fa-solid fa-circle-xmark text-red-400 check-icon"></i> Hero Description (25+ words)
                            </span>
                            <span class="font-bold text-slate-400 check-pts">0/10</span>
                        </div>

                        <div class="flex items-center justify-between" id="chk-sections">
                            <span class="flex items-center gap-2 text-slate-600">
                                <i class="fa-solid fa-circle-xmark text-red-400 check-icon"></i> Content Sections (3+ added)
                            </span>
                            <span class="font-bold text-slate-400 check-pts">0/15</span>
                        </div>
                    </div>

                    <!-- Micro tip -->
                    <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100 text-[11px] text-slate-500 text-center" id="seoWidgetTip">
                        Complete the checklist above to boost Google Page-1 ranking.
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Actions -->
        <div class="px-6 py-4 bg-white border-t border-slate-100 flex items-center justify-between shrink-0">
            <button type="button" onclick="closeCreateSeoModal()" class="px-4 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold text-xs transition">
                Cancel
            </button>

            <div class="flex items-center gap-3">
                <button type="button" onclick="saveSeoPage(false)" class="px-5 py-2.5 rounded-xl border border-purple-200 bg-purple-50 hover:bg-purple-100 text-purple-700 font-bold text-xs transition">
                    Save as Draft
                </button>
                <button type="button" onclick="saveSeoPage(true)" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-extrabold text-xs shadow-md shadow-indigo-200 transition flex items-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <span id="btnSaveSeoText">Publish Page</span>
                </button>
            </div>
        </div>

        <input type="hidden" id="editingSeoPageId" value="">
    </div>
</div>

<!-- ================= MODAL 2: AI SETTINGS (API KEY) ================= -->
<div id="seoAiSettingsModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs">
    <div class="bg-white rounded-3xl max-w-md w-full border border-slate-200 shadow-2xl overflow-hidden animate-fade-in">
        <div class="px-6 py-4 bg-gradient-to-r from-purple-50 via-indigo-50/60 to-white border-b border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-xl bg-purple-600 text-white flex items-center justify-center text-sm font-bold shadow-xs">
                    <i class="fa-solid fa-key"></i>
                </div>
                <div>
                    <h3 class="text-sm font-extrabold text-slate-900">Gemini AI Settings</h3>
                    <p class="text-[11px] text-slate-400">Power your AI blog generator with Google Gemini</p>
                </div>
            </div>
            <button type="button" onclick="closeAiSettingsModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="p-6 space-y-4">
            <!-- Active Status Box -->
            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center justify-between text-xs">
                <div>
                    <span class="text-slate-400 text-[10px] uppercase font-bold block">Current Key Status</span>
                    <span id="aiSettingsMaskedDisplay" class="font-mono font-bold text-slate-800">No key saved</span>
                </div>
                <span id="aiSettingsStatusBadge" class="px-2.5 py-1 rounded-full text-[10px] font-black bg-slate-200 text-slate-600">INACTIVE</span>
            </div>

            <!-- Input to set new key -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700">Enter Google Gemini API Key</label>
                <div class="relative">
                    <input type="password" id="inputGeminiApiKey" placeholder="AIzaSy..." class="w-full bg-white border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-mono focus:ring-2 focus:ring-purple-500 pr-10">
                    <button type="button" onclick="toggleApiKeyVisibility()" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 text-xs">
                        <i id="apiKeyVisIcon" class="fa-solid fa-eye"></i>
                    </button>
                </div>
                <div class="flex items-center justify-between pt-1">
                    <button type="button" onclick="pasteApiKeyFromClipboard()" class="text-[11px] font-bold text-purple-600 hover:underline flex items-center gap-1">
                        <i class="fa-solid fa-paste"></i> Paste from Clipboard
                    </button>
                    <a href="https://aistudio.google.com/app/apikey" target="_blank" class="text-[11px] font-bold text-slate-400 hover:text-slate-600 flex items-center gap-1">
                        Get free key <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
                    </a>
                </div>
            </div>

            <p class="text-[11px] text-slate-400 leading-relaxed">
                When an API key is connected, the AI Generator writes full SEO landing pages live with Google Gemini. If offline or no key, it seamlessly uses SMTTC's built-in smart templates.
            </p>
        </div>

        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
            <button type="button" onclick="removeAiKey()" class="text-xs font-bold text-red-500 hover:text-red-700">
                Remove Key
            </button>
            <div class="flex items-center gap-2">
                <button type="button" onclick="closeAiSettingsModal()" class="px-3.5 py-2 rounded-xl border border-slate-200 bg-white font-bold text-xs text-slate-600">
                    Cancel
                </button>
                <button type="button" id="btnSaveAiKey" onclick="saveAiKey()" class="px-4 py-2 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-bold text-xs shadow-md shadow-purple-200 flex items-center gap-1.5">
                    <i class="fa-solid fa-check"></i>
                    <span>Test & Save</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ================= JAVASCRIPT LOGIC FOR AI LOCATION BLOGS ================= -->
<script>
let currentSeoSections = [];
let currentSeoFaqs = [];

// Initialize default state
document.addEventListener('DOMContentLoaded', () => {
    checkAiKeyStatus();
});

// Check AI key status on load
async function checkAiKeyStatus() {
    try {
        const res = await fetch("{{ route('admin.seopages.getAiSettings') }}");
        const json = await res.json();
        const dot = document.getElementById('aiKeyIndicatorDot');
        const display = document.getElementById('aiSettingsMaskedDisplay');
        const badge = document.getElementById('aiSettingsStatusBadge');

        if (json.hasKey) {
            if (dot) dot.className = 'w-2 h-2 rounded-full bg-emerald-500 animate-pulse';
            if (display) display.innerText = json.maskedKey || 'Key Active';
            if (badge) {
                badge.className = 'px-2.5 py-1 rounded-full text-[10px] font-black bg-emerald-100 text-emerald-800';
                badge.innerText = 'ACTIVE (' + (json.activeModel || 'gemini-2.5-flash') + ')';
            }
        } else {
            if (dot) dot.className = 'w-2 h-2 rounded-full bg-amber-400';
            if (display) display.innerText = 'Using Built-in Smart Templates';
            if (badge) {
                badge.className = 'px-2.5 py-1 rounded-full text-[10px] font-black bg-slate-200 text-slate-600';
                badge.innerText = 'FALLBACK READY';
            }
        }
    } catch (e) {
        console.warn('AI status check failed:', e);
    }
}

// Open / Close Modal
function openCreateSeoModal(initialData = null) {
    document.getElementById('seoEditorModal').classList.remove('hidden');
    switchSeoModalTab('basic');

    if (initialData) {
        document.getElementById('seoModalTitle').innerText = 'Edit AI Location Blog';
        document.getElementById('editingSeoPageId').value = initialData.id;

        // Populate fields
        setServiceValue(initialData.service_name || '');
        setLocationValue(initialData.location_name || '');
        document.getElementById('seoFormH1').value = initialData.h1_heading || '';
        document.getElementById('seoFormSlug').value = initialData.slug || '';
        document.getElementById('seoFormFocusKeyword').value = initialData.focus_keyword || '';
        selectSeoTemplate(initialData.template || 'grid');

        // Status
        const statusRadios = document.getElementsByName('seoFormStatus');
        for (const r of statusRadios) {
            r.checked = (r.value === (initialData.status === 'published' ? 'published' : 'draft'));
        }

        document.getElementById('seoFormHeroDesc').value = initialData.hero_description || '';
        document.getElementById('seoFormMetaTitle').value = initialData.meta_title || '';
        document.getElementById('seoFormMetaDesc').value = initialData.meta_description || '';
        document.getElementById('seoFormMetaKeywords').value = initialData.meta_keywords || '';
        document.getElementById('seoFormCanonicalUrl').value = initialData.canonical_url || '';
        document.getElementById('seoFormOgImage').value = initialData.og_image || '';

        currentSeoSections = Array.isArray(initialData.content_sections) ? initialData.content_sections : [];
        currentSeoFaqs = Array.isArray(initialData.faqs) ? initialData.faqs : [];
    } else {
        document.getElementById('seoModalTitle').innerText = 'Create AI Location Blog';
        document.getElementById('editingSeoPageId').value = '';
        
        // Reset defaults
        setServiceValue('Mobile Phone Repairing Course');
        setLocationValue('Patna');
        document.getElementById('seoFormH1').value = 'Best Mobile Phone Repairing Course in Patna | 100% Practical Training';
        document.getElementById('seoFormSlug').value = 'mobile-repairing-course-in-patna';
        document.getElementById('seoFormFocusKeyword').value = 'Mobile Repairing Course in Patna';
        selectSeoTemplate('grid');

        document.getElementById('seoFormHeroDesc').value = '';
        document.getElementById('seoFormMetaTitle').value = 'Best Mobile Phone Repairing Course in Patna - SMTTC Institute';
        document.getElementById('seoFormMetaDesc').value = 'Join Patna\'s #1 mobile repairing training institute. 100% practical lab, chip-level micro soldering, certified faculties, affordable fees & lifetime placement support.';
        document.getElementById('seoFormMetaKeywords').value = 'mobile repairing course in patna, mobile repairing institute, chip level mobile training bihar';
        document.getElementById('seoFormCanonicalUrl').value = '';
        document.getElementById('seoFormOgImage').value = '';

        currentSeoSections = [];
        currentSeoFaqs = [];
    }

    renderSeoSections();
    renderSeoFaqs();
    recalcLiveSeoScore();
}

function closeCreateSeoModal() {
    document.getElementById('seoEditorModal').classList.add('hidden');
}

// Switch Tabs inside Modal
function switchSeoModalTab(tabName) {
    const tabs = ['basic', 'content', 'seo'];
    tabs.forEach(t => {
        const pane = document.getElementById('seoTabPane-' + t);
        const btn = document.getElementById('seoTabBtn-' + t);
        if (pane) pane.classList.add('hidden');
        if (btn) {
            btn.className = 'py-3 text-xs font-bold border-b-2 border-transparent text-slate-500 hover:text-slate-800 flex items-center gap-1.5 transition';
        }
    });

    const activePane = document.getElementById('seoTabPane-' + tabName);
    const activeBtn = document.getElementById('seoTabBtn-' + tabName);
    if (activePane) activePane.classList.remove('hidden');
    if (activeBtn) {
        activeBtn.className = 'py-3 text-xs font-bold border-b-2 border-purple-600 text-purple-600 flex items-center gap-1.5 transition';
    }
}

// Template Selection
function selectSeoTemplate(templateName) {
    document.getElementById('seoFormTemplate').value = templateName;
    const all = ['grid', 'timeline', 'card', 'split'];
    all.forEach(t => {
        const el = document.getElementById('tmpl-card-' + t);
        if (el) {
            el.className = 'cursor-pointer p-3.5 rounded-2xl border-2 border-slate-200 bg-white hover:border-purple-300 transition space-y-1';
        }
    });
    const sel = document.getElementById('tmpl-card-' + templateName);
    if (sel) {
        sel.className = 'cursor-pointer p-3.5 rounded-2xl border-2 border-purple-500 bg-purple-50/50 shadow-xs transition space-y-1';
    }
}

// Service & Location Helpers
function getSelectedService() {
    const sel = document.getElementById('seoFormServiceSelect').value;
    if (sel === '__custom__') {
        return (document.getElementById('seoFormServiceCustom').value || '').trim();
    }
    return sel;
}

function setServiceValue(val) {
    const select = document.getElementById('seoFormServiceSelect');
    const custom = document.getElementById('seoFormServiceCustom');
    let matched = false;
    for (let i = 0; i < select.options.length; i++) {
        if (select.options[i].value === val) {
            select.selectedIndex = i;
            custom.classList.add('hidden');
            matched = true;
            break;
        }
    }
    if (!matched && val) {
        select.value = '__custom__';
        custom.classList.remove('hidden');
        custom.value = val;
    }
}

function handleServiceSelectChange(sel) {
    const custom = document.getElementById('seoFormServiceCustom');
    if (sel.value === '__custom__') {
        custom.classList.remove('hidden');
        custom.focus();
    } else {
        custom.classList.add('hidden');
        autoFillH1AndSlug();
    }
}

function getSelectedLocation() {
    const sel = document.getElementById('seoFormLocationSelect').value;
    if (sel === '__custom__') {
        return (document.getElementById('seoFormLocationCustom').value || '').trim();
    }
    return sel;
}

function setLocationValue(val) {
    const select = document.getElementById('seoFormLocationSelect');
    const custom = document.getElementById('seoFormLocationCustom');
    let matched = false;
    for (let i = 0; i < select.options.length; i++) {
        if (select.options[i].value === val) {
            select.selectedIndex = i;
            custom.classList.add('hidden');
            matched = true;
            break;
        }
    }
    if (!matched && val) {
        select.value = '__custom__';
        custom.classList.remove('hidden');
        custom.value = val;
    }
}

function handleLocationSelectChange(sel) {
    const custom = document.getElementById('seoFormLocationCustom');
    if (sel.value === '__custom__') {
        custom.classList.remove('hidden');
        custom.focus();
    } else {
        custom.classList.add('hidden');
        autoFillH1AndSlug();
    }
}

function slugify(text) {
    return (text || '')
        .toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '-')
        .replace(/^-+|-+$/g, '');
}

function autoFillH1AndSlug() {
    const s = getSelectedService();
    const l = getSelectedLocation();
    if (s && l) {
        const h1 = `Best ${s} in ${l} | 100% Practical Training`;
        const slug = slugify(`${s}-in-${l}`);
        const focus = `${s} in ${l}`;
        document.getElementById('seoFormH1').value = h1;
        document.getElementById('seoFormSlug').value = slug;
        document.getElementById('seoFormFocusKeyword').value = focus;
        document.getElementById('seoFormMetaTitle').value = `Best ${s} in ${l} - SMTTC Institute`;
        recalcLiveSeoScore();
    }
}

function handleH1Input(val) {
    const slugInput = document.getElementById('seoFormSlug');
    if (!slugInput.getAttribute('data-manual')) {
        slugInput.value = slugify(val);
    }
    recalcLiveSeoScore();
}

function handleHeroDescInput(val) {
    const words = (val || '').trim().split(/\s+/).filter(Boolean).length;
    document.getElementById('heroWordCountText').innerText = `${words} words (${words >= 25 ? '✓ Good' : '25+ recommended'})`;
    recalcLiveSeoScore();
}

function handleMetaTitleInput(val) {
    const len = (val || '').length;
    document.getElementById('metaTitleCountText').innerText = `${len}/60 chars (${len >= 40 && len <= 65 ? '✓ Optimal' : '40-65 optimal'})`;
    recalcLiveSeoScore();
}

function handleMetaDescInput(val) {
    const len = (val || '').length;
    document.getElementById('metaDescCountText').innerText = `${len}/160 chars (${len >= 120 && len <= 165 ? '✓ Optimal' : '120-165 optimal'})`;
    recalcLiveSeoScore();
}

// LIVE SEO SCORE CALCULATION & CHECKLIST
function recalcLiveSeoScore() {
    const h1 = (document.getElementById('seoFormH1').value || '').trim();
    const metaTitle = (document.getElementById('seoFormMetaTitle').value || '').trim();
    const metaDesc = (document.getElementById('seoFormMetaDesc').value || '').trim();
    const loc = (getSelectedLocation() || '').toLowerCase().trim();
    const hero = (document.getElementById('seoFormHeroDesc').value || '').trim();
    const slug = (document.getElementById('seoFormSlug').value || '').trim();

    let score = 0;

    // 1. H1 present & >= 8 chars (15 pts)
    const h1Valid = h1.length >= 8;
    updateCheckItem('chk-h1', h1Valid, h1Valid ? 15 : 0, 15);
    if (h1Valid) score += 15;

    // 2. Meta Title length (15 pts: 40-65 chars)
    const tLen = metaTitle.length;
    const titleValid = tLen >= 40 && tLen <= 65;
    const titlePts = titleValid ? 15 : (tLen >= 20 && tLen <= 75 ? 8 : 0);
    updateCheckItem('chk-title', titleValid, titlePts, 15);
    score += titlePts;

    // 3. Meta Desc length (20 pts: 120-165 chars)
    const dLen = metaDesc.length;
    const descValid = dLen >= 120 && dLen <= 165;
    const descPts = descValid ? 20 : (dLen >= 60 && dLen <= 180 ? 10 : 0);
    updateCheckItem('chk-desc', descValid, descPts, 20);
    score += descPts;

    // 4. Location in H1 (15 pts)
    const locInH1 = Boolean(loc && h1.toLowerCase().includes(loc));
    updateCheckItem('chk-loc-h1', locInH1, locInH1 ? 15 : 0, 15);
    if (locInH1) score += 15;

    // 5. Location in Meta Desc (10 pts)
    const locInDesc = Boolean(loc && metaDesc.toLowerCase().includes(loc));
    updateCheckItem('chk-loc-desc', locInDesc, locInDesc ? 10 : 0, 10);
    if (locInDesc) score += 10;

    // 6. Hero words (10 pts: 25+ words)
    const heroWords = hero.split(/\s+/).filter(Boolean).length;
    const heroValid = heroWords >= 25;
    const heroPts = heroValid ? 10 : (heroWords >= 10 ? 5 : 0);
    updateCheckItem('chk-hero', heroValid, heroPts, 10);
    score += heroPts;

    // 7. Content Sections (15 pts: 3+ sections)
    const secCount = currentSeoSections.length;
    const secValid = secCount >= 3;
    const secPts = secValid ? 15 : (secCount >= 1 ? 8 : 0);
    updateCheckItem('chk-sections', secValid, secPts, 15);
    score += secPts;

    // Update Score Circle and Rating
    document.getElementById('seoWidgetScore').innerText = score;
    let rating = 'Needs Work';
    let tip = 'Complete the checklist to rank on Google Page-1.';
    if (score >= 85) {
        rating = '✨ Excellent (Google #1 Ready)';
        tip = '✨ Outstanding! Content is fully optimized for top Google ranking.';
    } else if (score >= 70) {
        rating = '👍 Good SEO Health';
        tip = '👍 Good job! Add location in meta description to achieve 85+.';
    } else if (score >= 50) {
        rating = '⚠️ Fair (Add more details)';
        tip = '⚠️ Add more content sections and complete meta description.';
    }
    document.getElementById('seoWidgetRating').innerText = rating;
    document.getElementById('seoWidgetTip').innerText = tip;

    // Update SERP preview
    document.getElementById('serpPreviewTitle').innerText = metaTitle || h1 || 'Page Title';
    document.getElementById('serpPreviewSlug').innerText = slug || 'your-page-slug';
    document.getElementById('serpPreviewDesc').innerText = metaDesc || hero || 'Your search description snippet will show here.';
}

function updateCheckItem(id, passed, current, max) {
    const el = document.getElementById(id);
    if (!el) return;
    const icon = el.querySelector('.check-icon');
    const pts = el.querySelector('.check-pts');
    if (passed) {
        if (icon) icon.className = 'fa-solid fa-circle-check text-emerald-500 check-icon';
        if (pts) pts.className = 'font-bold text-emerald-600 check-pts';
    } else {
        if (icon) icon.className = 'fa-solid fa-circle-xmark text-red-400 check-icon';
        if (pts) pts.className = 'font-bold text-slate-400 check-pts';
    }
    if (pts) pts.innerText = `${current}/${max}`;
}

// SECTIONS MANAGEMENT
function renderSeoSections() {
    const container = document.getElementById('seoSectionsContainer');
    if (!container) return;
    container.innerHTML = '';

    if (currentSeoSections.length === 0) {
        container.innerHTML = `
            <div class="p-6 text-center rounded-2xl border border-dashed border-slate-200 text-slate-400 text-xs">
                No sections added yet. Click "+ Add Section" or use "AI Generate" above to create them automatically!
            </div>
        `;
        return;
    }

    currentSeoSections.forEach((sec, idx) => {
        const div = document.createElement('div');
        div.className = 'bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-xs space-y-3';
        
        let bulletsHtml = '';
        (sec.bulletPoints || []).forEach((bp, bIdx) => {
            bulletsHtml += `
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-500 text-xs shrink-0"></i>
                    <input type="text" value="${escapeHtml(bp)}" oninput="updateSeoBullet(${idx}, ${bIdx}, this.value)" class="flex-1 bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs">
                    <button type="button" onclick="removeSeoBullet(${idx}, ${bIdx})" class="text-slate-400 hover:text-red-500 text-xs p-1">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            `;
        });

        div.innerHTML = `
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-purple-600 bg-purple-50 px-2 py-0.5 rounded">SECTION ${idx + 1}</span>
                    <input type="text" value="${escapeHtml(sec.badge || '')}" oninput="updateSeoSectionField(${idx}, 'badge', this.value)" placeholder="BADGE (e.g. HIGHLIGHT)" class="bg-slate-50 border border-slate-200 rounded-lg px-2 py-1 text-[11px] font-bold text-slate-600 uppercase w-36">
                </div>
                <div class="flex items-center gap-1">
                    <button type="button" onclick="moveSeoSection(${idx}, -1)" ${idx === 0 ? 'disabled' : ''} class="p-1 text-slate-400 hover:text-slate-700 disabled:opacity-30">
                        <i class="fa-solid fa-arrow-up text-xs"></i>
                    </button>
                    <button type="button" onclick="moveSeoSection(${idx}, 1)" ${idx === currentSeoSections.length - 1 ? 'disabled' : ''} class="p-1 text-slate-400 hover:text-slate-700 disabled:opacity-30">
                        <i class="fa-solid fa-arrow-down text-xs"></i>
                    </button>
                    <button type="button" onclick="removeSeoSection(${idx})" class="p-1 text-red-500 hover:text-red-700 ml-1">
                        <i class="fa-solid fa-trash-can text-xs"></i>
                    </button>
                </div>
            </div>

            <div>
                <input type="text" value="${escapeHtml(sec.title || '')}" oninput="updateSeoSectionField(${idx}, 'title', this.value)" placeholder="Section Title..." class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs font-bold text-slate-900">
            </div>

            <div>
                <textarea oninput="updateSeoSectionField(${idx}, 'content', this.value)" rows="2" placeholder="Section description content..." class="w-full bg-slate-50/50 border border-slate-200 rounded-xl p-2.5 text-xs">${escapeHtml(sec.content || '')}</textarea>
            </div>

            <div class="space-y-2 pt-1">
                <div class="flex items-center justify-between text-[11px] font-bold text-slate-400 uppercase">
                    <span>Bullet Highlights</span>
                    <button type="button" onclick="addSeoBullet(${idx})" class="text-purple-600 hover:underline">+ Add Point</button>
                </div>
                <div class="space-y-1.5">
                    ${bulletsHtml}
                </div>
            </div>
        `;
        container.appendChild(div);
    });
    recalcLiveSeoScore();
}

function addSeoSection() {
    const loc = getSelectedLocation() || 'Patna';
    currentSeoSections.push({
        badge: 'ADVANTAGE',
        title: `Why Choose SMTTC in ${loc}`,
        content: `Complete practical training with modern SMD workstations, schematics, and experienced faculty support in ${loc}.`,
        bulletPoints: [
            '100% live circuit tracing on real customer devices',
            'ISO 9001:2015 recognized course completion certificate',
            'Complete toolkit orientation and lifetime technical backup'
        ]
    });
    renderSeoSections();
}

function removeSeoSection(idx) {
    currentSeoSections.splice(idx, 1);
    renderSeoSections();
}

function moveSeoSection(idx, dir) {
    const target = idx + dir;
    if (target < 0 || target >= currentSeoSections.length) return;
    const temp = currentSeoSections[idx];
    currentSeoSections[idx] = currentSeoSections[target];
    currentSeoSections[target] = temp;
    renderSeoSections();
}

function updateSeoSectionField(idx, field, val) {
    if (currentSeoSections[idx]) {
        currentSeoSections[idx][field] = val;
    }
    recalcLiveSeoScore();
}

function addSeoBullet(idx) {
    if (!currentSeoSections[idx].bulletPoints) currentSeoSections[idx].bulletPoints = [];
    currentSeoSections[idx].bulletPoints.push('New practical training benefit point');
    renderSeoSections();
}

function updateSeoBullet(secIdx, bpIdx, val) {
    if (currentSeoSections[secIdx] && currentSeoSections[secIdx].bulletPoints) {
        currentSeoSections[secIdx].bulletPoints[bpIdx] = val;
    }
}

function removeSeoBullet(secIdx, bpIdx) {
    if (currentSeoSections[secIdx] && currentSeoSections[secIdx].bulletPoints) {
        currentSeoSections[secIdx].bulletPoints.splice(bpIdx, 1);
        renderSeoSections();
    }
}

// FAQS MANAGEMENT
function renderSeoFaqs() {
    const container = document.getElementById('seoFaqsContainer');
    if (!container) return;
    container.innerHTML = '';

    if (currentSeoFaqs.length === 0) {
        container.innerHTML = `
            <div class="p-4 text-center rounded-2xl border border-dashed border-slate-200 text-slate-400 text-xs">
                No FAQs added yet.
            </div>
        `;
        return;
    }

    currentSeoFaqs.forEach((faq, idx) => {
        const div = document.createElement('div');
        div.className = 'bg-white rounded-2xl p-4 border border-slate-200 space-y-2';
        div.innerHTML = `
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-400">FAQ #${idx + 1}</span>
                <button type="button" onclick="removeSeoFaq(${idx})" class="text-slate-400 hover:text-red-500 text-xs">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
            <input type="text" value="${escapeHtml(faq.question || '')}" oninput="updateSeoFaqField(${idx}, 'question', this.value)" placeholder="Question..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-bold text-slate-800">
            <textarea oninput="updateSeoFaqField(${idx}, 'answer', this.value)" rows="2" placeholder="Answer..." class="w-full bg-slate-50 border border-slate-200 rounded-xl p-2 text-xs">${escapeHtml(faq.answer || '')}</textarea>
        `;
        container.appendChild(div);
    });
}

function addSeoFaq() {
    const s = getSelectedService() || 'Course';
    const l = getSelectedLocation() || 'Patna';
    currentSeoFaqs.push({
        question: `What is the duration of ${s} in ${l}?`,
        answer: `Regular batches complete in 30 to 45 days (2-3 hours daily) with full practical lab work. Fast-track batches take 15 to 20 days.`
    });
    renderSeoFaqs();
}

function removeSeoFaq(idx) {
    currentSeoFaqs.splice(idx, 1);
    renderSeoFaqs();
}

function updateSeoFaqField(idx, field, val) {
    if (currentSeoFaqs[idx]) {
        currentSeoFaqs[idx][field] = val;
    }
}

function escapeHtml(text) {
    if (!text) return '';
    return String(text)
        .replace(/&/g, '&amp;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;');
}

// AI GENERATE TRIGGER
async function triggerAiGenerate() {
    const serviceName = getSelectedService();
    const locationName = getSelectedLocation();
    const focusKeyword = document.getElementById('seoFormFocusKeyword').value;
    const template = document.getElementById('seoFormTemplate').value;

    if (!serviceName || !locationName) {
        alert('Please choose or enter both Course and Location first!');
        switchSeoModalTab('basic');
        return;
    }

    const btn = document.getElementById('btnTriggerAi');
    const btnText = document.getElementById('btnTriggerAiText');
    btn.disabled = true;
    btnText.innerText = 'Gemini AI Writing...';

    try {
        const res = await fetch("{{ route('admin.seopages.generateAi') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                service_name: serviceName,
                location_name: locationName,
                focus_keyword: focusKeyword,
                template: template
            })
        });

        const json = await res.json();
        if (json.success && json.data) {
            const d = json.data;
            if (d.h1Heading) document.getElementById('seoFormH1').value = d.h1Heading;
            if (d.heroDescription) document.getElementById('seoFormHeroDesc').value = d.heroDescription;
            if (d.focusKeyword) document.getElementById('seoFormFocusKeyword').value = d.focusKeyword;
            if (d.metaTitle) document.getElementById('seoFormMetaTitle').value = d.metaTitle;
            if (d.metaDescription) document.getElementById('seoFormMetaDesc').value = d.metaDescription;
            if (d.metaKeywords) document.getElementById('seoFormMetaKeywords').value = d.metaKeywords;

            if (Array.isArray(d.contentSections) && d.contentSections.length > 0) {
                currentSeoSections = d.contentSections;
                renderSeoSections();
            }

            if (Array.isArray(d.faqs) && d.faqs.length > 0) {
                currentSeoFaqs = d.faqs;
                renderSeoFaqs();
            }

            recalcLiveSeoScore();
            alert(json.message || 'Page content generated successfully!');
        } else {
            alert(json.message || 'Failed to generate AI content');
        }
    } catch (e) {
        alert('Error connecting to AI service: ' + e.message);
    } finally {
        btn.disabled = false;
        btnText.innerText = 'AI Generate';
    }
}

// HUMANIZE (ANTI-AI) TRIGGER
async function triggerHumanize() {
    const heroDesc = document.getElementById('seoFormHeroDesc').value;
    if (!heroDesc && currentSeoSections.length === 0) {
        alert('Please generate or write content first before humanizing!');
        return;
    }

    const btn = document.getElementById('btnTriggerHumanize');
    const btnText = document.getElementById('btnTriggerHumanizeText');
    btn.disabled = true;
    btnText.innerText = 'Humanizing Tone...';

    try {
        const res = await fetch("{{ route('admin.seopages.humanize') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                serviceName: getSelectedService(),
                locationName: getSelectedLocation(),
                heroDescription: heroDesc,
                contentSections: currentSeoSections
            })
        });

        const json = await res.json();
        if (json.success && json.data) {
            if (json.data.heroDescription) {
                document.getElementById('seoFormHeroDesc').value = json.data.heroDescription;
            }
            if (Array.isArray(json.data.contentSections)) {
                currentSeoSections = json.data.contentSections;
                renderSeoSections();
            }
            recalcLiveSeoScore();
            alert('Content successfully humanized with Anti-AI engine!');
        } else {
            alert('Humanizing completed with standard enhancements.');
        }
    } catch (e) {
        alert('Humanizing finished.');
    } finally {
        btn.disabled = false;
        btnText.innerText = 'Humanize (Anti-AI)';
    }
}

// SAVE & SUBMIT
async function saveSeoPage(forcePublish = false) {
    const serviceName = getSelectedService();
    const locationName = getSelectedLocation();
    const h1Heading = document.getElementById('seoFormH1').value.trim();

    if (!serviceName) {
        alert('Please choose or enter a Course name');
        switchSeoModalTab('basic');
        return;
    }
    if (!locationName) {
        alert('Please choose or enter a Location name');
        switchSeoModalTab('basic');
        return;
    }
    if (!h1Heading) {
        alert('H1 Heading is required');
        switchSeoModalTab('basic');
        return;
    }

    let status = 'draft';
    if (forcePublish) {
        status = 'published';
    } else {
        const radios = document.getElementsByName('seoFormStatus');
        for (const r of radios) {
            if (r.checked) status = r.value;
        }
    }

    const editingId = document.getElementById('editingSeoPageId').value;
    const url = editingId ? `/admin/seo-pages/update/${editingId}` : "{{ route('admin.seopages.store') }}";

    const payload = {
        service_name: serviceName,
        location_name: locationName,
        h1_heading: h1Heading,
        slug: document.getElementById('seoFormSlug').value.trim(),
        focus_keyword: document.getElementById('seoFormFocusKeyword').value.trim(),
        template: document.getElementById('seoFormTemplate').value,
        status: status,
        hero_description: document.getElementById('seoFormHeroDesc').value.trim(),
        content_sections: currentSeoSections,
        faqs: currentSeoFaqs,
        meta_title: document.getElementById('seoFormMetaTitle').value.trim(),
        meta_description: document.getElementById('seoFormMetaDesc').value.trim(),
        meta_keywords: document.getElementById('seoFormMetaKeywords').value.trim(),
        canonical_url: document.getElementById('seoFormCanonicalUrl').value.trim(),
        og_image: document.getElementById('seoFormOgImage').value.trim(),
        is_ai_generated: true,
        is_humanized: true
    };

    const btnSaveText = document.getElementById('btnSaveSeoText');
    btnSaveText.innerText = 'Saving...';

    try {
        const res = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(payload)
        });

        const json = await res.json();
        if (json.success) {
            alert(json.message || 'Page saved successfully!');
            closeCreateSeoModal();
            window.location.reload();
        } else {
            alert(json.message || 'Failed to save page');
        }
    } catch (e) {
        alert('Error saving page: ' + e.message);
    } finally {
        btnSaveText.innerText = 'Publish Page';
    }
}

// EDIT SINGLE PAGE
async function editSeoPage(id) {
    try {
        const res = await fetch(`/admin/seo-pages/${id}`);
        const json = await res.json();
        if (json.success && json.data) {
            openCreateSeoModal(json.data);
        } else {
            alert('Could not fetch page details');
        }
    } catch (e) {
        alert('Error loading page details: ' + e.message);
    }
}

// TOGGLE STATUS
async function toggleSeoPageStatus(id) {
    try {
        const res = await fetch(`/admin/seo-pages/toggle-status/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        const json = await res.json();
        if (json.success) {
            window.location.reload();
        } else {
            alert(json.message || 'Status toggle failed');
        }
    } catch (e) {
        alert('Error toggling status: ' + e.message);
    }
}

// DELETE SINGLE PAGE
async function deleteSeoPage(id) {
    if (!confirm('Are you sure you want to delete this AI Location Blog?')) return;

    try {
        const res = await fetch(`/admin/seo-pages/delete/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        const json = await res.json();
        if (json.success) {
            window.location.reload();
        } else {
            alert(json.message || 'Failed to delete page');
        }
    } catch (e) {
        alert('Error deleting page: ' + e.message);
    }
}

// BULK DELETE
function toggleSelectAllSeoPages(master) {
    const checkboxes = document.querySelectorAll('.seo-row-checkbox');
    checkboxes.forEach(cb => cb.checked = master.checked);
    handleSeoRowCheck();
}

function handleSeoRowCheck() {
    const checked = document.querySelectorAll('.seo-row-checkbox:checked');
    const bulkBtn = document.getElementById('btnBulkDeleteSeo');
    const countText = document.getElementById('bulkDeleteCountText');
    if (checked.length > 0) {
        bulkBtn.classList.remove('hidden');
        bulkBtn.classList.add('inline-flex');
        countText.innerText = `Delete Selected (${checked.length})`;
    } else {
        bulkBtn.classList.add('hidden');
        bulkBtn.classList.remove('inline-flex');
    }
}

async function bulkDeleteSeoPages() {
    const checked = Array.from(document.querySelectorAll('.seo-row-checkbox:checked')).map(cb => cb.value);
    if (checked.length === 0) return;

    if (!confirm(`Are you sure you want to permanently delete ${checked.length} selected pages?`)) return;

    try {
        const res = await fetch("{{ route('admin.seopages.bulkDelete') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ ids: checked })
        });
        const json = await res.json();
        if (json.success) {
            window.location.reload();
        } else {
            alert(json.message || 'Failed to bulk delete');
        }
    } catch (e) {
        alert('Error in bulk delete: ' + e.message);
    }
}

// FILTER TABLE
function filterSeoTable() {
    const search = (document.getElementById('seoSearchInput').value || '').toLowerCase().trim();
    const status = document.getElementById('seoFilterStatus').value;
    const template = document.getElementById('seoFilterTemplate').value;

    const rows = document.querySelectorAll('.seo-page-row');
    rows.forEach(r => {
        const rSearch = r.getAttribute('data-search') || '';
        const rStatus = r.getAttribute('data-status') || '';
        const rTemplate = r.getAttribute('data-template') || '';

        const matchSearch = !search || rSearch.includes(search);
        const matchStatus = status === 'all' || rStatus === status;
        const matchTemplate = template === 'all' || rTemplate === template;

        if (matchSearch && matchStatus && matchTemplate) {
            r.style.display = '';
        } else {
            r.style.display = 'none';
        }
    });
}

// COPY LINK
function copySeoPageLink(slug) {
    const url = `${window.location.origin}/${slug}`;
    navigator.clipboard.writeText(url).then(() => {
        alert('Page link copied: ' + url);
    }).catch(() => {
        alert('Page link: ' + url);
    });
}

// AI SETTINGS MODAL
function openAiSettingsModal() {
    document.getElementById('seoAiSettingsModal').classList.remove('hidden');
    checkAiKeyStatus();
}

function closeAiSettingsModal() {
    document.getElementById('seoAiSettingsModal').classList.add('hidden');
}

function toggleApiKeyVisibility() {
    const input = document.getElementById('inputGeminiApiKey');
    const icon = document.getElementById('apiKeyVisIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'fa-solid fa-eye-slash';
    } else {
        input.type = 'password';
        icon.className = 'fa-solid fa-eye';
    }
}

async function pasteApiKeyFromClipboard() {
    try {
        const text = await navigator.clipboard.readText();
        if (text) {
            document.getElementById('inputGeminiApiKey').value = text.trim();
        }
    } catch (e) {
        alert('Unable to access clipboard automatically. Please press Ctrl+V to paste manually.');
    }
}

async function saveAiKey() {
    const key = (document.getElementById('inputGeminiApiKey').value || '').trim();
    if (!key) {
        alert('Please enter a valid Gemini API key.');
        return;
    }

    const btn = document.getElementById('btnSaveAiKey');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';

    try {
        const res = await fetch("{{ route('admin.seopages.saveAiSettings') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ apiKey: key })
        });

        const json = await res.json();
        if (json.success) {
            alert(json.message || 'Gemini API key saved!');
            checkAiKeyStatus();
            closeAiSettingsModal();
        } else {
            alert(json.message || 'Failed to save key');
        }
    } catch (e) {
        alert('Error saving API key: ' + e.message);
    } finally {
        btn.disabled = false;
        btn.innerHTML = '<i class="fa-solid fa-check"></i> <span>Test & Save</span>';
    }
}

async function removeAiKey() {
    if (!confirm('Are you sure you want to remove the Gemini API key?')) return;

    try {
        const res = await fetch("{{ route('admin.seopages.saveAiSettings') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ apiKey: '' })
        });
        const json = await res.json();
        alert(json.message || 'Key removed');
        checkAiKeyStatus();
        closeAiSettingsModal();
    } catch (e) {
        alert('Error removing key');
    }
}
</script>
