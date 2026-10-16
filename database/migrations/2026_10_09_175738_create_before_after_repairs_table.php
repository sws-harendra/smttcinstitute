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
        Schema::create('before_after_repairs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->default('AC & HVAC PCB Repairing');
            $table->string('before_image');
            $table->string('after_image');
            $table->string('before_label')->default('Before (Faulty / Dead)');
            $table->string('after_label')->default('After (100% Fixed & Tested)');
            $table->text('fault_description')->nullable();
            $table->text('repair_solution')->nullable();
            $table->string('tools_used')->nullable();
            $table->unsignedInteger('likes_count')->default(0);
            $table->integer('order_num')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('before_after_repairs');
    }
};
