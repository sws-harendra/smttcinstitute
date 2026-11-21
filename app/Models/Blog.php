<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Services\SitemapService;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_url',
        'cover_link',
        'title_color',
        'title_font',
        'title_size',
        'title_weight',
        'title_transform',
        'author_name',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($blog) {
            if (empty($blog->slug)) {
                $baseSlug = Str::slug($blog->title) ?: 'blog-' . time();
                $slug = $baseSlug;
                $counter = 1;
                while (static::where('slug', $slug)->where('id', '!=', $blog->id ?? 0)->exists()) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }
                $blog->slug = $slug;
            }
        });

        static::saved(function ($blog) {
            SitemapService::generateSitemapXml();
        });

        static::deleted(function ($blog) {
            SitemapService::generateSitemapXml();
        });
    }
}
