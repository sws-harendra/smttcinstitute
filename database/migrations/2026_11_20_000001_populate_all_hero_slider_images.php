<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\SliderImage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $defaultSlides = [
            '/assets/images/hero1.webp',
            '/assets/images/hero2.webp',
            '/assets/images/hero3.webp',
            '/assets/images/hero4.webp',
        ];

        foreach ($defaultSlides as $slide) {
            if (!SliderImage::where('image_url', $slide)->exists()) {
                SliderImage::create(['image_url' => $slide]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Keep records safe on rollback
    }
};
