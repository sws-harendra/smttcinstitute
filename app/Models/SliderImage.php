<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    use HasFactory;

    protected $table = 'slider_images';

    protected $fillable = [
        'image_url',
    ];

    /**
     * Get ordered slider images with automatic population of default hero banners
     * if the database is unseeded or only contains the single initial hero1 banner.
     */
    public static function getOrderedSliders()
    {
        try {
            $sliders = static::orderBy('id', 'asc')->get();

            $defaultSlides = [
                '/assets/images/hero1.webp',
                '/assets/images/hero2.webp',
                '/assets/images/hero3.webp',
                '/assets/images/hero4.webp',
            ];

            // If empty or only 1 default hero1 image exists, ensure all 4 default banners exist
            if ($sliders->isEmpty() || ($sliders->count() === 1 && str_contains($sliders->first()->image_url, 'hero1.webp'))) {
                foreach ($defaultSlides as $slide) {
                    if (!static::where('image_url', $slide)->exists()) {
                        static::create(['image_url' => $slide]);
                    }
                }
                $sliders = static::orderBy('id', 'asc')->get();
            }

            return $sliders;
        } catch (\Throwable $e) {
            // Safe fallback in memory if database is locked or read-only
            return collect([
                (object)['id' => 1, 'image_url' => '/assets/images/hero1.webp'],
                (object)['id' => 2, 'image_url' => '/assets/images/hero2.webp'],
                (object)['id' => 3, 'image_url' => '/assets/images/hero3.webp'],
                (object)['id' => 4, 'image_url' => '/assets/images/hero4.webp'],
            ]);
        }
    }
}
