@extends('layouts.app')

@section('title', $blog->title . ' | Smart Technical Training Institute Patna')

@section('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($blog->content), 155) }}">
    <link rel="canonical" href="{{ route('blog.show', $blog->slug ?? $blog->id) }}" />
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($blog->content), 155) }}">
    @if($blog->image_url)
        <meta property="og:image" content="{{ Str::startsWith($blog->image_url, 'http') ? $blog->image_url : asset($blog->image_url) }}">
    @endif
    <meta property="og:type" content="article">
@endsection

@section('content')

<!-- Reading Progress Bar (Fixed Top) -->
<div id="readingProgressBar" class="fixed top-0 left-0 h-1.5 bg-gradient-to-r from-amber-400 to-[#FACA0A] z-[120] transition-all duration-150" style="width: 0%;"></div>

<section class="py-10 sm:py-16 bg-slate-50 min-h-screen">
    <div id="blogPageContainer" class="max-w-6xl xl:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8 transition-all duration-300">
        
        <div class="flex items-center justify-between flex-wrap gap-3">
            <!-- Breadcrumbs Navigation -->
            <nav class="flex items-center gap-2 text-xs sm:text-sm text-gray-500 flex-wrap" aria-label="Breadcrumb">
                <a href="/" class="hover:text-black transition">Home</a>
                <span>&rsaquo;</span>
                <a href="{{ route('blog.index') }}" class="hover:text-black transition">Technical Blogs</a>
                <span>&rsaquo;</span>
                <span class="text-gray-900 font-semibold truncate max-w-[280px] sm:max-w-md">{{ $blog->title }}</span>
            </nav>

            <!-- Responsive Reading Page View Mode Switcher -->
            <div class="flex items-center gap-1.5 bg-white border border-slate-200/90 rounded-xl p-1 shadow-2xs text-xs">
                <span class="text-[11px] font-bold text-slate-500 px-2 flex items-center gap-1">
                    <i class="fa-solid fa-desktop text-indigo-500"></i> Page View:
                </span>
                <button type="button" onclick="setBlogPageWidth('standard')" id="btnWidthStandard" class="px-2.5 py-1 rounded-lg text-xs font-semibold text-slate-600 hover:text-indigo-600 transition" title="Standard width reading mode (1024px)">
                    Standard
                </button>
                <button type="button" onclick="setBlogPageWidth('large')" id="btnWidthLarge" class="px-2.5 py-1 rounded-lg text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-200 shadow-2xs transition" title="Large spacious canvas (1360px)">
                    <i class="fa-solid fa-expand text-[10px] mr-1"></i> Large (Wide)
                </button>
            </div>
        </div>

        <!-- Main Article Container -->
        <article class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 sm:p-10 md:p-12 space-y-8" style="overflow-x: clip;">
            
            <!-- Article Header & Meta -->
            <header class="space-y-4 border-b border-gray-100 pb-8">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="text-xs font-bold text-slate-900 bg-amber-400 px-3 py-1 rounded-full uppercase tracking-wider shadow-xs">
                        SMTTC Technical Guide
                    </span>
                    <span class="text-xs font-semibold text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                        <i class="fa-regular fa-calendar mr-1"></i> {{ $blog->created_at->format('F d, Y') }}
                    </span>
                    @php
                        $wordCount = str_word_count(strip_tags($blog->content));
                        $readTime = ceil($wordCount / 200);
                    @endphp
                    <span class="text-xs font-semibold text-indigo-700 bg-indigo-50 px-3 py-1 rounded-full">
                        <i class="fa-regular fa-clock mr-1"></i> ~{{ $readTime }} min read ({{ $wordCount }} words)
                    </span>
                    @if($blog->author_name)
                        <span class="text-xs font-bold text-gray-700 bg-slate-100 px-3 py-1 rounded-full flex items-center gap-1.5">
                            <i class="fa-solid fa-pen-nib text-indigo-600 text-[10px]"></i> {{ $blog->author_name }}
                        </span>
                    @endif
                </div>

                @php
                    $titleColorStyle = !empty($blog->title_color) ? "color: {$blog->title_color};" : '';
                    $titleFontStyle = '';
                    if ($blog->title_font === 'serif') {
                        $titleFontStyle = "font-family: 'Georgia', Cambria, 'Times New Roman', serif;";
                    } elseif ($blog->title_font === 'outfit') {
                        $titleFontStyle = "font-family: 'Outfit', -apple-system, sans-serif;";
                    } elseif ($blog->title_font === 'mono') {
                        $titleFontStyle = "font-family: ui-monospace, SFMono-Regular, Menlo, monospace;";
                    } elseif ($blog->title_font === 'sans') {
                        $titleFontStyle = "font-family: 'Inter', system-ui, sans-serif;";
                    }

                    $titleSizeStyle = '';
                    if ($blog->title_size === 'medium') {
                        $titleSizeStyle = "font-size: clamp(1.5rem, 3.5vw, 2.25rem);";
                    } elseif ($blog->title_size === 'large') {
                        $titleSizeStyle = "font-size: clamp(1.85rem, 4.5vw, 2.85rem);";
                    } elseif ($blog->title_size === 'xl') {
                        $titleSizeStyle = "font-size: clamp(2.2rem, 5.5vw, 3.5rem);";
                    } elseif ($blog->title_size === 'mega') {
                        $titleSizeStyle = "font-size: clamp(2.6rem, 6.5vw, 4.2rem);";
                    }

                    $titleWeightStyle = !empty($blog->title_weight) ? "font-weight: {$blog->title_weight};" : '';
                    $titleTransformStyle = !empty($blog->title_transform) && $blog->title_transform !== 'none' ? "text-transform: {$blog->title_transform};" : '';

                    $titleCustomStyle = trim("$titleColorStyle $titleFontStyle $titleSizeStyle $titleWeightStyle $titleTransformStyle");
                @endphp
                                        
                <h1 class="text-2xl sm:text-4xl md:text-5xl font-black text-gray-950 leading-tight tracking-tight" <?php if(!empty($titleCustomStyle)) echo 'style="' . htmlspecialchars($titleCustomStyle) . '"'; ?>>
                    {{ $blog->title }}
                </h1>
            </header>

            <!-- Hero Cover Image -->
            @if($blog->image_url)
                @php
                    $coverSrc = Str::startsWith($blog->image_url, 'http') ? $blog->image_url : (Str::startsWith($blog->image_url, '/') ? asset($blog->image_url) : asset($blog->image_url));
                @endphp
                <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden shadow-lg border border-gray-100 bg-slate-900 group flex items-center justify-center">
                    @if(!empty($blog->cover_link))
                        <a href="{{ $blog->cover_link }}" target="_blank" rel="noopener noreferrer" class="w-full block relative group/banner cursor-pointer" title="{{ $blog->title }} - Click to visit link">
                            <img src="{{ $coverSrc }}" alt="{{ $blog->title }}" class="w-full max-h-[500px] object-cover object-center mx-auto transition duration-300 group-hover/banner:scale-[1.01] group-hover/banner:opacity-95">
                            
                            <!-- Interactive Backlink Callout Badge on Banner -->
                            <div class="absolute bottom-3 right-3 bg-indigo-600/90 hover:bg-indigo-600 backdrop-blur-md text-white text-xs font-bold px-3.5 py-1.5 rounded-xl flex items-center gap-1.5 shadow-lg transition transform group-hover/banner:scale-105">
                                <span>Visit Link</span>
                                <i class="fa-solid fa-arrow-up-right-from-square text-[11px]"></i>
                            </div>

                            <!-- Optional Lightbox Zoom Trigger Button -->
                            <button type="button" onclick="event.preventDefault(); event.stopPropagation(); openLightbox('{{ $coverSrc }}', '{{ addslashes($blog->title) }}')" class="absolute top-3 right-3 bg-slate-950/70 hover:bg-slate-900 text-white text-xs font-semibold px-2.5 py-1.5 rounded-lg flex items-center gap-1.5 shadow-md backdrop-blur-xs transition" title="Click to zoom image">
                                <i class="fa-solid fa-expand text-[11px]"></i>
                                <span class="hidden sm:inline">Zoom</span>
                            </button>
                        </a>
                    @else
                        <img src="{{ $coverSrc }}" alt="{{ $blog->title }}" class="w-full max-h-[500px] object-cover object-center mx-auto cursor-zoom-in" onclick="openLightbox('{{ $coverSrc }}', '{{ addslashes($blog->title) }}')">
                        <div class="absolute bottom-3 right-3 bg-slate-950/80 backdrop-blur-xs text-white text-[11px] font-semibold px-2.5 py-1 rounded-lg pointer-events-none">
                            <i class="fa-solid fa-expand mr-1"></i> Click to enlarge
                        </div>
                    @endif
                </div>
            @endif

            <!-- High-Detail Typography & Responsive Sizing Styles (Matches Editor WYSIWYG 1:1) -->
            <style>
                .blog-article-content {
                    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                    font-size: 1.0625rem;
                    line-height: 1.85;
                    color: #1e293b;
                    overflow-wrap: anywhere !important;
                    word-break: break-word !important;
                    word-wrap: break-word !important;
                    hyphens: auto;
                }
                .blog-article-content p,
                .blog-article-content li,
                .blog-article-content td,
                .blog-article-content th {
                    font-family: inherit;
                }
                .blog-article-content h1 {
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
                .blog-article-content h2 {
                    font-family: inherit;
                    font-size: 1.45rem;
                    font-weight: 800;
                    margin-top: 1.75rem;
                    margin-bottom: 0.75rem;
                    color: #0f172a;
                    line-height: 1.35;
                }
                .blog-article-content h3 {
                    font-family: inherit;
                    font-size: 1.25rem;
                    font-weight: 700;
                    margin-top: 1.5rem;
                    margin-bottom: 0.6rem;
                    color: #1e293b;
                }
                .blog-article-content p {
                    margin-top: 0;
                    margin-bottom: 1.25rem;
                    color: #334155;
                    line-height: 1.8;
                }
                .blog-article-content a {
                    color: #4f46e5;
                    text-decoration: underline;
                    text-underline-offset: 3px;
                    font-weight: 600;
                    transition: color 0.15s ease;
                }
                .blog-article-content a:hover {
                    color: #3730a3;
                }
                .blog-article-content ul {
                    list-style-type: disc;
                    padding-left: 1.75rem;
                    margin-bottom: 1.25rem;
                    color: #334155;
                }
                .blog-article-content ol {
                    list-style-type: decimal;
                    padding-left: 1.75rem;
                    margin-bottom: 1.25rem;
                    color: #334155;
                }
                .blog-article-content li {
                    margin-bottom: 0.5rem;
                }
                .blog-article-content strong, .blog-article-content b {
                    font-weight: 700;
                    color: #0f172a;
                }
                .blog-article-content blockquote {
                    border-left: 4px solid #FACA0A;
                    background: #fffbeb;
                    padding: 1rem 1.5rem;
                    border-radius: 0 1rem 1rem 0;
                    font-style: italic;
                    color: #451a03;
                    margin: 1.75rem 0;
                }
                .blog-article-content code {
                    background: #f1f5f9;
                    color: #0f172a;
                    padding: 0.2rem 0.45rem;
                    border-radius: 0.375rem;
                    font-size: 0.875em;
                    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
                }
                .blog-article-content pre {
                    background: #0f172a;
                    color: #f8fafc;
                    padding: 1.25rem;
                    border-radius: 1rem;
                    overflow-x: auto;
                    margin: 1.5rem 0;
                }

                .blog-article-content img {
                    max-width: 100%;
                    border-radius: 0.875rem;
                    box-shadow: 0 8px 24px -6px rgba(0, 0, 0, 0.12);
                    margin: 1.5rem 0;
                    cursor: zoom-in;
                    transition: transform 0.2s ease, box-shadow 0.2s ease;
                }
                .blog-article-content img:not([style*="height"]):not([height]) {
                    height: auto;
                }
                .blog-article-content img:hover {
                    box-shadow: 0 14px 28px -6px rgba(0, 0, 0, 0.18);
                }

                /* Centered, Block & Wide Images: NEVER float! Stay in normal document flow with clean margins */
                .blog-article-content img.img-center-block,
                .blog-article-content img[style*="auto"],
                .blog-article-content img[style*="display: block"]:not([style*="float: left"]):not([style*="float: right"]),
                .blog-article-content img.mx-auto,
                .blog-article-content img[style*="width: 10"],
                .blog-article-content img[style*="width: 9"],
                .blog-article-content img[style*="width: 8"],
                .blog-article-content img[style*="width: 7"],
                .blog-article-content img[style*="width: 6"],
                .blog-article-content img[style*="width: 100%"] {
                    float: none !important;
                    display: block !important;
                    margin: 1.25rem auto !important;
                    clear: both !important;
                }

                /* Floated images: only float if explicitly floated AND NOT centered with auto margins or wide */
                .blog-article-content img.img-float-left:not([style*="auto"]):not([style*="width: 10"]):not([style*="width: 9"]):not([style*="width: 8"]):not([style*="width: 7"]):not([style*="width: 6"]):not([style*="width: 100%"]),
                .blog-article-content img[style*="float: left"]:not([style*="auto"]):not([style*="width: 10"]):not([style*="width: 9"]):not([style*="width: 8"]):not([style*="width: 7"]):not([style*="width: 6"]):not([style*="width: 100%"]),
                .blog-article-content .float-left {
                    float: left !important;
                    margin: 0.35rem 2rem 1.25rem 0 !important;
                    max-width: 48% !important;
                    height: auto;
                }
                .blog-article-content img.img-float-right:not([style*="auto"]):not([style*="width: 10"]):not([style*="width: 9"]):not([style*="width: 8"]):not([style*="width: 7"]):not([style*="width: 6"]):not([style*="width: 100%"]),
                .blog-article-content img[style*="float: right"]:not([style*="auto"]):not([style*="width: 10"]):not([style*="width: 9"]):not([style*="width: 8"]):not([style*="width: 7"]):not([style*="width: 6"]):not([style*="width: 100%"]),
                .blog-article-content .float-right {
                    float: right !important;
                    margin: 0.35rem 0 1.25rem 2rem !important;
                    max-width: 48% !important;
                    height: auto;
                }

                .blog-article-content img.img-full-width {
                    width: 100% !important;
                    height: auto !important;
                    display: block !important;
                    float: none !important;
                    margin: 1.25rem auto !important;
                    clear: both !important;
                }
                .blog-article-content img.img-rounded-lg {
                    border-radius: 1.25rem !important;
                }
                .blog-article-content img.img-shadow-card {
                    box-shadow: 0 16px 36px -10px rgba(0, 0, 0, 0.2) !important;
                }

                /* Parent P clearing: centered & full-width images clear, while floated images allow text wrapping */
                .blog-article-content p:has(> img.img-center-block),
                .blog-article-content p:has(> img.img-full-width) {
                    clear: both !important;
                    margin: 1.5rem auto !important;
                }
                .blog-article-content p:has(> img.img-float-left),
                .blog-article-content p:has(> img.img-float-right) {
                    clear: none !important;
                    margin-bottom: 1.25rem !important;
                }

                /* Collapsible empty ghost paragraphs */
                .blog-article-content p:empty,
                .blog-article-content p:blank {
                    display: none !important;
                    margin: 0 !important;
                    padding: 0 !important;
                    height: 0 !important;
                    line-height: 0 !important;
                }

                /* Adjacent text / headings align flush with top of the floated image */
                .blog-article-content p:has(> img.img-float-left) + h1,
                .blog-article-content p:has(> img.img-float-left) + h2,
                .blog-article-content p:has(> img.img-float-left) + h3,
                .blog-article-content p:has(> img.img-float-left) + h4,
                .blog-article-content p:has(> img.img-float-left) + p,
                .blog-article-content p:has(> img.img-float-right) + h1,
                .blog-article-content p:has(> img.img-float-right) + h2,
                .blog-article-content p:has(> img.img-float-right) + h3,
                .blog-article-content p:has(> img.img-float-right) + h4,
                .blog-article-content p:has(> img.img-float-right) + p,
                .blog-article-content img.img-float-left + h1,
                .blog-article-content img.img-float-left + h2,
                .blog-article-content img.img-float-left + h3,
                .blog-article-content img.img-float-left + h4,
                .blog-article-content img.img-float-left + p,
                .blog-article-content img.img-float-right + h1,
                .blog-article-content img.img-float-right + h2,
                .blog-article-content img.img-float-right + h3,
                .blog-article-content img.img-float-right + h4,
                .blog-article-content img.img-float-right + p {
                    margin-top: 0 !important;
                }

                .blog-article-content figure {
                    margin: 1.5rem auto;
                    text-align: center;
                    max-width: 100%;
                }
                .blog-article-content figure.img-float-left,
                .blog-article-content figure[style*="float: left"],
                .blog-article-content figure:has(img.img-float-left) {
                    float: left !important;
                    margin: 0.25rem 1.75rem 1rem 0 !important;
                    max-width: 100%;
                    text-align: left !important;
                }
                .blog-article-content figure.img-float-right,
                .blog-article-content figure[style*="float: right"],
                .blog-article-content figure:has(img.img-float-right) {
                    float: right !important;
                    margin: 0.25rem 0 1rem 1.75rem !important;
                    max-width: 100%;
                    text-align: right !important;
                }
                .blog-article-content figure.img-center-block,
                .blog-article-content figure[style*="margin: 20px auto"] {
                    display: block !important;
                    margin: 2rem auto !important;
                    text-align: center !important;
                    clear: both !important;
                }
                .blog-article-content figure img {
                    margin: 0 auto;
                    display: inline-block;
                }
                .blog-article-content figcaption {
                    margin-top: 0.65rem;
                    font-size: 0.85rem;
                    color: #64748b;
                    font-style: italic;
                    text-align: center;
                }
                .blog-article-content::after {
                    content: "";
                    display: table;
                    clear: both;
                }

                /* Mobile & Tablet float reset so narrow screens don't choke text */
                @media (max-width: 768px) {
                    .blog-article-content img.img-float-left,
                    .blog-article-content img.img-float-right,
                    .blog-article-content img[style*="float: left"],
                    .blog-article-content img[style*="float: right"],
                    .blog-article-content .float-left,
                    .blog-article-content .float-right {
                        float: none !important;
                        margin: 1.25rem auto !important;
                        max-width: 100% !important;
                        height: auto !important;
                        display: block !important;
                        clear: both !important;
                    }
                }

                /* Tables within Content */
                .blog-article-content table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 2rem 0;
                    border-radius: 1rem;
                    overflow: hidden;
                    border: 1px solid #e2e8f0;
                }
                .blog-article-content th,
                .blog-article-content td {
                    padding: 0.85rem 1.25rem;
                    border: 1px solid #e2e8f0;
                    text-align: left;
                    font-size: 0.95rem;
                }
                .blog-article-content th {
                    background: #f8fafc;
                    font-weight: 700;
                    color: #0f172a;
                }
                .blog-article-content tr:nth-child(even) td {
                    background: #f8fafc/50;
                }
            </style>

            <!-- Rendered Rich Text Content -->
            <div id="blogContentBody" class="blog-article-content">
                @php
                    $cleanedArticleContent = $blog->content;
                    // 1. Remove empty ghost paragraphs generated by editor (<p>&nbsp;</p>, <p><br></p>, etc.)
                    $cleanedArticleContent = preg_replace('/<p[^>]*>(?:\s|&nbsp;|<br[^>]*>)*<\/p>/i', '', $cleanedArticleContent);

                    // 2. Fix floated images placed inside paragraphs after text:
                    // Hoist the floated image to the start of that paragraph so text wraps neatly from line 1
                    $cleanedArticleContent = preg_replace_callback(
                        '/<p([^>]*)>((?:(?!<p|<\/p>).)*?)(<img[^>]+(?:class="[^"]*img-float-(?:left|right)[^"]*"|style="[^"]*float:\s*(?:left|right)[^"]*")[^>]*>)((?:(?!<p|<\/p>).)*?)<\/p>/is',
                        function ($matches) {
                            $pAttrs = $matches[1];
                            $beforeImg = trim($matches[2]);
                            $img = $matches[3];
                            $afterImg = trim($matches[4]);

                            if (empty($beforeImg)) {
                                return $matches[0];
                            }

                            $combinedText = $beforeImg . ($beforeImg && $afterImg ? ' ' : '') . $afterImg;
                            return '<p' . $pAttrs . '>' . $img . $combinedText . '</p>';
                        },
                        $cleanedArticleContent
                    );
                @endphp
                {!! $cleanedArticleContent !!}
            </div>

            <!-- Social Share Bar & Actions -->
            <footer class="pt-8 border-t border-gray-100 space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-4 bg-slate-50 p-5 rounded-2xl border border-slate-100">
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-500">Share This Technical Guide</h4>
                        <p class="text-xs text-slate-400 mt-0.5">Help fellow students & technicians troubleshoot with confidence.</p>
                    </div>

                    <div class="flex items-center gap-2">
                        <!-- WhatsApp -->
                        <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . route('blog.show', $blog->slug ?? $blog->id)) }}" target="_blank" aria-label="Share on WhatsApp" class="w-10 h-10 rounded-xl bg-green-500 hover:bg-green-600 text-white flex items-center justify-center shadow-md hover:scale-105 transition" title="Share on WhatsApp">
                            <i class="fab fa-whatsapp text-lg"></i>
                        </a>

                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $blog->slug ?? $blog->id)) }}" target="_blank" aria-label="Share on Facebook" class="w-10 h-10 rounded-xl bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center shadow-md hover:scale-105 transition" title="Share on Facebook">
                            <i class="fab fa-facebook-f text-base"></i>
                        </a>

                        <!-- Twitter/X -->
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(route('blog.show', $blog->slug ?? $blog->id)) }}" target="_blank" aria-label="Share on X" class="w-10 h-10 rounded-xl bg-slate-900 hover:bg-black text-white flex items-center justify-center shadow-md hover:scale-105 transition" title="Share on X">
                            <i class="fab fa-x-twitter text-base"></i>
                        </a>

                        <!-- Copy Link -->
                        <button type="button" onclick="copyArticleLink()" aria-label="Copy Article URL" class="px-3.5 h-10 rounded-xl bg-white border border-slate-200 hover:bg-slate-100 text-slate-700 text-xs font-bold flex items-center gap-1.5 shadow-xs transition" title="Copy Article URL">
                            <i class="fa-solid fa-link"></i> <span id="copyLinkText">Copy Link</span>
                        </button>
                    </div>
                </div>

                <!-- Call to Action for Admissions -->
                <div class="bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 text-white rounded-3xl p-6 sm:p-8 flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl border border-slate-800">
                    <div class="space-y-2 text-center md:text-left">
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Want Hands-on Practical Training?</span>
                        <h4 class="text-xl sm:text-2xl font-black leading-snug">Join Smart Technical Training Institute Patna</h4>
                        <p class="text-xs sm:text-sm text-slate-300 max-w-xl">
                            100% practical lab training for AC, Refrigerator, Washing Machine, Smartphone, and Laptop repairing. 100% job placement support.
                        </p>
                    </div>
                    <a href="/#courses" class="px-6 py-3.5 rounded-xl bg-[#FACA0A] hover:bg-yellow-400 text-slate-950 font-black text-xs uppercase tracking-wider shadow-lg hover:scale-105 transition duration-200 whitespace-nowrap">
                        Explore Courses &rarr;
                    </a>
                </div>
            </footer>
        </article>

        <!-- Related Technical Articles Recommendations -->
        @php
            $recentBlogs = \App\Models\Blog::where('id', '!=', $blog->id)->latest()->take(3)->get();
        @endphp

        @if($recentBlogs->count() > 0)
            <div class="space-y-6 pt-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-extrabold text-gray-900 flex items-center gap-2">
                        <i class="fa-solid fa-book-open-reader text-amber-500"></i> More Technical Guides
                    </h3>
                    <a href="{{ route('blog.index') }}" class="text-xs font-bold text-indigo-600 hover:underline">
                        View All Articles &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($recentBlogs as $recent)
                        @php
                            $recentImg = $recent->image_url ? (Str::startsWith($recent->image_url, '/uploads') ? asset($recent->image_url) : asset($recent->image_url)) : asset('assets/images/default-blog.webp');
                        @endphp
                        <a href="{{ route('blog.show', $recent->slug ?? $recent->id) }}" class="group bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-lg transition block">
                            <div class="aspect-[16/10] overflow-hidden bg-gray-100">
                                <img src="{{ $recentImg }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <div class="p-4 space-y-2">
                                <span class="text-[10px] text-gray-400 font-semibold">{{ $recent->created_at->format('M d, Y') }}</span>
                                <h4 class="text-sm font-bold text-gray-900 line-clamp-2 group-hover:text-indigo-600 transition">
                                    {{ $recent->title }}
                                </h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

