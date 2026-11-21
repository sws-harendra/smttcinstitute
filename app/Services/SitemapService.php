<?php

namespace App\Services;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SitemapService
{
    /**
     * Get the canonical base URL for the sitemap.
     * Prevents localhost URLs from leaking into production sitemaps.
     */
    public static function getBaseUrl(): string
    {
        $baseUrl = config('app.url');
        if (empty($baseUrl) || str_contains($baseUrl, 'localhost') || str_contains($baseUrl, '127.0.0.1')) {
            if (!app()->runningInConsole() && request() && request()->getHost() && !str_contains(request()->getHost(), 'localhost')) {
                $baseUrl = request()->getSchemeAndHttpHost();
            } else {
                $baseUrl = 'https://smttcinstitute.com';
            }
        }
        return rtrim($baseUrl, '/');
    }

    /**
     * Generate the complete XML sitemap content dynamically.
     */
    public static function getXml(): string
    {
        $baseUrl = self::getBaseUrl();
        $now = Carbon::now()->toIso8601String();

        // Main static pages & course pages
        $pages = [
            [
                'url' => $baseUrl . '/',
                'lastmod' => $now,
                'changefreq' => 'daily',
                'priority' => '1.0'
            ],
            [
                'url' => $baseUrl . '/courses/ac-repairing',
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => '0.9'
            ],
            [
                'url' => $baseUrl . '/courses/mobile-repairing',
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => '0.9'
            ],
            [
                'url' => $baseUrl . '/courses/laptop-repairing',
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => '0.9'
            ],
            [
                'url' => $baseUrl . '/courses/washing-machine',
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => '0.9'
            ],
            [
                'url' => $baseUrl . '/courses/fridge-repairing',
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => '0.9'
            ],
            [
                'url' => $baseUrl . '/admission',
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => '0.9'
            ],
            [
                'url' => $baseUrl . '/blog',
                'lastmod' => $now,
                'changefreq' => 'daily',
                'priority' => '0.9'
            ],
            [
                'url' => $baseUrl . '/about',
                'lastmod' => $now,
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
            [
                'url' => $baseUrl . '/feestructure',
                'lastmod' => $now,
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
            [
                'url' => $baseUrl . '/gallery',
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => '0.8'
            ],
            [
                'url' => $baseUrl . '/contact',
                'lastmod' => $now,
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
            [
                'url' => $baseUrl . '/sitemap',
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => '0.5'
            ],
        ];

        // Append all published blogs dynamically
        try {
            $blogs = Blog::latest()->get();
            foreach ($blogs as $blog) {
                $slug = !empty($blog->slug) ? $blog->slug : ($blog->id ?: Str::slug($blog->title));
                $lastmod = $blog->updated_at ? $blog->updated_at->toIso8601String() : ($blog->created_at ? $blog->created_at->toIso8601String() : $now);

                $pages[] = [
                    'url' => $baseUrl . '/blog/' . $slug,
                    'lastmod' => $lastmod,
                    'changefreq' => 'weekly',
                    'priority' => '0.8'
                ];
            }
        } catch (\Throwable $e) {
            Log::warning('SitemapService blog fetch notice: ' . $e->getMessage());
        }

        // Append /locations directory and all published AI SEO Location Pages
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('seo_location_pages')) {
                $pages[] = [
                    'url' => $baseUrl . '/locations',
                    'lastmod' => $now,
                    'changefreq' => 'weekly',
                    'priority' => '0.8'
                ];

                $seoPages = \App\Models\SeoLocationPage::where('status', 'published')->latest()->get();
                foreach ($seoPages as $sp) {
                    $lastmod = $sp->updated_at ? $sp->updated_at->toIso8601String() : ($sp->created_at ? $sp->created_at->toIso8601String() : $now);
                    $pages[] = [
                        'url' => $baseUrl . '/' . $sp->slug,
                        'lastmod' => $lastmod,
                        'changefreq' => 'weekly',
                        'priority' => '0.9'
                    ];
                }
            }
        } catch (\Throwable $e) {
            Log::warning('SitemapService seo pages fetch notice: ' . $e->getMessage());
        }

        // Build valid W3C standard XML
        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $xml .= "<urlset\n";
        $xml .= "      xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"\n";
        $xml .= "      xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\n";
        $xml .= "      xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9\n";
        $xml .= "            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n";

        foreach ($pages as $p) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($p['url'], ENT_XML1, 'UTF-8') . "</loc>\n";
            $xml .= "    <lastmod>" . htmlspecialchars($p['lastmod'], ENT_XML1, 'UTF-8') . "</lastmod>\n";
            $xml .= "    <changefreq>" . htmlspecialchars($p['changefreq'], ENT_XML1, 'UTF-8') . "</changefreq>\n";
            $xml .= "    <priority>" . htmlspecialchars($p['priority'], ENT_XML1, 'UTF-8') . "</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= "</urlset>\n";

        return $xml;
    }

    /**
     * Generate and write the sitemap.xml to disk (both public/ and root).
     * Ensures static file servers immediately serve fresh sitemaps.
     */
    public static function generateSitemapXml(): bool
    {
        try {
            $xml = self::getXml();

            $publicPath = public_path('sitemap.xml');
            @file_put_contents($publicPath, $xml);

            $rootPath = base_path('sitemap.xml');
            if (file_exists($rootPath) || is_writable(base_path())) {
                @file_put_contents($rootPath, $xml);
            }

            return true;
        } catch (\Throwable $e) {
            // Silently suppress or log without breaking the calling flow
            return false;
        }
    }
}
