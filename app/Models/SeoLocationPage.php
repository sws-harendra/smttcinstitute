<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Services\SitemapService;

class SeoLocationPage extends Model
{
    use HasFactory;

    protected $table = 'seo_location_pages';

    protected $fillable = [
        'service_id',
        'service_name',
        'location_id',
        'location_name',
        'slug',
        'template',
        'focus_keyword',
        'status',
        'h1_heading',
        'hero_description',
        'content_sections',
        'faqs',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_image',
        'seo_score',
        'is_ai_generated',
        'is_humanized',
        'views',
    ];

    protected $casts = [
        'content_sections' => 'array',
        'faqs' => 'array',
        'is_ai_generated' => 'boolean',
        'is_humanized' => 'boolean',
        'seo_score' => 'integer',
        'views' => 'integer',
    ];

    public static function calculateScore(array $data): int
    {
        $score = 0;
        $h1 = trim($data['h1_heading'] ?? '');
        $metaTitle = trim($data['meta_title'] ?? '');
        $metaDesc = trim($data['meta_description'] ?? '');
        $location = strtolower(trim($data['location_name'] ?? ''));
        $heroDesc = trim($data['hero_description'] ?? '');
        $sections = $data['content_sections'] ?? [];

        // 1. H1 Tag Present (15 pts)
        if (mb_strlen($h1) >= 8) {
            $score += 15;
        }

        // 2. Meta Title length (15 pts: 40-65 optimal, 8 pts for 20-75)
        $titleLen = mb_strlen($metaTitle);
        if ($titleLen >= 40 && $titleLen <= 65) {
            $score += 15;
        } elseif ($titleLen >= 20 && $titleLen <= 75) {
            $score += 8;
        }

        // 3. Meta Description length (20 pts: 120-165 optimal, 10 pts for 60-180)
        $descLen = mb_strlen($metaDesc);
        if ($descLen >= 120 && $descLen <= 165) {
            $score += 20;
        } elseif ($descLen >= 60 && $descLen <= 180) {
            $score += 10;
        }

        // 4. Location in H1 (15 pts)
        if ($location !== '' && str_contains(strtolower($h1), $location)) {
            $score += 15;
        }

        // 5. Location in Meta Description (10 pts)
        if ($location !== '' && str_contains(strtolower($metaDesc), $location)) {
            $score += 10;
        }

        // 6. Hero Description word count (10 pts: 25+ words, 5 pts: 10+ words)
        $wordCount = count(array_filter(preg_split('/\s+/', $heroDesc)));
        if ($wordCount >= 25) {
            $score += 10;
        } elseif ($wordCount >= 10) {
            $score += 5;
        }

        // 7. Content sections added (15 pts: 3+ sections, 8 pts: 1+ section)
        $sectionCount = is_array($sections) ? count($sections) : 0;
        if ($sectionCount >= 3) {
            $score += 15;
        } elseif ($sectionCount >= 1) {
            $score += 8;
        }

        return min(100, max(0, $score));
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($page) {
            // Slug generation
            if (empty($page->slug)) {
                $baseSlug = Str::slug($page->service_name . '-in-' . $page->location_name);
                if (empty($baseSlug)) {
                    $baseSlug = Str::slug($page->h1_heading) ?: 'course-location-' . time();
                }

                $slug = $baseSlug;
                $counter = 1;
                while (static::where('slug', $slug)->where('id', '!=', $page->id ?? 0)->exists()) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }
                $page->slug = $slug;
            }

            // Always calculate & sync live SEO score
            $page->seo_score = static::calculateScore([
                'h1_heading' => $page->h1_heading,
                'meta_title' => $page->meta_title,
                'meta_description' => $page->meta_description,
                'location_name' => $page->location_name,
                'hero_description' => $page->hero_description,
                'content_sections' => $page->content_sections,
            ]);

            // Canonical URL default if empty
            if (empty($page->canonical_url)) {
                $baseUrl = rtrim(config('app.url') ?? 'https://smttcinstitute.com', '/');
                $page->canonical_url = $baseUrl . '/' . $page->slug;
            }
        });

        static::saved(function ($page) {
            if (class_exists(SitemapService::class)) {
                SitemapService::generateSitemapXml();
            }
        });

        static::deleted(function ($page) {
            if (class_exists(SitemapService::class)) {
                SitemapService::generateSitemapXml();
            }
        });
    }
}