<!-- ================= HIGH-RES LIGHTBOX MODAL ================= -->
<div id="imageLightboxModal" class="fixed inset-0 z-[150] hidden flex items-center justify-center p-4 bg-slate-950/90 backdrop-blur-md transition-opacity duration-300" onclick="closeLightbox()">
    <div class="relative max-w-5xl max-h-[90vh] flex flex-col items-center justify-center" onclick="event.stopPropagation()">
        <!-- Close Button -->
        <button type="button" onclick="closeLightbox()" class="absolute -top-12 right-0 w-10 h-10 rounded-full bg-white/10 hover:bg-white/30 text-white flex items-center justify-center text-xl transition">
            <i class="fa-solid fa-xmark"></i>
        </button>
        
        <!-- Lightbox Image -->
        <img id="lightboxImg" src="" alt="Enlarged Preview" class="max-w-full max-h-[82vh] object-contain rounded-2xl shadow-2xl transition-transform duration-200">
        
        <!-- Lightbox Caption -->
        <div id="lightboxCaption" class="mt-3 text-center text-white/90 text-sm font-medium max-w-2xl px-4"></div>
    </div>
</div>

<script>
// 1. Reading Progress Bar
window.addEventListener('scroll', () => {
    const winScroll = document.documentElement.scrollTop || document.body.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    const bar = document.getElementById('readingProgressBar');
    if (bar) bar.style.width = scrolled + '%';
});

