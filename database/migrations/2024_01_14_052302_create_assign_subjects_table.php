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
        Schema::create('assign_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('student_class_id');
            $table->integer('student_subject_id');
            $table->double('full_mark');
            $table->double('pass_mark');
            $table->double('subjective_mark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_subjects');
    }
};
