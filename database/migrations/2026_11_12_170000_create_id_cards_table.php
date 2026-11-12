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
        if (!Schema::hasTable('id_cards')) {
            Schema::create('id_cards', function (Blueprint $table) {
                $table->id();
                $table->string('enrollment_no')->unique();
                $table->string('name');
                $table->string('father_name');
                $table->date('dob')->nullable();
                $table->string('course');
                $table->string('mobile_no')->nullable();
                $table->string('email')->nullable();
                $table->string('photo')->nullable();
                $table->string('center')->default('SMTTC Institute');
                $table->text('address')->nullable();
                $table->date('valid_from')->nullable();
                $table->date('valid_to')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('id_cards');
    }
};