// 2. Lightbox Zoom for Article Images
document.addEventListener('DOMContentLoaded', () => {
    const contentImages = document.querySelectorAll('#blogContentBody img');
    contentImages.forEach(img => {
        img.addEventListener('click', () => {
            const caption = img.alt || (img.closest('figure') ? img.closest('figure').querySelector('figcaption')?.innerText : '');
            openLightbox(img.src, caption);
        });
    });

    // Escape key to close Lightbox
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLightbox();
    });
});

function openLightbox(src, caption) {
    const modal = document.getElementById('imageLightboxModal');
    const img = document.getElementById('lightboxImg');
    const cap = document.getElementById('lightboxCaption');
    if (img && modal) {
        img.src = src;
        if (cap) cap.innerText = caption || '';
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}

function closeLightbox() {
    const modal = document.getElementById('imageLightboxModal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }
}

// 3. Copy Article URL to Clipboard
function copyArticleLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        const textEl = document.getElementById('copyLinkText');
        if (textEl) {
            textEl.innerText = 'Copied!';
            setTimeout(() => {
                textEl.innerText = 'Copy Link';
            }, 2500);
        }
    });
}

// 4. Responsive Reading Page Width Switcher (Standard 1024px vs Large 1360px Canvas)
function setBlogPageWidth(mode) {
    const container = document.getElementById('blogPageContainer');
    const btnStd = document.getElementById('btnWidthStandard');
    const btnLrg = document.getElementById('btnWidthLarge');
    if (!container || !btnStd || !btnLrg) return;

    if (mode === 'standard') {
        container.className = 'max-w-5xl mx-auto px-4 sm:px-6 space-y-8 transition-all duration-300';
        btnStd.className = 'px-2.5 py-1 rounded-lg text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-200 shadow-2xs transition';
        btnLrg.className = 'px-2.5 py-1 rounded-lg text-xs font-semibold text-slate-600 hover:text-indigo-600 transition';
        localStorage.setItem('smttc_blog_page_width', 'standard');
    } else {
        container.className = 'max-w-6xl xl:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8 transition-all duration-300';
        btnLrg.className = 'px-2.5 py-1 rounded-lg text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-200 shadow-2xs transition';
        btnStd.className = 'px-2.5 py-1 rounded-lg text-xs font-semibold text-slate-600 hover:text-indigo-600 transition';
        localStorage.setItem('smttc_blog_page_width', 'large');
    }
}

// Auto-restore saved width preference
const savedPageWidth = localStorage.getItem('smttc_blog_page_width');
if (savedPageWidth === 'standard') {
    setBlogPageWidth('standard');
} else {
    setBlogPageWidth('large');
}
</script>

@endsection
