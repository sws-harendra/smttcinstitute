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
        Schema::table('fee_structures', function (Blueprint $table) {
            $table->unsignedTinyInteger('discount_boys')->nullable()->after('course_fee')->comment('Discount percentage for boys, e.g. 20 for 20%');
            $table->unsignedTinyInteger('discount_girls')->nullable()->after('discount_boys')->comment('Special scholarship percentage for girls, e.g. 40 for 40%');
            $table->string('boys_fee')->nullable()->after('discount_girls')->comment('Calculated or override discounted fee for boys');
            $table->string('girls_fee')->nullable()->after('boys_fee')->comment('Calculated or override discounted fee for girls');
            $table->string('offer_tag')->nullable()->after('girls_fee')->comment('e.g. Summer Offer 2026, Beti Padhao Scholarship');
            $table->boolean('offer_active')->default(true)->after('offer_tag');
            $table->string('badge_color')->default('emerald')->after('offer_active');
            $table->string('course_slug')->nullable()->after('badge_color')->comment('Route name or slug e.g. courses.ac');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fee_structures', function (Blueprint $table) {
            $table->dropColumn([
                'discount_boys',
                'discount_girls',
                'boys_fee',
                'girls_fee',
                'offer_tag',
                'offer_active',
                'badge_color',
                'course_slug',
            ]);
        });
    }
};
