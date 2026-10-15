<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->text('description')->nullable()->after('title');
            $table->string('category', 100)->nullable()->default('General')->after('description');
            $table->string('media_type', 20)->default('image')->after('category'); // 'image' or 'video'
            $table->string('video_url', 1000)->nullable()->after('media_type');
            $table->string('thumbnail_url', 1000)->nullable()->after('video_url');
            $table->string('image_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'category', 'media_type', 'video_url', 'thumbnail_url']);
        });
    }
};
