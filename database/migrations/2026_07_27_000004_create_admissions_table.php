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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('enrollment_no')->unique();
            $table->string('state');
            $table->string('district');
            $table->string('center');
            $table->string('name');
            $table->string('gender');
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('dob');
            $table->string('mobile_no');
            $table->string('email');
            $table->text('address');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('exam_pass')->nullable();
            $table->string('pass_year')->nullable();
            $table->string('marks_grade')->nullable();
            $table->string('board')->nullable();
            $table->string('course');
            $table->string('photo');
            $table->date('session_start');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
