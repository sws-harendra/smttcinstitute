<?php

namespace App\Http\Controllers;

use App\Models\SeoLocationPage;
use App\Models\FeeStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SeoLocationPageController extends Controller
{
    protected function getAiSettingsFilePath(): string
    {
        return storage_path('app/ai-settings.json');
    }

    protected function getResolvedApiKey(Request $request = null): string
    {
        // 1. Incoming request body or header
        if ($request) {
            $reqKey = trim($request->input('apiKey', $request->header('x-gemini-api-key', '')));
            if (!empty($reqKey)) {
                return $reqKey;
            }
        }

        // 2. Direct env var
        $envKey = trim(env('GEMINI_API_KEY', ''));
        if (!empty($envKey)) {
            return $envKey;
        }

        // 3. Storage JSON file
        try {
            $path = $this->getAiSettingsFilePath();
            if (file_exists($path)) {
                $data = json_decode(file_get_contents($path), true);
                if (!empty($data['geminiApiKey'])) {
                    return trim($data['geminiApiKey']);
                }
            }
        } catch (\Throwable $e) {}

        // 4. Fallback search in .env file directly
        try {
            $envPath = base_path('.env');
            if (file_exists($envPath)) {
                $content = file_get_contents($envPath);
                if (preg_match('/^GEMINI_API_KEY=(.*)$/m', $content, $matches)) {
                    $val = trim($matches[1], " \t\n\r\0\x0B\"'");
                    if (!empty($val)) {
                        return $val;
                    }
                }
            }
        } catch (\Throwable $e) {}

        return '';
    }

    protected function saveResolvedApiKey(string $newKey): string
    {
        $trimmed = trim($newKey);

        // 1. Save in storage JSON
        try {
            $path = $this->getAiSettingsFilePath();
            $dir = dirname($path);
            if (!file_exists($dir)) {
                @mkdir($dir, 0755, true);
            }
            file_put_contents($path, json_encode([
                'geminiApiKey' => $trimmed,
                'updatedAt' => now()->toIso8601String()
            ], JSON_PRETTY_PRINT));
        } catch (\Throwable $e) {
            Log::warning('Failed to write ai-settings.json: ' . $e->getMessage());
        }

        // 2. Save/Update in .env
        try {
            $envPath = base_path('.env');
            if (file_exists($envPath)) {
                $content = file_get_contents($envPath);
                if (preg_match('/^GEMINI_API_KEY=/m', $content)) {
                    $content = preg_replace('/^GEMINI_API_KEY=.*$/m', 'GEMINI_API_KEY=' . $trimmed, $content);
                } else {
                    $content .= "\nGEMINI_API_KEY=" . $trimmed . "\n";
                }
                file_put_contents($envPath, $content);
            }
        } catch (\Throwable $e) {
            Log::warning('Failed to update .env with GEMINI_API_KEY: ' . $e->getMessage());
        }

        return $trimmed;
    }

    // Smart Fallback Content Generator
    protected function generateSmartFallbackContent(string $serviceName, string $locationName, ?string $focusKeyword = null, string $template = 'grid'): array
    {
        $keyword = !empty($focusKeyword) ? $focusKeyword : "{$serviceName} in {$locationName}";
        $h1 = "Best {$serviceName} in {$locationName} | 100% Practical Lab Training";
        $heroDesc = "Looking to master {$serviceName} in {$locationName}? SMTTC Institute provides ISO-certified technical training with 100% live hands-on practice, circuit schematics, modern SMD tools, and guaranteed career placement assistance across {$locationName} and Bihar.";
        $metaTitle = "Best {$serviceName} in {$locationName} - SMTTC Institute";
        $metaDesc = "Join top-rated {$serviceName} in {$locationName}. 100% practical lab, chip-level micro soldering, certified faculties, affordable fees & lifetime technical backup. Apply now!";
        $metaKeywords = "{$serviceName} in {$locationName}, best {$serviceName} institute {$locationName}, mobile repairing course {$locationName}, AC mechanic course in {$locationName}, technical training centre {$locationName}, practical training Bihar";

        $contentSections = [
            [
                'title' => "Why SMTTC Institute is #1 for {$serviceName} in {$locationName}",
                'badge' => "INSTITUTE ADVANTAGE",
                'content' => "At SMTTC Technical Training Institute, we prioritize deep practical mastery over mere theory. Our students from {$locationName} learn on real working devices, digital oscilloscopes, and DC power supplies under senior engineer mentorship.",
                'bulletPoints' => [
                    "100% hands-on training with latest diagnostic tools",
                    "ISO 9001:2015 certified diploma & valid government-recognized certificate",
                    "Free demo class and flexible morning, day & weekend batches",
                    "Dedicated hostel accommodation & mess facility for students outside {$locationName}",
                ]
            ],
            [
                'title' => "Comprehensive Syllabus & Hands-on Modules Covered",
                'badge' => "COURSE HIGHLIGHTS",
                'content' => "Our curriculum is regularly updated with cutting-edge industry standards, covering basic electronics, schematic diagram reading, advanced tracing, and board-level fault finding.",
                'bulletPoints' => [
                    "Complete component identification (Resistors, Capacitors, Coils, ICs)",
                    "Live cold & hot circuit tracing with digital multimeter & microscope",
                    "Micro-soldering, BGA reballing, jumper solutions & short killer techniques",
                    "Software flashing, FRP unlock, boot repair & troubleshooting",
                ]
            ],
            [
                'title' => "Step-by-Step Training & Placement Process",
                'badge' => "CAREER ROADMAP",
                'content' => "From your very first enrollment to opening your own service shop or securing a technician job in {$locationName}, SMTTC supports you at every milestone.",
                'bulletPoints' => [
                    "Step 1: Foundational theory & tool safety orientation",
                    "Step 2: Intensive lab practice with live customer devices",
                    "Step 3: Business setup guidance, spare parts sourcing & wholesale links",
                    "Step 4: 100% placement support and lifetime technician helpline access",
                ]
            ],
            [
                'title' => "Serving Students Across All Districts & Towns of {$locationName}",
                'badge' => "REGIONAL REACH",
                'content' => "SMTTC attracts ambitious learners from across {$locationName} and neighboring areas. Our center is conveniently connected near Saguna More / Danapur station with round-the-clock guidance.",
                'bulletPoints' => [
                    "Accessible by auto, bus, and train with easy metro connectivity",
                    "Affordable installment fee structure with special scholarship discounts",
                    "Batch revision guarantee: re-attend classes anytime for free",
                ]
            ]
        ];

        $faqs = [
            [
                'question' => "What is the qualification required to join {$serviceName} in {$locationName}?",
                'answer' => "No prior engineering degree is required! Anyone with basic 8th, 10th, or 12th pass qualifications can easily learn this course. We teach everything from ground zero."
            ],
            [
                'question' => "What is the duration of the {$serviceName}?",
                'answer' => "Regular batches run for 30 to 45 days (2-3 hours daily), while fast-track / crash courses can be completed within 15 to 20 days with intensive full-day practical sessions."
            ],
            [
                'question' => "Does SMTTC provide a certificate and job assistance?",
                'answer' => "Yes! Upon successful completion of the course and practical test, you receive an authorized ISO-certified diploma and 100% placement assistance in authorized service centers."
            ],
            [
                'question' => "Is hostel facility available for students coming to {$locationName}?",
                'answer' => "Yes, we provide safe, affordable hostel facilities with hygienic food and Wi-Fi close to our institute for students coming from different districts and states."
            ]
        ];

        return [
            'h1Heading' => $h1,
            'heroDescription' => $heroDesc,
            'focusKeyword' => $keyword,
            'metaTitle' => mb_substr($metaTitle, 0, 65),
            'metaDescription' => mb_substr($metaDesc, 0, 160),
            'metaKeywords' => $metaKeywords,
            'contentSections' => $contentSections,
            'faqs' => $faqs,
        ];
    }

    // ==========================================
    // ADMIN ENDPOINTS
    // ==========================================

    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));
        $status = $request->input('status', 'all');
        $template = $request->input('template', 'all');
        $sortBy = $request->input('sortBy', 'created_at');
        $order = strtoupper($request->input('order', 'DESC')) === 'ASC' ? 'ASC' : 'DESC';
        $limit = max(1, min(100, (int)$request->input('limit', 15)));

        $query = SeoLocationPage::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('service_name', 'like', "%{$search}%")
                  ->orWhere('location_name', 'like', "%{$search}%")
                  ->orWhere('h1_heading', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('focus_keyword', 'like', "%{$search}%");
            });
        }

        if ($status !== 'all' && in_array($status, ['published', 'draft'])) {
            $query->where('status', $status);
        }

        if ($template !== 'all' && in_array($template, ['grid', 'timeline', 'card', 'split'])) {
            $query->where('template', $template);
        }

        $validSorts = ['created_at', 'updated_at', 'views', 'seo_score', 'service_name', 'location_name', 'h1_heading'];
        $sortField = in_array($sortBy, $validSorts) ? $sortBy : 'created_at';

        $pages = $query->orderBy($sortField, $order)->paginate($limit);

        // Stats calculation
        $stats = [
            'total' => SeoLocationPage::count(),
            'published' => SeoLocationPage::where('status', 'published')->count(),
            'draft' => SeoLocationPage::where('status', 'draft')->count(),
            'aiGenerated' => SeoLocationPage::where('is_ai_generated', true)->count(),
        ];

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => $pages->items(),
                'total' => $pages->total(),
                'totalPages' => $pages->lastPage(),
                'currentPage' => $pages->currentPage(),
                'stats' => $stats,
            ]);
        }

        return view('admin.dashboard', compact('pages', 'stats'));
    }

    public function show($id)
    {
        $page = SeoLocationPage::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $page,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'location_name' => 'required|string|max:255',
            'h1_heading' => 'required|string|max:255',
        ]);

        $serviceName = trim($request->input('service_name'));
        $locationName = trim($request->input('location_name'));
        $h1Heading = trim($request->input('h1_heading'));
        $customSlug = trim($request->input('slug', ''));

        $slug = !empty($customSlug) ? Str::slug($customSlug) : Str::slug("{$serviceName}-in-{$locationName}");
        if (empty($slug)) {
            $slug = Str::slug($h1Heading) ?: 'course-location-' . time();
        }

        $baseSlug = $slug;
        $counter = 1;
        while (SeoLocationPage::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        $contentSections = $request->input('content_sections', []);
        if (is_string($contentSections)) {
            $contentSections = json_decode($contentSections, true) ?: [];
        }

        $faqs = $request->input('faqs', []);
        if (is_string($faqs)) {
            $faqs = json_decode($faqs, true) ?: [];
        }

        $status = in_array($request->input('status'), ['published', 'publish']) ? 'published' : 'draft';
        $template = in_array($request->input('template'), ['grid', 'timeline', 'card', 'split']) ? $request->input('template') : 'grid';

        $page = SeoLocationPage::create([
            'service_id' => $request->input('service_id') ?: null,
            'service_name' => $serviceName,
            'location_id' => $request->input('location_id') ?: null,
            'location_name' => $locationName,
            'slug' => $slug,
            'template' => $template,
            'focus_keyword' => $request->input('focus_keyword') ?: "{$serviceName} in {$locationName}",
            'status' => $status,
            'h1_heading' => $h1Heading,
            'hero_description' => $request->input('hero_description'),
            'content_sections' => $contentSections,
            'faqs' => $faqs,
            'meta_title' => $request->input('meta_title') ?: "Best {$serviceName} in {$locationName} - SMTTC Institute",
            'meta_description' => $request->input('meta_description') ?: $request->input('hero_description'),
            'meta_keywords' => $request->input('meta_keywords'),
            'canonical_url' => $request->input('canonical_url'),
            'og_image' => $request->input('og_image'),
            'is_ai_generated' => (bool)$request->input('is_ai_generated', false),
            'is_humanized' => (bool)$request->input('is_humanized', false),
            'views' => 0,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'AI Location Blog created successfully!',
            'data' => $page,
        ]);
    }

    public function update(Request $request, $id)
    {
        $page = SeoLocationPage::findOrFail($id);

        $request->validate([
            'service_name' => 'required|string|max:255',
            'location_name' => 'required|string|max:255',
            'h1_heading' => 'required|string|max:255',
        ]);

        $customSlug = trim($request->input('slug', ''));
        $slug = $page->slug;
        if (!empty($customSlug) && $customSlug !== $page->slug) {
            $slugCandidate = Str::slug($customSlug);
            $baseSlug = $slugCandidate;
            $counter = 1;
            while (SeoLocationPage::where('slug', $slugCandidate)->where('id', '!=', $page->id)->exists()) {
                $slugCandidate = "{$baseSlug}-{$counter}";
                $counter++;
            }
            $slug = $slugCandidate;
        }

        $contentSections = $request->input('content_sections', $page->content_sections);
        if (is_string($contentSections)) {
            $contentSections = json_decode($contentSections, true) ?: [];
        }

        $faqs = $request->input('faqs', $page->faqs);
        if (is_string($faqs)) {
            $faqs = json_decode($faqs, true) ?: [];
        }

        $status = in_array($request->input('status'), ['published', 'publish']) ? 'published' : 'draft';
        $template = in_array($request->input('template'), ['grid', 'timeline', 'card', 'split']) ? $request->input('template') : $page->template;

        $page->update([
            'service_id' => $request->input('service_id', $page->service_id),
            'service_name' => trim($request->input('service_name')),
            'location_id' => $request->input('location_id', $page->location_id),
            'location_name' => trim($request->input('location_name')),
            'slug' => $slug,
            'template' => $template,
            'focus_keyword' => $request->input('focus_keyword', $page->focus_keyword),
            'status' => $status,
            'h1_heading' => trim($request->input('h1_heading')),
            'hero_description' => $request->input('hero_description', $page->hero_description),
            'content_sections' => $contentSections,
            'faqs' => $faqs,
            'meta_title' => $request->input('meta_title', $page->meta_title),
            'meta_description' => $request->input('meta_description', $page->meta_description),
            'meta_keywords' => $request->input('meta_keywords', $page->meta_keywords),
            'canonical_url' => $request->input('canonical_url', $page->canonical_url),
            'og_image' => $request->input('og_image', $page->og_image),
            'is_ai_generated' => $request->has('is_ai_generated') ? (bool)$request->input('is_ai_generated') : $page->is_ai_generated,
            'is_humanized' => $request->has('is_humanized') ? (bool)$request->input('is_humanized') : $page->is_humanized,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'AI Location Blog updated successfully!',
            'data' => $page,
        ]);
    }

    public function destroy($id)
    {
        $page = SeoLocationPage::findOrFail($id);
        $page->delete();

        return response()->json([
            'success' => true,
            'message' => 'AI Location Blog deleted successfully!',
        ]);
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (!is_array($ids) || empty($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'Please select at least one page to delete',
            ], 400);
        }

        SeoLocationPage::whereIn('id', $ids)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Selected pages deleted successfully!',
        ]);
    }

    public function toggleStatus($id)
    {
        $page = SeoLocationPage::findOrFail($id);
        $newStatus = $page->status === 'published' ? 'draft' : 'published';
        $page->status = $newStatus;
        $page->save();

        return response()->json([
            'success' => true,
            'message' => 'Status changed to ' . ucfirst($newStatus),
            'data' => $page,
        ]);
    }

    // ==========================================
    // AI GENERATION & HUMANIZING
    // ==========================================

    public function generateAi(Request $request)
    {
        $serviceName = trim($request->input('service_name', $request->input('serviceName', '')));
        $locationName = trim($request->input('location_name', $request->input('locationName', '')));
        $focusKeyword = trim($request->input('focus_keyword', $request->input('focusKeyword', '')));
        $template = $request->input('template', 'grid');

        if (empty($serviceName) || empty($locationName)) {
            return response()->json([
                'success' => false,
                'message' => 'Both Course/Service name and Location/Area are required for AI generation.',
            ], 400);
        }

        $apiKey = $this->getResolvedApiKey($request);

        // If no API Key configured, gracefully return smart high-converting template content
        if (empty($apiKey)) {
            $fallback = $this->generateSmartFallbackContent($serviceName, $locationName, $focusKeyword, $template);
            return response()->json([
                'success' => true,
                'message' => 'Content generated using SMTTC Smart Engine! (Tip: Set your Gemini API key in AI Settings for live Gemini AI generation)',
                'data' => $fallback,
                'isAiGenerated' => true,
                'usingFallback' => true,
            ]);
        }

        // Prepare Prompt for Gemini API
        $prompt = <<<PROMPT
You are an elite SEO specialist, technical instructor, and master copywriter for "SMTTC Institute" (Smart Mobile Technical Training Center), Patna, Bihar's #1 premier institute for mobile, AC, washing machine, fridge, laptop & electronics repairing.
Create high-converting, Google #1 ranking content for a localized student landing page.
Course/Service: "{$serviceName}"
Location/Area: "{$locationName}"
Focus Keyword: "{$focusKeyword}"
Page Template: "{$template}"

CRITICAL SEO RULES:
1. "h1Heading": Must be between 35 and 70 characters and MUST explicitly include the location "{$locationName}" and course "{$serviceName}". (e.g., "Best {$serviceName} in {$locationName} | 100% Practical Lab Training")
2. "metaTitle": Must be strictly between 50 and 60 characters, containing both course and location with high CTR.
3. "metaDescription": Must be strictly between 135 and 160 characters, containing "{$locationName}", key benefits (100% practical, ISO certificate, placement assistance), and a compelling call-to-action.
4. "heroDescription": Engaging conversion-focused introductory paragraph of 35-50 words mentioning hands-on lab training in {$locationName}, modern diagnostic tools, ISO certificate, and hostel facilities.
5. "contentSections": Array of 4 structured sections with "title", "badge" (short uppercase badge like "WHY CHOOSE SMTTC", "LAB & TOOLS", "COURSE SYLLABUS", "CAREER & PLACEMENT"), "content" (2-3 sentences), and "bulletPoints" (3-4 concise actionable points).
6. "faqs": Array of 4 localized FAQs with "question" and detailed practical "answer".

Output strictly valid JSON with this exact structure and no markdown formatting or backticks:
{
  "h1Heading": "...",
  "heroDescription": "...",
  "focusKeyword": "...",
  "metaTitle": "...",
  "metaDescription": "...",
  "metaKeywords": "...",
  "contentSections": [
    {
      "title": "...",
      "badge": "...",
      "content": "...",
      "bulletPoints": ["...", "..."]
    }
  ],
  "faqs": [
    {
      "question": "...",
      "answer": "..."
    }
  ]
}
PROMPT;

        $modelsToTry = ['gemini-2.5-flash', 'gemini-flash-latest', 'gemini-2.0-flash', 'gemini-1.5-flash'];
        $aiText = null;

        foreach ($modelsToTry as $model) {
            try {
                $response = Http::timeout(25)
                    ->withHeaders(['Content-Type' => 'application/json'])
                    ->post("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}", [
                        'contents' => [
                            [
                                'parts' => [['text' => $prompt]]
                            ]
                        ],
                        'generationConfig' => [
                            'temperature' => 0.7,
                            'maxOutputTokens' => 2048,
                            'responseMimeType' => 'application/json',
                        ]
                    ]);

                if ($response->successful()) {
                    $json = $response->json();
                    if (!empty($json['candidates'][0]['content']['parts'][0]['text'])) {
                        $aiText = $json['candidates'][0]['content']['parts'][0]['text'];
                        break;
                    }
                }
            } catch (\Throwable $e) {
                Log::warning("Gemini model {$model} failed: " . $e->getMessage());
            }
        }

        if (empty($aiText)) {
            $fallback = $this->generateSmartFallbackContent($serviceName, $locationName, $focusKeyword, $template);
            return response()->json([
                'success' => true,
                'message' => 'Gemini AI API timed out; generated high-conversion smart template.',
                'data' => $fallback,
                'isAiGenerated' => true,
                'usingFallback' => true,
            ]);
        }

        $cleaned = trim($aiText);
        if (Str::startsWith($cleaned, '```json')) {
            $cleaned = preg_replace('/^```json\s*/i', '', $cleaned);
            $cleaned = preg_replace('/\s*```$/', '', $cleaned);
        } elseif (Str::startsWith($cleaned, '```')) {
            $cleaned = preg_replace('/^```\s*/', '', $cleaned);
            $cleaned = preg_replace('/\s*```$/', '', $cleaned);
        }

        $parsed = json_decode($cleaned, true);
        if (!is_array($parsed)) {
            $fallback = $this->generateSmartFallbackContent($serviceName, $locationName, $focusKeyword, $template);
            return response()->json([
                'success' => true,
                'message' => 'Generated optimized template with fallback parser.',
                'data' => $fallback,
                'isAiGenerated' => true,
                'usingFallback' => true,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Content successfully generated with Google Gemini AI!',
            'data' => $parsed,
            'isAiGenerated' => true,
            'usingFallback' => false,
        ]);
    }

    public function humanize(Request $request)
    {
        $h1Heading = $request->input('h1Heading', $request->input('h1_heading', ''));
        $heroDescription = $request->input('heroDescription', $request->input('hero_description', ''));
        $contentSections = $request->input('contentSections', $request->input('content_sections', []));
        $serviceName = $request->input('serviceName', $request->input('service_name', 'Course'));
        $locationName = $request->input('locationName', $request->input('location_name', 'Patna'));

        $apiKey = $this->getResolvedApiKey($request);

        // Smart local rule-based anti-AI humanizer
        $humanizeText = function ($text) {
            if (empty($text) || !is_string($text)) return $text;
            $search = [
                "/In today's fast-paced world,?/i",
                "/In the fast-paced world,?/i",
                "/Look no further than/i",
                "/Look no further/i",
                "/testament to/i",
                "/tapestry of/i",
                "/delve into/i",
                "/delving into/i",
                "/seamlessly/i",
                "/it is imperative that/i",
                "/state-of-the-art/i",
                "/plethora of/i",
                "/beacon of/i",
                "/moreover,/i",
                "/furthermore,/i",
                "/in conclusion,?/i",
                "/game changer/i",
            ];
            $replace = [
                "When you want real practical skills,",
                "When you want real practical skills,",
                "Count on",
                "You are in the right place",
                "proof of",
                "rich variety of",
                "explore",
                "exploring",
                "smoothly",
                "it's crucial to",
                "industry-grade",
                "wide range of",
                "trusted choice for",
                "Also,",
                "In addition,",
                "To sum up,",
                "big upgrade",
            ];
            return preg_replace($search, $replace, $text);
        };

        if (empty($apiKey)) {
            $humanizedHero = $humanizeText($heroDescription);
            $humanizedSections = array_map(function ($sec) use ($humanizeText) {
                return [
                    'title' => $humanizeText($sec['title'] ?? ''),
                    'badge' => $sec['badge'] ?? 'HIGHLIGHT',
                    'content' => $humanizeText($sec['content'] ?? ''),
                    'bulletPoints' => array_map($humanizeText, $sec['bulletPoints'] ?? []),
                ];
            }, is_array($contentSections) ? $contentSections : []);

            return response()->json([
                'success' => true,
                'message' => 'Content humanized with Anti-AI engine!',
                'data' => [
                    'heroDescription' => $humanizedHero,
                    'contentSections' => $humanizedSections,
                ],
                'isHumanized' => true,
            ]);
        }

        // Live Anti-AI rewrite using Gemini
        $prompt = <<<PROMPT
You are a master human copywriter. Take the following AI-generated text for "{$serviceName}" in "{$locationName}" at SMTTC Technical Institute and rewrite it to pass all AI detection tools with 100% human score.
Rules:
- Eliminate all robotic cliché phrases ("in today's fast-paced world", "look no further", "delve", "tapestry", "moreover", "testament").
- Make the tone warm, relatable, conversational, direct, and regionally authentic for Indian students and youth in {$locationName}, Bihar.
- Keep sentences clear, punchy, and confident.
- Do NOT change the meaning or remove technical accuracy.

Current hero description:
"{$heroDescription}"

Current sections:
PROMPT;
        $prompt .= json_encode($contentSections) . "\n\nReturn strictly valid JSON with no markdown:\n{\n  \"heroDescription\": \"...\",\n  \"contentSections\": [\n    {\n      \"title\": \"...\",\n      \"badge\": \"...\",\n      \"content\": \"...\",\n      \"bulletPoints\": [\"...\", \"...\"]\n    }\n  ]\n}";

        try {
            $response = Http::timeout(25)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}", [
                    'contents' => [
                        [
                            'parts' => [['text' => $prompt]]
                        ]
                    ],
                    'generationConfig' => [
                        'temperature' => 0.85,
                        'responseMimeType' => 'application/json',
                    ]
                ]);

            if ($response->successful()) {
                $raw = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? '';
                $cleaned = trim($raw);
                if (Str::startsWith($cleaned, '```json')) {
                    $cleaned = preg_replace('/^```json\s*/i', '', $cleaned);
                    $cleaned = preg_replace('/\s*```$/', '', $cleaned);
                } elseif (Str::startsWith($cleaned, '```')) {
                    $cleaned = preg_replace('/^```\s*/', '', $cleaned);
                    $cleaned = preg_replace('/\s*```$/', '', $cleaned);
                }
                $parsed = json_decode($cleaned, true);
                if (is_array($parsed)) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Content successfully humanized with Anti-AI Gemini Engine!',
                        'data' => $parsed,
                        'isHumanized' => true,
                    ]);
                }
            }
        } catch (\Throwable $e) {}

        // Fallback local humanizer if remote fails
        $humanizedHero = $humanizeText($heroDescription);
        $humanizedSections = array_map(function ($sec) use ($humanizeText) {
            return [
                'title' => $humanizeText($sec['title'] ?? ''),
                'badge' => $sec['badge'] ?? 'HIGHLIGHT',
                'content' => $humanizeText($sec['content'] ?? ''),
                'bulletPoints' => array_map($humanizeText, $sec['bulletPoints'] ?? []),
            ];
        }, is_array($contentSections) ? $contentSections : []);

        return response()->json([
            'success' => true,
            'message' => 'Content humanized with Anti-AI engine!',
            'data' => [
                'heroDescription' => $humanizedHero,
                'contentSections' => $humanizedSections,
            ],
            'isHumanized' => true,
        ]);
    }

    // ==========================================
    // AI SETTINGS (API KEY MANAGEMENT)
    // ==========================================

    public function getAiSettings(Request $request)
    {
        $key = $this->getResolvedApiKey($request);
        $hasKey = !empty($key) && strlen($key) > 5;
        $maskedKey = $hasKey ? substr($key, 0, 6) . '••••••••' . substr($key, -4) : '';

        return response()->json([
            'success' => true,
            'hasKey' => $hasKey,
            'maskedKey' => $maskedKey,
            'activeModel' => 'gemini-2.5-flash',
        ]);
    }

    public function saveAiSettings(Request $request)
    {
        $apiKey = trim($request->input('apiKey', ''));

        if (empty($apiKey)) {
            $this->saveResolvedApiKey('');
            return response()->json([
                'success' => true,
                'message' => 'Gemini API Key removed. AI generator will use smart fallback templates.',
                'hasKey' => false,
                'maskedKey' => '',
            ]);
        }

        // Test API key against Google Gemini endpoint
        $verified = false;
        $workingModel = 'gemini-2.5-flash';
        $testModels = ['gemini-2.5-flash', 'gemini-flash-latest', 'gemini-2.0-flash', 'gemini-1.5-flash'];
        $lastError = null;

        foreach ($testModels as $model) {
            try {
                $res = Http::timeout(10)
                    ->withHeaders(['Content-Type' => 'application/json'])
                    ->post("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}", [
                        'contents' => [['parts' => [['text' => 'ping']]]],
                        'generationConfig' => ['maxOutputTokens' => 5],
                    ]);

                if ($res->successful()) {
                    $verified = true;
                    $workingModel = $model;
                    break;
                } else {
                    $lastError = $res->json()['error']['message'] ?? 'Invalid response status: ' . $res->status();
                }
            } catch (\Throwable $e) {
                $lastError = $e->getMessage();
            }
        }

        if (!$verified) {
            // If offline/sandbox prevents outbound connection, still save the key so it works in production
            $this->saveResolvedApiKey($apiKey);
            $maskedKey = substr($apiKey, 0, 6) . '••••••••' . substr($apiKey, -4);
            return response()->json([
                'success' => true,
                'message' => 'Gemini API Key saved! (Live ping notice: ' . ($lastError ?: 'Network check skipped in current environment') . ')',
                'hasKey' => true,
                'maskedKey' => $maskedKey,
                'activeModel' => 'gemini-2.5-flash',
            ]);
        }

        $this->saveResolvedApiKey($apiKey);
        $maskedKey = substr($apiKey, 0, 6) . '••••••••' . substr($apiKey, -4);

        return response()->json([
            'success' => true,
            'message' => "Gemini API Key verified and active! Model connected: {$workingModel}",
            'hasKey' => true,
            'maskedKey' => $maskedKey,
            'activeModel' => $workingModel,
        ]);
    }

    // ==========================================
    // PUBLIC FRONTEND ROUTES
    // ==========================================

    public function showPublic(Request $request, $slug)
    {
        $page = SeoLocationPage::where('slug', $slug)->first();

        if (!$page) {
            abort(404, "Page not found for: {$slug}");
        }

        // Only allow viewing if published OR if admin is logged in
        if ($page->status !== 'published' && !session('admin_user')) {
            abort(404, "Page not found");
        }

        // Increment views
        try {
            $page->increment('views');
        } catch (\Throwable $e) {}

        // Related location pages
        $relatedPages = SeoLocationPage::where('status', 'published')
            ->where('id', '!=', $page->id)
            ->where(function ($q) use ($page) {
                $q->where('service_name', $page->service_name)
                  ->orWhere('location_name', $page->location_name);
            })
            ->take(6)
            ->get();

        return view('location-page', compact('page', 'relatedPages'));
    }

    public function locationsIndex()
    {
        $allPages = SeoLocationPage::where('status', 'published')
            ->orderBy('views', 'desc')
            ->orderBy('updated_at', 'desc')
            ->get();

        // Group dynamically by location_name
        $grouped = $allPages->groupBy(function ($item) {
            return trim($item->location_name);
        });

        $locations = [];
        $themes = ['theme-blue', 'theme-emerald', 'theme-purple', 'theme-pink', 'theme-amber', 'theme-cyan', 'theme-indigo'];
        $idx = 0;

        foreach ($grouped as $locName => $items) {
            $locations[] = [
                'name' => $locName,
                'slug' => Str::slug($locName),
                'state' => 'Bihar, India',
                'description' => "Certified technical training and practical lab courses across {$locName}.",
                'serviceCount' => $items->count(),
                'theme' => $themes[$idx % count($themes)],
                'courses' => $items,
            ];
            $idx++;
        }

        return view('locations-index', compact('locations'));
    }

    public function locationCourses($locationSlug)
    {
        $allPublished = SeoLocationPage::where('status', 'published')
            ->orderBy('views', 'desc')
            ->orderBy('updated_at', 'desc')
            ->get();

        $isAllOrBihar = in_array(strtolower(trim($locationSlug)), ['all', 'bihar', 'all-locations']);

        if ($isAllOrBihar) {
            $locationName = 'Bihar';
            $courses = $allPublished;
        } else {
            $matched = $allPublished->filter(function ($item) use ($locationSlug) {
                return Str::slug($item->location_name) === strtolower($locationSlug);
            });

            if ($matched->isEmpty()) {
                $locName = str_replace('-', ' ', $locationSlug);
                $matched = $allPublished->filter(function ($item) use ($locName) {
                    return stripos($item->location_name, $locName) !== false;
                });
            }

            $locationName = $matched->isNotEmpty() ? $matched->first()->location_name : ucwords(str_replace('-', ' ', $locationSlug));
            $courses = $matched;
        }

        return view('location-courses', compact('locationName', 'locationSlug', 'courses', 'allPublished'));
    }

    public function allCoursesByLocation()
    {
        return $this->locationCourses('bihar');
    }
}
