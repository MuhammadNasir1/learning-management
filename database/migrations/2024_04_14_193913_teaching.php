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
        Schema::create('teaching', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id');
            $table->integer('student_id');
            $table->integer('course_id');
            $table->string('student_name');
            $table->string('teacher_name');
            $table->integer('word_id');
            $table->date('lesson_date');
            $table->string('course');
            $table->string('word');
            $table->string('audio_1')->nullable();
            $table->string('audio_2')->nullable();
            $table->string('audio_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching');
    }
};
