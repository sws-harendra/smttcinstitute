<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('seo_location_pages')) {
            Schema::create('seo_location_pages', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('service_id')->nullable();
                $table->string('service_name');
                $table->unsignedBigInteger('location_id')->nullable();
                $table->string('location_name');
                $table->string('slug')->unique();
                $table->string('template', 30)->default('grid');
                $table->string('focus_keyword')->nullable();
                $table->string('status', 20)->default('draft');
                $table->string('h1_heading');
                $table->text('hero_description')->nullable();
                $table->longText('content_sections')->nullable();
                $table->longText('faqs')->nullable();
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->text('meta_keywords')->nullable();
                $table->string('canonical_url')->nullable();
                $table->string('og_image')->nullable();
                $table->integer('seo_score')->default(0);
                $table->boolean('is_ai_generated')->default(false);
                $table->boolean('is_humanized')->default(false);
                $table->integer('views')->default(0);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_location_pages');
    }
};
