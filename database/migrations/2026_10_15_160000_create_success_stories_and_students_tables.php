<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('successful_students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('course');
            $table->string('achievement'); // e.g. "Placed at Samsung • ₹35,000/mo" or "Shop Owner • ₹60k/mo"
            $table->string('photo');
            $table->string('batch_year')->nullable()->default('Certified Technician');
            $table->integer('order_num')->default(0);
            $table->timestamps();
        });

        Schema::create('success_story_videos', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('course');
            $table->string('title');
            $table->string('video_url', 1000);
            $table->string('thumbnail_url', 1000)->nullable();
            $table->string('earning_badge')->nullable()->default('Earns ₹40,000+/mo');
            $table->text('story_description')->nullable();
            $table->integer('order_num')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('success_story_videos');
        Schema::dropIfExists('successful_students');
    }
};
