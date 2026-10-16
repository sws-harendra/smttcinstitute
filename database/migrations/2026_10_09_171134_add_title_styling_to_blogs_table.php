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
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('title_color', 50)->nullable()->after('title');
            $table->string('title_font', 50)->nullable()->after('title_color');
            $table->string('title_size', 50)->nullable()->after('title_font');
            $table->string('title_weight', 50)->nullable()->after('title_size');
            $table->string('title_transform', 50)->nullable()->after('title_weight');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['title_color', 'title_font', 'title_size', 'title_weight', 'title_transform']);
        });
    }
};
